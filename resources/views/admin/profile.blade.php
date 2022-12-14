@extends('admin.layouts.app')

@section('content')

        <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card shadow-sm border-0">
                        <form class="customer_form">
                        <div class="card-body">
                            <h5 class="mb-0">Profile</h5>
                            <hr>
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-6 form-group">
                                            <label class="form-label">Username <span>*</span></label>
                                            <input type="text" class="form-control" name="username" id="username">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label class="form-label">Password <span>*</span></label>
                                            <input type="text" class="form-control" name="password" id="password">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label class="form-label">Confirm Password <span>*</span></label>
                                            <input type="text" class="form-control" name="cnf_password" id="cnf_password">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary px-4">Update</button>
                            </div>
                        </div>
                    </form>
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
            username: {
                message: 'The full name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The full name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The full name can only consist of alphabetical, number and underscore'
                    }
                }
            },
            password: {
                message: 'The Upload File is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Upload File is required and cannot be empty'
                    }
                }
            },
            cnf_password: {
                message: 'The Upload File is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Upload File is required and cannot be empty'
                    }
                }
            },      
        }
    });
});
</script> 
@endsection
