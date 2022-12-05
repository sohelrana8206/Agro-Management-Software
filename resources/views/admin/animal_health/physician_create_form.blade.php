@extends('template.admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Physician Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Physician Add Form</li>
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
                            <h2><strong>Animal Physician Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'physicianStore', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Physician Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="physician_name" placeholder="Enter Physician Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Physician Phone</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="physician_phone" placeholder="Physician Phone" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Physician Job Type</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="physician_job_type">
                                            <option value="full_time">Full Time</option>
                                            <option value="part_time">Part Time</option>
                                            <option value="contractual">Contractual</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Physician Organization Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="physician_organization_name" placeholder="Enter Physician Organization Name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Physician's Emergency Contact Number</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="physician_emergency_contact_number" placeholder="Physician's Emergency Contact Number">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Physician NID Number</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="physician_nid" placeholder="Physician NID Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Physician Photo</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="physician_photo">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Physician NID Photo</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="physician_nid_image">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Physician Address</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="physician_address"></textarea>
                                    </div>
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