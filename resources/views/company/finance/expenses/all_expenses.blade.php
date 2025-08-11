
@extends('company.layout.master')
@section('content')
@section('title', 'All Expense')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">All Expenses</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('company.finance.expenses.add_expense')}}"><li class="active btn btn-primary" style="">Add Expense </li></a>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">
                        @include('company.includes.expense_date_range')
                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Expense Title</th>
                                    <th>Beneficiary</th>
                                    <th>Category</th>
                                    <th>Total Cost</th>
                                    <th>Payment Type</th>
                                    <th>Amount Paid</th>
                                    <th>Payment Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalCost = 0 ; $totalAmountPaid = 0 @endphp
                                @foreach ($expenses as $val)
                                    @php
                                        $totalCost += $val->total_cost;
                                        $totalAmountPaid += $val->expenseHistories->sum('amount_paid');
                                    @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$val->title}}</td>
                                        <td>{{@$val->supplierCompany->company_name ?? @$val->marketerName->firstname}}</td>
                                        <td>
                                        @if($val->title == 'Commission')
                                            Commission
                                        @else
                                                 {{$val->categoryName->category_name}}
                                        @endif

                                        </td>
                                        <td>&#8358;{{number_format($val->total_cost)}}</td>

                                        <td>{{$val->payment_type}}</td>
                                        <td>&#8358;{{number_format($val->expenseHistories->sum('amount_paid'))}}</td>
                                        <td>{{date('D M d, Y', strtotime($val->expense_date))}}</td>
                                        <td><a href="{{route('company.finance.expenses.view_expense',[$val->id])}}"><span><i class="fa fa-eye"></i></span></a></td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><b>Total Cost:</b></td>
                                        <td><b> &#8358;{{number_format($totalCost)}}</b></td>
                                        <td><b>Total Amount Paid:</b></td>
                                        <td><b> &#8358;{{number_format($totalAmountPaid)}}</b></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tfoot>


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

