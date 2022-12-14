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
                <a href="{{route('list.create')}}" class="btn btn-success"><b>+</b> Add a Candidate</a>
            </div>
            <div class="btn-group">
                    <button type="button" class="btn btn-success split-bg-primary toggle-filter-custom dropdown-toggle">    <span class="">Hide Columns</span>
                        </button>
                    <div class="dropdown-menu-custom">
                        <ul>
                           
                                <li>
                                   sadfa
                                </li>
                              
                            <li>
                                   <a class="toggle-vis" data-column="">Action</a>
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
                            
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       

                        <tr>
                         
                   
                                           <td></td>
                                  
                           <td class="text-center">
                                
                                <div class="table-actions d-flex align-items-center justify-content-center gap-3 fs-6">
                                    <a href="" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" candidate="" data-bs-original-candidate="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" candidate="" data-bs-original-candidate="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                               
                            </td>
                        </tr>
                        
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
