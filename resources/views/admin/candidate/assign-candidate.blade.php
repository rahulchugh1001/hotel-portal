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
        
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            
			
			<div class="d-flex">
              
                    <select class="form-select validate[required] w-50 select_spacing" aria-label="Default select example" name="relation" id="relation">
                       <option value="">Select Relation</option>
                       <option value="1">Agency</option>
                       <option value="2">Company</option>
                                                  
                                              
               </select>
               
               
               
               <select class="form-select validate[required] w-50 select_spacing" aria-label="Default select example" name="agency" id="agency">
                                                    <option value="">Select Agency</option>
                                                    @foreach($agencies as $agency)   
                                                   
                                                   <option value="{{$agency->user_id}}">{{$agency->name}}</option>
                                                  
                                               @endforeach
                                                </select>
                                                
                                                
                                                
                                                
                <select class="form-select validate[required] w-50 select_spacing" aria-label="Default select example" name="company" id="company">
                                                    <option value="">Select Company</option>
                                                    @foreach($companies as $company)   
                                                   
                                                   <option value="{{$company->user_id}}">{{$company->name}}</option>
                                                  
                                               @endforeach
                                                </select>
               

                <div class="ms-auto input-group text-end">
                    <div class="btn-group">
                       <!-- <a href=".#" class="btn btn-primary assign_btn">Assign Candidate</a>-->
						<button id="assign_btn" class="btn btn-primary assign_btn" type="button">Assign Candidate</button>
                    </div>
                </div>
            
            </div>
            
			
			
			
			<div class="d-flex align-items-center">
                <!-- <h5 class="mb-0">Candidate List</h5> -->
                <!--<form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>-->
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
                            <th>Gender</th>
                            <th>phone</th>
                            <th>Birthday</th>
                            <!-- <th>Founded</th>
                            <th>Website</th>
                            <th class="text-center">Profile</th>
                            <th class="text-center">Direct Contract</th>
                            <th class="text-center">Status</th> -->
                            <th>Action</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidates as $candidate)
                        <tr>
                            
							 
							 
							 <td>
							 <div class="blank_a">
                                    <input type="checkbox" class="single" name="single" value="{{$candidate->user_id}}">

                                </div>
							</td>
							<td>{{$candidate->first_name}}</td>
                            <td> @if($candidate->gender == 1) {{ 'male' }} @elseif($candidate->gender == 2) {{ 'female' }} @endif</td>
                            <td>{{$candidate->phone}}</td>
                            <td>{{$candidate->birth_date}}</td>
                            <!-- <td>
                               <a href="https://www.netkarma.ca">https://www.netkarma.ca</a>
                            </td>
                            <td class="text-center"><a href="candidate-view.php">View</a></td>
                            <td class="text-center"><input type="checkbox" name=""></td>
                            <td class="text-center"><div class="form-switch table-check">
                                    <input class="form-check-input" type="checkbox" id="" checked="">
                                </div></td> -->
                            <td class="text-center">
                                <!-- <a href="{{route('candidate.edit',['id'=>$candidate->id])}}">View</a> -->

                                <div class="table-actions d-flex align-items-center justify-content-center gap-3 fs-6">
                                    <a href="{{route('candidate.edit',['id'=>$candidate->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" candidate="" data-bs-original-candidate="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="{{route('candidate.edit',['id'=>$candidate->id])}}" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete" data-bs-toggle="tooltip" data-bs-placement="bottom" candidate="" data-bs-original-candidate="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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
                                                <h5 class="modal-candidate">Alert</h5>
                                                <p>Are You Sure Want to Delete this Candidate
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

$(document).ready(function() {

            $("#agency").hide();
            $("#company").hide();
            $(".assign_btn").hide();

});

</script>

<script>

$(document).ready(function() {
     $("#relation").change(function(){

        var selectedopt=$("#relation option:selected").val();

        if(selectedopt==1){
            $("#agency").show();
            $("#company").hide();
            $(".assign_btn").show();



        }else if(selectedopt==2){
            $("#company").show();
            $("#agency").hide();
            $(".assign_btn").show();

        }else if (selectedopt=='') {
            $("#agency").val('');
            $("#company").val('');
        }
    })
});

</script>


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


            var e = document.getElementById("agency");
            var agency = e.options[e.selectedIndex].value;
			
			
			var e = document.getElementById("company");
            var company = e.options[e.selectedIndex].value;
			
			
			// alert(agency);
			// alert(company);
			
			

            var data = [];
            $.each($("input[name='single']:checked"), function() {
                data.push($(this).val());
            });
            //alert("My checked inputs are : " + favorite.join(", "));
            //alert(data);
            data = data.join(",");
            if(!data){
                $('#ajax-success').addClass('error-msg');
                        $('#ajax-success').text('There is no Selected condidate, Please Select a candidate first');
            }
            //ajax
			//alert(data)
            if ((data && agency) || (data && company))  {

                $.ajax({
                    type: "GET",

url: "{{route('bulk.assign.candidate')}}?data=" + data + "&agency_id=" + agency+"&company_id="+company,
                    success: function(data) {
                        $("#ajax-success").empty();
                        $('#ajax-success').addClass('status_select-msg');
                        $('#ajax-success').text('Process Complete , Candidate assigned for selected Agency / Company!');
                    }
                });
            }




        });
    });
</script>
@endsection
