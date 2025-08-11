
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

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST" action="" enctype="multipart/form-data" id="bookingForm">
                                                                    @csrf

                                                                    <div class="form-group row">
                                                                        {{-- <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label> --}}


                                                                        <div class="col-md-4 mt-3">
                                                                            <label for="media" class="col-md-4 col-form-label text-md-right">Venue</label>
                                                                            <select id="venue" class="form-control" name="venue_id" required>
                                                                                <option value="">Select Venue</option>
                                                                                @foreach($venues as $venue)
                                                                                    <option value="{{ $venue->id }}">{{ $venue->name }} - {{ $venue->city }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>


                                                                        <div class="col-md-4 mt-3">
                                                                            <label for="media" class="col-md-4 col-form-label text-md-right">Screen</label>
                                                                            <select id="screen" class="form-control" name="screen_id" required disabled>
                                                                                <option value="">Select Screen</option>
                                                                            </select>
                                                                            <small id="screenInfo" class="form-text text-muted"></small>
                                                                        </div>
                                                                         <div class="col-md-4 mt-3">
                                                                            <label for="media" class="col-md-4 col-form-label text-md-right">Media</label>
                                                                            <input id="media" type="file" class="form-control" name="media_path" required>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">



                                                                        <div class="col-md-4 mt-3">
                                                                            <label for="end_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                                                            <input id="start_date" type="date" class="form-control" name="start_date" required min="{{ date('Y-m-d') }}">
                                                                        </div>


                                                                        <div class="col-md-4 mt-3">
                                                                            <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                                                            <input id="end_date" type="date" class="form-control" name="end_date" required>
                                                                        </div>


                                                                        <div class="col-md-4 mt-3">
                                                                            <label for="days" class="col-md-4 col-form-label text-md-right">No. of Days</label>
                                                                            <input id="days" type="number" class="form-control" name="days" required>
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
    const venueSelect = document.getElementById('venue');
    const screenSelect = document.getElementById('screen');
    const screenInfo = document.getElementById('screenInfo');
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    const amountDisplay = document.getElementById('amount');
    const amountValue = document.getElementById('amount_value');

    // Load screens when venue is selected
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
                });
        } else {
            screenSelect.innerHTML = '<option value="">Select Screen</option>';
            screenSelect.disabled = true;
            screenInfo.textContent = '';
        }
    });

    // Show screen info when selected
    // screenSelect.addEventListener('change', function() {
    //     const selectedOption = this.options[this.selectedIndex];

    //     if (this.value) {
    //         screenInfo.textContent = `Rate: ₦${selectedOption.dataset.rate} per day`;
    //         calculateAmount();
    //     } else {
    //         screenInfo.textContent = '';
    //         amountDisplay.textContent = '₦0.00';
    //         amountValue.value = '';
    //     }
    // });

    // Calculate amount when dates change
    startDate.addEventListener('change', calculateAmount);
    endDate.addEventListener('change', calculateAmount);

    function calculateAmount() {
        const screenRate = parseFloat(screenSelect.options[screenSelect.selectedIndex]?.dataset.rate) || 0;
        const start = new Date(startDate.value);
        const end = new Date(endDate.value);

        if (startDate.value && endDate.value && start <= end && screenRate > 0) {
            const diffTime = Math.abs(end - start);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            const amount = screenRate * diffDays;

            amountDisplay.textContent = `₦${amount.toLocaleString('en-NG', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
            amountValue.value = amount;
        } else {
            amountDisplay.textContent = '₦0.00';
            amountValue.value = '';
        }
    }
});
</script>
@endsection


