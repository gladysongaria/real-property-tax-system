<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Status;
use App\Models\Property;
use App\Models\PaymentTerm;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use App\Models\Classification;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name.*' => 'required|string|max:255',
            'first_name.*' => 'required|string|max:255',
            'middle_name.*' => 'nullable|string|max:255',
            'ext_name.*' => 'nullable|string|max:255',
            'address.*' => 'required|string|max:255',
            'status.*' => 'required|exists:statuses,id',
            'tax_declaration' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'classification_id' => 'required|exists:classifications,id',
            'market_value' => 'required|numeric',
            'assessed_value' => 'required|numeric',
            'sub_class' => 'nullable|string|max:255',
            'previous_td' => 'nullable|string|max:255',
            'date_approved' => 'required|date',
        ]);

        // Step 1: Create the property
        $property = Property::create([
            'tax_declaration' => $request->tax_declaration,
            'location' => $request->location,
            'barangay' => $request->barangay,
            'classification_id' => $request->classification_id,
            'market_value' => $request->market_value,
            'assess_value' => $request->assessed_value,
            'sub_class' => $request->sub_class,
            'previous_td' => $request->previous_td,
            'date_approved' => $request->date_approved,
        ]);

        // Step 2: Create the owners and attach them to the property
        foreach ($request->last_name as $index => $lastName) {
            $owner = Owner::create([
                'last_name' => $lastName,
                'first_name' => $request->first_name[$index],
                'middle_name' => $request->middle_name[$index],
                'ext_name' => $request->ext_name[$index],
                'address' => $request->address[$index],
                'status_id' => $request->status[$index],
            ]);

            $property->owners()->attach($owner->id);
        }

        // Step 3: Create payment terms for each year from one year after approval to the current year
        $startYear = (int) date('Y', strtotime($request->date_approved)) + 1;
        $currentYear = (int) date('Y');

        for ($year = $startYear; $year <= $currentYear; $year++) {
            PaymentTerm::create([
                'property_id' => $property->id,
                'paid' => 0,
                'year' => $year// Default value is unpaid
            ]);
        }

        // Step 4: Redirect or return success
        return redirect()->back()->with('success', 'Property and owners added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
