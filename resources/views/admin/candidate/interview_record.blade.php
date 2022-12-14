@extends('admin.layouts.app')

@section('content')

      <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="mb-0">Past Interview Recording</h5>
                            <hr>
                            <div class="job-content">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Company</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th class="text-center">Interview Recording Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="text-inverse"><u>Java Developer</u></span>
                                                </td>
                                                <td>Netkarma</td>
                                                <td>2022-02-12</td>
                                                <td>12:30 PM</td>
                                                <td class="text-center">
                                                    <a href="javascript:;" class="btn btn-success"><i class="bi bi-hand-index-thumb"></i> Click Here For View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
