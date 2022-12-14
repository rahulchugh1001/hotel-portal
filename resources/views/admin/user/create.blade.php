@extends('admin.layouts.app')

@section('content')


<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('users.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage User</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

  <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Add New User</h5>
					@include('toast')
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3" method="post" action="{{route('users.store')}}">
                                @csrf
                                <div class="col-6 form-group">
                                    <label class="form-label">Full Name <span>*</span></label>
                                    <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Enter Full Name" value="{{ old('full_name') }}" required>
                                </div>
                                <!-- <div class="col-6 form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Enter Last Name" value="">
                                </div> -->
                                <div class="col-6 form-group">
                                    
									@error('email')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									<label class="form-label">Email Address<span>*</span></label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required>
                                </div>
                                
                                <!-- <div class="col-6 form-group">
                                    <label class="form-label">Password<span>*</span></label>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter Password" value="" required>
                                </div> -->
                                <div class="col-6 form-group">
                                    <label class="form-label">Role <span>*</span></label>
                                    <select name="role" id="role" class="form-select">
                                        <option value="">Select Role Type</option>

                                         @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                
                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4"><b>+</b> Add New User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
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
                message: 'The Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The Name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]*$/,
                        message: 'The Name can only consist of alphabetical and spaces'
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
    
      
            role: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                }
            }
      
      
        }
    });
});
</script> 


@endsection
