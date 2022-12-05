@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Transactions List
                        <small class="text-muted">Bismillah Agro & Varieties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Transactions List</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Transactions</strong> List </h2>
                            <a class="header-dropdown" href="{{route('transactions.create')}}"><button class="btn btn-default">+ Add Transaction</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>SR. NO</th>
                                        <th>Transaction Date</th>
                                        <th>Accounts Head</th>
                                        <th>Debit/Credit</th>
                                        <th>Amount</th>
                                        <th>Comments</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 1;
                                    ?>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$counter}}</td>
                                            <td>{{date('l d F Y',strtotime($row->transaction_date))}}</td>
                                            <td>{{$row->account_head->account_title}}</td>
                                            <td>{{$row->amount}}</td>
                                            <td>{{$row->dr_cr}}</td>
                                            <td>{{$row->narration}}</td>
                                            <td>
                                                <a href="{{route('transactions.edit',$row->id)}}" title="Edit">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $counter++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection