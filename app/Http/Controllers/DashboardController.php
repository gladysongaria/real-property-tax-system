<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Classification;

class DashboardController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        $classification = Classification::all();
        $properties = Property::all();

        return view('dashboard', compact('statuses', 'classification', 'properties'));
    }
}
