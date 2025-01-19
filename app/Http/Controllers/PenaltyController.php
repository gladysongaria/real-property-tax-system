<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use Illuminate\Http\Request;

class PenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penalties = Penalty::all()->groupBy(function ($penalty) {
            return implode('-', [
                $penalty->jan,
                $penalty->feb,
                $penalty->mar,
                $penalty->apr,
                $penalty->may,
                $penalty->jun,
                $penalty->jul,
                $penalty->aug,
                $penalty->sept,
                $penalty->oct,
                $penalty->nov,
                $penalty->dec
            ]);
        });

        $groupedPenalties = [];
        foreach ($penalties as $groupedValues => $items) {
            $years = $items->pluck('term')->sort()->toArray();
            $firstYear = reset($years);
            $lastYear = end($years);
            $groupedPenalties[] = [
                'term_from' => $firstYear,
                'term_to' => $lastYear,
                'jan' => $items[0]->jan,
                'feb' => $items[0]->feb,
                'mar' => $items[0]->mar,
                'apr' => $items[0]->apr,
                'may' => $items[0]->may,
                'jun' => $items[0]->jun,
                'jul' => $items[0]->jul,
                'aug' => $items[0]->aug,
                'sept' => $items[0]->sept,
                'oct' => $items[0]->oct,
                'nov' => $items[0]->nov,
                'dec' => $items[0]->dec,
            ];
        }
        return view('penalties.index', compact('groupedPenalties'));
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'term' => 'required|integer', // The starting year
            'to_year' => 'nullable|integer', // The ending year, optional
            'jan' => 'required|numeric',
            'feb' => 'required|numeric',
            'mar' => 'required|numeric',
            'apr' => 'required|numeric',
            'may' => 'required|numeric',
            'jun' => 'required|numeric',
            'jul' => 'required|numeric',
            'aug' => 'required|numeric',
            'sept' => 'required|numeric',
            'oct' => 'required|numeric',
            'nov' => 'required|numeric',
            'dec' => 'required|numeric',
        ]);

        // Get the starting year (term)
        $startYear = $validatedData['term'];

        // Get the ending year (to_year) or use the starting year if not provided
        $endYear = $validatedData['to_year'] ?? $startYear;

        // Loop through each year from start to end
        for ($year = $startYear; $year <= $endYear; $year++) {
            // Create a new penalty record for each year
            $penalty = new Penalty();

            // Set the values for the penalty record
            $penalty->term = $year;  // Set the term (year)
            $penalty->jan = $validatedData['jan'];
            $penalty->feb = $validatedData['feb'];
            $penalty->mar = $validatedData['mar'];
            $penalty->apr = $validatedData['apr'];
            $penalty->may = $validatedData['may'];
            $penalty->jun = $validatedData['jun'];
            $penalty->jul = $validatedData['jul'];
            $penalty->aug = $validatedData['aug'];
            $penalty->sept = $validatedData['sept'];
            $penalty->oct = $validatedData['oct'];
            $penalty->nov = $validatedData['nov'];
            $penalty->dec = $validatedData['dec'];
            $penalty->created_at = now();
            $penalty->updated_at = now();

            // Save the penalty record for the current year
            $penalty->save();
        }

        // Redirect back with success message
        return redirect()->route('penalties.index')->with('success', 'Penalties for the given term and range of years successfully saved.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Penalty $penalty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penalty $penalty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penalty $penalty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penalty $penalty)
    {
        //
    }
}
