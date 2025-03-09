@extends('master')
@section('content')

<div class=" content_custi" style="width: 100%;">
    <div class="container">
        <div class=" card">
            <h5 class=" card-header">BLGF
            </h5>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Filter Type:</label>
                            <select name="filter-type" class="form-control input-sm " page="report-1">
                                <option value="">Select Filter</option>
                                <option value="daily">Daily</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="semi_annual">Semi Annual</option>
                                <option value="yearly">Yearly</option>
                                <option value="custom">Date Range</option>
                                <option value="advance">Advance</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">OR(From):</label>
                                    <input type="number" class="form-control input-sm" name="filter-or">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">OR(To):</label>
                                    <input type="number" class="form-control input-sm" name="filter-or2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="advance" value="checked"> Advance
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="navigator">
                            <button type="button" class="btn btn-sm btn-info print-this"
                                onclick="printThis('#canvas-blgf2-1')">
                                <span class="bi bi-printer"></span>
                                Print
                            </button>

                            <button type="button" class="btn btn-sm btn-warning ex-excel">
                                <span class=" bi bi-download"></span>
                                Export Excel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" card-body">

                <!--USE DATATABLE-->
                <table class="table table-bordered table-responsive" style="font-size:12px;">
                    <tr>
                        <th>Date</th>
                        <th>Tax Payer</th>
                        <th>Period Covered</th>
                        <th>OR No.</th>
                        <th>Name of Barangay</th>
                        <th>25%</th>
                        <th>Res.</th>
                        <th>Com.</th>
                        <th>Agri.</th>
                        <th>Ind.</th>
                        <th>Current Year</th>
                        <th>Current Penalty</th>
                        <th>Discount</th>
                        <th>Previous Year</th>
                        <th>Previous Penalty</th>
                        <th>BASIC TAX</th>
                        <th>BASIC & S.E.F</th>
                    </tr>



                    <tr>
                        <td>12/27/2024</td>
                        <td>Kawi, Alexander Davis</td>
                        <td>2022</td>
                        <td>6391532</td>
                        <td>Bontoc Ili</td>
                        <td></td>
                        <td>114.00</td>
                        <td>Com.</td>
                        <td>Agri.</td>
                        <td>Ind.</td>
                        <td>63.30</td>
                        <td>Current Penalty</td>
                        <td>6.30</td>
                        <td></td>
                        <td></td>
                        <td>57.0</td>
                        <td>114.00</td>
                    </tr>
                    <tr>
                        <td>02/27/2024</td>
                        <td>David, Alexander Davis</td>
                        <td>2024</td>
                        <td>6391533</td>
                        <td>Bontoc Ili</td>
                        <td></td>
                        <td>114.00</td>
                        <td>Com.</td>
                        <td>Agri.</td>
                        <td>Ind.</td>
                        <td>64.30</td>
                        <td>Current Penalty</td>
                        <td>6.30</td>
                        <td></td>
                        <td></td>
                        <td>67.0</td>
                        <td>214.00</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<!--END OF REPORTS  MODAL-->
@endsection