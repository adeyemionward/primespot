
@extends('layout.master')
@section('content')
@section('title', 'Edit Supplier')
@php $page = 'edit'; @endphp


    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Supplier</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Supplier</li>
                    </ol>
                </div>
            </div>
            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('suppliers.side_inc')
                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Update Supplier Details</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_supplier" class="add_supplier">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="company_name">Company Name:</label>
                                                                        <input type="text" name="company_name" id="company_name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" value="{{ $supplier->company_name }}">
                                                                        @error('company_name')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="firstname">Firstname:</label>
                                                                            <input type="text" name="firstname" id="firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" value="{{$supplier->firstname}}">
                                                                            @error('firstname')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="lastname">Lastname:</label>
                                                                            <input type="text" name="lastname" id="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" value="{{$supplier->lastname}}">
                                                                            @error('lastname')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>



                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="email">Email:</label>
                                                                            <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$supplier->email}}">
                                                                            @error('email')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="phone">Phone:</label>
                                                                            <input type="text" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{$supplier->phone}}">
                                                                            @error('phone')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                            <label for="address">Address</label>
                                                                            <textarea name="address"  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                                            id="address">{{$supplier->address}}</textarea>
                                                                            @error('address')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
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
                        </div>
                    </div>




                </div>

                <!-- 							Canvas Wrapper End -->

            </div>
        </div>
    </div>
@endsection


