
@extends('vendor.layout.master')
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
                                        <a class="text-primary float-end" href="{{route('admin.bookings.list')}}"><i
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
                                        <a class="text-primary float-end" href="{{route('admin.bookings.completed')}}"><i
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
                                        <a class="text-primary float-end" href="{{route('admin.bookings.pending')}}"><i
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
                                        <a class="text-primary float-end" href="{{route('admin.screens.list')}}"><i
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
                                         <table id="example" class="table no-margin" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Venue</th>
                                                    <th>Screen</th>
                                                    <th>Start&nbsp;Date</th>
                                                    <th>End&nbsp;Date</th>
                                                    <th>Total&nbsp;Amount</th>
                                                    <th>Commission&nbsp;Amount</th>
                                                    <th>Media</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($bookingItems as $item)
                                                    <tr>
                                                        <td>{{ $item->venue->name ?? 'N/A' }}</td>
                                                        <td>{{ $item->screen->name ?? 'N/A' }}</td>

                                                        <td>{{ $item->booking->start_date }}</td>
                                                        <td>{{ $item->booking->end_date }}</td>
                                                        <td>₦{{$item->amount ?? 0.00}}</td>
                                                        <td>₦{{($item->screen->commission_rate/100 * $item->amount) ?? 0.00}} <small>({{$item->screen->commission_rate}}%)</small></td>
                                                        <td>
                                                            @if($item->media_path)
                                                                <a href="{{asset('media/'.$item->media_path)}}" download style="color: blue">
                                                                    Download Media
                                                                </a>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>

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

