<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
use Auth;
use DB;

class UserDetail extends Model
{
    use HasFactory;

    protected $table="user_details";

    protected $fillable = [
        'user_id',
        'created_by',
        'registeration_Date',
        'employee_id',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'home_contact',
        'gender',
        'birth_date',
        'address',
        'city',
        'state',
        'postal_code',
        'dd_chq',
        'vaccination',
        'no_call_reason',
        'resume',
        'emg_ct_name',
        'emg_ct_phone',
        'emg_ct_rel',
        // 'job_title_id',
        'interest',
        'day_availability',
        'time_availability',
        'registration_mode',
        'residence_type',
        'sin_number',
        'sin_expire',
        'internal_notes',
        'notes',
        'work_category',
        'driver_license',
        'transportation_mode',
        'own_car',
        'languages',
        'education_history',
        'employment_history',
        'bank_name',
        'account_number',
        'ifsc_code',
		'logo_path',
        'plan_id',
        'belongs_to',   
        'relation_type'
		
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


    public function getParent() {

        return $this->belongsTo('App\Models\User', 'user_id');

    }
	
	
	public function scopeCreatedBy($query)
        {
            return $query->where('created_by','=', Auth::user()->id);
            
        } 
	
}
