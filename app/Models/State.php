<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;

class State extends Model
{
    use HasFactory;
	
	protected $fillable = array('name',
															'country_id',
															'status'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'states';
	
	
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
		
		
	public static function getCode($name)
		{
		
						$state=Self::where('name',$name)->orWhere('id',$name)->first();
						if($state)
						{
							return $state->code;
						}else
							
							{
							
							return false;
							}
		
		}
		
		
		public static function getID($name)
		{
		
						$state=Self::where('name','like','%' . $name . '%')
									->where('country_id','=',38)
									->first();
									
									
									
									
						
						if($state)
						{
							return $state->id;
						}else
							
							{
							
							return false;
							}
		
		}
		
		
		public static function getCodeByID($id)
		{
		
						$state=Self::where('id',$id)->first();
						if($state)
						{
							return $state->code;
						}else
							
							{
							
							return false;
							}
		
		}
		
		public static function getTaxRate($id)
		{
		
						$state=Self::find($id);
						if($state)
						{
							return $state->tax;
						}else
							
							{
							
							return false;
							}
		
		}
		
		public function scopeCanadaState($query)
		{
			return $query->where('country_id', 38);
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
