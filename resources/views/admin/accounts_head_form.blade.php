@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Accounts Head Create Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Accounts Head Create Form</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Accounts Head Create</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('route' => 'accounts_head.store')) }}
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Accounts Head Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="accounts_head" placeholder="Enter Accounts Head Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Accounts Type</b></p>
                                    <select class="form-control show-tick" name="accounts_type">
                                        <option value="">Please Select</option>
                                        @foreach($accounts_type as $type)
                                            <option value="{{$type->id}}">{{$type->account_type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">ADD</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
@endsection