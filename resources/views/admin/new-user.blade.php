@extends('layouts.admin-layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="main">

                    <div class="main-inner">

                        <div class="container">

                            <div class="row">

                                <div class="span12">

                                    <div class="widget ">

                                        <div class="widget-header">
                                            <i class="icon-user"></i>
                                            <h3>New User</h3>
                                        </div> <!-- /widget-header -->

                                        <div class="widget-content">

                                            <div class="tabbable">

                                                <div class="tab-content">
                                                    <div id="formcontrols">
                                                        <form id="new-user-form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                                            <fieldset>
                                                                <div class="control-group">
                                                                    <label class="control-label" for="first_name">First Name</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="first_name" required/>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="last_name">Last Name</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="last_name" required/>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="number">Mobile</label>
                                                                    <div class="controls">
                                                                        <input type="number" name="mobile" required/>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="email">Email</label>
                                                                    <div class="controls">
                                                                        <input type="email" name="email" required/>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="password">Password</label>
                                                                    <div class="controls">
                                                                        <input type="password" name="password" required/>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="password_confirmation">Confirm Password</label>
                                                                    <div class="controls">
                                                                        <input type="password" name="password_confirmation" required/>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="gender">Gender</label>
                                                                    <div class="controls">
                                                                        <input type="radio" name="gender" value="M" checked> Male<br>
                                                                        <input type="radio" name="gender" value="F"> Female<br>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="dob">DOB</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="dob" placeholder="DOB Ex:1993-06-20"/>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="address">Address</label>
                                                                    <div class="controls">
                                                                        <textarea cols="10" rows="10" name="address" required></textarea>
                                                                    </div><br/><br/>

                                                                    <label class="control-label" for="pincode">Pincode</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="pincode"/>
                                                                    </div><br/><br/>
                                                                    <label class="control-label" for="imei_number">IMEI Number</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="imei_no" placeholder="15 Characters"/>
                                                                    </div><br/><br/>
                                                                    <label class="control-label" for="pan_card_number">Pan Card Number</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="pan_no" placeholder="10 Characters"/>
                                                                    </div><br/><br/>
                                                                    <label class="control-label" for="referral_id">Referral Id</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="referral_code"/>
                                                                    </div><br/><br/>                                                                                        											<!-- /controls -->
                                                                </div> <!-- /control-group -->
                                                                <div class="form-actions">
                                                                    <input class="btn" type="button" id="create-user-btn" value="Submit" />
                                                                    <button class="btn" id="cancel-btn">Cancel</button>
                                                                </div> <!-- /form-actions -->
                                                            </fieldset>
                                                            {{csrf_field()}}
                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        </div> <!-- /widget-content -->

                                    </div> <!-- /widget -->

                                </div> <!-- /span8 -->

                            </div> <!-- /row -->

                        </div> <!-- /container -->

                    </div> <!-- /main-inner -->

                </div> <!-- /main -->
            </div>
        </div>
    </div>
@endsection

@section('footer_links')
    <script>
        $(document).ready(function(){
            $('#create-user-btn').click(function (e) {
                e.preventDefault();
                showLoadingPopup();
                $.ajax({
                    url: '{{url("admin/createUser")}}',
                    method: 'post',
                    data: $('#new-user-form').serialize()
                }).done(function(response){
                    swal('Success',response,'success');
                    //reloadMe(1000);
                }).fail(function(responseObj){
                    swal('Oops!',responseObj.responseText,'error');
                });
            });

            $('#cancel-btn').click(function(e){
                e.preventDefault();
                $('#new-user-form')[0].reset();
            });
        });
    </script>
@endsection