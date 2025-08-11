<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\ErrorLog;
use App\Models\JobOrder;
use App\Models\JobPaymentHistory;
use Illuminate\Support\Facades\Hash;
use App\Mail\CustomerOrderReceipt;
use App\Models\JobPaymentNewHistory;
use Mail;
use Barryvdh\DomPDF\Facade\Pdf;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function countCart($user_id){

        $cart_count = JobOrder::where('cart_order_status', 1)->where('user_id',$user_id)->get();
        $countCart  = count($cart_count);
        return $countCart;
    }

    private function find_customer ($user_id){
       return $customer = User::find($user_id);
    }

    public function index()
    {
        $customers = User::all();

        return view('customers.all_customers', compact('customers'));
    }

    public function customer_cart($id)
    {
        $customer = $this->find_customer($id);
        $cartCount = $this->countCart($id);
        $job_orders =  JobOrder::where('user_id', $id)->where('cart_order_status',1)->get();

        return view('customers.customer_cart', compact('customer','job_orders','cartCount'));
    }

    public function checkout($id)
    {
        $customer = $this->find_customer($id);
        $job_id  = request('job_id');
        $randomInteger = random_int(100000, 999999);

        $checkout =  JobOrder::whereIn('id', $job_id)->update(
            [
                'cart_order_status' =>  2,
                'order_no' =>  $randomInteger,
            ]
        );



        $userDetails    = User::find($id);
        $userEmail  =  $userDetails->email;
        $userName   =  $userDetails->firstname.' '.$userDetails->lastname;

        $orderDetails   = JobOrder::whereIn('id',$job_id)->get();
        $payment_type =  0;
        $amount_paid = 0;
        $data = [
            'payment_type' =>'',
            'amount_paid' => '',
            'userDetails' =>$userDetails,
            'orderDetails' => $orderDetails, // Collection of orders, for example
        ];
        $pdf_attachment =   Pdf::loadView('invoice_attachment', $data );
        $sendOrderEmail =   Mail::to($userEmail)->send(new CustomerOrderReceipt ($orderDetails,$amount_paid,$userName,$pdf_attachment));

        //$pdf = Pdf::loadView('invoice_attachment',$data);
      //  return $pdf->download('invoice.pdf');
        // return route('customers.customer_job_orders', 16)->with('flash_success','Product Order Successful');
        return redirect(route('customers.customer_job_orders', $id))->with('flash_success','Product Order Successful');
    }

    public function customer_job_orders($id)
    {

        $customer = $this->find_customer($id);
        $cartCount = $this->countCart($id);
        $job_orders =  JobOrder::where('user_id', $id)->where('cart_order_status',2)->get();

        return view('customers.customer_job_orders', compact('customer','job_orders','cartCount'));
    }

    public function transaction_history($id){
        $customer = $this->find_customer($id);
        $cartCount = $this->countCart($id);

        $job_pay_history =  JobPaymentNewHistory::where('user_id',$id)->get();
        return view('customers.transaction_history', compact('customer','job_pay_history','cartCount'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.add_customer');
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
            'address'   => 'required|string',
            'company_school_name'   => 'required|string',
        ], [
            'firstname.required' => 'Please enter customer firstname.',
            'lastname.required' => 'Please enter customer lastname.',
            'email.required' => 'Please enter customer email address.',
            'email.email' => 'Please enter a valid email address.',
            'company_school_name.required' => 'Please enter company name/school name.',
            'phone.required' => 'Please enter customer phone number.',
            'address.required' => 'Please enter customer address.',
        ]);

        try{
            $user = new User();
            $user->firstname    = request('firstname');
            $user->lastname     = request('lastname');
            $user->email        = request('email');
            $user->phone        = request('phone');
            $user->gender       = 'm';
            $user->address      = request('address');
            $user->status       = 'active';
            $user->user_type    = '2';
            $user->password     = bcrypt(request('firstname'));
            $user->company_name      = request('company_school_name');
            $user->save();


            return back()->with("flash_success","Customer saved successfully");

        }catch (\Throwable $th){
            ErrorLog::log('customer', '__METHOD__', $th->getMessage()); //log error
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

        $customer = $this->find_customer($id);
        $cartCount = $this->countCart($id);
        return view('customers.view_customer', compact('customer','cartCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->find_customer($id);
        $cartCount = $this->countCart($id);
        return view('customers.edit_customer', compact('customer','cartCount'));
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
            'company_school_name'   => 'required|string',
        ], [
            'firstname.required' => 'Please enter customer firstname.',
            'lastname.required' => 'Please enter customer lastname.',
            'email.required' => 'Please enter customer email address.',
            'email.email' => 'Please enter a valid email address.',
            'company_school_name.required' => 'Please enter company name/school name.',
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
            $customer->company_name      = request('company_school_name');

            $customer->update();
            return back()->with("flash_success","Customer saved successfully");

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
    public function destroy($id)
    {
        $customer = User::find($id);
        $customer->status = 'deactivated';
        $customer->save();
        return redirect(route('customers.all_customers'))->with('flash_success','Customer has been deactivated');
    }
}
