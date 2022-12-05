@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal List</li>
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
                            <h2><strong>Animal List</strong></h2>
                            <a class="header-dropdown" href="{{url('createAnimal')}}"><button class="btn btn-default">+ Add Animal</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Animal Name</th>
                                        <th>Animal Type</th>
                                        <th>Animal Registration No</th>
                                        <th>Animal Age</th>
                                        <th>Animal Gender</th>
                                        <th>Animal Breed</th>
                                        <th>Animal Status</th>
                                        <th>Purchase/Born</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->animal_name}}</td>
                                            <td>{{$row->animal_type}}</td>
                                            <td>{{$row->animal_registration_no}}</td>
                                            <td>{{$row->animal_age}}</td>
                                            <td>{{$row->animal_gender}}</td>
                                            <td>{{$row->animal_breed->breed_name}}</td>
                                            <td>{{$row->animal_inventory->animal_status}}</td>
                                            <td>
                                                @if(!empty($row->purchase))
                                                    <strong>{{'Purchase'}}</strong>
                                                @else
                                                    <strong>{{'Born'}}</strong>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('viewAnimalProfile/',$row->id)}}" title="Profile">
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