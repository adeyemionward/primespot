

@extends('admin.layout.master')
@section('content')
@section('title', 'Inactive Subscription')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Inactive Subscription</h4>
                </div>
                {{-- <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('finance.expenses.add_expense')}}"><li class="active btn btn-primary" style="">Add Expense </li></a>
                    </ol>
                </div> --}}
            </div>
            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">
                        @include('admin.includes.date_range')
                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Company</th>
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Payment Date</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inactive_subscriptions as $val)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$val->company->name}}</td>
                                        <td>&#8358;{{$val->sub_amount}}</td>
                                        <td>{{date('D M d, Y', strtotime($val->sub_start_date))}}</td>
                                        <td>{{date('D M d, Y', strtotime($val->sub_end_date))}}</td>
                                        <td>{{date('D M d, Y', strtotime($val->created_at))}}</td>
                                        {{-- <td><a href="{{route('admin.finance.expenses.view_expense',[$val->id])}}"><span><i class="fa fa-eye"></i></span></a></td> --}}
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

