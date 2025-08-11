<style>
    .active_red{
        background-color: #df4226 !important;
    }
</style>
<form method="POST"  action="{{route('company.job_order.view_order',[request()->id])}}" class="order_status">
    @csrf
    @method('POST')
    <div class="modal fade" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Order Status</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="backsided">Select a Status</label>
                        <select required class="form-control form-select dont"  name="order_status" id="order_status">
                            <option >--select a status--</option>
                            <option value="Designed">Designed</option>
                            <option value="Proof Read">Proof Read</option>
                            <option value="Customer Approved">Customer Approved</option>
                            <option value="Prepressed">Prepressed</option>
                            <option value="Printed">Printed</option>
                            <option value="Binded">Binded</option>
                            <option value="Completed">Completed</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-danger" type="submit">
                        <i class="text-white me-2" data-feather="check-circle"></i>Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


{{-- upload aproved design --}}
    {{-- <form method="POST"  action="{{route('company.job_order.approved_design',request()->id)}}" class="approved_design" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="modal fade" id="exampleModal_design" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Approved Design</h5>
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @if (is_null($approved_design))
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <label for="backsided">Upload Approved Design <span style="color: rgb(27, 27, 153)">(* PDF Only)</span></label>
                                <input required type="file" name="design_file" class="form-control"
                                id="design_file" accept="application/pdf">
                            </div>
                        </div>
                    @else
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <label for="backsided" style="font-weight: 500">Upload New or Download an Existing Approved Design</label> <br><br>

                                <label for="">Upload New Design <span style="color: rgb(27, 27, 153)">(* PDF Only)</span></label>
                                <input required type="file" name="design_file" class="form-control"
                                id="design_file" accept="application/pdf"> <br>
                                @if ( env('APP_ENV') == 'local')
                                   <i   class="fas fa-file-pdf"     style="color: red; font-size:30px;"> </i> <a  href="{{asset($approved_design->design_name)}}" target="_blank" style="width: 100%; text-decoration:underline; font-weight:bold"> Download an Existing PDF Design </a>
                                @else
                                    <i  class="fas fa-file-pdf"     style="color: red; font-size:30px"> </i>  <a href="{{asset($approved_design->design_name)}}" target="_blank" style="width: 100%; text-decoration:underline; font-weight:bold"> Download an Existing PDF Design</a>
                                @endif
                            </div>
                        </div>
                    @endif


                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="text-white me-2" data-feather="check-circle"></i>Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}
{{-- end approved design --}}

{{-- add pay --}}
<form method="POST"  action="{{route('company.job_order.transaction_history',request()->id)}}" class="order_status">
    @csrf 
    @method('POST')
    <div class="modal fade" id="exampleModal2" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Job Order Payment</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="proof_needed">Select Payment Type</label>
                        <select class="form-control dont" name="payment_type" required>
                            <option value="">--Select Payment Type--</option>
                            <option value="Full Payment">Full Payment</option>
                            <option value="Part Payment">Part Payment</option>
                        </select> <br>

                        <label for="amount_paid">Amount Paid</label>
                        <input type="text"  name="amount_paid" class="form-control numberFormat"
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
            <!--<h5 class="card-title mb-3 text-primary">Select Entity</h5> -->

            <div class="nav nav-pills flex-column bg-white"
                id="nav-tab" role="tablist">
                <a class="nav-link <?php if($page == 'view_order') echo 'active active_red'  ?>"
                 href="{{route('company.job_order.view_order',request()->id)}}"
                 aria-selected="false">View Details</a>
                <div class="dropdown-divider"></div>
{{--
                <a  class="nav-link  <?php if($page == 'edit_order') echo 'active active_red'  ?>"
                 href="{{route('company.job_order.edit_order',request()->id)}}"
                 aria-selected="false">Edit Order</a>
                <div class="dropdown-divider"></div> --}}



                <a style="cursor: pointer" id="myBtn1" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link <?php if($page == 'status_order') echo 'active active_red'  ?>"

                aria-selected="false">Change Order Status</a>
                <div class="dropdown-divider"></div>

                {{-- <a style="cursor: pointer" id="myBtn1" data-bs-toggle="modal" data-bs-target="#exampleModal_design" class="nav-link <?php if($page == 'status_order') echo 'active active_red'  ?>"

                aria-selected="false">Approved Design</a>

               <div class="dropdown-divider"></div> --}}

                @if ($job_order->order_no != '')
                    <a  class="nav-link  <?php if($page == 'invoice_order') echo 'active active_red'  ?>"
                        href="{{route('company.job_order.order_invoice_pdf',[$job_order->order_no])}}"
                        aria-selected="false"  target="_blank">Download Invoice</a>
                @else
                    <a  class="nav-link  <?php if($page == 'invoice_order') echo 'active active_red'  ?>"
                        href="#"
                        aria-selected="false"  target="_blank">Download Invoice</a>
                @endif

               <div class="dropdown-divider"></div>

               <a style="cursor: pointer" id="myBtn2" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="nav-link <?php if($page == 'add_pay') echo 'active active_red'  ?>"

                aria-selected="false">Update Order Payment</a>

               <div class="dropdown-divider"></div>


               <a  class="nav-link  <?php if($page == 'track_order') echo 'active active_red'  ?>"
                href="{{route('company.job_order.track_order',request()->id)}}"
                aria-selected="false">Track Order</a>
               <div class="dropdown-divider"></div>

               <a  class="nav-link  <?php if($page == 'transaction') echo 'active active_red'  ?>"
                href="{{route('company.job_order.transaction_history',request()->id)}}"
                aria-selected="false">Order Transaction History</a>
               <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'delete_order') echo 'active active_red'  ?>"
                    onclick="return confirm('Are you sure you want to delete this job order?');"  href="{{route('company.job_order.delete_order',[ request()->id])}}"
                aria-selected="false">Delete Order</a>
               <div class="dropdown-divider"></div>


            </div>

        </div>
    </div>
</div>
