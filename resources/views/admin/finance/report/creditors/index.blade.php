
@extends('layout.master')
@section('content')
@section('title', 'Creditors Report')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">All Creditors</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Creditors</a></li>
                        <li class="breadcrumb-item active">All Creditors</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">
                        @include('includes.date_range')
                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Expense Title</th>
                                    <th>Supplier</th>
                                    <th>Category</th>
                                    <th>Payment Type</th>
                                    <th>Total Cost</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Remaining</th>
                                    <th>Payment Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $val)
                                @php
                                if ($val->total_cost == $val->expenseHistories->sum('amount_paid')) continue;  @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$val->title}}</td>
                                        <td>{{$val->supplierCompany->company_name}}</td>
                                        <td>{{$val->categoryName->category_name}}</td>
                                        <td>{{$val->payment_type}}</td>
                                        <td>&#8358;{{$val->total_cost}}</td>
                                        <td>{{'₦'.$val->expenseHistories->sum('amount_paid')}}</td>
                                        <td>{{'₦'.$val->total_cost - $val->expenseHistories->sum('amount_paid')}}</td>
                                        <td>{{date('D M d, Y', strtotime($val->expense_date))}}</td>
                                        <td><a href="{{route('finance.expenses.view_expense',[$val->id])}}"><span><i class="fa fa-eye"></i></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

