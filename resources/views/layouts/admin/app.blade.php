<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- <title>{{Auth::user()->getRoleNames()[0]}} Dashboard</title> --}}
    <title>
        @isset($page_title)
            {{ $page_title }}
        @else
            {{ Auth::user()->getRoleNames()[0] }} Dashboard
        @endisset
    </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
    {{--    <link --}}
    {{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" --}}
    {{--        rel="stylesheet"> --}}

    @yield('link')
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- DataTables stylesheet-->
    <link href="{{ asset('vendor/DataTables/datatables.min.css') }} " rel="stylesheet">
    <link href="{{ asset('vendor/DataTables/Responsive-2.5.0/css/responsive.dataTables.min.css') }} " rel="stylesheet">
    {{-- uikit --}}
    <link href="{{ asset('vendor/DataTables/uikit/dataTables.uikit.min.css') }} " rel="stylesheet">
    <link href="{{ asset('vendor/DataTables/uikit/uikit.min.css') }} " rel="stylesheet">
    {{-- sweetalert2  --}}
    <link rel="stylesheet" href="vendor/sweetalert2/sweetalert2.min.css">

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        {{--    @yield('sidebar') --}}
        @hasrole('admin')
            <x-admin.sidebar.admin />
        @endhasrole

        @hasrole('vendor')
            <x-admin.sidebar.doctor />
        @endhasrole


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        {{--                    <div class="input-group"> --}}
                        {{--                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." --}}
                        {{--                               aria-label="Search" aria-describedby="basic-addon2"> --}}
                        {{--                        <div class="input-group-append"> --}}
                        {{--                            <button class="btn btn-primary" type="button"> --}}
                        {{--                                <i class="fas fa-search fa-sm"></i> --}}
                        {{--                            </button> --}}
                        {{--                        </div> --}}
                        {{--                    </div> --}}
                        {{--                    <a href="#" class="btn btn-primary">Update Profile</a> --}}
                        {{--                    <div class="col-12"> --}}
                        {{--                        <h4 class="small font-weight-bold">Account Setup <span --}}
                        {{--                                class="float-right">50.43%</span></h4> --}}
                        {{--                        <div class="progress"> --}}
                        {{--                            <div class="progress-bar bg-success" role="progressbar" style="width: 50.43%" --}}
                        {{--                                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div> --}}
                        {{--                        </div> --}}
                        {{--                    </div> --}}
                        {{--                    <a href="#" class="btn btn-primary btn-icon-split"> --}}
                        {{--                        <span class="text">Update Profile</span> --}}
                        {{--                    </a> --}}
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        {{-- <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>

                                @php
                                    $contacts = DB::table('contact_us')->get();
                                @endphp
                                @foreach ($contacts as $contact)

                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{ asset('admin/img/undraw_profile_1.svg') }}"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">{{$contact->first_name}}</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>

                                @endforeach

                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                                    Messages</a>
                            </div>
                        </li> --}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('admin/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item"
                                    href="
                            @hasrole('admin')
                                {{ route('admin.profile') }}
                            @endhasrole

                            @hasrole('vendor')
                                {{ route('doctor.profile') }}
                            @endhasrole
                            ">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Mental Health and Support 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href=""
                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- axios  --}}
    <script src="{{ asset('vendor/axios/axios.min.js') }}"></script>

    <!-- fontawesome -->
    <script src="{{ asset('vendor/fontawesome-free-6.2.1-web/js/all.js') }}" type="text/javascript"></script>
    <!-- Bootstrap core JavaScript-->

    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>


    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{asset('vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js')}}"></script> --}}

    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>

    <!-- DataTable js scripts file -->
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }} "></script>
    <script src="{{ asset('vendor/DataTables/Responsive-2.5.0/js/dataTables.responsive.min.js') }} "></script>
    {{-- uikit --}}
    <script src="{{ asset('vendor/DataTables/uikit/dataTables.uikit.min.js') }} "></script>
    <script src="{{ asset('vendor/DataTables/uikit/jquery.dataTables.min.js') }} "></script>
    {{-- <script src="{{asset('vendor/DataTables/uikit/jquery-3.7.0.js')}} "></script> --}}


    <script src="{{ asset('vendor/sweetaltert2/sweetalert2@11.min.js') }}"></script>

    @yield('scripts')

    <script type="text/javascript">
        // tooltip code
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>
