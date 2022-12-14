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
                            
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                    <h4 class="page-title">User</h4> </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->
      
                @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                       @role('product-manager1')
                            hello-product
                       @endrole

                        @permission('products-delete')
                            hello-product-delete
                        @endpermission


                        @fieldpermission('products-create|name')
                            hello-product-name
                        @endfieldpermission

                         
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
                          
    </div>
    <!-- container -->
</div>
<!-- content -->

@endsection
