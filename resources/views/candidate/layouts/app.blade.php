@include('candidate.layouts.header')
<!--start sidebar -->


       <!--end sidebar -->

       <!--start content-->
          <main class="page-content">
		  
@yield('content')
          </main>
       <!--end page main-->

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->
       <script type="text/javascript">
           $(document).ready(function () {
    $('.list-table').DataTable();
});
       </script>
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
@include('candidate.layouts.footer')