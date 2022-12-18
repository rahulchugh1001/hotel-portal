<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogIndex()
    {
        return view('frontend.blog');
    }

    public function blogDetails()
    {
        return view('frontend.blog_details');
    }
}
