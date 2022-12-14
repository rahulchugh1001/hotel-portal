@extends('admin.layouts.app')

@section('content')

       <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Time Card</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Time Card</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Time Card List</h5>
                    <hr>
                    <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Week</th>
                                                <th>In-Out</th>
                                                <th>Hours</th>
                                                <th>Daily Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mon 12-6</td>
                                                <td>09:00 AM - 16:30 PM</td>
                                                <td>7:30</td>
                                                <td>7:00</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Tue 12-7</td>
                                                <td>09:00 AM - 16:30 PM</td>
                                                <td>7:30</td>
                                                <td>7:00</td>
                                             
                                            </tr>
                                            <tr>
                                                <td>Wed 12-8</td>
                                                <td>09:00 AM - 16:30 PM</td>
                                                <td>7:30</td>
                                                <td>7:00</td>
                                               
                                            </tr>
                                            <tr>
                                                <td>Thu 12-8</td>
                                                <td>09:00 AM - 16:30 PM</td>
                                                <td>7:30</td>
                                                <td>7:00</td>
                                              
                                            </tr>
                                            <tr>
                                                <td>Fri 12-9</td>
                                                <td>09:00 AM - 16:30 PM</td>
                                                <td>7:30</td>
                                                <td>7:00</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Sat 12-10</td>
                                                <td>09:00 AM - 16:30 PM</td>
                                                <td>7:30</td>
                                                <td>7:00</td>
                                             
                                            </tr>
                                            <tr>
                                                <td>Sun 12-11</td>
                                                <td>09:00 AM - 16:30 PM</td>
                                                <td>7:30</td>
                                                <td>7:00</td>
                                               
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <th>Total Hour</th>
                                                <th>35:00</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
