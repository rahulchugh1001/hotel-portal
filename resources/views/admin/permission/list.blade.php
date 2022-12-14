@extends('admin.layouts.app')

@section('content')

   <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Permission List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Permission List</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('permissions.create')}}" class="btn btn-success"><b>+</b> Add Permission</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <!-- filter area -->
    <!--<div class="card">
        <div class="card-header py-3">
            <div class="row align-items-center m-0">
                <div class="col-md-2">
                    <select class="form-select">
                        <option>Education</option>
                        <option>Fashion</option>
                        <option>Electronics</option>
                        <option>Furniture</option>
                        <option>Sports</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select">
                        <option>City</option>
                        <option>Fashion</option>
                        <option>Electronics</option>
                        <option>Furniture</option>
                        <option>Sports</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select">
                        <option>Experience</option>
                        <option>Fashion</option>
                        <option>Electronics</option>
                        <option>Furniture</option>
                        <option>Sports</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select">
                        <option>Miscellaneous</option>
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
    </div>-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Permission List</h5>
                <!-- <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form> -->
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle list-table">
                    <thead class="table-secondary">
                        <tr>
                                    
                                    <th>Name</th>
                                    <th>Slug</th>
									<th>Model</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                    </thead>
                    <tbody>
                       @foreach($permissions as $permission)
                                <tr>
                                    <td> {{$permission->name}} </td>
                                     <td> {{$permission->slug}} </td>
									  <td>									  {{\Illuminate\Support\Str::substr($permission->model, 12, 50)}}
									  
									  </td>
                                     <td> {{date('M\ d\, Y', strtotime($permission->created_at))}}  </td>
                                    <td>
                                        
                                        <!-- <a href="javascript::void(0)" class="action-icon text-primary" title="Cancle Booking"><i class="fas fa-times"></i></a>  
                                        <a href="#" class="action-icon" title="View Booking"><i class="fas fa-eye"></i></a> -->

                                        <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    
                                      

                                    <a href="{{route('permissions.edit',['permission'=>$permission->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" permission="" data-bs-original-permission="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

                                    <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" permission="" data-bs-original-permission="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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
                                                <h5 class="modal-permission">Alert</h5>
                                                <p>Are You Sure Want to Delete this Permission
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
                             
                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
