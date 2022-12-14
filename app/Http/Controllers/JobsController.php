<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\JobTitle;
use App\Models\JobType;
use App\Models\JobCategory;
use App\Models\JobIndustry;
use App\Models\JobExperience;
use App\Models\JobPosition;
use App\Models\JobEducation;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserProfile;
use App\Models\Plan;
use App\Models\UserPlan;
use Auth;
use DB;
use Helper;
use Config;



class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        
		if( (User::isAgency()) || (User::isCompany()))
	   {
		   $data['jobs']=Jobs::CreatedBy()->get();
	   }else
		   
	   
	   {
		   $data['jobs']=Jobs::all();
	   }
		
		
		
		return view ('admin.job.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['job_titles']=JobTitle::all();
        $data['job_types']=JobType::all();
        $data['job_categories']=JobCategory::all();
        $data['job_positions']=JobPosition::all();
        $data['job_industries']=JobIndustry::all();
        $data['job_experiences']=JobExperience::all();
        $data['job_educations']=JobEducation::all();
        $data['countries']=Country::all();
        $data['cities']=City::all();
        $data['states']=State::CanadaState()->get();
		$data['candidates']=UserDetail::all();
	   $agency_ids=User::getUserListArray('agency');
	   $data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();
	   $compnay_ids=User::getUserListArray('company');
	   $data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
		
		
        return view('admin.job.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        
        // $response=Jobs::create($request->except('_token')); 
        // if($response){
        //         Jobs::where('id',$response->id)->update(['user_id'=>$authId]); 
        //     return redirect()->route('roles.index');
        // }


        $errors=''; 
            $job_title     = $request->input('job_title');
            $job_type     = $request->input('job_type');
            $job_category     = $request->input('job_category');
            $job_industry     = $request->input('job_industry');
            $job_position     = $request->input('job_position');
            $job_experience = $request->input('job_experience');

            $min_salary    = $request->input('min_salary');
            $max_salary    = $request->input('max_salary');
            $salary_period    = $request->input('salary_period');
            $job_description    = $request->input('job_description');
            
            $gender    = $request->input('gender');
            $employment_type    = $request->input('employment_type');
            $job_education    = $request->input('job_education');
            
            $country    = $request->input('country');
            $state    = $request->input('state');
            $city    = $request->input('city');

            $location    = $request->input('location');
            $expiry_date    = $request->input('expiry_date');
			
			$company_id    = $request->input('company_id');
			$agency_id    = $request->input('agency_id');
			
			if($company_id)
			{
				$created_for=$company_id;
			}elseif($agency_id)
			{
				$created_for=$agency_id;
			}else
				
				{
					$created_for=0;
				}

                                 
                                                
            $job = Jobs::create(array(
                                            'created_by' => Auth::user()->id,
                                            'created_for' => $created_for,
                                            'job_title'=> $job_title,
                                            'job_type'=> $job_type, 
                                            'job_category'=> $job_category,
                                            'job_industry'=> $job_industry,
                                            'job_position'=> $job_position,
                                            'job_exp'=> $job_experience,    
                                            'min_salary'=> $min_salary,
                                            'max_salary'=> $max_salary,
                                            'salary_period'=> $salary_period,
                                            'job_desc'=> $job_description,
                                            'gender'=> $gender,
                                            'employment_type'=> $employment_type,
                                            'job_education'=> $job_education,
                                            'country'=> $country,   
                                            'state'=> $state,
                                            'city'=> json_encode($city),   
                                            'location'=> $location,   
                                            'expiry_date'=> $expiry_date
											
                                            
                                                ));
            
          
            if($job){

                return redirect()->route('jobs.index')->with('success','Job created succesfully');
            }else{
                return redirect()->back()->with('error','Something wrong please contact admin');

            }
           
            
            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['job']=Jobs::find($id);
        $data['job_titles']=JobTitle::all();
        $data['job_types']=JobType::all();
        $data['job_categories']=JobCategory::all();
        $data['job_positions']=JobPosition::all();
        $data['job_industries']=JobIndustry::all();
        $data['job_experiences']=JobExperience::all();
        $data['job_educations']=JobEducation::all();
        $data['countries']=Country::all();
        $data['states']=State::CanadaState()->get();
        $data['cities']=City::all();
		$agency_ids=User::getUserListArray('agency');
	   $data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();
	   $compnay_ids=User::getUserListArray('company');
	   $data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
		
		
         return view('admin.job.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $response=Jobs::where('id',$id)->update($request->except('_token','_method')); 
        // if($response){
        
        //     return redirect()->route('jobs.index');
        // }

        $job=Jobs::where('id',$id)->get()->first();

        $job_title     = $request->input('job_title');
        $job_type     = $request->input('job_type');
        $job_category     = $request->input('job_category');
        $job_industry     = $request->input('job_industry');
        $job_position     = $request->input('job_position');
        $job_experience = $request->input('job_experience');

        $min_salary    = $request->input('min_salary');
        $max_salary    = $request->input('max_salary');
        $salary_period    = $request->input('salary_period');
        $job_description    = $request->input('job_description');
        
        $gender    = $request->input('gender');
        $employment_type    = $request->input('employment_type');
        $job_education    = $request->input('job_education');
        
        $country    = $request->input('country');
        $state    = $request->input('state');
        $city    = $request->input('city');

        $location    = $request->input('location');
        $expiry_date    = $request->input('expiry_date');
		
		$company_id    = $request->input('company_id');
		$agency_id    = $request->input('agency_id');
		
		if($company_id)
			{
				$created_for=$company_id;
			}elseif($agency_id)
			{
				$created_for=$agency_id;
			}else
				
				{
					$created_for=0;
				}


        $job->job_title=$job_title;
        $job->job_type=$job_type;
        $job->job_category=$job_category;
        $job->job_industry=$job_industry;
        $job->job_position=$job_position;
        $job->job_exp=$job_experience;

        $job->min_salary=$min_salary;
        $job->max_salary=$max_salary;
        $job->salary_period=$salary_period;
        $job->job_desc=$job_description;

        $job->gender=$gender;
        $job->employment_type=$employment_type;
        $job->job_education=$job_education;

        $job->country=$country;
        $job->state=$state;
        $job->city=$city;
        
        $job->location=$location;
        $job->expiry_date=$expiry_date;
		$job->created_for=$created_for;

        $job->save();


        if($job){

                return redirect()->route('jobs.index')->with('success','Job updated succesfully');
            }else{
                return redirect()->back()->with('error','Something wrong please contact admin');

            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	
	 
}
