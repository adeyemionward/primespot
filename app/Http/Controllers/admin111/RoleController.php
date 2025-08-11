<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
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
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $userRoles = Auth::user()->getRoleNames();

        // Get all roles
        $roles = Role::all();

        // Retrieve permissions associated with each role
        $rolesWithPermissions = $roles->map(function ($role) {
            return [
                'role_id' => $role->id,
                'role' => $role->name,
                'permissions' => $role->permissions->pluck('name')->implode(', '),
            ];
        });


        return view('roles.all_roles', compact('rolesWithPermissions', 'userRoles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $permissions = Permission::get();
        return view('roles.add_role', compact('permissions'));
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
            'name' => 'required|string', // Ensure at least one checkbox is selected
            'permission' => 'required', // Ensure at least one checkbox is selected


            // Add more rules as needed
        ], [
            'name.required' => 'Please enter role name.',
            'permission.required' => 'Please select permission.',

        ]);

        $find_role = Role::where('name', $request->input('name'))->first();
        if($find_role)
        return redirect()->route('roles.add_role')->with('flash_error','Role alreadt exists');
        $role = Role::create(
            [
                'name' => $request->input('name')
            ]
        );

        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.all_roles')->with('flash_success','Role & Permissions created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userRoles = Auth::user()->getRoleNames();

        // Get all roles
        $role = Role::find($id);

        // Retrieve permissions associated with each role
        $existingPermissions = $role->permissions;
        $permissions = Permission::all();

        return view('roles.edit_role', compact('role', 'permissions','existingPermissions'));
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
            'name' => 'required|string', // Ensure at least one checkbox is selected
            'permission' => 'required', // Ensure at least one checkbox is selected


            // Add more rules as needed
        ], [
            'name.required' => 'Please enter role name.',
            'permission.required' => 'Please select permission.',

        ]);

        $role = Role::find($id);

        $role->update(['name' => $request->input('name')]);

        // Sync new permissions
        $newPermissions = $request->input('permission', []);
        $role->syncPermissions($newPermissions);

        return redirect()->route('roles.edit_role', $id)->with('flash_success','Role & Permissions updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.all_roles')->with('flash_success','Role deleted successfully');
    }
}
