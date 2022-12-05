@extends('template/admin_master')
@section('content')
    <style>
        #animal-profile{
            display: none;
        }
    </style>
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Transaction Add Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">CTransaction Add Form</li>
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
                            <h2><strong>Transaction Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('route' => 'transactions.store')) }}
                            <div class="debit-row">
                                <div class="row clearfix">
                                    <div class="col-sm-8">
                                        <p><b>Accounts Head - Debit</b></p>
                                        <select class="form-control show-tick acc_head" data-href="{{ url('accountTypeByAjax')}}" name="acc_head_dr_id">
                                            <option value="">Please Select</option>
                                            @foreach($accounts_head as $accounts)
                                                <option value="{{$accounts->id}}">
                                                    {{$accounts->account_title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Debit</b></p>
                                        <input type="text" class="form-control" name="dr" value="Debit" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-sm-8">
                                        <p><b>Accounts Head - Credit</b></p>
                                        <select class="form-control show-tick acc_head" data-href="{{ url('accountTypeByAjax')}}" name="acc_head_cr_id">
                                            <option value="">Please Select</option>
                                            @foreach($accounts_head as $accounts)
                                                <option value="{{$accounts->id}}">
                                                    {{$accounts->account_title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Credit</b></p>
                                        <input type="text" class="form-control" name="cr" value="Credit" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div id="animal-profile">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <p><b>Animal Name</b></p>
                                        <div class="form-group">
                                            <select class="form-control" name="animal_profile_id">
                                                @foreach($animal as $profile)
                                                    <option value="{{$profile->id}}">{{$profile->animal_name.' ('.$profile->animal_registration_no.')'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Amount</b></p>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="tran_amount" placeholder="Enter Transaction Amount">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Transaction Date</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="tran_date" placeholder="Please Choose Transaction Date">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Narration</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="narration" placeholder="Please Comments Transaction History">
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