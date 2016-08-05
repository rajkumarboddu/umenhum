<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - Royaltrove Admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/bootstrap-responsive.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/pages/signin.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="{{url('admin')}}">
                Royaltrove Admin
            </a>

            <div class="nav-collapse">
                <ul class="nav pull-right">


                    <li class="">
                        <a href="{{url('/')}}" class="">
                            <i class="icon-chevron-left"></i>
                            Back to Homepage
                        </a>

                    </li>
                </ul>

            </div><!--/.nav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
<div class="account-container">
    <div class="content clearfix">
        <form action="{{url('admin/doLogin')}}" method="post">
            <h1>Admin Login</h1>
            @if(session('msg'))<h5> {{session('msg')}} </h5>@endif
            <div class="login-fields">
                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
                </div> <!-- /field -->

                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                </div> <!-- /password -->
            </div> <!-- /login-fields -->
            <div class="login-actions">
                {{csrf_field()}}
                <input type="submit" class="button btn btn-success btn-large" value="Sign In" name="submit">
            </div> <!-- .actions -->
        </form>
    </div> <!-- /content -->
</div> <!-- /account-container -->
<script src="{{url('js/jquery-1.7.2.min.js')}}"></script>
<script src="{{url('js/bootstrap.js')}}"></script>

<script src="{{url('js/signin.js')}}"></script>

</body>

</html>