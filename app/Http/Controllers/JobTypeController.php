<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['types']=JobType::all();
        
        return view ('admin.job.type.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admin.job.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $response=JobType::create($request->except('_token')); 
        if($response){
                
            return redirect()->route('job-type.index')->with('success','Job type created successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function show(JobType $jobType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
   public function edit(Request $request, $id)
    {
         $data['type']=JobType::find($id);
         return view('admin.job.type.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response=JobType::where('id',$id)->update($request->except('_token','_method')); 
        if($response){
        
            return redirect()->route('job-type.index')->with('success','Job type updated');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobType $jobType)
    {
        //
    }
}
