
@extends('company.layout.master')
@section('content')
@section('title', 'Edit Requisition')
@php $page = 'twenty_leaves' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted"> Requisition</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Requisition</li>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                {{-- @include('job_order.job_order_inc') --}}

                                <div class="col-md-9 col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Edit Requisition</h5>
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
                                                                            <label for="exampleFormControlInput1">Item </label>
                                                                            <input type="text" required name="item" class="form-control" id="quantity" value="{{$req->item}}">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlInput1">Quantity </label>
                                                                            <input type="number" required name="quantity" class="form-control"
                                                                                id="quantity" value="{{$req->quantity}}">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlInput1">cost </label>
                                                                            <input type="number" required name="cost" class="form-control"
                                                                                id="quantity" value="{{$req->cost}}">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                            <label for="exampleFormControlInput1">Description </label>
                                                                            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$req->description}}</textarea>
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
