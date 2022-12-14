<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['permissions']=Permission::all();
        
        return view ('admin.permission.list',$data);

        /*$user_permission = Permission::where('slug','create-tasks')->first();
        $admin_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $user_role = new Role();
        $user_role->slug = 'user';
        $user_role->name = 'User_Name';
        $user_role->save();
        $user_role->permissions()->attach($user_permission);

        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Admin_Name';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);

        $user_role = Role::where('slug','user')->first();
        $admin_role = Role::where('slug', 'admin')->first();

        $createTasks = new Permission();
        $createTasks->slug = 'create-tasks';
        $createTasks->name = 'Create Tasks';
        $createTasks->save();
        $createTasks->roles()->attach($user_role);

        $editUsers = new Permission();
        $editUsers->slug = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->save();
        $editUsers->roles()->attach($admin_role);

        $user_role = Role::where('slug','user')->first();
        $admin_role = Role::where('slug', 'admin')->first();
        $user_perm = Permission::where('slug','create-tasks')->first();
        $admin_perm = Permission::where('slug','edit-users')->first();

        $user = new User();
        $user->name = 'Test_User';
        $user->email = 'test_user@gmail.com';
        $user->password = bcrypt('1234567');
        $user->save();
        $user->roles()->attach($user_role);
        $user->permissions()->attach($user_perm);

        $admin = new User();
        $admin->name = 'Test_Admin';
        $admin->email = 'test_admin@gmail.com';
        $admin->password = bcrypt('admin1234');
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);
        echo 'sucess';
        exit;

        
        return redirect()->back();*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $insert = [
            'name'=>$request->name,
            'slug'=>$request->name,
            'model'=>$request->model,

        ];
        Permission::create($insert);
        return redirect()->back();
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
    public function edit(Request $request, $id)
    {

        $data['permissions']=Permission::find($id);

        return view ('admin.permission.edit',$data);
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
            
        $update = [
            'name'=>$request->name,
            'slug'=>$request->name,
            'model'=>$request->model,

        ];
       
        $permissions=Permission::where('id',$id)->update($update);
        
        if($permissions)
        {
            return redirect()->route('permissions.index');
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
        //
    }
}
