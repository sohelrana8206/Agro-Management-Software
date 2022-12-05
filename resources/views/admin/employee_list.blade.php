@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Employee List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Employee List</li>
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
                            <h2><strong>Employee</strong> List </h2>
                            <a class="header-dropdown" href="{{route('employee.create')}}"><button class="btn btn-default">+ Add Employee</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Mobile Number</th>
                                        <th>Employment Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Mobile Number</th>
                                        <th>Employment Type</th>
                                        <th>Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->designation}}</td>
                                            <td>{{$row->mobile}}</td>
                                            <td>{{$row->employment_type}}</td>
                                            <td>
                                                @if($row->status ==1)
                                                    {{'Active'}}
                                                @else {{'Inactive'}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('employee.show',$row->id)}}" title="Show">
                                                    <i class="material-icons">visibility</i>
                                                </a>

                                                <a href="{{route('employee.edit',$row->id)}}" title="Edit">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>

                                                <a style="cursor: pointer" class="del-employee" data-href="{{ route('employee.destroy', $row->id)}}" data-id="{{$row->id}}" title="Delete">
                                                    <i class="material-icons">delete</i>
                                                </a>

                                                <a data-id="{{$row->id}}" data-href="{{url('employees_payment_history')}}" class="payment_history" style="cursor: pointer">
                                                    <i class="material-icons">assignment</i>
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

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class=" payment_history_data">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>