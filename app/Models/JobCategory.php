<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;

class JobCategory extends Model
{
    use HasFactory;
	
	protected $table="job_category";

    protected $fillable = [
        'title',
        'description',
        'status'
    ];


    public static function getName($id)
    {
    
    $category=Self::find($id);
    if($category)
    {
        return $category->title;
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
