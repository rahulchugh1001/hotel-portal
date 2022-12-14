<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Helper;
use Auth;
use App\Models\Ajax;
use App\Models\City;
use App\Models\User;
use App\Models\Plan;
use App\Models\Jobs;
use App\Models\AssignAgency;
use App\Models\AssignCandidate;
use App\Models\AssignCompany;


class AjaxController extends Controller
{
    public function selectCity(Request $request) {
       
	    $state_id = $request->get('state_id');
		
		
		
		$city=City::where('state_id','=', $state_id)->get();
        
		if($city)
           return $city;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }
	
	
	
	public function bulkAssignCandidate(Request $request) 
	{
    
			$result=array();
			$records=$request->input('data');
			$agency_id=$request->input('agency_id');
			$company_id=$request->input('company_id');
			$records =explode(',',$records);


			if($agency_id)
				
				{
					
					
					foreach($records as $record)

						{
					
					
							$out= AssignCandidate::create(array(
							'user_id'=>$record,
							'belong_to'=>$agency_id,
							'relation_type'=>'agency',
							'created_by'=>Auth::user()->id
												 
							));
							
							
						
						
						}
					
					
				}
				
				
			if($company_id)
				
				{
					
					foreach($records as $record)

						{
					
					
							$out= AssignCandidate::create(array(
							'user_id'=>$record,
							'belong_to'=>$company_id,
							'relation_type'=>'company',
							'created_by'=>Auth::user()->id
												 
							));
						
						
						}
					
				}
			
			
			
			
			
			

			$data[]=array('success'=>'1','msg'=>'Candidate Assigned!');
			return $data;
	} 
	

	public function bulkAssignCompany(Request $request) 
	{
    
			$result=array();
			$records=$request->input('data');
			$agencies=$request->input('agencies');
			$records =explode(',',$records);


			
				if($agencies){	
					
					foreach($records as $record)

						{
							foreach($agencies as $agency)
							{
					
							$out= AssignCompany::create(array(
							'user_id'=>$record,
							'belong_to'=>$agency,
							'relation_type'=>'agency',
							'created_by'=>Auth::user()->id
												 
							));
							}
							
						
						
						}
				
				
			
			}
			
			
			
			

			$data[]=array('success'=>'1','msg'=>'Candidate Assigned!');
			return $data;
	} 



	public function bulkAssignAgency(Request $request) 
	{
    
			$result=array();
			$records=$request->input('data');
			$company_id=$request->input('company_id');
			$records =explode(',',$records);


			if($company_id){
					
					
					foreach($records as $record)

						{
					
					
							$out= AssignAgency::create(array(
							'user_id'=>$record,
							'belong_to'=>$company_id,
							'relation_type'=>'company',
							'created_by'=>Auth::user()->id
												 
							));
							
							
						
						
						}
					
			
			}
			
			
			
			

			$data[]=array('success'=>'1','msg'=>'Agency Assigned!');
			return $data;
	} 
	
	
	public function updateUserStatus(Request $request) 
	{
					$id = $request->get('id');
					$status = $request->get('status');
					
					$data=[];
					$user = User::where('id', '=', $id)->first();
					
					$user->status=$status;
						$user->save();
						$data[]=array('success'=>'1','msg'=>'Updated!');
					
					return $data;
					
		
	}
	
	public function updatePlanStatus(Request $request) 
	{
					$id = $request->get('id');
					$status = $request->get('status');
					
					$data=[];
					$plan = Plan::where('id', '=', $id)->first();
					
					$plan->status=$status;
						$plan->save();
						$data[]=array('success'=>'1','msg'=>'Updated!');
					
					return $data;
					
		
	}
	
	public function updateJobStatus(Request $request) 
	{
					$id = $request->get('id');
					$status = $request->get('status');
					
					$data=[];
					$job = Jobs::where('id', '=', $id)->first();
					
					$job->status=$status;
						$job->save();
						$data[]=array('success'=>'1','msg'=>'Updated!');
					
					return $data;
					
		
	}
}
