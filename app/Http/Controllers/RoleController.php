<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{


    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $userRoles = Auth::user()->getRoleNames();

        // Get all roles
         $roles = Role::where('name', '!=','admin')->where('company_id',app('company_id'))->get();
        //$roles = Role::all();

        // Retrieve permissions associated with each role
        $rolesWithPermissions = $roles->map(function ($role) {
            return [
                'role_id' => $role->id,
                'role' => $role->name,
                'permissions' => $role->permissions->pluck('name')->implode(', '),
            ];
        });


        return view('company.roles.all_roles', compact('rolesWithPermissions', 'userRoles'));

    }

    public function create()
    {
         $permissions = Permission::all();
         // Group permissions by prefix
        $groupedPermissions = $permissions->groupBy(function ($permission) {
            // Extract the first prefix
            return explode('-', $permission->name)[0];
        });
        return view('company.roles.add_role', compact('permissions','groupedPermissions'));
    }
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|string', //
            'permission' => 'required', //


            // Add more rules as needed
        ], [
            'name.required' => 'Please enter role name.',
            'permission.required' => 'Please select permission.',

        ]);

        $find_role = Role::where('name', $request->input('name'))->first();
        if($find_role)
        return redirect()->route('company.roles.add_role')->with('flash_error','Role alreadt exists');
        $role = Role::create(
            [
                'company_id' => app('company_id'),
                'name' => $request->input('name'),
            ]
        );

        $role->syncPermissions($request->input('permission'));
        return redirect()->route('company.roles.all_roles')->with('flash_success','Role & Permissions created successfully');
    }


    public function edit($id)
    {
        $userRoles = Auth::user()->getRoleNames();

        // Get all roles
        $role = Role::find($id);

        // Retrieve permissions associated with each role
        $existingPermissions = $role->permissions;
        $permissions = Permission::all();
        

        return view('company.roles.edit_role', compact('role', 'permissions','existingPermissions'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string', // Ensure at least one checkbox is selected
            'permission' => 'required', // Ensure at least one checkbox is selected
        ], [
            'name.required' => 'Please enter role name.',
            'permission.required' => 'Please select permission.',

        ]);

        $role = Role::find($id);

        $role->update(['name' => $request->input('name')]);

        // Sync new permissions
        $newPermissions = $request->input('permission', []);
        $role->syncPermissions($newPermissions);

        return redirect()->route('company.roles.edit_role', $id)->with('flash_success','Role & Permissions updated successfully');
    }


    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('company.roles.all_roles')->with('flash_success','Role deleted successfully');
    }
}
