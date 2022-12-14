<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Agency;
use App\Models\State;
use App\Models\City;
use App\Models\UserProfile;
use App\Models\Plan;
use App\Models\UserPlan;
use Illuminate\Support\Str;
use Auth;
use Helper;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AgencyController extends Controller
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

        $user_ids=User::getUserListArray('agency');
        $agencyModel = new Agency; 
        $agency_fields=$agencyModel->getFields();
        
        	
		/*$data['agencies']=UserProfile::whereIntegerInRaw('user_id',$user_ids)->get();
		$agencies= $data['agencies'];
*/
		$agenciesData = $agencyModel->getRecords();
		$data['agenciesData']=$agenciesData;

		foreach ($agenciesData as $agency) {
			foreach ($agency as $a_key => $a_value) {
				if(in_array($a_key,$agency_fields))
				{
					$agency_field_data[]=$a_key;	
					
				}
				
			}
			break;

		}

		$data['agency_fields'] = $agency_field_data;

		return view ('admin.agency.list',$data);

    }

    public function assign(Request $request)
    {
       
		$agency_ids=User::getUserListArray('agency');

	   $data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();

	   
	   $compnay_ids=User::getUserListArray('company');
	   $data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
		
		if ($request->isMethod('get')) {
			
			return view ('admin.agency.assign-agency',$data);
			
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
		$compnay_ids=User::getUserListArray('company');
		$data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
      $data['states']=State::CanadaState()->get();
	  $data['plans']=Plan::where('create_for',2)->get();
	  	  
      return view('admin.agency.create',$data);   
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
			$name     = $request->input('agency_name');
			$email     = $request->input('email');
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
											'name' => $name,
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
			$user->roles()->attach(7);									
												
			$item = UserProfile::create(array(
											'user_id' => $user->id,
											'created_by' => Auth::user()->id,
											'name'=> $name,
											'mobile'=> $mobile,	
											'website'=> $website,
											'category'=> $category,
											'founded_date'=> $founded_date,
											'country_id'=> $country,	
											'state_id'=> $state,
											'city_id'=> $city,
											'address'=> $address,
											'postcode'=> $postcode,
											'facebook'=> $facebook,
											'twitter'=> $twitter,
											'google_plus'=> $google_plus,
											'linked_in'=> $linked_in,	
											'logo_path'=> $path,
											'status'=> 1,
											'plan_id'=> $plan_id
											// 'relation_type'=>$relation_type,	
											
												));
			
			}
			
			
			

			if($item){
                
            return redirect()->route('agency.index')->with('success','agency created successfully!');
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
    public function edit($id)
    {
    	$compnay_ids=User::getUserListArray('company');
		$data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
		
       $data['agency']=UserProfile::where('id',$id)->first();
        $data['states']=State::CanadaState()->get();
		$data['plans']=Plan::where('create_for',2)->get();
	   return view('admin.agency.edit',$data);   
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
		
			$profile=UserProfile::where('id',$id)->first();
			$user=User::where('id',$profile->user_id)->first();

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
			$plan_id = $request->input('plan');
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
			$profile->plan_id=$plan_id;
			// $profile->relation_type=$relation_type;
			
			$profile->save();





			$user->name=$name;
			// $user->email=$email;

			$user->save();


			if($user){
                
            return redirect()->route('agency.index')->with('success','agency updated successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
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
	
	
	public function profile()
    {
        
		return view('admin.profile');  
		
    }











	public function subUserIndex()
    {

    	
        $data['users']= User::where('parent_id', Auth::user()->id)->get();
        
		return view ('admin.agency.user.list',$data);
		
    }	


    public function subUserCreate(Request $request)
    {
		$data['roles']=Role::all();

    	if ($request->isMethod('get')) { 

    		return view ('admin.agency.user.create', $data);

		}else
		{

			$request->validate([

				'email' => 'bail|required|string|email|unique:users|max:255',
				'confirm_password' => 'required|same:password',
			
			]);

			// $this->validate($request, [
			// 	'email' => 'bail|required|string|email|unique:users|max:255',
			// 	'confirm_password' => 'required|same:password',
		        
		 //    ]);

			

			// $errors='';	

			// $name     = $request->input('full_name');
			// $email     = $request->input('email');
			// $role     = $request->input('role');
			// $password     = $request->input('password');
			// $confirm_password     = $request->input('confirm_password');


			// $subUser=User::create([

	  //           'name' => $name,
	  //           'email' => $email,
	  //           'role' => $role,
	  //           'password' => Hash::make($password),
	  //           'parent_id' => Auth::user()->id
	  //       ]);





			$data = (array)$request->all();

	
			$subUser=User::create([
	            'name' => $data['full_name'],
	            'email' => $data['email'],
	            'role' => $data['role'],
	            'password' => Hash::make('password'),
	            'parent_id' => Auth::user()->id
	        ]);

	        if(isset($data['role']) && !empty($data['role']))
	        {
	            if($subUser){
	            
	                $subUser->roles()->attach($data['role']);

	                return redirect()->route('agency.sub.user.index');
	            }
	        }


		
	        
			
			if($subUser){
				return redirect()->route('agency.sub.user.index')->with('success','User created successfully!'); 
				 
			}else
				 
				{
					return redirect()->back()->with('error','Error in creating User'); 
				}
				 
		} 
		
	}
    

    public function subUserEdit(Request $request,  $id)
    {

    	$data['roles']=Role::all(); 

        $user=User::where('id',$id)->first();
        $data['user']= $user;

		$data['role_id']=User::getUserSingleRole($id);



		if ($request->isMethod('get')) { 

			return view ('admin.agency.user.edit', $data);

		}else
		{

			$errors='';	

			$name     = $request->input('full_name');
			$email     = $request->input('email');
			$role     = $request->input('role');
			$password     = $request->input('password');
			$confirm_password     = $request->input('confirm_password');


			$user->name=$name;
			$user->email=$email;
			$user->role=$role;
			$user->password=$password;

			



			if ($role){

	            $user->roles()->attach($role);
			}

			$user->save();


			
			if($user){
				return redirect()->route('agency.sub.user.index')->with('success','User created successfully!'); 
				 
			}else
				 
				{
					return redirect()->back()->with('error','Error in creating User'); 
				}
				 

		}
		
    }



    public function agencySignup(Request $request){


        if ($request->isMethod('get')) {

            return view('admin.agency.auth.register');

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
            $user->roles()->attach(7);                                  
                                                
            $detail = UserProfile::create(array(
                                            'user_id'=>$user->id,
                                            'name' => $name,
                                            'email' => $email,
                                            
                                        ));
            
            }
            
            
            

        if($detail){
                
            return redirect()->route('agency.login')->with('success','agency created successfully!');
        }else{
                return redirect()->back()->with('error','Please check the form for error');
            }

        }

        
    }


    // public function agencyLogin(Request $request){


    //     if ($request->isMethod('get')) {

    //         return view('admin.agency.auth.login');

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

    //             	$user_email = User::where('email', '=', $email)->first();
			 
	   //              if ($user_email) {                       
						
	   //                  Auth::login($user_email);
													
				// 		return redirect()->route('agency.dashboard');		

	   //              } else {
                 
				// 		session()->flash('error', 'Wrong Credentials or Account disable , Please check email / password Or Contact Admin.');
		  //   			return redirect()->back();
				
	   //              }
    //             }
    //         }
    //         else{
                
    //                 return redirect()->route('agency.dashboard')->with('success','you are logged in');
    //         }
    //     }        
    // }



public function agencyLogin(Request $request){


    if ($request->isMethod('get')) {

        return view('admin.agency.auth.login');

    }else
    {
    	$request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // $credentials = $request->only('email', 'password');

        $user = User::where('email',$request->email)->first();

        // if (Auth::attempt($credentials)) {
        	if($user && $user->status=='1'){
	        	Auth::login($user);

	        	if (User::isAgency()) 
                {
		            return redirect()->route('agency.dashboard');
                }else
                {
                   return redirect()->back()->with('error','Invalid credentials');
                }
        	}else{
        		session()->flash('message', 'Invalid credentials');
	            return redirect()->back();
        	}

        // }else{
        //     session()->flash('message', 'Invalid credentials');
        //     return redirect()->back();
        // }
    }
}




public function agencyDashboard(){

    // if (User::isAgency()) 
    // {
        return view('admin.agency.dashboard');
    // }
    // else
    // {
    //    return redirect(route('agency.login'));
    // }



    // if (auth()->user()) 
    // {
    //     return view('admin.agency.dashboard');
    // }
    // else
    // {
    //    return redirect(route('agency.login'));
    // }
 
}





}