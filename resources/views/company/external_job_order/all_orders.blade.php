
@extends('company.layout.master')
@section('content')
@section('title', 'All Orders External')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">All External Orders</h4>
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
                <a href="{{route('company.external_job_order.delete_all_external_order')}}"   onclick="return confirm('Are you sure you want to delete all the external_job_orders?');">
                    <button class="btn btn-sm btn-danger" style="width: 300px">
                        <i class="text-white me-2" data-feather="trash"></i>Delete all External Orders
                    </button>
                </a>
                    <div class="canvas-wrapper">
                        @include('company.includes.order_date_range')
                        <div class="form-group mt-3 mb-3 col-md-4">
                    <br>
                   
                </div>
                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Customer Name</th>
                                    <th>Job Type</th>
                                    <th>Quantity</th>
                                    <th>Ink</th>
                                    <th>Paper Type</th>
                                    <th>Thickness</th>
                                    <th>Cost</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_orders as $index => $val)
                                @php $product_name = str_replace('_',' ', $val->productName->name)   @endphp
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$val->user->firstname.' '. $val->user->lastname}}</td>
                                        <td>{{ucwords($product_name)}}</td>
                                        <td>{{$val->quantity}}</td>
                                        <td>{{$val->ink}} Color</td>
                                        <td>{{$val->paper_type}}</td>
                                        <td>{{$val->thickness}}</td>
                                        <td>{{'₦'.$val->total_cost}} </td>
                                        <td>{{$val->status}}</td>
                                        <td><a href="{{route('company.external_job_order.view_order',$val->id)}}"><span><i class="fa fa-eye"></i></span></a></td>
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

