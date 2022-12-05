@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Breed Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Breed Add Form</li>
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
                            <h2><strong>Animal Breed Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'animalBreedStore', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Breed Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="breed_name" placeholder="Enter Breed Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Breed Nationality</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="breed_nationality" placeholder="Breed Nationality" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Animal Type</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="animal_type">
                                            <option value="cow">Cow</option>
                                            <option value="goat">Goat</option>
                                            <option value="lamb">Lamb</option>
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