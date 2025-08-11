
@extends('company.layout.master')
@section('content')
@section('title', 'Dashboard')

@php $page =  'stickers' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Job Order</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Job Order</li>
                    </ol>
                </div>
            </div>


            <div class="content">

                <div class="canvas-wrapper">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.job_order.job_order_inc')


                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Create Stickers Job Order</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_bronchure" class="add_bronchure">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="customer_name">Customer Name </label>
                                                                            <select name="customer_id" required class="form-control form-select" id="customer_name">
                                                                                <option value="">--Select Customer--</option>
                                                                                @foreach ($customers as $val)
                                                                                    <option value="{{$val->id}}">{{$val->firstname.' '.$val->lastname }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="quantity">Quantity</label> <input required type="number" name="quantity" class="form-control"
                                                                                id="quantity">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="size">Size</label>
                                                                            <select class="form-control form-select" name="size" id="exampleFormControlSelect1">
                                                                                <option value="">--Select Size--</option>
                                                                                <option value="5.5 x 8.5 - (274)">5.5 x 8.5</option>
                                                                                <option value="2 x 3.5 - (514)">2 x 3.5</option>
                                                                                <option value="4 x 3 - (515)">4 x 3</option>
                                                                                <option value="8.5 x 11 - (272)">8.5 x 11</option>
                                                                                <option value="4.25 x 5.5 - (273)">4.25 x 5.5</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="ink">Ink</label>
                                                                            <select name="ink" required class="form-control form-select"
                                                                                id="exampleFormControlSelect1">
                                                                                <option value="">--Select Color Type--</option>
                                                                                <option value="single">Single Color</option>
                                                                                <option value="full">Full Color</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="paper_type">Paper Type</label>
                                                                            <select required name="paper_type" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                <option value="">--Select Paper Type--</option>
                                                                                <option value="2 Part White | Canary">2 Part White | Canary</option>
                                                                                <option value="2 Part White | Pink">2 Part White | Pink</option>
                                                                                <option value="3 Part White | Canary | Pink">3 Part White | Canary | Pink</option>
                                                                                <option value="4 Part White | Canary | Pink | Goldenrod">4 Part White | Canary | Pink | Goldenrod</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Production Time (Days)
                                                                                </label> <input required type="number" name="production_time" class="form-control" id="quantity" placeholder="eg: 4">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Proof Needed</label>
                                                                            <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                <option value="">--Select Proof Needed--</option>
                                                                                <option value="yes">Yes</option>
                                                                                <option value="no">No</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="total_cost">Total Cost</label>
                                                                            <input type="text" required name="total_cost" class="form-control numberFormat"
                                                                                id="total_cost" placeholder="eg: 24000">
                                                                        </div>


                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Payment Type</label>
                                                                            <select class="form-control" name="payment_type" required>
                                                                                <option value="">--Select Payment Type--</option>
                                                                                <option value="Full Payment">Full Payment</option>
                                                                                <option value="Part Payment">Part Payment</option>
                                                                                <option value="Posted Cheque">Posted Cheque</option>
                                                                            </select>
                                                                        </div>

                                                                         <div class="form-group posted_cheque_date mt-3 mb-3 col-md-12" id="cheque_details" style="display: none;">
                                                                            <label for="cheque_number">Posted Cheque Due Date</label>
                                                                            <input type="date" class="form-control " name="posted_cheque_date" id="posted_cheque_date">
                                                                        </div>


                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                             <a id="add-product" class="btn btn-primary"  style="width:200px">Add Marketer</a> 
                                                                        </div>
                                                                         
                                                                        <table id="products" style="margin-top:20px; display:none; margin-left:10px">

                                                                          
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Marketer</th>
                                                                                    <th>Percentage</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="product-row" style="margin-top:20px">
                                                                                    <td style="width:60%">
                                                                                        <select required class="form-control form-select"  name="marketer_id[]" id="thickness">
                                                                                            <option value="">--Select Marketer--</option>
                                                                                            @forelse($marketers as $row)
                                                                                                    <option value="{{$row->id}}">{{$row->firstname. ' '. $row->lastname}}</option>
                                                                                                @empty
                                                                                            @endforelse
                                                                                        </select>
                                                                                    </td>
                                                                                    <td style="width:28%"><input type="number" required class="form-control percentage"  name="percentage[]" /></td>
                                                                                
                                                                                    <td>
                                                                                        <a class="remove-product btn btn-danger">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                            </svg>
                                                                                            </a>
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="text">Amount Paid</label>
                                                                            <input type="number" required name="amount_paid" class="form-control numberFormat"
                                                                                id="amount_paid" placeholder="eg: 10000">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="location">Job Location</label>
                                                                            <select class="form-control" name="location" required>
                                                                                <option value="">--Select Job Location--</option>
                                                                                @foreach ($locations as $val)
                                                                                    <option value="{{$val->id}}">{{$val->city}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                                        <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <hr/>
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
@endsection
