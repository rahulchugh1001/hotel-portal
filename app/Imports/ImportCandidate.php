<?php
	namespace App\Imports;
	use Illuminate\Support\Collection;
	use Maatwebsite\Excel\Concerns\ToCollection;
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
	use Helper;
	use Illuminate\Support\Facades\Validator;
	use Carbon\Carbon;
	use DB;
	use Session;
	use Auth;
	use Excel;
	class ImportCandidate implements ToCollection
	{
		public function collection(Collection $rows)
		{
			/*
				[0] => registeration_Date
				[1] => employee_id
				[2] => first_name
				[3] => middle_name
				[4] => last_name
				[5] => address
				[6] => city
				[7] => postal_code
				[8] => birth_date
				[9] => phone
				[10] => home_contact
				[11] => emg_ct_phone
				[12] => email
				[13] => dd_chq
				[14] => transportation_mode
				[15] => work_category
				[16] => residence_type
				[17] => sin_number
				[18] => sin_expire
				[19] => day_availability
				[20] => time_availability
				[21] => languages
				[22] => education_history
				[23] => employment_history
				[24] => registration_mode
				[25] => internal_notes
				[26] => notes
				[27] => no_call_reason
				[28] => vaccination
				[29] => gender
				[30] => resume
				[31] => own_car
				[32] => emg_ct_name
				[33] => emg_ct_rel
			*/
			$count=0;
			foreach ($rows as $row) 
			{
				/*
					echo"<pre>";
					print_r($row);
					exit;
				*/
				if($count > 0)
				{
					if($row[12] <> '')
					{
						$find=User::where('email','=',$row[12])->first();
						if($find)
						{
							//already exists
						}else
						{
							/*
								$registeration_Date='';
								$birth_date='';
								$sin_expire='';
								if($registeration_Date)
								$registeration_Date=Carbon::create($row[0]);
								if($birth_date)
								$birth_date=Carbon::create($row[8]);
								if($sin_expire)
								$sin_expire=Carbon::create($row[18]);
							*/
							$city_id=0;
							if($row[6]<> '')
							{
								$city_id=City::getID($row[6]);
							}
							$day_availability='';
							$time_availability='';
							$work_category='';
							$transportation_mode='';
							$languages='';
							$education_history='';
							$employment_history='';
							if($row[19]<>'')
							{
								$day_availability=explode(",", $row[19]); 
								$day_availability=json_encode($day_availability);
							}
							if($row[20]<>'')
							{
								$time_availability=explode(",", $row[20]); 
								$time_availability=json_encode($time_availability);
							}
							if($row[15]<>'')
							{
								$work_category=explode(",", $row[15]); 
								$work_category=json_encode($work_category);
							}
							if($row[14]<>'')
							{
								$transportation_mode=explode(",", $row[14]); 
								$transportation_mode=json_encode($transportation_mode);
							}
							if($row[21]<>'')
							{
								$languages=explode(",", $row[21]); 
								$languages=json_encode($languages);
							}
							if($row[22]<>'')
							{
								$education_history=explode(",", $row[22]); 
								$education_history=json_encode($education_history);
							}
							if($row[23]<>'')
							{
								$employment_history=explode(",", $row[23]); 
								$employment_history=json_encode($employment_history);
							}
							$user = User::create(array(
							'name' => $row[2].' '.$row[4],
							'email' => $row[12],
							'password' => Hash::make('password1234')
							));
							/*
								$user_plan = UserPlan::create(array(
								'user_id' => $user->id,
								'plan_id' => $plan_id,
								'created_by' => Auth::user()->id,
								));
							*/
							if($user)
							{
								$user->roles()->attach(4);                                  
								$detail = UserDetail::create(array(
								'user_id'=>$user->id,
								'created_by' => Auth::user()->id,
								'registeration_Date'=>$row[0],
								//'registeration_Date'=>$registeration_Date,
								'employee_id'=>$row[1],
								'email'=>$row[12],
								'first_name'=>$row[2],
								'middle_name'=>$row[3],
								'last_name'=>$row[4],
								'phone'=>$row[9],
								'home_contact'=>$row[10],
								'gender'=>$row[29],
								'birth_date'=>$row[8],
								'address'=>$row[5],
								'city'=>$city_id,
								//'state'=>$row['state'],
								'postal_code'=> $row[7], 
								'dd_chq' => $row[13],
								'vaccination'=> $row[28],
								'no_call_reason'=> $row[27],
								'resume'=> $row[30],
								'emg_ct_name' => $row[32],
								'emg_ct_phone' => $row[11],
								'emg_ct_rel'=> $row[33],
								//'job_title_id'=> $row['job_title_id'],
								//'interest'=> json_encode($row['interest']),
								'day_availability'=> $day_availability,   
								'time_availability'=> $time_availability,
								'registration_mode'=> $row[24],
								'residence_type'=> $row[16],
								'sin_number'=> $row[17],
								'sin_expire'=> $row[18],
								//'driver_license'=> $row['driver_license'],
								'internal_notes'=> $row[25],
								'notes'=> $row[26],
								'work_category'=> $work_category,
								'transportation_mode'=> $row[14],
								'own_car'=> $row[31],
								'languages'=> $languages,
								'education_history'=> $education_history,
								'employment_history'=> $employment_history,
								//'bank_name'=> $row['bank_name'],
								//'account_number'=> $row['account_number'], 
								//'ifsc_code'=> $row['ifsc_code'],
								'created_by'=> Auth::user()->id
								));
							}
						}
					}
				}
				$count++;
			}
		}
	}