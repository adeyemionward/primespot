
@extends('company.layout.master')
@section('content')
@section('title', 'All Customer')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">All Orders</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Job Order</a></li>
                        <li class="breadcrumb-item active">All Orders</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">
                        @include('company.includes.order_date_range')

                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Job ID</th>
                                    <th>Invoice No</th>
                                    <th>Customer Name</th>
                                    <th>Job Type</th>
                                    <th>Cart Status</th>
                                    {{-- <th>Quantity</th> --}}
                                    <th>Total Cost</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_orders as $index => $val)
                                    @php $job_title = str_replace(' ','_', $val->job_order_name)   @endphp
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>#{{$val->id}}</td>
                                        <td>#{{$val->order_no ?? 'None'}}</td>
                                        <td>{{$val->user->firstname.' '. $val->user->lastname}}</td>
                                        <td>{{$val->order_type}}</td>
                                         <td>
                                            @if($val->cart_order_status == 1)
                                            <span style="color:blue; ">In cart </span>
                                            @elseif($val->cart_order_status ==2)
                                            <span style="color:green;">Completed </span>
                                            @endif
                                        </td>
                                        {{-- <td>{{ $val->jobOrders->sum('quantity') }}</td> --}}
                                        {{-- <td>{{$val->production_days}}</td> --}}
                                        <td>{{'₦'.$val->total_cost}} </td>
                                        <td>{{$val->status}}</td>
                                        <td><a href="{{route('company.job_order.view_order',$val->id)}}"><span><i class="fa fa-eye"></i></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

