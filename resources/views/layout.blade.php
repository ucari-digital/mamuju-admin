<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard MAMUJUTODAY</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{url('css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{url('css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{url('css/flag-icon.min.css')}}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{url('css/chartist.min.css')}}" />
        <link rel="stylesheet" href="{{url('css/jquery-jvectormap.css')}}" />
        <link rel="stylesheet" href="{{url('css/selectize.bootstrap3.css')}}" />
        <link rel="stylesheet" href="{{url('css/datatables.min.css')}}" />
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{url('css/style.css')}}">
        <link href="{{url('summernote/summernote-lite.css')}}" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

        @yield('header')
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>
    <body>
        @include('sweetalert::alert')
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href="{{url('/'.Auth::User()->role)}}"><img src="{{url('asset/logo.png')}}" alt="logo"></a>
                    <a class="navbar-brand brand-logo-mini" href="{{url('/'.Auth::User()->role)}}"><img src="{{url('asset/logo.png')}}" alt="logo"></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center">
                    <p class="page-name d-none d-lg-block">Hi, {{Auth::User()->name}}</p>
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item d-none d-sm-block profile-img">
                            <a class="nav-link profile-image" href="#">
                                <img src="{{asset(Auth::User()->avatar)}}" alt="{{Auth::User()->avatar}}">
                                <span class="online-status online bg-success"></span>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center ml-auto" type="button" data-toggle="offcanvas">
                    <span class="icon-menu icons"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="row row-offcanvas row-offcanvas-right">
                    <!-- partial:partials/_sidebar.html -->
                    <nav class="sidebar sidebar-offcanvas" id="sidebar">
                        @if(Auth::User()->role == "administrator")
                            @include('sidebar_admin')
                        @else
                            @include('sidebar_writer')
                        @endif
                    </nav>
                    <!-- partial -->
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- row-offcanvas ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        {{-- <script src="{{url('js/jquery.min.js')}}"></script> --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="{{url('js/popper.min.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <script src="{{url('js/jquery.flot.js')}}"></script>
        <script src="{{url('js/jquery.flot.resize.js')}}"></script>
        <script src="{{url('js/curvedLines.js')}}"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{url('js/off-canvas.js')}}"></script>
        <script src="{{url('js/misc.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{url('js/dashboard.js')}}"></script>
        <script src="{{url('js/selectize.min.js')}}"></script>
        <script src="{{url('js/datatables.min.js')}}"></script>
        <script src="{{url('js/file-upload.js')}}"></script>
        <script src="{{url('summernote/summernote-lite.js')}}"></script>
        <script>
            $('.summernote').summernote({height: 300,airMode: false});
        </script>
        @yield('footer')
        <!-- End custom js for this page-->
    </body>
</html>