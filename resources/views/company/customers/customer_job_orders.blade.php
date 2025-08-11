
@extends('company.layout.master')
@section('content')
@section('title', 'Customer Job Orders')
@php $page = 'orders'; @endphp
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Job Orders for {{$customer->firstname.' '.$customer->lastname}} </h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Customer Job Order</a></li>
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
                                                            <th>Order&nbsp;No</th>
                                                            <th>Customer</th>
                                                            <th>Total</th>
                                                            <th>Status</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($job_orders as $index => $val)
                                                        @php $job_title = str_replace(' ','_', $val->job_order_name)   @endphp
                                                            <tr>
                                                                <td>{{$index+1}}</td>

                                                                <td>#{{$val->order_no}}</td>
                                                                <td>{{$val->user->company_name}}</td>
                                                                <td>{{'₦'.$val->total_cost}} </td>
                                                                <td>
                                                                    {{-- {{$val->cart_order_status}} --}}
                                                                    @if($val->cart_order_status == 1)
                                                                        <span style="color:blue; ">In cart </span>
                                                                    @elseif($val->cart_order_status ==2)
                                                                        <span style="color:green;">Completed </span>
                                                                    @endif
                                                                </td>
                                                                <td>{{$val->created_at}}</td>
                                                                <td><a href="{{route('company.job_order.view_order',[$val->id])}}"><span><i class="fa fa-eye"></i></span></a></td>
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

