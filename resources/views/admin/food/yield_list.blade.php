@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Yield List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Yield List</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Yield List</strong></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Food Name</th>
                                        <th>Yield Name</th>
                                        <th>Yield Location</th>
                                        <th>Yield Size</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->food_inventory->food_name}}</td>
                                            <td>{{$row->yield_name}}</td>
                                            <td>{{$row->yield_location}}</td>
                                            <td>{{$row->yield_size}}</td>
                                            <td>
                                                @if(!empty($row->yield_rent_info))
                                                    <a style="cursor: pointer" data-href="{{url('rentalYieldList')}}" data-id="{{$row->id}}" class="btn btn-info rentalYieldList" title="Rental Yield List">
                                                        <i class="fa fa-list"></i>
                                                    </a>
                                                @else
                                                    <a style="cursor: pointer" data-href="{{url('ownYieldList')}}" data-id="{{$row->id}}" class="btn btn-primary ownYieldList" title="Own Yield List">
                                                        <i class="fa fa-file"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="yield_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="yield">

            </div>
        </div>
    </div>

@endsection