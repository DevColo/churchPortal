<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Payroll Admin | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="{!! asset('assets/images/logo.png') !!}"> -->

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    
        <style type="text/css">
            .help-block{
            color:#e80d0d !important;
        }
            .btn-success {
                background-color: #327d53;
                border-color: #327d53;
}
.btn-success:hover {
    /*color: #fff;
    background-color: #3765f9 !important;
    border-color: #3765f9 !important;*/
}
        </style>

    </head>

    <body class="authentication-bg d-flex align-items-center">

        <div class="home-btn d-none d-sm-block">
        </div>
        
        <div class="account-pages w-100 mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card" style="box-shadow: 0 3px 13px -2px #bfb7b7 !important">
                        <div class="" style=" text-align: center; background: linear-gradient(179deg, #f4cd5b, #fae6b4bf);border-radius: 5px 5px 60px 60px;">
                                    <a href="">
                                        <span style="position: relative;top: 8px;">
                                        <img src="{!! asset('img/logo.jpg')!!}" alt="" height="65" class="rounded-circle"> 
                                            <p style="top:0px !important;font-family:cursive;position:relative;color:#fff;font-weight: bold;">St. Peter's Lutheran Parish Portal</p>
                                      </span>
                                    </a>
                                </div>
                            <div class="card-body p-4">
                                
                                <form class="pt-2" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-3">
                                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autofocus>
                                         
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password"  id="password" placeholder="Enter your password" name="password" required autofocus>
                                        <a href="pages-recoverpassword.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                                         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember" value="{{ old('remember') ? 'checked' : '' }}">
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p class="text-muted mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
    </body>
</html>