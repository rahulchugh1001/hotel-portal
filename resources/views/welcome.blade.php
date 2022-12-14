<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
  <!-- Bootstrap CSS -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/style.css')}}"rel="stylesheet" />
  <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />

  <title>Sign Up - Page</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start content-->
        <main class="authentication-content welcome">
            <div class="container">
                <div class="authentication-card">
                    <div class="row row-cols-1 row-cols-lg-3 justify-content-center g-lg-5">
                        
                        <div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="card-logo">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title">Company</h5>
                                    </div>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="{{ route('company.login') }}" class="btn btn-success"><i class="bx bx-log-in-circle"></i> Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="card-logo">
                                        <i class="lni lni-users"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title">Agency</h5>
                                    </div>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="{{ route('agency.login') }}" class="btn btn-success"><i class="bx bx-log-in-circle"></i> Login</a>
                                </div>
                            </div>
                        </div>
						
						<div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="card-logo">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title">Job Seeker</h5>
                                    </div>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="{{ route('candidate.login') }}" class="btn btn-success"><i class="bx bx-log-in-circle"></i> Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--end page main-->
    </div>
    <!--end wrapper-->
    <!--plugins-->
  
 
  <!--plugins-->
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/pace.min.js')}}"></script>
</body>

</html>