   <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">Jobs Admin</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
          </div>
          <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
              <a href="{{route('dashboard')}}">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>              
            </li>
            <li>
              <a href="{{route('users.profile')}}">
                <div class="parent-icon"><i class="bi bi-file-person-fill"></i>
                </div>
                <div class="menu-title">Profle</div>
              </a>
              <ul>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Agency Profle</a>
                </li>
              </ul>
            </li>
            
			 
			@role('admin') 
  			 <li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="menu-title">Manage Users</div>
              </a>
              <ul>
                <li>
                      <a href="{{route('users.index')}}"><i class="fa fa-list-ul"></i>Users List</a>
                  </li>
                  <li>
                      <a href="{{route('users.create')}}"><i class="fa fa-plus"></i>Add User</a>
                  </li>
              </ul>
            </li>
			 
			 @endrole
			 
			 
			 
			 
			 @role('agency')
			
			 
			 <li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-building"></i>
                </div>
                <div class="menu-title">Company</div>
              </a>
			  <ul>
                 <li>
                      <a href="{{route('company.index')}}"><i class="fa fa-list-ul"></i>Company List</a>
                  </li>
                  <li>
                      <a href="{{route('company.create')}}"><i class="fa fa-plus"></i>Add Company</a>
                  </li>
                  <li>
                      <a href="{{route('company.assign')}}"><i class="fa fa-exchange-alt"></i>Assign Company</a>
                  </li>
              </ul>
            </li>


            <li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="menu-title">Manage User</div>
              </a>
              <ul>
                <li>
                      <a href="{{route('agency.sub.user.index')}}"><i class="fa fa-list-ul"></i>User List</a>
                  </li>
                  <li>
                      <a href="{{route('agency.sub.user.create')}}"><i class="fa fa-plus"></i>Add User</a>
                  </li>
                  
              </ul>
            </li>
			 
			
			
			 @endrole
			 
			 
			
			
			 
			 			 
			 <li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-person-bounding-box"></i>
                </div>
                <div class="menu-title">Candidate</div>
              </a>
              <ul>
                 <li>
                      <a href="{{route('candidate.index')}}"><i class="fa fa-list-ul"></i>Candidate List</a>
                  </li>
                  <li>
                      <a href="{{route('candidate.create')}}"><i class="fa fa-plus"></i>Add Candidate</a>
                  </li>
				  
				  
				  <li>
                      <a href="{{route('candidate.assign')}}"><i class="fa fa-exchange-alt"></i>Assign Candidate</a>
                  </li>
              </ul>
            </li>
			
			<li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-wallet-fill"></i>
                </div>
                <div class="menu-title">Jobs</div>
              </a>
              <ul>
                 <li>
                      <a href="{{route('jobs.index')}}"><i class="fa fa-list-ul"></i>Jobs List</a>
                  </li>
                  <li>
                      <a href="{{route('jobs.create')}}"><i class="fa fa-plus"></i>Add Job</a>
                  </li>
              </ul>
            </li>

            <li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="menu-title">Manage User</div>
              </a>
              <ul>
                <li>
                      <a href="{{route('company.sub.user.index')}}"><i class="fa fa-list-ul"></i>User List</a>
                  </li>
                  <li>
                      <a href="{{route('company.sub.user.create')}}"><i class="fa fa-plus"></i>Add User</a>
                  </li>
                  
              </ul>
            </li>
			 
             @role('admin')
		
			
			<li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-store-alt"></i>
                </div>
                <div class="menu-title">Job Master</div>
              </a>
              <ul>
                  <li>
                      <a href="{{route('job-title.index')}}"><i class="fas fa-minus"></i>Job Title</a>
                  </li>
				  
				  <li>
                      <a href="{{route('job-type.index')}}"><i class="fas fa-minus"></i>Job Type</a>
                  </li>
				  
				  <li>
                      <a href="{{route('job-category.index')}}"><i class="fas fa-minus"></i>Job Category</a>
                  </li>
				  
				  
				  <li>
                      <a href="{{route('job-position.index')}}"><i class="fas fa-minus"></i>Job Position</a>
                  </li>
				  
				  <li>
                      <a href="{{route('job-industry.index')}}"><i class="fas fa-minus"></i>Job Industry</a>
                  </li>
				  
				  <li>
                      <a href="{{route('job-experience.index')}}"><i class="fas fa-minus"></i>Job Experience</a>
                  </li>

                  <li>
                      <a href="{{route('job-education.index')}}"><i class="fas fa-minus"></i>Job Education</a>
                  </li>
                  <li>
                      <a href="{{route('job-course.index')}}"><i class="fas fa-minus"></i>Job Course</a>
                  </li>
                  <li>
                      <a href="{{route('job-certificate.index')}}"><i class="fas fa-minus"></i>Job Certificate</a>
                  </li>
				  
              </ul>
            </li>
			
			
			
			<li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-users"></i>
                </div>
                <div class="menu-title">Agency</div>
              </a>
              <ul>
                <li>
                      <a href="{{route('agency.index')}}"><i class="fa fa-list-ul"></i>Agency List</a>
                  </li>
                  <li>
                      <a href="{{route('agency.create')}}"><i class="fa fa-plus"></i>Add Agency</a>
                  </li>
                  <li>
                      <a href="{{route('agency.assign')}}"><i class="fa fa-exchange-alt"></i>Assign Agency</a>
                  </li>
              </ul>
            </li>

            <li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-users"></i>
                </div>
                <div class="menu-title">Frontend</div>
              </a>
              <ul>
                <li>
                  <a href="{{route('frontend_office_salary')}}"><i class="fa fa-list-ul"></i>Current Employee</a>
                 </li>
                <li>
                      <a href="{{route('frontend_office_visitor')}}"><i class="fa fa-list-ul"></i>Official Visitors</a>
                 </li>
                 
              </ul>
            </li>
            
             

            <li>
              <a href="{{route('message.index')}}">
                <div class="parent-icon"><i class="bi bi-envelope-fill"></i>
                </div>
                <div class="menu-title">Company Job Message</div>
              </a>
            </li>

            <li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-box"></i>
                </div>
                <div class="menu-title">Plan</div>
              </a>
        <ul>
                 <li>
                      <a href="{{route('plan.index')}}"><i class="fa fa-list-ul"></i>Plan List</a>
                  </li>
                  <li>
                      <a href="{{route('plan.create')}}"><i class="fa fa-plus"></i>Add Plan</a>
                  </li>
              </ul>
            </li>

             <li>
              <a href="{{route('callcenter.index')}}">
                <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                </div>
                <div class="menu-title">Call Center</div>
              </a>
            </li>
            <li>
              <a href="{{route('interview.index')}}">
                <div class="parent-icon"><i class="bi bi-file-person-fill"></i>
                </div>
                <div class="menu-title">Interview</div>
              </a>
            </li>
            <li>
              <a href="{{route('report.index')}}">
                <div class="parent-icon"><i class="bi bi-bar-chart-line-fill"></i>
                </div>
                <div class="menu-title">Report</div>
              </a>
            </li>
            <li>
              <a href="{{route('payroll.index')}}">
                <div class="parent-icon"><i class="fas fa-money-check-alt"></i></i>
                </div>
                <div class="menu-title">Payroll</div>
              </a>
            </li>
			
			<li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="fa fa-shield-alt"></i>
                </div>
                <div class="menu-title">Permissions</div>
              </a>
              <ul>
                 <li>
                      <a href="{{route('permissions.index')}}"><i class="fa fa-list-ul"></i>Permissions List</a>
                  </li>
                  <li>
                      <a href="{{route('permissions.create')}}"><i class="fa fa-plus"></i>Add Permission</a>
                  </li>
              </ul>
            </li>
			<li>
              <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-user-shield"></i></i>
                </div>
                <div class="menu-title">Role</div>
              </a>
              <ul>
                 <li>
                      <a href="{{route('roles.index')}}"><i class="fa fa-list-ul"></i>Role List</a>
                  </li>
                  <li>
                      <a href="{{route('roles.create')}}"><i class="fa fa-plus"></i>Add Role</a>
                  </li>
              </ul>
            </li>
			
			
            
			@endrole
			<li>
			
              <a href="{{ route('logout') }}">
                <div class="parent-icon"><i class="bi bi-lock-fill"></i>
                </div>
                <div class="menu-title">Logout</div>
              </a>
            </li>

            <!-- <li class="menu-label">UI Elements</li> -->
           
          </ul>
          <!--end navigation-->
       </aside>