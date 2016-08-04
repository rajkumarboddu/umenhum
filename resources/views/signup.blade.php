<!DOCTYPE html>
<html>
<head>
    <title>Royal Trove | Register form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
    <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
    <!--Favicon-->
    <link rel="shortcut icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/register.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/sweetalert.css')}}" />
    <script type="text/javascript" src="{{url('js/bootstrap/jquery-2.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/common.js')}}"></script>
</head>
<body>
<div class="wrapper container">
    <div class="content">
        <div id="" class="form_wrapper col-md-6 col-md-offset-3">
            <form id="signup-form" class="register active">
                <h3>Registration</h3>
                <div class="col-md-6">
                    <label>First Name</label>
                    <input type="text" placeholder="First Name" name="first_name" />
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-6">
                    <label>Last Name</label>
                    <input type="text" placeholder="Last Name" name="last_name" />
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-6">
                    <label>Mobile Number</label>
                    <input id="mobile" type="text" value="" placeholder="Mobile" name="mobile"/>
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="text" placeholder="Enter email" name="email" />
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-6">
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password" />
                    <span class="error">This is an error</span>
                </div>

                <div class="col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-3">
                    <label style="color: #6d6868;">
                        <input type="radio" name="gender" placeholder="Confirm Password" value="M" />
                        Male</label>
                </div>
                <div class="col-md-9">
                    <label style="color: #6d6868;">
                        <input type="radio" name="gender" placeholder="Confirm Password" value="F" />
                        Female</label>
                </div><br><br>
                <div class="col-md-6">
                    <label>Date of Birth</label>
                    <input type="text" placeholder="Date of birth Ex: 1993-06-20" name="dob" />
                    <span class="error">This is an error</span>
                </div>

                <div class="col-md-6">
                    <label>Address</label>
                    <input type="text" placeholder="Address" name="address"/>
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-6">
                    <label>Pin code</label>
                    <input type="text" placeholder="Pin code" name="pincode" />
                    <span class="error">This is an error</span>
                </div>

                <div class="col-md-6">
                    <label>IMEI Number</label>
                    <input type="text" placeholder="IMEI Number" name="imei_no" />
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-6">
                    <label>Pan Card</label>
                    <input type="text" placeholder="Pan card Number" name="pan_no" />
                    <span class="error">This is an error</span>
                </div>
                <div class="col-md-6">
                    <label>Referrel Id</label>
                    <input type="text" placeholder="Referral Id" name="referral_code" />
                    <span class="error">This is an error</span>
                </div>
                <div class="bottom">
                    <a href="{{url('/')}}"  style="font-size: 16px;float: left;">Cancel</a>
                    <button type="button" id="sign-submit-btn" class="btn btn-primary pull-right" style="float:right">Submit</button>
                    <div class="clear"></div>
                </div>
                {{csrf_field()}}
            </form>
            <!-- Small modal -->

        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="otp-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content sms-verify-box">
            <h3>SMS Verification</h3>
            <input type="text" class="verify-input" id="otp" placeholder="Enter code" />
            <button type="button" id="verify-otp-btn" class="btn btn-primary text-center center-block">Done</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#sign-submit-btn').click(function(){
            showLoadingPopup();
            $.ajax({
                url: '{{url("signup/sendOtp")}}',
                data: $('#signup-form').serialize(),
                method: 'post'
            }).done(function(response){
                hideLoadingPopup();
                // open otp verfication model
                $('#otp-modal').modal('show');
            }).fail(function(responseObj){
                swal('Oops!',responseObj.responseText,'error');
            });
        });
        $('#verify-otp-btn').click(function(){
            var otp = $('#otp').val();
            if(otp==''){
                return;
            }
            showLoadingPopup();
            $.ajax({
                url: '{{url("signup/verifyOtp")}}',
                data: {mobile:$('#mobile').val(),otp:otp,_token:$('input[name="_token"]').val()},
                method: 'post'
            }).done(function(response){
                swal('Success!',response,'success');
                setTimeout(function(){
                    window.location.href = '{{url("login")}}';
                },1000);
            }).fail(function(responseObj){
                swal('Oops!',responseObj.responseText,'error');
            });
        });
    });
</script>
</body>
</html>