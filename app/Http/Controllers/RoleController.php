<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['roles']=Role::all();
         return view ('admin.role.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['permissions']=Permission::all();
         return view('admin.role.create',$data);
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

        ];
   
        $user_role=Role::create($insert);
        $user_role->permissions()->attach($request->permission);

        if(is_array($request->permission)){
             if(isset($request->field) && !empty($request->field)){
                foreach ($request->permission as $p_key => $permission) {
                        $fields = $request->field;
                        if(isset($fields[$permission]))
                        {
                            $fields_serialize = serialize($fields[$permission]);
                            DB::table('roles_permissions')
                               ->where('permission_id',$permission)
                               ->where('role_id',$user_role->id)
                               ->update(['fields'=>$fields_serialize]);
                        }
                }
            }
        }

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role']=Role::find($id);
        $data['permissions']=Permission::all();
         return view('admin.role.edit',$data);
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

        ];
       
        $role=Role::where('id',$id)->update($update);

        $user_role=Role::find($id);
        $user_role->permissions()->sync($request->permission);

         if(is_array($request->permission)){

             if(isset($request->field) && !empty($request->field)){

                foreach ($request->permission as $p_key => $permission) {

                        $fields = $request->field;

                        if(isset($fields[$permission]))
                        {
                            $fields_serialize = serialize($fields[$permission]);
                            DB::table('roles_permissions')
                               ->where('permission_id',$permission)
                               ->where('role_id',$id)
                               ->update(['fields'=>$fields_serialize]);
                        }
                        
                }
            
            }

        }

        return redirect()->route('roles.index');

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
