@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">View {{$nav}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View {{$nav}}</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('frontend_office_visitor')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> 
                    Back to Manage {{$nav}}</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

     <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">View {{$nav}}</h5>
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3"  method="post">
                                @csrf

                              
                                <div class="col-6">
                                    <label class="form-label">Name </label>
                                    <input type="text" class="form-control salary_period"
                                     placeholder="Null"value="{{$value->name}}" readonly>
                                     
                                </div>
                               
                                <div class="col-6">
                                    <label class="form-label">Phone </label>
                                    <input type="number" class="form-control" value="{{$value->phone}}" 
                                    readonly placeholder="Null" >
                                   
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Email </label>
                                    <input type="email" class="form-control" value="{{$value->email}}"
                                     readonly placeholder="Null">
                                   
                                </div>
                               
                                <div class="col-6">
                                    <label class="form-label">Purpose Visit </label>
                                    <input type="text" class="form-control" value="{{$value->purpose}}" 
                                    readonly placeholder="Null">
                                    
                                </div>
                              
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
