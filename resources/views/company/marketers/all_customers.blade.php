
@extends('company.layout.master')
@section('content')
@section('title', 'View Customer')
@php $page = 'customers'; @endphp


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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        {{-- <th>Address</th> --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_customers as $index => $val)
                                                        <tr>
                                                            <td>{{$index+1}}</td>
                                                            <td>{{$val->firstname. ' '. $val->lastname}}</td>  
                                                            <td>{{$val->email}}</td>
                                                            <td>{{$val->phone}}</td>
                                                            {{-- <td>{{$val->address}}</td> --}}
                                                            <td><a href="{{route('company.customers.view_customer',$val->id)}}"><span><i class="fa fa-eye"></i></span></a></td>
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
@endsection


