@extends('template.admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Insemination Company List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Insemination Company List</li>
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
                            <h2><strong>Insemination Company List</strong></h2>
                            <a class="header-dropdown" href="{{url('createInseminationCompany')}}"><button class="btn btn-default">+ Add Company</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Company Mobile</th>
                                        <th>Company Email</th>
                                        <th>Company Address</th>
                                        <th>Company Representative Name</th>
                                        <th>Company Representative Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->company_name}}</td>
                                            <td>{{$row->company_phone}}</td>
                                            <td>{{$row->company_email}}</td>
                                            <td>{{$row->company_address}}</td>
                                            <td>{{$row->company_representative_name}}</td>
                                            <td>{{$row->company_representative_phone}}</td>
                                            <td>
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