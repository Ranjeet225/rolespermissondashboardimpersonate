<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title> Check Eligibility</title>
    <!-- Removed by WebCopy -->
    <!--<base href="https://reactoel.skylabsapp.com/">-->
    <!-- Removed by WebCopy -->
    <meta name="description"
        content="Overseas Education Lane is a one-stop solution for students who want to study abroad. We have tie-ups with 400+ universities across the globe.">
    <meta name="keyword" content="Study in UK, Study in US, Study abroad, overseas education">
    <meta name="title" content="Overseas Education Lane">
    <!-- responsive tag -->
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
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/css/magnific-popup.css')}}">
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
</head>

<body class="home-style2">
    <script type="text/javascript" src="{{ asset('v3/polyfill.min.js') }}"></script>
    <script src="{{ asset('npm/vue%402.6.12/dist/vue.js') }}"></script>
    <script src="{{ asset('ajax/libs/axios/0.21.1/axios.min.js') }}"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"></script>

    <script async="" src="{{ asset('pagead/js/f.txt?client=ca-pub-8465945233842383') }}" crossorigin="anonymous"></script>



    <style type="text/css">
        .desktop_menu {
            display: block;
        }

        .menu-area {
            box-shadow: 6px 2px 22px 1px #8080804d;
        }

        .mobile_menu {
            display: none;
        }

        .mobile_menu .mobile-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .flexible_items {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .flexible_items li {
            margin: 0 !important;
        }

        .desktop_menu {
            flex: 1;
        }

        .rs-menu-area {
            padding-left: 30px;
        }

        @media only screen and (max-width: 991px) {
            .desktop_menu {
                display: none;
            }

            .mobile_menu {
                display: block;
            }

            .rs-menu-toggle {
                margin-right: 15px;
            }
        }

        .hitcounter {}

        .contheight-most {
            height: 150px;
            min-height: 1px;
        }

        .owl-prev:after,
        .owl-next:after {
            content: "" !important;
            vertical-align: middle !important;

        }

        .rs-carousel.nav-style2 .owl-nav .owl-prev:before {
            content: "/" !important;
            padding: 0 5px 0 5px;
            position: relative;
            top: 1px;
        }

        .rr {
            width: 78px;
            height: 74px;
            position: relative;
            animation: shake 4s infinite;
            top: -3px;

        }

        @keyframes shake {
            0% {
                transform: translate(12px, 12px) rotate(0deg);
            }

            25% {
                transform: translate(1px, -2px) rotate(20deg);
            }

            50% {
                transform: translate(1px, 2px) rotate(-20deg);
            }

            100% {
                transform: translate(12px, 12px) rotate(0deg);
            }

        }


        /*mycss*/



        .profile_circle {
            border-radius: 50%;
            width: 55px;
            height: 55px;
        }

        .user_name {
            display: flex;
            justify-content: center;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 18px;
            width: 100%;
            font-weight: 500;
        }

        .profile_circle img {
            width: inherit;
            height: inherit;
            border-radius: 50%;
            cursor: pointer;
        }

        .menu_item_user_dropdown:first-child {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .menu_item_user_dropdown:last-child {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .menu_item_user_dropdown {
            color: black;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eee;
            height: 40px !important;
            display: flex !important;
            align-items: center !important;
            white-space: nowrap;
        }

        .menu_item_user_dropdown a {
            height: 40px !important;
            line-height: normal !important;
            display: flex !important;
            align-items: center !important;
            font-size: 14px !important;
        }

        .menu_item_user_dropdown a i {
            min-width: 20px;
        }

        .menu_item_user_dropdown:last-child {
            border-bottom: none;
        }

        .menu_item_user_dropdown a i {
            margin-right: 10px;
        }

        .nav_link_button {
            height: 30px;
            font-size: 14px !important;
            margin-right: 10px;
            color: #fff !important;
        }

        .nav_link_button:hover {
            color: #fff !important;
            background: #126898 !important;
        }

        .menu_item_user_dropdown {
            width: 100%;
            font-size: 15px;
            cursor: pointer;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .menu_item_user_dropdown a {
            text-decoration: none;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            width: 100%;
            height: 100%;
            display: block;
            color: #505050;
        }

        .menu_item_user_dropdown a:hover {
            background: #F9F8F8;
        }

        #user_dropdown_content2 {
            left: unset;
            right: -15px !important;
            top: 65px;
            border-radius: 10px !important;
            padding-left: 12px;
            padding-right: 12px;
            visibility: visible !important;
            opacity: 1 !important;
            transform: scaleY(1) !important;
            background: #fff !important;
            box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #user_dropdown_content2::before {
            content: "";
            position: absolute;
            top: -10px;
            right: 28px;
            width: 20px;
            height: 20px;
            transform: rotate(45deg);
            background: #e4e4e4 !important;
            border-left: 1px solid rgba(0, 0, 0, .15);
            border-top: 1px solid rgba(0, 0, 0, .15);
        }

        .second_level_header {
            margin-right: 5px !important;
            margin-left: 5px !important;
            width: 100%;
        }

        #navbarSupportedContent ul {
            align-items: center;
        }

        .navbar-light .navbar-nav .nav-link {
            font-size: 13px;
            letter-spacing: .2px;
        }


        .desktop_header {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .mobile_header1 {
            display: none;
            background: #fff;
        }

        .second_level_header_right_panel {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100%;
        }

        .second_level_header_right_panel ul li .nav-link {
            color: #000 !important;
            font-weight: 600 !important;
        }

        .mobile_header1_trigger {
            display: none;
        }

        .desktop_header li.nav-item {
            display: flex;
            height: inherit;
            align-items: center;
        }

        #mobile_header1 .nav-item {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bnavbar {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        @media only screen and (max-width: 991px) {
            .second_level_header_right_panel {
                display: none;
            }

            .mobile_header1_trigger {
                display: flex;
                justify-content: flex-end;
                align-items: center;
                flex: 1;
            }

            #user_dropdown_content2::before {
                display: none;
            }

            #mobile_header1 li:last-child {
                padding-top: 15px;
                padding-bottom: 15px;
            }
        }


        .wizard-content-left {
            background-blend-mode: darken;
            background-color: rgba(0, 0, 0, 0.45);
            background-image: url("https://i.ibb.co/X292hJF/form-wizard-bg-2.jpg");
            background-position: center center;
            background-size: cover;
            height: 100vh;
            padding: 30px;
        }

        .wizard-content-left h1 {
            color: #ffffff;
            font-size: 38px;
            font-weight: 600;
            padding: 12px 20px;
            text-align: center;
        }

        .form-wizard {
            color: #888888;
            padding: 30px;
        }

        .form-wizard .wizard-form-radio {
            display: inline-block;
            margin-left: 5px;
            position: relative;
        }

        .form-wizard .wizard-form-radio input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            background-color: #dddddd;
            height: 25px;
            width: 25px;
            display: inline-block;
            vertical-align: middle;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:focus {
            outline: 0;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked {
            background-color: #fb1647;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked::before {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            display: inline-block;
            background-color: #ffffff;
            border-radius: 50%;
            left: 1px;
            right: 0;
            margin: 0 auto;
            top: 8px;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked::after {
            content: "";
            display: inline-block;
            webkit-animation: click-radio-wave 0.65s;
            -moz-animation: click-radio-wave 0.65s;
            animation: click-radio-wave 0.65s;
            background: #000000;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
            border-radius: 50%;
        }

        .form-wizard .wizard-form-radio input[type="radio"]~label {
            padding-left: 10px;
            cursor: pointer;
        }

        .form-wizard .form-wizard-header {
            text-align: center;
        }

        .form-wizard .form-wizard-next-btn,
        .form-wizard .form-wizard-previous-btn,
        .form-wizard .form-wizard-submit {
            background-color: #d65470;
            color: #ffffff;
            display: inline-block;
            min-width: 100px;
            min-width: 120px;
            padding: 10px;
            text-align: center;
        }

        .form-wizard .form-wizard-next-btn:hover,
        .form-wizard .form-wizard-next-btn:focus,
        .form-wizard .form-wizard-previous-btn:hover,
        .form-wizard .form-wizard-previous-btn:focus,
        .form-wizard .form-wizard-submit:hover,
        .form-wizard .form-wizard-submit:focus {
            color: #ffffff;
            opacity: 0.6;
            text-decoration: none;
        }

        .form-wizard .wizard-fieldset {
            display: none;
        }

        .form-wizard .wizard-fieldset.show {
            display: block;
        }

        .form-wizard .wizard-form-error {
            display: none;
            background-color: #d70b0b;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            width: 100%;
        }

        .form-wizard .form-wizard-previous-btn {
            background-color: #fb1647;
        }

        .form-wizard .form-control {
            font-weight: 300;
            height: auto !important;
            padding: 15px;
            color: #888888;
            background-color: #f1f1f1;
            border: none;
        }

        .form-wizard .form-control:focus {
            box-shadow: none;
        }

        .form-wizard .form-group {
            position: relative;
            margin: 25px 0;
            left: 28px;
            padding: 20px 64px;
        }

        .form-wizard .wizard-form-text-label {
            position: absolute;
            left: 10px;
            top: 16px;
            transition: 0.2s linear all;
        }

        .form-wizard .focus-input .wizard-form-text-label {
            color: #d65470;
            top: -18px;
            transition: 0.2s linear all;
            font-size: 12px;
        }

        .form-wizard .form-wizard-steps {
            margin: 15px 0;
        }

        .form-wizard .form-wizard-steps li {
            width: 10%;
            float: left;
            position: relative;
            width: 16%;
        }

        .form-wizard .form-wizard-steps li::after {
            background-color: #f3f3f3;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            border-bottom: 1px solid #dddddd;
            border-top: 1px solid #dddddd;
        }

        .form-wizard .form-wizard-steps li span {
            background-color: #dddddd;
            border-radius: 50%;
            display: inline-block;
            height: 40px;
            line-height: 40px;
            position: relative;
            text-align: center;
            width: 40px;
            z-index: 1;
        }

        .form-wizard .form-wizard-steps li:last-child::after {
            width: 50%;
        }

        .form-wizard .form-wizard-steps li.active span,
        .form-wizard .form-wizard-steps li.activated span {
            background-color: #070758;
            color: #ffffff;
        }

        .form-wizard .form-wizard-steps li.active::after,
        .form-wizard .form-wizard-steps li.activated::after {
            background-color: #080858;
            left: 50%;
            width: 50%;
            border-color: #070758;
        }

        .form-wizard .form-wizard-steps li.activated::after {
            width: 100%;
            border-color: #070758;
        }

        .form-wizard .form-wizard-steps li:last-child::after {
            left: 0;
        }

        .form-wizard .wizard-password-eye {
            position: absolute;
            right: 32px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        @keyframes click-radio-wave {
            0% {
                width: 25px;
                height: 25px;
                opacity: 0.35;
                position: relative;
            }

            100% {
                width: 60px;
                height: 60px;
                margin-left: -15px;
                margin-top: -15px;
                opacity: 0.0;
            }
        }

        @media screen and (max-width: 767px) {
            .wizard-content-left {
                height: auto;
            }
        }

        .nopad {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        /*image gallery*/
        .image-checkbox {
            cursor: pointer;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            border: 4px solid transparent;
            margin-bottom: 0;
            outline: 0;
        }

        .image-checkbox input[type="checkbox"] {
            display: none;
        }


        .image-checkbox .fa {
            position: absolute;
            color: #4A79A3;
            background-color: #fff;
            padding: 10px;
            top: 0;
            right: 0;
        }

        .image-checkbox-checked .fa {
            display: block !important;
        }

        .fa.fa-check.hidden {
            background: #1086f3;
            color: white;
            height: 25px;
        }

        .fa-check::before {
            content: "\f00c";
            position: relative;
            top: -5px;
        }

        .flg {
            display: flex;
        }

        .image-checkbox {
            border-radius: 10px;
            padding: 10px 10px;
            background: #8080800d;
            color: black;
            font-weight: 400;
            box-shadow: 0 5px 10px rgba(114, 135, 243, .1);
        }

        .countrypapa {
            margin-top: 12px;
            padding: 0px;
        }



        .select2-container {
            min-width: 400px;
        }

        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option:before {
            content: "";
            display: inline-block;
            position: relative;
            height: 20px;
            width: 20px;
            border: 2px solid #e9e9e9;
            border-radius: 4px;
            background-color: #fff;
            margin-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option[aria-selected=true]:before {
            font-family: fontAwesome;
            content: "\f00c";
            color: #fff;
            background-color: #f77750;
            border: 0;
            display: inline-block;
            padding-left: 3px;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #fff;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #eaeaeb;
            color: #272727;
        }

        .select2-container--default .select2-selection--multiple {
            margin-bottom: 10px;
        }

        .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-radius: 4px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #f77750;
            border-width: 2px;
        }

        .select2-container--default .select2-selection--multiple {
            border-width: 2px;
        }

        .select2-container--open .select2-dropdown--below {

            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

        }

        .select2-selection .select2-selection--multiple:after {
            content: 'hhghgh';
        }

        /* select with icons badges single*/
        .select-icon .select2-selection__placeholder .badge {
            display: none;
        }

        .select-icon .placeholder {
            /*  display: none; */
        }

        .select-icon .select2-results__option:before,
        .select-icon .select2-results__option[aria-selected=true]:before {
            display: none !important;
            /* content: "" !important; */
        }

        .select-icon .select2-search--dropdown {
            display: none;
        }


        .intro-info-tabs .white-bg {
            box-shadow: none !important;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #070758;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .nav-tabs .nav-link:hover {
            border-color: none !important;
            border-radius: 5px;

        }

        .nav-tabs {
            border: 0px !important;

        }


        @media screen and (min-device-width: 300px) and (max-device-width: 700px) {
            .nav-item.tab-btns {
                width: 0%;
                font-size: 19px;
                text-align: center;
            }
        }




        .nav-item.tab-btns {
            font-size: 14px;
            text-align: center;
        }



        .nav-tabs .nav-link {
            border-bottom: none !important;
            border-radius: 5px;

        }

        .select2-container {
            width: 100% !important;
        }

        .tabcntr {
            display: flex;
            justify-content: center;
        }
    </style>
    <!-- modernizr js -->
    <script data-cfasync="false"
        src="{{ asset('frontend/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('frontend/home/js/modernizr-2.8.3.min.js') }}"></script>





    <!-- jquery latest version -->
    <script src="{{ asset('frontend/home/js/jquery.min.js')}}"></script>




    <!-- Bootstrap v4.4.1 js -->
    <script src="{{ asset('frontend/home/js/bootstrap.min.js') }}"></script>





    <!-- Menu js -->
    <script src="{{ asset('frontend/home/js/rsmenu-main.js') }}"></script>
    <!-- op nav js -->
    <script src="{{ asset('frontend/home/js/jquery.nav.js')}}"></script>
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
                                <!--
                            <li>
                                <i class="fa fa-users"></i>
                                <a href="https://reactoel.skylabsapp.com/nearest-franchise">Nearest Franchise</a>
                            </li>
                            <li>
                                <i class="fa fa-users"></i>
                                <a href="https://reactoel.skylabsapp.com/nearest-counselor">Nearest Counselor</a>
                            </li>
                        -->
                            </ul>
                        </div>
                        <div class="col-md-7 text-right">
                            <ul class="topbar-right">

                                <!--<li class="btn-part">-->
                                <!--    <a class="apply-btn" href="tel:+918130025467"><i class="fa fa-phone"></i> &nbsp; +(91) 813 002 5467</a>-->
                                <!--</li>-->
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
                                    <a class="dark-logo" href="index.htm">
                                        <img src="{{ asset('frontend/home/images/oel.png') }}" alt="">
                                    </a>
                                    <a class="light-logo" href="index.htm">
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
                                                <a href="index.htm">Home</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="about_us.html">About OEL</a>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="universities.html">Universities</a>

                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="courses.html">Programs</a>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="program-offered.html">Courses Offered</a>
                                            </li>


                                            <li class="menu-item-has-children">
                                                <a href="contact_us.html">Contact Us</a>
                                            </li>

                                            <li class="btn-part">
                                                <a class="apply-btn" href="quick_search.html?prefill=true">Quick
                                                    Search</a>
                                            </li>

                                            <li class="btn-part">
                                                <a class="apply-btn" href="login.html">Login</a>
                                            </li>
                                            <li class="btn-part">
                                                <a href="student_loan.html"> <img
                                                        src="{{ asset('frontend/images/Student(1).png') }}"
                                                        class="rr"> </a>
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
                                                    <a href="login.html"><i class="fa fa-sign-in"></i>Login</a>
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
                                                <a href="index.htm">Home</a>
                                            </li>
                                            <li class="">
                                                <a href="quick_search-1.html">Quick Search</a>
                                            </li>

                                            <li class="">
                                                <a href="about_us.html">About OEL</a>
                                            </li>

                                            <li class="">
                                                <a href="universities.html">Universities</a>

                                            </li>

                                            <li class="">
                                                <a href="courses.html">Programs</a>

                                            </li>

                                            <li class="">
                                                <a href="program-offered.html">Programs Offered</a>

                                            </li>
                                            <li class="">
                                                <a href="contact_us.html">Contact Us</a>
                                            </li>

                                            <li class="btn-part">
                                                <a class="apply-btn" href="quick_search.html?prefill=true">Quick
                                                    Search</a>
                                            </li>

                                            <li class="btn-part">
                                                <a class="apply-btn" href="login.html">My Account</a>
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
    <!--Full width header End-->
    <!-- Main content Start -->





    <section class="wizard-section">

        <div class="row no-gutters">
            <!--  <div class="col-lg-4 col-md-6">
        <div class="wizard-content-left d-flex justify-content-center align-items-center">
          <h1> Check My Eligibility </h1>
        </div>
      </div> -->
            <div class="col-lg-1 col-md-6">

            </div>
            <div class="col-lg-10 col-md-12">
                <div class="form-wizard">
                    <form action="" method="post" role="form">
                        <div class="form-wizard-header">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Check My Eligibility </h2>
                            <ul class="list-unstyled form-wizard-steps clearfix">
                                <li class="active"><span>1</span></li>
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                                <li><span>4</span></li>
                                <li><span>5</span></li>
                                <li><span>6</span></li>
                            </ul>
                        </div>
                        <link rel="stylesheet"
                            href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

                        <fieldset class="wizard-fieldset show">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which country do you wish to
                                pursue your education in?</h2>
                            <br>

                            <section class="flg">

                                <div class="container">
                                    <div class="row">

                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
                                        <select class="js-select2" multiple="multiple" name="country[]" id="country" onchange="ajaxRequest($(this).val())">
                                            @foreach ($country as $item)
                                            <option value="{{$item->id}}"                                            >
                                                {{$item->name}}</option>
                                            @endforeach
                                            {{-- <option value="2"
                                                data-image="https://img.icons8.com/color/48/usa.png">Option2</option>
                                            <option value="3"
                                                data-image="https://img.icons8.com/color/48/france.png">Option3
                                            </option> --}}
                                        </select>

                                        <div id="showDiv" style="display: none; width: 100%">

                                            <div class="row" id="appendImg88">

                                            </div>

                                        </div>



                                    </div>

                                </div>

                            </section>

                            <div class="col-lg-1 col-md-6">

                            </div>



                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Continue</a>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">

                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Current Track: MASTERS </h2>

                            <h4 style="text-align: center;"> Do you have any work experience?</h4>
                            <br>

                            <section class="flg">

                                <div class="container">
                                    <div class="row">


                                        @foreach ($field_of_study as $item)
                                        <div class="col-md-2 col-6">
                                            <label class="image-checkbox">
                                                <img class="img-responsive w-50 text-justify-center mx-auto"
                                                    src="{{asset('assets/degree.png')}}" />
                                                <p class="countrypapa text-center"> {{ucfirst($item->name)}} </p>
                                                <input type="checkbox" name="image[]" value="{{$item->name}}" />
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>

                            </section>







                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                            </div>
                        </fieldset>



                        <fieldset class="wizard-fieldset">

                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Current Track: MASTERS </h2>
                            <br>

                            <div class="row">
                                <div class="col-md-2">

                                </div>

                                <style>

                                </style>

                                <div class="col-md-8">
                                    <div class="intro-info-tabs  ">
                                        <ul class="nav nav-tabs intro-tabs tabs-box " id="myTab" role="tablist">
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn active" id="prod-overview-tab"
                                                    data-toggle="tab" href="#prod-overview" role="tab"
                                                    aria-controls="prod-overview" aria-selected="true">Undergraduate
                                                    Degree</a>
                                            </li>

                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#description" role="tab"
                                                    aria-controls="description" aria-selected="false">Postgraduate
                                                    Degree</a>
                                            </li>

                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#Undergraduate" role="tab"
                                                    aria-controls="description" aria-selected="false">Undergraduate
                                                    Diploma</a>
                                            </li>

                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#Postgraduate" role="tab"
                                                    aria-controls="description" aria-selected="false">Postgraduate
                                                    Diploma</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content tabs-content" id="myTabContent">
                                            <!-- Home Tab -->
                                            <div class="tab-pane tab" id="prod-overview" role="tabpanel"
                                                aria-labelledby="prod-overview-tab">
                                                <div class="content white-bg pt-30">
                                                    <!-- Application Charges -->
                                                    <div class="course-overview">
                                                        <div class="inner-box">
                                                            <h4>Application Charges</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Description Tab -->
                                            <div class="tab-pane tab" id="description" role="tabpanel"
                                                aria-labelledby="description-tab">
                                                <div class="content white-bg pt-30">
                                                    <div class="course-overview">
                                                        <div class="inner-box">
                                                            <h4>Program Description</h4>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane tab" id="Undergraduate" role="tabpanel"
                                                aria-labelledby="description-tab">
                                                <div class="content white-bg pt-30">
                                                    <div class="course-overview">
                                                        <div class="inner-box">
                                                            <h4>Undergraduate Description</h4>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane tab" id="Postgraduate" role="tabpanel"
                                                aria-labelledby="description-tab">
                                                <div class="content white-bg pt-30">
                                                    <div class="course-overview">
                                                        <div class="inner-box">
                                                            <h4>Postgraduate</h4>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>



                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">

                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which major do you want to
                                pursue? </h2>
                            <br>

                            <select class="js-select2" multiple="multiple" style="text-align: center">
                                <option value="1"
                                    data-image="https://img.icons8.com/color/48/great-britain-circular.png">Option1
                                </option>
                                <option value="2" data-image="https://img.icons8.com/color/48/usa.png">Option2
                                </option>
                                <option value="3" data-image="https://img.icons8.com/color/48/france.png">Option3
                                </option>
                            </select>



                            <section class="flg">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-2 col-6">
                                            <label class="image-checkbox">
                                                <img class="img-responsive"
                                                    src="https://images.leverageedu.com/assets/img/flags/app/UK.png" />
                                                <p class="countrypapa"> MBA</p>
                                                <input type="checkbox" name="image[]" value="" />
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="image-checkbox">
                                                <img class="img-responsive"
                                                    src="https://images.leverageedu.com/assets/img/flags/app/UK.png" />
                                                <p class="countrypapa"> MBA</p>
                                                <input type="checkbox" name="image[]" value="" />
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        </div>

                                        <div class="col-md-2 col-6">
                                            <label class="image-checkbox">
                                                <img class="img-responsive"
                                                    src="https://images.leverageedu.com/assets/img/flags/app/UK.png" />
                                                <p class="countrypapa"> MBA</p>
                                                <input type="checkbox" name="image[]" value="" />
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        </div>

                                        <div class="col-md-2 col-6">
                                            <label class="image-checkbox">
                                                <img class="img-responsive"
                                                    src="https://images.leverageedu.com/assets/img/flags/app/UK.png" />
                                                <p class="countrypapa"> MBA</p>
                                                <input type="checkbox" name="image[]" value="" />
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        </div>

                                        <div class="col-md-2 col-6">
                                            <label class="image-checkbox">
                                                <img class="img-responsive"
                                                    src="https://images.leverageedu.com/assets/img/flags/app/UK.png" />
                                                <p class="countrypapa"> MBA</p>
                                                <input type="checkbox" name="image[]" value="" />
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        </div>

                                        <div class="col-md-2 col-6">
                                            <label class="image-checkbox">
                                                <img class="img-responsive"
                                                    src="https://images.leverageedu.com/assets/img/flags/app/UK.png" />
                                                <p class="countrypapa"> MBA</p>
                                                <input type="checkbox" name="image[]" value="" />
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        </div>

                                    </div>

                                </div>

                            </section>



                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                            </div>
                        </fieldset>


                        <fieldset class="wizard-fieldset">

                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which english language test
                                have you taken OR are planning to take? </h2>

                            <h4 style="text-align: center;"> Scoring high in language tests increases your options
                                multi fold.</h4>
                            <br>

                            <div class="col-md-1">

                            </div>

                            <div class="col-md-10">
                                <div class="intro-info-tabs">

                                    <div class="tabcntr">
                                        <ul class="nav nav-tabs intro-tabs tabs-box " id="myTab" role="tablist">
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn active" id="prod-overview-tab"
                                                    data-toggle="tab" href="#prod-overview2" role="tab"
                                                    aria-controls="prod-overview" aria-selected="true"> TOEFL</a>
                                            </li>

                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#description2" role="tab"
                                                    aria-controls="description" aria-selected="false">IELTS</a>
                                            </li>

                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#Undergraduate2" role="tab"
                                                    aria-controls="description" aria-selected="false">PTE</a>
                                            </li>

                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#Postgraduate2" role="tab"
                                                    aria-controls="description" aria-selected="false">TEST NOT TAKE
                                                    YET</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <br>

                                    <div class="tab-content tabs-content" id="myTabContent">
                                        <!-- Home Tab -->
                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Description Tab -->
                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1">

                            </div>



                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <!--                                 <a href="javascript:;" class="form-wizard-submit float-right">Submit</a>
 -->
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Continue</a>


                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">

                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which academic test have you
                                taken OR are planning to take? </h2>

                            <h4 style="text-align: center;"> Scoring high in academic tests increases your options
                                multi fold.</h4>
                            <br>

                            <div class="col-md-1">

                            </div>

                            <div class="col-md-10">
                                <div class="intro-info-tabs">

                                    <div class="tabcntr">
                                        <ul class="nav nav-tabs intro-tabs tabs-box " id="myTab" role="tablist">
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn active" id="prod-overview-tab"
                                                    data-toggle="tab" href="#gre" role="tab"
                                                    aria-controls="prod-overview" aria-selected="true"> GRE</a>
                                            </li>

                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#gmat" role="tab"
                                                    aria-controls="description" aria-selected="false">IELTS</a>
                                            </li>



                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#not" role="tab"
                                                    aria-controls="description" aria-selected="false">TEST NOT TAKE
                                                    YET</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <br>

                                    <div class="tab-content tabs-content" id="myTabContent">
                                        <!-- Home Tab -->
                                        <div class="tab-pane tab" id="gre" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Description Tab -->
                                        <div class="tab-pane tab" id="gmat" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane tab" id="not" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1">

                            </div>



                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <!--                                 <a href="javascript:;" class="form-wizard-submit float-right">Submit</a> -->
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Check my Eligible</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="col-lg-1 col-md-6">

            </div>
        </div>
    </section>



    <!--Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center" style="margin-right:0px">

                                    <div class="col-md-6 tree-img">
                                        <!--<h4>What we have to offer for students</h4>-->
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true" class="myspan">&times;</span>
                                        </button>

                                        <!-- <img src="https://media.istockphoto.com/vectors/people-characters-filling-test-in-customer-survey-form-woman-and-man-vector-id1246557940?k=20&m=1246557940&s=612x612&w=0&h=0JIWha_DWpYR8wkiQU0N0sUHXxXvQG1zieRLY19KsBU="
                                         class="img-fluid" alt="Sample image"> -->



                                    </div>

                                    <div class="col-md-6"
                                        style="background: #8080802b;border-right: 3px solid #8080803b;border-radius: 20px;">
                                        <center>
                                            <h4 style="margin-top:70px">REQUEST AN ENQUIRY<br>we usually respond in
                                                seconds</h4>
                                        </center>
                                        <div class="modal-header">
                                            <!--<h5 class="modal-title" id="exampleModalLabel">Enquiry Now </h5>-->

                                        </div>
                                        <form class="mx-1 mx-md-4" id="bookingForm"
                                            action="https://reactoel.skylabsapp.com/enquiry" method="POST"
                                            autocomplete="off">
                                            <input type="hidden" name="_token"
                                                value="w1Uqpqj2VdTNaZ6NAmaG0jpQSUBRBlzDks489QOP">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fa fa-user-circle-o" aria-hidden="true"
                                                    style="height: 29px;padding: 0px 6px;font-size: 24px;color: #070758;"></i>
                                                <input type="text" class="form-control" name="full_name"
                                                    aria-describedby="emailHelp" placeholder="First Name">
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fa fa-envelope" aria-hidden="true"
                                                    style="height: 32px;padding: 0px 6px;font-size: 22px;color: #070758;"></i>
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Enter email">

                                            </div>
                                            <span
                                                style="margin-left: 37px;margin-bottom: 50px !important;position: relative;
                                             top: -8px;font-size: 12px;">We'll
                                                never share your email with anyone else.</span>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fa fa-mobile" aria-hidden="true"
                                                    style="height: 44px;padding: 0px 8px;font-size: 42px;color: #070758;"></i>
                                                <input type="text" name="mobile_number" class="form-control"
                                                    aria-describedby="emailHelp" placeholder="Enter mobile number">
                                            </div>


                                            <div class="form-group">
                                                <!--<label for="exampleFormControlSelect1">Example select</label>-->
                                                <select class="form-control" name="interested_in"
                                                    id="exampleFormControlSelect1"
                                                    style="padding:0px 0px; !important">
                                                    <option>Select Option</option>
                                                    <option value="Meet OEL Counsellors">Meet OEL Counsellors</option>
                                                    <option value="Psychometric Test">Psychometric Test</option>
                                                    <option value="Country Program & University Selection">Country
                                                        Program & University Selection</option>
                                                    <option value="Admission Guidance">Admission Guidance</option>
                                                    <option value="Test Preparation">Test Preparation</option>
                                                    <option value="Pre Test Preparation">Pre Test Preparation</option>
                                                    <option value="Resume Evaluation & Prepration">Resume Evaluation &
                                                        Prepration</option>
                                                    <option value="Visa & Interview Assistance">Visa & Interview
                                                        Assistance</option>
                                                    <option value="Travel & Medical Insurance">Travel & Medical
                                                        Insurance</option>
                                                    <option value="Foreign Exchange">Foreign Exchange</option>
                                                    <option value="Pre Departure Briefing">Pre Departure Briefing
                                                    </option>
                                                    <option value="Bon Voyage">Bon Voyage</option>

                                                </select>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" id="booking_enquiry"
                                                    class="btn btn-primary btn-lg">Submit Now</button>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


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

    <!-- Footer Start -->
    <footer id="rs-footer" class="rs-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                        <h4 class="widget-title">Other Links</h4>
                        <ul class="site-map">
                            <li><a href="about_us.html">About OEL</a></li>
                            <li><a href="contact_us.html">Contact Us</a></li>
                            <li><a href="allblogs.html">Blogs</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="frequently-asked-questions.html">FAQ</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li>
                                <a href="franchise-login.html">Franchise Login</a>
                            </li>
                            <li>
                                <a href="counselor_login.html">Counselor Login</a>
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
                                    <a
                                        href="{{ asset('cdn-cgi/l/email-protection.html#d6beb3baa696b9a0b3a4a5b3b7a5b3b2a3b5b7a2bfb9b8bab7b8b3f8b5b9bb') }}"><span
                                            class="__cf_email__"><span class="__cf_email__"
                                                data-cfemail="4129242d31012e37243332242032242534222035282e2f2d202f246f222e2c">[email&#160;protected]</span></span></a>
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
                            <p>&copy; 2021 Copyright <a href="index.htm">Overseas Education Lane</a> All Rights
                                Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-2 md-mb-20">
                        <span class="hitcounter">
                            <div id="sfcrrst5kwmd6ngef472jhluuyjzynf4g2a" style="width:100% !important"></div>
                            <!-- <script type="text/javascript"
                                src="https://counter10.stat.ovh/private/counter.js?c=rrst5kwmd6ngef472jhluuyjzynf4g2a&down=async" async></script> -->
                            <noscript>
                                <a href="https://www.freecounterstat.com" title="free website counter"><img
                                        src="private/freecounterstat.php?c=rrst5kwmd6ngef472jhluuyjzynf4g2a"
                                        border="0" title="free website counter" alt="free website counter"></a>
                            </noscript>
                        </span>
                    </div>
                    <div class="col-lg-3 text-right md-text-left">
                        <ul class="footer-social">
                            <li><a href="https://www.facebook.com/overseasedulane"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://twitter.com/LaneEducation"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/overseaseducation_lane/"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/75765761/admin/"><i
                                        class="fa fa-linkedin"></i></a></li>
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
<script>
    function ajaxRequest(id) {
        $('#appendImg88').empty();
        $.ajax({
            url: '{{route('get-country-flags')}}',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'country_id': id
            },
            success: function(data) {
                $.each(data.country, function(index, country) {
                    $("#showDiv").show();
                    $('#appendImg88').append(
                        `<div class="ml-3" style="width:8vw;height:8vw">
                            <img class="img-responsive w-100" height="200" width="200" src="{{asset('assets/flags/${country.name}.png')}}" />
                            <p class="countrypapa">${country.name.substring(0, 10)}</p><i class="fa fa-check hidden"></i>
                        </div>`
                    );
                });
            }
        });
        $('input[name="image[]"]').on('change', function() {
            var item = $(this).val();
            var url = "{{route('get-item-details')}}";
            $.ajax({
                url: url,
                type: "GET",
                data: {item: item, _token: $('meta[name="csrf-token"]').attr('content')},
                success: function(data) {
                    console.log(data);
                }
            });
        });
    }
</script>
<script type="text/javascript">
    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "select country",
        allowClear: true,
        tags: true, // creates new options on the fly
        templateResult: function(data) {
            if (!data.id) {
                return data.text;
            }
            var $image = $("<img>", {
                class: "select-image",
                src: $(data.element).data("image"),
                width: 24
            });
            var $text = $("<span>", {
                text: " " + data.text
            });
            return $("<span>").append($image).append($text);
        },
        templateSelection: function(data) {
            if (!data.id) {
                return data.text;
            }
            var $image = $("<img>", {
                class: "select-image",
                src: $(data.element).data("image"),
                width: 24
            });
            return $("<span>").append($image).append(" " + data.text);
        }
    });

    $(".js-select2").on('select2:unselect', function(e) {
        if ($(".js-select2").val() == null) {
            $("#showDiv").hide();
        }
    });
</script>
<script type="text/javascript">
    let mobile_header1_visible1 = false;

    function toggleMobileHeader() {
        if (mobile_header1_visible1 == false) {
            document.getElementById("mobile_header1").style.display = "block";
            mobile_header1_visible1 = true;
        } else {
            document.getElementById("mobile_header1").style.display = "none";
            mobile_header1_visible1 = false;
        }
    }
    document.getElementById("dropdown_trigger_nav2").addEventListener("click", function() {
        document.getElementById("user_dropdown_content2").style.display = "block";
    });
    document.addEventListener("click", function(event) {
        let el = document.getElementById("user_dropdown_content2");
        if (el !== null) {
            if (event.target.closest("#dropdown_trigger_nav2")) {
                el.style.display = "block";
            } else {
                el.style.display = "none";
            }
        }
    });
</script>

<script type="text/javascript">
    //============Shree=============
    var testSleep = function() {
        setTimeout(function() {
            $('#exampleModal').modal('show');
        }, 10000);
    }
    //=== Shree

    function clearStorage() {
        let session = sessionStorage.getItem('register');
        if (session == null) {
            localStorage.removeItem('visible_popup');
        }
        sessionStorage.setItem('register', 1);
    }
    window.addEventListener('load', clearStorage);
</script>

<script type="text/javascript">
    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "select country",
        allowClear: true,
        tags: true, // creates new options on the fly
        templateResult: function(data) {
            if (!data.id) {
                return data.text;
            }

            var $image = $("<img>", {
                class: "select-image",
                src: $(data.element).data("image"),
                width: 24
            });

            var $text = $("<span>", {
                text: " " + data.text
            });

            return $("<span>").append($image).append($text);
        },
        templateSelection: function(data) {
            if (!data.id) {
                return data.text;
            }

            var $image = $("<img>", {
                class: "select-image",
                src: $(data.element).data("image"),
                width: 24
            });

            return $("<span>").append($image).append(" " + data.text);
        }
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        // click on next button
        jQuery('.form-wizard-next-btn').click(function() {
            var parentFieldset = jQuery(this).parents('.wizard-fieldset');
            var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                '.form-wizard-steps .active');
            var next = jQuery(this);
            var nextWizardStep = true;
            parentFieldset.find('.wizard-required').each(function() {
                var thisValue = jQuery(this).val();

                if (thisValue == "") {
                    jQuery(this).siblings(".wizard-form-error").slideDown();
                    nextWizardStep = false;
                } else {
                    jQuery(this).siblings(".wizard-form-error").slideUp();
                }
            });
            if (nextWizardStep) {
                next.parents('.wizard-fieldset').removeClass("show", "400");
                currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',
                    "400");
                next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                jQuery(document).find('.wizard-fieldset').each(function() {
                    if (jQuery(this).hasClass('show')) {
                        var formAtrr = jQuery(this).attr('data-tab-content');
                        jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(
                            function() {
                                if (jQuery(this).attr('data-attr') == formAtrr) {
                                    jQuery(this).addClass('active');
                                    var innerWidth = jQuery(this).innerWidth();
                                    var position = jQuery(this).position();
                                    jQuery(document).find('.form-wizard-step-move').css({
                                        "left": position.left,
                                        "width": innerWidth
                                    });
                                } else {
                                    jQuery(this).removeClass('active');
                                }
                            });
                    }
                });
            }
        });
        //click on previous button
        jQuery('.form-wizard-previous-btn').click(function() {
            var counter = parseInt(jQuery(".wizard-counter").text());;
            var prev = jQuery(this);
            var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                '.form-wizard-steps .active');
            prev.parents('.wizard-fieldset').removeClass("show", "400");
            prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
            currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',
                "400");
            jQuery(document).find('.wizard-fieldset').each(function() {
                if (jQuery(this).hasClass('show')) {
                    var formAtrr = jQuery(this).attr('data-tab-content');
                    jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(
                        function() {
                            if (jQuery(this).attr('data-attr') == formAtrr) {
                                jQuery(this).addClass('active');
                                var innerWidth = jQuery(this).innerWidth();
                                var position = jQuery(this).position();
                                jQuery(document).find('.form-wizard-step-move').css({
                                    "left": position.left,
                                    "width": innerWidth
                                });
                            } else {
                                jQuery(this).removeClass('active');
                            }
                        });
                }
            });
        });
        //click on form submit button
        jQuery(document).on("click", ".form-wizard .form-wizard-submit", function() {
            var parentFieldset = jQuery(this).parents('.wizard-fieldset');
            var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                '.form-wizard-steps .active');
            parentFieldset.find('.wizard-required').each(function() {
                var thisValue = jQuery(this).val();
                if (thisValue == "") {
                    jQuery(this).siblings(".wizard-form-error").slideDown();
                } else {
                    jQuery(this).siblings(".wizard-form-error").slideUp();
                }
            });
        });
        // focus on input field check empty or not
        jQuery(".form-control").on('focus', function() {
            var tmpThis = jQuery(this).val();
            if (tmpThis == '') {
                jQuery(this).parent().addClass("focus-input");
            } else if (tmpThis != '') {
                jQuery(this).parent().addClass("focus-input");
            }
        }).on('blur', function() {
            var tmpThis = jQuery(this).val();
            if (tmpThis == '') {
                jQuery(this).parent().removeClass("focus-input");
                jQuery(this).siblings('.wizard-form-error').slideDown("3000");
            } else if (tmpThis != '') {
                jQuery(this).parent().addClass("focus-input");
                jQuery(this).siblings('.wizard-form-error').slideUp("3000");
            }
        });
    });
</script>

<script type="text/javascript">
    // image gallery
    // init the state from the input
    $(".image-checkbox").each(function() {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        } else {
            $(this).removeClass('image-checkbox-checked');
        }
    });

    // sync the state to the input
    $(".image-checkbox").on("click", function(e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked", !$checkbox.prop("checked"))

        e.preventDefault();
    });
</script>
<!-- Select2 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</html>
