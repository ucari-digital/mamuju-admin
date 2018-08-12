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
        @yield('header')
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href="index.html"><img src="{{url('asset/logo.png')}}" alt="logo"></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo_mini.svg" alt="logo"></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center">
                    <p class="page-name d-none d-lg-block">Hi, {{Auth::User()->name}}</p>
                    <ul class="navbar-nav ml-lg-auto">
                        {{--<li class="nav-item dropdown mail-dropdown">--}}
                        {{--<a class="nav-link count-indicator" id="MailDropdown" href="#" data-toggle="dropdown">--}}
                            {{--<i class="icon-envelope-letter icons"></i>--}}
                            {{--<span class="count bg-danger"></span>--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu navbar-dropdown mail-notification dropdownAnimation" aria-labelledby="MailDropdown">--}}
                            {{--<a class="dropdown-item" href="#">--}}
                                {{--<div class="sender-img">--}}
                                    {{--<img src="images/faces/face6.jpg" alt="">--}}
                                    {{--<span class="badge badge-success">&nbsp;</span>--}}
                                {{--</div>--}}
                                {{--<div class="sender">--}}
                                    {{--<p class="Sende-name">John Doe</p>--}}
                                    {{--<p class="Sender-message">Hey, We have a meeting planned at the end of the day.</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item" href="#">--}}
                                {{--<div class="sender-img">--}}
                                    {{--<img src="images/faces/face2.jpg" alt="">--}}
                                    {{--<span class="badge badge-success">&nbsp;</span>--}}
                                {{--</div>--}}
                                {{--<div class="sender">--}}
                                    {{--<p class="Sende-name">Leanne Jones</p>--}}
                                    {{--<p class="Sender-message">Can we schedule a call this afternoon?</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item" href="#">--}}
                                {{--<div class="sender-img">--}}
                                    {{--<img src="images/faces/face3.jpg" alt="">--}}
                                    {{--<span class="badge badge-primary">&nbsp;</span>--}}
                                {{--</div>--}}
                                {{--<div class="sender">--}}
                                    {{--<p class="Sende-name">Stella</p>--}}
                                    {{--<p class="Sender-message">Great presentation the other day. Keep up the good work!</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item" href="#">--}}
                                {{--<div class="sender-img">--}}
                                    {{--<img src="images/faces/face4.jpg" alt="">--}}
                                    {{--<span class="badge badge-warning">&nbsp;</span>--}}
                                {{--</div>--}}
                                {{--<div class="sender">--}}
                                    {{--<p class="Sende-name">James Brown</p>--}}
                                    {{--<p class="Sender-message">Need the updates of the project at the end of the week.</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="dropdown-item view-all">View all</a>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item dropdown notification-dropdown">--}}
                        {{--<a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">--}}
                            {{--<i class="icon-speech icons"></i>--}}
                            {{--<span class="count"></span>--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu navbar-dropdown preview-list notification-drop-down dropdownAnimation" aria-labelledby="notificationDropdown">--}}
                            {{--<a class="dropdown-item preview-item">--}}
                                {{--<div class="preview-thumbnail">--}}
                                    {{--<div class="preview-icon">--}}
                                        {{--<i class="icon-info mx-0"></i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="preview-item-content">--}}
                                    {{--<p class="preview-subject font-weight-medium">Application Error</p>--}}
                                    {{--<p class="font-weight-light small-text">--}}
                                        {{--Just now--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item preview-item">--}}
                                {{--<div class="preview-thumbnail">--}}
                                    {{--<div class="preview-icon">--}}
                                        {{--<i class="icon-speech mx-0"></i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="preview-item-content">--}}
                                    {{--<p class="preview-subject">Settings</p>--}}
                                    {{--<p class="font-weight-light small-text">--}}
                                        {{--Private message--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item preview-item">--}}
                                {{--<div class="preview-thumbnail">--}}
                                    {{--<div class="preview-icon">--}}
                                        {{--<i class="icon-envelope mx-0"></i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="preview-item-content">--}}
                                    {{--<p class="preview-subject">New user registration</p>--}}
                                    {{--<p class="font-weight-light small-text">--}}
                                        {{--2 days ago--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--</li>--}}
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
        <script src="https://cloud.tinymce.com/dev/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: '#text-editor',
                height: 245,
                theme: 'modern',
                plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
                paste_data_images: true,
                image_advtab: true,
                file_picker_callback: function(callback, value, meta) {
                    console.log(meta);
                    if (meta.filetype == 'image') {
                        $('#upload').trigger('click');
                        $('#upload').on('change', function() {
                            var file = this.files[0];
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                callback(e.target.result, {
                                    alt: ''
                                });
                            };
                            reader.readAsDataURL(file);
                        });
                    }
                },
                templates: [
                    { title: 'Test template 1', content: 'Test 1' },
                    { title: 'Test template 2', content: 'Test 2' }
                ],
                mobile: {
                    theme: 'mobile',
                    plugins: 'autosave autolink lists',
                    toolbar: [ 'undo', 'bold', 'italic', 'underline', 'link', 'unlink', 'image', 'bullist', 'numlist', 'fontsizeselect', 'forecolor'],
                }
            });
        </script>
        @yield('footer')
        <!-- End custom js for this page-->
    </body>
</html>