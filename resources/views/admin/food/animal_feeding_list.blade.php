@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Feeding List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Feeding List</li>
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
                            <h2><strong>Animal Feeding List</strong></h2>
                            <a class="header-dropdown" href="{{url('createAnimalFeeding')}}"><button class="btn btn-default">+ Add Animal Feeding Info</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Animal Name</th>
                                        <th>Food Name</th>
                                        <th>Food Quantity</th>
                                        <th>Food Cost</th>
                                        <th>Feeding Time</th>
                                        <th>Responsible Employee</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->animal_profile->animal_name}}</td>
                                            <td>{{$row->food_inventory->food_name}}</td>
                                            <td>{{$row->food_quantity}}</td>
                                            <td>{{$row->food_cost}}</td>
                                            <td>{{date('d F, Y h:i:s a',strtotime($row->feeding_time))}}</td>
                                            <td>{{$row->employee->name}}</td>
                                            <td>
                                                <a href="{{url('editAnimaFeeding/',$row->id)}}" title="Edit">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
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

@endsection