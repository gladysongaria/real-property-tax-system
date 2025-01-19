@extends('master')
@section('content')

<div class="container">
    <h1>Tax Payment Receipt</h1>
    <p><strong>OR No:</strong> {{ $receipt->or_no }}</p>
    <p><strong>OR Date:</strong> {{ $receipt->or_date }}</p>
    <p><strong>Issued To:</strong> {{ $receipt->issued_to }}</p>

    <h3>Particulars</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Owner Name</th>
                <th>Barangay</th>
                <th>Location</th>
                <th>Classification</th>
                <th>Tax Dec</th>
                <th>Term</th>
                <th>Assessed Value</th>
                <th>Tax Due</th>
                <th>Payment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipt->orParticulars as $particular)
            @php
            $term = $particular->term;
            $assessedValue = $particular->property->assessed_value ?? 0; // Ensure assessed value is set
            $currentMonth = now()->month;

            // Calculate tax due based on term and interest rate
            $interestRate = match (true) {
            $term <= 1973=> 12,
                $term >= 1974 && $term <= 1991=> 24,
                    $term >= 1992 && $term <= 2021=> 72,
                        default => 0
                        };
                        $taxDue = $assessedValue * ($interestRate / 100);
                        @endphp

                        <tr>
                            <td>
                                @foreach ($particular->property->owners as $owner)
                                {{ $owner->last_name }}, {{ $owner->first_name }}
                                @if (!$loop->last)
                                |
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $particular->property->barangay }}</td>
                            <td>{{ $particular->property->location }}</td>
                            <td>{{ $particular->property->classification->classification_name }}</td>
                            <td>{{ $particular->property->tax_declaration }}</td>
                            <td>{{ $particular->term }}</td>
                            <td>{{ number_format($assessedValue, 2) }}</td>
                            <td>{{ number_format($taxDue, 2) }}</td>
                            <td>{{ number_format($particular->payment, 2) }}</td>
                        </tr>
                        @endforeach
        </tbody>
    </table>

    <h4>Summary</h4>
    <p><strong>Total Tax Due:</strong> {{ number_format($receipt->orParticulars->sum(fn($p) =>
        $p->property->assessed_value * ($p->term <= 1973 ? 0.12 : ($p->term >= 1974 && $p->term <= 1991 ? 0.24 :
                0.72))), 2) }}</p>
                <p><strong>Total Payment:</strong> {{ number_format($receipt->amount_paid, 2) }}</p>
                <p><strong>Penalty:</strong> {{ number_format($receipt->penalty, 2) }}</p>
                <p><strong>Discount:</strong> {{ number_format($receipt->discount, 2) }}</p>
                <p><strong>Balance:</strong> {{ number_format($receipt->balance, 2) }}</p>

                <button class="btn btn-primary" onclick="window.print()">Print</button>
</div>

<div class="container">
    <center>
        <h5>UNOFFICIAL RECEIPT OF THE REPUBLIC OF THE PHILIPPINES</h5>
    </center>
    <center>
        <h5>Provincial or City Treasurer's Real Property Tax Receipt</h5>
    </center>
    <div class="row">
        <p>Details</p>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-sm-1">
                    O.R. Date :<strong> December 05, 2024</strong> <br>
                    O.R. No: <strong>12356854</strong>
                </div>
                <div class="col-4">
                    Issued to:<strong> Sample </strong> <br>
                    Issued by: <strong>Cruz, dela Juan</strong>
                </div>
            </div>
            <!--end of row2-->
        </div>
    </div>
    <div class="row">
        <strong>Payment: <input type="text"></strong>
    </div>
    <br>
    <br>
    <h4>Particulars</h4>
    <table class="table table-bordered">
        <tr>
            <th>Owner Name</th>
            <th>Barangay</th>
            <th>Location</th>
            <th>Classification</th>
            <th>Tax Dec</th>
            <th>Term</th>
            <th>Asessed Value</th>
            <th>Tax Due</th>
            <th>Payment</th>
        </tr>
        <tr>
            <td>Ayochok, Dennis D. </td>
            <td>Bontoc Ili</td>
            <td></td>
            <td>Agriculture</td>
            <td>09-0016-01139</td>
            <td>1991</td>
            <td>8820</td>
            <td style="text-align: right">88.2
                <br>
                + 21.16
                <hr>
                <strong>Total: 109.36</strong>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>Ayochok, Dennis D. </td>
            <td>Bontoc Ili</td>
            <td></td>
            <td>Agriculture</td>
            <td>09-0016-01139</td>
            <td>1991</td>
            <td>8820</td>
            <td style="text-align: right">88.2
                <br>
                + 21.16
                <hr>
                <strong>Total: 109.36</strong>
            </td>
            <td rowspan="4" style="border-top: none !important">
                Basic: 110.47 <br>
                SEF: 110.47<br>
                Total: 220.94</td>
        </tr>
        <tr>
            <td colspan="8" style="text-align: right"><strong>Over all Total: 209.36</strong></td>
        </tr>
    </table>
    <button class="btn btn-sm btn-success">Save and Print</button> <button class="btn btn-sm">Back</button>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h5>Previous Records</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>TD#</th>
                        <th>OR#</th>
                        <th>Date Issued*</th>
                        <th>Issued to</th>
                        <th>Payment*</th>
                        <th>Balance</th>
                        <th>sdf</th>
                    </tr>
                    <tr>
                        <td>09-0016-01139</td>
                        <td>63943303</td>
                        <td>2023-03-07 </td>
                        <td>Dennis D. Ayochok</td>
                        <td>158.97</td>
                        <td>0.00</td>
                        <td><a href="#">+ more</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--end of card-->
</div>

@endsection

<!--END OF PAY TAXES MODAL-->
