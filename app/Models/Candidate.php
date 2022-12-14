<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use Helper;
use DB;

class Candidate  extends Model
{
    use HasFactory;


    protected function getModelFiled(){

      return ['\App\Models\UserDetail','\App\Models\User'];  
    }

    protected function hideFiled(){
        return ['parent_id', 'password','user_id','created_by', 'logo_path','plan_id','belongs_to','relation_type'];
        
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
       
        $CandidateQuery = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id'); 
         if($user_id){
            $CandidateQuery->where('users.id',$user_id);
         }   
           return $candidate=$CandidateQuery->get();
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
