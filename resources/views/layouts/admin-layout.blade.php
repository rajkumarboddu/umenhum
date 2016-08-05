<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>@yield('title') | Admin</title>
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/sweetalert.css')}}" />
    <link href="{{url('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
          rel="stylesheet">
    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/pages/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    @yield('header_links')
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index1.php">Royaltrove Admin</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">

                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-user"></i> Admin <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a href="{{url('admin/logout')}}">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</div>
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="active"><a href="{{url('admin/dashboard')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li class="active"><a href="{{url('admin/create-user')}}"><i class="icon-building"></i><span>Create User</span></a></li>
            </ul>
            <!--<li class="active"><a href="contact_table.php"><i class="icon-dashboard"></i><span>Contact</span> </a> </li>-->
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>

@yield('content')

<div class="footer">
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="span12"> &copy; 2016 Royaltrove Responsive Admin Panel </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /footer-inner -->
</div>

<script type="text/javascript" src="{{url('js/bootstrap/jquery-2.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/bootstrap/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/common.js')}}"></script>

@yield('footer_links')

</body>
</html>