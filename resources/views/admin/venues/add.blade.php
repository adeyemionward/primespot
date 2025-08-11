
@extends('admin.layout.master')
@section('content')
@section('title', 'Add Venue')


    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Venue</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Venue</li>
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
                                            <h5 class="card-title mb-0 text-muted">Create Venue Details</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_user" class="add_user">
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
                                                                            <label for="city">City:</label>
                                                                            <input type="city" name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}">
                                                                            @error('city')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="state">State:</label>
                                                                            <select name="state" id="" class="form-select form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                                                                <option value="">--Select State--</option>
                                                                                <option value="abia">Abia</option>
                                                                                <option value="adamawa">Adamawa</option>
                                                                                <option value="akwa ibom">Akwa Ibom</option>
                                                                                <option value="anambra">Anambra</option>
                                                                                <option value="bauchi">Bauchi</option>
                                                                                <option value="bayelsa">Bayelsa</option>
                                                                                <option value="benue">Benue</option>
                                                                                <option value="borno">Borno</option>
                                                                                <option value="cross river">Cross River</option>
                                                                                <option value="delta">Delta</option>
                                                                                <option value="ebonyi">Ebonyi</option>
                                                                                <option value="edo">Edo</option>
                                                                                <option value="ekiti">Ekiti</option>
                                                                                <option value="enugu">Enugu</option>
                                                                                <option value="gombe">Gombe</option>
                                                                                <option value="imo">Imo</option>
                                                                                <option value="jigawa">Jigawa</option>
                                                                                <option value="kaduna">Kaduna</option>
                                                                                <option value="kano">Kano</option>
                                                                                <option value="katsina">Katsina</option>
                                                                                <option value="kebbi">Kebbi</option>
                                                                                <option value="kogi">Kogi</option>
                                                                                <option value="kwara">Kwara</option>
                                                                                <option value="lagos">Lagos</option>
                                                                                <option value="nasarawa">Nasarawa</option>
                                                                                <option value="niger">Niger</option>
                                                                                <option value="ogun">Ogun</option>
                                                                                <option value="ondo">Ondo</option>
                                                                                <option value="osun">Osun</option>
                                                                                <option value="oyo">Oyo</option>
                                                                                <option value="plateau">Plateau</option>
                                                                                <option value="rivers">Rivers</option>
                                                                                <option value="sokoto">Sokoto</option>
                                                                                <option value="taraba">Taraba</option>
                                                                                <option value="yobe">Yobe</option>
                                                                                <option value="zamfara">Zamfara</option>
                                                                                <option value="fct">FCT</option>
                                                                            </select>

                                                                            @error('state')
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
                                                                            @error('status')
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


