<div class="row g-3 mb-3 mt-3">
    <div class="col-md-12">
        <form method="GET"  id="" class="">
            <div class="row">
                <div class="form-group mt-3 mb-3 col-md-3">
                    <label for="exampleFormControlInput1"> Date From: </label>
                    <input type="date"  name="start_date" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }} " value="{{request()->start_date}}"  id="start_date">
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3 mb-3 col-md-3">
                    <label for="exampleFormControlInput1"> Date To: </label>
                    <input type="date"  name="end_date" class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }} " value="{{request()->end_date}}"  id="end_date">
                    @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group mt-3 mb-3 col-md-3">
                    <label for="exampleFormControlInput1"> Select Payment Status </label>
                     <select class="form-control form-select" name="payment_status">
                        <option value="">Select Payment Status</option>
                        <option value="paid" @if(request()->payment_status == 'paid') selected @endif>Completed Payments</option>
                        <option value="pending" @if(request()->payment_status == 'pending') selected @endif>Pending Payments</option>
                        <option value="cancelled" @if(request()->payment_status == 'cancelled') selected @endif>Cancelled Payments</option>
                    </select>
                    @error('customer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3 mb-3 col-md-3">
                    <label for=""> Filter </label> <br>
                    <button class="btn btn-sm btn-success" type="submit" style="width: 100px">
                        <i class="text-white me-2" data-feather="check-circle"></i>Filter
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
