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
        // Validate request
        $validatedData = $request->validate([
            'term' => 'required|integer', // Current year being added
            'to_year' => 'nullable|integer',
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

        $newYear = $validatedData['term']; // The year being added (e.g., 2025)
        $previousYear = $newYear - 1; // The year before the new entry (2024)
        $twoYearsBefore = $newYear - 2; // 2023
        $threeYearsBefore = $newYear - 3; // 2022

        // STEP 1: Save user input for the current year
        $penalty = Penalty::updateOrCreate(
            ['term' => $newYear],
            [
                'jan' => $validatedData['jan'],
                'feb' => $validatedData['feb'],
                'mar' => $validatedData['mar'],
                'apr' => $validatedData['apr'],
                'may' => $validatedData['may'],
                'jun' => $validatedData['jun'],
                'jul' => $validatedData['jul'],
                'aug' => $validatedData['aug'],
                'sept' => $validatedData['sept'],
                'oct' => $validatedData['oct'],
                'nov' => $validatedData['nov'],
                'dec' => $validatedData['dec'],
            ]
        );

        // STEP 2: Shift values for previous years
        $previousYearPenalty = Penalty::where('term', $previousYear)->first();
        $twoYearsBeforePenalty = Penalty::where('term', $twoYearsBefore)->first();
        $threeYearsBeforePenalty = Penalty::where('term', $threeYearsBefore)->first();
        $referencePenalty = Penalty::whereBetween('term', [1992, 2021])->first(); // Get reference for 2022

        if ($previousYearPenalty) {
            // 2024 takes values from 2023
            $previousYearPenalty->update([
                'jan' => $twoYearsBeforePenalty->jan ?? $previousYearPenalty->jan,
                'feb' => $twoYearsBeforePenalty->feb ?? $previousYearPenalty->feb,
                'mar' => $twoYearsBeforePenalty->mar ?? $previousYearPenalty->mar,
                'apr' => $twoYearsBeforePenalty->apr ?? $previousYearPenalty->apr,
                'may' => $twoYearsBeforePenalty->may ?? $previousYearPenalty->may,
                'jun' => $twoYearsBeforePenalty->jun ?? $previousYearPenalty->jun,
                'jul' => $twoYearsBeforePenalty->jul ?? $previousYearPenalty->jul,
                'aug' => $twoYearsBeforePenalty->aug ?? $previousYearPenalty->aug,
                'sept' => $twoYearsBeforePenalty->sept ?? $previousYearPenalty->sept,
                'oct' => $twoYearsBeforePenalty->oct ?? $previousYearPenalty->oct,
                'nov' => $twoYearsBeforePenalty->nov ?? $previousYearPenalty->nov,
                'dec' => $twoYearsBeforePenalty->dec ?? $previousYearPenalty->dec,
            ]);
        }

        if ($twoYearsBeforePenalty) {
            // 2023 takes values from 2022
            $twoYearsBeforePenalty->update([
                'jan' => $threeYearsBeforePenalty->jan ?? $twoYearsBeforePenalty->jan,
                'feb' => $threeYearsBeforePenalty->feb ?? $twoYearsBeforePenalty->feb,
                'mar' => $threeYearsBeforePenalty->mar ?? $twoYearsBeforePenalty->mar,
                'apr' => $threeYearsBeforePenalty->apr ?? $twoYearsBeforePenalty->apr,
                'may' => $threeYearsBeforePenalty->may ?? $twoYearsBeforePenalty->may,
                'jun' => $threeYearsBeforePenalty->jun ?? $twoYearsBeforePenalty->jun,
                'jul' => $threeYearsBeforePenalty->jul ?? $twoYearsBeforePenalty->jul,
                'aug' => $threeYearsBeforePenalty->aug ?? $twoYearsBeforePenalty->aug,
                'sept' => $threeYearsBeforePenalty->sept ?? $twoYearsBeforePenalty->sept,
                'oct' => $threeYearsBeforePenalty->oct ?? $twoYearsBeforePenalty->oct,
                'nov' => $threeYearsBeforePenalty->nov ?? $twoYearsBeforePenalty->nov,
                'dec' => $threeYearsBeforePenalty->dec ?? $twoYearsBeforePenalty->dec,
            ]);
        }

        if ($threeYearsBeforePenalty) {
            // 2022 takes values from 1992-2021
            if ($referencePenalty) {
                $threeYearsBeforePenalty->update([
                    'jan' => $referencePenalty->jan,
                    'feb' => $referencePenalty->feb,
                    'mar' => $referencePenalty->mar,
                    'apr' => $referencePenalty->apr,
                    'may' => $referencePenalty->may,
                    'jun' => $referencePenalty->jun,
                    'jul' => $referencePenalty->jul,
                    'aug' => $referencePenalty->aug,
                    'sept' => $referencePenalty->sept,
                    'oct' => $referencePenalty->oct,
                    'nov' => $referencePenalty->nov,
                    'dec' => $referencePenalty->dec,
                ]);
            }
        }

        return redirect()->route('penalties.index')->with('success', 'Penalties updated successfully.');
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
