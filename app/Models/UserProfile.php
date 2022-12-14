<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
use Auth;
use DB;

class UserProfile extends Model
{
    use HasFactory;
	
	protected $table="user_profile";

    protected $fillable = [
        'user_id',
		'created_by',
		'name',	
		'mobile',	
		'website',	
		'category',	
		'founded_date',	
		'country_id',	
		'state_id',	
		'city_id',	
		'address',	
		'postcode',
		'organization_type',
		'no_employees',	
		'description',	
		'facebook',	
		'twitter',	
		'google_plus', 	
		'linked_in',	
		'logo_path',	
		'status',
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
