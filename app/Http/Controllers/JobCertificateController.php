<?php

namespace App\Http\Controllers;

use App\Models\JobCertificate;
use Illuminate\Http\Request;

class JobCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['certificates']=JobCertificate::all();
        
        return view ('admin.job.certificate.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admin.job.certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $response=JobCertificate::create($request->except('_token')); 
        if($response){
                
            return redirect()->route('job-certificate.index')->with('success','Job certificate created successfully');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCertificate  $JobCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(JobCertificate $JobCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCertificate  $JobCertificate
     * @return \Illuminate\Http\Response
     */
   public function edit(Request $request, $id)
    {
         $data['certificate']=JobCertificate::find($id);
         return view('admin.job.certificate.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobCertificate  $JobCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response=JobCertificate::where('id',$id)->update($request->except('_token','_method')); 
        if($response){
        
            return redirect()->route('job-certificate.index')->with('success','Job certificate updated');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCertificate  $JobCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCertificate $JobCertificate)
    {
        //
    }
}
