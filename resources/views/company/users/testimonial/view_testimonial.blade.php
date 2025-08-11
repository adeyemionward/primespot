
@extends('company.layout.master')
@section('content')
@section('title', 'View Testimonial')
@php $page = 'view_testimonial' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Testimonial</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('company.users.testimonial.all_testimonials')}}"><li class="active btn btn-primary" style="">All Testimonials</li></a>
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
                                            <h5 class="card-title mb-0 text-muted">View Testimonial</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 ">
                                                            <div class="col-md-12">
                                                                <table width="100%"  class="details">
                                                                    <tr class="det">
                                                                      <td width="10%" class="question"> Id :</td>
                                                                      <td>{{$testimonial->id ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%" class="question">Customer :</td>
                                                                        <td>{{@$testimonial->customer->firstname.' '.@$testimonial->customer->lastname ?? 'N/A'}}</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%" class="question">Description :</td>
                                                                        <td>{{@$testimonial->description ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Created By :</td>
                                                                        <td>{{@$testimonial->createdBy->firstname.' '.@$testimonial->createdBy->lastname ?? 'N/A'}}</td>

                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Updated By :</td>
                                                                        <td>{{@$testimonial->updatedBy->firstname.' '.@$testimonial->updatedBy->lastname ?? 'N/A'}}</td>

                                                                    </tr>

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

