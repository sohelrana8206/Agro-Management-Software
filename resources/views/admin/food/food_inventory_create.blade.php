@extends('template/admin_master')
@section('content')
    <style>
        #general_info,#purchase,#yield,#yield-purchase,#rent-yield{
            border: 1px solid #ccc;
            margin: 15px 0px;
            padding: 15px;
            border-radius: 20px;
        }
        #yield,#yield-purchase{
            display: none;
        }
    </style>

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Food Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Food Add Form</li>
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
                            <h2><strong>Food Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('url' => 'storeFoodInventory', 'files'=> true)) }}
                            <div id="general_info">
                                <h6><strong>Food General Information</strong></h6><hr>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Food Name</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="food_name" placeholder="Enter Food Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Food Quantity</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="food_quality" placeholder="Food Quality" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Food Quantity</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="food_quantity" placeholder="Food Quantity" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Food Cost</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="food_cost" placeholder="Food Cost" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Collection From</b></p>
                                        <div class="form-group">
                                            <select class="form-control collectionForm" name="collectionForm">
                                                <option value="1">Purchase</option>
                                                <option value="2">Yield</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="purchase">
                                <h6><strong>Food Purchase Information</strong></h6><hr>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Supplier Name</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="food_supplier_name" placeholder="Supplier Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Supplier Phone</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="food_supplier_phone" placeholder="Supplier Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <p><b>Supplier Address</b></p>
                                        <div class="form-group">
                                            <textarea class="form-control" name="food_supplier_address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="yield">
                                <h6><strong>Yield Information</strong></h6><hr>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Yield Name</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="yield_name" placeholder="Yield Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Yield Location</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="yield_location" placeholder="Yield Location">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Yield Size</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="yield_size" placeholder="Yield Size">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Yield Ownership Type</b></p>
                                        <div class="form-group">
                                            <select class="form-control yieldOwnership" name="yieldOwnership">
                                                <option value="1">Rent</option>
                                                <option value="2">Purchase</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div id="rent-yield">
                                    <h6><strong>Yield Rent Information</strong></h6><hr>
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <p><b>Yield Owner Name</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="yield_owner_name" placeholder="Yield Owner Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Yield Owner Phone</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="yield_owner_phone" placeholder="Yield Owner Phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Yield Owner Address</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="yield_owner_address" placeholder="Yield Owner Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <p><b>Yield Rent Start Date</b></p>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="yield_rent_start_date">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Yield Rent End Date</b></p>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="yield_rent_end_date">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Yield Rent Cost</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="yield_rent_cost" placeholder="Yield Rent Cost">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="yield-purchase">
                                    <h6><strong>Yield Purchase Information</strong></h6><hr>
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <p><b>Previous Yield Owner Name</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="previous_yield_owner_name" placeholder="Previous Yield Owner Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Yield Purchase Date</b></p>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="yield_purchase_date">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Yield Purchase Cost</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="yield_purchase_cost" placeholder="Yield Purchase Cost">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <p><b>Previous Yield Owner Address</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" name="previous_yield_owner_address"></textarea>
                                            </div>
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