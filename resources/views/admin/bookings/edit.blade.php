
@extends('admin.layout.master')
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
                                @include('admin.bookings.side_inc')
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
                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Customer</label>
                                                                            <select id="user_id" class="form-control" name="user_id" required>
                                                                                <option value="">Select Customer</option>
                                                                                @foreach($users as $user)
                                                                                    <option value="{{ $user->id }}" @if($booking->user_id == $user->id) selected @endif>{{ $user->name }} - {{ $user->company }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <small id="screenInfo" class="form-text text-muted"></small>
                                                                        </div>

                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="media" class="col-md-4 col-form-label text-md-right">Venue</label>
                                                                            <select id="venue" class="form-control" name="venue_id" required>
                                                                                <option value="">Select Venue</option>
                                                                                @foreach($venues as $venue)
                                                                                    <option value="{{ $venue->id }}" @if($booking->screen->venue->id == $venue->id) selected @endif>{{ $venue->name }} - {{ $venue->city }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>


                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="screen" class="col-md-4 col-form-label text-md-right">Screen</label>
                                                                            <select id="screen" class="form-control" name="screen_id" required>
                                                                                <option value="">Select Screen</option>
                                                                                @foreach($booking->screen->venue->screens as $screen)
                                                                                    <option value="{{ $screen->id }}" @if($booking->screen->id == $screen->id) selected @endif data-rate="{{ $screen->daily_rate }}">
                                                                                        {{ $screen->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            {{-- <small id="screenInfo" class="form-text text-muted">Daily Rate: ${{ $booking->screen->daily_rate }}</small> --}}
                                                                        </div>
                                                                         <div class="col-md-3 mt-3">
                                                                            <label for="media" class="col-md-4 col-form-label text-md-right">Media</label>
                                                                            <input id="media" type="file" class="form-control" name="media_path">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">

                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="end_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                                                            <input id="start_date" type="date" class="form-control" name="start_date" value="{{$booking->start_date}}" required min="{{ date('Y-m-d') }}">
                                                                        </div>


                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                                                            <input id="end_date" type="date" class="form-control" name="end_date" value="{{$booking->end_date}}"  required>
                                                                        </div>


                                                                         <div class="col-md-3 mt-3">
                                                                            <label for="days" class="col-md-4 col-form-label text-md-right">Days</label>
                                                                            <input id="days" type="number" class="form-control" placeholder="No. of Days" name="days" value="{{$booking->days}}" required>
                                                                        </div>

                                                                        <div class="col-md-3 mt-3">
                                                                            <label for="payment_status" class="col-md-4 col-form-label text-md-right">Payment</label>
                                                                            <select id="payment_status" class="form-control" name="payment_status" required>
                                                                                <option value="">Select Payment Status</option>
                                                                                <option value="paid" @if($booking->payment_status == 'paid') selected @endif>Completed Payments</option>
                                                                                <option value="pending" @if($booking->payment_status == 'pending') selected @endif>Pending Payments</option>
                                                                                <option value="cancelled" @if($booking->payment_status == 'cancelled') selected @endif>Cancelled Payments</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                            <label for="content">Write Ads Content
                                                                                </label>
                                                                                <textarea name="content"  class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" value="{{ old('content') }}"
                                                                                id="content">{{$booking->content}}</textarea>
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
    <script>
   document.addEventListener('DOMContentLoaded', function() {
    const venueSelect = document.getElementById('venue');
    const screenSelect = document.getElementById('screen');
    const screenInfo = document.getElementById('screenInfo');
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    const amountDisplay = document.getElementById('amount');
    const amountValue = document.getElementById('amount_value');

    // Function to calculate and display the amount (you might already have this)
    function updateAmount() {
        // Your logic to calculate the amount based on selected screen rate and dates
        // This function should be called on change of screen, start_date, and end_date
    }

    // This block of code handles the initial page load to ensure the screen info is displayed
    if (screenSelect.value) {
        const selectedOption = screenSelect.options[screenSelect.selectedIndex];
        // screenInfo.textContent = `Daily Rate: #${selectedOption.dataset.rate}`;
        // You might also call updateAmount() here to set the initial total cost
        // updateAmount();
    }

    // Load screens when venue is selected (and for initial load)
    venueSelect.addEventListener('change', function() {
        const venueId = this.value;

        if (venueId) {
            fetch(`/api/venues/${venueId}/screens`)
                .then(response => response.json())
                .then(screens => {
                    screenSelect.innerHTML = '<option value="">Select Screen</option>';
                    screenSelect.disabled = false;

                    screens.forEach(screen => {
                        const option = document.createElement('option');
                        option.value = screen.id;
                        option.textContent = screen.name;
                        option.dataset.rate = screen.daily_rate;
                        screenSelect.appendChild(option);
                    });

                    // Clear screen info when venue changes
                    screenInfo.textContent = '';
                })
                .catch(error => console.error('Error fetching screens:', error));
        } else {
            screenSelect.innerHTML = '<option value="">Select Screen</option>';
            screenSelect.disabled = true;
            screenInfo.textContent = '';
        }
    });

    // Add event listener for screen change to update the info display
    screenSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value) {
            // screenInfo.textContent = `Daily Rate: $${selectedOption.dataset.rate}`;
        } else {
            screenInfo.textContent = '';
        }
        // You would also call updateAmount() here
        // updateAmount();
    });

    // You will also need event listeners for the date inputs
    // startDate.addEventListener('change', updateAmount);
    // endDate.addEventListener('change', updateAmount);
});
</script>
@endsection


