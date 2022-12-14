@extends('admin.layouts.app')

@section('content')

   <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Role List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Role List</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="add-candidate.php" class="btn btn-success"><i class="bi bi-person-plus-fill"></i> Add Role</a>
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
                <h5 class="mb-0">Role List</h5>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                        <tr>
                                    
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Permissions</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                    </thead>
                    <tbody>
                        
						 @foreach($roles as $role)

                              
                                <tr>
                                    <td> {{$role->name}} </td>
                                     <td> {{$role->slug}} </td>
                                     <td>
                                         @foreach($role->permissions as $key => $permission)
                                         <span class="badge badge-success">{{$permission->slug}}</span>
                                            
                                         @endforeach

                                     </td>
                                     <td> {{$role->created_at}}  </td>
                                    

                                    <td>
                                        
                                    <a href="javascript::void(0)" class="action-icon" title="Cancle Role"><i class="fas fa-trash"></i></a>  <a href="#" class="action-icon" title="View Role"><i class="fas fa-eye"></i></a><a href="{{route('roles.edit',['role'=>$role->id])}}" class="action-icon" title="edit Role"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                             
                            @endforeach
				
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
