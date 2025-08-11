
@extends('admin.layout.master')
@section('content')
@section('title', 'Add Company')

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Company</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Company</li>
                    </ol>
                </div>
            </div>
            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Create Company Details</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_company" class="add_company">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="name">Name:</label>
                                                                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                                                                            @error('name')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="contactperson">Contact person:</label>
                                                                            <input type="text" name="contactperson" id="contactperson" class="form-control{{ $errors->has('contactperson') ? ' is-invalid' : '' }}" value="{{ old('contactperson') }}">
                                                                            @error('contactperson')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="email">Email:</label>
                                                                            <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                                                                            @error('email')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="phone">Phone:</label>
                                                                            <input type="text" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}">
                                                                            @error('phone')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="city">City:</label>
                                                                            <input type="text" name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}">
                                                                            @error('city')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="state">State:</label>
                                                                            <input type="text" name="state" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" value="{{ old('state') }}">
                                                                            @error('state')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="country">Country:</label>
                                                                            <input type="text" name="country" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ old('country') }}">
                                                                            @error('country')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="status">Status:</label>
                                                                            <select name="status" id="" class="form-select form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" value="{{ old('status') }}">
                                                                                <option value="">--Select Status--</option>
                                                                                <option value="active">Active</option>
                                                                                <option value="inactive">Inactive</option>
                                                                            </select>
                                                                            @error('gender')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>


                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="name">Password:</label>
                                                                            <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">
                                                                            @error('name')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="subdomain">Company Subdomain:</label>
                                                                            <input type="text" name="subdomain" id="subdomain" class="form-control{{ $errors->has('subdomain') ? ' is-invalid' : '' }}" value="{{ old('subdomain') }}">
                                                                            @error('subdomain')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="phone">Role:</label>
                                                                            <select name="roles" class="form-control" id="">
                                                                                <option value="">--Select User Role--</option>
                                                                                @foreach ($roles as $val)
                                                                                    <option value="{{$val->name}}">{{ucfirst($val->name)}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('roles')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="sub_amount">Subscription Amount:</label>
                                                                            <input type="text" name="sub_amount" id="sub_amount" class="form-control{{ $errors->has('sub_amount') ? ' is-invalid' : '' }}" value="{{ old('sub_amount') }}">
                                                                            @error('sub_amount')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                        
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="sub_start_date">Start Date:</label>
                                                                            <input type="date" name="sub_start_date" id="sub_start_date" class="form-control{{ $errors->has('sub_start_date') ? ' is-invalid' : '' }}" value="{{ old('sub_start_date') }}">
                                                                            @error('sub_start_date')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                        
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="sub_end_date">End Date:</label>
                                                                            <input type="date" name="sub_end_date" id="sub_end_date" class="form-control{{ $errors->has('sub_end_date') ? ' is-invalid' : '' }}" value="{{ old('sub_end_date') }}">
                                                                            @error('sub_end_date')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                            <label for="address">Address
                                                                                </label>
                                                                                <textarea name="address"  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}"
                                                                                id="address"></textarea>
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

            </div>
        </div>
    </div>
@endsection


