@extends('master')
@section('content')

<div class=" content_custi" style="width: 100%;">
    <div class="container">
        <div class=" card">
            <h5 class=" card-header"> Certificate of Payment
                <hr>
            </h5>
            <div class=" card-body">

                <!--USE DATATABLE-->
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>Owner Name</th>
                        <th>Tax Dec. No</th>
                        <th>Address</th>
                        <th>Barangay</th>
                        <th>Classification</th>
                        <th>Last Term of Paymet</th>
                        <th>OR No.</th>
                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>Longayan, Elza Fagyan</td>
                        <td>04-0006-04261</td>
                        <td>Chackong</td>
                        <td>Bontoc Ili</td>
                        <td>Residential</td>
                        <td>2024
                        </td>
                        <td>683994</td>
                        <td><a href="{{route('reports.printcertificateOfPayment')}}" type="button"
                                class="btn btn-sm btn-success"><i class="bi bi-printer"></i></a>

                        </td>
                    </tr>

                    <tr>
                        <td>Longayan, Elza Fagyan</td>
                        <td>04-0006-04261</td>
                        <td>Filig</td>
                        <td>Chackong</td>
                        <td>Bontoc Ili</td>
                        <td>Residential</td>

                        <td>2024
                        </td>
                        <td>683994</td>
                        <td><a href="{{route('reports.printcertificateOfPayment')}}" type="button"
                                class="btn btn-sm btn-success"><i class="bi bi-printer"></i></a>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!--END OF REPORTS  MODAL-->
@endsection