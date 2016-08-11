<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <title>Royal Trove</title>

    <!--SEO Meta Tags-->
    <meta name="description" content="ZurApp - Multiconcept App Showcase Theme" />
    <meta name="keywords" content="multipurpose, multiconcept, app showcase, mobile, blog, portfolio, specialty pages, landing, elements, shortcodes, html5, css3, jquery, js, modernizr, gallery, slider, touch, creative" />
    <meta name="author" content="8Guild" />
    <!--Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!--Favicon-->
    <link rel="shortcut icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <!-- Pixeden Stroke Icons -->
    <link href="{{url('css/vendor/pixeden.css')}}" rel="stylesheet" media="screen">
    <!-- All Theme Styles including Bootstrap, FontAwesome, etc. compiled from styles.scss-->
    <link href="{{url('css/styles.css')}}" rel="stylesheet" media="screen">
    <!-- Style Switcher -->
    <link href="{{url('style-switcher/style-switcher.css')}}" rel="stylesheet" media="screen">
    <!--animation css file-->
    <link rel="stylesheet" type="text/css" href="{{url('css/vendor/animate.css')}}">
    <!--treeview-->
    {{--<link rel="stylesheet" href="css/vendor/jquery.jOrgChart.css"/>--}}
    <link rel="stylesheet" href="{{url('css/vendor/custom.css')}}"/>
    <link rel="stylesheet" href="{{url('css/vendor/jquery.orgchart.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <!--Modernizr / Detectizr-->
    <script src="{{url('js/vendor/modernizr.custom.js')}}"></script>
    <script src="{{url('js/vendor/detectizr.min.js')}}"></script>
    <style>
        .orgchart .node .title {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            height: 30px;
            line-height: 30px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #fff;
            border-radius:0px;
        }
        .orgchart .inactive .title{
            background-color: #e74c3c;
        }
        .orgchart .active .title{
            background-color: #2ecc71;
        }
        .orgchart .title .fa{
            display: none;
        }
        .orgchart{
            width: 100%;
            background: none;
        }
        .orgchart .node{
            min-width: 200px;
            cursor: pointer;
        }
        #greeting-text{
            color: white;
            font-weight: bold;
        }
        #referral-div{
            display: inline-block;
            background: white;
            color: red;
            padding: 10px;
            margin-right: 80px;
            margin-left: 50px;
        }
        .children-count{
            display: inline-block;
            position: absolute;
            right: 8px;
            background: white;
            color: black;
            padding: 3px 5px 3px 7px;
            height: 20px;
            line-height: 1;
            margin-top: 5px;
            font-size: small;
            border-radius: 50%;
        }
    </style>
</head>

<!-- Body -->
<!-- "is-preloader preloading" is a helper classes if preloader is enabled. -->
<body class="is-preloader preloading">



<!-- Preloader -->
<!--
    Data API:
    data-spinner - Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7'
    data-screenbg - Screen background color. Hex, RGB or RGBA colors
 -->
<div id="preloader" data-spinner="spinner7" data-screenbg="#fff"></div>

<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Navbar -->
    <!-- Add class ".navbar-sticky" to make navbar stuck when it hits the top of the page. You can also use modifier class like: "navbar-light" to change navbar apperance. The screen width at which navbar collapses can be controlled through the variable "$nav-collapse" in sass/variables.scss -->
    <header class="navbar navbar-light navbar-sticky">
        <div class="container">
            <a href="{{url('/')}}" class="site-logo">
                <img src="{{url('img/logo-default.png')}}" class="logo-default img-responsive" alt="ZurApp">
                <img src="{{url('img/logo-alt.png')}}" class="logo-alt" alt="ZurApp">
            </a><!-- .site-logo -->

            <!-- Mobile Menu Toggle -->
            <div class="nav-toggle"><span></span></div>

            <div class="clearfix">



                <!-- Use modifier class to apply different submenu (dropdown) animations. Possible options: .submenu-slideUp, .submenu-slideDown, .submenu-flipIn. Please note if no class added to .main-navigation default fadeIn animation will be applied. Note: this is applicable only for Desktop. -->
                <nav class="main-navigation submenu-flipIn">
                    <ul class="menu">
                        <li><a href="#home" class="scroll-to" data-offset-top="-40">Home</a></li>
                        <li><a href="#treeview" class="scroll-to" data-offset-top="-40">Treeview</a></li>
                        <li><a href="#about" class="scroll-to" data-offset-top="-40">About us</a></li>
                        <li><a href="#contact" class="scroll-to" data-offset-top="-40">Contact us</a></li>
                    </ul>
                </nav><!-- .main-navigation -->
            </div><!-- .clearfix -->
        </div><!-- .container -->
    </header><!-- .navbar -->

    <!-- Device Slider -->
    <section class="device-slider" id="home">
        <span class="angle"></span>
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <!-- Phone Carousel -->
                    <!-- Data API:
                      data-loop="true/false" enable/disable looping
                      data-autoplay="true/false" enable/disable carousel autoplay
                      data-interval="3000" autoplay interval timeout in miliseconds
                     -->
                    <div class="phone-carousel" data-loop="true" data-autoplay="true" data-interval="4000">
                        <img src="{{url('img/device-slider/phone.png')}}" class="phone-mask wow slideInLeft" alt="Phone" data-wow-delay="1.0s">
                        <!-- Fallback Cover Screen -->
                        <div class="cover wow slideInLeft" data-wow-delay="1.0s">
                            <img src="{{url('img/device-slider/screen01.png')}}" alt="Screen 1">
                        </div>
                        <div class="carousel wow slideInLeft" data-wow-delay="1.0s">
                            <div class="inner">
                                <img src="{{url('img/device-slider/screen001.png')}}" alt="Screen 1">
                                <img src="{{url('img/device-slider/screen002.png')}}" alt="Screen 2">
                                <img src="{{url('img/device-slider/screen003.png')}}" alt="Screen 3">
                                <img src="{{url('img/device-slider/screen004.png')}}" alt="Screen 4">
                            </div>
                        </div>
                    </div><!-- .phone-carousel -->
                </div>
                <div class="col-sm-7 padding-top mobile-center">
                    <div class="toolbar">
                        <!-- <a href="registration.php" class="btn btn-sm btn-ghost btn-default scroll-to" data-offset-top="-40">Registration</a> -->
                        <span id="greeting-text">Hi {{str_limit(Auth::user()->first_name,12)}}!</span> &emsp; <span id="referral-div">Referral ID: {{Auth::user()->referral_code}}</span>
                        <a href="{{url('logout')}}" class="btn btn-sm btn-ghost btn-default scroll-to" data-offset-top="-40">LogOut</a>
                    </div>
                    <!-- .toolbar -->
                    <div class="block-title light-skin">
                        <h1>DASHBOARD</h1>
                    </div>
                    <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor similique a ratione eveniet quas, sunt asperiores, quam ad voluptas distinctio, aliquid culpa consectetur! Quisquam, incidunt culpa corporis fuga aperiam quos.</p>
                    <!-- App Store Button -->

                    <!-- Google Play Button -->
                    <a href="#" class="btn btn-google-play">
                        <img src="{{url('img/google-play.png')}}" alt="Google Play">
                        <span>Get it on</span>
                    </a>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .device-slider -->
    <section id="treeview" class="treeview-sec">
        <div class="container">
            <div class="block-title featured-title">
                <h2>Treeview</h2>
            </div>
            {{--<button id="tree-back-btn" class="btn btn-primary btn-sm hide">Back</button>--}}
            <div id="chart-container"></div>
        </div>
    </section>
    <!-- Introduction -->
    <section class="container padding-top-3x padding-bottom-3x" id="about">
        <hr>
        <div class="space-bottom-3x visible-lg"></div>
        <div class="space-bottom-2x hidden-lg"></div>

        <div class="row padding-top">
            <div class="col-md-5 col-md-push-7">
                <!-- Block Title -->
                <!-- Use modifier classes: ".featured-title" - to enable fancy animation on hover; ".text-center" and "text-right" - for title alignment. Apply ".light-skin" class for changing appearance. -->
                <div class="block-title featured-title">
                    <h2>About</h2>
                    <span style="font-size:45px;margin-bottom:5px;line-height: 70px;">Royal Trove</span>
                </div><!-- .block-title.featured-title -->
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </div><!-- .col-md-5.col-md-push-7 -->

            <div class="col-md-7 col-md-pull-5">
                <img src="{{url('img/home/screen02.jpg')}}" class="block-center wow rollIn" alt="Screen 2" data-wow-delay="0.9s">
            </div><!-- .col-md-7.col-md-pull-5 -->
        </div><!-- .row -->
        <div class="row" style="margin-top:30px">
            <div class="col-md-4">
                <div class="about-box" style="padding: 43px 20px;margin-bottom:15px">
                    <h3>Our Mission</h3>
                    <p>To provide innovative and effective integrated brand marketing and public relations solutions which helps our clients grow their business and release their marketing goals.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-box" style="padding: 43px 20px;margin-bottom:15px">
                    <h3>Our Vision</h3>
                    <p>Delivering results-oriented brand marketing programs and public relations campaigns that enhance our clients' awareness, improve their sales and foster their growth.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-box">
                    <h3>Meet The Team</h3>
                    <p>We are a bold, purpose-driven group who want to make a dent in the world by helping you to make yours. We believe that the intersection of passion and profession is real, it is attainable, and that we can help you discover it.</p>
                </div>
            </div>
        </div>
    </section><!-- .container -->
    <div class="space-top visible-lg"></div>

    <hr id="work" style="margin-top: 0;
    margin-bottom: 15px;
    border: 0;
    border-top: 1px solid #ececec;">
    <br>
    <br>

    <!-- Clients -->
    <!-- Apply ".parallax-bg" class to make background image fixed on scroll. Add/remove ".overlay" to darken/lighten the background. Overlay color can be changed in variable.scss -> $fw-section-overlay-color -->
    <section class="fw-section parallax-bg padding-top-3x padding-bottom-3x" style="background-image: url(img/home/clients-bg.jpg);" id="contact">
        <span class="overlay" style="opacity: .77;"></span>
        <div class="container padding-top text-center">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h3>Drop us a line</h3>
                    <form method="post" class="ajax-form space-top" action="send_mail.php"  enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cont_form_name" class="sr-only">Name</label>
                                    <input type="text" class="form-control input-alt" name="name" id="cont_form_name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cont_form_email" class="sr-only">Email</label>
                                    <input type="email" class="form-control input-alt" name="email" id="cont_form_email" placeholder="Email" required pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cont_form_name" class="sr-only">Phone number</label>
                                    <input type="text" class="form-control input-alt" name="phone" id="cont_form_name" placeholder="phone number" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cont_form_email" class="sr-only">Subject</label>
                                    <input type="text" class="form-control input-alt" name="subject" id="cont_form_email" placeholder="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cont_form_message" class="sr-only">Message</label>
                            <textarea name="message" id="cont_form_message" class="form-control input-alt" rows="7" placeholder="Enter your message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-alt btn-default">Send Message</button>
                        </div>
                        <!-- Validation Response -->
                        <div class="response-holder"></div>
                    </form><!-- .ajax-form -->
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .fw-section.parallax-bg -->



    <!-- Scroll To Top Button -->
    <a href="#" class="scroll-to-top-btn">
        <i class="fa fa-angle-up"></i>
    </a><!-- .scroll-to-top-btn -->

    <!-- Footer -->
    <footer class="footer copy-right">
        <div class="container">
            <div class="row ">
                <div class="col-md-12"><p class="copy-right-p">Copyright © 2016 All Right Reserved <b>Royal Trove</b> | Developed By <a href="https://iprismtech.com/" target="_blank">iPrism Technologies</a></p></div>
            </div>
        </div><!-- .container -->
    </footer><!-- .footer -->
</div><!-- .page-wrapper -->

<!-- JavaScript (jQuery) libraries, plugins and custom scripts -->
<script src="{{url('js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{url('js/vendor/preloader.min.js')}}"></script>
<script src="{{url('js/vendor/placeholder.js')}}"></script>
<script src="{{url('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{url('js/vendor/smoothscroll.js')}}"></script>
<script src="{{url('js/vendor/velocity.min.js')}}"></script>
<script src="{{url('js/vendor/magnific-popup.min.js')}}"></script>
<script src="{{url('js/vendor/owl.carousel.min.js')}}"></script>
<script src="{{url('js/vendor/jquery.orgchart.js')}}"></script>
<script type="text/javascript" src="{{url('js/vendor/prettify.js')}}"></script>
{{--<script src="{{url('js/vendor/jquery.jOrgChart.js')}}"></script>--}}

<script src="{{url('js/scripts.js')}}"></script>
<script src="{{url('style-switcher/style-switcher.js')}}"></script>
<script src="{{url('js/vendor/wow.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/common.js')}}"></script>
<script type="text/javascript">
    new WOW().init();
</script>
<script>
    jQuery(document).ready(function() {
        var present_root = '{{Auth::user()->id}}';
        $('#chart-container').orgchart({
            'data' : "{{url('getSubTree/'.Auth::user()->id)}}",
            'depth' : 2
        });

        $(document).on('click','.node',function(){
            var root_id = $(this).find('.node-id').html();
            if(root_id==present_root){
                return;
            }
            $('#chart-container').html('');
            $('#chart-container').orgchart({
                'data' : "{{url('getSubTree/')}}"+'/'+root_id,
                'depth' : 2
            });
            present_root = root_id;
        });

        /*$('#chart').prev().attr('id','org');
        $('#org').hide();

        $("#org").jOrgChart({
            chartElement : '#chart'
        });*/

        /*var node_history = [];
        $('#tree-back-btn').click(function(){
            console.log(node_history.pop());
            console.log(node_history);
        });

        $('.child-node').click(function(){
            var parent_node_html = $(this).html();
            var parent_id = $(this).find('.status').attr('data-id');
            showLoadingPopup();
            $.ajax({
                url: '{{url("getSubTree")}}'+'/'+parent_id,
                method: 'get'
            }).done(function(response){
                //push child node to history
                node_history.push(parent_id);
                $('#tree-back-btn').show();
                // prepare tree view
                setTreeView(parent_node_html,response,jOrgChartInit);
                hideLoadingPopup();
            }).fail(function(responseObj){
                swal('Oops!',responseObj.responseText,'error');
            });
        });

        function setTreeView(prent_html,items,callback){
            var html = '<li>'+prent_html+'<ul>';
            $.each(items,function(i,item){
                var cls = (parseInt(item.status)==0) ? 'inactive' : 'active';
                html += '<li class="child-node">'+
                        '<div data-id="'+item.descendant_id+'" class="status '+cls+'"></div>'+item.first_name+'</li>';
            });
            html += '</ul></li>';
            $('#org').html(html);
            console.log('tree set');
            callback();
        }

        function jOrgChartInit(){
            $("#org").jOrgChart({
                chartElement : '#chart'
            });
            console.log('initialized');
        }*/
    });
</script>
</body>
<!-- <body> -->

</html>
