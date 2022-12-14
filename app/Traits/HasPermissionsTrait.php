<?php 

namespace App\Traits;


use App\Models\Permission;
use App\Models\Role;
use DB;
use Auth;

trait HasPermissionsTrait {

   public function givePermissionsTo(... $permissions) {

    $permissions = $this->getAllPermissions($permissions);
    dd($permissions);
    if($permissions === null) {
      return $this;
    }
    $this->permissions()->saveMany($permissions);
    return $this;
  }

  public function withdrawPermissionsTo( ... $permissions ) {

    $permissions = $this->getAllPermissions($permissions);
    $this->permissions()->detach($permissions);
    return $this;

  }

  public function refreshPermissions( ... $permissions ) {

    $this->permissions()->detach();
    return $this->givePermissionsTo($permissions);
  }

  public function hasPermissionTo($permission) {

    return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
  }

  public function hasPermissionThroughRole($permission) {
    
    foreach ($permission->roles as $role){
      if($this->roles->contains($role)) {
        return true;
      }
    }
    return false;
  }

  public function hasRole( ... $roles ) {

    if(Auth::user()->isSuperAdmin)
    {
        return true;
    }
    
    foreach ($roles as $role) {
      if ($this->roles->contains('slug', $role)) {
        return true;
      }
    }
    return false;
  }

  public function roles() {

    return $this->belongsToMany(Role::class,'users_roles');

  }


  public function FieldHasPermission($permissionField)
  {
    
    if(Auth::user()->isSuperAdmin)
    {
        return true;
    }

    $allPermission=[];
    $permission_id=[];
    $permissions_fields=[];
    foreach ($this->roles as $key => $role)
    {
        $permissionData=$role->permissions->toArray();

        foreach ($permissionData as $key => $p) {
          $permission_id[]=$p['id'];
                     
        }

        $fields=DB::table('roles_permissions')
                     ->whereIn('permission_id',$permission_id)
                     ->where('role_id',$role->id)
                     ->get();
                     
        foreach ($fields as $key => $field_v) {
           $permissions_fields[$field_v->permission_id]=unserialize($field_v->fields);
        }
        
    }
   
      if(!empty($permissions_fields)){

            foreach ($permissions_fields as $key => $permissions_field) {
                
                $permissions=$this->getPermissions($key);
                $permissions_slug=$permissions['slug'];
                $permissionFieldArr=explode('|', $permissionField);
                $permission = $permissionFieldArr[0];
                $field = $permissionFieldArr[1];
                if($permissions_slug==$permission)
                {
                    if(in_array($field,$permissions_field)){
                      return true;
                    }
                }

            }
        }

    return false;
    
  }

  public function RoleHasPermission($permission)
  {
    if(Auth::user()->isSuperAdmin)
    {
        return true;
    }
    $allPermission=[];
    foreach ($this->roles as $key => $role)
    {
        $permissionData=$role->permissions;
        $allPermission=$permissionData->pluck('slug')->toArray();
    }

    if(!empty($allPermission)){

        if(in_array($permission,$allPermission)){
          return true;
        }
    }

    return false;
    
  }


 public function getAllPermissionsViaRole($roles)
 {
  
    $permissionData=[];
    foreach ($roles as $key => $role_v)
    {
        $permissionData=$role_v->permissions;
    }

    return $permissionData;
  }



  public function permissions() {

    return $this->belongsToMany(Permission::class,'users_permissions');

  }

  protected function hasPermission($permission) {

    return (bool) $this->permissions->where('slug', $permission->slug)->count();
  }

  protected function getAllPermissions(array $permissions) {

    return Permission::whereIn('slug',$permissions)->get();
    
  }

  protected function getPermissions($id) {

    return Permission::where('id',$id)->first();
    
  }

}

?>