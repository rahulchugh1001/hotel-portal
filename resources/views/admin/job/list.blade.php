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
                    <li class="breadcrumb-item active" aria-current="page">Manage Jobs</li>                        @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('jobs.create')}}" class="btn btn-success"><b>+</b> Post a New Job</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Job List</h5>
                <!--<form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>-->
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle list-table">
                    <thead class="table-secondary">
                          <tr>

                                    @fieldpermission('job-list|job_title')
                                    <th>Title</th>
                                    @endfieldpermission

                                    <!-- @fieldpermission('job-list|job_designation')
                                    <th>Designation</th>
                                    @endfieldpermission -->

                                    @fieldpermission('job-list|job_type')
                                    <th>Job Type</th>
                                    @endfieldpermission

                                    @fieldpermission('job-list|job_exp')
                                    <th>Job Experience</th>
                                    @endfieldpermission

                                    @fieldpermission('job-list|created_at')
                                    <th>Date Created</th>
                                    @endfieldpermission

                                     @fieldpermission('job-list|status')
									<th>Status</th>
                                    @endfieldpermission
                                    <th>Action</th>
                                </tr>
                    </thead>
                    <tbody>
                          @foreach($jobs as $job)

                              
                                <tr>
                                    @fieldpermission('job-list|job_title')
                                    <td> {{App\Models\JobTitle::getName($job->job_title)}} </td>
                                    @endfieldpermission

                                    <!-- @fieldpermission('job-list|job_designation')
                                     <td> {{$job->job_designation}} </td>
                                     @endfieldpermission -->

                                     @fieldpermission('job-list|job_type')
                                     <td>{{App\Models\JobType::getName($job->job_type)}} </td>
                                     @endfieldpermission

                                     @fieldpermission('job-list|job_exp')
                                     <td> {{App\Models\JobExperience::getName($job->job_exp)}} </td>
                                     @endfieldpermission


                                     @fieldpermission('job-list|created_at')


                                     <td> {{date('M\ d\, Y', strtotime($job->created_at))}}  </td>
                                     @endfieldpermission

                                     @fieldpermission('job-list|status')
                                     <td class="text-center">
								 
								 <div class="form-switch table-check">
                                    <input class="form-check-input" type="checkbox" onClick="changeStatus(this)" data-id="{{$job->id}}" id="status{{$job->id}}" @if($job->status) checked @endif />
									 <span class="slide-check round"></span>
                                </div>
								
								</td>
                                @endfieldpermission


                                    <td>

                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="#" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{route('jobs.edit',['id'=>$job->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
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
