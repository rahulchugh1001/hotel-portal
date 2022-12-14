@extends('admin.layouts.app')

@section('content')

     <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Post a New Job</h5>
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Job Title <span>*</span></label>
                                    <input type="text" class="form-control" name="job-title" placeholder="Enter Job Title" value="">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Job Type <span>*</span></label>
                                    <select class="form-select">
                                        <option selected="">Select Job Type</option>
                                        <option value="1">IT</option>
                                        <option value="2">Banking</option>
                                        <option value="3">Architecture</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Job Category <span>*</span></label>
                                    <select class="form-select">
                                        <option selected="">Select Job Category</option>
                                        <option value="1">IT</option>
                                        <option value="2">Banking</option>
                                        <option value="3">Architecture</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Job Industry <span>*</span></label>
                                    <select class="form-select">
                                        <option selected="">Select Job Industry</option>
                                        <option value="1">IT</option>
                                        <option value="2">Banking</option>
                                        <option value="3">Architecture</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Position Available <span>*</span></label>
                                    <select class="form-select">
                                        <option selected="">Select Position</option>
                                        <option value="1">IT</option>
                                        <option value="2">Banking</option>
                                        <option value="3">Architecture</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Work Experience <span>*</span></label>
                                    <select class="form-select">
                                        <option>Select Minimum Experience</option>
                                        <option value="1">1 Years</option>
                                        <option value="2" >2 Years</option>
                                        <option value="3">3 Years</option>
                                        <option value="3">4 Years</option>
                                        <option value="3">5 Years</option>
                                        <option value="3">6 Years</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" style="opacity: 0;">Work Experience <span>*</span></label>
                                    <select class="form-select">
                                        <option>Select Maximum Experience</option>
                                        <option value="1">1 Years</option>
                                        <option value="2" >2 Years</option>
                                        <option value="3">3 Years</option>
                                        <option value="3">4 Years</option>
                                        <option value="3">5 Years</option>
                                        <option value="3" >6 Years</option>
                                    </select>
                                </div>

                                <div class="col-6 row" style="margin-top: 1rem; margin-right: 12px;">
                                    <div class="col-3">
                                        <label class="form-label">Salary</label>
                                        <input type="number" class="form-control" placeholder="Min">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" style="opacity:0;">Email <span>*</span></label>
                                        <input type="number" class="form-control" placeholder="Max">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Salary Period <span>*</span></label>
                                    <select class="form-select">
                                        <option>Select Salary Period</option>
                                        <option value="1">Bi-Weekly</option>
                                        <option value="1">Monthly</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Job Description</label>
                                    <textarea class="form-control" rows="4" cols="4" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu."></textarea>
                                </div>
                                
                                <div class="col-6">
                                    <label class="form-label">Gender Requirment <span>*</span></label>
                                    <select class="form-select">
                                        <option selected="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Employement Type <span>*</span></label>
                                    <select class="form-select">
                                        <option selected="">Select Employement</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Education <span>*</span></label>
                                    <select class="form-select">
                                        <option>Select Education</option>
                                        <option value="1">1 Years</option>
                                        <option value="2" >2 Years</option>
                                        <option value="3">3 Years</option>
                                        <option value="3">4 Years</option>
                                        <option value="3">5 Years</option>
                                        <option value="3">6 Years</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Country <span>*</span></label>
                                    <select class="form-select">
                                        <option>Select Country</option>
                                        <option value="1">United States</option>
                                        <option value="2" >United Kingdom</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">State <span>*</span></label>
                                    <select class="form-select">
                                        <option>Select State</option>
                                        <option value="1">United States</option>
                                        <option value="2" >United Kingdom</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">City <span>*</span></label>
                                    <select class="form-select">
                                        <option>Select City</option>
                                        <option value="1">Torronto</option>
                                        <option value="2" >Ontario</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Location <span>*</span></label>
                                    <input type="text" class="form-control" value="ABCDEF">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Expiry Date <span>*</span></label>
                                    <input type="date" class="form-control" name="expiry-date">
                                </div>
                                <div class="col-12 text-start">
                                    <button type="button" class="btn btn-success px-4">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
