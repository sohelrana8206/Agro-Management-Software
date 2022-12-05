@extends('template.admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Insemination Company Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Insemination Company Add Form</li>
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
                            <h2><strong>Insemination Company Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'inseminationCompanyStore', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Company Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Company Phone</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company_phone" placeholder="Company Phone">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Company Email</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company_email" placeholder="Company Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Company Representative Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company_representative_name" placeholder="Company Representative Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Company Representative Phone</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company_representative_phone" placeholder="Company Representative Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Company Address</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="company_address"></textarea>
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