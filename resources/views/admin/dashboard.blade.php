@extends('template/admin_master')
@section('content')
    <section class="content home">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard
                        <small class="text-muted">Welcome to Compass</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Compass</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card widget_2">
                <ul class="row clearfix list-unstyled m-b-0">
                    <li class="col-lg-3 col-md-6 col-sm-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0">Traffic</h5>
                                    <p class="text-small">4% higher than last month</p>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="">20</h2>
                                    <small class="info">of 1Tb</small>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 col-sm-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0">Sales</h5>
                                    <p class="text-small">6% higher than last month</p>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="">12%</h2>
                                    <small class="info">of 100</small>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 38%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 col-sm-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0">Email</h5>
                                    <p class="text-small">Total Registered email</p>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="">39</h2>
                                    <small class="info">of 100</small>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 39%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 col-sm-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0">Domians</h5>
                                    <p class="text-small">Total registered Domain</p>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="">8</h2>
                                    <small class="info">of 10</small>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection