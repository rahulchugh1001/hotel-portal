@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                 @include('toast')
				</ol>
            </nav>
        </div>
       
    </div>
    <!--end breadcrumb-->

          <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card shadow-sm border-0">
                        <form class="customer_form" method="post" action="{{route('company.profile',$company->user_id)}}" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <h5 class="mb-0">Company Profile</h5>
                            <hr>
                            <div class="card shadow-none border">
                                <div class="card-header">
                                    <h6 class="mb-0">USER INFORMATION</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">


                             @fieldpermission('company-edit|logo_path')
                                       <div class="col-12 form-group">
                                            <div class="box-for-image  main-image">
                                                <div class="form-field-here add-product-image">
                                                    <label class="input-label">Logo - (Max image size 2MB, Approx: 110px x 110px)
                                                    <span style="color: red">*</span></label> 
                                                    <div class="store-logo profile">
                                                        <img class="" src="{{ url('/') }}/{{$company->logo_path}}" >
														
                                                    </div>
                                                    <input type="file" id="add-pencil-icon" name="company_logo" value="{{$company->logo_path}}" class="btn-pencil-icon">
                                                </div>
                                            </div>
                                        </div>
                                        @endfieldpermission


                            <!--  @fieldpermission('company-edit|agency_id')
                                        <div class="col-6">
                                                <label class="form-label">Created for Agency</label>
                                                <select class="form-select" aria-label="Default select example" name="agency_id" id="agency_id">
                                                    <option>Select Agency</option>
                                                    @foreach($agencies as $agency)   
                                                   
                                                   <option value="{{$agency->user_id}}">{{$agency->name}}</option>
                                                  
                                               @endforeach
                                                </select>
                                            </div>
                                            @endfieldpermission -->


                             @fieldpermission('company-edit|plan_id')
										
										<div class="col-6">
                                                <label class="form-label">Plan <span>*</span></label>
                                                <select class="form-select validate[required]" aria-label="Default select example" name="plan" id="plan">
                                                    <!-- <option>Select Plan</option> -->
                                                    @foreach($plans as $plan)   
                                                   
                                                   <option value="{{$plan->id}}" @if($company->plan_id==$plan->id) selected @endif>{{$plan->name}}</option>
                                                  
                                               @endforeach
                                                </select>
                                            </div>
                                            @endfieldpermission


                             @fieldpermission('company-edit|name')
										
										
                                        <div class="col-6 form-group">
                                            <label class="form-label">Company Name <span>*</span></label>
                                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{$company->name}}">
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|email')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Email <span>*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" value="{{App\Models\User::getEmail($company->user_id)}}" disabled>
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|mobile')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Phone <span>*</span></label>
                                            <input type="number" class="form-control" name="mobile" id="mobile" value="{{$company->mobile}}">
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|website')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Website <span>*</span></label>
                                            <input type="text" class="form-control" name="website" id="website" value="{{$company->website}}">
                                        </div>
                                        @endfieldpermission




                             @fieldpermission('company-edit|founded_date')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Founded Date <span>*</span></label>
                                            <input type="date" name="founded_date" id="founded_date" class="form-control" value="{{$company->founded_date}}">
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|organization_type')
                                        <div class="col-6 form-group">
                                        <label class="form-label">Organization Type <span>*</span></label>
                                            <select  name="organization_type" id="organization_type" class="form-select mb-3" aria-label="Default select example">

                                              

                                               @foreach(config('constant.organization_type') as $key=>$value)   
                                                   
                                                   <option value="{{$key}}" @if($key==$company->organization_type) selected="selected" @endif>{{$value}}</option>
                                                  
                                               @endforeach
                                              
                                            </select>
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|no_employees')
                                        <div class="col-6 form-group">
                                            <label class="form-label">No. Of Employees <span>*</span></label>
                                            <select name="employees" id="employees" class="form-select mb-3" aria-label="Default select example">
                                              @foreach(config('constant.employees') as $key=>$value)   
                                                   
                                                   <option value="{{$key}}" @if($key==$company->no_employees) selected="selected" @endif>{{$value}}</option>
                                                  
                                               @endforeach
                                              
                                            </select>
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|description')
                                        <div class="col-12 form-group">
                                          <label class="form-label">Company Description <span>*</span></label>
                                          <textarea name="description" id="description" class="form-control" rows="4" cols="4" placeholder="Company Description">{{$company->description}}</textarea>
                                        </div>
                                        @endfieldpermission


                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-none border">
                                <div class="card-header">
                                    <h6 class="mb-0">ADDRESS / LOCATION</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">


                             @fieldpermission('company-edit|country_id')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Country <span>*</span></label>
                                             <select class="form-select mb-3" id="country" name="country" aria-label="Default select example">
                                                
                                                <option value="38">Canada</option>
                                            </select>
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|state_id')
                                        <div class="col-6 form-group">
                                            <label class="form-label">State <span>*</span></label>
                                            <!-- <input type="text" class="form-control" name="state" id="state" value="{{App\Models\State::getName($company->state_id)}}"> -->
                                            <select class="form-select mb-3" id="state" name="state" aria-label="Default select example">
                                                @foreach($states as $state)
       <option value="{{$state->id}}" @if($state->id==$company->state_id) selected="selected" @endif>{{$state->name}}</option>
@endforeach
                                            </select>

                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|city_id')
                                        <div class="col-6 form-group">
                                            <label class="form-label">City <span>*</span></label>
                                           <!--  <input type="text" class="form-control" id="city" name="city" value="{{App\Models\City::getName($company->city_id)}}"> -->
                                            <select class="form-select mb-3" name="city" id="city"aria-label="Default select example">
                                                <option value="{{$company->city_id}}">{{App\Models\City::getName($company->city_id)}}</option>
                                            </select>
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|postcode')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Postcode <span>*</span></label>
                                            <input type="text" class="form-control" name="postcode" id="postcode" value="{{$company->postcode}}">
                                        </div>
                                        @endfieldpermission


                             @fieldpermission('company-edit|address')
                                        <div class="col-12 form-group">
                                            <label class="form-label">Full Address</label>
                                            <textarea class="form-control" rows="4" cols="4" name="full_address" placeholder="47-A, city name, United States">{{$company->address}}</textarea>
                                        </div>
                                        @endfieldpermission


                                    </div>
                                </div>
                            </div>




                            <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">COMPANY SOCIAL LINK</h6>
                        </div>
                        <div class="card-body">
                          <div class="row g-3">


                             @fieldpermission('company-edit|facebook')
                            <div class="col-6 form-group">
                              <label class="form-label">Facebook</label>
                              <input type="url" name="facebook" id="facebook" class="form-control" value="{{$company->facebook}}">
                             </div>
                             @endfieldpermission


                             @fieldpermission('company-edit|twitter')
                             <div class="col-6 form-group">
                              <label class="form-label">Twitter</label>
                              <input type="url" name="twitter" id="twitter" class="form-control" value="{{$company->twitter}}">
                             </div>
                             @endfieldpermission


                             @fieldpermission('company-edit|google_plus')
                             <div class="col-6 form-group">
                              <label class="form-label">Google Plus</label>
                              <input type="url" name="google_plus" id="google_plus" class="form-control" value="{{$company->google_plus}}">
                             </div>
                             @endfieldpermission


                             @fieldpermission('company-edit|linked_in')
                             <div class="col-6 form-group">
                              <label class="form-label">Linked In</label>
                              <input type="url" name="linked_in" id="linked_in" class="form-control" value="{{$company->linked_in}}">
                             </div>
                             @endfieldpermission


                          </div>
                        </div>
                      </div>
                            






                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4">Update Company</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            
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
          company_name: {
                message: 'Company Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Company Name must be more than 6 and less than 30 characters long  <br>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]*$/,
                        message: 'Company Name can only consist of alphabetical and spaces'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email address is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
                        message: 'Email format is not valid'
                    }
                }
            },
      mobile: {
                validators: {
                    notEmpty: {
                        message: 'Phone Number is required and cannot be empty'
                    },
                   
          regexp: {
                        regexp: /^[0-9]*$/,
                        message: 'Only Numric value allowed'
                    },
          
          
          stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Plese enter 10 digit number'
                    },
                }
            },

             website: {
                validators: {
                     notEmpty: {
                        message: 'website address is required and cannot be empty'
                    },
                    uri: {
                        message: 'website address is not valid, must be in url http:// format'
                    }
                }
            },

            founded_date: {
                validators: {
                    notEmpty: {
                        message: 'Founded Date is required'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'Founded Date is not valid'
                    }
                }
            },

            organization_type: {
                validators: {
                    notEmpty: {
                        message: 'Organization Type is required'
                    },
                    
                }
            },

            employees: {
                validators: {
                    notEmpty: {
                        message: 'Employees is required'
                    },
                    
                }
            },

             description: {
                message: 'Company Description is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company Description is required and cannot be empty'
                    }
                }
            },

            country: {
                validators: {
                    notEmpty: {
                        message: 'Country is required and cannot be empty'
                    }
                }
            },

            state: {
                validators: {
                    notEmpty: {
                        message: 'State is required and cannot be empty'
                    }
                }
            },

            city: {
                validators: {
                    notEmpty: {
                        message: 'City is required and cannot be empty'
                    }
                }
            },

              

      postcode: {
                message: 'Postcode is not valid',
                validators: {
                    notEmpty: {
                        message: 'Postcode is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 6,
                        message: 'Postcode must be 6 characters long  <br>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'Postcode can only consist of alphabetical and number'
                    }
                }
            },
           
             
             full_address: {
                message: 'Company address is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company address is required and cannot be empty'
                    },
                    stringLength: {
                        min: 10,
                        message: 'Company address must be minimum 10 characters long'
                    }
                }
            },


            facebook: {
                validators: {
                    uri: {
                        message: 'Facebook address is not valid, must be in url http:// format'
                    }
                }
            },
              twitter: {
                validators: {
                    uri: {
                        message: 'Twitter address is not valid, must be in url http:// format'
                    }
                }
            },
              google_plus: {
                validators: {
                    uri: {
                        message: 'Google Plus address is not valid, must be in url http:// format'
                    }
                }
            },
              linked_in: {
                validators: {
                    uri: {
                        message: 'Linked In address is not valid, must be in url http:// format'
                    }
                }
            }
      
      
      
        }
    });
});
</script> 


@endsection
