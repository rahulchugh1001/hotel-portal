<?php

namespace App\Http\Controllers;

use App\Models\JobExperience;
use Illuminate\Http\Request;

class JobExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['experiences']=JobExperience::all();
        
        return view ('admin.job.experience.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admin.job.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $response=JobExperience::create($request->except('_token')); 
        if($response){
                
            return redirect()->route('job-experience.index')->with('success','Job experience created successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobExperience  $jobExperience
     * @return \Illuminate\Http\Response
     */
    public function show(JobExperience $jobExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobExperience  $jobExperience
     * @return \Illuminate\Http\Response
     */
   public function edit(Request $request, $id)
    {
         $data['experience']=JobExperience::find($id);
         return view('admin.job.experience.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobExperience  $jobExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response=JobExperience::where('id',$id)->update($request->except('_token','_method')); 
        if($response){
        
            return redirect()->route('job-experience.index')->with('success','Job experience updated');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobExperience  $jobExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobExperience $jobExperience)
    {
        //
    }
}
