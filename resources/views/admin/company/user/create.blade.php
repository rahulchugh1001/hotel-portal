@extends('admin.layouts.app')

@section('content')


<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Sub User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Sub User</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('agency.sub.user.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage User</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

  <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Add New User</h5>
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3 validatedForm"  method="post" action="{{route('agency.sub.user.subUserCreate')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6 form-group">
                                    <label class="form-label">Full Name <span>*</span></label>
                                    <input type="text" id="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}" name="full_name" placeholder="Enter First Name" required>
                                </div>
                                
                                <div class="col-6 form-group">
                                    <label class="form-label">Email Address<span>*</span></label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Enter Email Address" value="" required>
                                </div>

                                <div class="col-6 form-group">
                                    <label class="form-label">Role<span>*</span></label>

                                    <select name="role" id="role" class="form-select" required>
                                        <option value="">Select Role Type</option>

                                         @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                
                                       @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-6 form-group">
                                    <label class="form-label">Password<span>*</span></label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Enter Password" value="" required>
                                </div>

                                <div class="col-6 form-group">
                                    <label class="form-label">Confirm Password<span>*</span></label>
                                    <input type="password" id="confirm-password" class="form-control @error('confirm_password') is-invalid @enderror" value="{{ old('confirm_password') }}" name="confirm_password" placeholder="Enter Password" value="" required>
                                </div>
                                
                                <div class="col-12 text-start">
                                    <button type="submit" class="btn btn-success px-4">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">
    
    $('.validatedForm').validate({
            rules : {
                password : {
                    minlength : 8
                },
                confirm_password : {
                    minlength : 8,
                    equalTo : "#password"
                }
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
          full_name: {
                message: 'The Full Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Full Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The Full Name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Full Name can only consist of alphabetical and spaces'
                    }
                }
            },
        
           
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
                        message: 'The Email format is not valid'
                    }
                }
            },
    
      
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'Confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'Confirm password cannot be different from password'
                    }
                }
            }
      
      
        }
    });
});
</script> 


@endsection
