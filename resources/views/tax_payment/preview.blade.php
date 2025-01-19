@extends('master')
@section('content')

<div class="container">
    <center>
        <h5>UNOFFICIAL RECEIPT OF THE REPUBLIC OF THE PHILIPPINES</h5>
    </center>
    <center>
        <h5>Provincial or City Treasurer's Real Property Tax Receipt</h5>
    </center>

    <form action="{{ route('taxpayment.store') }}" method="POST">
        @csrf
        <div class="row">
            <p>Details</p>
            <div class="container">
                <div class="row">
                    <div class="col-6 offset-sm-1">
                        <input type="hidden" name="or_date" value="{{ $receipt->or_date  }}">
                        <input type="hidden" name="or_no" value="{{ $receipt->or_no }}">
                        O.R. Date: <strong>{{ $receipt->or_date }}</strong> <br>
                        O.R. No: <strong>{{ $receipt->or_no }}</strong>
                    </div>
                    <div class="col-4">
                        <input type="hidden" name="issued_to" value="{{ $receipt->issued_to  }}">
                        <input type="hidden" name="issued_by" value="{{Auth::user()->id  }}">
                        Issued to: <strong>{{ $receipt->issued_to }}</strong> <br>
                        Issued by: <strong>{{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <label for="payment"><strong>Payment:</strong></label>
            <input type="number" name="cash" id="payment" class="form-control d-inline" style="width: auto;" required>
        </div>
        <br><br>
        <h4>Particulars</h4>
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
                    <th>Amount to Pay</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receiptData as $data)
                <tr>
                    <td>
                        @foreach ($data['owners'] as $owner)
                        {{ $owner->last_name }}, {{ $owner->first_name }}
                        @if (!$loop->last)
                        |
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $data['barangay'] }}</td>
                    <td>{{ $data['location'] }}</td>
                    <td>{{ $data['classification_name'] }}</td>
                    <td>{{ $data['tax_declaration'] }}</td>
                    <td>
                        <input type="hidden" name="particulars[{{$loop->index}}][property_id]"
                            value="{{ $data['property_id'] }}">
                        <input type="hidden" name="particulars[{{$loop->index}}][term]" value="{{ $data['term'] }}"
                            class="form-control" required>
                        {{ ($data['term']) }}
                    </td>
                    <td>{{ number_format($data['assess_value'], 2) }}</td>
                    <td>
                        <input type="hidden" name="particulars[{{$loop->index}}][tax_due]"
                            value="{{ $data['tax_due'] }}">
                        <input type="hidden" name="particulars[{{$loop->index}}][penalty]"
                            value="{{ $data['penalty'] }}">
                        <input type="hidden" name="particulars[{{$loop->index}}][total_tax_due]"
                            value="{{ $data['total_tax_due'] }}">
                        {{ number_format($data['tax_due'], 2) }}<br>
                        +{{ number_format($data['penalty'], 2) }}<br>
                        <strong>Total: {{ number_format($data['total_tax_due'], 2) }}</strong>
                    </td>
                    @endforeach

                    <td>
                        <input type="hidden" name="overall_basic_payment" value="{{ $overall_basic_payment }}">
                        <input type="hidden" name="overall_sef_payment" value="{{ $overall_sef_payment }}">
                        <input type="hidden" name="overall_total_payment" value="{{ $overall_total_payment }}">
                        Basic: {{ $overall_basic_payment }}<br>
                        SEF: {{ $overall_sef_payment }}<br>
                        <strong>Total: {{ $overall_total_payment }}</strong>
                    </td>
                </tr>
                </tr>

                <tr>
                    <td colspan="8" class="text-end">
                        Overall Total: <strong>{{ number_format($overall_total_tax_due, 2) }}</strong>
                        <input type="hidden" name="overall_total_tax_due" value="{{ $overall_total_tax_due }}">
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-sm btn-success">Save and Print</button>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary">Back</a>
    </form>

    <div class="mt-4 card">
        <div class="card-body">
            <div class="container">
                <h5>Previous Records</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>TD#</th>
                            <th>OR#</th>
                            <th>Date Issued</th>
                            <th>Issued to</th>
                            <th>Payment</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>09-0016-01139</td>
                            <td>63943303</td>
                            <td>2023-03-07</td>
                            <td>Dennis D. Ayochok</td>
                            <td>158.97</td>
                            <td>0.00</td>
                            <td><a href="#">+ more</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection