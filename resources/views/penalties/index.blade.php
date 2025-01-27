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
                        <th>Year<br>(from)</th>
                        <th>Year<br>(To)</th>
                        <th>Jan<br>(%)</th>
                        <th>Feb<br>(%)</th>
                        <th>Mar<br>(%)</th>
                        <th>Apr<br>(%)</th>
                        <th>May<br>(%)</th>
                        <th>Jun<br>(%)</th>
                        <th>Jul<br>(%)</th>
                        <th>Aug<br>(%)</th>
                        <th>Sept<br>(%)</th>
                        <th>Oct<br>(%)</th>
                        <th>Nov<br>(%)</th>
                        <th>Dec<br>(%)</th>
                        <th>Action</th>

                    </tr>


                    @foreach($groupedPenalties as $penalty)
                    <tr>
                        <td>{{ (int) $penalty['term_from'] }}</td>
                        <td>{{ (int) $penalty['term_to'] }}</td>
                        <td>{{ (int) $penalty['jan'] }}%</td>
                        <td>{{ (int) $penalty['feb'] }}%</td>
                        <td>{{ (int) $penalty['mar'] }}%</td>
                        <td>{{ (int) $penalty['apr'] }}%</td>
                        <td>{{ (int) $penalty['may'] }}%</td>
                        <td>{{ (int) $penalty['jun'] }}%</td>
                        <td>{{ (int) $penalty['jul'] }}%</td>
                        <td>{{ (int) $penalty['aug'] }}%</td>
                        <td>{{ (int) $penalty['sept'] }}%</td>
                        <td>{{ (int) $penalty['oct'] }}%</td>
                        <td>{{ (int) $penalty['nov'] }}%</td>
                        <td>{{ (int) $penalty['dec'] }}%</td>

                        <td><button class="btn btn-sm btn-primary">Edit</button> <button
                                class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
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
                <form method="POST" action="{{ route('penalties.store') }}">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Term</label>
                                    <input type="number" class="form-control input-sm input-first" name="term" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Year (To) - (Optional)</label>
                                    <input type="number" class="form-control input-sm" name="to_year">
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                        <hr>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Jan(%)</label>
                                    <input type="number" class="form-control input-sm" name="jan" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Feb(%)</label>
                                    <input type="number" class="form-control input-sm" name="feb" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Mar(%)</label>
                                    <input type="number" class="form-control input-sm" name="mar" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Apr(%)</label>
                                    <input type="number" class="form-control input-sm" name="apr" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>May(%)</label>
                                    <input type="number" class="form-control input-sm" name="may" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Jun(%)</label>
                                    <input type="number" class="form-control input-sm" name="jun" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Jul(%)</label>
                                <input type="number" class="form-control input-sm" name="jul" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Aug(%)</label>
                                <input type="number" class="form-control input-sm" name="aug" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Sep(%)</label>
                                <input type="number" class="form-control input-sm" name="sept" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Oct(%)</label>
                                <input type="number" class="form-control input-sm" name="oct" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Nov(%)</label>
                                <input type="number" class="form-control input-sm" name="nov" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Dec(%)</label>
                                <input type="number" class="form-control input-sm" name="dec" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success" id="i-save">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--END OF PENALTIES MODAL-->
@endsection
