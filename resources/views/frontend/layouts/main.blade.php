<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <title> Check Eligibility</title>
    <meta name="description" content="Overseas Education Lane is a one-stop solution for students who want to study abroad. We have tie-ups with 400+ universities across the globe.">
    <meta name="keyword" content="Study in UK, Study in US, Study abroad, overseas education">
    <meta name="title" content="Overseas Education Lane">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/home/images/favicon.png') }}">
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" href="{{ asset('frontend/home/css/bootstrap.min.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/font-awesome.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/animate.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/owl.carousel.css') }}">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/slick.css') }}">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/off-canvas.css') }}">
    <!-- linea-font css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/linea-fonts.css') }}">
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/fonts/flaticon.css') }}">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/magnific-popup.css') }}">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="{{ asset('frontend/home/css/rsmenu-main.css') }}">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/rs-spacing.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/style.css?v=' . time()) }}">
    <!-- new-style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/new-style.css?v=' . time()) }}">
    <!-- This stylesheet dynamically changed from style.less -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/responsive.css?v=' . time()) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('frontend-css')
</head>
<body class="home-style2">
    {{-- <script src="{{ asset('npm/vue%402.6.12/dist/vue.js') }}"></script> --}}
    <script src="{{ asset('ajax/libs/axios/0.21.1/axios.min.js') }}"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"></script>
    <script async="" src="{{ asset('pagead/js/f.txt?client=ca-pub-8465945233842383') }}" crossorigin="anonymous"></script>
    <!-- modernizr js -->
    <script data-cfasync="false"
        src="{{ asset('frontend/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('frontend/home/js/modernizr-2.8.3.min.js') }}"></script>
    <!-- jquery latest version -->
    <script src="{{ asset('frontend/home/js/jquery.min.js') }}"></script>
    <!-- Bootstrap v4.4.1 js -->
    <script src="{{ asset('frontend/home/js/bootstrap.min.js') }}"></script>
    <!-- Menu js -->
    <script src="{{ asset('frontend/home/js/rsmenu-main.js') }}"></script>
    <!-- op nav js -->
    <script src="{{ asset('frontend/home/js/jquery.nav.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('frontend/home/js/slick.min.js') }}"></script>
    <!-- isotope.pkgd.min js -->
    <script src="{{ asset('frontend/home/js/isotope.pkgd.min.js') }}"></script>
    <!-- imagesloaded.pkgd.min js -->
    <script src="{{ asset('frontend/home/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('frontend/home/js/wow.min.js') }}"></script>
    <!-- Skill bar js -->
    <script src="{{ asset('frontend/home/js/skill.bars.jquery.js') }}"></script>
    <script src="{{ asset('frontend/home/js/jquery.counterup.min.js') }}"></script>
    <!-- counter top js -->
    <script src="{{ asset('frontend/home/js/waypoints.min.js') }}"></script>
    <!-- video js -->
    <script src="{{ asset('frontend/home/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!-- magnific popup js -->
    <script src="{{ asset('frontend/home/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- plugins js -->
    <script src="{{ asset('frontend/home/js/plugins.js') }}"></script>
    <!-- contact form js -->
    <script src="{{ asset('frontend/home/js/contact.form.js') }}"></script>
    <!--Full width header Start-->
    <div class="full-width-header header-style2 menu-sticky">
        <!--Header Start-->
        <header id="rs-header" class="rs-header">
            <!-- Topbar Area Start -->
            <div class="topbar-area">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-md-5">
                            <ul class="topbar-contact">
                            </ul>
                        </div>
                        <div class="col-md-7 text-right">
                            <ul class="topbar-right">
                                <li class="btn-part">
                                    <a class="apply-btn" href="tel:+918929922525"><i class="fa fa-phone"></i> &nbsp;
                                        +(91) 892 992 2525</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar Area End -->
            <!-- Menu Start -->
            <div class="menu-area">
                <div class="container oel_header_area">
                    <div class="row y-middle">
                        <div class="col-lg-2">
                            <div class="logo-cat-wrap">
                                <div class="logo-part">
                                    <a class="dark-logo" href="{{url('/')}}">
                                        <img src="{{ asset('frontend/home/images/oel.png') }}" alt="">
                                    </a>
                                    <a class="light-logo" href="">
                                        <img src="{{ asset('frontend/home/images/white-oel.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 text-center">
                            <div class="rs-menu-area">
                                <div class="main-menu desktop_menu">
                                    <div class="mobile-menu">
                                        <a class="rs-menu-toggle">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </div>
                                    <nav class="rs-menu">
                                        <ul class="nav-menu flexible_items">
                                            <li class="menu-item-has-children">
                                                <a href="">Home</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="">About OEL</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="">Universities</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="">Programs</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="">Courses Offered</a>
                                            </li>
                                            <li class="btn-part">
                                                <a class="apply-btn" href="#" data-toggle="modal" data-target="#myModal">  Check My Eligibility
                                                </a>
                                            </li>

                                            <li class="btn-part">
                                                <a class="apply-btn" href="{{route('user-login')}}">Login</a>
                                            </li>
                                            <li class="btn-part">
                                                <a href=""> <img
                                                        src="{{ asset('frontend/images/Student(1).png') }}"
                                                        class="rr">
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- //.nav-menu -->
                                    </nav>
                                </div>
                                <!-- //.main-menu -->
                                <div class="main-menu mobile_menu">
                                    <div class="mobile-menu">
                                        <a class="rs-menu-toggle">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                        <div class="dropdown">
                                            <div class="profile_circle" id="dropdown_trigger_nav2">
                                                <img src="{{ asset('frontend/images/default_profile.jpg') }}"
                                                    alt="">
                                            </div>
                                            <ul class="dropdown-menu" id="user_dropdown_content2">
                                                <li class="menu_item_user_dropdown">
                                                    <a href="{{route('user-login')}}"><i class="fa fa-sign-in"></i>Login</a>
                                                </li>
                                                <li class="menu_item_user_dropdown">
                                                    <a href="register.html"><i class="fa fa-registered"></i>Student
                                                        Registration</a>
                                                </li>
                                                <li class="menu_item_user_dropdown">
                                                    <a href="franchise-register.html"><i
                                                            class="fa fa-registered"></i>Franchise Registration</a>
                                                </li>
                                                <li class="menu_item_user_dropdown">
                                                    <a href="counselor_register.html"><i
                                                            class="fa fa-registered"></i>Counselor Registration</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <nav class="rs-menu mobile_menu">
                                        <ul class="nav-menu">
                                            <li class="">
                                                <a href="">Home</a>
                                            </li>
                                            <li class="">
                                                <a href="quick_search-1.html">Quick Search</a>
                                            </li>
                                            <li class="">
                                                <a href="">About OEL</a>
                                            </li>
                                            <li class="">
                                                <a href="">Universities</a>
                                            </li>
                                            <li class="">
                                                <a href="">Programs</a>
                                            </li>
                                            <li class="">
                                                <a href="">Programs Offered</a>
                                            </li>
                                            <li class="btn-part">
                                                <a class="apply-btn" href="#" data-toggle="modal" data-target="#myModal">  Check My Eligibility
                                                </a>
                                            </li>
                                            <li class="btn-part">
                                                <a class="apply-btn" href="">My Account</a>
                                            </li>
                                        </ul>
                                        <!-- //.nav-menu -->
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->
        </header>
        <!--Header End-->
    </div>
    @yield('content')
    <div class="rs-newsletter style1 orange-color mt-50 sm-mt-10 mb--90 sm-mb--30">
        <div class="container">
            <div class="newsletter-wrap">
                <div class="row y-middle">
                    <div class="col-lg-6 col-md-12 md-mb-30">
                        <div class="content-part">
                            <div class="sec-title">
                                <div class="title-icon md-mb-15">
                                    <img src="{{ asset('frontend/home/images/newsletter.png') }}" alt="images">
                                </div>
                                <h2 class="title mb-0 white-color">Subscribe to Newsletter</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <form class="newsletter-form">
                            <input type="email" name="email" placeholder="Enter Your Email" required=""
                                id="subscribe_to_email">
                            <button class="primary newsletter_button" type="button"
                                onclick="send_subscribe_to_email()">
                                <span id="newsletter_subs_show_loading" style="display: none;"
                                    class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true"></span> Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Full width header End-->
    <!-- Footer Start -->
    <footer id="rs-footer" class="rs-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                        <h4 class="widget-title">Other Links</h4>
                        <ul class="site-map">
                            <li><a href="">About OEL</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="allblogs.html">Blogs</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="frequently-asked-questions.html">FAQ</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li>
                                <a href="{{route('user-login')}}">Franchise Login</a>
                            </li>
                            <li>
                                <a href="{{route('user-login')}}">Counselor Login</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                        <h4 class="widget-title">Hot Courses</h4>
                        <ul class="site-map">
                            <li><a href="courses-1.html?program_name=MASTER BUSINESS ADMINISTRATION">MBA</a></li>
                            <li><a href="courses-2.html?program_name=Hospitality">Hospitality</a></li>
                            <li><a href="courses-3.html?program_name=Nursing">Nursing</a></li>
                            <li><a href="courses-4.html?program_name=Design/Media">Design/Media</a></li>
                            <li><a href="courses-5.html?program_name=Engineering">Engineering</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                        <h4 class="widget-title">Top Destination</h4>
                        <ul class="site-map">
                            <li><a href="universities-1.html?country=38&amp;u_name=">Canada</a></li>
                            <li><a href="universities-2.html?country=231&amp;u_name=">USA</a></li>
                            <li><a href="universities-3.html?country=13&amp;u_name=">Australia</a></li>
                            <li><a href="universities-4.html?country=230&amp;u_name=">UK</a></li>
                            <li><a href="universities-5.html?country=157&amp;u_name=">New Zealand</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                        <h4 class="widget-title">Address</h4>
                        <ul class="address-widget">
                            <li class="oel_brand_name">
                                <i class="flaticon-location"></i>
                                <div class="desc">Overseas Education Lane</div>
                            </li>
                            <li>
                                <i class="flaticon-call"></i>
                                <div class="desc">
                                    <a href="tel:+(91) 892 992 2525">+(91) 892 992 2525</a>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-email"></i>
                                <div class="desc">
                                    <a
                                        href="{{ asset('cdn-cgi/l/email-protection.html#b3daddd5dcf3dcc5d6c1c0d6d2c0d6d7c6d0d2c7dadcdddfd2ddd69dd0dcde') }}"><span
                                            class="__cf_email__"><span class="__cf_email__"
                                                data-cfemail="9ef7f0f8f1def1e8fbecedfbffedfbfaebfdffeaf7f1f0f2fff0fbb0fdf1f3">[email&#160;protected]</span></span></a>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-email"></i>
                                <div class="desc">
                                    <a href="{{ asset('cdn-cgi/l/email-protection.html#d6beb3baa696b9a0b3a4a5b3b7a5b3b2a3b5b7a2bfb9b8bab7b8b3f8b5b9bb') }}"><span class="__cf_email__"><span class="__cf_email__" data-cfemail="4129242d31012e37243332242032242534222035282e2f2d202f246f222e2c">[email&#160;protected]</span></span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-7 md-mb-20">
                        <div class="copyright md-text-left">
                            <p>&copy; 2021 Copyright <a href="">Overseas Education Lane</a> All Rights
                                Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-2 md-mb-20">
                        <span class="hitcounter">
                            <div id="sfcrrst5kwmd6ngef472jhluuyjzynf4g2a" style="width:100% !important"></div>
                            <noscript>
                                <a href="https://www.freecounterstat.com" title="free website counter"><img
                                        src="private/freecounterstat.php?c=rrst5kwmd6ngef472jhluuyjzynf4g2a"
                                        border="0" title="free website counter" alt="free website counter"></a>
                            </noscript>
                        </span>
                    </div>
                    <div class="col-lg-3 text-right md-text-left">
                        <ul class="footer-social">
                            <li><a href="https://www.facebook.com/overseasedulane"><i class="fa fa-facebook"></i></a> </li>
                            <li><a href="https://twitter.com/LaneEducation"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/overseaseducation_lane/"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/75765761/admin/"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <!-- start scrollUp  -->
    <div id="scrollUp">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- End scrollUp  -->
    <!-- Search Modal Start -->
    <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="flaticon-cross"></span>
        </button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group">
                            <input class="form-control" placeholder="Search Here..." type="text">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->
    <!-- Search Modal End -->
    <!-- owl.carousel js -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('frontend/home/js/owl.carousel.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('frontend/home/js/main.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/home/css/bootstrap-multiselect.css') }}" type="text/css">
    <script type="text/javascript" src="{{ asset('frontend/home/js/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('frontend/home/js/popper.js') }}" crossorigin="anonymous"></script>
</body>
<script src="{{ asset('ajax/libs/jquery-validate/1.19.3/jquery.validate.js') }}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<div class="container">
    <div class="modal mt-60" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
           <div class="row">
              <div class="col-md-6 p-0">
                  <img src="https://publicassets.leverageedu.com/nas-daily/ForLeverageedupopup2.png"/>
              </div>
                  <div class="col-md-6" style="  background: #EAEAEA;border-right: 3px solid #8080803b;border-radius: 20px;">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                       </button>
                      </div>
                      <h4 style=";text-align:center">REQUEST AN ENQUIRY<br>we usually respond in seconds</h4>
                      <div class="modal-header">
                        <!--<h5 class="modal-title" id="exampleModalLabel">Enquiry Now </h5>-->
                      </div>
                      <form class="mx-1 mx-md-4" id="enquiry_data" method="POST" autocomplete="off" novalidate="novalidate">
                        @csrf
                        <div class="d-flex flex-row align-items-center mb-4">
                           <i class="fa fa-user" aria-hidden="true" style="height: 29px;padding: 0px 6px;font-size: 24px;color: #070758;"></i>
                           <input type="text" class="form-control" name="full_name" id="full_name"  required aria-describedby="emailHelp" placeholder="First Name">
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                           <i class="fa fa-envelope" aria-hidden="true" style="height: 32px;padding: 0px 6px;font-size: 22px;color: #070758;"></i>
                           <input type="email" name="email" class="form-control" required id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <span style="margin-left: 37px;margin-bottom: 50px !important;position: relative;top: -8px;font-size: 12px;">We'll never share your email with anyone else.</span>
                        <div class="row">
                         <div class="col-md-8">
                             <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fa fa-mobile" aria-hidden="true" style="height: 44px;padding: 0px 8px;font-size: 42px;color: #070758;"></i>
                                <input type="tel" name="mobile_number" class="form-control" aria-describedby="emailHelp" pattern="[0-9]{10}" placeholder="Enter mobile number" id="mobile_number" required>
                             </div>
                             <span style="margin-left: 37px;position: relative;top: -8px;font-size: 12px;">Please enter 10 digits only.</span>
                         </div>
                         <div class="col-md-4">
                             <div class="d-flex justify-content-center  mt-2">
                                 <button type="button" id="verify_otp" class="btn btn-primary btn-sm">
                                    <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                     Verify OTP</button>
                             </div>
                         </div>
                         </div>
                         <span class="text-danger error-phone"></span>
                         <div class="d-flex flex-row align-items-center mb-4 otp-verify" style="display:none !important;">
                           <input type="number" name="otp" class="form-control" id ="otp" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter otp">
                         </div>
                         <span class="text-danger otp-error"></span>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                           <button type="button" id="booking_enquiry" class="btn btn-primary btn-lg booking_enquiry" disabled> <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Submit Now</button>
                        </div>
                     </form>
                    </div>
              </div>
           </div>
        </div>
      </div>
</div>
@yield('section')
<script>
    $(document).ready(function(){
        $('#verify_otp').click(function(){
            $('#booking_enquiry').prop('disabled', false);
        });
    });
</script>
<script>
    $(document).on('click', '#verify_otp', function(e){
        $('.error-phone').html('');
        e.preventDefault();
        let mobile_number = $('#mobile_number').val();
        if(!mobile_number || mobile_number.length != 10 || !/^\d+$/.test(mobile_number)){
            alert('Please enter valid mobile number', 'error');
            return false;
        }
        var spinner = this.querySelector('.spinner-grow');
        spinner.classList.remove('d-none');
        $.ajax({
            url: '{{route("send-otp")}}',
            type: 'POST',
            data: {
                phone_number: mobile_number,
                _token: '{{csrf_token()}}'
            },
            success: function(data){
                spinner.classList.add('d-none');
                if(data.success){
                    $('.otp-verify').show();
                }else{
                    $('.error-phone').html(data.message);
                }
            }
        })
    })
    $('.booking_enquiry').on('click', function(e){

        e.preventDefault();
        let mobile_number = $('#mobile_number').val();
        if(!mobile_number || mobile_number.length != 10 || !/^\d+$/.test(mobile_number)) {
            alert('Please enter valid mobile number', 'error');
            return false;
        }
        let full_name = $('#full_name').val();
        if(!full_name) {
            alert('Please enter your full name', 'error');
            return false;
        }
        let email = $('#email').val();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(!email || !emailReg.test(email)) {
        alert('Please enter valid email', 'error');
            return false;
        }
        let otp = $('#otp').val();
        if(!otp) {
            alert('Please enter otp', 'error');
            return false;
        }
        var spinner = this.querySelector('.spinner-grow');
        spinner.classList.remove('d-none');
        $.ajax({
            url: '{{route("verify-otp")}}',
            type: 'POST',
            data: {
                phone_number: mobile_number,
                full_name: full_name,
                email: email,
                otp: otp,
                _token: '{{csrf_token()}}'
            },
            success: function(data){
                spinner.classList.add('d-none');
                if(data.success){
                    window.location.href = '{{url("check-eligibility")}}';
                }else{
                  $('.otp-error').html(data.message);
                  $('#exampleModal').css('display','none');
                }
            },
            error: function(xhr,status,error){
                spinner.classList.add('d-none');
                if(xhr.status == 401){
                    $('.otp-error').html('Invalid OTP.');
                }
            }
        })
    })
    $('.myspan').on('click',function(){
        $('#exampleModal').css('display','none');
    });
</script>
</body>
</html>
