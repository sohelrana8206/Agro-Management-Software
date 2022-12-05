@extends('template/admin_master')
@section('content')
    <style>
        #general_info,#purchase,#hut,#farmer,#agent,#born{
            border: 1px solid #ccc;
            margin: 15px 0px;
            padding: 15px;
            border-radius: 20px;
        }
        #farmer,#agent,#born{
            display: none;
        }
    </style>

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Animal Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Animal Add Form</li>
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
                            <h2><strong>Animal Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'storeAnimal', 'files'=> true)) }}
                            <div id="general_info">
                                <h6><strong>Animal General Information</strong></h6><hr>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Animal Name</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_name" placeholder="Enter Animal Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Animal Photo</b></p>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="animal_pic" placeholder="Upload Animal Photo" required>
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
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Animal Registration No</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_registration_no" placeholder="Enter Animal Registration No" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Animal Birth Date</b></p>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="animal_birth_date" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Animal Age</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_age" placeholder="Animal Age" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Animal Gender</b></p>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <select class="form-control" name="animal_gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Animal Current Location</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_current_location" placeholder="Animal Current Location" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Animal Height</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_height" placeholder="Animal Height" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Animal Weight</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_weight" placeholder="Animal Weight" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Animal Color</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_color" placeholder="Animal Color" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Animal Teeth</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_teeth_availability" placeholder="Animal Teeth" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Animal Breed</b></p>
                                        <div class="form-group">
                                            <select class="form-control" name="animal_breed_id">
                                                @foreach($breed as $item)
                                                    <option value="{{$item->id}}">{{$item->breed_name.'('.$item->animal_type.')'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Animal Collecting Type</b></p>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <select class="form-control collection_type" name="collection_type">
                                                    <option value="1">purchase</option>
                                                    <option value="2">Born</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="purchase">
                                <h6><strong>Animal Purchase Information</strong></h6><hr>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Purchase Date</b></p>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="purchase_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Purchase Price</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="purchase_price" placeholder="Purchase Price">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Purchase From</b></p>
                                        <div class="form-group">
                                            <select class="form-control purchase_from" name="purchase_from">
                                                <option value="1">Hut</option>
                                                <option value="2">Farmer</option>
                                                <option value="3">Agent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div id="hut">
                                    <h6><strong>Hut/Bazar Information</strong></h6><hr>
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <p><b>Hur/Bazar Name</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="hut_bazar_name" placeholder="Hut/Bazar Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Animal Owner Name</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="animal_owner_name" placeholder="Animal Owner Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Animal Owner Phone</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="animal_owner_phone" placeholder="Animal Owner Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <p><b>Hur/Bazar Address</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" name="hut_bazar_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <p><b>Animal Previous History</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" name="animal_previous_history"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="farmer">
                                    <h6><strong>Farmer Information</strong></h6><hr>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <p><b>Farmer Name</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="farmer_name" placeholder="Farmer Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><b>Farmer Phone</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="farmer_phone" placeholder="Farmer Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <p><b>Farmer Address</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" name="farmer_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <p><b>Animal Previous History</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" name="animal_previous_history_farmer"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="agent">
                                    <h6><strong>Agent Information</strong></h6><hr>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <p><b>Agent Name</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="agent_name" placeholder="Agent Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><b>Agent Phone</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="agent_phone" placeholder="Agent Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <p><b>Agent Address</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" name="agent_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <p><b>Animal Owner Name</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="animal_owner_name_agent" placeholder="Animal Owner Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><b>Animal Owner Phone</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="animal_owner_phone_agent" placeholder="Animal Owner Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <p><b>Animal Owner Address</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" name="animal_owner_address_agent"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <p><b>Animal Previous History</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" name="animal_previous_history_agent"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="born">
                                <h6><strong>Animal Born Information</strong></h6><hr>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Animal Born Type</b></p>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <select class="form-control" name="animal_born_type">
                                                    <option value="natural">Natural</option>
                                                    <option value="manual">Manual</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Animal Maturity</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_maturity">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Estimated Price</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="animal_estimated_price" placeholder="Estimated Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Animal Born Status</b></p>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <select class="form-control" name="animal_born_status">
                                                    <option value="active">Active</option>
                                                    <option value="death">Death</option>
                                                    <option value="sick">Sick</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Physician</b></p>
                                        <div class="form-group">
                                            <select class="form-control" name="animal_physician_id">
                                                <option value="">Please Select Physician</option>
                                                @foreach($animal_physician as $physician)
                                                    <option value="{{$physician->id}}">{{$physician->physician_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Insemination Company</b></p>
                                        <div class="form-group">
                                            <select class="form-control" name="insemination_company_id">
                                                @foreach($insemination_company as $insemination)
                                                    <option value="{{$insemination->id}}">{{$insemination->company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Animal Mother Name</b></p>
                                        <div class="form-group">
                                            <select class="form-control" name="animal_mother_profile_id">
                                                @foreach($animal_mother as $mother)
                                                    <option value="{{$mother->id}}">{{$mother->animal_name.'('.$mother->animal_registration_no.')'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Bull Name</b></p>
                                        <div class="form-group">
                                            <select class="form-control" name="bull_info_id">
                                                @foreach($bull as $items)
                                                    <option value="{{$items->id}}">{{$items->bull_name.'('.$items->bull_registration_number.')'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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