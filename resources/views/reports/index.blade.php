@extends('master')
@section('content')

<div class=" content_custi" style="width: 100%;">
    <div class="container">
        <div class=" content p-5">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="card cust_cards"
                            style="padding: 40px 20px 40px 20px;border-radius: 40px 40px 0px 0px; background: #2b7b95; color:white;">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <center>
                                        <h3 style=" color:white;">
                                            <strong>P 400,203.49</strong>
                                        </h3>
                                    </center>

                                </h6>
                            </div>
                        </div>
                        <h4>
                            <centeR>Daily Collection</centeR>
                        </h4>
                    </div>
                    <div class="col-4">
                        <div class="card cust_cards"
                            style="padding: 40px 20px 40px 20px;border-radius: 40px 40px 0px 0px; background:rgb(149, 43, 64); color:white;">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <center>
                                        <h3 style=" color:white;"><strong>P 400,203.49</strong></h3>
                                    </center>
                                </h6>
                            </div>
                        </div>
                        <h4>
                            <centeR>Monthly Collection</centeR>
                        </h4>
                    </div>
                    <div class="col-4">
                        <div class="card cust_cards"
                            style="padding: 40px 20px 40px 20px;border-radius: 40px 40px 0px 0px; background:rgb(171, 139, 51); color:white;">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <center>
                                        <h3 style=" color:white;"><strong>P 400,203.49</strong></h3>
                                    </center>
                                </h6>
                            </div>
                        </div>
                        <h4>
                            <centeR>Quarterly Collection</centeR>
                        </h4>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="col-4 offset-1">
                    <div class="card cust_cards"
                        style="padding: 40px 20px 40px 20px;border-radius: 40px 40px 0px 0px; background:rgb(21, 191, 210); color:white;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">
                                <center>
                                    <h2 style=" color:white;"><strong>3</strong></h2>
                                </center>
                            </h6>
                        </div>
                    </div>
                    <h4>
                        <centeR>New Property</centeR>
                    </h4>
                </div>
                <div class="col-4 ">
                    <div class="card cust_cards"
                        style="padding: 40px 20px 40px 20px;border-radius: 40px 40px 0px 0px; background:rgb(21, 191, 210); color:white;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">
                                <center>
                                    <h2 style=" color:white;"><strong>3</strong></h2>
                                </center>
                            </h6>
                        </div>
                    </div>
                    <h4>
                        <centeR>No. of Delinquents</centeR>
                    </h4>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-2 ">
                    <h4>
                        <centeR> <a href="#" class="btn btn-default"><i class="bi bi-houses"
                                    style=" color:rgb(7, 117, 35); font-size:6rem"></i><strong>BLGF</strong></a>
                        </centeR>
                    </h4>
                </div>
                <div class="col-2  offset-1">
                    <h4>
                        <centeR> <a href="#" class="btn btn-default"><i class="bi bi-cash"
                                    style=" color:rgb(7, 117, 35); font-size:6rem"></i><strong>Tax Roll</strong></a>
                        </centeR>
                    </h4>
                </div>
                <div class="col-2 ">
                    <h4>
                        <centeR> <a href="#" class="btn btn-default"><i class="bi bi-house-fill"
                                    style=" color:rgb(7, 117, 35); font-size:6rem"></i><strong>Brgy Share</strong></a>
                        </centeR>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END OF REPORTS  MODAL-->
@endsection