
@extends('company.layout.master')
@section('content')
@section('title', 'Dashboard')
@php $page = 'envelopes' @endphp

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
                                            <h5 class="card-title mb-0 text-muted">Create Envelopes Job Order</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">
                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_business_card" class="add_business_card">
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
                                                                            <label for="quantity">Quantity
                                                                                </label> <input name="quantity" required type="number" class="form-control"
                                                                                id="quantity">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="size">Size </label>
                                                                            <select name="size" required class="form-control form-select">
                                                                                <option value="">--Select Size--</option>
                                                                                <option value="9.5 x 4.125">9.5 x 4.125</option>
                                                                                <option value="9 official envelope">9 official envelope</option>
                                                                                <option value="12 x 9">12 x 9</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="ink">Ink</label>
                                                                            <select required name="ink" class="form-control form-select" id="ink">
                                                                                <option value="">--Select Ink--</option>
                                                                                <option value="Black">Black</option>
                                                                                <option value="Full Ink">Full Ink</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="paper_type">Paper Type</label>
                                                                            <select name="paper_type" required class="form-control form-select" id="paper_type">
                                                                                <option value="">--Select Paper Type--</option>
                                                                                <option value="24# No window">24# No window</option>
                                                                                <option value="24# Peal and Seal">24# Peal and Seal</option>
                                                                                <option value="24# Window (Left Side)">24# Window (Left Side)</option>
                                                                                <option value="24# Window Peel and Seal">24# Window Peel and Seal</option>
                                                                                <option value="24# Security">24# Security</option>
                                                                                <option value="24# Security Window">24# Security Window</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Production Time (Days)
                                                                                </label> <input required type="number" name="production_time" class="form-control"
                                                                                id="quantity" placeholder="eg: 4">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="backsided">Back Sided Print</label>
                                                                            <select class="form-control form-select"  name="back_sided_print" id="back_sided_print">
                                                                                <option value="">--Select Back Sided Print--</option>
                                                                                <option value="Yes" >Yes</option>
                                                                                <option value="No">No</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Proof Needed</label>
                                                                            <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                <option value="">--Select Proof Needed --</option>
                                                                                <option value="Yes">Yes</option>
                                                                                <option value="No">No</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="total_cost">Total Cost</label>
                                                                            <input type="number" required name="total_cost" class="form-control"
                                                                                id="total_cost" placeholder="eg: 24000">
                                                                        </div>


                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Payment Type</label>
                                                                            <select class="form-control" name="payment_type" required>
                                                                                <option value="">--Select Payment Type--</option>
                                                                                <option value="Full Payment">Full Payment</option>
                                                                                <option value="Part Payment">Part Payment</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="amount_paid">Amount Paid</label>
                                                                            <input type="number" required name="amount_paid" class="form-control"
                                                                                id="amount_paid" placeholder="eg: 10000" >
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
