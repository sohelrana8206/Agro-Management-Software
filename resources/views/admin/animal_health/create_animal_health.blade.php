@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Health Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Health Add Form</li>
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
                            <h2><strong>Animal Health Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'healthStore', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Animal Name</b></p>
                                    <select class="form-control" name="animal_profile_id">
                                        @foreach($animal as $profile)
                                            <option value="{{$profile->id}}">{{$profile->animal_name.' ('.$profile->animal_registration_no.')'}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Animal Health Condition</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="animal_health_condition_id">
                                            @foreach($health_condition as $health)
                                                <option value="{{$health->id}}">{{$health->animal_health_condition_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Start Date</b></p>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="start_date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Start Time</b></p>
                                    <div class="form-group">
                                        <input type="time" class="form-control" name="start_time">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Note</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="note"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Treatment</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="treatment"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Medicine/Vaccine</b></p>
                                    <select class="form-control" name="animal_medicine_vaccine_id">
                                        @foreach($vaccine as $vacc)
                                            <option value="{{$vacc->id}}">{{$vacc->animal_medicine_vaccine_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Physician Name</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="animal_physician_id">
                                            @foreach($physician as $phy)
                                                <option value="{{$phy->id}}">{{$phy->physician_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Animal Visit Date Time</b></p>
                                    <div class="form-group">
                                        <input type="datetime-local" class="form-control" name="animal_visit_date_time">
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Physician Comments</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="physician_comments"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Responsible Employee</b></p>
                                    <select class="form-control" name="employee_id">
                                        @foreach($emp as $employee)
                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Treatment Action Status</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="treatment_status">
                                            <option value="Pending">Pending</option>
                                            <option value="Complete">Complete</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Treatment Action Note</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="treatment_action_note"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Animal Health Status</b></p>
                                    <select class="form-control" name="animal_health_status">
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
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