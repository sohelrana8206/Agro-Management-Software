@extends('template.admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Bull Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Bull Add Form</li>
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
                            <h2><strong>Bull Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'bullStore', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Bull Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="bull_name" placeholder="Bull Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Bull Registration Number</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="bull_registration_number" placeholder="Bull Registration Number">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Insemination Company</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="insemination_company_id">
                                            @foreach($insemination_company as $item)
                                                <option value="{{$item->id}}">{{$item->company_name}}</option>
                                            @endforeach
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