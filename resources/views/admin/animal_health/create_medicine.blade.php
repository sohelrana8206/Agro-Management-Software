@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Medicine/Vaccine Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Medicine/Vaccine Add Form</li>
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
                            <h2><strong>Animal Medicine/Vaccine Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'medicineStore', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-8">
                                    <p><b>Animal Medicine/Vaccine Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="animal_medicine_vaccine_name" placeholder="Animal Medicine/Vaccine Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Animal Type</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="animal_type">
                                            <option value="Cow">Cow</option>
                                            <option value="Goat">Goat</option>
                                            <option value="Lamp">Lamb</option>
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