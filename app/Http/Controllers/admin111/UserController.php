<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

use DB;
use Illuminate\Support\Arr;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function find_testimonial($id)
    {
        return Testimonial::find($id);
    }
    public function index()
    {
        $users = User::where('user_type',1)->get();
        return view('admin.users.all_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles =  Role::all();
        return view('admin.users.add_user', compact('roles'));
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
            'lastname' => 'required|string',
            'email' => 'email|string|unique:users,email',
            'password' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|string',
            'roles' => 'required',
            'address' => 'required|string',

            // Add more rules as needed
        ], [
            'firstname.required' => 'Please enter user firstname.',
            'lastname.required' => 'Please enter user lastname.',
            'email.required' => 'Please enter user email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter user password.',
            'phone.required' => 'Please enter user phone number.',
            'status.required' => 'Please enter user status.',
            'gender.required' => 'Please enter user gender.',
            'roles.required' => 'Please select role.',
            'address.required' => 'Please enter user address.',
        ]);

        $input = $request->all();

        $input['password']  = Hash::make($input['password']);
        $input['user_type'] =   3;
        $user = User::create($input);

        //$user->assignRole('admin');
         $user->assignRole($request->input('roles'));

        if($user){
            return redirect(route('admin.users.all_users'))->with('flash_success','User has been created Successful');
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
        $user = User::find($id);
        return view('admin.users.view_user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit_user', compact('user'));
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
            'lastname' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|string',
            'address' => 'required|string',

            // Add more rules as needed
        ], [
            'firstname.required' => 'Please enter user firstname.',
            'lastname.required' => 'Please enter user lastname.',
            'email.required' => 'Please enter user email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter user phone number.',
            'status.required' => 'Please enter user status.',
            'gender.required' => 'Please enter user gender.',
            'address.required' => 'Please enter user address.',
        ]);

        $user =  User::find($id);

        $user->firstname         =  request('firstname');
        $user->lastname         =  request('lastname');
        $user->phone            =  request('phone');
        $user->email            =  request('email');
        $user->gender           =  request('gender');
        if(request('password') != null){
            $user->password         =  bcrypt(request('password'));
        }

        $user->status           =  request('status');
        $user->address          =  request('address');

        $user->update();

        return back()->with("flash_success","User updated successfully");
    }

    public function view_profile()
    {
        $user = Auth::user();
        return view('admin.users.view_profile', compact('user'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        return view('admin.users.edit_profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',

            // Add more rules as needed
        ], [
            'firstname.required' => 'Please enter user firstname.',
            'lastname.required' => 'Please enter user lastname.',
            'email.required' => 'Please enter user email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter user phone number.',
            'gender.required' => 'Please enter user gender.',
            'address.required' => 'Please enter user address.',
        ]);



        $user->firstname         =  request('firstname');
        $user->lastname         =  request('lastname');
        $user->phone            =  request('phone');
        $user->email            =  request('email');
        $user->gender           =  request('gender');
        $user->address          =  request('address');

        $user->update();
        return back()->with("flash_success","Profile updated successfully");
        //return view('admin.users.edit_profile', compact('user'));
    }



    public function create_testimonial()
    {
        $customers =  User::where('user_type',User::CUSTOMER)->get();
        return view('admin.users.testimonial.add_testimonial', compact('customers'));
    }


    public function post_testimonial(Request $request)
    {

        $user = Auth::user();

        $customer_id   =  request('customer_id');
        $description    =  request('description');


        //save to testimonial
        $testimonial = new Testimonial();
        $testimonial->customer_id     =  $customer_id;
        $testimonial->description     = $description;
        $testimonial->created_by          = $user->id;


        if($testimonial_img = $request->file('image')){
            $name = $testimonial_img->hashName(); // Generate a unique, random name...
            $path = $testimonial_img->store('public/images');
            $testimonial->image = $name;

        }

        $testimonial->save();

        return redirect(route('admin.users.testimonial.view_testimonial',$testimonial->id))->with('flash_success','Customer Testimonial saved successfully');
    }

    public function all_testimonial()
    {
        $all_testimonial = Testimonial::all();
        return view('admin.users.testimonial.all_testimonials', compact('all_testimonial'));
    }

    public function view_testimonial($id)
    {
        $testimonial =  $this->find_testimonial($id);
        return view('admin.users.testimonial.view_testimonial', compact('testimonial'));
    }

    public function edit_testimonial($id)
    {
        $testimonial =  $this->find_testimonial($id);
        $customers =  User::where('user_type',User::CUSTOMER)->get();
        return view('admin.users.testimonial.edit_testimonial', compact('testimonial','customers'));
    }

    public function update_testimonial(Request $request, $id)
    {
        $user = Auth::user();

        $customer_id   =  request('customer_id');
        $description    =  request('description');

        try{
            $testimonial =  $this->find_testimonial($id);

            //update to testimonial
            $testimonial->customer_id     = $customer_id;
            $testimonial->description     = $description;
            $testimonial->updated_by      = $user->id;


            if($testimonial_img = $request->file('image')){
                $name = $testimonial_img->hashName(); // Generate a unique, random name...
                $path = $testimonial_img->store('public/images');
                $testimonial->image = $name;

            }

            $testimonial->save();
        }catch(\Exception $th){
            return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }


        return redirect(route('admin.users.testimonial.all_testimonials'))->with('flash_success','Customer Testimonial updated successfully');
    }

    public function delete_testimonial($id)
    {
        try{
            $testimonial =  $this->find_testimonial($id);
            if(is_null($testimonial)){
                return redirect(route('admin.users.testimonial.all_testimonials'))->with('flash_success','Customer Testimonial not available');
            }
            $testimonial->delete();
        }catch(\Exception $th){
            return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }
        return redirect(route('admin.users.testimonial.all_testimonials'))->with('flash_success','Customer Testimonial deleted');
    }

    public function change_password()
    {
        $user = Auth::user();
        return view('admin.users.change_password', compact('user'));
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



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect(route('admin.users.all_users'))->with('flash_success','User has been deleted');
    }
}
