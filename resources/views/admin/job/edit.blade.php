@extends('admin.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Job</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Job</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('jobs.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage Jobs</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Edit Job</h5>
                    <hr>
                    <div class="card shadow-none">
                        
@php
$companyFlag=false;	
$agencyFlag=false;

$createdFor=App\Models\User::getRoleLabel($job->created_for);




if($createdFor=='agency')
{
$agencyFlag=true;
}

	
if($createdFor=='company')
{
$companyFlag=true;	
}

@endphp
						
						<div class="card-body">
                            <form class="row g-3" method="post" action="{{route('jobs.update',$job->id)}}">
                                @csrf

                                @role('agency') 
								@role('admin') 
								<div class="col-6">
                                    <label class="form-label">Create for</label>
                                    <select class="form-select" aria-label="Default select example" id="create_for">
                                        <option value="">Choose an option</option>
                                        <option value="1" @if($companyFlag) selected @endif>Company</option>
                                                   
                                       <option value="2" @if($agencyFlag) selected @endif>Agency</option>
                                                  
                                    </select>
                                </div>
								@endrole
                                <div class="col-6 company">
                                    <div id="">
                                        <label class="form-label">Create for Company</label>
                                    <select class="form-select" aria-label="Default select example" name="company_id" id="company_id">
                                                    <option value="">Select Company</option>
                                                    @foreach($companies as $company)   
                                                   
                                                   <option value="{{$company->user_id}}"
												   @if($companyFlag)
													   @if($company->user_id==$job->created_for)
													   selected
													   @endif
												   @endif
												   >{{$company->name}}</option>
                                                  
                                               @endforeach
                                                </select>
                                    </div>
                                    
                                </div>
								@role('admin')
                                <div class="col-6 agency">
                                    <div id="">
                                        <label class="form-label">Create for Agency</label>
                                        <select class="form-select" aria-label="Default select example" name="agency_id" id="agency_id">
                                            <option value="">Select Agency</option>
                                            @foreach($agencies as $agency)   
                                                       
                                                       <option value="{{$agency->user_id}}"
													    @if($agencyFlag)
												   @if($agency->id==$job->created_for)
												   selected
												   @endif
												   @endif
													   
													   
													   >{{$agency->name}}</option>
                                                      
                                                   @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
								@endrole
								@endrole
								

                                @fieldpermission('job-edit|job_title')
                                <div class="col-6">
                                    <label class="form-label">Job Title <span>*</span></label>
                                    <select class="form-select" id="job_title" name="job_title">
                                    @foreach($job_titles as $job_title)
                                       <option value="{{$job_title->id}}" @if($job->job_title==$job_title->id) selected="selected" @endif>{{$job_title->title}}</option>
                                    @endforeach
                                        
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|job_type')
                                <div class="col-6">
                                    <label class="form-label">Job Type <span>*</span></label>
                                    <select class="form-select" id="job_type" name="job_type">
                                        @foreach($job_types as $job_type)
                                       <option value="{{$job_type->id}}" @if($job->job_type==$job_type->id) selected="selected" @endif>{{$job_type->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|job_category')
                                <div class="col-6">
                                    <label class="form-label">Job Category <span>*</span></label>
                                    <select class="form-select" id="job_category" name="job_category">
                                        @foreach($job_categories as $job_category)
                                       <option value="{{$job_category->id}}" @if($job->job_category==$job_category->id) selected="selected" @endif>{{$job_category->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|job_industry')
                                <div class="col-6">
                                    <label class="form-label">Job Industry <span>*</span></label>
                                    <select class="form-select" id="job_industry" name="job_industry">
                                        @foreach($job_industries as $job_industry)
                                                <option value="{{$job_industry->id}}" @if($job->job_industry==$job_industry->id) selected="selected" @endif>{{$job_industry->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|job_position')
                                <div class="col-6">
                                    <label class="form-label">Position Available <span>*</span></label>
                                    <select class="form-select" id="job_position" name="job_position">
                                         @foreach($job_positions as $job_position)
                                                <option value="{{$job_position->id}}" @if($job->job_position==$job_position->id) selected="selected" @endif>{{$job_position->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|job_exp')
                                <div class="col-6">
                                    <label class="form-label">Work Experience <span>*</span></label>
                                    <select class="form-select" id="job_experience" name="job_experience">
                                        @foreach($job_experiences as $job_experience)
                                                <option value="{{$job_experience->id}}" @if($job->job_exp==$job_experience->id) selected="selected" @endif>{{$job_experience->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                

                                @fieldpermission('job-edit|salary_period')
                                <div class="col-6">
                                    <label class="form-label">Salary Period <span>*</span></label>
                                    <select class="form-select" id="salary_period" name="salary_period">
                                        @foreach(config('constant.salary_period') as $key=>$value)   
                                                   
                                                   <option value="{{$key}}" @if($key==$job->salary_period) selected="selected" @endif>{{$value}}</option>
                                                  
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|job_desc')
                                <div class="col-12">
                                    <label class="form-label">Job Description</label>
                                    <textarea class="form-control" rows="4" cols="4" name="job_description" id="job_description">{{$job->job_desc}}</textarea>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|gender')
                                
                                <div class="col-6">
                                    <label class="form-label">Gender Requirment <span>*</span></label>
                                    <select class="form-select" id="gender" name="gender">
                                        @foreach(config('constant.gender') as $key=>$value)   
                                                   
                                               <option value="{{$key}}" @if($key==$job->gender) selected="selected" @endif>{{$value}}</option>
                                                  
                                       @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|employement_type')
                                <div class="col-6">
                                    <label class="form-label">Employement Type <span>*</span></label>
                                    <select class="form-select" id="employment_type" name="employment_type">
                                        @foreach(config('constant.employment_type') as $key=>$value)   
                                                   
                                               <option value="{{$key}}" @if($key==$job->employment_type) selected="selected" @endif>{{$value}}</option>
                                                  
                                       @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|job_education')
                                <div class="col-6">
                                    <label class="form-label">Education <span>*</span></label>
                                    <select class="form-select" id="job_education" name="job_education">
                                        @foreach($job_educations as $job_education)
                                                <option value="{{$job_education->id}}" @if($job->job_education==$job_education->id) selected="selected" @endif>{{$job_education->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|country')
                                <div class="col-6">
                                    <label class="form-label">Country <span>*</span></label>
                                    <select class="form-select" id="country" name="country">
                                        <option value="38">Canada</option>
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|state')
                                <div class="col-6">
                                    <label class="form-label">State <span>*</span></label>
                                    <select class="form-select" id="state" name="state">
                                        @foreach($states as $state)
                                           <option value="{{$state->id}}" @if($job->state==$state->id) selected="selected" @endif>{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|city')
                                
                                @php

                                $cityarray=json_decode($job->city);
                                $cities=App\Models\City::getCityByState($job->state);

                                @endphp

                                <div class="col-6">
                                    <label class="form-label">City <span>*</span></label>
                                    <select class="form-select multiselect" id="city" name="city[]" multiple>
                                        @foreach($cities as $city)
                                         @foreach($cityarray as $city_id)

                                        <option value="{{$city->id}}" @if($city_id==$city->id) selected @endif>{{$city->name}}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|location')
                                <div class="col-6">
                                    <label class="form-label">Location <span>*</span></label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{$job->location}}">
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-edit|expiry_date')
                                <div class="col-6">
                                    <label class="form-label">Expiry Date <span>*</span></label>
                                    <input type="date" class="form-control" name="expiry_date" id="expiry_date" value="{{$job->expiry_date}}">
                                </div>
                                @endfieldpermission

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4"><b>+</b> Update Job</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@role('admin')
<script>

$(document).ready(function() {


            $(".company").hide();
            $(".agency").hide();


});

</script>
@endrole

    <script>

$(document).ready(function() {
     $("#create_for").change(function(){

        var selectedopt=$("#create_for option:selected").val();

        if(selectedopt==1){
            $(".company").show();
            $(".agency").hide();


        }else if(selectedopt==2){
            $(".agency").show();
            $(".company").hide();

        }else if (selectedopt=='') {
            $(".agency").val('');
            $(".company").val('');
        }
    })
});

</script>

    <script type="text/javascript">
        $('#state').change(function(){
        var stateId = $(this).val();    
       
      if(stateId){
            $.ajax({
               type: "GET",
               url:"{{route('city.index')}}?state_id="+stateId,
               success:function(data){              
                   $("#city").empty();
                   $.each(data, function(key, value) {
                   $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
       
               }
            });
        }else{
            $("#city").empty();
           
        }      
       });
       
    </script>

@endsection
