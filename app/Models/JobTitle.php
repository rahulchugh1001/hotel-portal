<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;

class JobTitle extends Model
{
    use HasFactory;
	
	protected $table="job_titles";

    protected $fillable = [
        'title',
        'description',
        'status'
    ];
	
	
	
	public function scopeActive($query)
		{
			return $query->where('status', 1);
		}


	public static function getName($id)
    {
    
    $title=Self::find($id);
    if($title)
    {
        return $title->title;
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
