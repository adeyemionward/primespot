<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\JobOrder;
use App\Models\JobPaymentNewHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\FilterOrdersByDateTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    use FilterOrdersByDateTrait;
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:transaction-list', ['only' => ['index']]);

    }

    public function index(Request $request)
    {


        $startDate  = request('date_from');
        $endDate    = request('date_to');
        $customer   = request('customer');
      //  dd(app('company_id'));
        if(request()->has('customer')) {
            $job_order_pay = $this->filterJobPaymentHistoryByDate()->where('company_id', app('company_id'))->get();
        }else{
            $job_order_pay  = JobPaymentNewHistory::where('company_id', app('company_id'))->whereYear('created_at', Carbon::now()->year)->get();
        }

        return view('company.finance.transactions.all_transactions', compact('job_order_pay'));
    }

    public function addCustomerJobPayment(){
        $job_orders = JobOrder::where('cart_order_status', 2)
        ->where('company_id', app('company_id'))
        ->select('id', 'job_order_name', 'order_no')
        ->get();


        return view('company.finance.transactions.add_transaction', compact('job_orders'));
    }


    public function getJobOrders($customerId)
    {
        $job_orders = JobOrder::where('cart_order_status', 2)
        ->where('user_id', $customerId)
        ->where('company_id', app('company_id'))
        ->distinct()
        ->pluck('order_no');

        return response()->json($job_orders);

    }

    public function storeCustomerJobPayment(Request $request){
        try{
            $user = Auth::user();
            $order_date = date('Y-m-d');
            $order_id                   =  request('order_id');
            $amount_paid                =  request('amount_paid');
            $payment_type               =  request('payment_type');

            $job_order =  JobOrder::where('order_no',$order_id)->first();
            // dd($job_order);
            $job_pay = new JobPaymentNewHistory();
            $job_pay->company_id      = app('company_id');
            $job_pay->job_order_unique_id    = $job_order->job_order_unique_id;
            $job_pay->order_no        = $order_id;
            $job_pay->user_id         = $job_order->user_id;
            $job_pay->amount          = str_replace(',', '',$amount_paid);
            $job_pay->payment_type    = $payment_type;
            $job_pay->payment_date    = $order_date;
            $job_pay->created_by      = $user->id;
            $job_pay->save();
        }catch(\Exception $th){
            return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }


        return back()->with("flash_success","Order Payment updated successfully");
    }
}
