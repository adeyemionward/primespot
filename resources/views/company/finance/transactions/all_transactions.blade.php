
@extends('company.layout.master')
@section('content')
@section('title', 'All Customer')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Customer Payments</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('company.finance.transactions.add_transaction')}}"><li class="active btn btn-primary" style="">Add Customer Payment </li></a>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">
                        @include('company.includes.finance_date_range')
                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Company Name</th>
                                    <th>Payment Type</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalAmount = 0; @endphp
                                @foreach ($job_order_pay as $index => $val)
                                @php
                                    $totalAmount += $val->amount;
                                @endphp 
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$val->user->company_name}}</td>
                                        <td>{{$val->payment_type}}</td>
                                        <td>&#8358;{{number_format($val->amount)}}</td>
                                        <td>{{date('D M d, Y', strtotime($val->payment_date))}}</td>
                                    </tr>
                                @endforeach

                                <tfoot>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>Total Amount: &nbsp;&nbsp;&nbsp;<b>{{'₦'.number_format($totalAmount)}}</b></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

