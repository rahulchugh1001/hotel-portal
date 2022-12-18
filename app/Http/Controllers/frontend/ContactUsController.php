<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        // dd('hii');
        return view('frontend.contactUs');
    }
}
