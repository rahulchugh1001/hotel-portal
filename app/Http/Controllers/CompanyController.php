<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
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



class CompanyController extends Controller
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
        //$data['companies']=Company::where('id',Auth::user()->id)->get();
        $user_ids=User::getUserListArray('company');
        $companyModel = new Company; 
        $company_fields=$companyModel->getFields();

        $companiesData = $companyModel->getRecords();
        $data['companiesData']=$companiesData;

        foreach ($companiesData as $company) {
            foreach ($company as $a_key => $a_value) {
                if(in_array($a_key,$company_fields))
                {
                    $company_field_data[]=$a_key;    
                    
                }
                
            }
            break;

        }
		
		
			
		$data['company_fields'] = $company_field_data;
		
        //
        return view ('admin.company.list',$data);
        // return view ('admin.company.list');
    }


    public function assign(Request $request)
    {
       
        $agency_ids=User::getUserListArray('agency');

       $data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();

       
       $compnay_ids=User::getUserListArray('company');
       $data['companies']=UserProfile::whereIntegerInRaw('user_id',$compnay_ids)->get();
        
        if ($request->isMethod('get')) {
            
            return view ('admin.company.assign-company',$data);
            
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
      $data['states']=State::CanadaState()->get();
	  $data['plans']=Plan::where('create_for',1)->get();
          
      return view('admin.company.create',$data);   
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
            $name     = $request->input('company_name');
            $email     = $request->input('email');
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
            $plan_id = $request->input('plan');
            // $belongs_to = $request->input('belongs_to');
            
            
            $image = $request->file('company_logo'); 
            
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
            $user->roles()->attach(8);                                  
                                                
            $item = UserProfile::create(array(
                                            'user_id' => $user->id,
                                            'created_by' => Auth::user()->id,
                                            'name'=> $name,
                                            'mobile'=> $mobile, 
                                            'website'=> $website,
                                            'category'=> $category,
                                            'founded_date'=> $founded_date,
                                            'organization_type' => $organization_type,
                                            'no_employees' => $no_employees,
                                            'description' => $description,
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
           //                                  'belongs_to'=>$belongs_to,
											// 'relation_type'=>'agency',
                                           
                                                ));
            
            }
            
            
            

        if($item){
                
            return redirect()->route('company.index')->with('success','Company Created successfully!');
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
       $agency_ids=User::getUserListArray('agency');
       $data['agencies']=UserProfile::whereIntegerInRaw('user_id',$agency_ids)->get();
       $data['company']=UserProfile::where('id',$id)->first();
       $data['states']=State::CanadaState()->get();
	   $data['plans']=Plan::where('create_for',1)->get();
       return view('admin.company.edit',$data);
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
  //           $request->validate([
		// 	'email' => 'bail|required|string|email|unique:users|max:255',
		// ]);

            // echo "<pre>";
            // print_r($request->all());
            // exit;

            $profile=UserProfile::where('id',$id)->first();
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
            $plan_id = $request->input('plan');
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
            $profile->plan_id=$plan_id;
            // $profile->belongs_to=$belongs_to;
            $profile->save();

            $user->name=$name;
            // $user->email=$email;
            $user->save();
            return redirect()->route('company.index')->with('success','Company Updated successfully!');
            
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
        
        return view ('admin.company.user.list',$data);
        
    }   


    public function subUserCreate(Request $request)
    {
        $data['roles']=Role::all();

        if ($request->isMethod('get')) { 

            return view ('admin.company.user.create', $data);

        }else
        {

            $request->validate([

                'email' => 'bail|required|string|email|unique:users|max:255',
                'confirm_password' => 'required|same:password',
            
            ]);

            // $this->validate($request, [
            //  'email' => 'bail|required|string|email|unique:users|max:255',
            //  'confirm_password' => 'required|same:password',
                
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

                    return redirect()->route('company.sub.user.index');
                }
            }


        
            
            
            if($subUser){
                return redirect()->route('company.sub.user.index')->with('success','User created successfully!'); 
                 
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

            return view ('admin.company.user.edit', $data);

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

            $user->save();



            // if ($role){

      //           $user->roles()->attach($role);
            // }


            
            if($user){
                return redirect()->route('company.sub.user.index')->with('success','User created successfully!'); 
                 
            }else
                 
                {
                    return redirect()->back()->with('error','Error in creating User'); 
                }
                 

        }
        
    }




    public function companySignup(Request $request){


        if ($request->isMethod('get')) {

            return view('admin.company.auth.register');

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
            $user->roles()->attach(8);                                  
                                                
            $detail = UserProfile::create(array(
                                            'user_id'=>$user->id,
                                            'name' => $name,
                                            'email' => $email,
                                            
                                        ));
            
            }
            
            
            

        if($detail){
                
            return redirect()->route('company.login')->with('success','company created successfully!');
        }else{
                return redirect()->back()->with('error','Please check the form for error');
            }

        }

        
    }


    // public function companyLogin(Request $request){


    //     if ($request->isMethod('get')) {

    //         return view('admin.company.auth.login');

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
    //                 $user_email = User::where('email', '=', $email)->first();
             
    //                 if ($user_email && $user_email->status=='1') {                       
                        
    //                     Auth::login($user_email);
                                                    
    //                     return redirect()->route('company.dashboard');       

    //                 } else {
                 
    //                     session()->flash('error', 'Wrong Credentials or Account disable , Please check email / password Or Contact Admin.');
    //                     return redirect()->back();
                
    //                 }
    //             }
    //         }
    //         else{
                
    //                 return redirect()->route('company.dashboard')->with('success','you are logged in');
    //         }
    //     }        
    // }


public function companyLogin(Request $request){


    if ($request->isMethod('get')) {

        // if (auth()->user()) 
        // {
        //    return redirect(route('company.dashboard'));
        // }
        // else
        // {
        // }
        return view('admin.company.auth.login');

    }else
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->input('email');

        // $credentials = $request->except(['_token']);

        $user = User::where('email', '=', $email)->first();


        // echo "<pre>";
        // print_r($user);
        // exit;
        // if (auth()->attempt($credentials)) {
            if($user && $user->status=='1'){
                Auth::login($user);

                if (User::isCompany()) 
                {
                    return redirect()->route('company.dashboard');
                }else
                {
                   return redirect()->back()->with('error','Invalid credentials');
                }

                // return redirect()->route('company.dashboard');
                
            }else{
                session()->flash('message', 'Invalid credentials');
                return redirect()->back()->with('error','Invalid credentials');
            }

        // }else{
        //     session()->flash('message', 'Invalid credentials');
        //     return redirect()->back();
        // }
    }
}
   


    public function companyDashboard(){
        
        
        // if (User::isCompany()) 
        // {
            return view('admin.company.dashboard');
        // }
        // else
        // {
        //    return redirect(route('company.login'));
        // }


        
        // if (auth()->user()) 
        // {
        //     return view('admin.company.dashboard');
        // }
        // else
        // {
        //    return redirect(route('company.login'));
        // }
        
    }




}
