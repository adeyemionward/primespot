
@extends('admin.layout.master')
@section('content')
@section('title', 'All Screens')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Screen List</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Screens</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">

                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Screen&nbsp;Name</th>
                                    <th>Host&nbsp;Name</th>
                                    <th>Code</th>
                                    <th>Orientation</th>
                                    <th>Resolution</th>
                                    <th>Daily Rate</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($screens as $index => $val)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>
                                            @if (is_null($val->host->name ?? 'N/A' ))
                                                N/A
                                            @else
                                                <a href="">{{$val->host->name ?? 'N/A'}}</a>
                                            @endif

                                        </td>
                                        <td>{{$val->code}}</td>
                                        <td>{{$val->orientation}}</td>
                                        <td>{{$val->resolution}}</td>
                                        <td>{{number_format($val->daily_rate)}}</td>
                                        <td>{{$val->status}}</td>
                                        <td><a href="{{route('admin.screens.view',$val->id)}}"><span><i class="fa fa-eye"></i></span></a></td>
                                    </tr>
                                @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

