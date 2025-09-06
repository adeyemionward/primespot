
@extends('vendor.layout.master')
@section('content')
@section('title', 'All Users')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Booking List</h4>
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
                        {{-- @include('customer.bookings.date_filter_inc') --}}
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
@endsection

