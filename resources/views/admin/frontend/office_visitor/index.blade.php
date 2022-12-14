@extends('admin.layouts.app')

@section('content')

 <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage {{$nav}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage {{$nav}}</li>                        @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('frontend_office_visitor_create')}}" class="btn btn-success"><b>+</b> Add New</a>
            </div>
        </div>

        
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">{{$nav}} List</h5>
                <!--<form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>-->
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle list-table">
                    <thead class="table-secondary">
                          <tr>

                                  
                                    <th>S.no</th>                                    
                                    <th>Name</th>                                   
                                    <th>Phone</th>                                  
                                    <th>Email</th>                                   
                                    <th>Purpose</th>                                   
									<th>In Time</th>                                  
                                    <th>Action</th>
                                </tr>
                    </thead>
                    <tbody>
                          @foreach($values as $index => $data)

                             <tr>
                                <td>{{$index + 1}}</td>
                                <td title="{{ucwords($data->name)}}">{{ucwords(Str::limit($data->name,15))}}</td>
                                <td title="{{$data->phone}}">{{Str::limit($data->phone,12)}}</td>
                                <td title="{{$data->email}}">{{Str::limit($data->email,20)}}</td>
                                <td title="{{$data->purpose}}">{{Str::limit($data->purpose,25)}}</td>
                                <td>{{date('H:i:s A',strtotime($data->created_at))}}</td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('frontend_office_visitor_view',['id'=>encrypt($data->id)])}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        <a href="{{route('frontend_office_visitor_edit',['id'=>encrypt($data->id)])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:;" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                
                                    <div class="modal fade alert-modal" id="delete" tabindex="-1" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <form method="post" action="{{route('frontend_office_visitor_delete',['id'=>encrypt($data->id)])}}">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header close-icon">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="alert-body">
                                                    <i class="bi bi-exclamation-circle"></i>
                                                    <h5 class="modal-title">Alert</h5>
                                                    <p>Are You Sure to Delete this {{$nav}}
                                                    </p>
                                                    <div class="buttonss">
                                                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-danger px-4">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
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
           url:"{{route('job.status')}}?id="+id+"&status="+status,
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
