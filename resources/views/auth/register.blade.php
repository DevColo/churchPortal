<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            .help-block{
                color: red;
            }
        </style>

    </head>

    <body class="authentication-bg d-flex align-items-center">

        <div class="home-btn d-none d-sm-block">
           <!--  <a href="index.html"><i class="fas fa-home h2 text-white"></i></a> -->
        </div>
        
        <div class="account-pages w-100 mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5" style="top:350px !important;">
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
                                <form action="{{route('register')}}" method="post" class="pt-2">{{csrf_field()}}

                                    <div class="form-group mb-3">
                                        <label for="fullname">First Name</label>
                                        <input class="form-control" type="text" id="fullname" placeholder="Enter your first name" name="fname">
                                         @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="fullname">Middle Name</label>
                                        <input class="form-control" type="text" id="fullname" placeholder="optional" name="mname">
                                         @if ($errors->has('mname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mname') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="fullname">Last Name</label>
                                        <input class="form-control" type="text" id="fullname" placeholder="Enter your last name" name="lname">
                                         @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="fullname">Gender</label>
                                        <select class="form-control" name="sex">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                         @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group mb-3">
                                                    <label>Date of Birth</label>
                                                    <div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" data-provide="datepicker" name="DOB">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                    @if ($errors->has('DOB'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DOB') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="fullname">Cell</label>
                                        <input class="form-control" type="number" id="fullname" placeholder="Enter your cell number" name="cell">
                                         
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="fullname">Position</label>
                                        <input class="form-control" type="text" id="fullname" placeholder="Enter your Position" name="post">
                                         @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email" name="email">
                                         @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-3">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Comfirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re-type your password" >
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                        <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                    </div>
                                    
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> Sign Up </button>
                                    </div>

                                </form>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p class="text-muted mb-0">Already have account?  <a href="{{route('login')}}" class="text-dark ml-1"><b>Sign In</b></a></p>
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
        <script src="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>