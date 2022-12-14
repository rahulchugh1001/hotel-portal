@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{env('APP_NAME')}}</a><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage User</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('users.create')}}" class="btn btn-success"><b>+</b> Add New User</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">User List</h5>

                <!--<form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>-->
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle list-table">
                    <thead class="table-secondary">
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>

                            <th>Sub User</th>
                            <th>Sub User of</th>
                           
                            
                            <th>Status</th>
							<th>Added Date</th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
						<tr> 
                           
                            <td>
                                <p class="mb-1">{{$user->name}}</p>
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{ App\Models\User::getRoleLabel($user->id) }}
                            </td>
                            <td>
                                {{ $user->parent_id === $user->id ? 'Yes' : 'No' }}                               
                            </td>
                            <td>
                                {{ App\Models\User::getRoleLabel($user->parent_id) }}                              
                            </td>
                           
							   <td class="text-center">
								 
								 <div class="form-switch table-check">
                                    <input class="form-check-input" type="checkbox" onClick="changeStatus(this)" data-id="{{$user->id}}" id="status{{$user->id}}" @if($user->status) checked @endif />
									 <span class="slide-check round"></span>
                                </div>
								
								</td>
								
								
						   
							<td>{{date('M\ d\, Y', strtotime($user->created_at))}}</td>
                            
							<td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="{{route('users.edit',['id'=>$user->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="{{route('users.edit',['id'=>$user->id])}}" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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
                                                <p>Are You Sure Want to Delete this User
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
<script type="text/javascript">
	  function changeStatus(param) {
		
		  var id = $(param).attr('data-id');
		  
		  
		  
		  if($('#status'+id).is(':checked'))
		  {
			  var status=1;
		  }else
		  {
			  var status=0;
		  }
		  
		  //alert(status);
		  
		  if(id){
		
			$.ajax({
           type: "GET",
           url:"{{route('user.status')}}?id="+id+"&status="+status,
           success:function(data){      
				 $("#ajax-success").empty();
            	 $.each(data, function(key, value) {
               
               if(value.success==1){
                             
							 $('#status'+id).addClass('status_qty-msg');
							 $('#status'+id).text(value.msg);
		  						}else
									
									{
							 //$('#msg'+id).removeClass('status_qty-msg');
							 //$('#msg'+id).addClass('status_select-msg-error');
                             //$('#msg'+id).text(value.msg);
									}
                     });
        
           }
        });
	}
			  	
 }
    //});      
</script>

@endsection
