
<div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="#">
                                    <i class="mdi mdi-airplay"></i>
                                  
                                    <span> Dashboards </span>
                                </a>
                              
                            </li>

                        @role('job-manger')
                             <li>
                                <a href="{{route('jobs.index')}}">
                                    <i class="mdi mdi-airplay"></i>
                                  
                                    <span>Jobs List </span>
                                </a>
                              
                             </li>
                        @endrole 

                         @role('admin')
                             <li>
                                <a href="{{route('permissions.index')}}">
                                    <i class="mdi mdi-airplay"></i>
                                  
                                    <span> Permissions List </span>
                                </a>
                              
                            </li>

                             <li>
                                <a href="{{route('roles.index')}}">
                                    <i class="mdi mdi-airplay"></i>
                                  
                                    <span>Role List </span>
                                </a>
                              
                            </li>

                             <li>
                                <a href="{{route('users.index')}}">
                                    <i class="mdi mdi-airplay"></i>
                                  
                                    <span>Users List </span>
                                </a>
                              
                            </li>
                            @endrole
                        
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>