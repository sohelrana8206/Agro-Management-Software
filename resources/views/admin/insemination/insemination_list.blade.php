@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Insemination List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Insemination List</li>
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
                            <h2><strong>Animal Insemination List</strong></h2>
                            <a class="header-dropdown" href="{{url('createInsemination')}}"><button class="btn btn-default">+ Add Insemination Info</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Animal Name</th>
                                        <th>Insemination Date</th>
                                        <th>Insemination Company</th>
                                        <th>Bull Name</th>
                                        <th>Insemination Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->animal_profile->animal_name.' ('.$row->animal_profile->animal_registration_no.')'}}</td>
                                            <td>{{date('d F, Y',strtotime($row->insemination_date))}}</td>
                                            <td><?=$row->insemination_company->company_name?></td>
                                            <td>{{$row->bull_info->bull_name.' ('.$row->bull_info->bull_registration_number.')'}}</td>
                                            <td><?=$row->insemination_status_birth_status?></td>
                                            <td>
                                                <a href="{{url('editInsemination/',$row->id)}}" title="Edit">
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