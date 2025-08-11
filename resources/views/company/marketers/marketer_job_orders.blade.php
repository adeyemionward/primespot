
@extends('company.layout.master')
@section('content')
@section('title', 'View Customer')
@php $page = 'orders'; @endphp


    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Marketer</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">All Customers</li>
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


                                                <table id="example" class="table no-margin" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Job&nbsp;Type</th>
                                                            <th>Quantity</th>
                                                            {{-- <th>Ink</th>
                                                            <th>Paper&nbsp;Type</th> --}}
                                                            {{-- <th>Production&nbsp;Days</th> --}}
                                                            <th>Cost</th>
                                                            <th>Percentage (%)</th>
                                                            <th>Commission</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $total_commission = 0; @endphp
                                                        @foreach ($job_orders as $index => $val)
                                                        @php $job_title = str_replace(' ','_', $val->jobDetails->job_order_name); $total_commission += ($val->percentage/100)*$val->jobDetails->total_cost   @endphp
                                                            <tr>
                                                                <td>{{$index+1}}</td>
                                                                {{-- <td>{{$val->user->firstname.' '. $val->user->lastname}}</td> --}}
                                                                <td>{{$val->jobDetails->job_order_name}}</td>
                                                                {{-- <td>
                                                                    @if($val->cart_order_status == 1)
                                                                    <span style="color:blue; ">In cart </span>
                                                                    @elseif($val->cart_order_status ==2)
                                                                    <span style="color:green;">Completed </span>
                                                                    @endif

                                                                </td> --}}
                                                                <td>{{$val->jobDetails->quantity}}</td>
                                                                {{-- <td>{{$val->jobDetails->ink}}</td>
                                                                <td>{{$val->jobDetails->paper_type}}</td> --}}
                                                                {{-- <td>{{$val->jobDetails->production_days}}</td> --}}
                                                                <td>{{'₦'.$val->jobDetails->total_cost}} </td>
                                                                <td>{{$val->percentage}}</td>
                                                                <td>
                                                                {{'₦'.($val->percentage/100)*$val->jobDetails->total_cost}}
                                                                </td>
                                                                <td>{{$val->jobDetails->status}}</td>
                                                                <td><a href="{{route('company.job_order.view_order',[$job_title, $val->id])}}"><span><i class="fa fa-eye"></i></span></a></td>
                                                            </tr>

                                                        @endforeach
                                                         <tfoot>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td style="font-weight:bolder">Total: {{'₦'.$total_commission}} </td>
                                                                    <td>&nbsp;</td>
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
            </div>
        </div>
    </div>
@endsection


