
@extends('layout.master')
@section('content')
@section('title', 'Dashboard')
@php $page = 'edit_order' @endphp

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
                                @include('job_order.job_order_view_inc')

                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Edit Twenty Leaves Job Order</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="row">
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

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Ink
                                                                                </label> <select name="ink" class="form-control form-select"
                                                                                id="exampleFormControlSelect1">
                                                                                <option >--Select Ink--</option>
                                                                                <option value="Black">Black</option>
                                                                                <option value="Full Ink">Full Ink</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Paper Type
                                                                                </label> <select name="paper_type" class="form-control form-select"
                                                                                id="exampleFormControlSelect1">
                                                                                <option >--Select Paper Type--</option>
                                                                                <option value="2 Part White | Canary">2 Part White | Canary</option>
                                                                                <option value="2 Part White | Pink">2 Part White | Pink</option>
                                                                                <option value="3 Part White | Canary | Pink">3 Part White | Canary | Pink</option>
                                                                                <option value="4 Part White | Canary | Pink | Goldenrod">4 Part White | Canary | Pink | Goldenrod</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Production Time (Days)
                                                                                </label> <input required type="number" name="production_time" class="form-control"
                                                                                id="quantity" placeholder="eg: 4">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="backsided">Back Sided Print</label>
                                                                            <select class="form-control form-select"  name="back_sided_print" id="backsided">
                                                                                <option >--Select Back Sided Print--</option>
                                                                                <option value="Yes">Yes</option>
                                                                                <option value="No">No</option>
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
                                                                            <input type="number" required name="total_cost" class="form-control"
                                                                                id="total_cost" placeholder="eg: 24000">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                    </div>
                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                        <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                    </button>
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
