@extends('template/admin_master')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>User Registration Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">User Registration</li>
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
                            <h2><strong>Registration</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('route' => 'user.store')) }}
                            @if ($message = Session::get('success'))
                                <div class="alert alert-warning alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if(count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <p><b>Name</b></p>
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p><b>Email Address</b></p>
                                    <div class="form-group">
                                        <input type="email" id="email_address" name="email" class="form-control" placeholder="Enter your email address">
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <p><b>Password</b></p>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p><b>Re-Password</b></p>
                                    <div class="form-group">
                                        <input type="password" id="re-password" name="re_password" class="form-control" placeholder="Enter your re-password">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">REGISTRATION</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
@endsection