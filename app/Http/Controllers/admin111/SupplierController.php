<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\ErrorLog;
use Illuminate\Support\Facades\Auth;
class SupplierController extends Controller
{
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

        $this->startDate  = request('date_from').' 23:59:59';
        $this->endDate    = request('date_to').' 23:59:59';
    }
    public function index(Request $request = null)
    {

        if(request()->date_to && request()->date_from){
            $suppliers = Supplier::whereBetween('created_at', [$this->startDate, $this->endDate])->get();
        }else{
            $suppliers = Supplier::all();
        }


        return view('suppliers/all_suppliers', compact('suppliers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers/add_supplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'company_name' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            // 'email' => 'stemaring',
            'phone' => 'required|string',
            'address' => 'required|string',
            // Add more rules as needed
        ], [
            'company_name.required' => 'Please enter supplier company name.',
            'firstname.required' => 'Please enter supplier  firstname.',
            'lastname.required' => 'Please enter supplier  lastname.',
            // 'email.required' => 'Please enter customer email address.',
            // 'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter supplier phone number.',
            'address.required' => 'Please enter supplier address.',
        ]);
        try{
            $supplier = new Supplier();
            $supplier->company_name = request('company_name');
            $supplier->firstname    = request('firstname');
            $supplier->lastname     = request('lastname');
            $supplier->email        = request('email');
            $supplier->phone        = request('phone');
            $supplier->address      = request('address');
            $supplier->created_by   = $user->id;

            $supplier->save();
            return back()->with("flash_success","Supplier saved successfully");

        }catch (\Throwable $th){
            ErrorLog::log('supplier', '__METHOD__', $th->getMessage()); //log error
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
        $supplier = Supplier::find($id);
        return view('suppliers.view_supplier', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.edit_supplier', compact('supplier'));
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
        $user = Auth::user();
        $validatedData = $request->validate([
            'company_name' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            // 'email' => 'stemaring',
            'phone' => 'required|string',
            'address' => 'required|string',
            // Add more rules as needed
        ], [
            'company_name.required' => 'Please enter supplier company name.',
            'firstname.required' => 'Please enter supplier  firstname.',
            'lastname.required' => 'Please enter supplier  lastname.',
            // 'email.required' => 'Please enter customer email address.',
            // 'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter supplier phone number.',
            'address.required' => 'Please enter supplier address.',
        ]);

        try{
            $supplier = Supplier::find($id);
            $supplier->company_name = request('company_name');
            $supplier->firstname    = request('firstname');
            $supplier->lastname     = request('lastname');
            $supplier->email        = request('email');
            $supplier->phone        = request('phone');
            $supplier->address      = request('address');
            $supplier->updated_by   = $user->id;

            $supplier->update();
            return back()->with("flash_success","Supplier saved successfully");

        }catch (\Throwable $th){
            ErrorLog::log('supplier', '__METHOD__', $th->getMessage()); //log error
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
        $supplier = Supplier::find($id)->delete();
        return redirect(route('suppliers.all_suppliers'))->with('flash_success','User has been deleted');
    }
}
