@extends('admin.layouts.app')

@section('content')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit {{$nav}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit {{$nav}}</li>
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
                    <h5 class="mb-0">Post a {{$nav}}</h5>
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <form class="customer_form row g-3"  method="post">
                                @csrf

                              
                                <div class="col-6">
                                    <label class="form-label">Name <span>*</span></label>
                                    <input type="text" class="form-control salary_period"
                                     placeholder="Enter Name" name="name" value="{{$value->name}}">
                                     @error('name')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>
                               
                                <div class="col-6">
                                    <label class="form-label">Phone <span>*</span></label>
                                    <input type="number" class="form-control" value="{{$value->phone}}" placeholder="Enter Phone" name="phone">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Email <span>*</span></label>
                                    <input type="email" class="form-control" value="{{$value->email}}" placeholder="Enter Email" name="email">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                                <div class="col-6">
                                    <label class="form-label">Purpose Visit <span>*</span></label>
                                    <input type="text" class="form-control" value="{{$value->purpose}}" placeholder="Enter Purpose" name="purpose">
                                    @error('purpose')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                              
                               

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4"><b>+</b> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
