
@extends('company.layout.master')
@section('content')
@section('title', 'Dashboard')
@php $page = 'edit_order' @endphp
@php $job_edit_name = 'edit_higher_education' @endphp

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
                                @include('company.job_order.job_order_view_inc')

                                <div class="col-md-9 col-xl-9">
                                    @if(request()->job_title == 'Higher_NoteBook')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Higher Education Job Order</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <div class="row g-3 mb-3 mt-3">
                                                                <div class="col-md-12">
                                                                    <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="customer_name">Customer Name</label>
                                                                                <select name="customer_id" required class="form-control form-select" id="customer_name">
                                                                                    <option value="">--Select Customer--</option>
                                                                                    @foreach ($customers as $val)
                                                                                        <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?> >{{$val->firstname.' '.$val->lastname}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="quantity">Quantity</label>
                                                                                <input type="number" required name="quantity" class="form-control" id="quantity" value="{{$job_order->quantity}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="ink">Ink</label>
                                                                                <select name="ink" class="form-control form-select" id="exampleFormControlSelect1" >
                                                                                    <option value="">--Select Ink--</option>
                                                                                    <option value="black" <?php if ($job_order->ink == 'black') echo 'selected' ?>>Black</option>
                                                                                    <option value="full ink" <?php if ($job_order->ink == 'full ink') echo 'selected' ?>>Full Ink</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="paper_type">Paper Type</label>
                                                                                <select name="paper_type" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Paper Type--</option>
                                                                                    <option value="2 Part White | Canary" <?php if ($job_order->paper_type == '2 Part White | Canary') echo 'selected' ?>>2 Part White | Canary</option>
                                                                                    <option value="2 Part White | Pink" <?php if ($job_order->paper_type == '2 Part White | Pink') echo 'selected' ?>>2 Part White | Pink</option>
                                                                                    <option value="3 Part White | Canary | Pink" <?php if ($job_order->paper_type == '3 Part White | Canary | Pink') echo 'selected' ?>>3 Part White | Canary | Pink</option>
                                                                                    <option value="4 Part White | Canary | Pink | Goldenrod" <?php if ($job_order->paper_type == '4 Part White | Canary | Pink | Goldenrod') echo 'selected' ?>>4 Part White | Canary | Pink | Goldenrod</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)</label>
                                                                                    <input required type="number" name="production_time" class="form-control" id="quantity" value="{{$job_order->production_days}}" placeholder="eg: 4">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Back Sided Print</label>
                                                                                <select class="form-control form-select"  name="back_sided_print" id="backsided">
                                                                                    <option value="">--Select Back Sided Print</option>
                                                                                    <option value="yes" <?php if ($job_order->back_sided_print == 'yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="no" <?php if ($job_order->back_sided_print == 'no') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select required class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed</option>
                                                                                    <option value="yes" <?php if ($job_order->proof_needed == 'yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="no" <?php if ($job_order->proof_needed == 'no') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" required name="total_cost" class="form-control"
                                                                                    id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                        </div>
                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                            <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                        </button>

                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == 'Small_Invoice')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Small Invoice Job Order</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <div class="row g-3 mb-3 mt-3">
                                                                <div class="col-md-12">
                                                                    <form method="POST"  id="small_invoice" class="small_invoice">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="customer_name">Customer Name</label>
                                                                                <select name="customer_id" class="form-control form-select" id="customer_name">
                                                                                    <option value="">--Select Customer--</option>
                                                                                    @foreach ($customers as $val)
                                                                                        <option value="{{$val->id}}"  <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="quantity">Quantity </label>
                                                                                    <input name="quantity" type="number" class="form-control" id="quantity" value="{{$job_order->quantity}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="size">Size</label>
                                                                                <select name="size" class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Size--</option>
                                                                                    <option value="5.5 x 8.5"  <?php if ($job_order->size == '5.5 x 8.5') echo 'selected' ?>>5.5 x 8.5</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Ink </label>
                                                                                <select name="ink" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Ink</option>
                                                                                    <option value="Black" <?php if ($job_order->ink == 'Black') echo 'selected' ?>>Black</option>
                                                                                    <option value="Full Ink" <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?>>Full Ink</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="paper_type">Paper Type </label>
                                                                                <select name="paper_type" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Paper Type--</option>
                                                                                    <option value="2 Part White | Canary" <?php if ($job_order->paper_type == '2 Part White | Canary') echo 'selected' ?>>2 Part White | Canary</option>
                                                                                    <option value="2 Part White | Pink" <?php if ($job_order->paper_type == '2 Part White | Pink') echo 'selected' ?>>2 Part White | Pink</option>
                                                                                    <option value="3 Part White | Canary | Pink" <?php if ($job_order->paper_type == '3 Part White | Canary | Pink') echo 'selected' ?>>3 Part White | Canary | Pink</option>
                                                                                    <option value="4 Part White | Canary | Pink | Goldenrod" <?php if ($job_order->paper_type == '4 Part White | Canary | Pink | Goldenrod') echo 'selected' ?>>4 Part White | Canary | Pink | Goldenrod</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)</label>
                                                                                 <input type="number" name="production_time" class="form-control"  id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Back Sided Print</label>
                                                                                <select class="form-control form-select"  name="back_sided_print" id="back_sided_print">
                                                                                    <option value="">--Select Back Sided Print</option>
                                                                                    <option value="yes" <?php if ($job_order->back_sided_print == 'yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="no" <?php if ($job_order->back_sided_print == 'no') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed</option>
                                                                                    <option value="yes" <?php if ($job_order->proof_needed == 'yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="no" <?php if ($job_order->proof_needed == 'no') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="hole_drilling">Hole Drilling</label>
                                                                                <select class="form-control form-select"  name="hole_drilling" id="hole_drilling">
                                                                                    <option value="">--Select Hole Drilling</option>
                                                                                    <option value="yes" <?php if ($job_order->hole_drilling == 'yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="no" <?php if ($job_order->hole_drilling == 'no') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Perforating</label>
                                                                                <select class="form-control form-select"  name="perforating" id="perforating">
                                                                                    <option value="">--Select Perforating--</option>
                                                                                    <option value="yes" <?php if ($job_order->perforating == 'yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="no" <?php if ($job_order->perforating == 'no') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="edge_to_glue">Edge to Glue</label>
                                                                                <select class="form-control form-select"  name="edge_to_glue" id="edge_to_glue">
                                                                                    <option value="">--Select Edge to Glue--</option>
                                                                                    <option value="top" <?php if ($job_order->edge_to_glue == 'top') echo 'selected' ?>>Top</option>
                                                                                    <option value="bottom" <?php if ($job_order->edge_to_glue == 'bottom') echo 'selected' ?>>Bottom</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="books_with_covers">Books with Covers</label>
                                                                                <select class="form-control form-select"  name="books_with_covers" id="books_with_covers">
                                                                                    <option value="">--Select Book with Covers--</option>
                                                                                    <option value="No" <?php if ($job_order->books_with_covers == 'No') echo 'selected' ?>>No</option>
                                                                                    <option value="YES - Books of 25's w/glue*" <?php if ($job_order->books_with_covers == "YES - Books of 25's w/glue*") echo 'selected' ?>>YES - Books of 25's w/glue*</option>
                                                                                    <option value="YES - Books of 50's w/glue*" <?php if ($job_order->books_with_covers == "YES - Books of 50's w/glue*") echo 'selected' ?>>YES - Books of 50's w/glue*</option>
                                                                                    <option value="YES - Books of 25's w/perf+stapled*" <?php if ($job_order->books_with_covers == "YES - Books of 25's w/perf+stapled*") echo 'selected' ?>>YES - Books of 25's w/perf+stapled*</option>
                                                                                    <option value="YES - Books of 50's w/perf+stapled* (Recommended)" <?php if ($job_order->books_with_covers == "YES - Books of 50's w/perf+stapled* (Recommended)") echo 'selected' ?>>YES - Books of 50's w/perf+stapled* (Recommended)</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Numbering Needed</label>
                                                                                <select class="form-control form-select"  name="numbering_needed" id="numbering_needed">
                                                                                    <option value="">--Select Numbering Needed--</option>
                                                                                    <option value="Yes - Top-Right Print" <?php if ($job_order->numbering_needed == 'Yes - Top-Right Print') echo 'selected' ?>>Yes - Top-Right Print</option>
                                                                                    <option value="Yes - Top-Right Crash Discontinued" <?php if ($job_order->numbering_needed == 'Yes - Top-Right Crash Discontinued') echo 'selected' ?>>Yes - Top-Right Crash Discontinued</option>
                                                                                    <option value="Not Needed" <?php if ($job_order->numbering_needed == 'Not Needed') echo 'selected' ?>>Not Needed</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="start_number">Start Number</label>
                                                                                <input type="number" name="start_number" class="form-control" id="start_number" placeholder="eg: 4" value="{{$job_order->start_number}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="hole_drilling">Shrink Wrap:</label>
                                                                                <select class="form-control form-select"  name="shrink_wrap" id="shrink_wrap">
                                                                                    <option value="">--Select Shrink Wrap--</option>
                                                                                    <option value="Yes" <?php if ($job_order->shrink_wrap == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->shrink_wrap == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" name="total_cost" class="form-control"  id="total_cost" placeholder="eg:24000" value="{{$job_order->total_cost}}">
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
                                    @endif


                                    @if(request()->job_title == 'Twenty_Leaves')
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Create 20 Leaves Job Order</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
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
                                                                                    <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlInput1">Quantity </label>
                                                                            <input type="number" required name="quantity" class="form-control"  id="quantity" value="{{$job_order->quantity}}">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Ink
                                                                                </label> <select name="ink" class="form-control form-select"
                                                                                id="exampleFormControlSelect1">
                                                                                <option >--Select Ink--</option>
                                                                                <option value="Black" <?php if ($job_order->ink == 'Black') echo 'selected' ?>>Black</option>
                                                                                <option value="Full Ink" <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?>>Full Ink</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Paper Type</label>
                                                                            <select name="paper_type" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                <option >--Select Paper Type--</option>
                                                                                <option value="2 Part White | Canary" <?php if ($job_order->paper_type == '2 Part White | Canary') echo 'selected' ?>>2 Part White | Canary</option>
                                                                                <option value="2 Part White | Pink" <?php if ($job_order->paper_type == '2 Part White | Pink') echo 'selected' ?>>2 Part White | Pink</option>
                                                                                <option value="3 Part White | Canary | Pink" <?php if ($job_order->paper_type == '3 Part White | Canary | Pink') echo 'selected' ?>>3 Part White | Canary | Pink</option>
                                                                                <option value="4 Part White | Canary | Pink | Goldenrod" <?php if ($job_order->paper_type == '4 Part White | Canary | Pink | Goldenrod') echo 'selected' ?>>4 Part White | Canary | Pink | Goldenrod</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Production Time (Days)
                                                                                </label> <input required type="number" name="production_time" class="form-control" id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="backsided">Back Sided Print</label>
                                                                            <select class="form-control form-select"  name="back_sided_print" id="backsided">
                                                                                <option >--Select Back Sided Print--</option>
                                                                                <option value="Yes" <?php if ($job_order->back_sided_print == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                <option value="No" <?php if ($job_order->back_sided_print == 'No') echo 'selected' ?>>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Proof Needed</label>
                                                                            <select required class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                <option value="">--Select Proof Needed--</option>
                                                                                <option value="Yes" <?php if ($job_order->proof_needed == 'Yes') echo 'selected'?>>Yes</option>
                                                                                <option value="No" <?php if ($job_order->proof_needed == 'No') echo 'selected'?>>No</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="total_cost">Total Cost</label>
                                                                            <input type="number" required name="total_cost" class="form-control"
                                                                                id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                    </div>
                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                        <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                    </button>

                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                    @if(request()->job_title == 'Forty_Leaves')
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Create 40 Leaves Job Order</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="customer_name">Customer Name</label>
                                                                            <select name="customer_id" required class="form-control form-select" id="customer_name">
                                                                                <option value="">--Select Customer--</option>
                                                                                @foreach ($customers as $val)
                                                                                    <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="quantity">Quantity </label>
                                                                            <input type="number" required name="quantity" class="form-control" id="quantity" value="{{$job_order->quantity}}">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="ink">Ink </label>
                                                                            <select name="ink" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                <option value="Black" <?php if ($job_order->ink == 'Black') echo 'selected' ?>>Black</option>
                                                                                <option value="Full Ink" <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?>>Full Ink</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="paper_type">Paper Type
                                                                                </label> <select name="paper_type" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                <option value="2 Part White | Canary" <?php if ($job_order->paper_type == '2 Part White | Canary') echo 'selected' ?>>2 Part White | Canary</option>
                                                                                <option value="2 Part White | Pink" <?php if ($job_order->paper_type == '2 Part White | Pink') echo 'selected' ?>>2 Part White | Pink</option>
                                                                                <option value="3 Part White | Canary | Pink" <?php if ($job_order->paper_type == '3 Part White | Canary | Pink') echo 'selected' ?>>3 Part White | Canary | Pink</option>
                                                                                <option value="4 Part White | Canary | Pink | Goldenrod" <?php if ($job_order->paper_type == '4 Part White | Canary | Pink | Goldenrod') echo 'selected' ?>>4 Part White | Canary | Pink | Goldenrod</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Production Time (Days)
                                                                                </label> <input required type="number" name="production_time" class="form-control"
                                                                                id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="backsided">Back Sided Print</label>
                                                                            <select class="form-control form-select"  name="back_sided_print" id="backsided">
                                                                                <option value="">--Back Sided Print</option>
                                                                                <option value="Yes" <?php if ($job_order->back_sided_print == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                <option value="No" <?php if ($job_order->back_sided_print == 'No') echo 'selected' ?>>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Proof Needed</label>
                                                                            <select required class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                <option value="">--Select Proof Needed</option>
                                                                                <option value="Yes" <?php if ($job_order->proof_needed == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                <option value="No" <?php if ($job_order->proof_needed == 'No') echo 'selected' ?>>No</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="total_cost">Total Cost</label>
                                                                            <input type="number" required name="total_cost" class="form-control"
                                                                                id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                    </div>
                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                        <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                    </button>

                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                    @if(request()->job_title == 'Eighty_Leaves')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Eighty Leaves Job Order</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <div class="row g-3 mb-3 mt-3">
                                                                <div class="col-md-12">
                                                                    <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="customer_name">Customer Name</label>
                                                                                <select name="customer_id" required class="form-control form-select" id="customer_name">
                                                                                    @foreach ($customers as $val)
                                                                                        <option <?php if ($job_order->customer_id == $val->id) echo 'selected' ?> value="{{$val->id}}" >{{$val->firstname.' '.$val->lastname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlInput1">Quantity </label>
                                                                                <input type="number" required name="quantity" class="form-control"
                                                                                    id="quantity" value="{{$job_order->quantity}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Ink
                                                                                    </label> <select name="ink" class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option >--Select Ink--</option>
                                                                                    <option <?php if ($job_order->ink == 'Black') echo 'selected' ?> value="Black">Black</option>
                                                                                    <option <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?> value="Full Ink">Full Ink</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Paper Type
                                                                                    </label> <select name="paper_type" class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option >--Select Paper Type--</option>
                                                                                    <option <?php if ($job_order->paper_type == '2 Part White | Canary') echo 'selected' ?> value="2 Part White | Canary">2 Part White | Canary</option>
                                                                                    <option <?php if ($job_order->paper_type == '2 Part White | Pink') echo 'selected' ?>  value="2 Part White | Pink">2 Part White | Pink</option>
                                                                                    <option <?php if ($job_order->paper_type == '3 Part White | Canary | Pink') echo 'selected' ?>  value="3 Part White | Canary | Pink">3 Part White | Canary | Pink</option>
                                                                                    <option <?php if ($job_order->paper_type == '4 Part White | Canary | Pink | Goldenrod') echo 'selected' ?>  value="4 Part White | Canary | Pink | Goldenrod">4 Part White | Canary | Pink | Goldenrod</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)
                                                                                    </label> <input required type="number" name="production_time" class="form-control"
                                                                                    id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Back Sided Print</label>
                                                                                <select class="form-control form-select"  name="back_sided_print" id="backsided">
                                                                                    <option value="">--Select Back Sided Print --</option>
                                                                                    <option <?php if ($job_order->back_sided_print == 'Yes') echo 'selected' ?> value="Yes">Yes</option>
                                                                                    <option <?php if ($job_order->back_sided_print == 'No') echo 'selected' ?> value="No">No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select required class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed--</option>
                                                                                    <option <?php if ($job_order->proof_needed == 'Yes') echo 'selected' ?> value="Yes">Yes</option>
                                                                                    <option <?php if ($job_order->proof_needed == 'No') echo 'selected' ?> value="No">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" required name="total_cost" class="form-control"
                                                                                    id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                        </div>
                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                            <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                        </button>

                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == 'Booklet')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Booklet Job Order</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">
                                                            <div class="row g-3 mb-3 mt-3">
                                                                <div class="col-md-12">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="customer_name">Customer Name</label>
                                                                                    <select name="customer_id" class="form-control form-select" id="customer_id">
                                                                                        @foreach ($customers as $val)
                                                                                            <option value="{{$val->id}}">{{$val->firstname.' '.$val->lastname }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlInput1">Quantity
                                                                                    </label> <input required name="required" type="number" class="form-control"
                                                                                    id="quantity">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Size
                                                                                    </label> <select required name="size" class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option value="">Select Option 1</option>
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
                                                                                    </label> <select name="ink"  class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option >--Select--</option>
                                                                                    <option value="Black">Black</option>
                                                                                    <option value="Full Ink">Full Ink</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Bleed
                                                                                    </label> <select name="bleed" class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option >--Select--</option>
                                                                                    <option value="No bleed (25 white margin) - (741)">No bleed (25 white margin)</option>
                                                                                    <option value="Yes bleed (Print to edge of the sheets) - (742)">Yes bleed (Print to edge of the sheets) - (742)</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Paper Type
                                                                                    </label> <select name="paper_type" class="form-control form-select"
                                                                                    id="exampleFormControlSelect1">
                                                                                    <option >--Select--</option>
                                                                                    <option value="2 Part White | Canary">2 Part White | Canary</option>
                                                                                    <option value="2 Part White | Pink">2 Part White | Pink</option>
                                                                                    <option value="3 Part White | Canary | Pink">3 Part White | Canary | Pink</option>
                                                                                    <option value="4 Part White | Canary | Pink | Goldenrod">4 Part White | Canary | Pink | Goldenrod</option>
                                                                                </select>
                                                                            </div>


                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Back Sided Print</label>
                                                                                <select class="form-control form-select"  name="back_sided_print" id="back_sided_print">
                                                                                    <option >--Select--</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                    <option value="No">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select required class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option >--Select--</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                    <option value="No">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="binding">Binding</label>
                                                                                <select class="form-control form-select"  name="bilding" id="binding">
                                                                                    <option >--Select--</option>
                                                                                    <option value="Wire-O (Black Wire Metal)">Wire-O (Black Wire Metal)</option>
                                                                                    <option value="None">None</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Binding Edge</label>
                                                                                <select class="form-control form-select"  name="binding_edge" id="binding_edge">
                                                                                    <option >--Select--</option>
                                                                                    <option value="Long edge">Long edge</option>
                                                                                    <option value="Short edge">Short edge</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="books_with_covers">Books with Covers</label>
                                                                                <select class="form-control form-select"  name="books_with_cover" id="books_with_cover">
                                                                                    <option >--Select--</option>
                                                                                    <option value="80# White Text Gloss">80# White Text Gloss</option>
                                                                                    <option value="60# White Text Uncoated">60# White Text Uncoated</option>
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
                                                                                <label for="hole_drilling">Books with Covers</label>
                                                                                <select class="form-control form-select"  name="hole_drilling" id="hole_drilling">
                                                                                    <option >--Select--</option>
                                                                                    <option value="Same as Paper type ">Same as Paper type</option>
                                                                                    <option value="80# Uncoated cover">80# Uncoated cover</option>
                                                                                    <option value="80# Gloss Cover">80# Gloss Cover</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="start_number">Cut to Size</label>
                                                                                <select class="form-control form-select"  name="cut_to_size" id="cut_to_size">
                                                                                    <option >--Select--</option>
                                                                                    <option value="No">No</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                </select>
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
                                    @endif

                                    @if(request()->job_title == 'Bronchures')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Bronchures Job Order</h5>
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
                                                                                        <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlInput1">Quantity   </label>
                                                                                    <input name="quantity" type="number" class="form-control"  id="quantity" value="{{$job_order->quantity}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="size">Size  </label>
                                                                                <select name="size" class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Size--</option>
                                                                                    <option value="8.5 x 11" <?php if ($job_order->size == '8.5 x 11') echo 'selected' ?>>8.5 x 11</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="ink">Ink </label>
                                                                                <select name="ink" class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Ink--</option>
                                                                                    <option value="Black" <?php if ($job_order->ink == 'Black') echo 'selected' ?>>Black</option>
                                                                                    <option value="Full Ink" <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?>>Full Ink</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="paper_type">Paper Type
                                                                                    </label>
                                                                                <select name="paper_type" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Paper Type--</option>
                                                                                    <option value="100# White Text Gloss" <?php if ($job_order->paper_type == '100# White Text Gloss') echo 'selected' ?>>100# White Text Gloss</option>
                                                                                    <option value="80# White Text Gloss" <?php if ($job_order->paper_type == '80# White Text Gloss') echo 'selected' ?>>80# White Text Gloss</option>
                                                                                    <option value="60# White Text Uncoated" <?php if ($job_order->paper_type == '60# White Text Uncoated') echo 'selected' ?>>60# White Text Uncoated</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="folding">Folding </label>
                                                                                <select name="folding" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Folding--</option>
                                                                                    <option value="Tri-fold" <?php if ($job_order->folding == 'Tri-fold') echo 'selected' ?>>Tri-fold</option>
                                                                                    <option value="Half-fold" <?php if ($job_order->folding == 'Half-fold') echo 'selected' ?>>Half-fold</option>
                                                                                    <option value="Z-fold" <?php if ($job_order->folding == 'Z-fold') echo 'selected' ?>>Z-fold</option>
                                                                                    <option value="No Folding ( Leave flat)" <?php if ($job_order->folding == 'No Folding ( Leave flat)') echo 'selected' ?>>No Folding ( Leave flat)</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="back_sided_print">Back Sided Print</label>
                                                                                <select class="form-control form-select"  name="back_sided_print" id="back_sided_print">
                                                                                    <option value="">--Select Back Sided Print--</option>
                                                                                    <option value="Yes" <?php if ($job_order->back_sided_print == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->back_sided_print == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed --</option>
                                                                                    <option value="Yes" <?php if ($job_order->proof_needed == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->proof_needed == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)</label>
                                                                                <input required type="number" name="production_time" class="form-control" id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                            </div>

                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" required name="total_cost" class="form-control" id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
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
                                    @endif

                                    @if(request()->job_title == 'Business_Cards')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Business Cards Job Order</h5>
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
                                                                                        <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlInput1">Quantity </label>
                                                                                    <input required name="quantity" type="number" class="form-control" id="quantity" value="{{$job_order->quantity}}">
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Size  </label>
                                                                                <select required name="size" class="form-control form-select" id="size">
                                                                                    <option value="">--Select Size--</option>
                                                                                    <option value="3.5inch x 2inch" <?php if ($job_order->size == '3.5inch x 2inch') echo 'selected' ?>>3.5inch x 2inch</option>
                                                                                </select>
                                                                            </div>
    
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="ink">Ink </label>
                                                                                <select required name="ink" class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Ink--</option>
                                                                                    <option value="Black" <?php if ($job_order->ink == 'Black') echo 'selected' ?>>Black</option>
                                                                                    <option value="Full Ink" <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?>>Full Ink</option>
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="paper">Paper Type </label>
                                                                                <select name="paper_type" required class="form-control form-select" id="paper_type">
                                                                                    <option value="">--Select Paper Type--</option>
                                                                                    <option value="14 pt Gloss Coverstock" <?php if ($job_order->paper_type == '14 pt Gloss Coverstock') echo 'selected' ?>>14 pt Gloss Coverstock</option>
                                                                                    <option value="80# Cover Uncoated (9pt)" <?php if ($job_order->paper_type == '80# Cover Uncoated (9pt)') echo 'selected' ?>>80# Cover Uncoated (9pt)</option>
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)</label>
                                                                                <input type="number" required name="production_time" class="form-control" id="quantity" placeholder="eg: 4 " value="{{$job_order->production_days}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Back Sided Print</label>
                                                                                <select required class="form-control form-select"  name="back_sided_print" id="backsided">
                                                                                    <option value="">--Select Back Sided Print--</option>
                                                                                    <option value="Yes" <?php if ($job_order->back_sided_print == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->back_sided_print == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select  class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed--</option>
                                                                                    <option value="Yes" <?php if ($job_order->proof_needed == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->proof_needed == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" required name="total_cost" class="form-control" id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                                            <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <hr/>
                                                            </div>
                                                        </div>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == 'Envelopes')
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
                                                                    <form method="POST"  id="add_notepads" class="add_notepads">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="customer_name">Customer Name </label>
                                                                                <select name="customer_id" required class="form-control form-select" id="customer_name">
                                                                                    <option value="">--Select Customer--</option>
                                                                                    @foreach ($customers as $val)
                                                                                        <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="quantity">Quantity </label>
                                                                                <input name="quantity" required type="number" class="form-control" id="quantity" value={{$job_order->quantity}}>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="size">Size </label>
                                                                                <select required name="size" class="form-control form-select" id="size">
                                                                                    <option value="">--Select Size--</option>
                                                                                    <option value="4.25 x 5.5" <?php if ($job_order->size == '4.25 x 5.5') echo 'selected' ?>>4.25 x 5.5</option>
                                                                                    <option value="5.5 x 8.5" <?php if ($job_order->size == '5.5 x 8.5') echo 'selected' ?>>5.5 x 8.5</option>
                                                                                    <option value="8.5 x 11" <?php if ($job_order->size == '8.5 x 11') echo 'selected' ?>>8.5 x 11</option>
                                                                                    <option value="3.6 x 8.5" <?php if ($job_order->size == '3.6 x 8.5') echo 'selected' ?>>3.6 x 8.5</option>
                                                                                    <option value="4.25 x 11" <?php if ($job_order->size == '4.25 x 11') echo 'selected' ?>>4.25 x 11</option>
                                                                                    <option value="8.5 x 14" <?php if ($job_order->size == '8.5 x 14') echo 'selected' ?>>8.5 x 14</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="ink">Ink </label>
                                                                                <select name="ink" name="ink" required class="form-control form-select" id="ink">
                                                                                    <option value="">--Select Ink</option>
                                                                                    <option value="Black" <?php if ($job_order->ink == 'Black') echo 'selected' ?>>Black</option>
                                                                                    <option value="Full Ink" <?php if ($job_order->ink == ' Ink') echo 'selected' ?>>Full Ink</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="paper">Paper Type </label>
                                                                                <select name="paper_type" required class="form-control form-select" id="paper_type">
                                                                                    <option value="">--Select Paper Type</option>
                                                                                    <option value="60# White" <?php if ($job_order->paper_type == '60# White') echo 'selected' ?>>60# White</option>
                                                                                    <option value="60# Yellow" <?php if ($job_order->paper_type == '60# Yellow') echo 'selected' ?>>60# Yellow</option>
                                                                                    <option value="60# Green" <?php if ($job_order->paper_type == '60# Green') echo 'selected' ?>>60# Green</option>
                                                                                    <option value="60# Pink" <?php if ($job_order->paper_type == '60# Pink') echo 'selected' ?>>60# Pink</option>
                                                                                    <option value="60# Goldenrod" <?php if ($job_order->paper_type == '60# Goldenrod') echo 'selected' ?>>60# Goldenrod</option>
                                                                                    <option value="60# Blue" <?php if ($job_order->paper_type == '60# Blue') echo 'selected' ?>>60# Blue</option>
                                                                                </select>

                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="page_count">Page Count </label>
                                                                                    <select  name="page_count" required class="form-control form-select" id="page_count">
                                                                                        <option value="">--Select Page Count</option>
                                                                                        <option value="50 Sheets" <?php if ($job_order->page_count == '50 Sheets') echo 'selected' ?>>50 Sheets</option>
                                                                                        <option value="100 sheets" <?php if ($job_order->page_count == '100 Sheets') echo 'selected' ?>>100 sheets</option>
                                                                                        <option value="25 sheets" <?php if ($job_order->page_count == '25 Sheets') echo 'selected' ?>>25 sheets</option>
                                                                                    </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Back Sided Print</label>
                                                                                <select class="form-control form-select" required  name="back_sided_print" id="back_sided_print">
                                                                                    <option value="">--Select Back Sided Print--</option>
                                                                                    <option value="Yes in Black" <?php if ($job_order->back_sided_print == 'Yes in Black') echo 'selected' ?>>Yes in Black</option>
                                                                                    <option value="Yes in Greyscale" <?php if ($job_order->back_sided_print == 'Yes in Greyscale') echo 'selected' ?>>Yes in Greyscale</option>
                                                                                    <option value="Yes in full color" <?php if ($job_order->back_sided_print == 'Yes in full color') echo 'selected' ?>>Yes in full color</option>
                                                                                    <option value="No" <?php if ($job_order->back_sided_print == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed--</option>
                                                                                    <option value="Yes" <?php if ($job_order->proof_needed == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->proof_needed == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="hole_drilling">Hole Drilling</label>
                                                                                <select class="form-control form-select"  name="hole_drilling" id="hole_drilling">
                                                                                    <option value="">--Select Hole Drilling</option>
                                                                                    <option value="Yes" <?php if ($job_order->hole_drilling == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->hole_drilling == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Perforating</label>
                                                                                <select required class="form-control form-select"  name="perforating" id="Perforating">
                                                                                    <option value="">--Select Perforating</option>
                                                                                    <option value="Yes" <?php if ($job_order->perforating == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->perforating == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Cut to Size</label>
                                                                                <select class="form-control form-select"  name="cut_to_size" id="cut_to_size">
                                                                                    <option value="">--Select Cut to Size--</option>
                                                                                    <option value="Yes" <?php if ($job_order->cut_to_size == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->cut_to_size == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="books_with_cover">Books with Covers</label>
                                                                                <select class="form-control form-select" required  name="books_with_cover" id="books_with_cover">
                                                                                    <option value="">--Select Books with Covers--</option>
                                                                                    <option value="Yes" <?php if ($job_order->books_with_cover == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->books_with_cover == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="shrink_wrap">Shrink Wrap</label>
                                                                                <select required class="form-control form-select"  name="shrink_wrap" id="shrink_wrap">
                                                                                    <option value="">--Select Shrink Wrap--</option>
                                                                                    <option value="No" <?php if ($job_order->shrink_wrap == 'No') echo 'selected' ?>>No</option>
                                                                                    <option value="YES 1 Pad Per Bundle*" <?php if ($job_order->shrink_wrap == 'YES 1 Pad Per Bundle*') echo 'selected' ?>>YES 1 Pad Per Bundle*</option>
                                                                                    <option value="YES 10 Pads Per Bundle*" <?php if ($job_order->shrink_wrap == 'YES 10 Pad Per Bundle*') echo 'selected' ?>>YES 10 Pads Per Bundle*</option>
                                                                                    <option value="YES 5 Pads Per Bundle*" <?php if ($job_order->shrink_wrap == 'YES 5 Pad Per Bundle*') echo 'selected' ?>>YES 5 Pads Per Bundle*</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)
                                                                                    </label> <input type="number" name="production_time" class="form-control"
                                                                                    id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="numbering_needed">Numbering Needed</label>
                                                                                <select required class="form-control  form-select"  name="numbering_needed" id="numbering_needed">
                                                                                    <option value="">--Select Numbering Needed-- </option>
                                                                                    <option value="Yes - Top-Right Print" <?php if ($job_order->numbering_needed == 'Yes - Top-Right Print') echo 'selected' ?>>Yes - Top-Right Print</option>
                                                                                    <option value="Yes - Top-Right Crash Discontinued" <?php if ($job_order->numbering_needed == 'Yes - Top-Right Crash Discontinued') echo 'selected' ?>>Yes - Top-Right Crash Discontinued</option>
                                                                                    <option value="Not Needed" <?php if ($job_order->numbering_needed == 'Not Needed') echo 'selected' ?>>Not Needed</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="start_number">Start Number</label>
                                                                                <input type="number" required name="start_number" class="form-control"
                                                                                    id="start_number" placeholder="eg: 4" value="{{$job_order->start_number}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" required name="total_cost" class="form-control"
                                                                                    id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
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
                                    @endif

                                    @if(request()->job_title == 'Flyer')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Create Flyers Job Order</h5>
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
                                                                                    <option >--Select Customer Name--</option>
                                                                                    @foreach ($customers as $val)
                                                                                        <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlInput1">Quantity
                                                                                    </label> <input required name="quantity" type="number" class="form-control"  id="quantity" value="{{$job_order->quantity}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="size">Size  </label>
                                                                                <select required name="size" class="form-control form-select" id="size">
                                                                                    <option value="">--Select Size--</option>
                                                                                    <option value="3.6 x 8.5" <?php if ($job_order->size == '3.6 x 8.5') echo 'selected' ?>>3.6 x 8.5</option>
                                                                                    <option value="4.25 x 5.5" <?php if ($job_order->size == '4.25 x 5.5') echo 'selected' ?>>4.25 x 5.5</option>
                                                                                    <option value="4.25 x 11"> <?php if ($job_order->size == '4.25 x 11') echo 'selected' ?>4.25 x 11</option>
                                                                                    <option value="5.5 x 8.5" <?php if ($job_order->size == '5.5 x 8.5') echo 'selected' ?>>5.5 x 8.5</option>
                                                                                    <option value="8.5 x 11" <?php if ($job_order->size == '8.5 x 11') echo 'selected' ?>>8.5 x 11</option>
                                                                                    <option value="8.5 x 14" <?php if ($job_order->size == '8.5 x 14') echo 'selected' ?>>8.5 x 14</option>
                                                                                    <option value="11 x 17" <?php if ($job_order->size == '11 x 17') echo 'selected' ?>>11 x 17</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Ink </label>
                                                                                <select name="ink" class="form-control form-select" id="ink">
                                                                                    <option value="">--Select Ink--</option>
                                                                                    <option value="Black" <?php if ($job_order->ink == 'Black') echo 'selected' ?>>Black</option>
                                                                                    <option value="Full Ink"  <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?>>Full Ink</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="paper_type">Paper Type </label>
                                                                                <select name="paper_type" required class="form-control form-select" id="paper_type">
                                                                                    <option value="">--Select Paper Type--</option>
                                                                                    <option value="100# White Text Gloss" <?php if ($job_order->paper_type == '100# White Text Gloss') echo 'selected' ?>>100# White Text Gloss</option>
                                                                                    <option value="14 pt Gloss Coverstock" <?php if ($job_order->paper_type == '14 pt Gloss Coverstock') echo 'selected' ?>>14 pt Gloss Coverstock</option>
                                                                                    <option value="60# White Text Uncoated" <?php if ($job_order->paper_type == '60# White Text Uncoated') echo 'selected' ?>>60# White Text Uncoated</option>
                                                                                    <option value="60# Yellow" <?php if ($job_order->paper_type == '60# Yellow"') echo 'selected' ?>>60# Yellow</option>
                                                                                    <option value="60# Green" <?php if ($job_order->paper_type == '60# Green') echo 'selected' ?>>60# Green</option>
                                                                                    <option value="60# Pink" <?php if ($job_order->paper_type == '60# Pink') echo 'selected' ?>>60# Pink</option>
                                                                                    <option value="60# Goldenrod" <?php if ($job_order->paper_type == '60# Goldenrod') echo 'selected' ?>>60# Goldenrod</option>
                                                                                    <option value="60# Blue" <?php if ($job_order->paper_type == '60# Blue') echo 'selected' ?>>60# Blue</option>
                                                                                    <option value="80# Cover Uncoated (9pt)" <?php if ($job_order->paper_type == '80# Cover Uncoated (9pt)') echo 'selected' ?>>80# Cover Uncoated (9pt)</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)
                                                                                    </label> <input type="number" required name="production_time" class="form-control"
                                                                                    id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="back_sided_print">Back Sided Print</label>
                                                                                <select class="form-control form-select"  name="back_sided_print" id="back_sided_print">
                                                                                    <option value="">--Select Back Sided Print</option>
                                                                                    <option value="Yes" <?php if ($job_order->back_sided_print == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->back_sided_print == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed--</option>
                                                                                    <option value="Yes" <?php if ($job_order->proof_needed == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->proof_needed == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>


                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="exampleFormControlSelect1">Cut to Size </label>

                                                                                <select name="cut_to_size" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                    <option value="">--Select to Size--</option>
                                                                                    <option value="No" <?php if ($job_order->cut_to_size == 'No') echo 'selected' ?>>No</option>
                                                                                    <option value="Yes" <?php if ($job_order->cut_to_size == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>



                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" required name="total_cost" class="form-control"
                                                                                    id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
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
                                    @endif

                                    @if(request()->job_title == 'Notepads')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Create Notepads Job Order</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">
                                                            <div class="row g-3 mb-3 mt-3">
                                                                <div class="col-md-12">
                                                                    <form method="POST"  id="add_notepads" class="add_notepads">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="customer_name">Customer Name </label>
                                                                                <select name="customer_id" required class="form-control form-select" id="customer_name">
                                                                                    <option value="">--Select Customer--</option>
                                                                                    @foreach ($customers as $val)
                                                                                        <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="quantity">Quantity </label>
                                                                                <input name="quantity" required type="number" class="form-control" id="quantity" value="{{$job_order->quantity}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="size">Size </label>
                                                                                <select required name="size" class="form-control form-select" id="size">
                                                                                    <option value="">--Select Size--</option>
                                                                                    <option value="4.25 x 5.5" <?php if ($job_order->size == '4.25 x 5.5') echo 'selected' ?>>4.25 x 5.5</option>
                                                                                    <option value="5.5 x 8.5" <?php if ($job_order->size == '5.5 x 8.5') echo 'selected' ?>>5.5 x 8.5</option>
                                                                                    <option value="8.5 x 11" <?php if ($job_order->size == '8.5 x 11') echo 'selected' ?>>8.5 x 11</option>
                                                                                    <option value="3.6 x 8.5" <?php if ($job_order->size == '3.6 x 8.5') echo 'selected' ?>>3.6 x 8.5</option>
                                                                                    <option value="4.25 x 11" <?php if ($job_order->size == '4.25 x 11') echo 'selected' ?>>4.25 x 11</option>
                                                                                    <option value="8.5 x 14" <?php if ($job_order->size == '8.5 x 14') echo 'selected' ?>>8.5 x 14</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="ink">Ink </label>
                                                                                <select name="ink" name="ink" required class="form-control form-select" id="ink">
                                                                                    <option value="">--Select Ink</option>
                                                                                    <option value="Black" <?php if ($job_order->ink == 'Blank') echo 'selected' ?>>Black</option>
                                                                                    <option value="Full Ink" <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?>>Full Ink</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="paper">Paper Type </label>
                                                                                <select name="paper_type" required class="form-control form-select" id="paper_type">
                                                                                    <option value="">--Select Paper Type</option>
                                                                                    <option value="60# White" <?php if ($job_order->paper_type == '60# White') echo 'selected' ?>>60# White</option>
                                                                                    <option value="60# Yellow" <?php if ($job_order->paper_type == '60# Yellow') echo 'selected' ?>>60# Yellow</option>
                                                                                    <option value="60# Green" <?php if ($job_order->paper_type == '60# Green') echo 'selected' ?>>60# Green</option>
                                                                                    <option value="60# Pink" <?php if ($job_order->paper_type == '60# Pink') echo 'selected' ?>>60# Pink</option>
                                                                                    <option value="60# Goldenrod" <?php if ($job_order->paper_type == '60# Goldenrod') echo 'selected' ?>>60# Goldenrod</option>
                                                                                    <option value="60# Blue" <?php if ($job_order->paper_type == '60# Blue') echo 'selected' ?>>60# Blue</option>
                                                                                </select>

                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="page_count">Page Count </label>
                                                                                    <select  name="page_count" required class="form-control form-select" id="page_count">
                                                                                        <option value="">--Select Page Count</option>
                                                                                        <option value="50 Sheets" <?php if ($job_order->page_count == '50 Sheets') echo 'selected' ?>>50 Sheets</option>
                                                                                        <option value="100 sheets" <?php if ($job_order->page_count == '100 Sheets') echo 'selected' ?>>100 sheets</option>
                                                                                        <option value="25 sheets" <?php if ($job_order->page_count == '25 Sheets') echo 'selected' ?>>25 sheets</option>
                                                                                    </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Back Sided Print</label>
                                                                                <select class="form-control form-select" required  name="back_sided_print" id="back_sided_print">
                                                                                    <option value="">--Select Back Sided Print--</option>
                                                                                    <option value="Yes in Black" <?php if ($job_order->back_sided_print == 'Yes in Black') echo 'selected' ?>>Yes in Black</option>
                                                                                    <option value="Yes in Greyscale" <?php if ($job_order->back_sided_print == 'Yes in Greyscale') echo 'selected' ?>>Yes in Greyscale</option>
                                                                                    <option value="Yes in full color" <?php if ($job_order->back_sided_print == 'Yes in full color') echo 'selected' ?>>Yes in full color</option>
                                                                                    <option value="No" <?php if ($job_order->back_sided_print == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed--</option>
                                                                                    <option value="Yes" <?php if ($job_order->proof_needed == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->proof_needed == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="hole_drilling">Hole Drilling</label>
                                                                                <select class="form-control form-select"  name="hole_drilling" id="hole_drilling">
                                                                                    <option value="">--Select Hole Drilling</option>
                                                                                    <option value="Yes" <?php if ($job_order->hole_drilling == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->hole_drilling == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="backsided">Perforating</label>
                                                                                <select required class="form-control form-select"  name="perforating" id="Perforating">
                                                                                    <option value="">--Select Perforating</option>
                                                                                    <option value="Yes" <?php if ($job_order->perforating == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->perforating == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Cut to Size</label>
                                                                                <select class="form-control form-select"  name="cut_to_size" id="cut_to_size">
                                                                                    <option value="">--Select Cut to Size--</option>
                                                                                    <option value="Yes" <?php if ($job_order->cut_to_size == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->cut_to_size == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="books_with_cover">Books with Covers</label>
                                                                                <select class="form-control form-select" required  name="books_with_cover" id="books_with_cover">
                                                                                    <option value="">--Select Books with Covers--</option>
                                                                                    <option value="Yes" <?php if ($job_order->books_with_covers == 'Yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="No" <?php if ($job_order->books_with_covers == 'No') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="shrink_wrap">Shrink Wrap</label>
                                                                                <select required class="form-control form-select"  name="shrink_wrap" id="shrink_wrap">
                                                                                    <option value="">--Select Shrink Wrap--</option>
                                                                                    <option value="No" <?php if ($job_order->shrink_wrap == 'No') echo 'selected' ?>>No</option>
                                                                                    <option value="YES 1 Pad Per Bundle*" <?php if ($job_order->shrink_wrap == 'YES 1 Pad Per Bundle*') echo 'selected' ?>>YES 1 Pad Per Bundle*</option>
                                                                                    <option value="YES 10 Pads Per Bundle*" <?php if ($job_order->shrink_wrap == 'YES 10 Pads Per Bundle*') echo 'selected' ?>>YES 10 Pads Per Bundle*</option>
                                                                                    <option value="YES 5 Pads Per Bundle*" <?php if ($job_order->shrink_wrap == 'YES 5 Pads Per Bundle*') echo 'selected' ?>>YES 5 Pads Per Bundle*</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)
                                                                                    </label> <input type="number" name="production_time" class="form-control"
                                                                                    id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="numbering_needed">Numbering Needed</label>
                                                                                <select required class="form-control  form-select"  name="numbering_needed" id="numbering_needed">
                                                                                    <option value="">--Select Numbering Needed-- </option>
                                                                                    <option value="Yes - Top-Right Print" <?php if ($job_order->numbering_needed == 'Yes - Top-Right Print') echo 'selected' ?>>Yes - Top-Right Print</option>
                                                                                    <option value="Yes - Top-Right Crash Discontinued" <?php if ($job_order->numbering_needed == 'Yes - Top-Right Crash Discontinued') echo 'selected' ?>>Yes - Top-Right Crash Discontinued</option>
                                                                                    <option value="Not Needed" <?php if ($job_order->numbering_needed == 'Not Needed') echo 'selected' ?>>Not Needed</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="start_number">Start Number</label>
                                                                                <input type="number" required name="start_number" class="form-control"
                                                                                    id="start_number" placeholder="eg: 4" value="{{$job_order->start_number}}">
                                                                            </div>

                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" required name="total_cost" class="form-control"
                                                                                    id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
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
                                    @endif

                                    @if(request()->job_title == 'Stickers')
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
                                                                                        <option value="{{$val->id}}" <?php if ($job_order->customer_id == $val->id) echo 'selected' ?>>{{$val->firstname.' '.$val->lastname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="quantity">Quantity</label> <input required type="number" name="quantity" class="form-control"
                                                                                    id="quantity" value="{{$job_order->quantity}}">
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="size">Size</label>
                                                                                <select class="form-control form-select" name="size" id="exampleFormControlSelect1">
                                                                                    <option value="">--Select Size--</option>
                                                                                    <option value="5.5 x 8.5 - (274)" <?php if ($job_order->size == '5.5 x 8.5 - (274)') echo 'selected' ?>>5.5 x 8.5</option>
                                                                                    <option value="2 x 3.5 - (514)" <?php if ($job_order->size == '2 x 3.5 - (514)') echo 'selected' ?>>2 x 3.5</option>
                                                                                    <option value="4 x 3 - (515)" <?php if ($job_order->size == '4 x 3 - (515)') echo 'selected' ?>>4 x 3</option>
                                                                                    <option value="8.5 x 11 - (272)" <?php if ($job_order->size == '8.5 x 11 - (272)') echo 'selected' ?>>8.5 x 11</option>
                                                                                    <option value="4.25 x 5.5 - (273)" <?php if ($job_order->size == '4.25 x 5.5 - (273)') echo 'selected' ?>>4.25 x 5.5</option>
                                                                                </select>
                                                                            </div>
    
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="ink">Ink</label>
                                                                                <select name="ink" class="form-control form-select" id="ink">
                                                                                    <option value="">--Select Ink--</option>
                                                                                    <option value="Black" <?php if ($job_order->ink == 'Black') echo 'selected' ?>>Black</option>
                                                                                    <option value="Full Ink" <?php if ($job_order->ink == 'Full Ink') echo 'selected' ?>>Full Ink</option>
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="paper_type">Paper Type</label>
                                                                                <select required name="paper_type" class="form-control form-select" id="paper_type">
                                                                                    <option value="">--Select Paper Type--</option>
                                                                                    <option value="2 Part White | Canary" <?php if ($job_order->paper_type == '2 Part White | Canary') echo 'selected' ?>>2 Part White | Canary</option>
                                                                                    <option value="2 Part White | Pink" <?php if ($job_order->paper_type == '2 Part White | Pink') echo 'selected' ?>>2 Part White | Pink</option>
                                                                                    <option value="3 Part White | Canary | Pink" <?php if ($job_order->paper_type == '3 Part White | Canary | Pink') echo 'selected' ?>>3 Part White | Canary | Pink</option>
                                                                                    <option value="4 Part White | Canary | Pink | Goldenrod" <?php if ($job_order->paper_type == '4 Part White | Canary | Pink | Goldenrod') echo 'selected' ?>>4 Part White | Canary | Pink | Goldenrod</option>
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="production_time">Production Time (Days)
                                                                                    </label> <input required type="number" name="production_time" class="form-control" id="quantity" placeholder="eg: 4" value="{{$job_order->production_days}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="proof_needed">Proof Needed</label>
                                                                                <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                    <option value="">--Select Proof Needed--</option>
                                                                                    <option value="yes" <?php if ($job_order->proof_needed == 'yes') echo 'selected' ?>>Yes</option>
                                                                                    <option value="no" <?php if ($job_order->proof_needed == 'no') echo 'selected' ?>>No</option>
                                                                                </select>
                                                                            </div>
    
                                                                            <div class="form-group mt-3 mb-3 col-md-4">
                                                                                <label for="total_cost">Total Cost</label>
                                                                                <input type="number" required name="total_cost" class="form-control"
                                                                                    id="total_cost" placeholder="eg: 24000" value="{{$job_order->total_cost}}">
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
                                    @endif

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

