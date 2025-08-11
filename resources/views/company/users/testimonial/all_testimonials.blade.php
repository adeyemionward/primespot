
@extends('company.layout.master')
@section('content')
@section('title', 'All Testimonial')
@php $page = 'all_testimonial' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Testimonial</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('company.users.testimonial.add_testimonial')}}"><li class="active btn btn-primary" style="">Add Testimonial</li></a>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                {{-- @include('job_order.location.location_inc') --}}
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">View Testominials</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="canvas-wrapper">

                                                                <table id="example" class="table no-margin" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>S/N</th>
                                                                            <th>Name</th>
                                                                            <th>Content</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($all_testimonial as $val)
                                                                            <tr>
                                                                                <td>{{$loop->iteration}}</td>
                                                                                <td>{{$val->customer->firstname.' '.$val->customer->lastname}}</td>
                                                                                <td>{{$val->description}}</td>
                                                                                <td><a href="{{route('company.users.testimonial.view_testimonial',[$val->id])}}"><span><i class="fa fa-eye"></i></span></a></td>
                                                                            </tr>
                                                                        @endforeach
                                                                </table>
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
            </div>
        </div>
    </div>
@endsection

