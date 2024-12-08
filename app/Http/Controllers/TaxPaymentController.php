<?php

namespace App\Http\Controllers;

use App\Models\TaxPayment;
use Illuminate\Http\Request;

class TaxPaymentController extends Controller
{
    public function storeMultipleTaxPayments(Request $request)
    {
        $request->validate([
            'taxpayer_name' => 'required|string|max:255',
            'or_number' => 'required|string|max:255',
            'or_date' => 'required|date',
            'property_ids' => 'required|array',
            'property_ids.*' => 'exists:properties,id',
            'term' => 'required|array',
            'term.*' => 'integer|min:1900|max:' . now()->year,
        ]);

        foreach ($request->property_ids as $propertyId) {
            TaxPayment::create([
                'taxpayer_name' => $request->taxpayer_name,
                'or_number' => $request->or_number,
                'or_date' => $request->or_date,
                'property_id' => $propertyId,
                'term' => $request->term[$propertyId],
            ]);
        }

        return redirect()->back()->with('success', 'Tax payments recorded successfully.');
    }
}
