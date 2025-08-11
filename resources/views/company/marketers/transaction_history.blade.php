
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
                        <li class="breadcrumb-item"><a href="#"> Marketer Transaction History</a></li>
                        <li class="breadcrumb-item active">All Orders</li>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.marketers.side_inc')
                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="content" id="tableContent">

                                            <div class="canvas-wrapper">

                                                @php $total_commission = 0; @endphp
                                                @foreach ($job_orders as $index => $val)
                                                    @php $total_commission += ($val->percentage/100)*$val->jobDetails->total_cost   @endphp
                                                @endforeach
                                                <table id="example" class="table no-margin" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Payment Type</th>
                                                            <th>Payout</th>
                                                            <th>Payment Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $payout_commission = 0;   @endphp
                                                        @foreach ($job_pay_history as $index => $val)
                                                            @php $payout_commission += ($val->amount_paid)@endphp
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$val->payment_type}}</td>
                                                                <td>&#8358;{{number_format($val->amount_paid)}}</td>
                                                                <td>{{ $val->created_at->format('d-m-Y') }}</td>
                                                            </tr>
                                                        @endforeach

                                                        <tfoot>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td style="font-weight:bolder">Total Outstanding: {{'₦'.number_format($total_commission - $payout_commission)}}</td>
                                                                    <td style="font-weight:bolder">Total Payout: {{'₦'.number_format($payout_commission)}} </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </tfoot>
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

