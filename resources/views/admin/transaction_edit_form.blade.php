@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Transactions Edit Form
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Transactions Edit Form</li>
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
                            <h2><strong>Transactions Edit</strong> Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('transactions.update',$data->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="debit-row">
                                    <div class="row clearfix">
                                        <div class="col-sm-8">
                                            <p><b>Accounts Head</b></p>
                                            <select class="form-control show-tick acc_head" data-href="{{ url('accountTypeByAjax')}}" name="acc_head_id">
                                                <option value="">Please Select</option>
                                                @foreach($accounts_head as $accounts)
                                                    <option @if($data->account_head_id == $accounts->id) {{'selected="selected"'}} @endif value="{{$accounts->id}}">
                                                        {{$accounts->account_title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><b>Debit</b></p>
                                            <input type="text" class="form-control" name="dr_cr" value="{{$data->dr_cr}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Amount</b></p>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="tran_amount" value="{{$data->amount}}" placeholder="Enter Transaction Amount">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Transaction Date</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control datetimepicker" name="tran_date" value="{{date('l d F Y',strtotime($data->transaction_date))}}" placeholder="Please Choose Transaction Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <p><b>Narration</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="narration" value="{{$data->narration}}" placeholder="Please Comments Transaction History">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
@endsection