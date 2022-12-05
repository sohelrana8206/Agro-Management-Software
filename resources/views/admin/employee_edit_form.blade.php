@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Employee Edit Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Employee Edit Form</li>
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
                            <h2><strong>Employee Edit</strong> Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('employee.update',$data->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Employee Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="employee_name" value="{{$data->name}}" placeholder="Enter Employee Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Employee Photo</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="photo" placeholder="Upload Employee Photo">
                                    </div>
                                    <img style="border: 1px solid #ccc;padding: 2px" width="80px" src="{{asset('public/uploads/employee/thumbnail/'.$data->image)}}">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Designation</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="designation" value="{{$data->designation}}" placeholder="Enter Designation">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Employment Type</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="emp_type" value="{{$data->employment_type}}" placeholder="Enter Employment Type">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Email Address</b></p>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Mobile Number</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mobile" value="{{$data->mobile}}" placeholder="Enter Mobile Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Present Address</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="present_address" rows="5" cols="10"> {{$data->address}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
@endsection