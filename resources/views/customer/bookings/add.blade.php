
@extends('customer.layout.master')
@section('content')
@section('title', 'Add Screen')


    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Bookings</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Bookings</li>
                    </ol>
                </div>
            </div>
            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Create Booking Details</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-md-12">
                                                                <form method="POST" action="" enctype="multipart/form-data" id="bookingForm">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                        <div class="col-md-6 mt-3">
                                                                            <label for="end_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                                                            <input id="start_date" type="date" class="form-control" name="start_date" required min="{{ date('Y-m-d') }}">
                                                                        </div>


                                                                        <div class="col-md-6 mt-3">
                                                                            <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                                                            <input id="end_date" type="date" class="form-control" name="end_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row g-3 mb-3 mt-3">
                                                                        <div class="col-md-12">
                                                                                <div id="venueScreenWrapper">
                                                                                    <div class="venue-screen-group row g-3 mb-2">
                                                                                        <div class="col-md-4">
                                                                                            <label>Venue</label>
                                                                                            <select class="form-control venue" name="venues[0][venue_id]" required>
                                                                                                <option value="">Select Venue</option>
                                                                                                @foreach($venues as $venue)
                                                                                                    <option value="{{ $venue->id }}">{{ $venue->name }} - {{ $venue->city }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="col-md-4">
                                                                                            <label>Screen</label>
                                                                                            <select class="form-control screen" name="venues[0][screen_id]" required disabled>
                                                                                                <option value="">Select Screen</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="col-md-4">
                                                                                            <label>Media</label>
                                                                                            <input type="file" class="form-control media" name="venues[0][media_path]" required>
                                                                                        </div>

                                                                                        <div class="col-md-3 d-flex align-items-end">
                                                                                            <button type="button" class="btn btn-danger remove-group d-none">Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <button type="button" class="btn btn-primary btn-sm mt-2" id="addVenueScreen">+ Add More</button>

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

            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let groupIndex = 0;
        const wrapper = document.getElementById('venueScreenWrapper');
        const addBtn = document.getElementById('addVenueScreen');

        // Add new row
        addBtn.addEventListener('click', function() {
            groupIndex++;

            const newGroup = document.createElement('div');
            newGroup.classList.add('venue-screen-group', 'row', 'g-3', 'mb-2');
            newGroup.innerHTML = `
                <div class="col-md-4">
                    <label>Venue</label>
                    <select class="form-control venue" name="venues[${groupIndex}][venue_id]" required>
                        <option value="">Select Venue</option>
                        @foreach($venues as $venue)
                            <option value="{{ $venue->id }}">{{ $venue->name }} - {{ $venue->city }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Screen</label>
                    <select class="form-control screen" name="venues[${groupIndex}][screen_id]" required disabled>
                        <option value="">Select Screen</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Media</label>
                    <input type="file" class="form-control media" name="venues[${groupIndex}][media_path]" required>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-group">Remove</button>
                </div>
            `;

            wrapper.appendChild(newGroup);
        });

        // Remove row
        wrapper.addEventListener('click', function(e) {
            if(e.target.classList.contains('remove-group')){
                e.target.closest('.venue-screen-group').remove();
            }
        });

        // Dynamic screens per venue
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


