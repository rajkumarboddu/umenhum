<!DOCTYPE html>
<html>
<head>
    <title>Royal Trove | Login form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
    <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
    <!--Favicon-->
    <link rel="shortcut icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/register.css')}}" />
    <script type="text/javascript" src="{{url('js/bootstrap/jquery-2.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap/bootstrap.min.js')}}"></script>
    <style>
        #login-msg{
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="wrapper container">
    <div class="content">
        <div id="" class="form_wrapper col-md-6 col-md-offset-3">
            <form action="{{url('doLogin')}}" class="register active" method="post">
                <h3>Login</h3>
                @if(session('msg'))
                <div id="login-msg" class="col-md-12">
                    {{session('msg')}}
                </div>
                @endif
                <div class="col-md-6">
                    <label>User Name</label>
                    <input type="text" placeholder="Email" name="email" required/>
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-6">
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password" required/>
                    <span class="error">This is an error</span>
                </div>
                <div class="bottom">
                    <a href="{{url('/')}}"  style="font-size: 16px;float: left;">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-primary pull-right" style="float:right">LogIn</button>
                    <div class="clear"></div>
                </div>
                {{csrf_field()}}
            </form>
            <!-- Small modal -->

        </div>
        <div class="clear"></div>
    </div>
</div>


</body>
</html>