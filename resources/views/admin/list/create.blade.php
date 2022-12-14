@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Candidate</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Candidate</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage Candidate</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="mb-0">Add Candidate</h5>
                            <hr>
                            <div class="steformdiv">
                                <form id="SignupForm" class="customer_form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <fieldset class="row">
                                        <div class="col-12">
                                            <legend style="display:none;">Information</legend>
                                        </div>
 

                                         
                                        <div class="col-12 form-group">
                                            <div class="box-for-image  main-image">
                                                <div class="form-field-here add-product-image">
                                                    <label class="input-label">Profile Picture - (Max image size 2MB, Approx: 110px x 110px)
                                                    <span style="color: red">*</span></label> 
                                                    <div class="store-logo profile">
                                                        <img class="" src="{{asset('assets/images/upload-image.jpg')}}">
                                                    </div>
                                                    <input type="file" id="add-pencil-icon" name="upload_file" class="btn-pencil-icon">
                                                </div>
                                            </div>
                                        </div>
                                        


                                        


                                        
										
										 <div class="col-6">
                                                <label class="form-label">Plan <span>*</span></label>
                                                <select class="form-select validate[required]" aria-label="Default select example" name="plan" id="plan">
                                                    <option>Select Plan</option>
                                                    @foreach($plans as $plan)   
                                                   
                                                   <option value="">{{$plan->name}}</option>
                                                  
                                               @endforeach
                                                </select>
                                            </div>
                                            


										
                                        
                                        <div class="row">


                                   

                                            <div class="col-6 form-group">
                                                <label class="form-label">Email Address <span>*</span></label>
                                                <input type="email" id="email" class="form-control " name="email" placeholder="Enter Email Address" value="" required>
                                            </div>
                                            


                                        


                                            <div class="col-6">
                                                <label class="form-label">First Name <span>*</span></label>
                                                <input type="text" class="form-control " name="first_name" id="first_name" value="">
                                            </div>
                                            


                                            <div class="col-6">
                                                <label class="form-label">Middle Name <span>*</span></label>
                                                <input type="text" class="form-control " name="middle_name" id="middle_name" value="">
                                            </div>
                                            


                                            <div class="col-6">
                                                <label class="form-label">Last Name <span>*</span></label>
                                                <input type="text" class="form-control" name="last_name" id="last_name" value="">
                                            </div>
                                            




                                            <div class="col-6">
                                                <label class="form-label">Phone Number <span>*</span></label>
                                                <input type="number" class="form-control" value="" name="phone" id="phone">
                                            </div>
                                            


                                            
                                            <div class="col-6">
                                                <label class="form-label">Gender <span>*</span></label>
                                                <select class="form-select validate[required]" aria-label="Default select example" name="gender" id="gender">
                                                    <option>Select Gender</option>
                                                      
                                                   
                                                   <option value="">value</option>
                                                  
                                               
                                                </select>
                                            </div>
                                            


											
											
                                        
                                            <div class="col-6">
                                                <label class="form-label">Birthday<span>*</span></label>
                                                <input type="date" class="form-control validate[required] " name="birthday" id="birthday" value="">
                                            </div>
                                            


                                            <div class="col-6">
                                                <label class="form-label">Address <span>*</span></label>
                                                <input type="text" class="form-control validate[required] " placeholder="47-A, city name, United States" name="address" id="address" value="">
                                            </div>
                                            


                                        </div>

                                        <legend style="color:#000; font-weight: 500; margin: 40px 0 0 10px; text-decoration: underline;">Emergency Contact</legend>
                                        <div class="row">


                                            <div class="col-6">
                                                <label class="form-label">Emergency Contact Name</label>
                                                <input type="text" class="form-control " name="emergency_contact_name" id="emergency_contact_name" value="">
                                            </div>
                                            



                                            <div class="col-6">
                                                <label class="form-label">Emergency Contact Number</label>
                                                <input type="number" class="form-control " name="emergency_contact" id="emergency_contact" value="">
                                            </div>
                                            



                                            <div class="col-6">
                                                <label class="form-label" for="Relationship">Relationship</label>
                                                <input id="relationship" type="text" class="form-control " name="relationship" value="">
                                            </div>
                                            


                                        </div>
                                                                                
                                    </fieldset>
                                    <fieldset class="row">


                                        <div class="col-12">
                                            <legend style="display:none;">Job Type</legend>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Job Title <span>*</span></label>
                                            <select class="form-select validate[required]" name="job_title" id="job_title" aria-label="Default select example" required>
                                                <option selected="">Select Jobs</option>
                                               
                                                <option value="">title</option>
                                              
                                            </select>
                                        </div>
                                        



                                        <div class="col-6">
                                            <legend style="display:none;">Job Type</legend>
                                        </div>


                                    

                                        <div class="col-12">
                                            <label class="form-label" style="display: block;">Interested In</label>
                                            
                                            <input type="checkbox" class="btn-check" name="interest[]" value="oncall" id="oncall" autocomplete="off">
                                            <label class="btn btn-outline-success" for="oncall">On Call</label>

                                            <input type="checkbox" class="btn-check" name="interest[]" value="parttime" id="parttime" autocomplete="off">
                                            <label class="btn btn-outline-success" for="parttime">Part Time</label>

                                            <input type="checkbox" class="btn-check" name="interest[]" value="fulltime" 
											id="fulltime"  autocomplete="off">
                                            <label class="btn btn-outline-success" for="fulltime">Full Time</label>
                                        </div>
                                        


                                        <div class="col-12">
                                            <label class="form-label" style="display: block;">Day Availability</label>
                                            
                                            <input type="checkbox" class="btn-check" name="day_availability[]" value="morning" id="morning" autocomplete="off" >
                                            <label class="btn btn-outline-success" for="morning">Morning</label>

                                            <input type="checkbox" class="btn-check" name="day_availability[]" value="afternoon" id="afternoon" autocomplete="off">
                                            <label class="btn btn-outline-success" for="afternoon">Afternoon</label>

                                            <input type="checkbox" class="btn-check" name="day_availability[]" value="evening" id="evening" autocomplete="off">
                                            <label class="btn btn-outline-success" for="evening">Evening</label>
                                        </div>
                                        


                                        <div class="col-12">
                                            <label class="form-label" style="display: block;">Time Availability</label>
                                            
                                            <input type="checkbox" class="btn-check" name="time_availability[]" value="weekdays" id="weekdays" autocomplete="off">
                                            <label class="btn btn-outline-success" for="weekdays">Weekdays</label>

                                            <input type="checkbox" class="btn-check" name="time_availability[]" value="weekends_holidays" id="weekends_holidays" autocomplete="off">
                                            <label class="btn btn-outline-success" for="weekends_holidays">Weekends/Holidays</label>
                                        </div>
                                        


                                       
                                    </fieldset>

                                    <fieldset class="row">


                                        <div class="col-12">
                                            <legend style="display:none;">Indentification</legend>
                                        </div>


                                        <div class="col-6">
                                            <label class="form-label">Sin Number</label>
                                            <input type="number" class="form-control @error('sin_number') is-invalid @enderror" value="{{ old('sin_number') }}" name="sin_number" id="sin_number">
                                        </div>
                                        


                                        <div class="col-6">
                                            <label class="form-label">Driver License Number</label>
                                            <input type="number" class="form-control @error('driver_license') is-invalid @enderror" value="{{ old('driver_license') }}" name="driver_license" id="driver_license">
                                        </div>
                                        


                                        <div class="col-6">
                                            <label class="form-label" style="margin-right: 30px;">Have Your Own Car</label>
                                            
                                            <input type="radio" class="btn-check" name="own_car" value="yes" id="yes" autocomplete="off">
                                            <label class="btn btn-outline-success" style="margin-right: 10px;" for="yes">Yes</label>

                                            <input type="radio" class="btn-check" name="own_car" value="no" id="no" autocomplete="off">
                                            <label class="btn btn-outline-success" for="no">No</label>
                                        </div>
                                        


                                    </fieldset>


                                    <fieldset class="row ">
                                        <div class="col-12">

                                            <legend style="display:none;">Education History</legend>
                                        </div>
                                        <div class="input-row row">


                                            <div class="col-3">
                                                <label class="form-label">Level Education <span>*</span></label>
                                               
                                                <select class="form-select validate[required]" name="education[]" id="education" aria-label="Default select example">
                                                    <option selected="">Select Education</option>
                                                    @foreach($job_educations as $job_education)
                                                    <option value="{{$job_education->id}}">{{$job_education->title}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            


                                            <div class="col-3">
                                                <label class="form-label">Course Studied</label>
                                                
                                                <select class="form-select validate[required]" name="course[]" id="course" aria-label="Default select example">
                                                    <option selected="">Select Course</option>
                                                    @foreach($job_courses as $job_course)
                                                    <option value="{{$job_course->id}}">{{$job_course->title}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            


                                            <div class="col-3">
                                                <label class="form-label">Certification</label>
                                               
                                                <select class="form-select validate[required]" name="certificate[]" id="certificate" aria-label="Default select example">
                                                    <option selected="">Select Education</option>
                                                    @foreach($job_certificates as $job_certificate)
                                                    <option value="{{$job_certificate->id}}">{{$job_certificate->title}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            

                                            <div class="col-3 pt-29" align="right">
                                                <button type="button" class="remove-row" style="margin-top:34px;" >X</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="ms-auto">
                                                <div class="btn-group">
                                                    <a id="add-new" class="btn btn-success" onclick="add()"> <b>+</b> Add </a>
                                                </div>
                                            </div>
                                        </div>
										
										
                                    </fieldset>
									 
									
                                    <fieldset class="row">
                                        <div class="col-12">
                                            <legend style="display:none;">Employement History</legend>
                                        </div>
                                        <div class="input-row-em row">


                                            <div class="col-3">
                                                <label class="form-label">Company Name <span>*</span></label>
                                                <input type="text" class="form-control validate[required] @error('old_company') is-invalid @enderror" value="{{ old('old_company') }}" name="old_company[]" id="old_company">
                                            </div>
                                            


                                            <div class="col-3">
                                                <label class="form-label">Job Title</label>
                                            <select class="form-select validate[required]" name="old_job_title[]" id="old_job_title" aria-label="Default select example">
                                                <option selected="">Select Jobs</option>
                                                @foreach($job_titles as $job_title)
                                                <option value="{{$job_title->id}}">{{$job_title->title}}</option>
                                               @endforeach
                                            </select>
                                            </div>
                                            


                                            <div class="col-3">
                                                <label class="form-label">Job Type</label>
                                                <select class="form-select validate[required]" name="old_job_type[]" id="old_job_type" aria-label="Default select example">
                                                <option selected="">Select Jobs</option>
                                                @foreach($job_types as $job_type)
                                                <option value="{{$job_type->id}}">{{$job_type->title}}</option>
                                               @endforeach
                                            </select>
                                            </div>
                                            


                                            <div class="col-3 pt-29" align="right">
                                                <button type="button" class="remove-row-em" style="margin-top:34px;" >X</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="ms-auto">
                                                <div class="btn-group">
                                                    <a id="add-new-em" class="btn btn-success" onclick="addEm()"><b>+</b> Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row">
                                        <div class="col-12">
                                            <legend style="display:none;">Banking Information</legend>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Bank Name <span>*</span></label>
                                            <input type="text" class="form-control validate[required] @error('bank_name') is-invalid @enderror" value="{{ old('bank_name') }}" name="bank_name" id="bank_name">
                                        </div>
                                        


                                        <div class="col-6">
                                            <label class="form-label">Account Number <span>*</span></label>
                                            <input type="number" class="form-control validate[required] @error('account_number') is-invalid @enderror" value="{{ old('account_number') }}" name="account_number" id="account_number">
                                        </div>
                                        


                                        <div class="col-6">
                                            <label class="form-label">Routing Number <span>*</span></label>
                                            <input type="text" class="form-control validate[required] @error('ifsc_code') is-invalid @enderror" value="{{ old('ifsc_code') }}" name="ifsc_code" id="ifsc_code">
                                        </div>
                                        

                                    </fieldset>
                                    <p>

                                       
                                        <button id="SaveAccount" type="submit" class="btn btn-success px-4">Add Candidate</button>

                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





<script type="text/javascript">

 function add(){
    let newel = $('.input-row:last').clone(true);
    $(newel).insertAfter(".input-row:last");
 }

 function addEm(){
    let newel = $('.input-row-em:last').clone(true);
    $(newel).insertAfter(".input-row-em:last");
 }


$('.remove-row').click(function(){
    $(this).closest(".input-row").remove();
});

$('.remove-row-em').click(function(){
    $(this).closest(".input-row-em").remove();
});
    



</script>
<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.profile > img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#add-pencil-icon").change(function() {
            readURL(this);
        });
    </script>
     <style type="text/css">
        .store-logo.profile {
            position: relative;
        }


 .box-for-image .store-logo.profile {
    height: 110px;
    width: 110px;
    overflow-y: hidden;
}

 .box-for-image input[type="text"] {
    background: #fff;
    margin-bottom: 0;
}

 .box-for-image .form-field-here {
    position: relative;
    margin-top: 0;
}

        
        .form-field-here input.edit-manufacture-icon {
            position: absolute;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            bottom: 5px;
            left: 5px;
            cursor: pointer;
        }
        
        .form-field-here input.edit-manufacture-icon:focus {
            outline: none;
        }
        
        .form-field-here input.edit-manufacture-icon:before {
            content: "";
            background: green;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
        }
        
        .form-field-here input.edit-manufacture-icon:after {
            content: "\f040";
            font-family: FontAwesome;
            color: #fff;
            top: 0;
            left: 0;
            position: absolute;
            line-height: 30px;
            text-align: center;
            width: 100%;
        }

.form-field-here input.btn-pencil-icon {
    position: absolute;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    bottom: 5px;
    left: 5px;
    cursor: pointer;
}

.form-field-here input.btn-pencil-icon:before {
    content: "";
    background: green;
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
}

.form-field-here input.btn-pencil-icon:after {
    content: "\f4cb";
    font-family: 'bootstrap-icons';
    color: #fff;
    top: 0;
    left: 0;
    position: absolute;
    line-height: 30px;
    text-align: center;
    width: 100%;
}
input:focus {
    outline: none !important;
}
.box-for-image.main-image {
    position: relative;
}
.form-field-here.add-product-image label.input-label {
    position: static;
    margin-bottom: 5px;
}

.form-field-here.add-product-image input.btn-pencil-icon {
    padding: 0;
    margin: 0;
}
.box-for-image .store-logo.profile img {
    width: 100%;    
}

.filter-blocks.multi-fields-set .input-filter.col-sm-2 {
    padding-right: 0;
}

    </style>  

<!-- <script>
$(document).ready(function() {
    $('#SignupForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The content must be more than 3 less than 30 characters long'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    stringLength: {
                        max: 10,
                        message: 'The title must be 10 characters long'
                    }
                }
            },
            content: {
                validators: {
                    notEmpty: {
                        message: 'The content is required and cannot be empty'
                    },
                    stringLength: {
                        max: 500,
                        message: 'The content must be less than 500 characters long'
                    }
                }
            }
        },
    });
});
</script> -->


@endsection
