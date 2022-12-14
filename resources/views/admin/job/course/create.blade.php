@extends('admin.layouts.app')

@section('content')

  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-type pe-3">Create Job Course</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Job Course</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('job-course.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage Job Course</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Create Job Course</h5>
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3" method="post" action="{{route('job-course.store')}}">
							@csrf
                                <div class="col-6 form-group">
                                    <label class="form-label">Job Course<span>*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" placeholder="Enter Job course">
                                </div>
                               
                                <div class="col-6 form-group">
                                    <label class="form-label">Status<span>*</span></label>
                                    <select class="form-select" name="status">
                                        <option value="">Select Status</option>
                                        @foreach(config('constant.status') as $key=>$value)   
											   
											   <option value="{{$key}}">{{$value}}</option>
											  
                                           @endforeach
										
                                    </select>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4"><b>+</b> Create Job Course</button>
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
            title: {
                message: 'Job Course is not valid',
                validators: {
                    notEmpty: {
                        message: 'Job Course is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                
                        message: 'Job Course must be more than 6 characters long  <br>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]*$/,
                        message: 'Job Course can only consist of alphabetical and spaces'
                    }
                    
                }
            },
     
     

            status: {
                validators: {
                    notEmpty: {
                        message: 'Status is required and cannot be empty'
                    }
                }
            }
      
        }
    });
});
    </script>


@endsection
