<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketer;
use App\Models\User;
use App\Models\ErrorLog;
use App\Models\JobOrder;
use Illuminate\Support\Facades\Hash;
use App\Mail\CustomerOrderReceipt;
use Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MarketerCommission;
use App\Models\MarketerPaymentHistory;
class MarketerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user(); return $next($request);
        });

        $this->middleware('auth');

        // $this->middleware('permission:marketer-create', ['only' => ['create','store']]);

        // $this->middleware('permission:marketer-list', ['only' => ['index']]);
        // $this->middleware('permission:marketer-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:marketer-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:marketer-transaction-history', ['only' => ['transaction_history']]);

    }

    
    private function find_marketer ($user_id){
       return $customer = User::find($user_id);
    }

    public function index()
    {
        $marketers = User::where('user_type', User::MARKETER)->where('status','active')->where('company_id',app('company_id'))->get();

        return view('company.marketers.all_marketers', compact('marketers'));
    }

    public function all_customers($id)
    {
        $all_customers = User::where('user_type', User::CUSTOMER)
        ->where('marketer_id', $id)->where('company_id',app('company_id'))->get();
        return view('company.marketers.all_customers', compact('all_customers'));
    }

    public function marketer_job_orders($id)
    {

        $customer = $this->find_marketer($id);
        // $job_orders =  JobOrder::where('marketer_id', $id)->where('company_id',app('company_id'))->get();

        $job_orders =  MarketerCommission::where('marketer_id', $id)->where('company_id',app('company_id'))->get();

        return view('company.marketers.marketer_job_orders', compact('customer','job_orders'));
    }

    public function transaction_history($id){
        $customer = $this->find_marketer($id);

        $job_pay_history =  MarketerPaymentHistory::where('company_id',app('company_id'))->get();
        $job_orders =  MarketerCommission::where('company_id',app('company_id'))->get();
       
        return view('company.marketers.transaction_history', compact('customer','job_pay_history','job_orders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.marketers.add_marketer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'phone'     => 'required|string',
            'email'     => 'email|string|unique:users,email',
            'address'   => 'required|string',
        ], [
            'firstname.required' => 'Please enter customer firstname.',
            'lastname.required' => 'Please enter customer lastname.',
            'email.required' => 'Please enter customer email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email has been taken.',
            'phone.required' => 'Please enter customer phone number.',
            'address.required' => 'Please enter customer address.',
        ]);

        try{
            $user = new User();
            $user->company_id   = app('company_id');
            $user->firstname    = request('firstname');
            $user->lastname     = request('lastname');
            $user->email        = request('email');
            $user->phone        = request('phone');
            $user->gender       = request('gender');;
            $user->address      = request('address');
            $user->status       = 'active';
            $user->user_type    = User::MARKETER;
            $user->password     = bcrypt(request('firstname'));
            $user->save();

            return back()->with("flash_success","Marketer saved successfully");

        }catch (\Throwable $th){
            ErrorLog::log('marketer', '__METHOD__', $th->getMessage()); //log error
            return back()->with("flash_error","There is an error processing this request");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $marketer = $this->find_marketer($id);
        return view('company.marketers.view_marketer', compact('marketer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->find_marketer($id);
        return view('company.marketers.edit_marketer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'phone'     => 'required|string',
            'address'   => 'required|string',
            'email'     => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ], [
            'firstname.required' => 'Please enter customer firstname.',
            'lastname.required' => 'Please enter customer lastname.',
            'email.required' => 'Please enter customer email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already in use.',
            'phone.required' => 'Please enter customer phone number.',
            'address.required' => 'Please enter customer address.',
        ]);
        try{
            $customer = User::find($id);
            $customer->firstname    = request('firstname');
            $customer->lastname     = request('lastname');
            $customer->email        = request('email');
            $customer->phone        = request('phone');
            $customer->address      = request('address');
            // $customer->company_name      = request('company_school_name');

            $customer->update();
            return back()->with("flash_success","Marketer updated successfully");

        }catch (\Throwable $th){
            ErrorLog::log('customer', '__METHOD__', $th->getMessage()); //log error
            return back()->with("flash_error","There is an error processing this request");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $marketer = User::find($id);
        $marketer->status = 'deactivated';
        $marketer->save();
        return redirect(route('company.marketers.all_marketers'))->with('flash_success','Marketer has been deactivated');
    }

    public function delete($id)
    {
        $marketer = User::find($id);
        // $customer->status = 'deactivated';
        $marketer->delete();
        return redirect(route('company.marketers.all_marketers'))->with('flash_success','Marketer has been deleted');
    }
}
