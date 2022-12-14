@extends('admin.layouts.app')

@section('content')

 <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Jobs</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Jobs</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="post-new-job.php" class="btn btn-success">Post a New Job</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Job List</h5>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>Job Title</th>
                            <th>Applications</th>
                            <th>Start Date</th>
                            <th>Created Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h6 class="mb-1">Developer Job IT</h6>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <div class="list-item">
                                        <p class="mb-0"><i class="bi bi-geo-alt-fill"></i> Bramton, Canada</p>
                                    </div>
                                    <div class="list-item">
                                        <p class="mb-0"><i class="bi bi-stack"></i> IT</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0">Applied (0)</p>
                                <p class="mb-0">Shortlisted (0)</p>
                                <p class="mb-0">Invite (0)</p>
                            </td>
                            <td>2022-01-28</td>
                            <td>2021-08-28</td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="view-job.php" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="edit-post-new-job.php" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                                <!-- delete Modal -->
                                <div class="modal fade alert-modal" id="delete" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header close-icon">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="alert-body">
                                                <i class="bi bi-exclamation-circle"></i>
                                                <h5 class="modal-title">Alert</h5>
                                                <p>Are You Sure to Delete this Job
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
                                <h6 class="mb-1">Frontend IT Job</h6>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <div class="list-item">
                                        <p class="mb-0"><i class="bi bi-geo-alt-fill"></i> Torronto, Canada</p>
                                    </div>
                                    <div class="list-item">
                                        <p class="mb-0"><i class="bi bi-stack"></i> IT</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0">Applied (0)</p>
                                <p class="mb-0">Shortlisted (0)</p>
                                <p class="mb-0">Invite (0)</p>
                            </td>
                            <td>2022-03-20</td>
                            <td>2021-11-18</td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="view-job.php" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="edit-post-new-job.php" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
