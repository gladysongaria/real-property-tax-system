@extends('master')
@section('content')

<div class=" content_custi" style="width: 100%;">
    <div class="container">
        <div class="card">
            <h5 class="card-header">Penalty
                <hr>
                <div class="col-2">
                    <button class="btn btn-sm btn-success" id="addPenalty" data-bs-toggle="modal"
                        data-bs-target="#penalties">+ New</button>
                </div>
            </h5>

            <div class=" card-body">

                <!--USE DATATABLE-->
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>No.</th>
                        <th>Year(from)</th>
                        <th>Year(To)</th>
                        <th>Jan(%)</th>
                        <th>Feb(%)</th>
                        <th>Mar(%)</th>
                        <th>Apr(%)</th>
                        <th>May(%)</th>
                        <th>Jun(%)</th>
                        <th>Jul(%)</th>
                        <th>Aug(%)</th>
                        <th>Sept(%)</th>
                        <th>Oct(%)</th>
                        <th>Nov(%)</th>
                        <th>Dec(%)</th>
                        <th>Action</th>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1974</td>
                        <td>1986</td>
                        <td>24</td>
                        <td>24</td>
                        <td>24</td>
                        <td>24</td>
                        <td>24</td>
                        <td>24</td>
                        <td>24</td>
                        <td>24</td>
                        <td>24</td>
                        <td>24</td>
                        <td><button class="btn btn-sm btn-primary">Edit</button> <button
                                class="btn btn-sm btn-danger">Delete</button>
                        </td>

                    </tr>
                </table>
            </div>
        </div>

    </div>



</div>



<!--PENALTIES MODAL-->
<div class="modal fade" id="penalties" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background: #459b96;">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>PENALTY</strong></h1>
            </div>
            <div class="modal-body">
                Add Penalties
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Term</label>
                                <input type="number" class="form-control input-sm input-first" name="dx-input-1[]"
                                    page="fees">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Year(To)- (Optional)</label>
                                <input type="number" class="form-control input-sm" name="dx-input-2[]" page="fees">
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Jan(%)</label>
                                <input type="number" class="form-control input-sm" name="dx-input-3[]" page="fees">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Feb(%)</label>
                                <input type="number" class="form-control input-sm" name="dx-input-4[]" page="fees">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Mar(%)</label>
                                <input type="number" class="form-control input-sm" name="dx-input-5[]" page="fees">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Apr(%)</label>
                                <input type="number" class="form-control input-sm" name="dx-input-6[]" page="fees">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>May(%)</label>
                                <input type="number" class="form-control input-sm" name="dx-input-7[]" page="fees">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Jun(%)</label>
                                <input type="number" class="form-control input-sm" name="dx-input-8[]" page="fees">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label>Jul(%)</label>
                            <input type="number" class="form-control input-sm" name="dx-input-9[]" page="fees">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Aug(%)</label>
                            <input type="number" class="form-control input-sm" name="dx-input-10[]" page="fees">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Sep(%)</label>
                            <input type="number" class="form-control input-sm" name="dx-input-11[]" page="fees">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Oct(%)</label>
                            <input type="number" class="form-control input-sm" name="dx-input-12[]" page="fees">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Nov(%)</label>
                            <input type="number" class="form-control input-sm" name="dx-input-13[]" page="fees">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Dec(%)</label>
                            <input type="number" class="form-control input-sm" name="dx-input-14[]" page="fees">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-default btn-success" id="i-save" value="Save" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!--END OF PENALTIES MODAL-->
@endsection
