<?php

namespace App\Http\Controllers;

use App\Models\JobEducation;
use Illuminate\Http\Request;

class JobEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['educations']=JobEducation::all();
        
        return view ('admin.job.education.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admin.job.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $response=JobEducation::create($request->except('_token')); 
        if($response){
                
            return redirect()->route('job-education.index')->with('success','Job education created successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobEducation  $JobEducation
     * @return \Illuminate\Http\Response
     */
    public function show(JobEducation $JobEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobEducation  $JobEducation
     * @return \Illuminate\Http\Response
     */
   public function edit(Request $request, $id)
    {
         $data['education']=JobEducation::find($id);
         return view('admin.job.education.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobEducation  $JobEducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response=JobEducation::where('id',$id)->update($request->except('_token','_method')); 
        if($response){
        
            return redirect()->route('job-education.index')->with('success','Job education updated');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobEducation  $JobEducation
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobEducation $JobEducation)
    {
        //
    }
}
