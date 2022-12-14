@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Role</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Role</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('roles.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage Role</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

  <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Add New Role</h5>
					 {{Session::get('error')}}
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3" method="POST" action="{{route('roles.store')}}">
                                 @csrf
								<div class="col-6 form-group">
                                    <label class="form-label">Role Name <span>*</span></label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" value="{{old('name')}}" required>
                                </div>
                              <div class="col-sm-12 col-12">
                                <div class="form-group mb-3 row checkbox-design-page without-loop">
								 <div class="col-12 col-sm-4">
											<div class="heading-checkbox-page">
											   <!--<h4>Sub Category</h4>-->
											</div>
											<div class="checkbox-category-custom">
                                            @foreach($permissions as $permission)
                                         <div class="checkbox checkbox-success mb-2 ml-2 ">

                                                <input  id="checkbox{{$permission->id}}" type="checkbox" name='permission[]' value="{{$permission->id}}">
                                                <label for="checkbox{{$permission->id}}">
                                                    {{$permission->name}}
                                                </label>
												</div>
												
                                            @endforeach
</div>
                                            </div>
                                    </div>
									</div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4"><b>+</b> Add New Role</button>
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
          name: {
                message: 'Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Name must be more than 6 and less than 30 characters long  <br>'
                    },
                    
                    regexp: {
                        regexp: /^[a-zA-Z\s]*$/,
                        message: 'Name can only consist of alphabetical and spaces'
                    }
                    
                }
            },

            permission: {
                validators: {
                    notEmpty: {
                        message: 'permission needs to be Selected'
                    },
                    
                }
            }
        }
    });
});
</script>


@endsection
