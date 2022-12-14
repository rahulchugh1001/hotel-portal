<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['positions']=JobPosition::all();
        
        return view ('admin.job.position.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admin.job.position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $response=JobPosition::create($request->except('_token')); 
        if($response){
                
            return redirect()->route('job-position.index')->with('success','Job position created successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function show(JobPosition $jobPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
   public function edit(Request $request, $id)
    {
         $data['position']=JobPosition::find($id);
         return view('admin.job.position.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response=JobPosition::where('id',$id)->update($request->except('_token','_method')); 
        if($response){
        
            return redirect()->route('job-position.index')->with('success','Job Position updated');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPosition $jobPosition)
    {
        //
    }
}
