@extends('candidate.layouts.app')

@section('content')

<div class="container">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center">
            <h3 class=" pe-3 text-white">'Graphic Designer' Search Result</h3>
        </div>
        <div class="profile-cover bg-dark"></div>

        <div class="row">
        <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 overflow-hidden">
                    <div class="card-body">
                        <div class="text-start">
                            <h5 class="">All Filters</h5>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            Work From Home
                            <span class="badge bg-secondary rounded-pill"><i class="bi bi-chevron-up"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            Experience
                            <span class="badge bg-secondary rounded-pill"><i class="bi bi-chevron-up"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            Department
                            <span class="badge bg-secondary rounded-pill"><i class="bi bi-chevron-up"></i></span>
                        </li>
                    </ul>

                    <div class="card radius-10">
                  <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Accordion Item #1
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Accordion Item #2
                          </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                          </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <!-- job item start  -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="job-header d-flex justify-content-between">
                            <div class="heading-jobs">
                                <h5 class="mb-0">Graphic Designer,web designer</h5>
                                <p class="mb-0">New Global Technologies </p>
                            </div>
                            <div class="job-actions">
                                <a href="#." class="btn btn-outline-secondary rounded-0 btn-sm">Saved Job</a>
                                <a href="#." class="btn btn-primary rounded-0 btn-sm">Apply Job</a>
                            </div>
                        </div>
                        <hr>
                        <div class="job-body">
                            <div class="d-flex">
                                <p><i class="bi bi-briefcase"></i>
                                    <span class="exp">05 Years</span></p>
                                <p><i class="bi bi-map"></i>
                                    <span class="truncate loc">Chennai, Noida, Mumbai (All Areas)</span></p>
                            </div>
                            <p><i class="bi bi-pen"></i>
                                <span class="truncate skill">Visual Effects,Audio Editing,CSS,MySQL,Javascript,Animation,VFX,PHP,HTML,Web Designing,Graphic Designer candidate from reputed school of arts will be preferred.</span></p>

                            <p><i class="bi bi-file-earmark-text"></i>
                                <span>Candidate should have 0-5 years of experience with excellent knowledge of different ...</span></p>
                        </div>
                        <div class="job-footer d-flex justify-content-between">
                            <div class="left l-align">
                                <i class="bi bi-wallet2"></i> <span>300,000 - 800,000 PA</span></div>
                            <div class="right right-align">
                                <span class="recCont">Posted  just now</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END job item start  -->
                <!-- job item start  -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="job-header d-flex justify-content-between">
                            <div class="heading-jobs">
                                <h5 class="mb-0">Graphic Designer,web designer</h5>
                                <p class="mb-0">New Global Technologies </p>
                            </div>
                            <div class="job-actions">
                                <a href="#." class="btn btn-outline-secondary rounded-0 btn-sm">Saved Job</a>
                                <a href="#." class="btn btn-primary rounded-0 btn-sm">Apply Job</a>
                            </div>
                        </div>
                        <hr>
                        <div class="job-body">
                            <div class="d-flex">
                                <p><i class="bi bi-briefcase"></i>
                                    <span class="exp">05 Years</span></p>
                                <p><i class="bi bi-map"></i>
                                    <span class="truncate loc">Chennai, Noida, Mumbai (All Areas)</span></p>
                            </div>
                            <p><i class="bi bi-pen"></i>
                                <span class="truncate skill">Visual Effects,Audio Editing,CSS,MySQL,Javascript,Animation,VFX,PHP,HTML,Web Designing,Graphic Designer candidate from reputed school of arts will be preferred.</span></p>

                            <p><i class="bi bi-file-earmark-text"></i>
                                <span>Candidate should have 0-5 years of experience with excellent knowledge of different ...</span></p>
                        </div>
                        <div class="job-footer d-flex justify-content-between">
                            <div class="left l-align">
                                <i class="bi bi-wallet2"></i> <span>300,000 - 800,000 PA</span></div>
                            <div class="right right-align">
                                <span class="recCont">Posted  just now</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END job item start  -->
                <!-- job item start  -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="job-header d-flex justify-content-between">
                            <div class="heading-jobs">
                                <h5 class="mb-0">Graphic Designer,web designer</h5>
                                <p class="mb-0">New Global Technologies </p>
                            </div>
                            <div class="job-actions">
                                <a href="#." class="btn btn-outline-secondary rounded-0 btn-sm">Saved Job</a>
                                <a href="#." class="btn btn-primary rounded-0 btn-sm">Apply Job</a>
                            </div>
                        </div>
                        <hr>
                        <div class="job-body">
                            <div class="d-flex">
                                <p><i class="bi bi-briefcase"></i>
                                    <span class="exp">05 Years</span></p>
                                <p><i class="bi bi-map"></i>
                                    <span class="truncate loc">Chennai, Noida, Mumbai (All Areas)</span></p>
                            </div>
                            <p><i class="bi bi-pen"></i>
                                <span class="truncate skill">Visual Effects,Audio Editing,CSS,MySQL,Javascript,Animation,VFX,PHP,HTML,Web Designing,Graphic Designer candidate from reputed school of arts will be preferred.</span></p>

                            <p><i class="bi bi-file-earmark-text"></i>
                                <span>Candidate should have 0-5 years of experience with excellent knowledge of different ...</span></p>
                        </div>
                        <div class="job-footer d-flex justify-content-between">
                            <div class="left l-align">
                                <i class="bi bi-wallet2"></i> <span>300,000 - 800,000 PA</span></div>
                            <div class="right right-align">
                                <span class="recCont">Posted  just now</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END job item start  -->
                <!-- job item start  -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="job-header d-flex justify-content-between">
                            <div class="heading-jobs">
                                <h5 class="mb-0">Graphic Designer,web designer</h5>
                                <p class="mb-0">New Global Technologies </p>
                            </div>
                            <div class="job-actions">
                                <a href="#." class="btn btn-outline-secondary rounded-0 btn-sm">Saved Job</a>
                                <a href="#." class="btn btn-primary rounded-0 btn-sm">Apply Job</a>
                            </div>
                        </div>
                        <hr>
                        <div class="job-body">
                            <div class="d-flex">
                                <p><i class="bi bi-briefcase"></i>
                                    <span class="exp">05 Years</span></p>
                                <p><i class="bi bi-map"></i>
                                    <span class="truncate loc">Chennai, Noida, Mumbai (All Areas)</span></p>
                            </div>
                            <p><i class="bi bi-pen"></i>
                                <span class="truncate skill">Visual Effects,Audio Editing,CSS,MySQL,Javascript,Animation,VFX,PHP,HTML,Web Designing,Graphic Designer candidate from reputed school of arts will be preferred.</span></p>

                            <p><i class="bi bi-file-earmark-text"></i>
                                <span>Candidate should have 0-5 years of experience with excellent knowledge of different ...</span></p>
                        </div>
                        <div class="job-footer d-flex justify-content-between">
                            <div class="left l-align">
                                <i class="bi bi-wallet2"></i> <span>300,000 - 800,000 PA</span></div>
                            <div class="right right-align">
                                <span class="recCont">Posted  just now</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END job item start  -->
                <!-- job item start  -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="job-header d-flex justify-content-between">
                            <div class="heading-jobs">
                                <h5 class="mb-0">Graphic Designer,web designer</h5>
                                <p class="mb-0">New Global Technologies </p>
                            </div>
                            <div class="job-actions">
                                <a href="#." class="btn btn-outline-secondary rounded-0 btn-sm">Saved Job</a>
                                <a href="#." class="btn btn-primary rounded-0 btn-sm">Apply Job</a>
                            </div>
                        </div>
                        <hr>
                        <div class="job-body">
                            <div class="d-flex">
                                <p><i class="bi bi-briefcase"></i>
                                    <span class="exp">05 Years</span></p>
                                <p><i class="bi bi-map"></i>
                                    <span class="truncate loc">Chennai, Noida, Mumbai (All Areas)</span></p>
                            </div>
                            <p><i class="bi bi-pen"></i>
                                <span class="truncate skill">Visual Effects,Audio Editing,CSS,MySQL,Javascript,Animation,VFX,PHP,HTML,Web Designing,Graphic Designer candidate from reputed school of arts will be preferred.</span></p>

                            <p><i class="bi bi-file-earmark-text"></i>
                                <span>Candidate should have 0-5 years of experience with excellent knowledge of different ...</span></p>
                        </div>
                        <div class="job-footer d-flex justify-content-between">
                            <div class="left l-align">
                                <i class="bi bi-wallet2"></i> <span>300,000 - 800,000 PA</span></div>
                            <div class="right right-align">
                                <span class="recCont">Posted  just now</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END job item start  -->
            </div>
            
        </div>




    </div>
@endsection
