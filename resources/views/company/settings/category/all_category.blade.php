
@extends('company.layout.master')
@section('content')
@section('title', 'Expense Category')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Expense Category</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('company.settings.category.add_category')}}"><li class="active btn btn-primary" style="">Add Expense Category</li></a>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">
                        {{-- @include('company.includes.date_range') --}}
                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expense_category as $index => $val)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$val->category_name}}</td>
                                        <td><a href="{{route('company.settings.category.edit_category',$val->id)}}"><span><i class="fa fa-edit"></i></span></a>
                                            <a href="{{route('company.settings.category.delete_category',$val->id)}}" onclick="return confirm('Are you sure you want to delete this category?');"><span><i class="fa fa-trash"></i></span></a>
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

