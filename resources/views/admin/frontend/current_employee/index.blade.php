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
            
            @role('admin')
            <div class="mt-2">
                <form method="post" action="{{route('salaryDataImport')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file">
                    <button class="btn btn-success">Import</button>
                </form>
            </div>
            @endrole
        </div>
        
    </div>

    <div class="card">
        <div class="card-header py-3">
            <form method="post">
                @csrf
            <div class="row align-items-center m-0">
                <div class="col-md-2">
                    <input type="text" @isset($search['id']) value="{{$search['id']}}" @endisset placeholder="ID" class="form-control" name="id">
                </div>
                <div class="col-md-2">
                    <input type="number" @isset($search['year']) value="{{$search['year']}}" @endisset placeholder="Year" class="form-control" name="year">
                </div>
                <div class="col-md-2">
                    <input type="number" @isset($search['week']) value="{{$search['week']}}" @endisset placeholder="Week" class="form-control" name="week">
                </div>
                <div class="col-md-2">
                    <input type="text" @isset($search['week_of']) value="{{$search['week_of']}}" @endisset placeholder="Week Of" class="form-control" name="week_of">
                </div>
                <div class="col-md-2">
                    <input type="text" @isset($search['name']) value="{{$search['name']}}" @endisset placeholder="Name" class="form-control" name="name">
                </div>
                <div class="col-md-2">
                    <input type="number" @isset($search['phone']) value="{{$search['phone']}}" @endisset placeholder="Phone" class="form-control" name="phone">
                </div>
                <div class="col-md-12 mt-2 text-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                    <a href="{{route('frontend_office_salary')}}"><button type="button" class="btn btn-danger"><i class="fas fa-filter"></i> Reset</button></a>
                </div>
            </div>
        </form>
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
                                    <th>ID</th>   
                                    <th>Year</th>
                                    <th>Week</th>
                                    <th>Week Of</th>                                 
                                    <th>Name</th>                                   
                                    <th>Phone</th>                                                              
                                                                    
                                    <th>Action</th>
                                </tr>
                    </thead>
                    <tbody>
                          @foreach($values as $index => $data)

                             <tr>
                                <td>{{$index + 1}}</td>
                                <td title="{{$data->purpose}}">{{$data->unique_id}}</td>
                                <td>{{$data->week_year}}</td>
                                <td>{{$data->week}}</td>
                                <td>{{$data->week_of}}</td>
                                <td title="{{ucwords($data->name)}}">{{ucwords(Str::limit($data->name,15))}}</td>
                                <td title="{{$data->phone}}">{{Str::limit($data->phone,12)}}</td>
                               
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="#" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:;" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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
