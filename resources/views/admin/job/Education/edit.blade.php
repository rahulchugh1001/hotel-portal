@extends('admin.layouts.app')

@section('content')

      <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-type pe-3">Edit Job Education</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Job Education</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('job-education.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage Job Education</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Edit Job Education</h5>
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3" method="post" action="{{route('job-education.update',$education->id)}}">
							@csrf
                                <div class="col-6 form-group">
                                    <label class="form-label">Job Education<span>*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{$education->title}}" placeholder="Enter Job education">
                                </div>
                               
                                <div class="col-6 form-group">
                                    <label class="form-label">Status<span>*</span></label>
                                    <select class="form-select" name="status">
                                        <option value="">Select Status</option>
                                        @foreach(config('constant.status') as $key=>$value)   
											   
											   <option value="{{$key}}"  @if($education->status==$key) selected  @endif >{{$value}}</option>
											  
                                           @endforeach
										
                                    </select>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4"><b>+</b> Update Job Education</button>
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
                message: 'Job Education is not valid',
                validators: {
                    notEmpty: {
                        message: 'Job Education is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Job Education must be more than 6 and less than 30 characters long  <br>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]*$/,
                        message: 'Job Education can only consist of alphabetical and spaces'
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
