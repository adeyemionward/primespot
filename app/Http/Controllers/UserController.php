<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user(); return $next($request);
        });

        // $this->middleware('auth');
        // $this->middleware('permission:user-create', ['only' => ['create','store']]);
        // $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:user-delete', ['only' => ['destroy']]);


        // $this->middleware('permission:user-password-create', ['only' => ['update_user_password']]);
        // $this->middleware('permission:user-role-create', ['only' => ['update_add_user_role']]);

        // $this->middleware('permission:testimonial-create', ['only' => ['create_testimonial','post_testimonial']]);
        // $this->middleware('permission:testimonial-view', ['only' => ['view_testimonial']]);
        // $this->middleware('permission:testimonial-edit', ['only' => ['edit_testimonial','update_testimonial']]);
        // $this->middleware('permission:testimonial-delete', ['only' => ['delete_testimonial']]);
    }

    function handleFileUpload($hasFile, $fileName, $dir){
        if ($hasFile) {
            if ($img = $fileName) {
                $ImageName = str_replace(' ', '', $fileName->getClientOriginalName());//$fileName->getClientOriginalName();
                $uniqueFileName = time() . '_' . $ImageName;
                $ImagePath = $dir.'/images/' . $uniqueFileName;
                $img->move(public_path($dir.'/images/'), $uniqueFileName);
                return $ImagePath;
            }
        }
    }


    public function index()
    {
        $users = User::where('user_type',User::CUSTOMER)->get();
        return view('admin.users.list', compact('users'));
    }


    public function create()
    {
        return view('admin.users.add');
    }

    public function store(Request $request)
    {

            $validate = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:50'],
                'email' => ['unique', 'required',  'email', 'max:50'],
                'password' => ['required', 'string', 'min:8'],
                'company' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'address' => ['required', 'string'],
            ]);


       try{
            $getUser = User::where('email', $request->email)->first();
            if($getUser){
                return redirect()->back()->with('flash_error','User with this email already exists');
            }

            $user = new User();
            $user->name         = request('name');
            $user->email        = request('email');
            $user->phone        = request('phone');
            $user->company      = request('company');
            $user->phone        = request('phone');
            $user->status       = request('status');
            $user->user_type    = USER::CUSTOMER;
            $user->address      = request('address');
            $user->password     = bcrypt(request('password'));
            $user->save();


            if($user){
                return redirect(route('admin.users.list'))->with('flash_success','User has been created Successful');
            }
        }catch(\Exception $th){
            return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }

    }

    public function show($user_company_id)
    {
        $user = User::find($user_company_id);
        return view('admin.users.view', compact('user'));
    }


    public function edit($user_company_id)
    {
        $user = User::find($user_company_id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    // Find the existing user
    $user = User::find($id);

    // If the user doesn't exist, redirect back with an error
    if (!$user) {
        return redirect()->back()->with('flash_error', 'User not found.');
    }

    // Adjust validation rules for update, especially for the 'email'
    $validate = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:50'],
        'email' => ['unique:users,email,'.$user->id, 'required',  'email', 'max:50'],
        'password' => ['nullable', 'string', 'min:8'], // Password is now optional
        'company' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'address' => ['required', 'string'],
    ]);

    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput();
    }

    try {
        // Update user attributes
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->status = $request->status;
        $user->address = $request->address;

        // Only update the password if a new one is provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        if ($user) {
            return redirect(route('admin.users.list'))->with('flash_success', 'User has been updated successfully.');
        }

    } catch (\Exception $th) {
        // Log the error for debugging
        \Log::error($th);
        return redirect()->back()->with('flash_error', 'An Error Occurred: Please try later.');
    }
}


    public function activate($id){
        $user = User::where('id',$id)->first();
        $user->status = 'active';
        $user->save();
        return back()->with("flash_success","User activated successfully");
    }

    public function deactivate($id){
        $user = User::where('id',$id)->first();
        $user->status = 'inactive';
        $user->save();
        return back()->with("flash_success","User deactivated successfully");
    }


    public function change_password()
    {
        $user = Auth::user();
        return view('company.users.change_password', compact('user'));
    }

    public function update_change_password(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|confirmed',

            // Add more rules as needed
        ], [
            'old_password.required' => 'Please enter old password.',
            'password.required' => 'Please enter new password.',
            'password.confirmed' => 'Please enter password confirmation correctly.',
        ]);

        try{
            if (Hash::check(request('old_password'), $user->password)) {
                $user->password = Hash::make(request('password'));
                $user->save();
                return back()->with("flash_success","Password Changed successfully");
            }else{
                return back()->with("flash_error","Old and New Password do not match");
            }
        }catch (\Throwable $th){
            return back()->with("flash_error","Password failed to change");
        }

    }


    public function update_user_password(Request $request, $user_company_id)
    {
        //$user = Auth::user();

        $validatedData = $request->validate([
            'password' => 'required|confirmed',

            // Add more rules as needed
        ], [

            'password.required' => 'Please enter new password.',
            'password.confirmed' => 'Please enter password confirmation correctly.',
        ]);

        try{
            if (request('password')) {
                $user =  User::find($user_company_id);
                $user->password = Hash::make(request('password'));
                $user->save();
                return back()->with("flash_success","User Password Changed successfully");
            }
        }catch (\Throwable $th){
            return back()->with("flash_error","Password failed to change");
        }

    }


    public function destroy($user_company_id)
    {
        $user = User::find($user_company_id)->delete();
        return redirect(route('admin.users.list'))->with('flash_success','User has been deleted');
    }
}
