<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Owner;
use App\Models\Status;
use App\Models\Property;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

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
        // Step 1: Validate the request data
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'ext_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'status_name' => 'required|exists:statuses,id',  // Ensure the selected status exists
            'tax_declaration' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'classification_id' => 'required|exists:classifications,id',  // Ensure the classification exists
            'market_value' => 'required|numeric',
            'assessed_value' => 'required|numeric',
            'sub_class' => 'nullable|string|max:255',
            'previous_td' => 'nullable|string|max:255',
            'date_approved' => 'required|date',
        ]);

        // Step 2: Create a new owner record in the 'owners' table
        $owner = Owner::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'ext_name' => $request->ext_name,
            'address' => $request->address,
            'status_id' => $request->status_name,
        ]);

        // Step 3: Create a new property record in the 'properties' table linked with the owner_id
        $property = Property::create([
            'owner_id' => $owner->id,  // Associate the property with the owner's ID
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

        // Step 4: Return a success response or redirect
        return redirect()->back()->with('success', 'Owner and property added successfully.');
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
