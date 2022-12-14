<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;

class AssignAgency extends Model
{
    use HasFactory;
	
	
	protected $fillable = array('user_id',
															'belong_to',
															'relation_type',
															'created_by',
															'status'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'assign_agency';
	
	
	
	
	
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

}
