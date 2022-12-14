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
                    @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('roles.create')}}" class="btn btn-success"><b>+</b> Add Role</a>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Role List</h5>
                
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle list-table">
                    <thead class="table-secondary">
                        <tr>
                                    
                                    <th>Name</th>
                                    <th>Slug</th>
                                   
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                    </thead>
                    <tbody>
                        
						 @foreach($roles as $role)

                              
                                <tr>
                                    <td> {{$role->name}} </td>
                                     <td> {{$role->slug}} </td>
                                     
                                     <td> {{date('M\ d\, Y', strtotime($role->created_at))}}  </td>
                                    

                                   

                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="#" class="action-icon" title="View Role"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('roles.edit',['role'=>$role->id])}}" class="action-icon text-warning" title="edit Role"><i class="bi bi-pencil-fill"></i></a>

                                    <!-- <a href="javascript::void(0)" class="action-icon text-danger" title="Cancle Role"><i class="fas fa-trash"></i></a> -->

                                     <a href="javascript:;" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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
                                                <p>Are You Sure to Delete this role
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
