
@extends('company.layout.master')
@section('content')
@section('title', 'Dashboard')
@php $page = 'flyers' @endphp



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
                                                                                                <option value="{{$val->id}}">{{$val->firstname.' '.$val->lastname }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="exampleFormControlInput1">Quantity
                                                                                            </label> <input required name="quantity" type="number" class="form-control"  id="quantity">
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="size">Size  </label>
                                                                                        <select required name="size" class="form-control form-select" id="size">
                                                                                            <option value="">--Select Size--</option>
                                                                                            <option value="3.6 x 8.5">3.6 x 8.5</option>
                                                                                            <option value="4.25 x 5.5">4.25 x 5.5</option>
                                                                                            <option value="4.25 x 11">4.25 x 11</option>
                                                                                            <option value="5.5 x 8.5">5.5 x 8.5</option>
                                                                                            <option value="8.5 x 11">8.5 x 11</option>
                                                                                            <option value="8.5 x 14">8.5 x 14</option>
                                                                                            <option value="11 x 17">11 x 17</option>

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
																				<div class="row">
                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="exampleFormControlSelect1">Ink </label>
                                                                                        <select name="ink" class="form-control form-select" id="ink">
                                                                                            <option value="">--Select Ink--</option>
                                                                                            <option value="Black">Black</option>
                                                                                            <option value="Full Ink">Full Ink</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="paper_type">Paper Type </label>
                                                                                        <select name="paper_type" required class="form-control form-select" id="paper_type">
                                                                                            <option value="">--Select Paper Type--</option>
                                                                                            <option value="100# White Text Gloss">100# White Text Gloss</option>
                                                                                            <option value="14 pt Gloss Coverstock">14 pt Gloss Coverstock</option>
                                                                                            <option value="60# White Text Uncoated">60# White Text Uncoated</option>
                                                                                            <option value="60# Yellow">60# Yellow</option>
                                                                                            <option value="60# Green">60# Green</option>
                                                                                            <option value="60# Pink">60# Pink</option>
                                                                                            <option value="60# Goldenrod">60# Goldenrod</option>
                                                                                            <option value="60# Blue">60# Blue</option>
                                                                                            <option value="80# Cover Uncoated (9pt)">80# Cover Uncoated (9pt)</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="production_time">Production Time (Days)
                                                                                            </label> <input type="number" required name="production_time" class="form-control"
                                                                                            id="quantity" placeholder="eg: 4">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="back_sided_print">Back Sided Print</label>
                                                                                        <select class="form-control form-select"  name="back_sided_print" id="back_sided_print">
                                                                                            <option value="">--Select Back Sided Print</option>
                                                                                            <option value="Yes">Yes</option>
                                                                                            <option value="No">No</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="proof_needed">Proof Needed</label>
                                                                                        <select class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                            <option value="">--Select Proof Needed--</option>
                                                                                            <option value="Yes">Yes</option>
                                                                                            <option value="No">No</option>
                                                                                        </select>
                                                                                    </div>


                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="exampleFormControlSelect1">Cut to Size </label>

                                                                                        <select name="cut_to_size" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                            <option value="">--Select to Size--</option>
                                                                                            <option value="No">No</option>
                                                                                            <option value="Yes">Yes</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>



                                                                                <div class="row">
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
