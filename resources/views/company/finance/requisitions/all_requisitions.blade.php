
@extends('company.layout.master')
@section('content')
@section('title', 'All Requisition')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">All Requisitions</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Requisitions</a></li>
                        <li class="breadcrumb-item active">All Requisitions</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">
                        @include('company.includes.date_range')
                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Quantity</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requisitions as $index => $val)

                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$val->item}}</td>
                                        <td>{{$val->cost}}</td>
                                        <td>{{$val->quantity}}</td>
                                        <td>{{$val->description}}</td>
                                        <td><a href="{{route('company.requisitions.edit_requisition', $val->id)}}"><span><i class="fa fa-edit"></i></span></a></td>
                                    </tr>
                                @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

