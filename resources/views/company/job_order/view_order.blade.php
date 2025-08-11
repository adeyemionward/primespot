
@extends('company.layout.master')
@section('content')
@section('title', 'Job Order')
@php $page = 'view_order' @endphp
<style>
    .question{
        color:red;
        font-weight: bold;
        width: 20% !important;
    }
    th, td {
  padding: 5px;
}
</style>
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Job Order</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Job Order</li>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.job_order.job_order_view_inc')

                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">View Job Order</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 ">
                                                            <div class="col-md-12">
                                                                <table width="100%"  class="details">
                                                                    <tr class="det">
                                                                      <td width="10%" class="question">Job Id :</td>
                                                                      <td>{{$job_order->id ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%" class="question">Created By :</td>
                                                                        <td>{{@$job_order->createdBy->firstname.' '.@$job_order->createdBy->lastname ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Created At :</td>
                                                                        <td>{{$job_order->created_at ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Updated By :</td>
                                                                        <td>{{@$job_order->updatedBy->firstname.' '.@$job_order->updatedBy->lastname ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Updated At :</td>
                                                                        <td>{{$job_order->updated_at ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Customer Name :</td>
                                                                       <td> <a style="text-decoration:underline; color:blue" href="{{route('company.customers.view_customer',$job_order->user_id)}}">{{$job_order->user->firstname.' '.$job_order->user->lastname ?? 'N/A'}}</a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%" class="question">Status :</td>
                                                                        <td>{{$job_order->status ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    {{-- <tr class="det">
                                                                        <td width="10%" class="question">Job Order Type :</td>
                                                                        <td>{{$job_order->job_order_name ?? 'N/A'}}</td>
                                                                    </tr> --}}
                                                                    {{-- <tr>
                                                                        <td width="10%" class="question">Location :</td>
                                                                        <td>{{$job_order->location->city ?? 'N/A'}}</td>
                                                                    </tr> --}}
                                                                    <tr class="det">
                                                                        {{-- <td width="10%" class="question">Quantity :</td> --}}
                                                                        {{-- <td>{{ $job_order->jobOrders->sum('quantity') }}</td> --}}
                                                                    </tr>

                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Total Cost :</td>
                                                                        <td>&#8358;{{number_format($job_order->total_cost) ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Current Amount Paid:</td>
                                                                        <td>&#8358;{{number_format($job_order_pay->amount) ?? 0.00}}</td>
                                                                    </tr>
                                                                    {{-- <tr class="det">
                                                                        <td width="10%" class="question">Transaction Status:</td>
                                                                        <td>
                                                                            @if($job_order_pay->amount < $job_order->total_cost)
                                                                                Partial Payment
                                                                            @elseif($job_order_pay->amount > $job_order->total_cost)
                                                                                Over Payment
                                                                            @elseif($job_order_pay->amount == $job_order->total_cost)
                                                                                Fully Paid
                                                                            @endif
                                                                                <small style="text-decoration: underline; color:blue"><a href="{{route('company.job_order.transaction_history',[request()->job_title,request()->id])}}">See History</a></small>
                                                                        </td>
                                                                    </tr> --}}
                                                                </table>
                                                                </div>
                                                        </div>
                                                        <hr/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-xl-12">
                                                            <div class="card">
                                                                <div class="content" id="tableContent">

                                                                    <div class="canvas-wrapper">

                                                                        <table id="example" class="table no-margin" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>S/N</th>
                                                                                    {{-- <th>Customer&nbsp;Name</th> --}}
                                                                                    <th>Job&nbsp;Type</th>
                                                                                    {{-- <th>Cart&nbsp;Status</th> --}}
                                                                                    <th>Quantity</th>
                                                                                    <th>Ink</th>
                                                                                    <th>Paper&nbsp;Type</th>
                                                                                    <th>Production&nbsp;Days</th>
                                                                                    <th>Cost</th>
                                                                                    <th>Status</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($job_orders as $index => $val)
                                                                                @php $job_title = str_replace(' ','_', $val->job_order_name)   @endphp
                                                                                    <tr>
                                                                                        <td>{{$index+1}}</td>
                                                                                        {{-- <td>{{$val->user->firstname.' '. $val->user->lastname}}</td> --}}
                                                                                        <td>{{$val->job_order_name}}</td>
                                                                                        {{-- <td>
                                                                                            @if($val->cart_order_status == 1)
                                                                                            <span style="color:blue; ">In cart </span>
                                                                                            @elseif($val->cart_order_status ==2)
                                                                                            <span style="color:green;">Completed </span>
                                                                                            @endif

                                                                                        </td> --}}
                                                                                        <td>{{$val->quantity}}</td>
                                                                                        <td>{{$val->ink}}</td>
                                                                                        <td>{{$val->paper_type}}</td>
                                                                                        <td>{{$val->production_days}}</td>
                                                                                        <td>₦{{number_format($val->total_cost)}} </td>
                                                                                        <td>{{$val->status}}</td>
                                                                                        <td><a href="{{route('company.job_order.view_title_order',[$job_title, $val->id])}}"><span><i class="fa fa-eye"></i></span></a></td>
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
