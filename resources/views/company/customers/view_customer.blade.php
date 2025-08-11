
@extends('company.layout.master')
@section('content')
@section('title', 'View Customer')
@php $page = 'view'; @endphp


    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Customer</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Customer</li>
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
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">View Customer Details</h5>
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
                                                                      <td width="10%" class="question">Customer Id :</td>
                                                                      <td>{{$customer->id ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Customer Name :</td>
                                                                        <td>{{$customer->firstname.' '.$customer->lastname ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Phone :</td>
                                                                        <td>{{$customer->phone ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Address :</td>
                                                                        <td>{{$customer->address ?? 'N/A'}}</td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td width="10%" class="question">Created By :</td>
                                                                        <td>{{@$customer->createdBy->firstname.' '.@$job_order->createdBy->lastname ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Created At :</td>
                                                                        <td>{{$customer->created_at ?? 'N/A'}}</td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td width="10%" class="question">Updated By :</td>
                                                                        <td>{{@$customer->updatedBy->firstname.' '.@$job_order->updatedBy->lastname ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Updated At :</td>
                                                                        <td>{{$customer->updated_at ?? 'N/A'}}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <hr/>
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

                <!-- 							Canvas Wrapper End -->

            </div>
        </div>
    </div>
@endsection


