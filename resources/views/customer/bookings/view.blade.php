
@extends('customer.layout.master')
@section('content')
@section('title', 'View Booking')
@php $page = 'view'; @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Booking</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                </div>
            </div>
            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('customer.bookings.side_inc')
                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">View Booking Details</h5>
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
                                                                      <td width="10%" class="question">Booking Id :</td>
                                                                      <td>{{$booking->id ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Customer Name :</td>
                                                                        <td>{{$booking->user->name ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Screen :</td>
                                                                        <td>{{$booking->screen->name ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Venue :</td>
                                                                        <td>{{$booking->screen->venue->name ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Start Date :</td>
                                                                        <td>{{$booking->start_date ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">End Date :</td>
                                                                        <td>{{$booking->end_date ?? 'N/A'}}</td>
                                                                     </tr>
                                                                     <tr class="det">
                                                                        <td width="10%" class="question">No of Days :</td>
                                                                        <td>{{$booking->days.' Days' ?? 'N/A'}}</td>
                                                                     </tr>
                                                                     <tr class="det">
                                                                        <td width="10%" class="question">Amount :</td>
                                                                        <td>₦{{$booking->screen->daily_rate * $booking->days ?? 'N/A'}}</td>
                                                                     </tr>
                                                                     <tr>
                                                                        <td width="10%" class="question">Media :</td>
                                                                        <td><a href="{{asset('media/'.$booking->media_path)}}" download style="color: blue">
                                                                            Download Media
                                                                        </a></td>
                                                                    </tr>
                                                                     <tr class="det">
                                                                        <td width="10%" class="question">Content :</td>
                                                                        <td>{{$booking->content ?? 'N/A'}}</td>
                                                                     </tr>
                                                                     <tr class="det">
                                                                        <td width="10%" class="question">Payment Status :</td>
                                                                        <td class="{{ $booking->payment_status_color }}">
                                                                            {{ ucfirst($booking->payment_status) ?? 'N/A' }}
                                                                        </td>
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


