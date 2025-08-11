
@extends('company.layout.master')
@section('content')
@section('title', 'Edit Tesimonial')
@php $page = 'edit_testimonial' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Testimonial</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('company.users.testimonial.all_testimonials')}}"><li class="active btn btn-primary" style="">View Testimonials</li></a>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.users.testimonial.testimonial_inc')

                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Edit Customer Testimonial</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-6">
                                                                            <label for="customer_name">Customer Name</label>
                                                                            <select name="customer_id" required class="form-control form-select" id="customer_name">
                                                                                <option >--Select Customer Name--</option>
                                                                                @foreach ($customers as $val)
                                                                                    <option value="{{$val->id}}" <?php if ($testimonial->customer_id == $val->id) echo 'selected' ?> >{{$val->firstname.' '.$val->lastname}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-6">
                                                                            <label for="production_time">Upload Image <span class="text-warning">(Don't upload if you are not uploading a new image) </span>
                                                                            </label>
                                                                                </label>
                                                                                <input  type="file" name="image" class="form-control"
                                                                                id="image">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                            <label for="address">Add Review Content
                                                                                </label>
                                                                                <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description') }}"
                                                                                id="description">{{$testimonial->description}}</textarea>
                                                                                @error('description')
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
