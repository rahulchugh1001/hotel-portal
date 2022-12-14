@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add New Job</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Job</li>
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
                    <h5 class="mb-0">Post a New Job</h5>
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class=" customer_form row g-3"  method="post" action="{{route('jobs.store')}}">
                                @csrf

                                   @role('agency') 
									
									@role('admin') 
									<div class="col-6">
                                    <label class="form-label">Create for</label>
                                    <select class="form-select" aria-label="Default select example" id="create_for">
                                        <option value="">Choose an option</option>
                                        
										<option value="1">Company</option>
                                                   
                                       <option value="2">Agency</option>
                                                  
                                    </select>
									</div>
									@endrole
                                
								
								<div class="col-6 company">
                                    <div id="">
                                        <label class="form-label">Create for Company</label>
                                    <select class="form-select" aria-label="Default select example" name="company_id" id="company_id">
                                                    <option value="">Select Company</option>
                                                    @foreach($companies as $company)   
                                                   
                                                   <option value="{{$company->user_id}}">{{$company->name}}</option>
                                                  
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
                                                       
                                                       <option value="{{$agency->user_id}}">{{$agency->name}}</option>
                                                      
                                                   @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
								@endrole
								
								@endrole
								
								
								
								
								
								

                                @fieldpermission('job-create|job_title')
                                <div class="col-6">
                                    <label class="form-label">Job Title <span>*</span></label>
                                    <select class="form-select" id="job_title" name="job_title">
                                        <option selected="">Select Job Type</option>
                                        @foreach($job_titles as $job_title)
                                                <option value="{{$job_title->id}}">{{$job_title->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|job_type')
                                <div class="col-6">
                                    <label class="form-label">Job Type <span>*</span></label>
                                    <select class="form-select" id="job_type" name="job_type">
                                        <option selected="">Select Job Type</option>
                                        @foreach($job_types as $job_type)
                                                <option value="{{$job_type->id}}">{{$job_type->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|job_category')
                                <div class="col-6">
                                    <label class="form-label">Job Category <span>*</span></label>
                                    <select class="form-select" id="job_category" name="job_category">
                                        <option selected="">Select Job Category</option>
                                        @foreach($job_categories as $job_category)
                                                <option value="{{$job_category->id}}">{{$job_category->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|job_industry')
                                <div class="col-6">
                                    <label class="form-label">Job Industry <span>*</span></label>
                                    <select class="form-select" id="job_industry" name="job_industry">
                                        <option selected="">Select Job Industry</option>
                                        @foreach($job_industries as $job_industry)
                                                <option value="{{$job_industry->id}}">{{$job_industry->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|job_position')
                                <div class="col-6">
                                    <label class="form-label">Position Available <span>*</span></label>
                                    <select class="form-select" id="job_position" name="job_position">
                                        <option selected="">Select Position</option>
                                         @foreach($job_positions as $job_position)
                                                <option value="{{$job_position->id}}">{{$job_position->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|job_exp')
                                <div class="col-6">
                                    <label class="form-label">Work Experience <span>*</span></label>
                                    <select class="form-select" id="job_experience" name="job_experience">
                                        <option>Select Work Experience</option>
                                        @foreach($job_experiences as $job_experience)
                                                <option value="{{$job_experience->id}}">{{$job_experience->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                <div class="col-6 row" style="margin-top: 1rem; margin-right: 12px;">

                                @fieldpermission('job-create|min_salary')
                                    <div class="col-3">
                                        <label class="form-label">Salary</label>
                                        <input type="number" class="form-control @error('min_salary') is-invalid @enderror" value="{{ old('min_salary') }}" placeholder="Min" id="min_salary" name="min_salary">
                                    </div>
                                    @endfieldpermission

                                @fieldpermission('job-create|max_salary')
                                    <div class="col-3">
                                        <label class="form-label" style="opacity:0;">Salary <span>*</span></label>
                                        <input type="number" class="form-control @error('max_salary') is-invalid @enderror" value="{{ old('max_salary') }}" placeholder="Max" id="max_salary" name="max_salary">
                                    </div>
                                    @endfieldpermission

                                </div>

                                @fieldpermission('job-create|salary_period')
                                <div class="col-6">
                                    <label class="form-label">Salary Period <span>*</span></label>
                                    <select class="form-select" id="salary_period" name="salary_period">
                                        <option>Select Salary Period</option>
                                        @foreach(config('constant.salary_period') as $key=>$value)   
                                                   
                                                   <option value="{{$key}}">{{$value}}</option>
                                                  
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|job_desc')
                                <div class="col-12">
                                    <label class="form-label">Job Description</label>
                                    <textarea class="form-control @error('job_description') is-invalid @enderror" rows="4" cols="4" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu." id="job_description" name="job_description">{{ old('job_description') }}</textarea>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|gender')
                                
                                <div class="col-6">
                                    <label class="form-label">Gender Requirment <span>*</span></label>
                                    <select class="form-select" id="gender" name="gender">
                                        <option selected="">Select Gender</option>
                                        @foreach(config('constant.gender') as $key=>$value)   
                                                   
                                                   <option value="{{$key}}">{{$value}}</option>
                                                  
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|employement_type')
                                <div class="col-6">
                                    <label class="form-label">Employement Type <span>*</span></label>
                                    <select class="form-select" id="employment_type" name="employment_type">
                                        <option selected="">Select Employment</option>
                                        @foreach(config('constant.employment_type') as $key=>$value)   
                                                   
                                                   <option value="{{$key}}">{{$value}}</option>
                                                  
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|job_education')
                                <div class="col-6">
                                    <label class="form-label">Education <span>*</span></label>
                                    <select class="form-select" id="job_education" name="job_education">
                                        <option>Select Education</option>
                                        @foreach($job_educations as $job_education)
                                                <option value="{{$job_education->id}}">{{$job_education->title}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|country')
                                <div class="col-6">
                                    <label class="form-label">Country <span>*</span></label>
                                    <select class="form-select" id="country" name="country">
                                        <option value="38">Canada</option>
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|state')
                                <div class="col-6">
                                    <label class="form-label">State <span>*</span></label>
                                    <select class="form-select" id="state" name="state">
                                        <option>Select State</option>
                                        @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                               @endforeach
                                    </select>
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|city')
                                <div class="col-6">
                                    <label class="form-label">City <span>*</span></label>
                                   <select class="form-select multiselect" id="city" name="city[]" multiple>
                                        
                                    </select> 
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|location')
                                <div class="col-6">
                                    <label class="form-label">Location <span>*</span></label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" value="" id="location" name="location">
                                </div>
                                @endfieldpermission

                                @fieldpermission('job-create|expiry_date')
                                <div class="col-6">
                                    <label class="form-label">Expiry Date <span>*</span></label>
                                    <input type="date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ old('expiry_date') }}" name="expiry_date" id="expiry_date">
                                </div>
                                @endfieldpermission

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4"><b>+</b> Post a New Job</button>
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



<script>
$(document).ready(function() {
    $('.customer_form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          job_title: {
                message: 'job_title is not valid',
                validators: {
                    notEmpty: {
                        message: 'job title is required and cannot be empty'
                    }
                }
            },

           
            job_type: {
                validators: {
                    notEmpty: {
                        message: 'job type is required and cannot be empty'
                    }
                }
            },      

           
            job_category: {
                validators: {
                    notEmpty: {
                        message: 'job category is required and cannot be empty'
                    }
                }
            },      
            
           
            job_industry: {
                validators: {
                    notEmpty: {
                        message: 'job industry is required and cannot be empty'
                    }
                }
            },      
            
           
            job_position: {
                validators: {
                    notEmpty: {
                        message: 'job position is required and cannot be empty'
                    }
                }
            },      
            
           
            job_experience: {
                validators: {
                    notEmpty: {
                        message: 'job experience is required and cannot be empty'
                    }
                }
            },      
            
           
            salary_period: {
                validators: {
                    notEmpty: {
                        message: 'salary_period is required and cannot be empty'
                    }
                }
            },      
            
        }
    });
});
</script> 

@endsection
