@extends('admin.layouts.app')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{env('APP_NAME')}}</a></li>
                            
                            <li class="breadcrumb-item active">Job Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Job Create</h4> </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->
        <form method="POST" action="{{route('jobs.store')}}">
                @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Job Create</h5>

                                    {{Session::get('error')}}

                                   @fieldpermission('job-create|job_title') 
                                    <div class="form-group mb-3">
                                        <label for="product-name">Job Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="" placeholder="Job Title">
                                         @error('job_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endfieldpermission

                                    @fieldpermission('job-create|job_designation')
                                    <div class="form-group mb-3">
                                        <label for="product-name">Job Designation <span class="text-danger">*</span></label>
                                        <input type="text" name="job_designation" value="" class="form-control @error('job_designation') is-invalid @enderror" placeholder="job_designation">
                                         @error('job_designation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endfieldpermission


                                    @fieldpermission('job-create|job_desc')
                                    <div class="form-group mb-3">
                                        <label for="product-name">Job Description <span class="text-danger">*</span></label>
                                        <input type="text" name="job_desc" value="" class="form-control @error('job_desc') is-invalid @enderror" placeholder="Job Description">
                                         @error('job_desc')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endfieldpermission


                                    @fieldpermission('job-create|job_type')
                                    <div class="form-group mb-3">
                                        <label for="product-name">Job Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="job_type">
                                            <option value="1">Permanent</option>
                                            <option value="0">Freelancer</option>
                                        </select>    
                                    </div>
                                    @endfieldpermission

                                    @fieldpermission('job-create|job_exp')
                                    <div class="form-group mb-3">
                                        <label for="product-name">Job Experience<span class="text-danger">*</span></label>
                                        <select class="form-control" name="job_exp">
                                            <option value="1">Experience</option>
                                            <option value="0">Fresher</option>
                                        </select>    
                                    </div>
                                    @endfieldpermission
                                   
                        
                      
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    
                                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Create</button>
                                 
                                </div>
                            </div> <!-- end col -->
                        </div>
                          </form> 
    </div>
    <!-- container -->
</div>
<!-- content -->

@endsection
