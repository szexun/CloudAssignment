<div class="main-panel" style="width: 100%;">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Guest</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly!
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <video id="video" style="visibility: hidden; width: 0%; height: 0%"></video>

                <div class="card tale-bg" id="weather_status" style="visibility: visible;">
                    <div class="card-people mt-auto">
                        <img src={{ asset('assets/images/dashboard/people.svg') }} alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">Kuala Lumpur</h4>
                                    <h6 class="font-weight-normal">Malaysia</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <a href="{{ route('login') }}" class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Are you a educator?</p>
                                <p class="fs-30 mb-2">Educator Login</p>
                                <p>or sign up</p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('student.login') }}" class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Are you a student?</p>
                                <p class="fs-30 mb-2">Student Login</p>
                                <p>or sign up</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <a href="{{ route('admin.login') }}" class="col-md-6 mb-4  stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Are you a Admin?</p>
                                <p class="fs-30 mb-2">Admin Login</p>
                                <p>or sign up</p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('parent.login') }}" class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-mainGreen">
                            <div class="card-body text-white">
                                <p class="mb-4">Are you a Parent?</p>
                                <p class="fs-30 mb-2">Parent Login</p>
                                <p>or sign up</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        {{-- End Content Wrapper --}}



        {{-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Advanced Table</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Quiz#</th>
                                                <th>Title</th>
                                                <th>Score</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>HAHAHAH</td>
                                                <td>1/10</td>
                                                <td><label class="badge badge-warning">Open</label></td>
                                                <td>-</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                2021.
                Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                    template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &
                made
                with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by
                <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
        </div>
        <!-- <video id="video" style="visibility: hidden; width: 0%; height: 0%"></video> -->
    </footer>
    <!-- partial -->
</div>