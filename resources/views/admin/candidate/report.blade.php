@extends('admin.layouts.app')

@section('content')

      <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Reporting</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Reporting</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <!-- filter area -->
    <div class="card">
        <div class="card-header py-3">
            <div class="row align-items-center m-0">
                <div class="col-md-2">
                    <select class="form-select">
                        <option>Company</option>
                        <option>Fashion</option>
                        <option>Electronics</option>
                        <option>Furniture</option>
                        <option>Sports</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select">
                        <option>Agency</option>
                        <option>Fashion</option>
                        <option>Electronics</option>
                        <option>Furniture</option>
                        <option>Sports</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                </div>
            </div>
        </div>
    </div>
   <div class="card-body">
                    <h5 class="mb-0">Reporting </h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Company Name</th>
                                    <th>Candidate Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Hourly Rate</th>
                                    <th>Total Hour</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Company One</td>
                                    <td>John</td>
                                    <td>2021-08-11</td>
                                    <td>2021-08-20</td>
                                    <td>15</td>
                                    <td>50</td>
                                </tr>
                                 <tr>
                                    <td>Company Two</td>
                                    <td>Sam</td>
                                    <td>2021-08-11</td>
                                    <td>2021-08-20</td>
                                    <td>15</td>
                                    <td>50</td>
                                </tr>
                                 <tr>
                                    <td>Company Three</td>
                                    <td>Peter</td>
                                    <td>2021-08-11</td>
                                    <td>2021-08-20</td>
                                    <td>15</td>
                                    <td>50</td>
                                </tr>
                                 <tr>
                                    <td>Company Four</td>
                                    <td>Parker</td>
                                    <td>2021-08-11</td>
                                    <td>2021-08-20</td>
                                    <td>15</td>
                                    <td>50</td>
                                </tr>
                                 <tr>
                                    <td>Company Five</td>
                                    <td>Adam</td>
                                    <td>2021-08-11</td>
                                    <td>2021-08-20</td>
                                    <td>15</td>
                                    <td>50</td>
                                </tr>
                                 <tr>
                                    <td>Company Six</td>
                                    <td>Samer</td>
                                    <td>2021-08-11</td>
                                    <td>2021-08-20</td>
                                    <td>15</td>
                                    <td>50</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection
