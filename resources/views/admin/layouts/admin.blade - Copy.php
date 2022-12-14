<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pagetitle') -{{ config('constant.name', '') }}</title>

     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- Plugins css -->
        <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/jquery-toast/jquery.toast.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

         <link href="{{asset('assets/libs/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />


         
        @stack('stylesheets')
        <link href="{{asset('assets/css/custom-style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <style type="text/css">
            .input-invalid{
                border-color: #dc3545;
            }
            .error-feedback{
                display: block;
            }
            .card-box-cls{
                padding: 1rem;
            }
            .icon-cls{
                font-size: 20px;
            }

            .vertical-align-middle{
                vertical-align: middle;
            }

            .form-control:disabled, .form-control[readonly]{
                background-color: #eee;
            }
            
        </style> 

</head>
<body>
    

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

        
                    <li class="dropdown notification-list">
                       <!--  <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                        </a> -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="#" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon">
                                        <img src="assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="text-muted">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-secondary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                          <!--   <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle"> -->
                            <span class="pro-user-name ml-1">
                                {{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <div class="dropdown-divider"></div>

                               <a class="dropdown-item notify-item" href="" title="Profile">
                               <i class="fe-user"></i>
                                <span>Profile</span>
                            </a>


                            <div class="dropdown-divider"></div>

                               <a class="dropdown-item notify-item" href="" title="Change Password">
                               <i class="fas fa-key"></i>
                                <span>Change Password</span>
                            </a>

                      

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{route('dashboard')}}" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('images/logo.png')}}" width="50px">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('images/logo.png')}}" width="55px">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
        
                    

                    
                </ul>
            </div>
            <!-- end Topbar -->

            @include('layouts/menu')



            <div class="content-page">
                @if ($message = Session::get('success'))
                
                    @push('custom_script')
                      <script type="text/javascript">
                        $(document).ready(function(){ 
                            var message = '{{$message}}';

                            successNotification(message);
                        });
                   </script>

                    @endpush  
                @endif
                @if ($message = Session::get('error'))
                   @push('custom_script')
                   <script type="text/javascript">
                        $(document).ready(function(){ 
                            var msg = '{{$message}}';
                             $.toast({
                                heading: 'Oh snap!',
                                text: msg,
                                icon: 'error',
                                position:'top-right',
                                loader: true,        // Change it to false to disable loader
                                loaderBg: '#bf441d'  // To change the background
                             });
                        });
                   </script>

                    @endpush  
                   
                @endif
                
                @yield('content')
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                {{date('Y')}} &copy; by <a href="#">admin</a> 
                            </div>
                          
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
      
     <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
     
        @stack('scripts_file')

        <!-- Summernote js -->
        <script src="{{asset('assets/libs/summernote/summernote-bs4.min.js')}}"></script>
        <!-- Select2 js-->
        <script src="{{asset('assets/libs/select2/select2.min.js')}}" defer></script>
        <!-- Dropzone file uploads-->
        <script src="{{asset('assets/libs/dropzone/dropzone.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
         <script src="{{asset('assets/libs/jquery-toast/jquery.toast.min.js')}}"></script>
             <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        @stack('scripts')
       
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script src="{{asset('assets/libs/tippy-js/tippy.all.min.js')}}"></script>
         <script src="{{asset('assets/libs/ladda/spin.js')}}"></script>
        <script src="{{asset('assets/libs/ladda/ladda.js')}}"></script>
       
        <script src="{{asset('assets/js/pages/loading-btn.init.js')}}"></script>
        @stack('custom_script')
        

  
        <script src="{{asset('assets/js/app.min.js')}}"></script>
        
        
    
</body>
</html>


