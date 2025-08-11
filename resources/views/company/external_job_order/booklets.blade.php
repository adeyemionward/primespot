
@extends('company.layout.master')
@section('content')
@section('title', 'Dashboard')
@php $page ='booklets' @endphp



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
														<h5 class="card-title mb-0 text-muted">Create Booklet Job Order</h5>
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
                                                                                                <option value="">--Select Customer--</option>
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
                                                                                        <label for="size">Size</label>
                                                                                        <select required name="size" class="form-control form-select" id="size">
                                                                                            <option value="">--Select Size--</option>
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
                                                                                            <option >--Select Ink--</option>
                                                                                            <option value="Black">Black</option>
                                                                                            <option value="Full Ink">Full Ink</option>
                                                                                        </select>
                                                                                    </div>

                                                                                     <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="exampleFormControlSelect1">Bleed
                                                                                            </label> <select name="bleed" class="form-control form-select"
                                                                                            id="exampleFormControlSelect1">
                                                                                            <option >--Select Bleed--</option>
                                                                                            <option value="No bleed (25 white margin) - (741)">No bleed (25 white margin)</option>
                                                                                            <option value="Yes bleed (Print to edge of the sheets) - (742)">Yes bleed (Print to edge of the sheets) - (742)</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="exampleFormControlSelect1">Paper Type </label>
                                                                                            <select name="paper_type" class="form-control form-select"
                                                                                            id="exampleFormControlSelect1">
                                                                                            <option >--Select Paper Type --</option>
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
                                                                                            <option >--Select Proof Needed--</option>
                                                                                            <option value="Yes">Yes</option>
                                                                                            <option value="No">No</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="binding">Binding</label>
                                                                                        <select class="form-control form-select"  name="bilding" id="binding">
                                                                                            <option >--Select Binding--</option>
                                                                                            <option value="Wire-O (Black Wire Metal)">Wire-O (Black Wire Metal)</option>
                                                                                            <option value="None">None</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="proof_needed">Binding Edge</label>
                                                                                        <select class="form-control form-select"  name="binding_edge" id="binding_edge">
                                                                                            <option >--Select Binding Edge--</option>
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
                                                                                            <option >--Select Books with Covers--</option>
                                                                                            <option value="Same as Paper type ">Same as Paper type</option>
                                                                                            <option value="80# Uncoated cover">80# Uncoated cover</option>
                                                                                            <option value="80# Gloss Cover">80# Gloss Cover</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="start_number">Cut to Size</label>
                                                                                        <select class="form-control form-select"  name="cut_to_size" id="cut_to_size">
                                                                                            <option >--Select Cut to Size--</option>
                                                                                            <option value="No">No</option>
                                                                                            <option value="Yes">Yes</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                                        <label for="total_cost">Total Cost</label>
                                                                                        <input type="number" name="total_cost" class="form-control"
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
                                                                                        <input type="number"  name="amount_paid" class="form-control"
                                                                                            id="amount_paid" placeholder="eg: 10000" required>
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
