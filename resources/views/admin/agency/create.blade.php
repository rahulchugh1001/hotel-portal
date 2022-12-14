@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Agency</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Agency</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('agency.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage Agency</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

 <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card shadow-sm border-0">
                        <form class="customer_form" method="post" action="{{route('agency.store')}}" enctype="multipart/form-data">
						@csrf
                        <div class="card-body">
                            <h5 class="mb-0">Add Agency</h5>
                            <hr>
                            <div class="card shadow-none border">
                                <div class="card-header">
                                    <h6 class="mb-0">USER INFORMATION</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- <div class="col-12 form-group">
                                            <label class="form-label">Agency Logo</label>
                                            <input class="form-control" type="file" name="upload_file" id="formFile">
                                        </div> -->

                                         @fieldpermission('agency-create|logo_path')
                                        <div class="col-12 form-group">
                                            <div class="box-for-image  main-image">
                                                <div class="form-field-here add-product-image">
                                                    <label class="input-label">Logo - (Max image size 2MB, Approx: 110px x 110px)
                                                    <span style="color: red">*</span></label> 
                                                    <div class="store-logo profile">
                                                        <img class="" src="{{asset('assets/images/upload-image.jpg')}}">
                                                    </div>
                                                    <input type="file" id="add-pencil-icon" name="upload_file" class="btn-pencil-icon">
                                                </div>
                                            </div>
                                        </div>
                                        @endfieldpermission


                                         <!-- @fieldpermission('agency-create|relation_type')
                                        <div class="col-6">
                                            <label class="form-label">Relation with</label>
                                            <select class="form-select validate[required]" aria-label="Default select example" name="relation_type" id="relation_type">
                                                <option value="0">Select Company</option>
                                                @foreach($companies as $company)   
                                               
                                               <option value="{{$company->user_id}}">{{$company->name}}</option>
                                              
                                           @endforeach
                                            </select>
                                        </div>										
                                        @endfieldpermission -->


                                         @fieldpermission('agency-create|plan_id')										
										<div class="col-6">
                                                <label class="form-label">Plan <span>*</span></label>
                                                <select class="form-select validate[required]" aria-label="Default select example" name="plan" id="plan">
                                                    <option>Select Plan</option>
                                                    @foreach($plans as $plan)   
                                                   
                                                   <option value="{{$plan->id}}">{{$plan->name}}</option>
                                                  
                                               @endforeach
                                                </select>
                                            </div>
                                        @endfieldpermission

                                        @fieldpermission('agency-create|name')

                                        <div class="col-6 form-group">
                                            <label class="form-label">Agency Name <span>*</span></label>
                                            <input type="text" class="form-control @error('agency_name') is-invalid @enderror" name="agency_name" value="{{ old('agency_name') }}" id="agency_name" required>
                                        </div>

                                        @endfieldpermission

                                        @fieldpermission('agency-create|email')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Email <span>*</span></label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" required>
                                        </div>
                                        @endfieldpermission

                                        @fieldpermission('agency-create|mobile')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Phone <span>*</span></label>
                                            <input type="number" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" name="mobile" id="mobile" required>
                                        </div>
                                        @endfieldpermission

                                        @fieldpermission('agency-create|website')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Website <span>*</span></label>
                                            <input type="text" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" name="website" id="website" required>
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('agency-create|founded_date')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Founded Date <span>*</span></label>
                                            <input type="date" class="form-control @error('founded_date') is-invalid @enderror"  name="founded_date" value="{{ old('founded_date') }}" id="founded_date" required>
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

                                        @fieldpermission('agency-create|country_id')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Country <span>*</span></label>
                                            <select class="form-select mb-3" id="country" name="country" aria-label="Default select example">
                                                
                                                <option value="38">Canada</option>
                                            </select>
                                        </div>
                                        @endfieldpermission

                                        @fieldpermission('agency-create|state_id')
                                        <div class="col-6 form-group">
                                            <label class="form-label">State <span>*</span></label>
                                            <select class="form-select mb-3" id="state" name="state" aria-label="Default select example">
                                                <option selected="">Select State</option>
                                                @foreach($states as $state)
												<option value="{{$state->id}}">{{$state->name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @endfieldpermission

                                        @fieldpermission('agency-create|city_id')
                                        <div class="col-6 form-group">
                                            <label class="form-label">City <span>*</span></label>
                                            <select class="form-select mb-3" name="city" id="city"aria-label="Default select example">
                                                
                                            </select>
                                        </div>
                                        @endfieldpermission

                                        @fieldpermission('agency-create|postcode')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Postcode <span>*</span></label>
                                            <input type="text" class="form-control @error('postcode') is-invalid @enderror" value="{{ old('postcode') }}" name="postcode" id="postcode" required>
                                        </div>
                                        @endfieldpermission

                                        @fieldpermission('agency-create|address')
                                        <div class="col-12 form-group">
                                            <label class="form-label">Full Address <span>*</span></label>
                                            <textarea class="form-control @error('full_address') is-invalid @enderror" rows="4" cols="4" name="full_address" placeholder="47-A, city name, United States" required>{{ old('full_address') }}</textarea>
                                        </div>
                                        @endfieldpermission

                                    </div>
                                </div>
                            </div>
							
							<div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">AGENCY SOCIAL LINK</h6>
                        </div>
                        <div class="card-body">
                          <div class="row g-3">

                            @fieldpermission('agency-create|facebook')
                            <div class="col-6 form-group">
                              <label class="form-label">Facebook </label>
                              <input type="url" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook') }}" name="facebook" id="facebook" required>
                             </div>
                             @endfieldpermission

                            @fieldpermission('agency-create|twitter')
                             <div class="col-6 form-group">
                              <label class="form-label">Twitter </label>
                              <input type="url" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter') }}" name="twitter" id="twitter" required>
                             </div>
                              @endfieldpermission

                            @fieldpermission('agency-create|google_plus')
                             <div class="col-6 form-group">
                              <label class="form-label">Google Plus </label>
                              <input type="url" class="form-control @error('google_plus') is-invalid @enderror" value="{{ old('google_plus') }}" name="google_plus" id="google_plus" required>
                             </div>
                              @endfieldpermission

                            @fieldpermission('agency-create|linked_in')
                             <div class="col-6 form-group">
                              <label class="form-label">Linked In </label>
                              <input type="url" class="form-control @error('linked_in') is-invalid @enderror" value="{{ old('linked_in') }}" name="linked_in" id="linked_in" required>
                             </div>
                              @endfieldpermission

                          </div>
                        </div>
                      </div>
							
							
							
							
							
							
							
							
                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4"><b>+</b> Create Agency</button>
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
            agency_name: {
                message: 'Agency Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Agency Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Agency Name must be more than 6 and less than 30 characters long  <br>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]*$/,
                        message: 'Agency Name can only consist of alphabetical and spaces'
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


             description: {
                message: 'Agency Description is not valid',
                validators: {
                    notEmpty: {
                        message: 'Agency Description is required and cannot be empty'
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
                message: 'Agency address is not valid',
                validators: {
                    notEmpty: {
                        message: 'Agency address is required and cannot be empty'
                    },
                    stringLength: {
                        min: 10,
                        message: 'Agency address must be minimum 10 characters long'
                    }
                }
            },


            facebook: {
                validators: {
                    uri: {
                        message: 'facebook address is not valid, must be in url http:// format'
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
