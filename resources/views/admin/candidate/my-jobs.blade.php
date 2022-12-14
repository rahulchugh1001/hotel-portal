@extends('admin.layouts.app')

@section('content')

       <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="mb-0">My Jobs</h5>
                            <hr>
                            <div class="job-content">
                                <div class="main-tab-nav">
                                    <ul class="nav nav-pills mb-3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link  active" data-bs-toggle="pill" href="#job-offer-tab" role="tab" aria-selected="true">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title"><i class="bi bi-file-earmark-text"></i> Job Offer</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#active-job" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title"><i class="bi bi-check-square"></i> Active</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#history-job" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title"><i class="bi bi-clock"></i> History</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="job-offer-tab" role="tabpanel">
                                        <!-- sub tab -->
                                        <div class="sub-tab">
                                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#job-invites" role="tab" aria-selected="true">
                                                        <div class="d-flex align-items-center">
                                                            <div class="tab-title"><i class="bi bi-person"></i> Job Invites</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#applied-job" role="tab" aria-selected="false">
                                                        <div class="d-flex align-items-center">
                                                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                                            </div>
                                                            <div class="tab-title">Applied</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#interview-job" role="tab" aria-selected="false">
                                                        <div class="d-flex align-items-center">
                                                            <div class="tab-icon"><i class="bx bx-microphone font-18 me-1"></i>
                                                            </div>
                                                            <div class="tab-title">Interview</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#offers-job" role="tab" aria-selected="false">
                                                        <div class="d-flex align-items-center">
                                                            <div class="tab-title"><i class="lni lni-bullhorn"></i> Offers</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content py-3">
                                            <!-- Job Invites -->
                                            <div class="tab-pane fade active show" id="job-invites" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table align-middle">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Job Title</th>
                                                                <th>Position</th>
                                                                <th>Wage</th>
                                                                <th>Time to Apply</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span class="text-inverse"><u>Genral Labour Missisaugga</u> - 10 km away</span>
                                                                    <p class="mb-0">IMC Contractions</p>
                                                                </td>
                                                                <td>Full Time</td>
                                                                <td>$15/hr</td>
                                                                <td>7 Days Left</td>
                                                                <td>
                                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                                        <a href="javascript:;" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View Details" aria-label="View Details"><i class="bi bi-eye-fill"></i> View Details</a>
                                                                        <a href="javascript:;" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#decline" data-bs-placement="bottom" title="" data-bs-original-title="Decline" aria-label="Decline"><i class="bi bi-trash-fill"></i> Decline</a>
                                                                    </div>
                                                                    <!-- Decline Modal -->
                                                                    <div class="modal fade alert-modal" id="decline" tabindex="-1" aria-hidden="true" style="display: none;">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header close-icon">
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="alert-body">
                                                                                    <i class="bi bi-exclamation-circle"></i>
                                                                                    <h5 class="modal-title">Alert</h5>
                                                                                    <p>Are You Sure to Decline this Invitation
                                                                                    </p>
                                                                                    <div class="buttonss">
                                                                                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">No</button>
                                                                                        <button type="button" class="btn btn-danger px-4">Yes</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="text-inverse"><u>Forklift Driver - Torronto</u> - 20 km away</span>
                                                                    <p class="mb-0">IMC Contractions</p>
                                                                </td>
                                                                <td>Part Time</td>
                                                                <td>$20/hr</td>
                                                                <td>5 Days Left</td>
                                                                <td>
                                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                                        <a href="javascript:;" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View Details" aria-label="View Details"><i class="bi bi-eye-fill"></i> View Details</a>
                                                                        <a href="javascript:;" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#decline" data-bs-placement="bottom" title="" data-bs-original-title="Decline" aria-label="Decline"><i class="bi bi-trash-fill"></i> Decline</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Job Applied -->
                                            <div class="tab-pane fade" id="applied-job" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table align-middle">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Job Title</th>
                                                                <th>Position</th>
                                                                <th>Wage</th>
                                                                <th class="text-center">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span class="text-inverse"><u>Genral Labour Missisaugga</u> - 10 km away</span>
                                                                    <p class="mb-0">IMC Contractions</p>
                                                                </td>
                                                                <td>Full Time</td>
                                                                <td>$15/hr</td>
                                                                <td class="text-center"><span class="btn btn-outline-primary px-5 radius-30">In Review</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="text-inverse"><u>Forklift Driver - Torronto</u> - 20 km away</span>
                                                                    <p class="mb-0">IMC Contractions</p>
                                                                </td>
                                                                <td>Part Time</td>
                                                                <td>$20/hr</td>
                                                                <td class="text-center"><span class="btn btn-outline-primary px-5 radius-30">In Review</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Job Interview -->
                                            <div class="tab-pane fade" id="interview-job" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table align-middle">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Job Title</th>
                                                                <th>Company</th>
                                                                <th>Date</th>
                                                                <th>Time</th>
                                                                <th class="text-center">Interview</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span class="text-inverse"><u>Java Developer</u></span>
                                                                </td>
                                                                <td>Netkarma</td>
                                                                <td>2022-02-12</td>
                                                                <td>12:30 PM</td>
                                                                <td class="text-center">
                                                                    <a href="javascript:;" class="btn btn-outline-primary"><i class="bi bi-hand-index-thumb"></i> Click Here For Interview</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Job Offer -->
                                            <div class="tab-pane fade" id="offers-job" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table align-middle">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Job Title</th>
                                                                <th>Position</th>
                                                                <th>Wage</th>
                                                                <th class="text-center width-80">Contract</th>
                                                                <th class="text-center width-80">Upload</th>
                                                                <th class="text-center width-80">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span class="text-inverse"><u>Genral Labour Missisaugga</u> - 10 km away</span>
                                                                    <p class="mb-0">IMC Contractions</p>
                                                                </td>
                                                                <td>Full Time</td>
                                                                <td>$15/hr</td>
                                                                <td class="text-center"><a href="#.">Download</a></td>
                                                                <td class="text-center">
                                                                    <a href="javascript:;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploaddoc" data-bs-placement="bottom" title="" data-bs-original-title="Upload" aria-label="Upload"><i class="bi bi-upload"></i> Upload</a>
                                                                    <!-- Upload DOc Modal -->
                                                                    <div class="modal fade upload-modal text-left" id="uploaddoc" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="uploaddoc">Upload Document List</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form class="row">
                                                                                        <div class="col-12">
                                                                                            <label class="form-label">Genral Contract</label>
                                                                                            <input class="form-control" type="file" id="formFile">
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <label class="form-label">Contract Two</label>
                                                                                            <input class="form-control" type="file" id="formFile">
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <label class="form-label">Genral Three</label>
                                                                                            <input class="form-control" type="file" id="formFile">
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                    <button type="button" class="btn btn-primary">Upload</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center"><a href="javascript:;" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Upload" aria-label="Upload"><i class="bx bx-send"></i> Send</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="text-inverse"><u>Forklift Driver - Torronto</u> - 20 km away</span>
                                                                    <p class="mb-0">IMC Contractions</p>
                                                                </td>
                                                                <td>Part Time</td>
                                                                <td>$20/hr</td>
                                                                <td>5 Days Left</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end tab -->
                                    </div>
                                    <!-- Active Job -->
                                    <div class="tab-pane fade" id="active-job" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table align-middle">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>Job Title</th>
                                                        <th>Position</th>
                                                        <th>Wage</th>
                                                        <th>Timer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="text-inverse"><u>Genral Labour Missisaugga</u> - 10 km away</span>
                                                            <p class="mb-0">IMC Contractions</p>
                                                        </td>
                                                        <td>Full Time</td>
                                                        <td>$15/hr</td>
                                                        <td>1hr 5m</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="text-inverse"><u>Forklift Driver - Torronto</u> - 20 km away</span>
                                                            <p class="mb-0">IMC Contractions</p>
                                                        </td>
                                                        <td>Part Time</td>
                                                        <td>$20/hr</td>
                                                        <td>2hr 5m</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Job History -->
                                    <div class="tab-pane fade" id="history-job" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table align-middle">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>Job Title</th>
                                                        <th>Job Number</th>
                                                        <th>Wage</th>
                                                        <th>Hour</th>
                                                        <th>Rating</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="text-inverse"><u>Genral Labour Missisaugga</u></span>
                                                        </td>
                                                        <td>3490730</td>
                                                        <td>$15/hr</td>
                                                        <td>30 hrs</td>
                                                        <td>
                                                            <ul class="stars">
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="text-inverse"><u>Forklift Driver - Torronto</u></span>
                                                        </td>
                                                        <td>4735623</td>
                                                        <td>$20/hr</td>
                                                        <td>20 hrs</td>
                                                        <td>
                                                            <ul class="stars">
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
