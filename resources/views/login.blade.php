<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login MAMUJUTODAY</title>
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
        <style type="text/css">
            @media only screen and (max-width: 600px){
                .form-control{
                    font-size: 16px !important;
                }
            }
        </style>
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">
                                Masuk
                            </h3>
                            <form action="{{url('login')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="masukan email anda">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="masukan password anda">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{url('js/jquery.min.js')}}"></script>
        <script src="{{url('js/popper.min.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
    </body>
</html>