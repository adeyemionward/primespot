@extends('admin.layout.master')
@section('content')
@section('title', 'Edit Booking')

<div class="content">
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-md-6 float-start">
                <h4 class="m-0 text-dark text-muted">Edit Booking</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-end">
                    <li class="breadcrumb-item"><a href="#"> Home</a></li>
                    <li class="breadcrumb-item active">Bookings</li>
                </ol>
            </div>
        </div>

        <div class="canvas-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0 text-muted">Edit Booking Details</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST"  enctype="multipart/form-data" id="bookingForm">
                                @csrf
                                @method('POST')

                                {{-- Customer & Dates --}}
                                <div class="row g-3 mb-3">
                                    <div class="col-md-3">
                                        <label>Customer</label>
                                        <select name="user_id" class="form-control" required>
                                            <option value="">Select Customer</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }} - {{ $user->company }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ $booking->start_date }}" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ $booking->end_date }}" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Payment Status</label>
                                        <select name="payment_status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            <option value="pending" {{ $booking->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="paid" {{ $booking->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="cancelled" {{ $booking->payment_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Booking Items --}}
                                <div class="row g-3 mb-3">
                                    <div class="col-md-12">
                                        <div id="venueScreenWrapper">
                                            @foreach($booking->items as $index => $item)
                                                <div class="venue-screen-group row g-3 mb-2">
                                                    <div class="col-md-4">
                                                        <label>Venue</label>
                                                        <select class="form-control venue" name="venues[{{ $index }}][venue_id]" required>
                                                            <option value="">Select Venue</option>
                                                            @foreach($venues as $venue)
                                                                <option value="{{ $venue->id }}" {{ $item->venue_id == $venue->id ? 'selected' : '' }}>
                                                                    {{ $venue->name }} - {{ $venue->city }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label>Screen</label>
                                                        <select class="form-control screen" name="venues[{{ $index }}][screen_id]" required>
                                                            <option value="">Select Screen</option>
                                                            @foreach($item->venue->screens as $screen)
                                                                <option value="{{ $screen->id }}" {{ $item->screen_id == $screen->id ? 'selected' : '' }}>
                                                                    {{ $screen->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label>Media</label>
                                                        <input type="file" class="form-control media" name="venues[{{ $index }}][media_path]">
                                                        @if($item->media_path)
                                                            <small><a href="{{ asset('media/'.$item->media_path) }}" target="_blank">Current Media</a></small>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-2 d-flex align-items-end">
                                                        <button type="button" class="btn btn-danger remove-group">Remove</button>
                                                    </div>

                                                    <input type="hidden" name="venues[{{ $index }}][id]" value="{{ $item->id }}">
                                                </div>
                                            @endforeach
                                        </div>

                                        <button type="button" class="btn btn-primary btn-sm mt-2" id="addVenueScreen">+ Add More</button>
                                    </div>
                                </div>

                                {{-- Ads Content --}}
                                <div class="row">
                                    <div class="form-group mt-3 mb-3 col-md-12">
                                        <label>Write Ads Content</label>
                                        <textarea name="content" class="form-control" id="content">{{ $booking->content }}</textarea>
                                    </div>
                                </div>

                                <button class="btn btn-sm btn-danger mt-3" type="submit">
                                    <i class="text-white me-2" data-feather="check-circle"></i>Save Changes
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- JS for add/remove items + dynamic screens --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    let groupIndex = {{ $booking->items->count() }};
    const wrapper = document.getElementById('venueScreenWrapper');
    const addBtn = document.getElementById('addVenueScreen');

    addBtn.addEventListener('click', function() {
        const index = groupIndex++;
        const newGroup = document.createElement('div');
        newGroup.classList.add('venue-screen-group', 'row', 'g-3', 'mb-2');
        newGroup.innerHTML = `
            <div class="col-md-4">
                <label>Venue</label>
                <select class="form-control venue" name="venues[${index}][venue_id]" required>
                    <option value="">Select Venue</option>
                    @foreach($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->name }} - {{ $venue->city }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Screen</label>
                <select class="form-control screen" name="venues[${index}][screen_id]" required disabled>
                    <option value="">Select Screen</option>
                </select>
            </div>

            <div class="col-md-3">
                <label>Media</label>
                <input type="file" class="form-control media" name="venues[${index}][media_path]">
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-group">Remove</button>
            </div>
        `;
        wrapper.appendChild(newGroup);
    });

    wrapper.addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-group')){
            e.target.closest('.venue-screen-group').remove();
        }
    });

    wrapper.addEventListener('change', function(e) {
        if(e.target.classList.contains('venue')){
            const venueSelect = e.target;
            const screenSelect = venueSelect.closest('.venue-screen-group').querySelector('.screen');
            const venueId = venueSelect.value;

            if(venueId){
                fetch(`/api/venues/${venueId}/screens`)
                    .then(res => res.json())
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
                    });
            } else {
                screenSelect.innerHTML = '<option value="">Select Screen</option>';
                screenSelect.disabled = true;
            }
        }
    });
});
</script>

@endsection
