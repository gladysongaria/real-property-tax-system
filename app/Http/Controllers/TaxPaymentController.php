<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Property;
use App\Models\PaymentTerm;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Classification;
use App\Models\OfficialReceipt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaxPaymentController extends Controller
{
    public function index()
    {

        $statuses = Status::all();
        $classifications = Classification::all();
        $properties = Property::with(['owners', 'paymentTerms' => function ($query) {
            $query->where('paid', false);
        }])->get();
        $payment_terms = PaymentTerm::where('paid', 0);

        return view('tax_payment.index', compact('statuses', 'classifications', 'properties', 'payment_terms'));
    }

    public function payTaxes(Request $request)
    {
        $validated = $request->validate([
            'or_number' => 'required|string',
            'or_date' => 'required|date',
            'taxpayer_name' => 'required|string',
            'particulars' => 'required|array',
            'particulars.*.property_id' => 'required|integer',
            'particulars.*.term' => 'required|string',
        ]);

        // Create the official receipt
        $receipt = OfficialReceipt::create([
            'or_no' => $validated['or_number'],
            'or_date' => $validated['or_date'],
            'issued_to' => $validated['taxpayer_name'],
            'issued_by' => Auth::user()->id,
        ]);

        // Save particulars
        foreach ($validated['particulars'] as $particular) {
            $receipt->orParticulars()->create([
                'property_id' => $particular['property_id'],
                'term' => $particular['term'],
                'tax_due' => $request->input("tax_due.{$particular['property_id']}", 0),
                'payment' => $request->input("payment.{$particular['property_id']}", 0),
                'penalty' => $request->input("penalty.{$particular['property_id']}", 0),
                'discount' => $request->input("discount.{$particular['property_id']}", 0),
            ]);
        }

        return redirect()->route('tax-payments.get-receipt', $receipt->id)
            ->with('success', 'Tax payment recorded successfully.');
    }

    public function getReceipt($orId)
    {
        $receipt = OfficialReceipt::with('orParticulars.property.classification')->findOrFail($orId);

        $receiptData = [];
        $overall_total_tax_due = 0;

        foreach ($receipt->orParticulars as $particular) {
            $term = $particular->term;
            $assess_value = $particular->property->assess_value ?? 0;
            $basic_tax_rate = 0.01;  // Basic tax rate
            $sef_tax_rate = 0.01;    // SEF tax rate

            $payment_month = now()->month;
            $penalty = $this->getPenalty($term, $payment_month, $assess_value);
            $discount = 0;

            $tax_due = $assess_value * $basic_tax_rate;
            $total_tax_due = ($tax_due + $penalty) - $discount;
            $overall_total_tax_due += $total_tax_due;

            $basic_payment = $total_tax_due * $basic_tax_rate;
            $sef_payment = $total_tax_due * $sef_tax_rate;
            $total_payment = $basic_payment + $sef_payment;

            // Store each particular's data in an array
            $receiptData[] = [
                'property_id' => $particular->property_id,
                'owners' => $particular->property->owners,
                'barangay' => $particular->property->barangay,
                'location' => $particular->property->location,
                'classification_name' => $particular->property->classification->classification_name,
                'tax_declaration' => $particular->property->tax_declaration,
                'term' => $term,
                'assess_value' => $assess_value,
                'penalty' => $penalty,
                'tax_due' => $tax_due,
                'total_tax_due' => $total_tax_due,
            ];
        }

        // Calculate the overall payments after accumulating the total tax due for all particulars
        $overall_basic_payment = $overall_total_tax_due;
        $overall_sef_payment = $overall_total_tax_due;
        $overall_total_payment = $overall_basic_payment + $overall_sef_payment;

        return view('tax_payment.preview', compact(
            'receipt',
            'receiptData',
            'overall_total_tax_due',
            'overall_basic_payment',
            'overall_sef_payment',
            'overall_total_payment'
        ));
    }

    private function getPenalty($term, $paymentMonth, $assess_value)
    {
        $baseInterestRates = $this->getInterestRatesByTerm($term);
        $interestRate = $baseInterestRates[$paymentMonth] ?? end($baseInterestRates); // Default to the last rate if month not matched

        return $assess_value * $interestRate;
    }

    private function getInterestRatesByTerm($term)
    {
        switch (true) {
            case $term <= 1973:
                return [1 => 0.12]; // 12% flat for all months
            case $term >= 1974 && $term <= 1991:
                return [1 => 0.24]; // 24% flat for all months
            case $term >= 1992 && $term <= 2021:
            case $term == 2022:
                return [
                    1 => 0.50,
                    2 => 0.52,
                    3 => 0.54,
                    4 => 0.56,
                    5 => 0.58,
                    6 => 0.60,
                    7 => 0.62,
                    8 => 0.64,
                    9 => 0.66,
                    10 => 0.68,
                    11 => 0.70,
                    12 => 0.72
                ];
            case $term == 2023:
                return [
                    1 => 0.26,
                    2 => 0.28,
                    3 => 0.30,
                    4 => 0.32,
                    5 => 0.34,
                    6 => 0.36,
                    7 => 0.38,
                    8 => 0.40,
                    9 => 0.42,
                    10 => 0.44,
                    11 => 0.46,
                    12 => 0.48
                ];
            case $term == 2024:
                return [
                    4 => 0.08,
                    5 => 0.10,
                    6 => 0.12,
                    7 => 0.14,
                    8 => 0.16,
                    9 => 0.18,
                    10 => 0.20,
                    11 => 0.22,
                    12 => 0.24
                ];
            default:
                return [1 => 0]; // Default rate if term does not match
        }
    }

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'particulars' => 'required|array',
            'particulars.*.property_id' => 'required|integer|exists:properties,id',
            'particulars.*.term' => 'required|integer',
            'particulars.*.tax_due' => 'required|numeric',
            'particulars.*.penalty' => 'nullable|numeric',
            'particulars.*.discount' => 'nullable|numeric',
            'particulars.*.total_tax_due' => 'required|numeric',
        ]);

        // Get the cash and overall_total_payment values
        $cash = $request->input('cash', 0);
        $overallTotalPayment = $request->input('overall_total_payment', 0);

        // Calculate the change
        $change = $cash - $overallTotalPayment;

        // Check for existing Official Receipt with the same 'or_no', 'or_date', 'issued_to', 'issued_by'
        $existingReceipt = OfficialReceipt::where('or_no', $request->input('or_no'))
            ->where('or_date', $request->input('or_date'))
            ->where('issued_to', $request->input('issued_to'))
            ->where('issued_by', $request->input('issued_by'))
            ->first();

        if ($existingReceipt) {
            // Update the existing Official Receipt
            $existingReceipt->update([
                'or_no' => $request->input('or_no'),
                'or_date' => $request->input('or_date'),
                'issued_to' => $request->input('issued_to'),
                'issued_by' => $request->input('issued_by'),
                'overall_basic_payment' => $request->input('overall_basic_payment', 0),
                'overall_sef_payment' => $request->input('overall_sef_payment', 0),
                'overall_total_payment' => $overallTotalPayment,
                'cash' => $cash,
                'change' => $change, // Calculate the change
            ]);

            // Delete existing particulars associated with this receipt
            $existingReceipt->orParticulars()->delete();
        } else {
            // Create a new Official Receipt if it doesn't exist
            $existingReceipt = OfficialReceipt::create([
                'or_no' => $request->input('or_no'),
                'or_date' => $request->input('or_date'),
                'issued_to' => $request->input('issued_to'),
                'issued_by' => $request->input('issued_by'),
                'overall_basic_payment' => $request->input('overall_basic_payment', 0),
                'overall_sef_payment' => $request->input('overall_sef_payment', 0),
                'overall_total_payment' => $overallTotalPayment,
                'cash' => $cash,
                'change' => $change, // Calculate the change
            ]);
        }

        // Iterate through particulars and save each one (update if exists or create new)
        foreach ($validatedData['particulars'] as $particular) {
            $existingParticular = $existingReceipt->orParticulars()->where('property_id', $particular['property_id'])->first();

            if ($existingParticular) {
                // Update the existing particular
                $existingParticular->update([
                    'term' => $particular['term'],
                    'tax_due' => $particular['tax_due'],
                    'penalty' => $particular['penalty'] ?? 0,
                    'discount' => $particular['discount'] ?? 0,
                    'total_tax_due' => $particular['total_tax_due'],
                ]);
            } else {
                // Create a new particular if it doesn't exist
                $existingReceipt->orParticulars()->create([
                    'property_id' => $particular['property_id'],
                    'term' => $particular['term'],
                    'tax_due' => $particular['tax_due'],
                    'penalty' => $particular['penalty'] ?? 0,
                    'discount' => $particular['discount'] ?? 0,
                    'total_tax_due' => $particular['total_tax_due'],
                ]);
            }

            $paymentTerm = PaymentTerm::where('property_id', (int)$particular['property_id'])
            ->where('id', (int)$particular['term'])
            ->first();
        
            if ($paymentTerm) {
                $paymentTerm->update(['paid' => 1]);
            } else {
                dd('No matching PaymentTerm found.');
            }
            
        }

        return redirect()->route('dashboard')->with('success', 'Official Receipt and particulars successfully saved.');
    }
}
