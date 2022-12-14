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
        <form method="POST" action="{{route('roles.update',['role'=>$role->id])}}">
                @csrf
                @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Role</h5>

                                    {{Session::get('error')}}
                                    <div class="form-group mb-3">
                                        <label for="product-name">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{$role->name}}" class="form-control" >
                                    </div>
                                    <div class="form-group mb-3">
                                   	
                                       	@php $role_permission=$role->permissions->pluck('id')->toArray(); @endphp

                                    	@foreach($permissions as $permission)
                                        	@php 
                                                $allFillableFiled=[]; 
                                                if(!empty($permission->model)){
                                                     $model=new $permission->model;
                                                     $allFillableFileds=$model->getFields();
                                                }
                                                $fields=Helper::getFields($role->id,$permission->id);
                                            @endphp
                                        	
                                    		<div class="checkbox checkbox-success mb-2 ml-2 ">
                                                <input  id="checkbox{{$permission->id}}" type="checkbox" name='permission[]' value="{{$permission->id}}" @if(in_array($permission->id,$role_permission)) checked @endif>
                                                <label for="checkbox{{$permission->id}}">
                                                   {{$permission->slug}}
                                                </label>

                                                <div class="field checkbox checkbox-success mb-2 ml-2 ">
                                                    @if(!empty($allFillableFileds))
                                                        @foreach($allFillableFileds as $FillableFiled)
                                                            <div class="checkbox checkbox-success mb-2 ml-2">
                                                                @if(isset($fields[$permission->id]))
                                                                     <input  id="checkbox-{{$permission->id}}-{{$FillableFiled}}" type="checkbox" name="field[{{$permission->id}}][]" value="{{$FillableFiled}}" @if(in_array($FillableFiled,$fields[$permission->id])) checked @endif>
                                                                        <label for="checkbox-{{$permission->id}}-{{$FillableFiled}}">
                                                                           {{$FillableFiled}}
                                                                        </label>

                                                                @else    
                                                                          <input  id="checkbox-{{$permission->id}}-{{$FillableFiled}}" type="checkbox" name="field[{{$permission->id}}][]" value="{{$FillableFiled}}">
                                                                        <label for="checkbox-{{$permission->id}}-{{$FillableFiled}}">
                                                                           {{$FillableFiled}}
                                                                        </label>
                                                                                                                                        
                                                                
                                                                @endif                                               
                                                           
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                        
                                                </div>

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
                                    
                                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">update</button>
                                 
                                </div>
                            </div> <!-- end col -->
                        </div>
                          </form> 
    </div>
    <!-- container -->
</div>
<!-- content -->

@endsection
