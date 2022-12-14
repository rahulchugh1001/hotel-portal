<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SalaryImport;
use Session;

class SalaryController extends Controller
{
    
    public function index(Request $request){

        
        
        $data['title'] = "Current Employee List";
        $data['values'] = Salary::where("deleted_at",0)->latest();
        $data['nav'] = "Current Employee";
        $data['search'] = [];
        
        if($request->isMethod('post')){
            // dd($request->all());              
            if($request->id)
            $data['values']->where("unique_id","LIKE","%".$request->id."%"); 
            $data['search']['id'] = $request->id;

            if($request->year)
            $data['values']->where("week_year","LIKE","%".$request->year."%"); 
            $data['search']['year'] = $request->year;

          
            if($request->week)
            $data['values']->where("week","LIKE","%".$request->week."%");
            $data['search']['week'] = $request->week;
           

            if($request->week_of)
            $data['values']->where("week_of","LIKE","%".$request->week_of."%"); 
            $data['search']['week_of'] = $request->week_of;
          

            if($request->name)
            $data['values']->where("name","LIKE","%".$request->name."%");   
            $data['search']['name'] = $request->name;

            if($request->phone)
            $data['values']->where("phone","LIKE","%".$request->phone."%");  
            $data['search']['phone'] = $request->phone;
            
        }

        // dd($data['search']['id']);

        $data['values'] = $data['values']->get();
        
        if(Auth()->Check() == true && Auth()->User()->isSuperAdmin == 1)
        return view('admin.frontend.current_employee.index',$data);
        else
        return view('frontend.current_employee.index',$data);
       
        
    }


    
    public function import(Request $request){

        Excel::import(new SalaryImport, $request->file);

        return redirect()->back();
        
    }
    
    

    
    public function validationForm($request){
        $request->validate([
            'name' => 'required|string|max:254',
            'phone' => 'required|numeric',
            'email' => 'bail|required|string|email|max:254',
            'purpose' => 'required|string|max:254',
        ]);
    }
    
    public function edit(Request $request,$id){
        
       if($request->isMethod('post')){
        $this->validationForm($request);
       }
    
        try {
            $data['title'] = "Current Company Edit";    
            $data['nav'] = "Current Company";
            $data['value'] = Salary::find($id);
            dd($data['value']);
            // $data['value'] = Salary::find(decrypt($id));
            
            if($data['value']){
    
                if($request->isMethod('get')){
                    if(Auth()->Check() == true && Auth()->User()->isSuperAdmin == 1)
                    return view('admin.frontend.office_visitor.edit',$data);
                    else
                    return view('frontend.office_visitor.edit',$data);
                    
                }else{
                
                                  
                    
                    $values = ["name"=>$request->name,
                               "email"=>$request->email,
                               "phone"=>$request->phone,
                               "purpose"=>$request->purpose,
                              ];
                
                    $data['value']->fill($values)->save();
    
                  
                    return redirect()->route('frontend_office_visitor');
                
                }
    
                 
            }
                    
        } catch (\Throwable $th) {
           abort(404);
        }
        
    
    
    }
    

    
    public function view(Request $request,$id){
        
       
         try {
            $data['title'] = "Salary";    
            $data['nav'] = "Salary";
            // $data['value'] = Salary::find($id);
            // dd($data['value']);
            $data['value'] = Salary::find(decrypt($id));
             
             if($data['value']){ 
                 if($request->isMethod('get')){
                    
                    if(Auth()->Check() == true && Auth()->User()->isSuperAdmin == 1)
                    return view('admin.frontend.current_employee.view',$data);
                    else
                    return view('frontend.current_employee.view',$data);
    
                 }              
             }
                     
         } catch (\Throwable $th) {
            abort(404);
         }
         
     
     
     }
    
    
    public function deleted(Request $request,$id){
        
        
         try {
             $data['value'] = OfficeVisitor::find(decrypt($id));
             
             if($data['value']){
    
                // dd($data['value']);
     
                     $values = ["deleted_at"=>1];             
                     $data['value']->fill($values)->save(); 
                  
                     return redirect()->route('frontend_office_visitor');
                 
                               
             }else{
            abort(404);
             }
                     
         } catch (\Throwable $th) {
            abort(404);
         }
         
     
     
     }


     public function OTPSending(Request $request){
       $id =  decrypt($request->id);
       $data = Salary::find($id);

       if($data){       
        $result['status'] = 1;
        $result['message'] = rand(1111,9999);     
        Session::put('OTPValue', $result['message']); 
        $result['ses'] = Session::get("OTPValue");
         }else{        
        $result['status'] = 1;
        $result['message'] = rand(1111,9999);
      }

        return $result;
       

     }


     public function OTPVerification(Request $request){
        
         $request_otp = $request->value;

        $correct_otp = Session::get("OTPValue");

        if($correct_otp == $request_otp){
            $data = Salary::find(decrypt($request->id));
            if($data){             
            $result['status'] = 1;
            $result['message'] = route('frontend_office_salary_view',encrypt($data->id));                             
            }else{
                $result['status'] = 0;
                $result['message'] = "something went wrong"; 
            }
            
        }else{
              $result['status'] = 0;
                $result['message'] = "Invalid OTP";
        }


        return $result;

     }
    
    
    }
    