<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\JobPaymentHistory;
use App\Models\JobPaymentNewHistory;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $startDate  = request('date_from');
        $endDate    = request('date_to');

        if(request()->date_to && request()->date_from){
            $job_order_pay  = JobPaymentNewHistory::whereBetween('payment_date', [$startDate, $endDate])->get();
        }else{
            $job_order_pay  = JobPaymentNewHistory::all();

        }


        return view('finance.transactions.all_transactions', compact('job_order_pay'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionController  $transactionController
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionController $transactionController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionController  $transactionController
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionController $transactionController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionController  $transactionController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionController $transactionController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionController  $transactionController
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionController $transactionController)
    {
        //
    }
}
