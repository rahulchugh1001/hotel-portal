@extends('admin.layouts.app')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{env('APP_NAME')}}</a></li>
                            
                            <li class="breadcrumb-item active">Role</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Role</h4> </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->
        <form method="POST" action="{{route('roles.store')}}">
                @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Role</h5>

                                    {{Session::get('error')}}
                                    <div class="form-group mb-3">
                                        <label for="product-name">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"value="">
                                    </div>
                                    <div class="form-group mb-3">
                                            @foreach($permissions as $permission)
                                           <div class="checkbox checkbox-success mb-2 ml-2 float-left ">
                                                <input  id="checkbox{{$permission->id}}" type="checkbox" name='permission[]' value="{{$permission->id}}">
                                                <label for="checkbox{{$permission->id}}">
                                                    {{$permission->name}}
                                                </label>
                                            </div>
                                            @endforeach

                                    </div>

                      
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    
                                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">create</button>
                                 
                                </div>
                            </div> <!-- end col -->
                        </div>
                          </form> 
    </div>
    <!-- container -->
</div>
<!-- content -->

@endsection
