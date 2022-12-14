@extends('admin.layouts.app')

@section('content')

     <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Company List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Company List</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
       
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            
			
			<div class="d-flex">               
               
               
               <select class="form-select validate[required] w-50 select_spacing multiselect" aria-label="Default select example" name="agency[]" id="agency" multiple>
                                                    <option value="">Select Agency</option>
                                                    @foreach($agencies as $agency)   
                                                   
                                                   <option value="{{$agency->user_id}}">{{$agency->name}}</option>
                                                  
                                               @endforeach
                                                </select>
                                                
                                                
                                                
                                                

               

                <div class="ms-auto input-group text-end">
                    <div class="btn-group">
						<button id="assign_btn" class="btn btn-primary assign_btn" type="button">Assign Company</button>
                    </div>
                </div>
            
            </div>
            
			
			
			
            <div class="table-responsive mt-3">
                
				<p id="notice"></p>
                <span id="ajax-success"></span>
				<table class="table align-middle list-table">
                    <thead class="table-secondary">
                        <tr>
                              
							  
							  <th>
							  <div class="blank_a" title="Select All">
                                    <input type="checkbox" id='selectall' name="selectall">

                                </div>
							</th>
							<th>Name</th>
                           
                            <th>City</th>
                            <th>Founded</th>
                            <th>Website</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>
                             <div class="blank_a">
                                    <input type="checkbox" class="single" name="single" value="{{$agency->user_id}}">

                                </div>
                            </td>
                            <td>{{$company->name}}</td>
                            <!-- <td>Softwere</td> -->
                            <td>{{App\Models\City::getName($company->city_id)}}</td>
                            <td>{{$company->founded_date}}</td>
                            <td>
                               <a href="https://www.netkarma.ca">{{$company->website}}</a>
                            </td>
                            <td class="text-center">
                                 
                                 <div class="form-switch table-check">
                                    <input class="form-check-input" type="checkbox" onClick="changeStatus(this)" data-id="{{$company->user_id}}" id="status{{$company->user_id}}" @if($company->getParent->status) checked @endif />
                                     <span class="slide-check round"></span>
                                </div>
                                
                                </td>
                            <!-- <td class="text-center"><input type="checkbox" name=""></td> -->
                            <td class="text-center">
                               <!--  <a href="{{route('company.edit',['id'=>$company->id])}}">View</a> -->

                                <div class="table-actions d-flex align-items-center justify-content-center gap-3 fs-6">
                                    <a href="{{route('company.edit',['id'=>$company->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" agency="" data-bs-original-agency="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="{{route('company.edit',['id'=>$company->id])}}" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" company="" data-bs-original-company="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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
                                                <h5 class="modal-company">Alert</h5>
                                                <p>Are You Sure Want to Delete this Company
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
	


<script>
    $("input[name='selectall']").change(function() {
        

        var checkBoxes = $('.table').find(':checkbox');
        checkBoxes.prop('checked', $(this).is(':checked') ? true : false);

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#assign_btn").click(function(event) {


            event.preventDefault();

			var agency = $("#agency :selected").map((_, e) => e.value).get();	
			
			

            var data = [];
            $.each($("input[name='single']:checked"), function() {
                data.push($(this).val());
            });




            data = data.join(",");

          
            
            if (data && agency)  {

                $.ajax({
                    type: "GET",

url: "{{route('bulk.assign.company')}}?data=" + data + "&agencies="+agency,
                    success: function(data) {
                        $("#ajax-success").empty();
                        $('#ajax-success').addClass('status_select-msg');
                        $('#ajax-success').text('Process Complete , Company assigned for selected Agency!');
                    }
                });
            }else if(!data && agency)
            {
                     $('#ajax-success').addClass('error-msg');
                     $('#ajax-success').text('There is no Selected Company, Please Select a Company first');

            }
            else
            {
                     $('#ajax-success').addClass('error-msg');
                     $('#ajax-success').text('There is no Selected Agency , Please Select a Agency  first');

            }
            




        });
    });
</script>
@endsection
