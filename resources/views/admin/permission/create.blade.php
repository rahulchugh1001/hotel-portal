@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Permission</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Permission</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('Permissions.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage Permissions</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

  <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Add New Permission</h5>
					 {{Session::get('error')}}
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3" method="POST" action="{{route('permissions.store')}}">
                                 @csrf
								<div class="col-6 form-group">
                                    <label class="form-label">Name <span>*</span></label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" value="{{old('name')}}" required>
                                </div>
                               <div class="form-group col-3">
                                            <label for="product-name">Models<span class="text-danger">*</span></label>
                                        @php  
                                            $all_models=\Helper::getAvailableModels(); 
                                            $removeModel=\Config::get('constant.model');
                                        @endphp
                                        
                                        <select class="form-control" name="model">
                                            <option value="">Select an Option</option>
                                            @foreach($all_models as $key=>$model)
                                                @if(!in_array($key,$removeModel))
                                                     <option value="{{$model}}">{{$key}}</option>
                                                 @endif    
                                            @endforeach
                                        </select>
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

            model: {
                validators: {
                    notEmpty: {
                        message: 'Models is required'
                    },
                    
                }
            }
        }
    });
});
</script>


@endsection
