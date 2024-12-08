@extends('master')
@section('content')

<div class=" content_custi" style="width: 100%;">
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Owner/s</th>
                <th>Tax Declaration</th>
                <th>Location</th>
                <th>Barangay</th>
                <th>Assessed Value</th>
                <th>Market Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
            <tr>
                <th scope="row">
                    @foreach ($property->owners as $owner)
                    {{ $owner->last_name }}, {{ $owner->first_name }} {{ $owner->middle_name ?? '' }}
                    @if (!$loop->last)
                    |
                    @endif
                    @endforeach
                </th>
                <td>{{ $property->tax_declaration }}</td>
                <td>{{ $property->location }}</td>
                <td>{{ $property->barangay }}</td>
                <td>{{ $property->assess_value }}</td>
                <td>{{ $property->market_value }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#" type="button"><i
                            class="bi bi-pen"></i></button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#delete{{$property->id}}">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="row">
        <div class="col-sm">
            <button type="button" class="btn btn-cust btn-lg" id="cust_but" data-bs-toggle="modal"
                data-bs-target="#taxpayment">PAY TAXES</button>
        </div>
    </div>

    @include('tax_payment.index')

</div>

@endsection
