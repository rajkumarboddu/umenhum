<!DOCTYPE html>
<html>
<head>
    <title>Royal Trove | Reset Password Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
    <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
    <!--Favicon-->
    <link rel="shortcut icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/register.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/sweetalert.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="{{url('js/bootstrap/jquery-2.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/common.js')}}"></script>
</head>
<body>
<div class="wrapper container">
    <div class="content">
        <div id="" class="form_wrapper col-md-6 col-md-offset-3">
            <form id="reset-pwd-form" class="register active">
                <h3>Reset Password</h3>
                @if(isset($reset_token))
                <div class="col-md-6">
                    <label>New Password</label>
                    <input type="password" placeholder="New Password" name="new_password" />
                </div>
                <div class="col-md-6">
                    <label>Confirm New Password</label>
                    <input type="password" placeholder="Confirm New Password" name="new_password_confirmation" />
                    <input type="hidden" value="{{$reset_token}}" name="reset_token">
                    <br><br>
                </div>
                <div class="bottom">
                    <a href="{{url('/')}}"  style="font-size: 16px;float: left;">Cancel</a>
                    <button type="button" id="submit-btn" class="btn btn-primary pull-right" style="float:right">Submit</button>
                    <div class="clear"></div>
                </div>
                {{csrf_field()}}
                @else
                <div class="col-md-12" style="text-align: center;">
                    <h3 style="color: red;background:none;">{{$invalid_link}}</h3>
                </div>
                @endif
            </form>
            <!-- Small modal -->

        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#submit-btn').click(function(){
            showLoadingPopup();
            $.ajax({
                url: '{{url("resetPassword")}}',
                data: $('#reset-pwd-form').serialize(),
                method: 'post'
            }).done(function(response){
                swal('Success!',response,'success');
                redirectTo('{{url("login")}}',1000);
            }).fail(function(responseObj){
                swal('Oops!',responseObj.responseText,'error');
            });
        });
    });
</script>
</body>
</html>