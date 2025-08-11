
@extends('company.layout.master')
@section('content')
@section('title', 'Dashboard')
@php $page = 'small_invoice' @endphp



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
														<h5 class="card-title mb-0 text-muted">Create Small Invoice Job Order</h5>
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
                                                                                                <option value="{{$val->id}}">{{$val->firstname.' '.$val->lastname }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="quantity">Quantity </label>
                                                                                            <input name="quantity" type="number" class="form-control" id="quantity">
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="size">Size</label>
                                                                                        <select name="size" class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                            <option value="">--Select Size--</option>
                                                                                            <option value="5.5 x 8.5">5.5 x 8.5</option>
                                                                                        </select>
                                                                                    </div>

                                                                                </div>
																				<div class="row">
                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="exampleFormControlSelect1">Ink </label>
                                                                                        <select name="ink" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                            <option value="">--Select Ink</option>
                                                                                            <option value="Black">Black</option>
                                                                                            <option value="Full Ink">Full Ink</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="paper_type">Paper Type </label>
                                                                                        <select name="paper_type" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                            <option value="">--Select Paper Type--</option>
                                                                                            <option value="2 Part White | Canary">2 Part White | Canary</option>
                                                                                            <option value="2 Part White | Pink">2 Part White | Pink</option>
                                                                                            <option value="3 Part White | Canary | Pink">3 Part White | Canary | Pink</option>
                                                                                            <option value="4 Part White | Canary | Pink | Goldenrod">4 Part White | Canary | Pink | Goldenrod</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="production_time">Production Time (Days)</label>
                                                                                         <input type="number" name="production_time" class="form-control"  id="quantity" placeholder="eg: 4">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="backsided">Back Sided Print</label>
                                                                                        <select class="form-control form-select"  name="back_sided_print" id="back_sided_print">
                                                                                            <option value="">--Select Back Sided Print</option>
                                                                                            <option value="yes">Yes</option>
                                                                                            <option value="no">No</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="proof_needed">Proof Needed</label>
                                                                                        <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                            <option value="">--Select Proof Needed</option>
                                                                                            <option value="yes">Yes</option>
                                                                                            <option value="no">No</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="hole_drilling">Hole Drilling</label>
                                                                                        <select class="form-control form-select"  name="hole_drilling" id="hole_drilling">
                                                                                            <option value="">--Select Hole Drilling</option>
                                                                                            <option value="yes">Yes</option>
                                                                                            <option value="no">No</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="backsided">Perforating</label>
                                                                                        <select class="form-control form-select"  name="perforating" id="perforating">
                                                                                            <option value="">--Select Perforating--</option>
                                                                                            <option value="yes">Yes</option>
                                                                                            <option value="no">No</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="edge_to_glue">Edge to Glue</label>
                                                                                        <select class="form-control form-select"  name="edge_to_glue" id="edge_to_glue">
                                                                                            <option value="">--Select Edge to Glue--</option>
                                                                                            <option value="top">Top</option>
                                                                                            <option value="bottom">Bottom</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="books_with_covers">Books with Covers</label>
                                                                                        <select class="form-control form-select"  name="books_with_covers" id="books_with_covers">
                                                                                            <option value="">--Select Book with Covers--</option>
                                                                                            <option value="No">No</option>
                                                                                            <option value="YES - Books of 25's w/glue*">YES - Books of 25's w/glue*</option>
                                                                                            <option value="YES - Books of 50's w/glue*">YES - Books of 50's w/glue*</option>
                                                                                            <option value="YES - Books of 25's w/perf+stapled*">YES - Books of 25's w/perf+stapled*</option>
                                                                                            <option value="YES - Books of 50's w/perf+stapled* (Recommended)">YES - Books of 50's w/perf+stapled* (Recommended)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="backsided">Numbering Needed</label>
                                                                                        <select class="form-control form-select"  name="numbering_needed" id="numbering_needed">
                                                                                            <option value="">--Select Numbering Needed--</option>
                                                                                            <option value="Yes - Top-Right Print">Yes - Top-Right Print</option>
                                                                                            <option value="Yes - Top-Right Crash Discontinued">Yes - Top-Right Crash Discontinued</option>
                                                                                            <option value="Not Needed">Not Needed</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="start_number">Start Number</label>
                                                                                        <input type="number" name="start_number" class="form-control" id="start_number" placeholder="eg: 4">
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="hole_drilling">Shrink Wrap:</label>
                                                                                        <select class="form-control form-select"  name="shrink_wrap" id="shrink_wrap">
                                                                                            <option value="">--Select Shrink Wrap--</option>
                                                                                            <option value="Yes">Yes</option>
                                                                                            <option value="No">No</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="total_cost">Total Cost</label>
                                                                                        <input type="number" name="total_cost" class="form-control"  id="total_cost" placeholder="eg:24000">
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
                                                                                            id="amount_paid" placeholder="eg: 10000">
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
