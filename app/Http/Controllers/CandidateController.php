<?php
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Models\Role;
	use App\Models\JobTitle;
	use App\Models\JobType;
	use App\Models\JobEducation;
	use App\Models\JobCertificate;
	use App\Models\JobCourse;
	use App\Models\User;
	use App\Models\UserDetail;
	use App\Models\Candidate;
	use Hash;
	use Illuminate\Support\Str;
	use App\Models\UserProfile;
	use App\Models\Plan;
	use App\Models\UserPlan;
	use App\Models\Jobs;
	use App\Models\State;
	use App\Models\City;
	use Auth;
	use Helper;
	use Illuminate\Support\Facades\Validator;
	use Excel;
	use App\Imports\ImportCandidate;
	class CandidateController extends Controller
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
			$candidate_field_data =[];
			$user_ids=User::getUserListArray('candidate');
			$candidateModel = new Candidate; 
			$candidate_fields=$candidateModel->getFields();
			$candidatesData = $candidateModel->getRecords();
			$data['candidatesData']=$candidatesData;
			foreach ($candidatesData as $candidate) {
				foreach ($candidate as $a_key => $a_value) {
					if(in_array($a_key,$candidate_fields))
					{
						$candidate_field_data[]=$a_key;    
					}
				}
				break;
			}
			$data['candidate_fields'] = $candidate_field_data;	   
			return view ('admin.candidate.list',$data);
		}
		public function assign(Request $request)
		{
			$data['candidates']=UserDetail::all();
			$agency_ids=User::getUserListArray('agency');
			$data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();
			$compnay_ids=User::getUserListArray('company');
			$data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
			if ($request->isMethod('get')) {
				return view ('admin.candidate.assign-candidate',$data);
			}else
			{
			}
		}
		/**
			* Show the form for creating a new resource.
			*
			* @return \Illuminate\Http\Response
		*/
		public function create()
		{
			$agency_ids=User::getUserListArray('agency');
			$data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();
			$compnay_ids=User::getUserListArray('company');
			$data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
			// $data['roles']=Role::all();
			$data['job_titles']=JobTitle::all(); 
			$data['job_types']=JobType::all();  
			$data['job_certificates']=JobCertificate::all();
			$data['job_courses']=JobCourse::all();
			$data['job_educations']=JobEducation::all();
			$data['plans']=Plan::where('create_for',3)->get(); 
			$data['states']=State::CanadaState()->get();	
			return view('admin.candidate.create',$data);  
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
			$errors='';
			// echo "<pre>";
			// print_r($request->all());
			// exit;
			// Information
            $registeration_Date = $request->input('registeration_Date');
            $employee_id = $request->input('employee_id');
            $email = $request->input('email');
            $first_name = $request->input('first_name');
            $middle_name = $request->input('middle_name');
            $last_name = $request->input('last_name');
            $phone     = $request->input('phone');
            $home_contact     = $request->input('home_contact');
            $gender     = $request->input('gender');
            $birthday = $request->input('birthday');
            $address    = $request->input('address');
            $city    = $request->input('city');
            $state    = $request->input('state');
            $postal_code    = $request->input('postal_code');
            $dd_chq    = $request->input('dd_chq');
            $vaccination    = $request->input('vaccination');
            $no_call_reason    = $request->input('no_call_reason');
            $resume    = $request->input('resume');
            $emergency_contact_name     = $request->input('emergency_contact_name');
            $emergency_contact     = $request->input('emergency_contact');
            $relationship     = $request->input('relationship');
			// Job Type
            $job_title    = $request->input('job_title');
            $interest    = $request->input('interest');
            $day_availability    = $request->input('day_availability');
            $time_availability    = $request->input('time_availability');
			// Indentification
            $internal_notes    = $request->input('internal_notes');
            $notes    = $request->input('notes');
            $work_category    = $request->input('job_title');
            $registration_mode    = $request->input('registration_mode');
            $residence_type    = $request->input('residence_type');
            $sin_number    = $request->input('sin_number');
            $sin_expire    = $request->input('sin_expire');
            $driver_license    = $request->input('driver_license');
            $transportation_mode    = $request->input('transportation_mode');
            $own_car    = $request->input('own_car');
            $languages    = $request->input('languages');
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
            $plan_id = $request->input('plan');
            // $relation_type = $request->input('relation_type');
			$image = $request->file('upload_file'); 
			if($image)
			{
				$path=$this->image_upload($image);
			}else
			{
				$path='';
			}
            $user = User::create(array(
			'name' => $first_name.' '.$last_name,
			'email' => $email,
			'password' => Hash::make('password1234')
			));
            $user_plan = UserPlan::create(array(
			'user_id' => $user->id,
			'plan_id' => $plan_id,
			'created_by' => Auth::user()->id,
			));
            if($user)
            {
				$user->roles()->attach(4);                                  
				$detail = UserDetail::create(array(
				'user_id'=>$user->id,
				'created_by' => Auth::user()->id,
				'registeration_Date'=>$registeration_Date,
				'employee_id'=>$employee_id,
				'email'=>$email,
				'first_name'=>$first_name,
				'middle_name'=>$middle_name,
				'last_name'=>$last_name,
				'phone'=>$phone,
				'home_contact'=>$home_contact,
				'gender'=>$gender,
				'birth_date'=>$birthday,
				'address'=>$address,
				'city'=>$city,
				'state'=>$state,
				'postal_code'=> $postal_code, 
				'dd_chq' => $dd_chq,
				'vaccination'=> $vaccination,
				'no_call_reason'=> $no_call_reason,
				'resume'=> $resume,
				'emg_ct_name' => $emergency_contact_name,
				'emg_ct_phone' => $emergency_contact,
				'emg_ct_rel'=> $relationship,
				// 'job_title_id'=> $job_title,
				'interest'=> json_encode($interest),
				'day_availability'=> json_encode($day_availability),   
				'time_availability'=> json_encode($time_availability),
				'registration_mode'=> $registration_mode,
				'residence_type'=> $residence_type,
				'sin_number'=> $sin_number,
				'sin_expire'=> $sin_expire,
				'driver_license'=> $driver_license,
                'internal_notes'=> $internal_notes,
                'notes'=> $notes,
                'work_category'=> json_encode($work_category),
				'transportation_mode'=> $transportation_mode,
				'own_car'=> $own_car,
				'languages'=> json_encode($languages),
				'education_history'=> json_encode($education_history),
				'employment_history'=> json_encode($employment_history),
				'bank_name'=> $bank_name,
				'account_number'=> $account_number, 
				'ifsc_code'=> $ifsc_code,
				'plan_id'=> $plan_id,
				'logo_path'=> $path,
				// 'relation_type'=>$relation_type,
				'created_by'=> Auth::user()->id
				));
			}
			if($detail){
				return redirect()->route('candidate.index')->with('success','candidate created successfully!');
			}else
            {
                return redirect()->back()->with('error','Please check the form for error');
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
		public function edit(Request $request, $id)
		{
			$agency_ids=User::getUserListArray('agency');
			$data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();
			$compnay_ids=User::getUserListArray('company');
			$data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
			$data['candidate']=UserDetail::where('id',$id)->first();
			$data['job_titles']=JobTitle::all(); 
			$data['job_types']=JobType::all();  
			$data['job_certificates']=JobCertificate::all();
			$data['job_courses']=JobCourse::all();
			$data['job_educations']=JobEducation::all();
			$data['plans']=Plan::where('create_for',3)->get();	
			$data['states']=State::CanadaState()->get();
			// 	$row=UserDetail::where('id',$id)->first();
			// $history=json_decode($row->employment_history,true);
			// echo $history[0]['old_company'];
			// echo $history[0]['old_job_title'];
			// echo $history[0]['old_job_type'];
			// exit;
			// echo "<pre>";
			// print_r(json_decode($row->employment_history,true));
			// exit;
			return view('admin.candidate.edit',$data); 
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
			$profile=UserDetail::where('id',$id)->first();
			$user=User::where('id',$profile->user_id)->first();
			$errors='';
			// Information
            $registeration_Date = $request->input('registeration_Date');
            $employee_id = $request->input('employee_id');
            $first_name = $request->input('first_name');
            $middle_name = $request->input('middle_name');
            $last_name = $request->input('last_name');
            $phone     = $request->input('phone');
            $home_contact     = $request->input('home_contact');
            $gender     = $request->input('gender');
            $birthday = $request->input('birthday');
            $address    = $request->input('address');
            $city    = $request->input('city');
            $state    = $request->input('state');
            $postal_code    = $request->input('postal_code');
            $dd_chq    = $request->input('dd_chq');
            $vaccination    = $request->input('vaccination');
            $no_call_reason    = $request->input('no_call_reason');
            $resume    = $request->input('resume');
            $emergency_contact_name     = $request->input('emergency_contact_name');
            $emergency_contact     = $request->input('emergency_contact_phone');
            $relationship     = $request->input('emergency_contact_rel');
			// Job Type
            $job_title    = $request->input('job_title');
            $interest    = $request->input('interest');
            $day_availability    = $request->input('day_availability');
            $time_availability    = $request->input('time_availability');
			// Indentification
            $internal_notes    = $request->input('internal_notes');
            $notes    = $request->input('notes');
            $work_category    = $request->input('job_title');
            $registration_mode    = $request->input('registration_mode');
            $residence_type    = $request->input('residence_type');
            $sin_number    = $request->input('sin_number');
            $sin_expire    = $request->input('sin_expire');
            $driver_license    = $request->input('driver_license');
            $transportation_mode    = $request->input('transportation_mode');
            $own_car    = $request->input('own_car');
            $languages    = $request->input('languages');
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
            $plan_id = $request->input('plan');
            // $relation_type = $request->input('relation_type');
            $image = $request->file('upload_file'); 
			if($image)
			{
				$path=$this->image_upload($image);
				$profile->logo_path=$path;
			}
            $profile->registeration_Date   =  $registeration_Date;
            $profile->employee_id   =  $employee_id;
            $profile->first_name   =  $first_name;
            $profile->middle_name   =  $middle_name;
            $profile->last_name   =  $last_name;
            $profile->phone   =  $phone;
            $profile->home_contact   =  $home_contact;
            $profile->gender   =  $gender;
            $profile->birth_date   =  $birthday;
            $profile->address   =  $address;
            $profile->city   =  $city;
            $profile->state   =  $state;
            $profile->postal_code   =  $postal_code;
            $profile->dd_chq   =  $dd_chq;
            $profile->vaccination   =  $vaccination;
            $profile->no_call_reason   =  $no_call_reason;
            $profile->resume   =  $resume;
            $profile->emg_ct_name   =  $emergency_contact_name;
            $profile->emg_ct_phone   =  $emergency_contact;
            $profile->emg_ct_rel   =  $relationship;
            // $profile->job_title_id   =  $job_title;
            $profile->interest   =  $interest;
            $profile->day_availability   =  $day_availability;
            $profile->time_availability   =  $time_availability;
            $profile->registration_mode   =  $registration_mode;
            $profile->residence_type   =  $residence_type;
            $profile->internal_notes= $internal_notes;
            $profile->notes= $notes;
            $profile->work_category= json_encode($work_category);
            $profile->sin_number   =  $sin_number;
            $profile->sin_expire   =  $sin_expire;
            $profile->driver_license   =  $driver_license;
            $profile->transportation_mode   =  $transportation_mode;
            $profile->own_car   =  $own_car;
            $profile->languages   =  json_encode($languages);
            $profile->education_history   =  json_encode($education_history);
            $profile->employment_history   =  json_encode($employment_history);
            $profile->bank_name   =  $bank_name;
            $profile->account_number   =  $account_number;
            $profile->ifsc_code   =  $ifsc_code;
            $profile->plan_id=$plan_id;
            // $profile->relation_type=$relation_type;
            $profile->save();
            $user ->name=$first_name.' '.$last_name;
            $user->save();
            if($user){
				return redirect()->route('candidate.index')->with('success','candidate updated successfully');
			}else
            {
                return redirect()->back()->with('error','Please check the form for error');
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
		public function searchJobs(Request $request)
		{
			$data['jobs']=Jobs::all();
			return view('candidate.job.search',$data);
		}
		public function appliedJob(Request $request)
		{
			return view('candidate.job.applied');
		}
		public function savedJob(Request $request)
		{
			return view('candidate.job.saved');
		}
		public function jobDetail(Request $request)
		{
			return view('candidate.job.job-detail');
		}
		public function candidateSignup(Request $request){
			if ($request->isMethod('get')) {
				return view('candidate.auth.register');
			}else
			{
				$request->validate([
				'email' => 'bail|required|string|email|unique:users|max:255',
				'password_confirmation' => 'required|same:password',
				'termsCondition' => 'required',
				]);
				$name = $request->input('name');
				$email = $request->input('email');
				$password = $request->input('password');
				$cnfPassword = $request->input('password_confirmation');
				$termsCondition = $request->input('termsCondition');
				$user = User::create(array(
				'name' => $name,
				'email' => $email,
				'password' => Hash::make('password')                                            
				));
				if($user)
				{
					$user->roles()->attach(4);                                  
					$detail = UserDetail::create(array(
					'user_id'=>$user->id,
					'name' => $name,
					'email' => $email,
					));
				}
				if($detail){
					return redirect()->route('candidate.login')->with('success','candidate created successfully!');
					}else{
					return redirect()->back()->with('error','Please check the form for error');
				}
			}
		}
		// public function candidateLogin(Request $request){
		//     if ($request->isMethod('get')) {
		//         return view('candidate.auth.login');
		//     }else
		//     {
		//         $errors      = false;
		//         $errorMsg    = array();
		//         $email     =$request->input('email');
		//         $password = $request->input('password');
		//         $applicantMainInfo    = array(
		//             'Email' => $email,
		//             'Password' => $password
		//         );
		//         $appInfoValidate = Validator::make($applicantMainInfo, array(
		//             'Email' => 'required|email',
		//             'Password' => 'required'
		//         ));
		//         if ($appInfoValidate->fails()) {
		//             $errors = true;
		//         }
		//         if ($errors) {
		//             $appInfoErrorMsg='';
		//             if ($appInfoValidate->messages()) {
		//                 $appInfoErrorMsg = $appInfoValidate->messages();
		//                 session()->flash('error', 'Please check the form values!');
		//                 return redirect()->back()->withInput($request->input())->with('appLoginErrors', $appInfoErrorMsg);
		//             }
		//             else{
		//             }
		//         }
		//         else{
		//                 return redirect()->route('candidate.dashboard')->with('success','you are logged in');
		//         }
		//     }        
		// }
		public function candidateLogin(Request $request){
			if ($request->isMethod('get')) {
				// if (auth()->user()) 
				// {
				//    return redirect(route('company.dashboard'));
				// }
				// else
				// {
				return view('candidate.auth.login');
				// }
			}else
			{
				$request->validate([
				'email' => 'required',
				'password' => 'required'
				]);
				// $credentials = $request->except(['_token']);
				// echo "<pre>";
				// print_r($credentials);
				// exit;
				$user = User::where('email',$request->email)->first();
				// if (auth()->attempt($credentials)) {
				if($user && $user->status=='1'){
					Auth::login($user);
					return redirect()->route('candidate.dashboard');
					}else{
					session()->flash('message', 'Invalid credentials');
					return redirect()->back();
				}
				// }else{
				//     session()->flash('message', 'Invalid credentials');
				//     return redirect()->back();
			}
		}
		public function candidateDashboard(){
			if(User::isCandidate())
            {               
                return view('candidate.dashboard');
				}else{
				return redirect(route('candidate.login'));
			}
			// if (auth()->user()) {
			//     return view('candidate.dashboard');
			// }else{
			//    return redirect(route('candidate.login'));
			// }
		}
		//import functions
		public function importCandidate(Request $request)
		{
			
			
			
			/*
			$details=UserDetail::all();
			foreach($details as $detail)
			{
			     $city=City::where('id','=',$detail->city)->first();    
				 if($city)
				 {
				 $detail->province_id=$city->state_id;
				 $detail->save();
				 }
			}
			
			
			exit;
			*/
			if ($request->isMethod('get')) {
				return view('admin.candidate.import');
			}else
			{
				if($request->hasFile('upload')){
					$path = $request->file('upload');
					Excel::import(new ImportCandidate,$path);
				}
			} 
		}
	}		