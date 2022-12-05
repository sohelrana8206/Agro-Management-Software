@extends('template.admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Physician List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Physician List</li>
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
                            <h2><strong>Animal Physician List</strong></h2>
                            <a class="header-dropdown" href="{{url('createPhysician')}}"><button class="btn btn-default">+ Add Physician</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Physician Name</th>
                                        <th>Physician Mobile</th>
                                        <th>Physician Job Type</th>
                                        <th>Physician's Organization Name</th>
                                        <th>Physician Address</th>
                                        <th>Physician Emergency Contact</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->physician_name}}</td>
                                            <td>{{$row->physician_phone	}}</td>
                                            <td>{{$row->physician_job_type}}</td>
                                            <td>{{$row->physician_organization_name}}</td>
                                            <td>{{$row->physician_address}}</td>
                                            <td>{{$row->physician_emergency_contact_number}}</td>
                                            <td>
                                                <a href="{{url('editAnimal/',$row->id)}}" title="Edit">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
                                                <a href="{{url('editAnimal/',$row->id)}}" title="Edit">
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