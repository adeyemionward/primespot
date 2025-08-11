
@extends('layout.master')
@section('content')
@section('title', 'Dashboard')



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
                                    @include('job_order.job_order_inc')


                                    <div class="col-md-9 col-xl-9">
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Create Job Order</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">
                                                            <p>From an accessibility point of view, there is
                                                                currently no ies.</p>

                                                            <div class="row g-3 mb-3 mt-3">
                                                                <div class="col-md-12">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="customer_name">Customer Name
                                                                                    </label> <select name="customer_name" class="form-control form-select"
                                                                                    id="customer_name">
                                                                                    <option>Select Option 1</option>
                                                                                    <option>Select Option 2</option>
                                                                                    <option>Select Option 3</option>
                                                                                    <option>Select Option 4</option>
                                                                                    <option>Select Option 5</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlInput1">Quantity
                                                                                    </label> <input type="number" class="form-control"
                                                                                    id="quantity">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Size
                                                                                    </label> <select class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option>Select Option 1</option>
                                                                                    <option>Select Option 2</option>
                                                                                    <option>Select Option 3</option>
                                                                                    <option>Select Option 4</option>
                                                                                    <option>Select Option 5</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Ink
                                                                                    </label> <select class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option>Black</option>
                                                                                    <option>Full Ink</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Paper Type
                                                                                    </label> <select class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option value="295">2 Part White | Canary</option>
                                                                                    <option value="294">2 Part White | Pink</option>
                                                                                    <option value="292">3 Part White | Canary | Pink</option>
                                                                                    <option value="291">4 Part White | Canary | Pink | Goldenrod</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)
                                                                                    </label> <input type="number" name="production_time" class="form-control"
                                                                                    id="quantity" placeholder="eg: 4">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Back Sided Print</label>
                                                                                <select class="form-control form-select"  name="backsided" id="backsided">
                                                                                    <option value="295">Yes</option>
                                                                                    <option value="294">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="295">Yes</option>
                                                                                    <option value="294">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="hole_drilling">Hole Drilling</label>
                                                                                <select class="form-control form-select"  name="hole_drilling" id="hole_drilling">
                                                                                    <option value="295">Yes</option>
                                                                                    <option value="294">No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Perforating</label>
                                                                                <select class="form-control form-select"  name="backsided" id="backsided">
                                                                                    <option value="295">Yes</option>
                                                                                    <option value="294">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Edge to Glue</label>
                                                                                <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="295">Top</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="hole_drilling">Books with Covers</label>
                                                                                <select class="form-control form-select"  name="hole_drilling" id="hole_drilling">
                                                                                    <option value="295">Yes</option>
                                                                                    <option value="294">No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Numbering Needed</label>
                                                                                <select class="form-control form-select"  name="backsided" id="backsided">
                                                                                    <option value="295">Yes - Top-Right Print</option>
                                                                                    <option value="295">Yes - Top-Right Crash Discontinued</option>
                                                                                    <option value="295">Not Needed</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="start_number">Start Number</label>
                                                                                <input type="number" name="start_number" class="form-control"
                                                                                    id="start_number" placeholder="eg: 4">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" name="total_cost" class="form-control"
                                                                                    id="total_cost" placeholder="eg: 24000">
                                                                            </div>
                                                                        </div>
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
