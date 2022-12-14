@extends('admin.layouts.app')

@section('content')

     <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Company List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Company List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Company List</h5>
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
                            <th>Name</th>
                            <th>Industry Type</th>
                            <th>City</th>
                            <th>Founded</th>
                            <th>Website</th>
                            <th class="text-center">Profile</th>
                            <th class="text-center">Direct Contract</th>
                            <th class="text-center">Status</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Netkarma</td>
                            <td>Softwere</td>
                            <td>Brampton</td>
                            <td>2002</td>
                            <td>
                               <a href="https://www.netkarma.ca">https://www.netkarma.ca</a>
                            </td>
                            <td class="text-center"><a href="candidate-view.php">View</a></td>
                            <td class="text-center"><input type="checkbox" name=""></td>
                            <td class="text-center"><div class="form-switch table-check">
                                    <input class="form-check-input" type="checkbox" id="" checked="">
                                </div></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Goldline</td>
                            <td>Softwere</td>
                            <td>Torronto</td>
                            <td>2008</td>
                            <td>
                               <a href="https://www.netkarma.ca">https://www.goldline.ca</a>
                            </td>
                            <td class="text-center"><a href="candidate-view.php">View</a></td>
                            <td class="text-center"><input type="checkbox" name=""></td>
                            <td class="text-center"><div class="form-switch table-check">
                                    <input class="form-check-input" type="checkbox" id="" checked="">
                                </div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
