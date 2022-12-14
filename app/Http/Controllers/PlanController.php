<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['plans']=Plan::all();
         return view ('admin.plan.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors=''; 
            $create_for     = $request->input('create_for');
            $plan_name     = $request->input('plan_name');
            $no_company     = $request->input('no_company');
            $no_agency     = $request->input('no_agency');
            $no_candidate     = $request->input('no_candidate');
            $no_post_job     = $request->input('no_post_job');
            $price = $request->input('price');
            $plan_cycle = $request->input('plan_cycle');
            $status = $request->input('status');
            
                                              
                                                
            $item = Plan::create(array(
                                            'create_for' => $create_for,
                                            'name' => $plan_name, 
                                            'no_company' => $no_company,
                                            'no_agency' => $no_agency,
                                            'no_candidate' => $no_candidate,
                                            'no_post_job' => $no_post_job,
                                            'price' => $price,
                                            'plan_cycle' => $plan_cycle,
                                            'status' => $status,
                                            
                                                ));
            
            
            
            
            

        if($item){
                
            return redirect()->route('plan.index')->with('success','Plan created successfully!');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $data['plan']=Plan::where('id',$id)->first();
        return view ('admin.plan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $plan=Plan::where('id',$id)->first();



         $errors=''; 
            // $create_for     = $request->input('create_for');
            $plan_name     = $request->input('plan_name');
            $no_company     = $request->input('no_company');
            $no_agency     = $request->input('no_agency');
            $no_candidate     = $request->input('no_candidate');
            $no_post_job     = $request->input('no_post_job');
            $price = $request->input('price');
            $plan_cycle = $request->input('plan_cycle');
            $status = $request->input('status');
            
                                              
                    // $plan->create_for = $create_for;
                    $plan->name = $plan_name;
                    $plan->no_company = $no_company;
                    $plan->no_agency = $no_agency;
                    $plan->no_candidate = $no_candidate;
                    $plan->no_post_job = $no_post_job;
                    $plan->price = $price;
                    $plan->plan_cycle = $plan_cycle;
                    $plan->status = $status;
                                            
            
            
            $plan->save();
            
            

        if($plan){
                
            return redirect()->route('plan.index')->with('success','Plan created successfully!');
        }else
            
            {
                return redirect()->back()->with('error','Please check the form for error');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
