@extends('admin.layouts.app')

@section('content')

      <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Role</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="manage-user.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Manage Role</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Edit Permission</h5>
                     {{Session::get('error')}}
                    <hr>
                    <div class="card shadow-none">
                        <div class="card-body">
                              <form class="customer_form row g-3" method="POST" action="{{route('permissions.update',['permission'=>$permissions->id])}}">
                            @csrf
                            @method('PUT')
                                <div class="col-6 form-group">
                                    <label class="form-label">Name <span>*</span></label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" value="{{$permissions->name}}" required>
                                </div>
                               <div class="form-group col-3">
                                            <label for="product-name">Models<span class="text-danger">*</span></label>
                                        @php  
                                            $all_models=\Helper::getAvailableModels(); 
                                            $removeModel=\Config::get('constant.model');
                                        @endphp
                                        
                                        <select class="form-control" name="model">
                                            <option value="">Select an Option</option>
                                            @foreach($all_models as $key=>$model)
                                                @if(!in_array($key,$removeModel))
                                                     <option value="{{$model}}" @if($model==$permissions->model) selected @endif>{{$key}}</option>
                                                 @endif    
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="col-12 text-start">
                                    <button type="submit" class="btn btn-success px-4">update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<script>


@endsection
