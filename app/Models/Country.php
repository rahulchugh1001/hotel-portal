<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;

class Country extends Model
{
    use HasFactory;
	
	protected $fillable = array('code',
															'name',
															'phonecode',
															'status'
														);
														
														
	protected $table = 'countries';
	
	
	public static function getName($id)
	{
	
	$country=Self::find($id);
	if($country)
	{
		return $country->name;
	}else
		
		{
		
		return false;
		}
	
	}
	public static function getCountryCode($id)
	{
	
	$country=Self::find($id);
	if($country)
	{
		return $country->code;
	}else
		
		{
		
		return false;
		}
	
	}


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
}
