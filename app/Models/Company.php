<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
use DB;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected function getModelFiled(){

       return ['\App\Models\UserProfile','\App\Models\User'];   
    }

    protected function hideFiled(){
        return ['parent_id', 'state_id', 'city_id', 'country_id','description', 'password','user_id','created_by','category','postcode','organization_type', 'logo_path','plan_id','belongs_to','relation_type','facebook','twitter', 'google_plus', 'linked_in'];
        
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
    

    public function getRecords($user_id=''){
       
        $CompanyQuery = DB::table('users')
            ->join('user_profile', 'users.id', '=', 'user_profile.user_id'); 
         if($user_id){
            $CompanyQuery->where('users.id',$user_id);
         }   
           return $company=$CompanyQuery->get();
        /*->select('users.name as Name','users.email as Email','user_profile.mobile as Mobile','user_profile.website as Website','user_profile.address as Address','user_profile.country_id as Country','user_profile.state_id as State','user_profile.city_id as City')*/
    }



    public static function getName($a_key){
        $name ='';
        if($a_key=='Country'){
            $name = \App\Models\Country::getName($a_key);
        }

        if($a_key=='State'){
            $name = \App\Models\State::getName($a_key);
        
        }   

        if($a_key=='City'){
            $name = \App\Models\City::getName($a_key);
        }

        return $name ;
    }
}
