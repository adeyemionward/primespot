
@extends('admin.layout.master')
@section('content')
@section('title', 'Add Screen')


    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Screens</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Screens</li>
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
                                            <h5 class="card-title mb-0 text-muted">Create Screen Details</h5>
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
                                                                            <label for="name">Screen Name:</label>
                                                                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                                                                            @error('name')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="code">Code:</label>
                                                                            <input type="text" name="code" id="email" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" value="{{ old('code') }}">
                                                                            @error('code')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="resolution">Resolution:</label>
                                                                            <input type="text" name="resolution" id="resolution" class="form-control{{ $errors->has('resolution') ? ' is-invalid' : '' }}" value="{{ old('resolution') }}">
                                                                            @error('resolution')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                         <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="orientation">Orientation:</label>
                                                                            <select name="orientation" id="" class="form-select form-control{{ $errors->has('orientation') ? ' is-invalid' : '' }}" value="{{ old('orientation') }}">
                                                                                <option value="">--Select Orientation--</option>
                                                                                <option value="landscape">Landscape</option>
                                                                                <option value="portrait">Portrait</option>
                                                                            </select>
                                                                            @error('orientation')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mt-3 mb-3 col-md-2">
                                                                            <label for="status">Status:</label>
                                                                            <select name="status" id="" class="form-select form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" value="{{ old('status') }}">
                                                                                <option value="">--Select Status--</option>
                                                                                <option value="available">Available</option>
                                                                                <option value="unavailable">Unavailable</option>
                                                                            </select>
                                                                            @error('status')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="venue">Venue:</label>
                                                                            <select name="venue" id="" class="form-select form-control{{ $errors->has('venue') ? ' is-invalid' : '' }}" value="{{ old('venue') }}">
                                                                                <option value="">--Select Venue--</option>
                                                                                @foreach ($venues as $venue)
                                                                                    <option value="{{$venue->id}}">{{$venue->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('venue')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-2">
                                                                            <label for="venue">Host:</label>
                                                                            <select name="host_id" id="" class="form-select form-control{{ $errors->has('host_id') ? ' is-invalid' : '' }}" value="{{ old('host_id') }}">
                                                                                <option value="">--Select Host--</option>
                                                                                @foreach ($hosts as $row)
                                                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('host_id')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-2">
                                                                            <label for="daily_rate">Daily Rate:</label>
                                                                            <input type="number" name="daily_rate" id="resolution"  class="form-control{{ $errors->has('daily_rate') ? ' is-invalid' : '' }}" value="{{ old('daily_rate') }}">
                                                                            @error('daily_rate')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-2">
                                                                            <label for="commission_rate">Commission Rate(%):</label>
                                                                            <input type="number" name="commission_rate" id="commission_rate" class="form-control{{ $errors->has('commission_rate') ? ' is-invalid' : '' }}" value="{{ old('commission_rate') }}">
                                                                            @error('commission_rate')
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


