@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Breed List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Inventory</li>
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
                            <h2><strong>Animal Inventory</strong></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Animal Name</th>
                                        <th>Animal Type</th>
                                        <th>Estimated Price</th>
                                        <th>Status</th>
                                        <th>Purchase/Born</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->animal_profile->animal_name.' ('.$row->animal_profile->animal_registration_no.')'}}</td>
                                            <td>{{$row->animal_profile->animal_type}}</td>
                                            <td>{{$row->estimated_price}}</td>
                                            <td>{{$row->animal_status}}</td>
                                            <td>
                                                @if($row->collection_type == 1)
                                                    <strong>{{'Purchase'}}</strong>
                                                @else
                                                    <strong>{{'Born'}}</strong>
                                                @endif
                                            </td>
                                            <td>
                                                @if(($row->animal_status == 'active') || $row->animal_status == 'sick')
                                                    <a style="cursor: pointer" data-href="{{url('editAnimalStatus')}}" data-id="{{$row->id}}" class="editAnimalStatus" title="Update Status">
                                                        <i class="material-icons">mode_edit</i>
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
    <div class="modal fade" id="animal-status-update_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="animal-status">

            </div>
        </div>
    </div>

@endsection