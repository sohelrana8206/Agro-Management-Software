@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Insemination Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Insemination Add Form</li>
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
                            <h2><strong>Animal Insemination Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'inseminationStore', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Animal Name</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="animal_profile_id">
                                            @foreach($animal as $profile)
                                                <option value="{{$profile->id}}">{{$profile->animal_name.' ('.$profile->animal_registration_no.')'}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Insemination Date</b></p>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="insemination_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Insemination Company Name</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="insemination_company_id">
                                            @foreach($ins_company as $com)
                                                <option value="{{$com->id}}">{{$com->company_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Bull Name</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="bull_info_id">
                                            @foreach($bulls as $bull)
                                                <option value="{{$bull->id}}">{{$bull->bull_name.' ('.$bull->insemination_company->company_name.')'}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Insemination Status</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="insemination_status_birth_status">
                                            <option value="Inseminated">Inseminated</option>
                                            <option value="Failed Insemination - No Pregnancy">Failed Insemination - No Pregnancy</option>
                                            <option value="Success Insemination - Pregnant">Success Insemination - Pregnant</option>
                                            <option value="Failed Birth">Failed Birth</option>
                                            <option value="Successful Birth">Successful Birth</option>
                                        </select>
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