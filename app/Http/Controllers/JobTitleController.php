<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$data['titles']=JobTitle::all();
        
        return view ('admin.job.title.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admin.job.title.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $response=JobTitle::create($request->except('_token')); 
        if($response){
                
            return redirect()->route('job-title.index')->with('success','Job title created successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTitle $jobTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
   public function edit(Request $request, $id)
    {
         $data['title']=JobTitle::find($id);
         return view('admin.job.title.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response=JobTitle::where('id',$id)->update($request->except('_token','_method')); 
        if($response){
        
            return redirect()->route('job-title.index')->with('success','Job Title updated');
        }else
			
			{
				return redirect()->back()->with('error','Please check the form for error');
			}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $jobTitle)
    {
        //
    }
}
