
@extends('admin.layout.master')
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
                                @include('admin.bookings.side_inc')
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
                                                                        <td width="10%" class="question">Booking No :</td>
                                                                        <td>{{$booking->reference ?? 'N/A'}}</td>
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
                                                                        <td width="10%" class="question">Total Amount :</td>
                                                                        <td>₦{{$booking->items->sum('amount') ?? 0.00}}</td>
                                                                     </tr>
                                                                     <tr class="det">
                                                                        <td width="10%" class="question">Content :</td>
                                                                        <td>{{$booking->content ?? 'N/A'}}</td>
                                                                     </tr>
                                                                     <tr class="det">
                                                                        <td width="20%" class="question">Payment Status :</td>
                                                                        <td class="{{ $booking->payment_status_color }}">
                                                                            {{ ucfirst($booking->payment_status) ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>


                                                                </table>
                                                                <br><br>
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
                                                                            <th>Action</th>
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
                                                                                {{-- <td><i class="fa fa-trash"></i><a href="{{route('admin.bookings.delete_booking_item',$item->id)}}"> </a></td> --}}
                                                                                <td>
                                                                                    <form action="{{ route('admin.bookings.delete_booking_item', $item->id) }}" method="POST" style="display:inline;">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="btn btn-link text-danger p-0"
                                                                                            onclick="return confirm('Are you sure you want to delete this booking item?');">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
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


