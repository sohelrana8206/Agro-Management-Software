@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Accounts Head
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Accounts Head</li>
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
                            <h2><strong>Accounts</strong> Head </h2>
                            <a class="header-dropdown" href="{{route('accounts_head.create')}}"><button class="btn btn-default">+ Add Accounts Head</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Accounts Head Name</th>
                                        <th>Accounts Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Accounts Head Name</th>
                                        <th>Accounts Type</th>
                                        <th>Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->account_title}}</td>
                                            <td>{{$row->get_accounts_type->account_type_name}}</td>
                                            <td>
                                                @if($row->status ==1)
                                                   {{'Active'}}
                                                    @else {{'Inactive'}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('accounts_head.edit',$row->id)}}" title="Edit">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
                                                <a style="cursor: pointer" class="del-head" data-href="{{ route('accounts_head.destroy', $row->id)}}" data-id="{{$row->id}}" title="Delete">
                                                    <i class="material-icons">delete</i>
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