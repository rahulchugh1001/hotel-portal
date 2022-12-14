<?php

namespace App\Http\Controllers;

use App\Models\CallCenter;
use Illuminate\Http\Request;

class CallCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.callCenter.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CallCenter  $callCenter
     * @return \Illuminate\Http\Response
     */
    public function show(CallCenter $callCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CallCenter  $callCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(CallCenter $callCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CallCenter  $callCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CallCenter $callCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CallCenter  $callCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallCenter $callCenter)
    {
        //
    }
}
