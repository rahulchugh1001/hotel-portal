<?php

namespace App\Helpers;
use Carbon\Carbon;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\File;


class Helper 
{
	
	public static function getFields($roleId,$permissionsId)
	{


		$permissions_fields=[];
		 $fields=DB::table('roles_permissions')
                     ->where('permission_id',$permissionsId)
                     ->where('role_id',$roleId)
                     ->get();

    
           if(!empty($fields) && count($fields)>0){
        		foreach ($fields as $key => $field_v) {
         		  $permissions_fields[$field_v->permission_id]=unserialize($field_v->fields);
        		}   	
           }
                     
        return $permissions_fields;

	}

	public static function getAvailableModels()
	{

	    $models = [];
	    $modelsPath = app_path('Models');
	    $modelFiles = File::allFiles($modelsPath);
	    foreach ($modelFiles as $modelFile) {
	        $models_path ='\App\\Models\\' . $modelFile->getFilenameWithoutExtension();
	        $model_name = $modelFile->getFilenameWithoutExtension();
	        $models[$model_name]=$models_path;
	    }

	    return $models;
	}

	public static function getFillable($models=[])
	{
		
		$fillableField=[];
		if(!empty($models))
		{
			if(is_array($models))
			{
				foreach ($models as $key => $model) {
					 
					 $field=new $model;
					 $fillableField[]=$field->getFillable(); 	
				}

				$fillableField = \Arr::flatten($fillableField);
				$fillableField=array_unique($fillableField);
			}
		}
		
		return $fillableField;

	}

	public static function getLabel($lable){
		
		$fields=\config('constant.lableName');
		foreach ($fields as $key => $value) {
			if($key==$lable){
				return $value;

			}
			

		}

		return $lable;
	}


	public static function getValue($key,$value){
		
		$name=$value;

		if($key=='city_id'){
			$name=\App\Models\City::getName($value);
		}

		if($key=='country_id'){
			$name=\App\Models\Country::getName($value);
		}

		if($key=='state_id'){
			$name=\App\Models\State::getName($value);
		}


		return $name;
	}


	
	
}

 ?>