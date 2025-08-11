<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\ExpensePaymentHistory;
use App\Models\Supplier;
use App\Models\JobOrder;
use App\Models\JobPaymentHistory;
use App\Models\MarketerPaymentHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\ErrorLog;
use App\Models\JobOrderUnique;
use App\Models\JobPaymentNewHistory;
use App\Traits\FilterOrdersByDateTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    use FilterOrdersByDateTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $startDate;
    public $endDate;

    public function __construct()
    {
        $this->middleware('auth');




        $this->middleware('permission:finance-create', ['only' => ['create_expense','store_expense']]);

        $this->middleware('permission:finance-expenses-list', ['only' => ['all_expenses']]);
        $this->middleware('permission:finance-expenses', ['only' => ['view_expenses']]);
        $this->middleware('permission:finance-edit', ['only' => ['edit_expense','update_expense']]);
        $this->middleware('permission:finance-delete', ['only' => ['delete_expense']]);
        $this->middleware('permission:finance-payment-history-list', ['only' => ['payment_history']]);
        $this->middleware('permission:finance-debtors-list', ['only' => ['all_debtors']]);
        $this->middleware('permission:finance-creditors-list', ['only' => ['all_creditors']]);
        $this->middleware('permission:finance-profits-list', ['only' => ['all_profit_loss']]);

        $this->middleware('permission:finance-expense-update', ['only' => ['update_expense_payment']]);

        $this->startDate  = request('date_from');
        $this->endDate    = request('date_to');
    }
    public function all_expenses(Request $request =  null)
    {

        if(request()->has('category')) {
            $expenses = $this->filterExpenseByDate()->with('expenseHistories')->where('company_id',app('company_id'))->orderBy('id','DESC')->get();
        }else{
            $expenses = Expense::with('expenseHistories')->where('company_id',app('company_id'))->whereYear('created_at', Carbon::now()->year)->orderBy('id','DESC')->get();
        }

        return view('company.finance.expenses.all_expenses', compact('expenses'));
    }

    public function create_expense()
    {
        $categories =  ExpenseCategory::where('company_id',app('company_id'))->get();
        $suppliers =  Supplier::where('company_id',app('company_id'))->get();

        return view('company.finance.expenses.add_expense', compact('categories','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_expense(Request $request)
    {
        DB::beginTransaction();
        $user = Auth::user();
        $validatedData = $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'payment_type' => 'required',
            'total_cost' => 'required',
            'amount_paid' => 'required',
            'expense_date' => 'required|string',
            // 'description' => 'required|string',

        ], [
            'title.required' => 'Please enter title.',
            'category_id.required' => 'Please select category.',
            'supplier_id.required' => 'Please select supplier.',
            'payment_type.required' => 'Please select payment type.',
            'total_cost.required' => 'Please enter total cost.',
            'amount_paid.required' => 'Please enter ampunt paid.',
            'expense_date.required' => 'Please select expense date.',
            // 'description.required' => 'Please enter Description.',
        ]);

       try{
            $expense = new Expense();
            $expense->company_id    = app('company_id');
            $expense->title         = request('title');
            $expense->category_id   = request('category_id');
            $expense->supplier_id   = request('supplier_id');
            $expense->payment_type  = request('payment_type');
            $expense->total_cost    = str_replace(',', '',request('total_cost'));
            $expense->amount_paid   = str_replace(',', '',request('amount_paid'));
            $expense->expense_date  = request('expense_date');
            $expense->description   = request('description');
            $expense->created_by    = $user->id;
            $expense->save();

            //save into expense payment history
            $expense_history = new ExpensePaymentHistory();
            $expense_history->expense_id    = $expense->id;
            $expense_history->company_id    = app('company_id');
            $expense_history->amount_paid   = str_replace(',', '',request('total_cost'));
            $expense_history->payment_type  = str_replace(',', '',request('amount_paid'));
            $expense_history->expense_date  = request('expense_date');
            $expense_history->created_by    = $user->id;
            $expense_history->save();

            DB::commit();
            return redirect(route('company.finance.expenses.all_expenses'))->with('flash_success','Expense saved successfully');

        }catch (\Throwable $th){
            DB::rollBack();
            ErrorLog::log('expenses', '__METHOD__', $th->getMessage()); //log error
            return back()->with("flash_error","There is an error processing this request");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function view_expense($id)
    {
        $expense =  Expense::find($id);
        $expense_history  = ExpensePaymentHistory::select(DB::raw('SUM(amount_paid) as amount_paid'))
            ->where('expense_id',$id)->where('company_id',app('company_id'))
            ->first();
        return view('company.finance.expenses.view_expense', compact('expense','expense_history'));
    }

    public function edit_expense($id)
    {
        $expense =  Expense::find($id);
        $categories =  ExpenseCategory::where('company_id',app('company_id'))->get();
        $suppliers =  Supplier::where('company_id',app('company_id'))->get();
        return view('company.finance.expenses.edit_expense', compact('expense','categories','suppliers'));
    }
    public function update_expense($id)
    {
        DB::beginTransaction();
        $user = Auth::user();
        try{
            $expense =  Expense::find($id);
            $expense->title         = request('title');
            $expense->category_id   = request('category_id');
            $expense->supplier_id   = request('supplier_id');
            $expense->payment_type  = request('payment_type');
            $expense->total_cost    = str_replace(',', '',request('total_cost'));
            $expense->amount_paid   = str_replace(',', '',request('amount_paid'));
            $expense->expense_date  = request('expense_date');
            $expense->description   = request('description');
            $expense->created_by    = $user->id;
            $expense->save();

            //save into expense payment history
            $expense_history =  ExpensePaymentHistory::where('expense_id', $id)->first();
            $expense_history->amount_paid   = str_replace(',', '',request('amount_paid'));
            $expense_history->payment_type  = request('payment_type');
            $expense_history->expense_date  = request('expense_date');
            // $expense_history->updated_by    = $user->id;
            $expense_history->save();

            DB::commit();
            return redirect(route('company.finance.expenses.all_expenses'))->with('flash_success','Expense updated successfully');


        }catch (\Throwable $th){
            DB::rollBack();
            ErrorLog::log('expenses', '__METHOD__', $th->getMessage()); //log error
            return back()->with("flash_error","There is an error processing this request");
        }

        $expense_history  = ExpensePaymentHistory::select(DB::raw('SUM(amount_paid) as amount_paid'))
            ->where('expense_id',$id)
            ->first();

        return view('company.finance.expenses.view_expense', compact('expense','expense_history'));
    }

    public function update_expense_payment(Request $request, $id){
        $user = Auth::user();
        $amount_paid                =  rstr_replace(',', '',request('amount_paid'));
        $payment_type               =  request('payment_type');
        $order_date = date('Y-m-d');
        $job_order =  Expense::find($id);

        $job_pay = new ExpensePaymentHistory();
        $job_pay->company_id    = app('company_id');
        $job_pay->expense_id    = $id;
        $job_pay->amount_paid          = $amount_paid;
        $job_pay->payment_type    = $payment_type;
        $job_pay->expense_date    = $order_date;
        $job_pay->created_by      = $user->id;
        $job_pay->save();

        return back()->with("flash_success","Expense Payment updated successfully");
    }


    public function delete_expense($id)
    {
        $expense =  Expense::find($id)->delete();

        return redirect(route('company.finance.expenses.all_expenses'))->with('flash_success','Expense deleted successfully');
    }

    public function payment_history($id)
    {
        $expense_pay_history = ExpensePaymentHistory::where('expense_id',$id)->get();
        return view('company.finance.expenses.payment_history',compact('expense_pay_history'));
    }



    public function all_debtors(Request $request)
    {
        $startDate  = request('date_from');
        $endDate    = request('date_to');
        $customer   = request('customer');
        //  dd(app('company_id'));
        if(request()->has('customer')) {
            $job_pay = $this->filterFinanceByDate()->with('jobPaymentHistories')->where('cart_order_status',JobOrderUnique::ORDER_COMPLETED)->where('company_id',app('company_id'))->get();
        }else{
            $previousYearOrders1 = JobOrderUnique::with('jobPaymentHistories')->where('cart_order_status',JobOrderUnique::ORDER_COMPLETED)
                        //->whereYear('created_at', Carbon::now()->year)
                        ->whereYear('created_at', '!=', Carbon::now()->year)->get();

            // $job_pay = JobOrderUnique::with('jobPaymentHistories')->where('cart_order_status',JobOrderUnique::ORDER_COMPLETED)

            //             // ->whereYear('created_at', Carbon::now()->year)
            //             ->where('company_id',app('company_id'))->get();

            $currentYearOrders = JobOrderUnique::with('jobPaymentHistories', 'user')
            ->where('cart_order_status', JobOrderUnique::ORDER_COMPLETED)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('company_id', app('company_id'))
            ->get()
            ->groupBy('user_id');

            // $previousYearOrders1 = JobOrderUnique::with('jobPaymentHistories', 'user')
            // ->where('cart_order_status', JobOrderUnique::ORDER_COMPLETED)
            // ->where('company_id', app('company_id'))
            // ->whereYear('created_at', '!=', Carbon::now()->year)
            // ->get();
           // dd($previousYearOrders1);


            $previousYearOrders = JobOrderUnique::with('jobPaymentHistories', 'user')
            ->where('cart_order_status', JobOrderUnique::ORDER_COMPLETED)
            ->where('company_id', app('company_id'))
            ->whereYear('created_at', '!=', Carbon::now()->year)
            ->get()->groupBy('user_id');


            // $customerDebts = $currentYearOrders->map(function ($orders, $userId) use ($previousOrders) {
            //     $user = $orders->first()->user;

            //     // Current year totals
            //     $currentCost = $orders->sum('total_cost');
            //     $currentPaid = $orders->sum(fn ($order) => $order->jobPaymentHistories->sum('amount'));

            //     // Previous year totals
            //     $prevOrders = $previousOrders->get($userId, collect());
            //     $prevCost = $prevOrders->sum('total_cost');
            //     $prevPaid = $prevOrders->sum(fn ($order) => $order->jobPaymentHistories->sum('amount'));

            //     // Total debt
            //     $totalCost = $currentCost + $prevCost;
            //     $totalPaid = $currentPaid + $prevPaid;
            //     $balance = $totalCost - $totalPaid;

            //     return [
            //         'user_id'        => $userId,
            //         'name'           => $user->firstname . ' ' . $user->lastname,
            //         'company'        => $user->company_name,
            //         'current_year'   => $currentCost - $currentPaid,
            //         'previous_years' => $prevCost - $prevPaid,
            //         'total_cost'     => $totalCost,
            //         'total_paid'     => $totalPaid,
            //         'balance'        => $balance,
            //     ];
            // })->filter(fn ($entry) => $entry['balance'] > 0);

            $customerDebts = [];

            foreach ($currentYearOrders as $userId => $orders) {
                $user = $orders->first()->user;

                // This year's totals
                $currentTotalCost = $orders->sum('total_cost');
                $currentTotalPaid = $orders->sum(function ($order) {
                    return $order->jobPaymentHistories->sum('amount');
                });

                // Previous year's totals
                $previousOrders = $previousYearOrders->get($userId, collect());
                $previousTotalCost = $previousOrders->sum('total_cost');
                $previousTotalPaid = $previousOrders->sum(function ($order) {
                    return $order->jobPaymentHistories->sum('amount');
                });

                // Total and balance
                $totalCost = $currentTotalCost + $previousTotalCost;
                $totalPaid = $currentTotalPaid + $previousTotalPaid;
                $balance = $totalCost - $totalPaid;

                // Only add if there's an outstanding balance
                if ($balance > 0) {
                    $customerDebts[] = [
                        'user_id'        => $userId,
                        'name'           => $user->firstname . ' ' . $user->lastname,
                        'company'        => $user->company_name,
                        'current_year'   => $currentTotalCost - $currentTotalPaid,
                        'previous_years' => $previousTotalCost - $previousTotalPaid,
                        'total_cost'     => $totalCost,
                        'total_paid'     => $totalPaid,
                        'balance'        => $balance,
                    ];
                }
            }
        }

        return view('company.finance.report.debtors.index', compact('customerDebts','previousYearOrders','previousYearOrders1'));
    }

    public function all_creditors(Request $request)
    {


        if(request()->date_to && request()->date_from){
            $expenses = Expense::with('expenseHistories')->whereBetween('expense_date', [$this->startDate, $this->endDate])->where('company_id',app('company_id'))->get();
        }else{
            $expenses = Expense::with('expenseHistories')->where('company_id',app('company_id'))->get();

        }

        return view('company.finance.report.creditors.index',compact('expenses'));
    }

    public function all_profit_loss(Request $request)
    {
        // $ordersPayHistory1 = JobPaymentHistory::selectRaw('job_order_name, job_orders.company_id, SUM(amount) as total_pay')
        //     ->join('job_orders', 'job_orders.id', '=', 'job_payment_histories.job_order_id')
        //     ->where('cart_order_status',JobOrder::ORDER_COMPLETED)->where('job_orders.company_id',app('company_id'))
        //     ->groupBy('job_orders.job_order_name');
        $ordersPayHistory1 = JobPaymentNewHistory::selectRaw('job_order_uniques.order_no, job_order_uniques.company_id, SUM(amount) as total_pay')
        ->join('job_order_uniques', 'job_order_uniques.id', '=', 'job_payment_new_histories.job_order_unique_id')
        ->where('cart_order_status', JobOrderUnique::ORDER_COMPLETED)
        ->where('job_order_uniques.company_id', app('company_id'))
        ->groupBy('job_order_uniques.order_no', 'job_order_uniques.company_id');
        //dd($ordersPayHistory1);

        $expensesPayHistory1 = ExpensePaymentHistory::selectRaw('expense_categories.id, expense_payment_histories.company_id, expense_categories.category_name, SUM(expense_payment_histories.amount_paid) as total_pay')
            ->join('expenses', 'expenses.id', '=', 'expense_payment_histories.expense_id')
            ->join('expense_categories', 'expense_categories.id', '=', 'expenses.category_id')->where('expense_payment_histories.company_id',app('company_id'))
            ->groupBy('expense_categories.id', 'expense_categories.category_name','expense_payment_histories.company_id');


        if(request()->date_to && request()->date_from){
            $ordersPayHistory       = $ordersPayHistory1->whereBetween('job_payment_new_histories.payment_date', [$this->startDate, $this->endDate])->get();
            $expensesPayHistory     = $expensesPayHistory1->whereBetween('expense_payment_histories.expense_date', [$this->startDate, $this->endDate])->get();

        }else{
            $ordersPayHistory       = $ordersPayHistory1->get();
            $expensesPayHistory     = $expensesPayHistory1->get();

        }
        return view('company.finance.report.profit_loss.index',compact('ordersPayHistory','expensesPayHistory'));
    }

    public function add_commission(){
        return view('company.finance.commissions.add_commission');
    }

    public function store_commission(Request $request)
    {
        DB::beginTransaction();
        $user = Auth::user();
        $validatedData = $request->validate([
            'marketer_id' => 'required|integer',
            // 'payment_type' => 'required',
            'amount_paid' => 'required',

        ], [

            'marketer_id.required' => 'Please select marketer.',
            // 'payment_type.required' => 'Please select payment type.',
            'amount_paid.required' => 'Please enter ampunt paid.',
        ]);

       try{
            $expense = new Expense();
            $expense->company_id    = app('company_id');
            $expense->title         = 'Commission';
            $expense->marketer_id   = request('marketer_id');
            $expense->payment_type  = 'Commission Payment';
            $expense->total_cost    = str_replace(',', '',  request('amount_paid'));
            $expense->amount_paid   = str_replace(',', '',  request('amount_paid'));
            $expense->expense_date  = date('Y-m-d');
            $expense->description   = request('description');
            $expense->created_by    = $user->id;
            $expense->save();

            //save into expense payment history
            $expense_history = new ExpensePaymentHistory();
            $expense_history->expense_id    = $expense->id;
            $expense_history->company_id    = app('company_id');
            $expense_history->amount_paid   = str_replace(',', '',  request('amount_paid'));
            $expense_history->payment_type  = 'Commission Payment';
            $expense_history->expense_date  = date('Y-m-d');
            $expense_history->created_by    = $user->id;
            $expense_history->save();

            //save into expense payment history
            $marketer_history = new MarketerPaymentHistory();
            $marketer_history->expense_id    = $expense->id;
            $marketer_history->marketer_id   = request('marketer_id');
            $marketer_history->company_id    = app('company_id');
            $marketer_history->amount_paid   = str_replace(',', '',  request('amount_paid'));
            $marketer_history->payment_type  = 'Commission Payment';
            $marketer_history->created_by    = $user->id;
            $marketer_history->save();

            DB::commit();
            return redirect(route('company.finance.expenses.all_expenses'))->with('flash_success','Expense saved successfully');

        }catch (\Throwable $th){
            DB::rollBack();
            ErrorLog::log('expenses', '__METHOD__', $th->getMessage()); //log error
            return back()->with("flash_error","There is an error processing this request");
        }
    }

    public function all_commission(){
        if(request()->date_to && request()->date_from){
            $commissions = Expense::with('expenseHistories')->whereBetween('expense_date', [$this->startDate, $this->endDate])->where('company_id',app('company_id'))->orderBy('id','DESC')->get();
        }else{
            $commissions = Expense::with('expenseHistories')->where('company_id',app('company_id'))->orderBy('id','DESC')->get();
        }
        return view('company.finance.commissions.all_commissions', compact('commissions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
