
@extends('admin.layout.master')
@section('content')
@section('title', 'All Theme')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Theme</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Theme</li>
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
                                    <th> Name</th>
                                    <th>Color Code</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($themes as $index => $val)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->color}}</td>
                                        <td><input type="color" value="{{$val->color}}" id="colorInput"></td>
                                        <td>
                                            <a href="{{route('admin.settings.theme.edit_theme',$val->id)}}"><span><i class="fa fa-edit"></i></span></a>
                                            <a href="{{route('admin.settings.theme.delete_theme',$val->id)}}" onclick="return confirm('Are you sure you want to delete this theme?');"><span><i class="fa fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

