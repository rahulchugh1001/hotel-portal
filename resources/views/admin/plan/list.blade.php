@extends('admin.layouts.app')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Plan List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Plan List</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('plan.create')}}" class="btn btn-success"><b>+</b> Add Plan</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Plan List</h5>
                <form class="ms-auto position-relative">
                   <!--  <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search"> -->
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle list-table">
                    <thead class="table-secondary">
                        <tr>
                            @fieldpermission('plan-list|name')
                            <th>Name</th>
                            @endfieldpermission

                            @fieldpermission('plan-list|create_for')
                            <th>Create for</th>
                            @endfieldpermission

                            @fieldpermission('plan-list|price')
                            <th>Price</th>
                            @endfieldpermission

                            @fieldpermission('plan-list|plan_cycle')
                            <th>Subscription</th>
                            @endfieldpermission

                            @fieldpermission('plan-list|status')
                            <th class="text-center">Status</th>
                            @endfieldpermission

                            <th class="text-center">Action</th>
                     
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($plans as $plan)

                        <tr>
                            @fieldpermission('plan-list|name')

                            <td>{{$plan->name}}</td>
                            @endfieldpermission

                            @fieldpermission('plan-list|create_for')
                            <td>
                                @foreach(config('constant.create_for') as $key=>$value)

                                @if($key==$plan->create_for) {{$value}}

                                @endif

                                @endforeach


                            </td>
                            @endfieldpermission

                            @fieldpermission('plan-list|price')
                            <td>${{$plan->price}}</td>
                            @endfieldpermission

                            @fieldpermission('plan-list|plan_cycle')

                            <td>
                                @foreach(config('constant.plan_cycle') as $key=>$value)

                                @if($key==$plan->plan_cycle){{$value}}

                                @endif

                                @endforeach
                            </td>
                            @endfieldpermission


                            @fieldpermission('plan-list|status')

                            <td class="text-center">
								 
								 <div class="form-switch table-check">
                                    <input class="form-check-input" type="checkbox" onClick="changeStatus(this)" data-id="{{$plan->id}}" id="status{{$plan->id}}" @if($plan->status) checked @endif />
									 <span class="slide-check round"></span>
                                </div>
								
								</td>
                            @endfieldpermission

                            
                            <td class="text-center">

                                <div class="table-actions d-flex align-items-center justify-content-center gap-3 fs-6">
                                    <a href="{{route('plan.edit',['id'=>$plan->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" agency="" data-bs-original-agency="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" agency="" data-bs-original-agency="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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
                                                <h5 class="modal-agency">Alert</h5>
                                                <p>Are You Sure Want to Delete this Plan
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
           url:"{{route('plan.status')}}?id="+id+"&status="+status,
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
