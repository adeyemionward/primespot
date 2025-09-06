
@extends('customer.layout.master')
@section('content')
@section('title', 'Edit Booking')
@php $page = 'edit'; @endphp

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
                                            <h5 class="card-title mb-0 text-muted">Edit Booking Details</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                 <form method="POST" action="" enctype="multipart/form-data" id="bookingForm">
                                                                    @csrf

                                                                    <div class="form-group row">
                                                                        {{-- <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label> --}}
                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Customer</label>
                                                                            <select id="user_id" class="form-control" name="user_id" required>
                                                                                <option value="">Select Customer</option>
                                                                                 @foreach($users as $user)
                                                                                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->company }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <small id="screenInfo" class="form-text text-muted"></small>
                                                                        </div>

                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="media" class="col-md-4 col-form-label text-md-right">Venue</label>
                                                                            <select id="venue" class="form-control" name="venue_id" required>
                                                                                <option value="">Select Venue</option>
                                                                                @foreach($venues as $venue)
                                                                                    <option value="{{ $venue->id }}">{{ $venue->name }} - {{ $venue->city }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>


                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="media" class="col-md-4 col-form-label text-md-right">Screen</label>
                                                                            <select id="screen" class="form-control" name="screen_id" required disabled>
                                                                                <option value="">Select Screen</option>
                                                                            </select>
                                                                            <small id="screenInfo" class="form-text text-muted"></small>
                                                                        </div>
                                                                         <div class="col-md-3 mt-3">
                                                                            <label for="media" class="col-md-4 col-form-label text-md-right">Media</label>
                                                                            <input id="media" type="file" class="form-control" name="media_path" required>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">



                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="end_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                                                            <input id="start_date" type="date" class="form-control" name="start_date" required min="{{ date('Y-m-d') }}">
                                                                        </div>


                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                                                            <input id="end_date" type="date" class="form-control" name="end_date" required>
                                                                        </div>


                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
                                                                            <input id="amount" type="text" class="form-control" name="amount" required>
                                                                        </div>

                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="payment_status" class="col-md-4 col-form-label text-md-right">Payment Status</label>
                                                                            <select id="payment_status" class="form-control" name="payment_status" required>
                                                                                <option value="">Select Payment Status</option>
                                                                                <option value="pending">Pending</option>
                                                                                <option value="paid">Paid</option>
                                                                                <option value="cancelled">Cancelled</option>
                                                                                <option value="completed">Completed</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                            <label for="content">Write Ads Content
                                                                                </label>
                                                                                <textarea name="content"  class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" value="{{ old('content') }}"
                                                                                id="content"></textarea>
                                                                                @error('content')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                        </div>
                                                                    </div>


                                                                     <button class="btn btn-sm btn-danger mt-3" type="submit">
                                                                        <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                    </button>
                                                                </form>
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

                <!-- 							Canvas Wrapper End -->

            </div>
        </div>
    </div>
@endsection


