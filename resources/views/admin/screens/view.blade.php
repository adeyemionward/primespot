
@extends('admin.layout.master')
@section('content')
@section('title', 'View Screen')
@php $page = 'view'; @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Screen</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Screen</li>
                    </ol>
                </div>
            </div>
            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('admin.screens.side_inc')
                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">View Screen Details</h5>
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
                                                                      <td width="10%" class="question">Screen Id :</td>
                                                                      <td>{{$screen->id ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Name :</td>
                                                                        <td>{{$screen->name ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Code :</td>
                                                                        <td>{{$screen->code ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Resolution :</td>
                                                                        <td>{{$screen->resolution ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Orientation :</td>
                                                                        <td>{{$screen->orientation ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="20%" class="question">Daily Rate :</td>
                                                                        <td>₦{{$screen->daily_rate ?? 'N/A'}}</td>
                                                                     </tr>

                                                                     <tr class="det">
                                                                        <td width="10%" class="question">Commission Rate(%) :</td>
                                                                        <td>₦{{$screen->commission_rate ?? 'N/A'}}</td>
                                                                     </tr>
                                                                     <tr class="det">
                                                                        <td width="10%" class="question">Status :</td>
                                                                        <td>{{$screen->status ?? 'N/A'}}</td>
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

                <!-- 							Canvas Wrapper End -->

            </div>
        </div>
    </div>
@endsection


