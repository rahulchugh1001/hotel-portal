<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
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
use App\Models\UserDetail;
use App\Models\UserProfile;
use App\Models\Plan;
use App\Models\UserPlan;
use App\Models\JobCertificate;
use App\Models\JobCourse;

use Hash;
use Auth;



use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users']=User::where('id','!=','1')->get();
        
        return view ('admin.user.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['roles']=Role::all();   
      return view('admin.user.create',$data);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
		
		$request->validate([
			'email' => 'bail|required|string|email|unique:users|max:255',
			
		]);
		
		$data = (array)$request->all();
	
		$user=User::create([
            'name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make('password1234'),
        ]);

        if(isset($data['role']) && !empty($data['role']))
        {
            if($user){
            
                $user->roles()->attach($data['role']);

                return redirect()->route('users.index');
            }
        }

        
		
		 if($user){
			 return redirect()->route('users.index')->with('success','User created successfully!'); 
			 
		 }else
			 
			 {
				return redirect()->back()->with('error','Error in creating User'); 
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
        $data['roles']=Role::all(); 
        $data['user']=User::where('id',$id)->first();
		$data['role_id']=User::getUserSingleRole($id);
		
		
	   return view('admin.user.edit',$data);   
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
        
		
		
		$errors='';
             $user=User::where('id',$id)->first();
            $name = $request->input('full_name');
            $role = $request->input('role');



            $user->name=$name;
            $user->save();
if ($role){

            $user->roles()->attach($role);
}

            return redirect()->route('users.index')->with('success','User Updated successfully!');
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
	
	
	
	public function profile(Request $request)
    {
        
				
				return view('admin.profile');  
				
		
    }
	
	
	
	public function profileCompany(Request $request,$id)
    {
        
		
	   $agency_ids=User::getUserListArray('agency');
       $data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();
       $data['company']=UserProfile::where('user_id',$id)->first();
       $data['states']=State::CanadaState()->get();
	   $data['plans']=Plan::where('create_for',1)->get();
		
		if ($request->isMethod('get')) {
		
						
				return view('admin.company.profile',$data);  
				
		}else
			
			{
			$profile=UserProfile::where('user_id',$id)->first();
            $user=User::where('id',$profile->user_id)->first();

            $errors=''; 
            $name     = $request->input('company_name');
            // $email     = $request->input('email');
            $mobile     = $request->input('mobile');
            $website     = $request->input('website');
            $category     = $request->input('category');
            $founded_date = $request->input('founded_date');
            $organization_type = $request->input('organization_type');
            $no_employees = $request->input('employees');
            $description = $request->input('description');
            
            $country    = $request->input('country');
            $state    = $request->input('state');
            $city    = $request->input('city');
            $postcode    = $request->input('postcode');
            $address    = $request->input('full_address');
            
            
            $facebook    = $request->input('facebook');
            $twitter    = $request->input('twitter');
            $google_plus    = $request->input('google_plus');
            $linked_in    = $request->input('linked_in');
            //$plan_id = $request->input('plan');
            // $belongs_to = $request->input('belongs_to');


            
            
            $image = $request->file('company_logo'); 
            
            if($image)
            {
            
            $path=$this->image_upload($image);
            $profile->logo_path=$path;
            }


            
            $profile->name=$name;
            // $profile->email=$email;
            $profile->mobile=$mobile;
            $profile->website=$website;
            $profile->category=$category;
            $profile->founded_date=$founded_date;
            $profile->organization_type = $organization_type;
            $profile->no_employees = $no_employees;
            $profile->description = $description;

            
            $profile->country_id=$country;
            $profile->state_id=$state;
            $profile->city_id=$city;
            $profile->postcode=$postcode;
            $profile->address=$address;
            
            
            $profile->facebook=$facebook;
            $profile->twitter=$twitter;
            $profile->google_plus=$google_plus;
            $profile->linked_in=$linked_in;
            //$profile->plan_id=$plan_id;
            // $profile->belongs_to=$belongs_to;
            $profile->save();

            $user->name=$name;
            // $user->email=$email;
            $user->save();
            return redirect()->back()->with('success','Company Profile Updated successfully!');
				
				
				
			}
		
    }
	
	
	public function profileAgency(Request $request,$id)
    {
        
		
		$data['user']=User::find($id);
		
		
		$compnay_ids=User::getUserListArray('company');
		$data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
		
        $data['agency']=UserProfile::where('user_id',$id)->first();
        
		$data['states']=State::CanadaState()->get();
		$data['plans']=Plan::where('create_for',2)->get();
		
		if ($request->isMethod('get')) {
				
				return view('admin.agency.profile',$data);  
				
		
		}else
			
			{
						
			$profile=UserProfile::where('user_id',$id)->first();
			$user=User::where('id',$id)->first();

			$errors='';	
			$name     = $request->input('agency_name');
			// $email     = $request->input('email');
			$mobile     = $request->input('mobile');
			$website     = $request->input('website');
			$category     = $request->input('category');
            $founded_date = $request->input('founded_date');
			
			$country    = $request->input('country');
			$state    = $request->input('state');
			$city    = $request->input('city');
			$postcode    = $request->input('postcode');
			$address    = $request->input('full_address');
			
			
			$facebook    = $request->input('facebook');
			$twitter    = $request->input('twitter');
			$google_plus    = $request->input('google_plus');
			$linked_in    = $request->input('linked_in');
			//$plan_id = $request->input('plan');
			// $relation_type = $request->input('relation_type');
			
			
			$image = $request->file('upload_file'); 
            
			if($image)
			{
			
			$path=$this->image_upload($image);
			$profile->logo_path=$path;
			}


			
			$profile->name=$name;
			// $profile->email=$email;
			$profile->mobile=$mobile;
			$profile->website=$website;
			$profile->category=$category;
            $profile->founded_date=$founded_date;
			
			$profile->country_id=$country;
			$profile->state_id=$state;
			$profile->city_id=$city;
			$profile->postcode=$postcode;
			$profile->address=$address;
			
			
			$profile->facebook=$facebook;
			$profile->twitter=$twitter;
			$profile->google_plus=$google_plus;
			$profile->linked_in=$linked_in;
			//$profile->plan_id=$plan_id;
			// $profile->relation_type=$relation_type;
			
			$profile->save();





			$user->name=$name;
			// $user->email=$email;

			$user->save();
			return redirect()->back()->with('success','Profile Updated!');
            
				
				
				
				
			}
		
    }
	
	
	public function image_upload($image){
       $name = time().'.'.$image->getClientOriginalExtension(); //get the  file extention
     

       $destinationPath = public_path('/profile_images'); //public path folder dir
       $sucess=$image->move($destinationPath, $name);
      
       //mve to destination you mentioned 
      if ($sucess) {
            return 'profile_images/'.$name;
        }

        return NULL;

    }

    


    public function profileCandidate(Request $request,$id)
    {
        
		
        $data['candidate']=UserDetail::where('user_id',$id)->first();
        $data['job_titles']=JobTitle::all(); 
        $data['job_types']=JobType::all();  
        $data['job_certificates']=JobCertificate::all();
        $data['job_courses']=JobCourse::all();
        $data['job_educations']=JobEducation::all();
        $data['plans']=Plan::where('create_for',3)->get();
		
		if ($request->isMethod('get')) {
				
				return view('candidate.profile',$data);  
				
		
		}else
			
			{
						
			$profile=UserDetail::where('user_id',$id)->first();
        $user=User::where('id',$profile->user_id)->first();

        $errors='';


        // Information


            $first_name = $request->input('first_name');
            $middle_name = $request->input('middle_name');
            $last_name = $request->input('last_name');
            $phone     = $request->input('phone');
            $gender     = $request->input('gender');
            $birthday = $request->input('birthday');
            $address    = $request->input('address');

            $emergency_contact_name     = $request->input('emergency_contact_name');
            $emergency_contact     = $request->input('emergency_contact_phone');
            $relationship     = $request->input('emergency_contact_rel');

        // Job Type
            
            $job_title    = $request->input('job_title');
            $interest    = $request->input('interest');
            $day_availability    = $request->input('day_availability');
            $time_availability    = $request->input('time_availability');
            
        // Indentification

            $sin_number    = $request->input('sin_number');
            $driver_license    = $request->input('driver_license');
            $own_car    = $request->input('own_car');


        // Education History

            $education    = $request->input('education');
            $course    = $request->input('course');
            $certificate    = $request->input('certificate');

          

        // Employement History

            $old_company    = $request->input('old_company');
            $old_job_title    = $request->input('old_job_title');
            $old_job_type    = $request->input('old_job_type');







            $education_history=array();
                         //count no of records
                         $count=count($education);

                                 if($count > 0)
                                 {

                                         //place all in regular order
                                        for ($i=0; $i < $count; $i++)
                                        {
                                         
                                        $education_history[$i]['education']=(isset($education[$i])) ? $education[$i]: '';
                                        $education_history[$i]['course']=(isset($course[$i])) ? $course[$i]: '';
                                        $education_history[$i]['certificate']=(isset($certificate[$i])) ? $certificate[$i]: '';
                                       
                                         }
                                 
                                 
                                 }

          


            $employment_history=array();
     //count no of records
     $count=count($old_company);

             if($count > 0)
             {

                     //place all in regular order
                    for ($i=0; $i < $count; $i++)
                    {
                     
                    $employment_history[$i]['old_company']=(isset($old_company[$i])) ? $old_company[$i]: '';
                    $employment_history[$i]['old_job_title']=(isset($old_job_title[$i])) ? $old_job_title[$i]: '';
                    $employment_history[$i]['old_job_type']=(isset($old_job_type[$i])) ? $old_job_type[$i]: '';
                   
                     }
             
             
             }


             // Banking Information

            $bank_name    = $request->input('bank_name');
            $account_number    = $request->input('account_number');
            $ifsc_code    = $request->input('ifsc_code');

            // $plan_id = $request->input('plan');
            // $relation_type = $request->input('relation_type');







            $image = $request->file('upload_file'); 
                        
                        if($image)
                        {
                        
                        $path=$this->image_upload($image);
                        $profile->logo_path=$path;
                        }




            $profile->first_name   =  $first_name;
            $profile->middle_name   =  $middle_name;
            $profile->last_name   =  $last_name;
            $profile->phone   =  $phone;
            $profile->gender   =  $gender;
            $profile->birth_date   =  $birthday;
            $profile->address   =  $address;

            $profile->emg_ct_name   =  $emergency_contact_name;
            $profile->emg_ct_phone   =  $emergency_contact;
            $profile->emg_ct_rel   =  $relationship;


            $profile->job_title_id   =  $job_title;
            $profile->interest   =  $interest;
            $profile->day_availability   =  $day_availability;
            $profile->time_availability   =  $time_availability;


            $profile->sin_number   =  $sin_number;
            $profile->driver_license   =  $driver_license;
            $profile->own_car   =  $own_car;


            $profile->education_history   =  json_encode($education_history);

            $profile->employment_history   =  json_encode($employment_history);
            

            $profile->bank_name   =  $bank_name;
            $profile->account_number   =  $account_number;
            $profile->ifsc_code   =  $ifsc_code;
            // $profile->plan_id=$plan_id;
            // $profile->relation_type=$relation_type;



            $profile->save();



            $user ->name=$first_name.' '.$last_name;

            $user->save();

            
                return redirect()->back()->with('success','Profile Updated');
            
				
				
			}
		
 }





public function forceLogin(Request $request,$id) {
		
		$user   = User::where('id', '=', $id)->first();
		
		
		if ($user != null)
			{
				Auth::loginUsingId($user->id);
				return redirect()->route('dashboard');		
						
			} else {
							
			abort(404);
					}
            
        
	}

}
