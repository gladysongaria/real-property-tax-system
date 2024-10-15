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
            <button type="button" class="btn btn-cust btn-lg" id="cust_but" data-bs-toggle="modal"
                data-bs-target="#taxpayment">PAY TAXES</button>
        </div>
    </div>

    <!--PAY TAXES MODAL-->
<div class="modal fade" id="taxpayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background: #459b96;">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>TAX PAYMENT</strong></h1>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="tpn" class="form-label"><strong>Tax Payer Name</strong></label>
                                <input type="email" class="form-control" id="taxpayername">
                            </div>
                        </div>

                        <div class="col-2"></div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="orno" class="form-label"><strong>OR No.</strong></label>
                                <input type="orno" class="form-control" id="orno">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="ordate" class="form-label"><strong>OR Date</strong></label>
                                <input type="ordate" class="form-control" id="ordate">
                            </div>
                        </div>
                    </div>

                    <p><strong>Queued Property/ies</strong></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Tax Declaration</th>
                                <th scope="col">Barangay</th>
                                <th scope="col">Assessed Value</th>
                                <th scope="col">Term</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09851456</td>
                                <td>Madongo</td>
                                <td>2023</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                           
                        </tbody>
                    </table>
                    <br>
                    <div class="col-4">
                        <label for="selectProperties" class="form-label"><strong>Select Property/ies</strong></label>

                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Owner/s</th>
                                <th scope="col">Tax Declaration</th>
                                <th scope="col">Location</th>
                                <th scope="col">Barangay</th>
                                <th scope="col">Assessed Value</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@mdo</td>
                                <td>@fat</td>
                            </tr>
                         
                        </tbody>
                    </table>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <button class="btn  btn-lg" id="cust_but" type="button">PAY TAX</button>
                    </div>
                  </form>

                
            </div>
        </div><!--modal-content-->
    </div><!--modal-dialog-->
</div><!--END OF PAY TAXES MODAL-->
    
    
</div>

@endsection
