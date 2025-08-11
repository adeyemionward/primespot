
@extends('admin.layout.master')
@section('content')
@section('title', 'Edit User')
@php $page = 'edit'; @endphp


    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">User</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('admin.users.profile_inc')
                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Update User Profile</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="edit_user" class="edit_user">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="firstname">Firstname:</label>
                                                                            <input type="text" name="firstname" id="firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" value="{{$user->firstname}}">
                                                                            @error('firstname')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="lastname">Lastname:</label>
                                                                            <input type="text" name="lastname" id="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" value="{{$user->lastname}}">
                                                                            @error('lastname')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>



                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="email">Email:</label>
                                                                            <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$user->email}}">
                                                                            @error('email')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="phone">Phone:</label>
                                                                            <input type="text" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{$user->phone}}">
                                                                            @error('phone')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="gender">Gender:</label>
                                                                            <select name="gender" id="" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="{{ old('gender') }}">
                                                                                <option value="">--Select Gender--</option>
                                                                                <option value="male" <?php if($user->gender =='male') echo "selected" ?>  >Male</option>
                                                                                <option value="female"<?php if($user->gender =='female') echo "selected" ?> >Female</option>
                                                                            </select>
                                                                            @error('gender')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                            <label for="address">Address
                                                                                </label>
                                                                                <textarea name="address"  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                                                id="address">{{$user->address}}</textarea>
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


