<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeVisitor extends Model
{
    use HasFactory;

    protected $fillable = ["image","name","phone","email","purpose","deleted_at"];

   
    protected function hideFiled(){
        return [];
        
    }

    public function getFillable(){
        return $this->fillable;
    }

        
}
