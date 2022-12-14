@extends('admin.layouts.app')

@section('content')

 <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Import</h5>
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3" method="post" action="">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Select Candidate/Company <span>*</span></label>
                                    <select name="candidate_company" id="candidate_company" class="form-select">
                                        <option selected="">Select Role Type</option>
                                        <option value="1">Recruiter</option>
                                        <option value="2">Payroll</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Upload File <span>*</span></label>
                                    <input class="form-control" type="file" id="formFile" name="formFile">
                                </div>
                                <div class="col-12 text-start">
                                    <button type="submit" class="btn btn-success"><i class="bi bi-arrow-down-square"></i> Import</button>
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
          candidate_company: {
                validators: {
                    notEmpty: {
                        message: 'This filed is required and cannot be empty'
                    }
                }
            },
           
            formFile: {
                validators: {
                    notEmpty: {
                        message: 'image is required and cannot be empty'
                    }
                    
                }
            }     
      
        }
    });
});
</script> 

@endsection