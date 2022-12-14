@extends('candidate.layouts.app')

@section('content')

        <div class="profile-cover bg-dark"></div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="profile-area card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-sm-8">
                                <div class="left-profile d-flex">
                                    <div class="logo-profile">
                                        <div class="box-for-image  main-image">
                                            <div class="form-field-here add-product-image">
                                                <div class="store-logo profile">
                                                    <img class="" src="{{asset('assets/images/upload-image.jpg')}}">
                                                </div>
                                                <input type="file" id="add-pencil-icon" name="upload_file" class="btn-pencil-icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-profile">
                                        <div class="txt-wrapper pr0 white-text">
                                            <div class="row">
                                                <div class="col col-sm-12">
                                                    <div class="hdn mb5"><span class="fullname">Salman</span><i class="bi bi-pencil"></i>
                                                        <div class="subhdn"></div>
                                                    </div>
                                                </div>
                                                <div class="row detail-list mb5">
                                                    <div class="col col-sm-5">
                                                        <div class="detail-item row">
                                                            <div class="col col-sm-12"><i class="bi bi-pin-map"></i><span class="txt" name="Location" title="Faridabad, INDIA">Faridabad, INDIA</span></div>
                                                        </div>
                                                        <div class="detail-item row">
                                                            <div class="col col-sm-12"><i class="bi bi-briefcase"></i><span class="txt" name="Experience" title="Fresher">Fresher</span></div>
                                                        </div>
                                                        <div class="detail-item row">
                                                            <div class="col col-sm-12"><i class="bi bi-calendar"></i><span class="txt notice-label" name="notice period" title="Add availability to join">Add availability to join</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col s7">
                                                        <div class="detail-item row">
                                                            <div class="col col-sm-12 position-relative">
                                                                <div class="w69"><i class="bi bi-telephone"></i><span class="txt" name="Mobile" title="8586091806">8586091806</span></div>
                                                                <span class=" verify-btn btn btn-outline-primary radius-0 btn-sm  right position-absolute top-0 end-0" data-ga-track="spa-event|EditProfile|Verifymobile|EditOpen">Verify</span>
                                                            </div>
                                                        </div>
                                                        <div class="detail-item row">
                                                            <div class="col col-sm-12 position-relative">
                                                                <div class="w69"><i class="bi bi-envelope"></i><span class="txt" name="Email" title="salmansaifi9730@gmail.com">salmansaifi9730@gmail.com</span></div>
                                                                <div class="verified position-absolute top-0 end-0"><span><i class="bi bi-check-circle"></i></span></div>
                                                            </div>
                                                        </div>
                                                        <!-- react-text: 152 -->
                                                        <!-- /react-text -->
                                                    </div>
                                                </div>
                                                <div class="row strength mb0">
                                                    <div class="col col-sm-12"><span class="fs11"><!-- react-text: 156 -->Profile completed (<!-- /react-text --><!-- react-text: 157 -->Average<!-- /react-text --><!-- react-text: 158 -->)<!-- /react-text --></span><span class="right">69%</span>
                                                        <div class="progress">
                                                            <div class="determinate" style="width: 69%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-4">
                                <div class="pending_box">
                                    <div class="pending-actions bg-primary card text-white mb0 cursor">
                                        <div class="hdn mb15">
                                            <h5>4 Pending Action(s)</h5>
                                        </div>
                                        <div class="detail-list">
                                            <ul class="list-group">
                                                <li class="list-group-item bg-primary text-white">Verify Mobile Number</li>
                                                <li class="list-group-item bg-primary text-white">Add Photo</li>
                                                <li class="list-group-item bg-primary text-white">Add Project Summary</li>
                                                <li class="list-group-item bg-primary text-white text-end"><a href="{{route('candidate.profile',Auth::user()->id)}}" class="right text-white ">VIEW ALL</a></li>
                                            </ul>
                                        </div>
                                        <div class="row mb0 text-end">
                                            <div class="col s12 viewall-wrapper">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection