<?php

namespace App\Http\Controllers;

use App\Models\TaxPayment;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\OfficialReceipt;

class TaxPaymentController extends Controller
{
    public function payTaxes(Request $request)
    {
        $validated = $request->validate([
            'or_no' => 'required|string',
            'or_date' => 'required|date',
            'issued_to' => 'required|string',
            'issued_by' => 'required|string',
            'amount_paid' => 'required|numeric',
            'balance' => 'required|numeric',
            'penalty' => 'required|numeric',
            'discount' => 'required|numeric',
            'particulars' => 'required|array',
            'particulars.*.property_id' => 'required|integer',
            'particulars.*.penalty' => 'required|numeric',
            'particulars.*.discount' => 'required|numeric',
            'particulars.*.term' => 'required|string',
            'particulars.*.inclusive_years' => 'required|string',
            'particulars.*.customer_discount' => 'required|numeric',
            'particulars.*.customer_penalty' => 'required|numeric',
            'particulars.*.customer_last_term' => 'required|string',
            'particulars.*.status' => 'required|string',
        ]);

        dd($validated);

        // Create the Official Receipt without the nested particulars
        $receipt = OfficialReceipt::create(Arr::except($validated, ['particulars']));

        // Create the OR particulars for each provided property
        foreach ($validated['particulars'] as $particular) {
            $receipt->orParticulars()->create($particular);
        }

        return redirect()->back()->with('success', 'Tax payments recorded successfully.');
    }
    public function getReceipt($id)
    {
        $receipt = OfficialReceipt::with(['orParticulars.property.classification', 'orParticulars.property.owners'])
            ->findOrFail($id);

        $receiptData = [
            'or_no' => $receipt->or_no,
            'or_date' => $receipt->or_date->format('Y-m-d'),
            'issued_to' => $receipt->issued_to,
            'issued_by' => $receipt->issued_by,
            'details' => $receipt->orParticulars->map(function ($particular) {
                return [
                    'owner_name' => $particular->property->owners->map(function ($owner) {
                        return "{$owner->last_name}, {$owner->first_name}";
                    })->implode(' | '),
                    'barangay' => $particular->property->barangay,
                    'location' => $particular->property->location,
                    'classification' => $particular->property->classification->classification_name,
                    'tax_declaration' => $particular->property->tax_declaration,
                    'assessed_value' => $particular->property->assess_value,
                    'term' => $particular->term,
                    'tax_due' => $particular->tax_due,
                    'payment' => $particular->payment
                ];
            }),
            'total_tax_due' => $receipt->total_tax_due,
            'total_sef_due' => $receipt->total_sef_due,
            'total_payment' => $receipt->amount_paid,
            'penalty' => $receipt->penalty,
            'discount' => $receipt->discount,
            'balance' => $receipt->balance,
        ];

        return response()->json($receiptData);
    }
}
