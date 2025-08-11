
@extends('admin.layout.master')
@section('content')
@section('title', 'Edit Venue')
@php $page = 'edit'; @endphp

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
                                @include('admin.venues.side_inc')
                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">View Venue Details</h5>
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
                                                                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', $venue->name) }}">
                                                                            @error('name')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>



                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="city">City:</label>
                                                                            <input type="city" name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city', $venue->city) }}">
                                                                            @error('city')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="state">State:</label>
                                                                            <select name="state" id="" class="form-select form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                                                                <option value="">--Select State--</option>
                                                                                <option value="abia" @if(isset($venue) && $venue->state == 'abia') selected @endif>Abia</option>
                                                                                <option value="adamawa" @if(isset($venue) && $venue->state == 'adamawa') selected @endif>Adamawa</option>
                                                                                <option value="akwa ibom" @if(isset($venue) && $venue->state == 'akwa ibom') selected @endif>Akwa Ibom</option>
                                                                                <option value="anambra" @if(isset($venue) && $venue->state == 'anambra') selected @endif>Anambra</option>
                                                                                <option value="bauchi" @if(isset($venue) && $venue->state == 'bauchi') selected @endif>Bauchi</option>
                                                                                <option value="bayelsa" @if(isset($venue) && $venue->state == 'bayelsa') selected @endif>Bayelsa</option>
                                                                                <option value="benue" @if(isset($venue) && $venue->state == 'benue') selected @endif>Benue</option>
                                                                                <option value="borno" @if(isset($venue) && $venue->state == 'borno') selected @endif>Borno</option>
                                                                                <option value="cross river" @if(isset($venue) && $venue->state == 'cross river') selected @endif>Cross River</option>
                                                                                <option value="delta" @if(isset($venue) && $venue->state == 'delta') selected @endif>Delta</option>
                                                                                <option value="ebonyi" @if(isset($venue) && $venue->state == 'ebonyi') selected @endif>Ebonyi</option>
                                                                                <option value="edo" @if(isset($venue) && $venue->state == 'edo') selected @endif>Edo</option>
                                                                                <option value="ekiti" @if(isset($venue) && $venue->state == 'ekiti') selected @endif>Ekiti</option>
                                                                                <option value="enugu" @if(isset($venue) && $venue->state == 'enugu') selected @endif>Enugu</option>
                                                                                <option value="gombe" @if(isset($venue) && $venue->state == 'gombe') selected @endif>Gombe</option>
                                                                                <option value="imo" @if(isset($venue) && $venue->state == 'imo') selected @endif>Imo</option>
                                                                                <option value="jigawa" @if(isset($venue) && $venue->state == 'jigawa') selected @endif>Jigawa</option>
                                                                                <option value="kaduna" @if(isset($venue) && $venue->state == 'kaduna') selected @endif>Kaduna</option>
                                                                                <option value="kano" @if(isset($venue) && $venue->state == 'kano') selected @endif>Kano</option>
                                                                                <option value="katsina" @if(isset($venue) && $venue->state == 'katsina') selected @endif>Katsina</option>
                                                                                <option value="kebbi" @if(isset($venue) && $venue->state == 'kebbi') selected @endif>Kebbi</option>
                                                                                <option value="kogi" @if(isset($venue) && $venue->state == 'kogi') selected @endif>Kogi</option>
                                                                                <option value="kwara" @if(isset($venue) && $venue->state == 'kwara') selected @endif>Kwara</option>
                                                                                <option value="lagos" @if(isset($venue) && $venue->state == 'lagos') selected @endif>Lagos</option>
                                                                                <option value="nasarawa" @if(isset($venue) && $venue->state == 'nasarawa') selected @endif>Nasarawa</option>
                                                                                <option value="niger" @if(isset($venue) && $venue->state == 'niger') selected @endif>Niger</option>
                                                                                <option value="ogun" @if(isset($venue) && $venue->state == 'ogun') selected @endif>Ogun</option>
                                                                                <option value="ondo" @if(isset($venue) && $venue->state == 'ondo') selected @endif>Ondo</option>
                                                                                <option value="osun" @if(isset($venue) && $venue->state == 'osun') selected @endif>Osun</option>
                                                                                <option value="oyo" @if(isset($venue) && $venue->state == 'oyo') selected @endif>Oyo</option>
                                                                                <option value="plateau" @if(isset($venue) && $venue->state == 'plateau') selected @endif>Plateau</option>
                                                                                <option value="rivers" @if(isset($venue) && $venue->state == 'rivers') selected @endif>Rivers</option>
                                                                                <option value="sokoto" @if(isset($venue) && $venue->state == 'sokoto') selected @endif>Sokoto</option>
                                                                                <option value="taraba" @if(isset($venue) && $venue->state == 'taraba') selected @endif>Taraba</option>
                                                                                <option value="yobe" @if(isset($venue) && $venue->state == 'yobe') selected @endif>Yobe</option>
                                                                                <option value="zamfara" @if(isset($venue) && $venue->state == 'zamfara') selected @endif>Zamfara</option>
                                                                                <option value="fct" @if(isset($venue) && $venue->state == 'fct') selected @endif>FCT</option>
                                                                            </select>

                                                                            @error('state')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="status">Status:</label>
                                                                            <select name="status" id="" class="form-select form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" value="{{ old('status') }}">
                                                                                <option value="">--Select Status--</option>
                                                                                <option value="active" @if($venue->status == 'active') selected @endif>Active</option>
                                                                                <option value="inactive" @if($venue->status == 'inactive') selected @endif>Inactive</option>
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
                                                                                <textarea name="address"  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address', $venue->address) }}"
                                                                                id="address">{{$venue->address}}</textarea>
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


