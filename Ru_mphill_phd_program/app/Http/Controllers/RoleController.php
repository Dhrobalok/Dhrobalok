<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\Permission;
use App\Models\Module;
use App\Models\Employee;
use App\Models\User;
use DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
          return "gdd";

          $this->middleware('permission:role-list');
         // $this->middleware('permission:role-create', ['only' => ['create','store']]);
         // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('backend.admin.roles.index',compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::get();
        return view('backend.admin.roles.create',compact('modules'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('backend.admin.roles.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $modules = Module::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('backend.admin.roles.edit',compact('role','permission','rolePermissions', 'modules'));
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
       // return "hfhfh";
        $this->validate($request, [
            'name' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));


        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
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
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }

    public function permission_settings($role_id)
    {
       // return $role_id;
        /**
         * This function is used to edit permissions for a specific role.
         * @param Required only one parameter called role id.
         * @return view object contains current permissions for a specific role.
         */
        $role = Role :: findById($role_id);
        $modules = Module :: all();
       return view('backend.admin.roles.permission_settings',['role' => $role,'modules' => $modules]);
    }

    public function update_permissions(Request $request)
    {
       // return $request;
        /**
         * This function just save the new changes of permissions for a specific role.
         * @param Required two parameters called a list of permissions, role id.
         * @return void.
         */
        $permissions = $request -> permissions;
        $role_id = $request -> role_id;
        $role = Role :: findById($role_id);
        $role -> syncPermissions($permissions);
    }

    public function role_base_user_assign($role_id)
    {
       // return $role_id;
        /**
         * This function is used to render the role base user assign index page
         * @param Required only one parameter called role id.
         * @return view object contains index page of role base user assigning.
         *
         */
        $role = Role :: findById($role_id);
        $employees = Employee :: all();
        return view('backend.admin.roles.user_base_role_assign',['role' => $role,'employees' => $employees]);
    }

    public function assign_role(Request $request)
    {
       // return $request;
        /**
         * This function is used to assign an user to a role.
         * @param Required two parameters called user id and role id.
         * @return void.
         */
        $user_id = $request -> user_id;
        $role_id = $request -> role_id;
        $user = User :: find($user_id);
        $role = Role :: findById($role_id);
        $user -> assignRole($role);
    }

    public function remove_role(Request $request)
    {
         /**
         * This function is used to remove an user on a role.
         * @param Required two parameters called user id and role id.
         * @return void.
         */
        $user_id = $request -> user_id;
        $role_id = $request -> role_id;
        $user = User :: find($user_id);
        $role = Role :: findById($role_id);
        $user -> removeRole($role);
    }
}
