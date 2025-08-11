<style>
    .active_red{
        background-color: #df4226 !important;
    }
</style>
{{-- add pay --}}
<form method="POST"  action="{{route('company.finance.expenses.update_expense_payment',[request()->id])}}" class="order_status">
    @csrf
    @method('POST')
    <div class="modal fade" id="exampleModal2" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Expense Payment</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="proof_needed">Select Payment Type</label>
                        <select class="form-control" name="payment_type" required>
                            <option value="">--Select Payment Type--</option>
                            <option value="Full Payment">Full Payment</option>
                            <option value="Part Payment">Part Payment</option>
                        </select> <br>

                        <label for="amount_paid">Amount Paid</label>
                        <input type="number"  name="amount_paid" class="form-control"
                        id="amount_paid" placeholder="eg: 10000" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-danger" type="submit" name="pay">
                        <i class="text-white me-2" data-feather="check-circle"></i>Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="col-md-3 col-xl-3">
    <div class="card mb-3">
        <div class="card-body text-center">

            <div class="nav nav-pills flex-column bg-white"
                id="nav-tab" role="tablist">
                <a class="nav-link <?php if($page == 'view_expense') echo 'active active_red'  ?>"
                 href="{{route('company.finance.expenses.view_expense',[request()->id])}}"
                 aria-selected="false">View Expense</a>
                <div class="dropdown-divider"></div>


                <a class="nav-link <?php if($page == 'edit_expense') echo 'active active_red'  ?>"
                 href="{{route('company.finance.expenses.edit_expense',[request()->id])}}"
                 aria-selected="false">Edit Expense </a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'payment_history') echo 'active active_red'  ?>"
                    href="{{route('company.finance.expenses.payment_history', request()->id)}}"
                    aria-selected="false"> Expense Payment History</a>
                   <div class="dropdown-divider"></div>

                <a  style="cursor: pointer" id="myBtn2" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="nav-link <?php if($page == 'edit_pricing') echo 'active active_red'  ?>"
                aria-selected="false">Post Expense</a>
               <div class="dropdown-divider"></div>


                <a class="nav-link"
                href="{{route('company.finance.expenses.delete_expense', [request()->id])}}" onclick="return confirm('Are you sure you want to delete this expense?');"
                aria-selected="false">Delete Expense</a>
               <div class="dropdown-divider"></div>


            </div>

        </div>
    </div>
</div>
