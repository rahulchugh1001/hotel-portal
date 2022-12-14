@extends('admin.layouts.app')

@section('content')
<style>
    table.dataTable{
        font-size: 12px;
    }
    .action-icon{
        font-size: 14px;
    }
</style>
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
                            
                            <li class="breadcrumb-item active">Permission List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Permission List</h4> </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="row">
                                         
                                            <div class="col-sm-12">
                                                <div class="text-sm-left">
                                                   
                                                    <a href="{{route('permissions.create')}}" class="btn btn-danger waves-effect waves-light" ><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                                    </div> <!-- end card-body-->
                                </div>
                <div class="card">
                    <div class="card-body">
                        
                        <table class="table table-hover m-0 table-centered w-100" id="table-list">
                            <thead>
                                <tr>
                                    
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach($permissions as $permission)
                                <tr>
                                    <td> {{$permission->name}} </td>
                                     <td> {{$permission->slug}} </td>
                                     <td> {{$permission->created_at}}  </td>
                                    <td>
                                        
                                    <a href="javascript::void(0)" class="action-icon" title="Cancle Booking"><i class="fas fa-times"></i></a>  <a href="#" class="action-icon" title="View Booking"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                             
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>
<!-- content -->

@endsection
