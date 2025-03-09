@extends('master')
@section('js')
@endsection
@section('content')

<div class=" content_custi" style="width: 100%;">
    <div class="container">
        <div class=" card">
            <h4 class=" card-header">
                <center>Taxroll</center>

            </h4>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for=""><strong>Filter Type:</strong></label>
                            <select name="filter-type" id="filter_taxrol" class="form-control input-sm filter-type"
                                page="report-1">
                                <option value="name">By Name</option>
                                <option value="brgy">By Barangay</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <strong> <label for="" id="label_taxrolName"> Enter Name </label></strong>
                            <input name="filter-name" id="filter_brgy" type="text" class="form-control input-sm"
                                required="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary btn-sm">Search <span
                                    class="bi  bi-search"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class=" card-body">

                <!--USE DATATABLE-->
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>Owner Name</th>
                        <th>Tax Dec. No</th>
                        <th>Address</th>
                        <th>Location</th>
                        <th>Barangay</th>
                        <th>Classification</th>
                        <th>Area</th>
                        <th>Market Value</th>
                        <th>Assessed Value</th>
                        <th>Previous TD</th>
                        <th>Last Term of Paymet</th>
                        <th>OR No.</th>

                    </tr>



                    <tr>
                        <td>ASBAD, THOMASA</td>
                        <td>09-0001-02444</td>
                        <td></td>
                        <td>DOCAWAN</td>
                        <td>Bontoc Ili</td>
                        <td>Agricultural</td>
                        <td>447</td>
                        <td>2240</td>
                        <td>900</td>
                        <td>Rootcrop Land</td>
                        <td>2020</td>
                        <td>9890387</td>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<!--END OF REPORTS  MODAL-->
@endsection