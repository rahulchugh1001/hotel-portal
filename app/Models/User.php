<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissionsTrait;
use Auth;
use DB;
use Helper;

class User extends Authenticatable
{
    
    protected $table="users";

    use HasApiTokens, HasFactory, Notifiable,HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'parent_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function getModelFiled(){

       return [];   
    }

    protected function hideFiled(){
        return [];
        
    }

    public function getFillable(){
        return $this->fillable;
    }

    public function getFields()
    {
        $models =$this->getModelFiled();
        $HelperFillable=Helper::getFillable($models);
        $fillableField =array_unique(array_merge($this->fillable,$HelperFillable));
        $hideFiled= $this->hideFiled();
        $fillableField = array_diff($fillableField, $hideFiled);

        return $fillableField;
    }

public static function getName($id)
        {
        
                        $user=Self::find($id);
                        if($user)
                        {
                            return $user->name; 
                        }else
                            
                            {
                            
                            return false;
                            }
        
        }

        
public static function getEmail($id)
        {
        
                        $user=Self::find($id);
                        if($user)
                        {
                            return $user->email; 
                        }else
                            
                            {
                            
                            return false;
                            }
        
        }
		
public static function getUserList($role){
	
	return DB::table('users')
            ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
            ->join('roles', 'roles.id', '=', 'users_roles.role_id')
			 ->select('users.id')
			  ->where('roles.slug', $role)
			->get();
	
}


public static function getUserListArray($role){
	
	$query_result= DB::table('users')
            ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
            ->join('roles', 'roles.id', '=', 'users_roles.role_id')
			 ->select('users.id')
			  ->where('roles.slug', $role)
			->get();
			
	
	$data = collect($query_result)->pluck('id')->toArray();

	
	if($data)
	{
		return $data;
	}else
		
		{
			return false;			
		}
}


public static function getUserSingleRole($id){
	
			//$result= DB::table('users_roles')->where('user_id', $id)->get();
			$role_id = DB::table('users_roles')->where('user_id', $id)->value('role_id');
			
			
			if($role_id)
			{
				return $role_id;
			}else
				
				{
					return false;			
				}
		}
				
		

public function getCandidate()
    {
        return $this->hasOne('App\Models\UserDetail','user_id');
    }



public function getAgency()
    {
        return $this->hasOne('App\Models\UserProfile','user_id');
    }

public function getCompany()
    {
        return $this->hasOne('App\Models\UserProfile','user_id');
    }



    public static function getRoleLabel($id){
    
            //$result= DB::table('users_roles')->where('user_id', $id)->get();
            $role_id = DB::table('users_roles')->where('user_id', $id)->value('role_id');
            
            
            if($role_id)
            {
                $row = DB::table('roles')->where('id', $role_id)->first();
                if($row)
                {
                    return $row->slug;
                }else
                    
                    {
                        return false;   
                        
                    }
                
                
            }else
                
                {
                    return false;           
                }
        }

	
	public static function isAdmin(){
		
		$name=Self::getRoleLabel(Auth::user()->id);
		if($name)
		{
			if(($name=='admin') || ($name=='super-admin'))
			{
				return true;
			}else
				
				{
					
					return false;
				}
		}
	}
	
	public static function isCandidate(){
		
		
		$name=Self::getRoleLabel(Auth::user()->id);
		if($name)
		{
			if($name=='candidate')
			{
				return true;
			}else
				
				{
					
					return false;
				}
		}
		
		
	}
	
	public static function isAgency(){
		
		$name=Self::getRoleLabel(Auth::user()->id);
		if($name)
		{
			if($name=='agency')
			{
				return true;
			}else
				
				{
					
					return false;
				}
		}
		
	}
	
	public static function isCompany(){
		
		
		$name=Self::getRoleLabel(Auth::user()->id);
		if($name)
		{
			if($name=='company')
			{
				return true;
			}else
				
				{
					
					return false;
				}
		}
		
	}
	
	
	public static function notAdmin(){
		
		
		$name=Self::getRoleLabel(Auth::user()->id);
		if($name)
		{
			if($name!='admin')
			{
				return true;
			}else
				
				{
					
					return false;
				}
		}
		
	}
	
	
	
}
