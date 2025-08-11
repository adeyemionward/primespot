
@extends('company.layout.master')
@section('content')
@section('title', '2B_NoteBook')
@php $page = '2b_notebook' @endphp

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
                                            <h5 class="card-title mb-0 text-muted">Create 2B NoteBook Job Order</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_2b_notebook" class="add_2b_notebook">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <input type="hidden" name="note_type" value="2B NoteBook">
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Leaves
                                                                                </label>
                                                                            <select name="leaves" required class="form-control form-select"
                                                                                id="exampleFormControlSelect1">
                                                                                <option value="">--Select Leaves--</option>
                                                                                <option value="40">40 Leaves</option>
                                                                                <option value="20">20 Leaves</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="customer_name">Customer Name</label>
                                                                            <select name="customer_id" required class="form-control form-select" id="customer_name">
                                                                                <option >--Select Customer Name--</option>
                                                                                @foreach ($customers as $val)
                                                                                    <option value="{{$val->id}}">{{$val->firstname.' '.$val->lastname }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlInput1">Quantity </label>
                                                                            <input type="number" required name="quantity" class="form-control"
                                                                                id="quantity">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Ink
                                                                                </label>
                                                                            <select name="ink" required class="form-control form-select"
                                                                                id="exampleFormControlSelect1">
                                                                                <option value="">--Select Color Type--</option>
                                                                                <option value="single">Single Color</option>
                                                                                <option value="full">Full Color</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="thickness"> Cover Thickness</label>
                                                                            <select class="form-control form-select" required  name="thickness" id="thickness">
                                                                                <option value="">--Select Cover Thickness--</option>
                                                                                <option value="199g">199g</option>
                                                                                <option value="280g">280g</option>
                                                                                <option value="300g">300g</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Paper Type
                                                                                </label>
                                                                                <select name="paper_type" required class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Paper Type--</option>
                                                                                    <option value="50g">50g</option>
                                                                                    <option value="60g">60g</option>
                                                                                    <option value="70g">70g</option>
                                                                                    <option value="80g">80g</option>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Proof Needed</label>
                                                                            <select required class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                <option >--Select Proof Needed--</option>
                                                                                <option value="Yes">Yes</option>
                                                                                <option value="No">No</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="total_cost">Total Cost</label>
                                                                            <input type="text" required name="total_cost" class="form-control numberFormat"
                                                                                id="total_cost" placeholder="eg: 24000">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Payment Type</label>
                                                                            <select class="form-control form-select" name="payment_type" required>
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
                                                                            <label for="amount_paid">Amount Paid</label>
                                                                            <input type="text"  name="amount_paid" class="form-control numberFormat"
                                                                                id="amount_paid" placeholder="eg: 10000" required>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="location">Job Location</label>
                                                                            <select class="form-control form-select" name="location" required>
                                                                                <option value="">--Select Job Location--</option>
                                                                                @foreach ($locations as $val)
                                                                                    <option value="{{$val->id}}">{{$val->city}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Production Time (Days)
                                                                                </label> <input required type="number" name="production_time" class="form-control"
                                                                                id="quantity" placeholder="eg: 4">
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

                <!-- 							Canvas Wrapper End -->

            </div>

        </div>

    </div>
@endsection
