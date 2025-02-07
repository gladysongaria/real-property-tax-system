@extends('master')
@section('content')

<div class=" content_custi" style="width: 100%;">
    <div class="container">
        <div class=" card">
            <h5 class=" card-header">Official Receipt List
                <hr>

            </h5>

            <div class=" card-body">

                <!--USE DATATABLE-->
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>O.R. No.</th>
                        <th>Date Issued</th>
                        <th>Issued by</th>
                        <th>Issued to</th>

                        <th>Action</th>

                    </tr>



                    <tr>
                        <td>63944450</td>
                        <td>January 3, 2025</td>
                        <td>Admin Staff</td>
                        <td>Bernard Makeillay</td>

                        <td><button class="btn btn-sm btn-success">View</button> <button
                                class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<!--END OF REPORTS  MODAL-->
@endsection