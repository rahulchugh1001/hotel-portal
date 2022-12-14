<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;

class City extends Model
{
    use HasFactory;
	
	
	protected $fillable = array('name',
															'state_id',
															'status'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';
	
	
	public static function getName($id)
	{
	
	$state=Self::find($id);
	if($state)
	{
		return $state->name;
	}else
		
		{
		
		return false;
		}
	
	}
	
	
	public function scopeStatus($query)
    {
        
            return $query->where('status', '=', 1);
        
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


    public static function getCityByState($state_id)
	{
	
	$cities=Self::where('state_id',$state_id)->get();
	if($cities)
	{
		return $cities;
	}else
		
		{
		
		return false;
		}
	
	}


	public static function getID($name)
	{

		$city=Self::where('name','like','%' . $name . '%')
					// ->where('city','=',38)
					->first();

		
		if($city)
		{
			return $city->id;
		}else
			
			{
			
			return false;
			}
		
	}

}
