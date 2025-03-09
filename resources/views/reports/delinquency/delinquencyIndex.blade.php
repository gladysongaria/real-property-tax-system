@extends('master')
@section('content')

<div class=" content_custi" style="width: 100%;">
    <div class="container">
        <div class=" card">
            <h5 class=" card-header">Delinquent List</h5>
            <br>
            <div class="container">
                <div class="navigator">
                    <button type="button" class="btn btn-sm btn-info print-this" onclick="printThis('#canvas-blgf2-1')">
                        <span class="bi bi-printer"></span>
                        Print
                    </button>

                    <button type="button" class="btn btn-sm btn-warning ex-excel">
                        <span class=" bi bi-download"></span>
                        Export Excel
                    </button>




                </div>
            </div>

            <hr>

            <div class=" card-body">

                <!--USE DATATABLE-->
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>Name of Owner</th>
                        <th>Tax Dec</th>
                        <th>Location</th>
                        <th>Classification</th>
                        <th></th>
                        <th>Period</th>
                        <th>Assessed Value</th>
                        <th>Basic Tax</th>
                        <th>SPEF</th>
                        <th>Grand Total</th>

                        <th>Remarks</th>

                    </tr>



                    <tr>
                        <td>Amatic, Manay</td>
                        <td>04-0006-04886</td>
                        <td>Allac</td>
                        <td>Agricultural</td>
                        <td>L</td>
                        <td>2019-2024</td>
                        <td>620</td>
                        <td>8.40</td>
                        <td>8.40</td>
                        <td>8.40</td>

                        <td><button class="btn btn-sm btn-success">View</button>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<!--END OF REPORTS  MODAL-->
@endsection