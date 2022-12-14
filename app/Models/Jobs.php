<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use Helper;

class Jobs extends Model
{
    use HasFactory;


    protected $table="jobs";

    

    protected $fillable = [
        'created_by',
        'created_for',
        'job_title',
        'job_type',
        'job_category',
        'job_industry',
        'job_position',
        'job_exp',
        'min_salary',
        'max_salary',
        'salary_period',
        'job_desc',
        'gender',
        'employement_type',
        'job_education',
        'country',
        'state',
        'city',
        'location',
        'expiry_date'

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


	public function scopeCreatedFor($query)
        {
            return $query->where('created_for','=', Auth::user()->id);
            
        } 

        public function scopeCreatedBy($query)
        {
            return $query->where('created_by','=', Auth::user()->id);
            
        }
	
	
}
