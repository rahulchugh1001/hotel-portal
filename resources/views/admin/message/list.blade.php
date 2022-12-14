@extends('admin.layouts.app')

@section('content')

 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Message</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Message</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <!-- filter -->
    <div class="card">
        <div class="card-header py-3">
            <div class="row align-items-center m-0">
                <div class="col-md-3">
                    <select class="form-select">
                        <option>Select Status</option>
                        <option>Fashion</option>
                        <option>Electronics</option>
                        <option>Furniture</option>
                        <option>Sports</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Message for Candicate List</h5>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>S. No</th>
                            <th>Candicate Name</th>
                            <th>Company Name</th>
                            <th>Job</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Send to Candicate</th>
                            <th class="text-center">Status</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>John</td>
                            <td>Netkarma</td>
                            <td>Java Developer</td>
                            <td class="text-center">

                                <a class="btn btn-success" href="#." data-bs-toggle="modal" data-bs-target="#view-message">View</a>

                                <!-- delete Modal -->
                                <div class="modal fade alert-modal" id="view-message" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header close-icon">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="alert-body">
                                                <i class="bi bi-envelope-open"></i>
                                                <h5 class="modal-title mb-1">Message</h5>
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-1"><strong>Job:</strong></p>
                                                    <p class="mb-1">Java Developer</p>
                                                </div>
                                                <p>I Think you are suitable candicate for java Developer Position.</p>
                                                <div class="buttonss">
                                                    <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
             
                            </td>
                            <td class="text-center"><input type="checkbox" name=""></td>
                            <td class="text-center"><span class="badge rounded-pill alert-success">Sent</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection