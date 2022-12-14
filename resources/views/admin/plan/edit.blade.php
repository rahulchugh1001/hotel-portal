@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Plan</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Plan</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('plan.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Plan List</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

 <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card shadow-sm border-0">
                        <form class="customer_form" method="post" action="{{route('plan.update',$plan->id)}}">
                        @csrf
                        <div class="card-body">
                            <h5 class="mb-0">Update Plan</h5>
                            <hr>
                            <div class="card shadow-none border">
                                <div class="card-header">
                                    <h6 class="mb-0">PLAN INFORMATION</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">

                                        @fieldpermission('plan-edit|create_for')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Create For</label>
                                            <select class="form-select mb-3" name="create_for" id="create_for" aria-label="Default select example" disabled>
                                              @foreach(config('constant.create_for') as $key=>$value)
                                              <option value="{{$key}}" @if($plan->create_for==$key) selected @endif>{{$value}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('plan-edit|name')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Plan Name <span>*</span></label>
                                            <input type="text" class="form-control" name="plan_name" id="agency_name" required value="{{$plan->name}}">
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('plan-edit|no_company')
                                        <div class="col-6 form-group no_company">
                                            <label class="form-label">No of Companies</label>
                                            <input type="text" class="form-control" name="no_company" id="no_company" value="{{$plan->no_company}}">
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('plan-edit|no_agency')
                                        <div class="col-6 form-group no_agency">
                                            <label class="form-label">No of Agencies</label>
                                            <input type="text" class="form-control" name="no_agency" id="no_agency" value="{{$plan->no_agency}}">
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('plan-edit|no_candidate')
                                        <div class="col-6 form-group no_candidate">
                                            <label class="form-label">No of Candidates</label>
                                            <input type="number" class="form-control" name="no_candidate" id="no_candidate" value="{{$plan->no_candidate}}">
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('plan-edit|no_post_job')
                                        <div class="col-6 form-group ">
                                            <label class="form-label">No of Job Posts <span>*</span></label>
                                            <input type="text" class="form-control" name="no_post_job" id="no_post_job" required value="{{$plan->no_post_job}}">
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('plan-edit|price')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Price <span>*</span></label>
                                            <input type="number" class="form-control" name="price" id="price" required value="{{ $plan->price }}">
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('plan-edit|plan_cycle')
                                        <div class="col-6 form-group">
                                            <label class="form-label">Plan Payment Cycle<span>*</span></label>

                                            <select class="form-select mb-3" name="plan_cycle" id="plan_cycle" aria-label="Default select example">
                                              @foreach(config('constant.plan_cycle') as $key=>$value)
                                              <option value="{{$key}}" @if($plan->plan_cycle==$key) selected @endif>{{$value}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        @endfieldpermission


                                        @fieldpermission('plan-edit|status')

                                        <div class="col-6 form-group">
                                            <label class="form-label">status <span>*</span></label>

                                            <select class="form-select mb-3" name="status" id="status" aria-label="Default select example">
                                              @foreach(config('constant.status') as $key=>$value)
                                              <option value="{{$key}}" @if($plan->status==$key) selected @endif>{{$value}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        @endfieldpermission


                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4">Update Plan</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>



<script>

$(document).ready(function() {

        var selectedopt=$("#create_for option:selected").val();

        if(selectedopt==1){
            $(".no_company").hide();

        }else if(selectedopt==2){
            $(".no_agency").hide();

        }else if(selectedopt==3){
            $(".no_candidate").hide();
        }
});

</script>   

<!-- <script>

$(document).ready(function() {       



        $("#create_for").change(function(){

        var selectedopt=$("#create_for option:selected").val();

        if(selectedopt==1){
            $(".no_company").hide();
            $(".no_agency").show();
            $(".no_candidate").show();

        }else if(selectedopt==2){
            $(".no_agency").hide();
            $(".no_company").show();
            $(".no_candidate").show();


        }else if(selectedopt==3){
            $(".no_candidate").hide();
            $(".no_company").show();
            $(".no_agency").show();


        }
    });
});

</script>   -->        


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

            create_for: {
                validators: {
                    notEmpty: {
                        message: 'Create For is required and cannot be empty'
                    }
                }
            },
            plan_name: {
                validators: {
                    notEmpty: {
                        message: 'Plan name is required and cannot be empty'
                    },
                    stringLength: {
                        message: 'Plan name must be more than 4 and less than 30 characters long'
                    }
                }
            },
            
            no_post_job: {
                validators: {
                    notEmpty: {
                        message: 'Number of Post Job is required and cannot be empty'
                    }
                }
            },
            price: {
                validators: {
                    notEmpty: {
                        message: 'Price is required and cannot be empty'
                    }
                }
            },
            plan_cycle: {
                validators: {
                    notEmpty: {
                        message: 'Plan cycle is required and cannot be empty'
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
        },
    });
});
</script>


@endsection
