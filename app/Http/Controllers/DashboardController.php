<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Ajax;
use App\Models\City;
use App\Models\User;
use App\Models\Plan;
use App\Models\Jobs;
use App\Models\AssignAgency;
use App\Models\AssignCandidate;
use App\Models\AssignCompany;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

       
        if(User::getRoleLabel(Auth::user()->id)=='candidate')
		{
			return view('candidate.dashboard');
			
		}else
			
			{
		
				return view('admin.dashboard');
		
			}
		
		
    }
}
