<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ReportsController extends Controller
{
    public function index()
    {
       return view('reports.index');
    }

    public function certificate_of_payment()
    {
       return view('reports.certificates.certificateOfPayment');
    }

    public function printcertificate_of_payment()
    {
       return view('reports.certificates.printCertOfPayment');
    }
    
     public function blgf()
    {
       return view('reports.blgf.blgf');
    }

     public function delinquency()
    {
       return view('reports.delinquency.delinquencyIndex');
    }

     public function taxroll()
    {
       return view('reports.taxroll.taxrollIndex');
    }

     public function brgyShare()
    {
       return view('reports.brgyshare.brgyShareIndex');
    }
   
}
