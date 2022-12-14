<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelfCareController extends Controller
{
    

    public function index(){

        $data['title'] = "Selfcare - Page";

        return view('frontend.index',$data);

    }


}
