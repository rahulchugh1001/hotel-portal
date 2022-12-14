@extends('admin.layouts.app')

@section('content')
<style>
    table.dataTable{
        font-size: 12px;
    }
    .action-icon{
        font-size: 14px;
    }
</style>
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
                            
                            <li class="breadcrumb-item active">Jobs List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Jobs List</h4> </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                 <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="row">
                                         
                                            <div class="col-sm-12">
                                                <div class="text-sm-left">
                                                   
                                                    <a href="{{route('jobs.create')}}" class="btn btn-danger waves-effect waves-light" ><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                                    </div> <!-- end card-body-->
                                </div>
                <div class="card">
                    <div class="card-body">
                        
                        <table class="table table-hover m-0 table-centered w-100" id="table-list">
                            <thead>
                                <tr>
                                    @fieldpermission('job-list|job_title')
                                    <th>Title</th>
                                    @endfieldpermission

                                    @fieldpermission('job-list|job_designation')
                                    <th>Designation</th>
                                    @endfieldpermission

                                    @fieldpermission('job-list|job_type')
                                    <th>Job Type</th>
                                    @endfieldpermission

                                    @fieldpermission('job-list|job_exp')
                                    <th>Job Experience</th>
                                    @endfieldpermission

                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach($jobs as $job)

                              
                                <tr>
                                    @fieldpermission('job-list|job_title')
                                    <td> {{$job->job_title}} </td>
                                    @endfieldpermission

                                    @fieldpermission('job-list|job_designation')
                                     <td> {{$job->job_designation}} </td>
                                     @endfieldpermission

                                     @fieldpermission('job-list|job_type')
                                     <td>@if($job->job_type==1)Permanent @else Freelancer @endif </td>
                                     @endfieldpermission

                                     @fieldpermission('job-list|job_exp')
                                     <td>@if($job->job_exp==1)Experience @else Fresher @endif </td>
                                     @endfieldpermission


                                     <td> {{$job->created_at}}  </td>
                                    

                                    <td>
                                        
                                    <a href="javascript::void(0)" class="action-icon" title="Cancle Role"><i class="fas fa-trash"></i></a>  <a href="#" class="action-icon" title="View Role"><i class="fas fa-eye"></i></a><a href="{{route('jobs.edit',['job'=>$job->id])}}" class="action-icon" title="edit Jobs"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                             
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>
<!-- content -->

@endsection
