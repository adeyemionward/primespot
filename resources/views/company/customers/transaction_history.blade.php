
@extends('company.layout.master')
@section('content')
@section('title', 'Customer Transaction History')
@php $page = 'transaction'; @endphp
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Transaction Histrory for {{$customer->firstname.' '.$customer->lastname}} </h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Customer Transaction History</a></li>
                        <li class="breadcrumb-item active">All Orders</li>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.customers.side_inc')
                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="content" id="tableContent">

                                            <div class="canvas-wrapper">

                                                <table id="example" class="table no-margin" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Payment Type</th>
                                                            <th>Amount</th>
                                                            <th>Payment Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($job_pay_history as $index => $val)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$val->payment_type}}</td>
                                                                <td>&#8358;{{$val->amount}}</td>
                                                                <td>{{date('D M d, Y', strtotime($val->payment_date))}}</td>
                                                            </tr>
                                                        @endforeach


                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>

                <!-- 							Canvas Wrapper End -->

            </div>
        </div>

    </div>
@endsection

