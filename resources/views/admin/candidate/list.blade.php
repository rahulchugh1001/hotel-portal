@extends('admin.layouts.app')

@section('content')

     <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Candidate List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Candidate List</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('candidate.create')}}" class="btn btn-success"><b>+</b> Add a Candidate</a>
            </div>
            <div class="btn-group">
                <a href="{{route('import-candidate')}}" class="btn btn-success"> Import Candidates</a>
            </div>
            <div class="btn-group">
                    <button type="button" class="btn btn-success split-bg-primary toggle-filter-custom dropdown-toggle">    <span class="">Hide Columns</span>
                        </button>
                    <div class="dropdown-menu-custom">
                        <ul>
                           @foreach($candidate_fields as $candidate_key=>$candidate_field) 
                              @fieldpermission('candidate-list|$candidate_field')
                                <li>
                                   <a class="toggle-vis" data-column="{{$candidate_key}}">{{\Str::title(Helper::getLabel($candidate_field))}}</a>
                                </li>
                              @endfieldpermission  
                            @endforeach
                            <li>
                                   <a class="toggle-vis" data-column="{{count($candidate_fields)}}">Action</a>
                                </li>
                            
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Candidate List</h5>
                <!--<form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>-->
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle" id="example">
                    <thead class="table-secondary">
                        <tr>
                           @foreach($candidate_fields as $candidate_key=>$candidate_field) 
                                @fieldpermission('candidate-list|name')
                                    <th>{{\Str::title(Helper::getLabel($candidate_field))}}</th>
                                @endfieldpermission
                            @endforeach    
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidatesData as $candidate_key=> $candidate)

                        <tr>
                         
                            @foreach($candidate as $a_key=>$a_value)
                                @if(in_array($a_key,$candidate_fields))
                                     @fieldpermission('candidate-list|$a_key')
                                           <td>{{Helper::getValue($a_key,$a_value)}}</td>
                                     @endfieldpermission
                                @endif
                              
                            @endforeach
                           <td class="text-center">
                                
                                <div class="table-actions d-flex align-items-center justify-content-center gap-3 fs-6">
                                    <a href="{{route('candidate.edit',['id'=>$candidate->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" candidate="" data-bs-original-candidate="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="{{route('candidate.edit',['id'=>$candidate->id])}}" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" candidate="" data-bs-original-candidate="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            // "scrollY": "200px",
            "paging": false
        });

        $('.toggle-vis').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass("active-data-item");
            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });
    });
</script>

<script>
$(document).ready(function(){
  $(".toggle-filter-custom").click(function(){
    $("body").toggleClass("active-data-filter");
  });
});
</script>
<script>
$(document).ready(function(){
  $(".toggle-filter-grid").click(function(){
    $(".filter-here-content").toggleClass("active-input-filter");
  });
});
</script>
@endsection
