<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function page(){
        return view('frontend.rooms');
    }

    public function Detail(){
        return view('frontend.room-detail');
    }

}
