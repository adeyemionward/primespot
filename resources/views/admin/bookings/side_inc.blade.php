<style>
    .active_red{
        background-color: #df4226 !important;
    }
</style>
<div class="col-md-3 col-xl-3">
    <div class="card mb-3">
        <div class="card-body text-center">
            <!--<h5 class="card-title mb-3 text-primary">Select Entity</h5> -->

            <div class="nav nav-pills flex-column bg-white"
                id="nav-tab" role="tablist">
                <a class="nav-link <?php if($page == 'view') echo 'active active_red'  ?>"
                    href="{{route('admin.bookings.view', request()->id)}}" aria-selected="false">
                    View Booking</a>
                   <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'edit') echo 'active active_red'  ?>" id="nav-database-tab"
                href="{{route('admin.bookings.edit', request()->id)}}"
                aria-selected="false">Edit Booking </a>
               <div class="dropdown-divider"></div>

                 <a class="nav-link" style="cursor: pointer" id="nav-database-tab" data-bs-toggle="modal" data-bs-target="#exampleModal"

                    aria-selected="false">Update Payment Status </a>


            </div>

        </div>
    </div>
</div>
{{-- modal for payment stattus --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="{{route('admin.bookings.payment_status',request()->id)}}">
             @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Payment Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mt-3">

                    <select id="payment_status" class="form-control" name="payment_status" required>
                        <option value="">Select Payment Status</option>
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                        <option value="cancelled">Cancelled</option>
                    </select>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>
