<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Classification;
use App\Models\PaymentTerm;

class DashboardController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        $classifications = Classification::all();
        $properties = Property::with(['owners', 'paymentTerms' => function ($query) {
            $query->where('paid', false);
        }])->get();
        $payment_terms = PaymentTerm::where('paid', 0);

        return view('dashboard', compact('statuses', 'classifications', 'properties', 'payment_terms'));
    }
}
