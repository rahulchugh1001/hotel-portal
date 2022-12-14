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
                            
                            <li class="breadcrumb-item active">Permission</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Permission</h4> </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->
        <form method="POST" action="{{route('permissions.store')}}">
                @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Permission</h5>

                                    {{Session::get('error')}}
                                    <div class="form-group mb-3">
                                        <label for="product-name">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"value="">
                                    </div>
                                      <div class="form-group mb-3">
                                        <label for="product-name">Models<span class="text-danger">*</span></label>
                                        @php  
                                            $all_models=\Helper::getAvailableModels(); 
                                            $removeModel=\Config::get('constant.model');
                                        @endphp
                                        
                                        <select class="form-control" name="model">
                                            @foreach($all_models as $key=>$model)
                                                @if(!in_array($key,$removeModel))
                                                     <option value="{{$model}}">{{$key}}</option>
                                                 @endif    
                                            @endforeach
                                        </select>
                                                       
                                                            
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
