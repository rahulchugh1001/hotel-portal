<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfficeVisitor;
use Storage;
use File;

class OfficeVisitorController extends Controller
{
    
public function index(){
    
    $data['title'] = "Office Visitors List";
    $data['values'] = OfficeVisitor::where("deleted_at",0)->latest()->get();
    $data['nav'] = "Office Visitor";

    
    
    if(Auth()->Check() == true && Auth()->User()->isSuperAdmin == 1)
    return view('admin.frontend.office_visitor.index',$data);
    else
    return view('frontend.office_visitor.index',$data);
   
    
}


public function create(Request $request){

    $data['title'] = "Office Visitors List";    
    $data['nav'] = "Office Visitor";
    
if($request->isMethod('get')){
    if(Auth()->Check() == true && Auth()->User()->isSuperAdmin == 1)
    return view('admin.frontend.office_visitor.create',$data);
    else
    return view('frontend.office_visitor.create',$data);
    
}else{
        
        if($request->image){
            $img = $request->image;
            $folderPath = "uploads/";
             
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
             
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = date("Ymdhisu") . '.png';
             
            $file = $folderPath . $fileName;
            Storage::disk("root_public")->put($file, $image_base64);
        }else{
            $file = NULL;
        }
        

    $this->validationForm($request);
  
    $values = ["name"=>$request->name,
               "email"=>$request->email,
               "phone"=>$request->phone,
               "purpose"=>$request->purpose,
               "image" => $file ? $file : NULL
              ];
    $data = OfficeVisitor::insert($values);
  
    return redirect()->route('frontend_office_visitor');

}

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

//    $data['value'] = OfficeVisitor::find(decrypt($id));

//    if($data['value']->image && File::exists($data['value']->image)){
//     dd("yes");
//    }else{
//     dd("no");
//    }


    try {
        $data['title'] = "Office Visitors Edit";    
        $data['nav'] = "Office Visitor";
        $data['value'] = OfficeVisitor::find(decrypt($id));
        
        if($data['value']){

            if($request->isMethod('get')){
                if(Auth()->Check() == true && Auth()->User()->isSuperAdmin == 1)
                return view('admin.frontend.office_visitor.edit',$data);
                else
                return view('frontend.office_visitor.edit',$data);
                
            }else{
            
               
   if($request->image){
    if($data['value']->image && File::exists($data['value']->image)){
    unlink($data['value']->image);
    }
    

    $img = $request->image;
    $folderPath = "uploads/";
     
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
     
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = date("Ymdhisu") . '.png';
     
    $file = $folderPath . $fileName;
    Storage::disk("root_public")->put($file, $image_base64);
}else{
    $file = $data['value']->image;
}
                              
                
                $values = ["name"=>$request->name,
                           "email"=>$request->email,
                           "phone"=>$request->phone,
                           "purpose"=>$request->purpose,
                           "image" => $file
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
         $data['title'] = "Office Visitors View";    
         $data['nav'] = "Office Visitor";
         $data['value'] = OfficeVisitor::find(decrypt($id));
         
         if($data['value']){ 
             if($request->isMethod('get')){
                
                if(Auth()->Check() == true && Auth()->User()->isSuperAdmin == 1)
                return view('admin.frontend.office_visitor.view',$data);
                else
                return view('frontend.office_visitor.view',$data);

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


}
