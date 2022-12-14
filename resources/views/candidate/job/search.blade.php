@extends('candidate.layouts.app')

@section('content')

<div class="container">


        <div class="profile-cover bg-dark search-block">

            <div class="search-job-form">
                <h1>Search You Job</h1>
                <form class="search-form-here">
                    <div class="form-field width-set">
                        <input class="form-control" type="text" placeholder="Enter Your Job Keywords...">
                    </div>
                    <div class="form-field">
                        <select class="form-select">
                                <option>Select Location</option>
                                <option>Option</option>
                                <option>Option</option>
                                <option>Option</option>
                                <option>Option</option>
                            </select>
                    </div>
                    <div class="form-field">
                        <button onclick="window.location.href='search-result.php'" type="submit" class=" btn btn-primary "><i class="fas fa-filter "></i> Search</button>
                    </div>


                </form>
            </div>
        </div>

        <div class="row ">
            <div class="col-12 col-lg-8 ">
                <h4>Recommodation Jobs</h4>
                <!-- job item start  -->
                <div class="card shadow-sm border-0 ">
                    <div class="card-body ">
                        <div class="job-header d-flex justify-content-between ">
                            <div class="heading-jobs ">
                                <h5 class="mb-0 ">Graphic Designer,web designer</h5>
                                <p class="mb-0 ">New Global Technologies </p>
                            </div>
                            <div class="job-actions ">
                                <a href="#. " class="btn btn-outline-secondary rounded-0 btn-sm ">Save This Job</a>
                                <a href="#. " class="btn btn-primary rounded-0 btn-sm ">Apply Job</a>
                            </div>
                        </div>
                        <hr>
                        <div class="job-body ">
                            <div class="d-flex ">
                                <p><i class="bi bi-briefcase "></i>
                                    <span class="exp ">05 Years</span></p>
                                <p><i class="bi bi-map "></i>
                                    <span class="truncate loc ">Chennai, Noida, Mumbai (All Areas)</span></p>
                            </div>
                            <p><i class="bi bi-pen "></i>
                                <span class="truncate skill ">Visual Effects,Audio Editing,CSS,MySQL,Javascript,Animation,VFX,PHP,HTML,Web Designing,Graphic Designer candidate from reputed school of arts will be preferred.</span></p>

                            <p><i class="bi bi-file-earmark-text "></i>
                                <span>Candidate should have 0-5 years of experience with excellent knowledge of different ...</span></p>
                        </div>
                        <div class="job-footer d-flex justify-content-between ">
                            <div class="left l-align ">
                                <i class="bi bi-wallet2 "></i> <span>300,000 - 800,000 PA</span></div>
                            <div class="right right-align ">
                                <span class="recCont ">Posted  just now</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END job item start  -->
                <!-- job item start  -->
                
				@foreach($jobs as $job)
				
				<div class="card shadow-sm border-0 ">
                    <div class="card-body ">
                        <div class="job-header d-flex justify-content-between ">
                            <div class="heading-jobs ">
                                <h5 class="mb-0 ">{{App\Models\JobTitle::getName($job->job_title)}}</h5>
                                <p class="mb-0 ">{{App\Models\User::getName($job->created_for)}}</p>
                            </div>
                            <div class="job-actions ">
                                <a href="#. " class="btn btn-outline-secondary rounded-0 btn-sm ">Save This Job</a>
                                <a href="#. " class="btn btn-primary rounded-0 btn-sm ">Apply Job</a>
                            </div>
                        </div>
                        <hr>
						
                        <div class="job-body ">
                            <div class="d-flex ">
                                <p><i class="bi bi-briefcase "></i>
                                    <span class="exp ">{{App\Models\JobExperience::getName($job->job_exp)}}</span></p>
                                <p><i class="bi bi-map "></i>
                                    <span class="truncate loc ">

								<?php

                                $cityarray = [];

                                    $cityarray=json_decode($job->city);
                                        
                                ?>

                             

									@if(isset($cityarray) && !empty($cityarray))
									@foreach($cityarray as $city_id)
									{{App\Models\City::getName($city_id)}},
									@endforeach
                                    @endif

                                
									
									</span></p>
                            </div>
                            <p><i class="bi bi-pen "></i>
                                <span class="truncate skill ">{{$job->job_designation}}</span></p>

                            <p><i class="bi bi-file-earmark-text "></i>
                                <span>{{$job->job_desc}}</span></p>
                        </div>
                        <div class="job-footer d-flex justify-content-between ">
                            <div class="left l-align ">
                                <i class="bi bi-wallet2 "></i> <span>{{$job->min_salary}} - {{$job->max_salary}} PA</span></div>
                            <div class="right right-align ">
                                <span class="recCont ">{{date('M\ d\, Y', strtotime($job->created_at))}}</span>
                            </div>
                        </div>
                    </div>
                </div>
				@endforeach
                <!-- END job item start  -->
                <!-- job item start  -->
           
                <!-- END job item start  -->
                <!-- job item start  -->
               
                <!-- END job item start  -->
                <!-- job item start  -->
                
                <!-- END job item start  -->

            </div>
            <div class="col-12 col-lg-4 ">
                <div class="card shadow-sm border-0 overflow-hidden ">
                    <div class="card-body ">
                        <div class="text-start ">
                            <h5 class=" ">About Search Jobs</h5>
                            <p class="mb-0 ">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem.
                            </p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top ">
                            Job Saved Total
                            <span class="badge bg-primary rounded-pill ">30</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            This Month
                            <span class="badge bg-primary rounded-pill ">5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            Templates
                            <span class="badge bg-primary rounded-pill ">14</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>




    </div>       
@endsection
