@extends('admin.layouts.app')

@section('content')

     <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Candidate Import</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Candidate Import</li>
                    @include('toast')
                </ol>
            </nav>
        </div>
       
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Candidate Import</h5>
                
            </div>
            <div class="table-responsive mt-3">
					<form method="POST" action="" enctype="multipart/form-data" >
           <div class="row">
									
										<div class="col-md-12">
										<label for="image">Upload Candidate (*.csv,xls,xlsx)</label>
										<input type="file" name="upload" class="form-control" 
										required >
									</div>
								
									<div class="col-md-12">
										<div class="action">
											@csrf
											<input type="submit" value="Import Candidate" class="btn btn-success" name="Import Candidate"/> 
											
										</div>
									</div>
								</div>
                   
 
                                </form>
            </div>
        </div>
    </div>
	

@endsection
