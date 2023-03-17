<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Village Information System</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/css.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/flag-icons-main/css/flag-icons.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/DataTables/datatables.min.css')}}"/>
    
    @yield('css')

    @vite(['resources/js/app.js'])
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-spinner"></i>
                </div>
                <div class="sidebar-brand-text mx-3">VIMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 text-gray-500">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('admin.dashboard') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider text-gray-500">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('admin.family_management') }}
            </div>
 
            <!-- Nav Item - Household -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('families.index', app()->getLocale() ) }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>{{ __('admin.family') }}</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('deaths.index', app()->getLocale() ) }}">
                    <i class="fas fa-fw fa-th-large"></i>
                    <span>{{ __('admin.death_info') }}</span>
                </a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('families.trashed', app()->getLocale() ) }}">
                    <i class="fas fa-fw fa-th-large"></i>
                    <span>Deleted Records</span>
                </a>
            </li> -->

            <hr class="sidebar-divider text-gray-500">
            
            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('admin.household_management') }}
            </div>

            <!-- Nav Item - Household -->

             <!-- Nav Item - Household -->
             <li class="nav-item">
                <a class="nav-link" href="{{ route('households.index', app()->getLocale() ) }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>{{ __('admin.household') }}</span></a>
            </li>

            <hr class="sidebar-divider text-gray-500">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('admin.user_role_management') }}
            </div>

            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index', app()->getLocale() ) }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>{{ __('admin.user') }}</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('roles.index', app()->getLocale() ) }}">
                    <i class="fas fa-fw fa-star"></i>
                    <span>{{ __('admin.role') }}</span></a>
            </li>
        
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block text-gray-500">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
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
                       
                        <!-- Language -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="{{ route(Route::currentRouteName(), 'mm') }}">
                                <span class="fi fi-mm mr-2 d-none d-lg-inline"></span> {{ __('admin.mm') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="{{ route(Route::currentRouteName(), 'en') }}">
                                <span class="fi fi-us mr-2 d-none d-lg-inline"></span> {{ __('admin.eng') }}
                            </a>
                        </li>
                        <!-- End Language -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-gray-600" href="{{ route('login', app()->getLocale() ) }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-gray-600" href="{{ route('register', app()->getLocale() ) }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('admin/img/undraw_profile.svg')}}">
                            </a>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="{{ route('users.show_profile', ['lang'=>app()->getLocale(), Auth::user()->id ]) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Show Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('users.edit_profile', ['lang'=>app()->getLocale(), Auth::user()->id ]) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Edit Profile
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="{{ route('logout', app()->getLocale() ) }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout', app()->getLocale() ) }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>{{ __('admin.copyright') }}</span>
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
    
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/DataTables/datatables.min.js')}}"></script>


    <!-- <script type="text/javascript" src="{{ asset('admin/DataTables/jquery-3.5.1.js')}}"></script> -->
    <!-- <script type="text/javascript" src="{{ asset('admin/DataTables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/DataTables/Buttons-2.3.3/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/DataTables/Buttons-2.3.3/js/buttons.html5.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('admin/DataTables/ajax/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/DataTables/ajax/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/DataTables/ajax/vfs_fonts.js')}}"></script> -->
    
    @yield('scripts')
    
    <!-- Language -->
    
</body>

</html>