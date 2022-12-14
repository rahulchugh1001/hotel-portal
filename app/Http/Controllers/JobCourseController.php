<?php

namespace App\Http\Controllers;

use App\Models\JobCourse;
use Illuminate\Http\Request;

class JobCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['courses']=JobCourse::all();
        
        return view ('admin.job.course.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admin.job.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $response=JobCourse::create($request->except('_token')); 
        if($response){
                
            return redirect()->route('job-course.index')->with('success','Job course created successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCourse  $JobCourse
     * @return \Illuminate\Http\Response
     */
    public function show(JobCourse $JobCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCourse  $JobCourse
     * @return \Illuminate\Http\Response
     */
   public function edit(Request $request, $id)
    {
         $data['course']=JobCourse::find($id);
         return view('admin.job.course.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobCourse  $JobCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response=JobCourse::where('id',$id)->update($request->except('_token','_method')); 
        if($response){
        
            return redirect()->route('job-course.index')->with('success','Job course updated');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCourse  $JobCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCourse $JobCourse)
    {
        //
    }
}
