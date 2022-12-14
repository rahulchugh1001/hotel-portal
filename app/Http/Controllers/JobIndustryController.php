<?php

namespace App\Http\Controllers;

use App\Models\JobIndustry;
use Illuminate\Http\Request;

class JobIndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['industries']=JobIndustry::all();
        
        return view ('admin.job.industry.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admin.job.industry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $response=JobIndustry::create($request->except('_token')); 
        if($response){
                
            return redirect()->route('job-industry.index')->with('success','Job industry created successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobIndustry  $jobIndustry
     * @return \Illuminate\Http\Response
     */
    public function show(JobIndustry $jobIndustry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobIndustry  $jobIndustry
     * @return \Illuminate\Http\Response
     */
   public function edit(Request $request, $id)
    {
         $data['industry']=JobIndustry::find($id);
         return view('admin.job.industry.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobIndustry  $jobIndustry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response=JobIndustry::where('id',$id)->update($request->except('_token','_method')); 
        if($response){
        
            return redirect()->route('job-industry.index')->with('success','Job industry updated');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobIndustry  $jobIndustry
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobIndustry $jobIndustry)
    {
        //
    }
}
