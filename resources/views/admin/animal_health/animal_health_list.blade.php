@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Health List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Health List</li>
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
                            <h2><strong>Animal Health List</strong></h2>
                            <a class="header-dropdown" href="{{url('createHealth')}}"><button class="btn btn-default">+ Add Health</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Animal Name</th>
                                        <th>Animal Health Condition</th>
                                        <th>Start Date Time</th>
                                        <th>Note</th>
                                        <th>Treatment</th>
                                        <th>Health Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->animal_profile->animal_name.' ('.$row->animal_profile->animal_registration_no.')'}}</td>
                                            <td>{{$row->animal_health_condition->animal_health_condition_name}}</td>
                                            <td>{{date('d F, Y',strtotime($row->start_date)).' '.date('h:i:s a',strtotime($row->start_time))}}</td>
                                            <td><?=$row->note?></td>
                                            <td><?=$row->treatment?></td>
                                            <td><?=$row->animal_health_status?></td>
                                            <td>
                                                <a href="{{url('editHealth/',$row->id)}}" title="Edit">
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