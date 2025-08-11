
@extends('customer.layout.master')
@section('content')
@section('title', 'Dashboard')
    {{-- MAIN BODY CONTENT --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Dashboard</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card card-rounded">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="teal data-feather-big" stroke-width="3"
                                            data-feather="shopping-cart" style="color: #df4226;"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">All Bookings</p>
                                        <span class="number">{{$stats['all_bookings']}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="d-flex justify-content-between box-font-small">
                                    <div class="col-md-6 stats">
                                        <i data-feather="calendar"></i>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="text-primary float-end" href="{{route('customer.bookings.list')}}"><i
                                            class="blue" data-feather="chevrons-right"></i>See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card card-rounded">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="orange data-feather-big" stroke-width="3"
                                            data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Completed Bookings</p>
                                        <span class="number">{{$stats['completed_bookings']}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="d-flex justify-content-between box-font-small">
                                    <div class="col-md-6 stats">
                                        <i data-feather="mail"></i>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="text-primary float-end" href="{{route('customer.bookings.completed')}}"><i
                                            class="blue" data-feather="chevrons-right"></i>See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card card-rounded">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="olive data-feather-big" stroke-width="3"
                                            data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Pending Bookings</p>
                                        <span class="number">{{$stats['pending_bookings']}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="d-flex justify-content-between box-font-small">
                                    <div class="col-md-6 stats">
                                        <i data-feather="calendar"></i>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="text-primary float-end" href="{{route('customer.bookings.pending')}}"><i
                                            class="blue" data-feather="chevrons-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card card-rounded">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="teal data-feather-big" stroke-width="3"
                                            data-feather="shopping-cart" style="color:rgb(31, 121, 31);"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Total Screens</p>
                                        <span class="number">{{$stats['total_screens']}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="d-flex justify-content-between box-font-small">
                                    <div class="col-md-6 stats">
                                        <i data-feather="calendar"></i>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="text-primary float-end" href=""><i
                                            class="blue" data-feather="chevrons-right"></i>See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Recent Bookings</h5>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table no-margin">
                                            <thead class="success">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Customer</th>
                                                    <th>Screen</th>
                                                    <th>Daily Rate</th>
                                                    <th>Days</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($recentBookings as $val)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$val->user->name}}</td>
                                                        <td>{{$val->screen->name}}</td>
                                                        <td>#{{$val->screen->daily_rate}}</td>
                                                        <td>{{$val->days}} Days</td>
                                                        <td class="text-right">#{{$val->screen->daily_rate * $val->days }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
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
@endsection

