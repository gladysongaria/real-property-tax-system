@extends('master')
@section('content')

<div class=" content_custi">
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Owner/s</th>
                <th>Tax Declaration</th>
                <th>Location</th>
                <th>Barangay</th>
                <th>Assessed Value</th>
                <th>Barangay</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@fat</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>@twitter</td>
                <td>@twitter</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm">
            <button type="button" class="btn btn-cust btn-lg" id="cust_but">PAY TAXES</button>
        </div>
    </div>
</div>

@endsection
