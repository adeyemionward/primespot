
@extends('customer.layout.master')
@section('content')
@section('title', 'Pending Bookings')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Pending Bookings</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">
                        @include('customer.bookings.date_filter_inc')
                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Customer</th>
                                    <th>Venue</th>
                                    <th>Screen</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $index => $val)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$val->user->name}}</td>
                                        <td>{{$val->screen->venue->name}}</td>
                                        <td>{{$val->screen->name}}</td>
                                        <td>{{$val->start_date}}</td>
                                        <td>{{$val->end_date}}</td>
                                        <td class="{{ $val->payment_status_color }}">
                                            {{ ucfirst($val->payment_status) ?? 'N/A' }}
                                        </td>
                                        <td><a href="{{route('customer.bookings.view',$val->id)}}"><span><i class="fa fa-eye"></i></span></a></td>
                                    </tr>
                                @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

