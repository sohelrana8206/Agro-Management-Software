@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Feeding Info Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Feeding Info Add Form</li>
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
                            <h2><strong>Animal Feeding Info Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'animalFeedingStore', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Animal Name</b></p>
                                    <select class="form-control" name="animal_profile_id">
                                        @foreach($animal as $profile)
                                            <option value="{{$profile->id}}">{{$profile->animal_name.' ('.$profile->animal_registration_no.')'}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Food Name</b></p>
                                    <div class="form-group">
                                        <select class="form-control" name="food_inventory_id">
                                            @foreach($food_inventory as $food)
                                                <option value="{{$food->id}}">{{$food->food_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Food Quantity</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="food_quantity" placeholder="Food Quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Food Cost</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="food_cost" placeholder="Food Cost">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Feeding Time</b></p>
                                    <div class="form-group">
                                        <input type="datetime-local" class="form-control" name="feeding_time">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Responsible Employee</b></p>
                                    <select class="form-control" name="employee_id">
                                        @foreach($employee as $emp)
                                            <option value="{{$emp->id}}">{{$emp->name}}</option>
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