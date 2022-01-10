<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SPLP Portal Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- jvectormap -->
        <link href="{{asset('assets/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />

        <!-- DataTables -->
        <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        
        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .help-block{
            color:#e80d0d !important;
        }
        #sidebar-menu>ul>li>a {
           color: #232323 !important;
        }
        .nav-second-level li a, .nav-thrid-level li a {
           padding: 8px 20px;
           color: #34363a !important;
        }

        .nav-second-level>li {
    border-bottom: 2px solid #f5f6f8 !important;
    border-right: 0 !important;
}
    </style>
    </head>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom" style="background-color: #033805 !important;">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    

        
                    <!-- <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="badge badge-info noti-icon-badge">21</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i> </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a>

                                
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                    <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                </a>

                                
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                                
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-comment-account-outline"></i></div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow that's great</small>
                                    </p>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li> -->

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('images')}}/{{Auth::user()->image}}" alt="" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{Auth::user()->lname}}<i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            
                            <div class="dropdown-item noti-title">
                                <h6 class="m-0">
                                    Welcome !
                                </h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="dripicons-user"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                           <!--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="dripicons-gear"></i>
                                <span>Settings</span>
                            </a> -->

                            <!-- item-->
                          <!--   <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="dripicons-help"></i>
                                <span>Support</span>
                            </a> -->

                            <!-- item-->
                           <!--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="dripicons-lock"></i>
                                <span>Lock Screen</span>
                            </a> -->

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                             <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="dripicons-power"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
    
                        </div>
                    </li>

                </ul>

                <ul class="list-unstyled menu-left mb-0">
                    <li class="float-left">
                        <a href="index.html" class="logo">
                            <span class="logo-lg">
                                 <img src="{{asset('img/logo.jpg') }}" alt="" height="40" class="rounded-circle"> 
                            <!-- <p style="color:#fff;top:20px !important;font-family:cursive;position:relative;">FLOW<p style="color:green !important;"> EMPLOY</p></p> -->
                            </span>
                            <span class="logo-sm">
                                <img src="{{asset('img/logo.jpg') }}" alt="" height="24" class="rounded-circle">
                            </span>
                        </a>
                    </li>
                    <li class="float-left">
                        <a class="button-menu-mobile navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu" style="background: #ffe5007a !important;">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{URL::to('home/')}}">
                                    <i class="dripicons-meter"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);">
                                    <i class=" dripicons-view-list-large"></i>
                                    <span> Manage Departments </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li style="border-top: 2px solid #f5f6f8 !important;">
                                        <a href="{{route('addDept')}}">Add Department</a>
                                    </li>
                                    <li>
                                        <a href="{{route('deptDetails')}}">Department Details</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('updateDept')}}">Update Department</a>
                                    </li>
                                </ul>
                            </li>
                           <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-user-group"></i>
                                    <span> Manage Members </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li style="border-top: 2px solid #f5f6f8 !important;">
                                        <a href="{{route('addMember')}}">Add Members</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('memberDetails')}}">Member Details</a>
                                    </li>
                                   <!--  <li>
                                        <a href="ui-buttons.html">Employee Attendance</a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="{{URL::to('home/employeeRoster')}}">View Member Records</a>
                                    </li> -->
                                    <li>
                                        <a href="{{route('printList')}}">Print Roster</a>
                                    </li>
                                    <!-- <li>
                                        <a href="{{URL::to('home/employeeIDCard')}}">Generate ID Card</a>
                                    </li> -->
                                </ul>
                            </li>
                
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="icon-cursor"></i>
                                    <span> Send Message </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li style="border-top: 2px solid #f5f6f8 !important;">
                                        <a href="{{route('sendMail')}}">Send Mail</a>
                                    </li>
                                    <li>
                                        <a href="{{route('printList')}}">Seme SMS</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title">Finance Module</li>
                   
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-briefcase"></i>
                                    <span> Tithe Payment </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{route('payTithe')}}">Pay Tithe</a>
                                    </li>
                                    <li>
                                        <a href="{{route('updateTithe')}}">Update Tithe</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('titheReport')}}">Tithe Report</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- <li class="menu-title">Admin Module</li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-user"></i>
                                    <span> Manage Admin </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li style="border-top: 2px solid #f5f6f8 !important;">
                                        <a href="ui-buttons.html">Buttons</a>
                                    </li>
                                </ul>
                            </li> -->


                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">@yield('title')</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                         @if(Session::has('msg'))
                                     <div class="alert alert-info">
                                    <a class="close" data-dismiss="alert">×</a>
                                    <strong>Success!</strong> {!!Session::get('msg')!!}
                                     </div>
                                      @endif

                                       @if(Session::has('msgErr'))
                                     <div class="alert alert-danger">
                                    <a class="close" data-dismiss="alert">×</a>
                                    <strong>Oops!</strong> {!!Session::get('msgErr')!!}
                                     </div>

                                     @endif

                        @yield('content')
                        
                    </div> <!-- container -->

                </div> <!-- content -->
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js') }}"></script>

        <!-- KNOB JS -->
        <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- Chart JS -->
        <script src="{{asset('assets/libs/chart-js/Chart.bundle.min.js') }}"></script>

        <!-- Jvector map -->
        <script src="{{asset('assets/libs/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{asset('assets/libs/jqvmap/jquery.vmap.usa.js') }}"></script>
        
        <!-- Datatable js -->
        <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        
        <!-- Dashboard Init JS -->
        <script src="{{asset('assets/js/pages/dashboard.init.js') }}"></script>
        
        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js') }}"></script>
<script src="{{asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    </body>
</html>