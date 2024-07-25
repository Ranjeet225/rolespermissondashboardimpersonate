@extends('frontend.layouts.main')
@section('title', 'Home')
@section('content')
<div class="main-content">
    <style type="text/css">
       .rs-slider.style1 .slider-content.slide2 {
       background: url('public/pages/slider/h2-2.png');
       background-size: cover;
       background-position: center;
       background-repeat: no-repeat;
       }
       .rs-slider.style1 .slider-content.slide1 {
       background: url('public/pages/slider/h2-1.png');
       background-size: cover;
       background-position: center;
       background-repeat: no-repeat;
       }
    </style>
    <video id="myVideo" style="width: 100%; margin: 0px auto;display: block;" autoplay="" muted="" loop="">
       <source src="https://hucpl.com/IELTS_landing/webinar_video.mp4" type="video/mp4">
       <source src="mov_bbb.ogg" type="video/ogg">
       Your browser does not support HTML video.
    </video>
    <div class="main-page-bottom-content"></div>
 </div>
 <!-- ankitcss -->
 <style>
    .nav-tabs {
    border-bottom: 1px solid transparent;
    }
    link.active {
    color: #495057;
    background-color: #fff;
    border-color: transparent !important;
    }
    #home-tab {
    border: 0px;
    background: #070758;
    color: white;
    }
    #contact-tab:active {
    border: none !important;
    }
    #contact1 {
    text-align: center;
    }
    #profile {
    text-align: center;
    }
    #home {
    text-align: center;
    }
    .tabbxx {
    background-color: #F7F9FF;
    padding: 30px 0px;
    text-align: center;
    }
    .nav-tabs .nav-item {
    margin: 0px 46px;
    }
    #home-tab {
    padding: 7px 26px;
    border-radius: 7px;
    }
    #home-tab {
    border: 0px;
    background: #1086f3;
    color: white;
    }
    #profile-tab {
    border: 0px;
    }
    #contact-tab {
    border: 0px;
    }
    .subject-wrap.bgc1 {
    padding: 15px 3px;
    background: #8080803b;
    text-align: center;
    border-radius: 10px;
    }
    .title2 {
    font-size: 15px;
    }
    #pills-tab {
    justify-content: center;
    align-items: center;
    }
    /* Heading */
    .heading1 {
    font-size: 2rem;
    text-align: center;
    }
    /* reference */
    .reference {
    text-align: center;
    }
    /* reference link */
    .reference-link {
    font-size: 1.25rem;
    font-weight: 600;
    }
    /* Carousel and animation css starts */
    .rc-carousel {
    --tile-size: 15rem;
    width: 100%;
    max-width: calc((var(--tile-size) + var(--box-gap)) * ((var(--tiles) / 2) - 1));
    margin: var(--box-gap) auto;
    overflow: hidden;
    position: relative;
    z-index: 10;
    }
    .rc-carousel::before,
    .rc-carousel::after {
    content: "";
    position: absolute;
    top: 0;
    width: 5rem;
    height: 100%;
    background-image: -webkit-gradient(linear,
    ,
    from(transparent),
    to(var(--body-bg)));
    background-image: -o-linear-gradient(var(--direction),
    transparent,
    var(--body-bg));
    background-image: linear-gradient(to var(--direction),
    transparent,
    var(--body-bg));
    z-index: inherit;
    }
    .rc-carousel::before {
    left: 0;
    --direction: left;
    }
    .rc-carousel::after {
    right: 0;
    --direction: right;
    }
    .rc-carousel-strip {
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    -webkit-animation: slideX 20s linear infinite;
    animation: slideX 20s linear infinite;
    --box-gap: 1.5rem;
    }
    .rc-carousel-strip.reverse {
    /* reverse animation */
    animation-direction: reverse;
    }
    .rc-carousel-strip:hover {
    -webkit-animation-play-state: paused;
    animation-play-state: paused;
    }
    .rc-carousel-box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    gap: var(--box-gap);
    }
    .rc-carousel-item {
    -ms-flex-negative: 0;
    flex-shrink: 0;
    width: var(--tile-size);
    height: var(--tile-size);
    }
    .rc-carousel-item-image {
    display: block;
    width: 100%;
    height: 100%;
    -o-object-fit: contain;
    object-fit: contain;
    -o-object-position: center;
    object-position: center;
    }
    @-webkit-keyframes slideX {
    100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
    }
    0% {
    -webkit-transform: translateX(calc(-1 * (var(--tile-size) + var(--box-gap)) * (var(--tiles) / 2)));
    transform: translateX(calc(-1 * (var(--tile-size) + var(--box-gap)) * (var(--tiles) / 2)));
    }
    }
    @keyframes slideX {
    100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
    }
    0% {
    -webkit-transform: translateX(calc(-1 * (var(--tile-size) + var(--box-gap)) * (var(--tiles) / 2)));
    transform: translateX(calc(-1 * (var(--tile-size) + var(--box-gap)) * (var(--tiles) / 2)));
    }
    }
    /* Animation won't work if you preferes reduced motion */
    @media (prefers-reduced-motion) {
    /* styles to apply if a user's device settings are set to reduced motion */
    .rc-carousel::before,
    .rc-carousel::after {
    display: none;
    }
    .rc-carousel-box {
    flex-wrap: wrap;
    justify-content: center;
    }
    .rc-carousel-box [aria-hidden="true"] {
    display: none;
    }
    .rc-carousel-strip {
    animation: none;
    }
    }
    /* reduced motion css ends */
    /* Carousel and animation css ends */
 </style>
 <!-- Latest compiled and minified CSS -->
 <!-- https://xstore.8theme.com/demos/hosting/-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
 <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
 <style type="text/css">
    #slider-text {
    display: block;
    }
    #slider-text .col-md-6 {
    overflow: hidden;
    }
    #slider-text h2 {
    font-family: 'Josefin Sans', sans-serif;
    font-weight: 400;
    font-size: 30px;
    letter-spacing: 3px;
    margin: 30px auto;
    padding-left: 40px;
    }
    #slider-text h2::after {
    border-top: 2px solid #c7c7c7;
    content: "";
    position: absolute;
    bottom: 35px;
    width: 100%;
    }
    #itemslider h4 {
    font-family: 'Josefin Sans', sans-serif;
    font-weight: 400;
    font-size: 12px;
    margin: 10px auto 3px;
    }
    #itemslider h5 {
    font-family: 'Josefin Sans', sans-serif;
    font-weight: bold;
    font-size: 12px;
    margin: 3px auto 2px;
    }
    #itemslider h6 {
    font-family: 'Josefin Sans', sans-serif;
    font-weight: 300;
    ;
    font-size: 10px;
    margin: 2px auto 5px;
    }
    .badge {
    background: #b20c0c;
    position: absolute;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    line-height: 31px;
    font-family: 'Josefin Sans', sans-serif;
    font-weight: 300;
    font-size: 14px;
    border: 2px solid #FFF;
    box-shadow: 0 0 0 1px #b20c0c;
    top: 5px;
    right: 25%;
    }
    #slider-control img {
    padding-top: 100%;
    margin: 0 auto;
    }
    @media screen and (max-width: 992px) {
    #slider-control img {
    padding-top: 70px;
    margin: 0 auto;
    }
    }
    .carousel-showmanymoveone .carousel-control {
    width: 4%;
    background-image: none;
    }
    .carousel-showmanymoveone .carousel-control.left {
    margin-left: 5px;
    }
    .carousel-showmanymoveone .carousel-control.right {
    margin-right: 5px;
    }
    .carousel-showmanymoveone .cloneditem-1,
    .carousel-showmanymoveone .cloneditem-2,
    .carousel-showmanymoveone .cloneditem-3,
    .carousel-showmanymoveone .cloneditem-4,
    .carousel-showmanymoveone .cloneditem-5 {
    display: none;
    }
    @media all and (min-width: 768px) {
    .carousel-showmanymoveone .carousel-inner>.active.left,
    .carousel-showmanymoveone .carousel-inner>.prev {
    left: -50%;
    }
    .carousel-showmanymoveone .carousel-inner>.active.right,
    .carousel-showmanymoveone .carousel-inner>.next {
    left: 50%;
    }
    .carousel-showmanymoveone .carousel-inner>.left,
    .carousel-showmanymoveone .carousel-inner>.prev.right,
    .carousel-showmanymoveone .carousel-inner>.active {
    left: 0;
    }
    .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
    display: block;
    }
    }
    @media all and (min-width: 768px) and (transform-3d),
    all and (min-width: 768px) and (-webkit-transform-3d) {
    .carousel-showmanymoveone .carousel-inner>.item.active.right,
    .carousel-showmanymoveone .carousel-inner>.item.next {
    -webkit-transform: translate3d(50%, 0, 0);
    transform: translate3d(50%, 0, 0);
    left: 0;
    }
    .carousel-showmanymoveone .carousel-inner>.item.active.left,
    .carousel-showmanymoveone .carousel-inner>.item.prev {
    -webkit-transform: translate3d(-50%, 0, 0);
    transform: translate3d(-50%, 0, 0);
    left: 0;
    }
    .carousel-showmanymoveone .carousel-inner>.item.left,
    .carousel-showmanymoveone .carousel-inner>.item.prev.right,
    .carousel-showmanymoveone .carousel-inner>.item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    left: 0;
    }
    }
    @media all and (min-width: 992px) {
    .carousel-showmanymoveone .carousel-inner>.active.left,
    .carousel-showmanymoveone .carousel-inner>.prev {
    left: -16.666%;
    }
    .carousel-showmanymoveone .carousel-inner>.active.right,
    .carousel-showmanymoveone .carousel-inner>.next {
    left: 16.666%;
    }
    .carousel-showmanymoveone .carousel-inner>.left,
    .carousel-showmanymoveone .carousel-inner>.prev.right,
    .carousel-showmanymoveone .carousel-inner>.active {
    left: 0;
    }
    .carousel-showmanymoveone .carousel-inner .cloneditem-2,
    .carousel-showmanymoveone .carousel-inner .cloneditem-3,
    .carousel-showmanymoveone .carousel-inner .cloneditem-4,
    .carousel-showmanymoveone .carousel-inner .cloneditem-5,
    .carousel-showmanymoveone .carousel-inner .cloneditem-6 {
    display: block;
    }
    }
    @media all and (min-width: 992px) and (transform-3d),
    all and (min-width: 992px) and (-webkit-transform-3d) {
    .carousel-showmanymoveone .carousel-inner>.item.active.right,
    .carousel-showmanymoveone .carousel-inner>.item.next {
    -webkit-transform: translate3d(16.666%, 0, 0);
    transform: translate3d(16.666%, 0, 0);
    left: 0;
    }
    .carousel-showmanymoveone .carousel-inner>.item.active.left,
    .carousel-showmanymoveone .carousel-inner>.item.prev {
    -webkit-transform: translate3d(-16.666%, 0, 0);
    transform: translate3d(-16.666%, 0, 0);
    left: 0;
    }
    .carousel-showmanymoveone .carousel-inner>.item.left,
    .carousel-showmanymoveone .carousel-inner>.item.prev.right,
    .carousel-showmanymoveone .carousel-inner>.item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    left: 0;
    }
    }
    .adimg {
    border-radius: 20px;
    }
 </style>
 <!-- Newsletter section start -->
 <style type="text/css">
    .newsletter_success {
    height: 54px;
    width: 100%;
    background: #4caf50;
    color: #fff;
    padding: 10px;
    font-size: 14px;
    display: flex;
    align-items: center;
    }
    .newsletter_error {
    height: 54px;
    width: 100%;
    background: #ff6434;
    color: #fff;
    padding: 10px;
    font-size: 14px;
    display: flex;
    align-items: center;
    }
    .newsletter_button {
    display: flex;
    align-items: center;
    }
    #newsletter_subs_show_loading {
    margin-right: 10px;
    }
    .rc-carousel {
    background: #f7f9ff;
    }
 </style>
 <div id="rs-about" class="rs-about style1 pb-40 mt-5  md-pb-30">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-4  padding-0 md-pl-15 md-pr-15 md-mb-30">
             <div class="img-part">
                <img
                   src="https://s3-alpha-sig.figma.com/img/aebc/66f7/3e890379b582bfe5644043b75a4a1062?Expires=1722211200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=BWuU5h-4RLcbfvkoD4H45cZ26iI5iB8bjw88Y49natCke1phpZsDWYmYPqV1LgBiuvGxgqr2y1Luz6HJa7-nMS4AgOTl84r9kXHNTDkxe88uqLEbWCp-8vfpJvsfyC5hW~vZIQ-FWaYD8JcMrZgolBklliOHaNWtxPg36J9UaMhVqb6qmD9lO-iYhSVQP3AJOQGKm2RnddhLBmz6kx9XsB2fAX4TbOzZ5pnN0J3XQyukBkbKN3nrtdjZKHrf37Xtz50eBjrysS2EmuUDyNxGrXOvn-o8NLkKVSTrDUP90zht6Sv1-wGJz8V8xBUXCxlcLWLXaN7i-vhizClwvBZ~Gg__"
                   style="width:100%">
             </div>
          </div>
          <div class="col-md-8  padding-0 md-pl-15 md-pr-15 md-mb-30">
             <h2 style=" text-align: center;"> We take <b style="font-weight: 800;"> STUDENTS </b> from <br> a stage of
             </h2>
             <br> <br>
             <div class="row">
                <div class="col-md-3">
                   <div class="subject-wrap bgc1">
                      <a
                         href="https://www.overseaseducationlane.com/quick_search?recommended_sort=&amp;search_education_level=1&amp;search_tution_fees=100000&amp;search_program_intake=&amp;exam_type%5B%5D=&amp;exam_date%5B%5D=&amp;listening_score%5B%5D=&amp;writing_score%5B%5D=&amp;reading_score%5B%5D=&amp;speaking_score%5B%5D=&amp;last_education_level=&amp;education_country=&amp;grading_scheme_id=&amp;search_min_gpa=">
                         <img src="idk.png" alt="">
                         <h4 class="title2"> <b> Confusion </b></h4>
                      </a>
                      <p>
                         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.
                      </p>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="subject-wrap bgc1">
                      <a
                         href="https://www.overseaseducationlane.com/quick_search?recommended_sort=&amp;search_education_level=1&amp;search_tution_fees=100000&amp;search_program_intake=&amp;exam_type%5B%5D=&amp;exam_date%5B%5D=&amp;listening_score%5B%5D=&amp;writing_score%5B%5D=&amp;reading_score%5B%5D=&amp;speaking_score%5B%5D=&amp;last_education_level=&amp;education_country=&amp;grading_scheme_id=&amp;search_min_gpa=">
                         <img src="eye.png" alt="">
                         <h4 class="title2"> <b> Clarity </b></h4>
                      </a>
                      <p>
                         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.
                      </p>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="subject-wrap bgc1">
                      <a
                         href="https://www.overseaseducationlane.com/quick_search?recommended_sort=&amp;search_education_level=1&amp;search_tution_fees=100000&amp;search_program_intake=&amp;exam_type%5B%5D=&amp;exam_date%5B%5D=&amp;listening_score%5B%5D=&amp;writing_score%5B%5D=&amp;reading_score%5B%5D=&amp;speaking_score%5B%5D=&amp;last_education_level=&amp;education_country=&amp;grading_scheme_id=&amp;search_min_gpa=">
                         <img src="cap.png" alt="">
                         <h4 class="title2"> <b> Admission </b></h4>
                      </a>
                      <p>
                         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.
                      </p>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="subject-wrap bgc1">
                      <a
                         href="https://www.overseaseducationlane.com/quick_search?recommended_sort=&amp;search_education_level=1&amp;search_tution_fees=100000&amp;search_program_intake=&amp;exam_type%5B%5D=&amp;exam_date%5B%5D=&amp;listening_score%5B%5D=&amp;writing_score%5B%5D=&amp;reading_score%5B%5D=&amp;speaking_score%5B%5D=&amp;last_education_level=&amp;education_country=&amp;grading_scheme_id=&amp;search_min_gpa=">
                         <img src="rd.png" alt="">
                         <h4 class="title2"> <b> Visa </b></h4>
                      </a>
                      <p>
                         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.
                      </p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <section style="background-color: #FDFDFD">
    <div class="container mt-5">
       <div clas="row">
          <div class="col-md-12">
             <br>
             <h2 style="text-align: center"> A Platform That Supports You End-to-End </h2>
             <img src="{{asset('frontend/images/uuu.png')}}" />
             <br>
             <br>
             <br>
             <br>
          </div>
          <br>
          <div class="container">
             <div class="row justify-content-center">
                <div class="col-lg-1 col-md-6 mb-30 aboutus_pill">
                </div>
                <div class="col-lg-3 col-md-6 mb-30 aboutus_pill">
                   <div class="" style="  text-align: center;">
                      <img
                         src="https://s3-alpha-sig.figma.com/img/bc25/45d4/4246376ec13eeb1b1bd8c1560e1236f5?Expires=1722211200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=W8KgnjD6VJvPsIGzUiXLXFlArGsbKm5sAFfgLU6s2h6n-GFfTFa3lHCwhUhm0da1ZnHiVl9nW~0miURfZw5M8hz-gZSgbJSO8ywjo20nUDJL0WIJ5Ky-5J6rhLHOIrHcSwtirUD5jNxaaWqI4zms47JbmsicENVN3VjHVBM3kh1mlrYrhy0aDY8awHqutdE6E66W1mOpwgw-V1bsdVbnhgTJ52VEPfY9ULrTPey~sbLze4pgnMQNxIu~b4nhl6nBZ6AFSQaTpWDRB6eCgROx6v4nMOWA4FS8ROzmDoRRiwudgrBlaNWDQERFfQO26W5Lbeil2wa6WStwCCRpaYd4Hw__"
                         alt="" style="height:50px;text-align: center">
                      <h4 class="title"><a>Find Programs Faster</a></h4>
                      <span class="course-qnty"></span>
                   </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-30 aboutus_pill">
                   <div class="" style="  text-align: center;">
                      <img
                         src="https://s3-alpha-sig.figma.com/img/2c66/5687/4d03b932e923575ec126da8d65e71367?Expires=1722211200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RLyeuXyG7-Af3w4qSWAiTD8Gh7sXFumMMYxkS1XBkdjbIEvaYbu4W~ROyY8ZfJ3GKjr5dOxyr1TbDWg13utdK2VqwQqbM9mAT5PmXmX1yjMDpMorl9yyMLFrAPYJ04vlPoJB9SnJIy7OP5olo3-iWfNTsnPp9ytxao7gQ-n0mfLEbOjUxPXhtAnA0oMMm9bgN~b3abCJpJze~68ke0HppNQrgYGD~e~ZizE76-m8vNga1uj1yr~Lw39yJJh6mXEVGDNQN-N64mUtXhFaVGbXpstlVlnn~x49waD7CghkhGKC0Qecf0olJajzhg5SB0VzDkB1QA8KUayQAHqz5yKpIg__"
                         alt="" style="height:50px;text-align: center">
                      <h4 class="title"><a> Helpful and Dedicated Support Team </a></h4>
                      <span class="course-qnty"></span>
                   </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-30 aboutus_pill">
                   <div class="" style="  text-align: center;">
                      <img
                         src="https://s3-alpha-sig.figma.com/img/ef8f/5b4d/fcdaf96762f9d5f4e3f910dfe43a4127?Expires=1722211200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=F60zTl5uLXuZ2K-4ce3IZ-MOE0AdIBYD5kGT~-kXVyJZVVs60DqcW5O08wXh22aC2tqNEhoOD3K0k1AKeSTG9UTCzXfur0AR3BwXra-5sApndgvkUj14ZCXa5Ww1-95Nxl4mQ0GKWYokInQhybLAr~F8r372BkIaHqKj2p~1m~uQhD0qzcHdnnnJ7npZKrDYqYJGmpSGvpLrLMMMYKu8YeGhE3A4fk0KUkRHLfV7SkahDw78gl0U4MaV0AImErpGI0fCURYfRCUMe-cJfysX7bheKpUTiyjViXMya2d2D6Eon8PgDTyLsTR0FADxADL~SsYScUlWwz69ui1qr3ToVQ__"
                         alt="" style="height:50px;text-align: center">
                      <h4 class="title"><a>Access to Exclusive Scholarships</a></h4>
                      <span class="course-qnty"></span>
                   </div>
                </div>
                <div class="col-lg-1 col-md-6 mb-30 aboutus_pill">
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <div id="rs-about" class="rs-about style1 pb-40  md-pt-70 md-pb-30">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-lg-6 padding-0 md-pl-15 md-pr-15 md-mb-30">
             <div class="img-part">
                <img class=""
                   src="https://s3-alpha-sig.figma.com/img/e00d/8949/63fc60f2cf9842ea47c43289aa5e5c7e?Expires=1722211200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fbpCg3QUNvFIJyeDeKISBmpADGDB6YR4b4D4af09kqO8KLo~blL5ybXWEg-dId1eHj9OexrQ34AxPiRgjFzFMVp61XFq0lNnQY8R8e3h0vxe89JipVhkaP5KqAr18qawQ-xqkvLcbpnGQZGSZSh5UV8hkujwGzFtzHdJkZgJN0RXd3e7YAQowG3bz8jEPI5pMbm9cDEHdgAPn2idA4Nd-REvjR~HTwazAIz-T~kFOcAirlxItuE9~WyAuaoctxPWLnwmQv0AgGxCtSDtgkRgT1Q9EZWT7oVyW1wyVHyfRQEB8nWeCngRym4hw7UOwpDV7ruFiORou68qBwZE4hdg8g__"
                   alt="About Image">
             </div>
          </div>
          <div class="col-lg-6 pr-70 md-pr-15">
             <div class="img-part">
                <img class=""
                   src="https://s3-alpha-sig.figma.com/img/bc5a/1fe5/8953d9d99a1f6584e825eb8bb21b1f6b?Expires=1722211200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=AZwX6XEiqG-QaR0C30nYuWVoLkY~nYj5qMgqUFS--1s-6rwKagAjRW2zbOM880x6XV0z-QGCxTNxWakoCJpJZVaq~e4KJ9c~WJUNk3LrFaZssJy5ne7ABinl8FRuvFcEwxO9UQcgGqxba5Cf7NdmRwHK8SWm4NVHXKhH-70bCMiOJZ6AgdPdjr5HQwsTxoj1cvqiM5CVmfJtS6d266ANiWXT4VfVj3-shixIS-4LA5v-oTV~Kp6utM3Jtv47GFXEXRaF83UqFoo~kChYMqZZ2aOnhoRd0P8gxYotPgpD~nYBWvOHwJvVv8BNFNzYOTPS0TbWm946J2~uglD~8x1ItQ__"
                   alt="About Image">
                <!--  <div class="careertree">
                   <a href="https://www.overseaseducationlane.com/admissionguidance"><img src="https://www.overseaseducationlane.com/public/img/pppp.png" border="0" usemap="#image-map"></a>

                   <map name="image-map">
                     <area shape="poly" href="https://www.overseaseducationlane.com/meetoel" coords="95,337,94,322,99,313,106,305,116,295,131,287,148,281,163,281,177,284,189,291,200,297,208,305,216,313,219,321,224,332,196,327,164,334,150,339,136,345,123,349,110,349,99,345">

                     <area href="https://www.overseaseducationlane.com/psychometricstest" coords="44,274,51,267,62,263,75,259,84,259,93,259,103,259,111,259,121,259,131,259,140,260,152,263,143,267,133,272,125,277,116,282,105,290,98,298,89,304,79,311,70,318,61,321,53,320,45,318,38,311,34,304,35,295,37,283" shape="poly">

                     <area href="https://www.overseaseducationlane.com/countryprogram" coords="6,183,12,204,7,191,21,214,30,224,45,234,57,240,68,243,81,245,96,246,110,246,122,246,132,246,146,246,157,246,167,246,178,249,186,252,194,256,189,239,182,223,174,206,165,194,156,181,147,170,138,159,123,150,110,143,95,136,83,129,66,123,49,120,34,122,24,128,16,137,9,151,6,166" shape="poly">


                     <area href="https://www.overseaseducationlane.com/admissionguidance" coords="156,142,154,125,150,110,142,93,131,74,117,58,107,51,94,47,81,48,68,52,59,61,55,73,55,87,59,98,67,107,77,114,94,118,112,120,132,126,145,134" shape="poly">



                     <area href="https://www.overseaseducationlane.com/testprepration" coords="141,11,135,22,132,38,136,54,141,65,147,77,154,92,161,109,164,116,170,97,177,81,185,67,193,51,198,34,196,20,188,9,175,4,159,3" shape="poly">

                     <area href="https://www.overseaseducationlane.com/pretestprepration" coords="264,29,272,37,277,57,278,78,273,97,263,117,250,134,237,146,224,155,215,166,205,174,195,186,192,199,186,184,181,164,181,144,182,120,187,100,194,80,201,63,215,44,227,32,248,25" shape="poly">

                     <area href="https://www.overseaseducationlane.com/resumeevaluation" coords="288,39,282,51,280,69,282,88,283,108,283,126,280,137,273,150,264,163,276,158,293,147,309,133,323,117,334,104,342,82,347,69,347,53,341,39,332,32,323,28,310,28" shape="poly">

                     <area href="https://www.overseaseducationlane.com/universityapplicationassistance" coords="245,170,222,185,212,203,209,217,209,231,214,241,218,249,222,241,229,234,238,228,257,223,271,216,278,203,278,192,272,181,264,172,254,169" shape="poly">

                     <area href="https://www.overseaseducationlane.com/financialcounselling" coords="355,132,336,139,322,149,313,162,307,178,304,202,304,223,304,245,303,264,301,280,297,296,310,291,334,267,350,244,367,212,378,188,378,163,375,149,368,137" shape="poly">

                     <area href="https://www.overseaseducationlane.com/visa&amp;interview" coords="247,247,236,259,236,276,237,291,242,303,245,315,249,326,259,318,267,308,273,297,278,285,282,274,281,259,275,244,267,239" shape="poly">

                     <area href="https://www.overseaseducationlane.com/travel&amp;medical" coords="399,154,383,183,370,222,409,209,436,203,453,195,454,170,443,153,429,145,411,148" shape="poly">

                     <area href="https://www.overseaseducationlane.com/foreignexchange" coords="385,220,367,229,354,241,348,252,345,268,345,283,356,275,369,270,385,272,405,272,418,262,423,247,417,227,406,220" shape="poly">

                     <area href="https://www.overseaseducationlane.com/predeparturebriefing" coords="355,284,332,296,300,315,336,327,364,328,396,315,411,300,408,284,397,278,378,275" shape="poly">

                     <area href="https://www.overseaseducationlane.com/bonvoyage" coords="308,328,285,332,260,345,244,359,268,363,297,370,313,378,331,374,347,365,350,348,343,334,331,329" shape="poly">

                   </map>
                   </div> -->
             </div>
          </div>
       </div>
    </div>
 </div>
 <div id="rs-about" class="rs-about style1 pb-40 pt-100 md-pt-70 md-pb-30">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
             <div class="img-part">
                <img src="{{asset('frontend/images/plane.gif')}}" />
             </div>
          </div>
          <div class="col-md-2">
          </div>
       </div>
    </div>
 </div>
 <div id="rs-about" class="rs-about style1 pb-40 pt-100 md-pt-70 md-pb-30">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
             <div class="img-part">
                <h1 style="text-align: center;font-weight: 700"> What Our Partners Have to Say </h1>
             </div>
          </div>
          <div class="col-md-2">
          </div>
       </div>
    </div>
 </div>
 <!-- Item slider-->
 <div class="container-fluid">
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="carousel carousel-showmanymoveone slide" id="itemslider">
             <div class="carousel-inner">
                <div class="item active">
                   <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="#"><img
                         src="https://s3-alpha-sig.figma.com/img/47f5/398c/adf48e9507e2d618a00255436c6c87ae?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=W4FJyJWQ~1Qa7j1aBwBlDRXNP1AMWWFlt4W3KNyXmbGUMp3gQjrJ9fR27sSi91fgm7~EED0l-liggC3hzbDoz-zW9swyArQ5KCpgXXB7LkbqY1DjZTQo1QafTDVgv-hyz5Gq5b0K3YA3JjoXxNui7jVv1EFhTi~sEWMUFGEMTROZzhBbXkUl8EAHZiBR-AuxxfDnSkzZJMoRRAt-dxTJIDMeQj559c1pJqn6ipCh3n~id2I6Kx8qhRRVrOxynwIJm8ljIISfhFsB1rM35J2MyNWLT8BvZeiLsso4vGYlcFLiOov4U5cyhS-6lHGRNsvKiR10JMDS8tUuMtVdGdHQ9Q__"
                         class="adimg"></a>
                   </div>
                </div>
                <div class="item">
                   <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="#"><img
                         src="https://s3-alpha-sig.figma.com/img/4b70/123c/c5ecacf2fabeb270faaf27b24d19cdf1?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ZDgzJqwc7Z~vrbzxP1ys9XrneYRf9Zhe3ygaOvZIRvTCmKDx5zNK0PKMsTd-dyDwXTtnidtiQ1oWz-xuaNAKluhwuYoKkqszajnuvmZr1bbIG458v5A5iSLCXETqriPm9vAGmh7m8L8n0NX5z~5PClpnUnpn3w3MQ-OhY-MaP6MSkfS9faErThoIrGSxVidD8OC1iDlAPSr~mB-IljQCP0g97j-kX2Lma33iWjtPeYr~H6xuu3zjbCIoTZLDQkkZmc73y8E~ke74UiJj0NyT2LSlq~OWnlX1QEKk1OilJh3RCIPSM7OXZH9mDDRw-rRw6KcMUwYUmgsqW0LKrCn4EQ__"
                         class="adimg"></a>
                   </div>
                </div>
                <div class="item">
                   <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="#"><img
                         src="https://s3-alpha-sig.figma.com/img/698b/a3b2/19c212ce77ad8208ca63238a792c8a1d?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=eXEaNk9tvedgksnF5pVke4Ntz51BXJxtwty9~kRiqgZcn-DeJ5T1v5rg1FCBVP17KZKXhKnf4eFxDb231lkd4p0dwxAUjP6Svbg625YAq82PDORM~xp-UhhFKAB7FC7Cv2gz28pAHEhymlSge0j6AUskLgKt0axImMdC33appZ4-ueNW9x6Jm0NcFWaGABLbln~SXHyJvKIjYz7n3Hj-bH4zz3cWU~tiNOOb6bkvlJliTPbxk0YN-6RayOGZlEyVQ0ymEnzctLsetLJtm6ezbthks9qeST0XvmIyyyH7vV8-TPpMcS7haQJTXuDjThe22lT58M1qpSHsbE1zmqoPVQ__"
                         class="adimg" class="img-responsive center-block"></a>
                   </div>
                </div>
                <div class="item">
                   <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="#"><img
                         src="https://s3-alpha-sig.figma.com/img/a07c/c3ff/c2e452048231abcb437405b1b4f245ab?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=GaArgY42H08PBNz8gaa1X-Zcl6ECf1u9em6lJekUHAM31qLsP~4At8EsD4xdlqwBEH-mbYIiIYOUPs2LpvlagS6pe2VzVkV0sfVA6RqL2nymZeso35pc85ob-ocfzeO6fzWdIKzcE9S8tj6bBqO5FpEggSXnQrg67uppPdwEl0mkplKRC4VunhoqRJqIWTnrfvLFOWlKBLMwQyrmgABq5lvedOpJVueLL8fj-TdRxh~iyDiQnCKQ8DHqkrsjToGlHPMxg~n0AUGpdqXaC0CkU~X8KUJaFuGrBk1zyDjCV5rizOarB8PTMbidrivF9em~3H9JIpokWMwVOOV-ME1mwg__"
                         class="adimg" class="img-responsive center-block"></a>
                   </div>
                </div>
                <div class="item">
                   <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="#"><img
                         src="https://s3-alpha-sig.figma.com/img/0a7a/d116/3f9e0a88b9cafa5c3cc69e757951f0f4?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=JYMnW6xyWNl1Ummt688urTxZdpERzeqEpG2PjzKuhL9tS5pqqvAaQtorhARRqc3cFeYJwM430PuM1M61zoW4ieym84hJxaYxyqMFoQfif8BlHsrBtmJ6szmFUfqq2csuSvDkaEFwFXzMl7BOMnck1WFeC-GiIGx5nm2q-VPy0Gc34HMHy0GOH14-Y40Xu1TJPiS0L30ocEFz204Ilb5ZxRV-yCamG6uXtokEKfyt4tmfgDt9fycJVAZNu4USR1EXne1tO7akyKqq2ayrvYDTja2UY-h808TJiFQeyR4Q1aH3FNqr9~kFzdRwq2yBpQVQe~6J-m8riiC5gKr48psQ6A__"
                         class="adimg"></a>
                   </div>
                </div>
                <div class="item">
                   <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="#"><img
                         src="https://s3-alpha-sig.figma.com/img/2fdd/d453/ee1af5219fd2b722b8a50ed757d60015?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mhifVZbi9sg5S5Ki~BApRYBSyr-oZ~Ch1Dhi7c0XRWlJEt9eSTjrHEyTTfDTF94QMzQ8pd8qp-o~CY6CkFMv1LmcFCyzeUn4v7lgHv8bGJwwwjdDkaAg-tVyAgM7oc-XcPBiajphoNfMxNEK400SH~h0wC-TbuX~M-uIWwdQaR6NncVFJ9H8BghYfOnb69e2z8IwnA56Dvip9hWqy48WqXaMZj-A73yxLMVkM64XwZRhM8qqHA05E2uuUPsNXjSmFphP8sbtwxbcZGTjRl6M4g36trsytchCFwGFc~qWzHiL3caQo4v4HpiWK1HDQD0j7MQvFmwJnLh7qTGT6E6xFA__"
                         class="adimg" class="img-responsive center-block"></a>
                   </div>
                </div>
             </div>
             <div id="slider-control">
                <a class="left carousel-control" href="#itemslider" data-slide="prev"><img
                   src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png" alt="Left"
                   class="img-responsive"></a>
                <a class="right carousel-control" href="#itemslider" data-slide="next"><img
                   src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right"
                   class="img-responsive"></a>
             </div>
          </div>
       </div>
    </div>
 </div>


 <script type="text/javascript">
    $(document).ready(function () {
      $('#itemslider').carousel({ interval: 3000 });
      $('.carousel-showmanymoveone .item').each(function () {
        var itemToClone = $(this);
        for (var i = 1; i < 6; i++) {
          itemToClone = itemToClone.next();
          if (!itemToClone.length) {
            itemToClone = $(this).siblings(':first');
          }
          itemToClone.children(':first-child').clone()
            .addClass("cloneditem-" + (i))
            .appendTo($(this));
        }
      });
    });
 </script>
 <div id="rs-about" class="rs-about style1 pb-40 pt-100 md-pt-70 md-pb-30">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
             <div class="img-part">
                <h1 style="text-align: center;font-weight: 700"> We’re Passionate About Making Education Accessible for
                   Everyone
                </h1>
             </div>
          </div>
          <div class="col-md-2">
          </div>
       </div>
    </div>
 </div>
 <div id="rs-about" class="rs-about style1 pb-40  md-pt-70 md-pb-30">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-lg-6 padding-0 md-pl-15 md-pr-15 md-mb-30">
             <div class="img-part">
                <img class=""
                   src="https://s3-alpha-sig.figma.com/img/f3c5/e656/9544cb48ee6a14b03d79cd19a0e81aa5?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ZUHrYffuWM97MeHQ~DhifgULX9xeqUj29DFB7BVQC1BvwgNUUr~sbsAHAnZ9ClJSl7NqUQfPwmdtpkNdjsCWpTsdb-06dsCm4VE8XeK6Hv083eW5wCHT6nn4TXjB0a25jkww77oGX~E5utNnkNpgehVCkpCXZF3yIOgSQ0ckv~cdIJUsXp8t1TEppNzAU775ia5LmoYBbxZ1jTY9QHjBRjqJ0ZuG86sH~FVHA8gLO5EhkZgsXneb12H2KwzG4rOY4i8ID1ICHOvSKJM-jcfBIpP01fPetMnq0bansU7HQqaZjAnz9kYnf1U2xEYb-T60i1Fs1N66UWZHbx33P2Fliw__"
                   alt="About Image">
                <br> <br>
                <p style="text-align: center;">
                   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                   pariatur. Excepteur sint occaecat cupidatat non proident.
                </p>
             </div>
          </div>
          <div class="col-lg-6 pr-70 md-pr-15">
             <div class="img-part">
                <img class=""
                   src="https://s3-alpha-sig.figma.com/img/f3c5/e656/9544cb48ee6a14b03d79cd19a0e81aa5?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ZUHrYffuWM97MeHQ~DhifgULX9xeqUj29DFB7BVQC1BvwgNUUr~sbsAHAnZ9ClJSl7NqUQfPwmdtpkNdjsCWpTsdb-06dsCm4VE8XeK6Hv083eW5wCHT6nn4TXjB0a25jkww77oGX~E5utNnkNpgehVCkpCXZF3yIOgSQ0ckv~cdIJUsXp8t1TEppNzAU775ia5LmoYBbxZ1jTY9QHjBRjqJ0ZuG86sH~FVHA8gLO5EhkZgsXneb12H2KwzG4rOY4i8ID1ICHOvSKJM-jcfBIpP01fPetMnq0bansU7HQqaZjAnz9kYnf1U2xEYb-T60i1Fs1N66UWZHbx33P2Fliw__"
                   alt="About Image">
                <br> <br>
                <p style="text-align: center;">
                   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                   pariatur. Excepteur sint occaecat cupidatat non proidentm.
                </p>
             </div>
          </div>
       </div>
    </div>
 </div>
 <style>
    .crim {
    display: block;
    width: 100%;
    }
    .crsec {
    width: 100%;
    overflow: hidden;
    }
    .art {
    display: flex;
    width: 200%;
    animation: bannermove 20s linear infinite;
    }
    .art.paused {
    -webkit-animation-play-state: paused;
    animation-play-state: paused;
    }
    .crdiv {
    width: 100%;
    }
    .crul {
    display: flex;
    list-style-type: none;
    padding-left: 0;
    margin: 0;
    }
    .crul li {
    width: 100%;
    }
    .crul li:nth-child(2) {}
    .crul li:nth-child(3) {}
    @keyframes "bannermove" {
    0% {
    transform: translateX(0);
    }
    100% {
    transform: translateX(-50%);
    }
    }
    .btn.btn-primary.w-100:hover {
    background: #070758;
    background-color: rgb(7, 7, 88);
    }
 </style>
 <div id="rs-about" class="rs-about style1 pb-40  pt-100 md-pt-70 md-pb-30" style="background: #F7F9FF">
    <div class="container-fuild">
       <div class="row align-items-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
             <div class="img-part">
                <h1 style="text-align: center;font-weight: 700"> We Support the Entire Sector with Student
                   Guidance and Thought Leadership
                </h1>
                <p style="text-align: center;"> The STEM for Change Scholarship seeks to drive diversity and inclusion by
                   empowering women worldwide to pursue an education in STEM. See how we surprised the 2021 recipients.
                </p>
                <br>
             </div>
          </div>
          <div class="col-md-2">
          </div>
          <section class="crsec">
             <article class="art">
                <div class="crdiv">
                   <ul class="crul">
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/2ec0/5da4/10ee0e982600bc84f88e5af4919de055?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Hd9rFX90oTN5b-qrNeiffU9sbkrGEfYwNFsM0SNgiuESDJj4aZokY2UU8IkQ9wK3dPvPgZEi2W0Z9krEFuis9PrBnLQ5x4653AvzkaXouq~CkyMu7oyprGcyRIpJE6DaM4KoPeA-V9n679tsbfGrghtMf-ms1La2uRton6-Z7EMPd-iJCTe7pr0fzEfN4fUybMk-g8aMQe8lF91nZ1pgrbVTqXKISt0Woqnu6lqfR15SZ1ECi~fM8ykcew83DvG~0crT~Kbsv2SPPkP9joVHUYQBQXBl4YOOTk2u81~fUMW10r~QezHayqbZE0x9OiMTd3Y00ON05f9YostFpG4WRw__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/8571/0c21/d25a27ba122503084c040dbee2d67299?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Ni2VYxCvQ4t1wOgkE45UJj-XkKNNg~FhMMPjoNv0Z~OLi~cdIx9~mUmtbe68mGfAkaW5Z6M2-6sxS5RBESz7rbTvt-wYfekSswG~ebsSo5fuJC8VQZnk1H7vXpidm~UtIcKPg53ozoSDM8tgK9KjrdmEDl6Udw738fRoHY-VFo0wiyJwtgKWbbwjeMMI6XuTN0QcyTzjWFLEdw3nq7rMq5KLaIE136qaz1cg609~20iVbgdBQmAAl5WHMuw~GQ2W9sbJg65bIf6Z7HZozcg~iMwJLaKhc3OtOgkcP-OxTJIBx6wwDRhs790yryedaSmjrUtC1FGVyop6VVgWXV20rg__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/bfab/0ded/5b6aede9b3f755f0a93cdb07b9e93794?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=pr79CzD0mtBSLW6k1EhzWxALAy9XN4oxEEsbR2n6fBX1kwueBNpnsm6RjfpDPtXAzZqkJ2VEi2cHM~QyBRITIuok6iXyoaZSJDmnkbe5j0pDSBlfEbpB9xWzri~djLnOLRu8QAN41Gyd--JIKovHcNbqkOr1gXqEsb9vdo50kp5GTyQdotXbwOjGJT6FvE9IgaTs4DZ1emrf3AGnHY5t3iFQd9oCPyIFZruF1DNdvmvz7WOpORcivZUg4gUZMvxL58n8PTpIROX8ENclRDdImDYhI2~aPZtIiJaMiFNDYYHkdUJO0niSKprosLBrVmb1ZtoLT~xDTIABzRP32ILq0Q__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/5942/2834/3a4eb3e84a5dc9a77f83c8add24ceb06?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=iw22Y6JQMUpMQIjh46RE5JhOvZIVXxjMyTw2T9WtTPAotGqsO9829Q3VLno0~EWscre8QM~6sLcGv5OGnwkgiSCmvo6ddrp-e8nROhJLplZNlifFSPqDM4H-LDDN6R20kwQCnaPAfeXPciOtwRnkxiScXFnKoCAWQa6hf0Q0kvQBcLKZbdTytm-JGhp8bZpBWJt4Py8xzJes~hlW~vIJFehsHYYEQT2G7HtHWmQ4b43hGDqdZm~plfnAMCex-o0YvBYQGXFsLe1nAADVcLom-QJzmsGTuixAe8HyricNyaEFeu1Uu7-5AYWTPO9M1nJpzs99i65GG4ujcO901TOLaw__"
                         class="crim" /></li>
                   </ul>
                </div>
                <div class="crdiv">
                   <ul class="crul">
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/2ec0/5da4/10ee0e982600bc84f88e5af4919de055?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Hd9rFX90oTN5b-qrNeiffU9sbkrGEfYwNFsM0SNgiuESDJj4aZokY2UU8IkQ9wK3dPvPgZEi2W0Z9krEFuis9PrBnLQ5x4653AvzkaXouq~CkyMu7oyprGcyRIpJE6DaM4KoPeA-V9n679tsbfGrghtMf-ms1La2uRton6-Z7EMPd-iJCTe7pr0fzEfN4fUybMk-g8aMQe8lF91nZ1pgrbVTqXKISt0Woqnu6lqfR15SZ1ECi~fM8ykcew83DvG~0crT~Kbsv2SPPkP9joVHUYQBQXBl4YOOTk2u81~fUMW10r~QezHayqbZE0x9OiMTd3Y00ON05f9YostFpG4WRw__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/8571/0c21/d25a27ba122503084c040dbee2d67299?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Ni2VYxCvQ4t1wOgkE45UJj-XkKNNg~FhMMPjoNv0Z~OLi~cdIx9~mUmtbe68mGfAkaW5Z6M2-6sxS5RBESz7rbTvt-wYfekSswG~ebsSo5fuJC8VQZnk1H7vXpidm~UtIcKPg53ozoSDM8tgK9KjrdmEDl6Udw738fRoHY-VFo0wiyJwtgKWbbwjeMMI6XuTN0QcyTzjWFLEdw3nq7rMq5KLaIE136qaz1cg609~20iVbgdBQmAAl5WHMuw~GQ2W9sbJg65bIf6Z7HZozcg~iMwJLaKhc3OtOgkcP-OxTJIBx6wwDRhs790yryedaSmjrUtC1FGVyop6VVgWXV20rg__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/bfab/0ded/5b6aede9b3f755f0a93cdb07b9e93794?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=pr79CzD0mtBSLW6k1EhzWxALAy9XN4oxEEsbR2n6fBX1kwueBNpnsm6RjfpDPtXAzZqkJ2VEi2cHM~QyBRITIuok6iXyoaZSJDmnkbe5j0pDSBlfEbpB9xWzri~djLnOLRu8QAN41Gyd--JIKovHcNbqkOr1gXqEsb9vdo50kp5GTyQdotXbwOjGJT6FvE9IgaTs4DZ1emrf3AGnHY5t3iFQd9oCPyIFZruF1DNdvmvz7WOpORcivZUg4gUZMvxL58n8PTpIROX8ENclRDdImDYhI2~aPZtIiJaMiFNDYYHkdUJO0niSKprosLBrVmb1ZtoLT~xDTIABzRP32ILq0Q__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/5942/2834/3a4eb3e84a5dc9a77f83c8add24ceb06?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=iw22Y6JQMUpMQIjh46RE5JhOvZIVXxjMyTw2T9WtTPAotGqsO9829Q3VLno0~EWscre8QM~6sLcGv5OGnwkgiSCmvo6ddrp-e8nROhJLplZNlifFSPqDM4H-LDDN6R20kwQCnaPAfeXPciOtwRnkxiScXFnKoCAWQa6hf0Q0kvQBcLKZbdTytm-JGhp8bZpBWJt4Py8xzJes~hlW~vIJFehsHYYEQT2G7HtHWmQ4b43hGDqdZm~plfnAMCex-o0YvBYQGXFsLe1nAADVcLom-QJzmsGTuixAe8HyricNyaEFeu1Uu7-5AYWTPO9M1nJpzs99i65GG4ujcO901TOLaw__"
                         class="crim" /></li>
                   </ul>
                </div>
                <div class="crdiv">
                   <ul class="crul">
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/2ec0/5da4/10ee0e982600bc84f88e5af4919de055?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Hd9rFX90oTN5b-qrNeiffU9sbkrGEfYwNFsM0SNgiuESDJj4aZokY2UU8IkQ9wK3dPvPgZEi2W0Z9krEFuis9PrBnLQ5x4653AvzkaXouq~CkyMu7oyprGcyRIpJE6DaM4KoPeA-V9n679tsbfGrghtMf-ms1La2uRton6-Z7EMPd-iJCTe7pr0fzEfN4fUybMk-g8aMQe8lF91nZ1pgrbVTqXKISt0Woqnu6lqfR15SZ1ECi~fM8ykcew83DvG~0crT~Kbsv2SPPkP9joVHUYQBQXBl4YOOTk2u81~fUMW10r~QezHayqbZE0x9OiMTd3Y00ON05f9YostFpG4WRw__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/8571/0c21/d25a27ba122503084c040dbee2d67299?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Ni2VYxCvQ4t1wOgkE45UJj-XkKNNg~FhMMPjoNv0Z~OLi~cdIx9~mUmtbe68mGfAkaW5Z6M2-6sxS5RBESz7rbTvt-wYfekSswG~ebsSo5fuJC8VQZnk1H7vXpidm~UtIcKPg53ozoSDM8tgK9KjrdmEDl6Udw738fRoHY-VFo0wiyJwtgKWbbwjeMMI6XuTN0QcyTzjWFLEdw3nq7rMq5KLaIE136qaz1cg609~20iVbgdBQmAAl5WHMuw~GQ2W9sbJg65bIf6Z7HZozcg~iMwJLaKhc3OtOgkcP-OxTJIBx6wwDRhs790yryedaSmjrUtC1FGVyop6VVgWXV20rg__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/bfab/0ded/5b6aede9b3f755f0a93cdb07b9e93794?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=pr79CzD0mtBSLW6k1EhzWxALAy9XN4oxEEsbR2n6fBX1kwueBNpnsm6RjfpDPtXAzZqkJ2VEi2cHM~QyBRITIuok6iXyoaZSJDmnkbe5j0pDSBlfEbpB9xWzri~djLnOLRu8QAN41Gyd--JIKovHcNbqkOr1gXqEsb9vdo50kp5GTyQdotXbwOjGJT6FvE9IgaTs4DZ1emrf3AGnHY5t3iFQd9oCPyIFZruF1DNdvmvz7WOpORcivZUg4gUZMvxL58n8PTpIROX8ENclRDdImDYhI2~aPZtIiJaMiFNDYYHkdUJO0niSKprosLBrVmb1ZtoLT~xDTIABzRP32ILq0Q__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/5942/2834/3a4eb3e84a5dc9a77f83c8add24ceb06?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=iw22Y6JQMUpMQIjh46RE5JhOvZIVXxjMyTw2T9WtTPAotGqsO9829Q3VLno0~EWscre8QM~6sLcGv5OGnwkgiSCmvo6ddrp-e8nROhJLplZNlifFSPqDM4H-LDDN6R20kwQCnaPAfeXPciOtwRnkxiScXFnKoCAWQa6hf0Q0kvQBcLKZbdTytm-JGhp8bZpBWJt4Py8xzJes~hlW~vIJFehsHYYEQT2G7HtHWmQ4b43hGDqdZm~plfnAMCex-o0YvBYQGXFsLe1nAADVcLom-QJzmsGTuixAe8HyricNyaEFeu1Uu7-5AYWTPO9M1nJpzs99i65GG4ujcO901TOLaw__"
                         class="crim" /></li>
                   </ul>
                </div>
                <div class="crdiv">
                   <ul class="crul">
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/2f93/8a6c/dd798de04c408f6c837d80f7587295a0?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=B-MHrF552vGStQPLtZcJThkvcNhwmPIkItpUgFKXOoBD1XjadHo5bPvu1JwzxZ4adbsi0Yjr7quy3wHGL2iz1c6vxAmn3VVAYhj0g1d9oXremFaqRfoLvE8jJNqcq9W8w4vyKYZzC8NF8XvErlTdYdsIIYAUqyhGXPEujHojrAR~quKZBTKDxGuaWzada4rAie8lGzP71dLNxO5ViRiajpv5km~VdhF7uh6rUO7XSJ1IYmHCeWeLsGopSRrKMDnn9pZhEpxXr~Ry4dwW204N54OpK-dL~Vf~f9oWLYneuTXbYraDus7EfY5tvgiTK~5JtCm2yOFjxYrFIAjU5wjNzQ__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/d999/5285/ce7d23f1fe1b6a687f532630fe80ee22?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=eMomqzPMe1PjyKQIZ3cLt1pO0BZWYKYmZ4L0rkPG5QYGYqi-lRfjmz75BEWH-aeDT0qMArzh-lYMhq6IrfEnI1oRq0w31BaGUmcYiJSp6mAc9vJXaWVwIX52F153fa9SfKaErCNvZdLalQQzp65GBOv3i3Kda2bfGV5fx7JP~AHwr-BVOncdK98G9-XY4Ang~dFNLl5ZBChglBDUqDoU5O6AGTt1qWT~IKqOzpJUbKps-SlnBINxG9TPITLrddsf7T7nIJjQ1C3Dor48vry69EBg2V6K8MYwxigyTm-qUrmVY6TcXyCp8OI1w3uOCeUJFc0ZeY3YWnGKPvRvxPWYNg__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/b01c/1872/9c482906db64ae4e07f86b187fa9dab0?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=K1ZSxix6kLEbLXvqkFfd0QoXPHnVCFPq32C6mveFVcI1Ei9aTbOd08HXmY1bIS7FpUgu8c6scvNg1AsQuTqOUX~xPqv30yhyl2JFtgdkEIju~Yd4QvtE~EUEPU8oOQigRPmRIy5-4T6PQsoHdFvaexyiKQp~NOaBge1TxD9dcEBcMo8ALCn~pN3E24chwRsoXwFgDvumVVZsoJ9MVEBnbYLy38IvJWuIwC4JICwj-5OF-Z2wcj7F0r3cVyJ90I6SQ-J5HnyHSVh10l6VAy5~DqNVo7WZY~0FrH287DIzTEllI2A~qlOKnG4L6U~YJdX7EdStxxR1MgO9~pV42epanQ__"
                         class="crim" /></li>
                      <li><img
                         src="https://s3-alpha-sig.figma.com/img/b78e/fa1f/d16277d90b35923a7716870d9b53b048?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=dOtuiXvgLtPmWnQXd4~3as7c4bS12HBDq5b6jwlTqaLIzyDfO-FsHTzVNY3h1fOTRqCnSIcpQFy-uc-7E0Cq1aUObk6eBLN2sjYIlNaAlDdvshDSm2SBR5NVw079-D0V5kzlF3vUbu0ykJCKlmLIUchITOEqkuzLFJr7n5d-ae2W1T89IaTcZqvZSVnOF0x9OsHbxnimkmdTK~Aw9NFPn15kjMW0gj0fhIJbWEcmGJqzcxVgZufE9kkRX4KKWeKYw5nKLs-YLRxdVByXyV4JrYEZfugD7pLNE4MTDcQQrcJncxT1xUl5kGKBKMWwvmbMBVdH8EyULZuCjuslS97lsA__"
                         class="crim" /></li>
                   </ul>
                </div>
             </article>
          </section>
       </div>
    </div>
 </div>
 <div id="rs-about" class="rs-about style1 pb-40 pt-100 md-pt-50 md-pb-30">
    <div class="container-fuild">
       <div class="row align-items-center">
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
             <div class="img-part">
                <h1 style="text-align: center;font-weight: 700">Most Viewed Courses</h1>
                <p style="text-align: center;"> The STEM for Change Scholarship seeks to drive diversity and inclusion by
                   empowering women worldwide to pursue an education in STEM. See how we surprised the 2021 recipients.
                </p>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-4 mb-30">
                <div class="card" style="width: 100%;">
                   <img
                      src="https://s3-alpha-sig.figma.com/img/c695/53a0/f10cf840f006c702bf22c063a277bdd8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=nb~N4TeMotKmtrXgDB16~IHjEVeG~BwmdYV3tAABqgO9aAiFzCWMTsXkJl0sruakrLHo3oWGIwhIWRk0~7bAfZGQfbgwM7MwCkCHcjozl3~1zQ9YP6w0YXNRc1oUGOexIo~ZMrTVIsSMiaYZ6k3EZvcB6QaCrJZL87NFcojhEXsuBeXgZb4Fd~S7WBNNFG~effbKpAYzxTuRoCOSP3919L9ybDdcoTliyNhUsy-YAz3DLMqyhSMigH4JNH6KHggV~nP~ejOcupwOkjTm5482eRWS7hGmewUKC35qfD2stP8YKmeRFBd1EZ-Za4s3UKwIAa9c7QLx2CtZ88bJrVnM3w__"
                      class="card-img-top" alt="...">
                   <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                         card's content.
                      </p>
                      <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-4 mb-30">
                <div class="card" style="width: 100%;">
                   <img
                      src="https://s3-alpha-sig.figma.com/img/915c/9b40/709027768a5f9ce8f887142f5d50e1f1?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=jC7bodOrGjMe5AbB8MQ1IP7g4mU7m8STenY9A37ft~5D9Yq7xMiLahAJbzMucpIa0YbmoIl747TeXeLxrbWMGgqCz25FPa4vRsI4eAd9MBwL9b3l3bM6bAKyL6spPKaqWNmynlyKFFsc6vR-W2Ic-eHkM4cE1EbBajEhvohoef7n~zWxn9CRZjntecgPogEe9hYkKCIreFXhfTckQcZO-cXfsaFx~Dk393qSizx7kEbhA4WjmaFzFfp4pguFlb0HiTOGU291NvNIlJYWYN7I2NeOou4mFBikZ5mORTu1lsZ~k5wv30RqQc~uQt008U3mGltDWuEJ4Z3Afd8kaWJZtQ__"
                      class="card-img-top" alt="...">
                   <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                         card's content.
                      </p>
                      <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-4 mb-30">
                <div class="card" style="width: 100%;">
                   <img
                      src="https://s3-alpha-sig.figma.com/img/b230/58c8/5618afcf20fbc0a95f2fa62159c24420?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=V5ApPsgOC1fyHUYbPyxrJjCHAlHlOkYC1MbFmOfeEDeSqwwQ2124Vs~luNbjtL-Nt45QOLtuF6OlPry-DEMTSexc~zBrPJ1JZBnsy7Pj5FcrpYVcLbAHnTQ~sSrCeMP~A-s6TMbXQ69KgbKNCRGkLHWAGOqLt51~YgyMoM8asrBvdtJMDHbyQ2lAe8a~FdO3SEURXqJsqOUVEG4zll3MDkJtmYovRIavg0-IBgO9NJApW-QiWZgpcK5RowheKkQbpOujpGIT~225rHHWUNNeiqkbl7QWAnHKpabObsMnQUq8yBAwcULtx98yeg5EhvRcMbhSqwzFWp0btJhFKo1~5Q__"
                      class="card-img-top" alt="...">
                   <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                         card's content.
                      </p>
                      <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-4 mb-30">
                <div class="card" style="width: 100%;">
                   <img
                      src="https://s3-alpha-sig.figma.com/img/915c/9b40/709027768a5f9ce8f887142f5d50e1f1?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=jC7bodOrGjMe5AbB8MQ1IP7g4mU7m8STenY9A37ft~5D9Yq7xMiLahAJbzMucpIa0YbmoIl747TeXeLxrbWMGgqCz25FPa4vRsI4eAd9MBwL9b3l3bM6bAKyL6spPKaqWNmynlyKFFsc6vR-W2Ic-eHkM4cE1EbBajEhvohoef7n~zWxn9CRZjntecgPogEe9hYkKCIreFXhfTckQcZO-cXfsaFx~Dk393qSizx7kEbhA4WjmaFzFfp4pguFlb0HiTOGU291NvNIlJYWYN7I2NeOou4mFBikZ5mORTu1lsZ~k5wv30RqQc~uQt008U3mGltDWuEJ4Z3Afd8kaWJZtQ__"
                      class="card-img-top" alt="...">
                   <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                         card's content.
                      </p>
                      <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-1">
          </div>
       </div>
    </div>
 </div>
 <div id="rs-about" class="rs-about style1 pb-40  md-pt-70 md-pb-30" style="background-image: url(bkl2.png);">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-4">
             <div class="img-part" style="position: relative; top: 120px;">
                <h1 style="font-weight: 700"> Students feedback</h1>
                <h1 style="color:#21a7d0;font-weight: 700"> worth ₹7,00,00,000*</h1>
                <p> Win up to ₹ 3,00,000* to study in the UK, Canada & US. </p>
                <br>
             </div>
          </div>
          <div class="col-md-8">
             <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                   <img
                      src="https://s3-alpha-sig.figma.com/img/c666/5347/4c8c58ca88650363e7fb08ee0c19d728?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=U5A5lHb8euqrl2GfJomJ9yJG6mez9OJ7fwl1WpyKbH~lmY6WDX1zqwKciiIAPkl9rbyrux1P4Xc7DmgwGTDqnByfktny7ZgXFnRGm4~DbF4l-XB~9rwB5LJRB1HKab4mLJmrNUcgRqNLg0K7R-v2q~p2OsXFdw06q-LU-iwVipNzA9J3RW1wuwvqtaO9a-r2fjUF6FCRQJyWM2TdGoAdnxg5Um44PLtnTSxpuPtJDKUUB8Aif2bXz8Jxi7WY--CQ2Tz2CNuKc63oUxVoe0u7k~0GGIMB7Q0~6fh458cLThkpaIF97YjJ4hyQ9Xf9cpFz~cEb2rpWVC8eUZFfMR56aw__"
                      style="border-radius: 100%;border: 5px solid #d0cdcd;    padding: 2px;    background: white;">
                </div>
                <div class="col-md-4">
                   <h4> Kamakshi Upreti</h4>
                   <p>Ghaziabad, UP</p>
                </div>
             </div>
          </div>
          <div class="col-md-5">
          </div>
          <div class="col-md-7">
             <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                   <img
                      src="https://s3-alpha-sig.figma.com/img/e2a5/0220/be99befcd4656d5c9b1a338a8cb504a4?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=n5IGSH0eEKnd0RKB7M8a-MME26cPcK8cFbt6AYLd3LTGdDAPKkN0HetHK43zCKK47waLjo4DugzcNq8Z81c5eQ-UGGL3bobyAxQWRlun1SvIX-U16hnQlDzt27VW9qOWvqjMKM~Q56pU~ekoojA5vMY19K8qQPcH582YeJh1uY-ssqHA0NejLEe~5iIpt57K4o9ZrDvY-Iv89M0OaXB4Kz7aa0JLJCrqCsaM9BAX-NLKh-d9nTvy52lHTRtfKe1~KOBh-j3pJMtkNWGj-LtTxRBIefE7rLbtadJrR6tbyQaufy19ekLBrGnuRETomdlDMQS~CoTDqQru~afTRRKY4A__"
                      style="border-radius: 100%;    border: 5px solid #d0cdcd;    padding: 2px;    background: white;">
                </div>
                <div class="col-md-4">
                   <h4> Kamakshi Upreti</h4>
                   <p>Ghaziabad, UP</p>
                </div>
             </div>
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-8">
             <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                   <br>
                   <img
                      src="https://s3-alpha-sig.figma.com/img/f5ea/9148/e40d1c93c3c447aa4f6993b92a86c0b6?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=LG0W-AAJQ50hJU4O8PkjKct7jj32GvP~o5hnRwrhVXpASn~wOPkx0cJpZZoSEpwhZk5N6O5k8nLT6wgRDxbP7MLr3aDnQyo5aTEJoFrrWflu-jjrMHE6IVPzF7oL27WMhPQowAqv9W6pIf1yMNKRUstokDZv8J8dBrl69cxDqQyGU5iFan6vJ7zT8mxGFZyOEyb0PL4d9yxUOxaIa0shuXGD76PkDy9Cr~cF7ukHohvN0ClcYwO7Ft0Mf239ZxZYhq6vBvmg0ATjupIz~UqjH6UB~iJu412ifEDRKPbp2HIpNsII7K4BaLFhOF65VbVcS~OlaiH0Qs~zeZcifEX2dw__"
                      style="border-radius: 100%;    border: 5px solid #d0cdcd;    padding: 2px;    background: white;">
                </div>
                <div class="col-md-4">
                   <br>
                   <h4> Kamakshi Upreti</h4>
                   <p>Ghaziabad, UP</p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <style>
    .btn-shop {
    font-size: 15px;
    padding: 8px 13px;
    }
    .rc-carousel-item {
    margin: 0px 13px;
    }
 </style>
 <div id="rs-about" class="rs-about style1   md-pt-70 md-pb-30"
    style="background-image: url(g.png);padding: 110px 0px">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-4">
             <div class="img-part">
                <h3 style="font-weight: 700; text-align: center;"> Browse programs by category</h3>
                <div class="row">
                   <div class="col-md-4">
                      <div class="mt-20"> <a class="btn-shop"
                         href="/courses?country=&amp;university_id=&amp;program_name=Archaeology"> Humanities</a> </div>
                      <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                      <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                   </div>
                   <div class="col-md-4">
                      <div class="mt-20"> <a class="btn-shop"
                         href="/courses?country=&amp;university_id=&amp;program_name=Archaeology"> Humanities</a> </div>
                      <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                      <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                   </div>
                   <div class="col-md-4">
                      <div class="mt-20"> <a class="btn-shop"
                         href="/courses?country=&amp;university_id=&amp;program_name=Archaeology"> Humanities</a> </div>
                      <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                      <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <!--    <div class="img-part ">
                <img src="https://s3-alpha-sig.figma.com/img/af70/088f/748f947ae97cad7f4d3cce6ea2c4cf97?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=l7-tEY2kQMWs5THKj7g-mXxFmauvwTNTNz-37dSbo9NqcOjliHGD7jcwLTFPFlCSmfLxjTJvOQnEQe02bB0Fzyrg-bAXe-A2g9M0-TlbEmfSPf8tdKRwCZtXv1y-GcBjg1qFrqQYEt5fTTw9tMHpcRy7XAi8GbFwOEMNBKoKhHX5l3P3Y7fVVpHQVQp5MgjEk3~9F5mqB4UdqIxSEW8QsXgAVJDdJQoNHS6qBZmVKGB5hEAl49x9QsEJ6ZBpkAaXYa9vgHyCBCHsgSK7byDPZzDqNwzI1-Kk-ZujfY8RTYXtM194MM9au50bJjmDWvFaSFR-n3LG~9AsKcJStHNZhA__">                          </div> -->
          </div>
          <div class="col-md-4">
             <h3 style="font-weight: 700; text-align: center;x">Browse programs by level</h3>
             <div class="row">
                <div class="col-md-4">
                   <div class="mt-20"> <a class="btn-shop"
                      href="/courses?country=&amp;university_id=&amp;program_name=Archaeology"> Humanities</a> </div>
                   <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                   <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                </div>
                <div class="col-md-4">
                   <div class="mt-20"> <a class="btn-shop"
                      href="/courses?country=&amp;university_id=&amp;program_name=Archaeology"> Humanities</a> </div>
                   <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                   <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                </div>
                <div class="col-md-4">
                   <div class="mt-20"> <a class="btn-shop"
                      href="/courses?country=&amp;university_id=&amp;program_name=Archaeology"> Humanities</a> </div>
                   <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                   <div class="mt-20"> <a class="btn-shop" href="#"> Languages</a> </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div id="rs-about" class="rs-about style1   md-pt-70 md-pb-30">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-12">
             <div class="img-part">
                <br> <br>
                <h2 style="text-align: center;"> University Partners</h2>
                <h4 style="font-weight: 700; text-align: center;"> 346+ and growing</h4>
                <br> <br>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="rc-carousel" style="--tiles: 18;">
    <div class="rc-carousel-strip">
       <div class="rc-carousel-box">
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/6aa1/b403/59c58a4c23aeb056076ef561cbad71e8?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kDdSIE1dJC3fvyu3GYzcuWhzmCMWtwNaI1yr-IKcnPmcC0ET39CBvGYJM9~XXuD7pSqQJZVVR3wSmcBBB8Omkts-7Ny0qmVc-dgqTpXL4VC8gg7o077KDs3uxEDF0ujd22GAe3uKOQ0pcMAiWXRx5VD4g5vYd8UUx0QdjY-Xdmkqr93WaBLXj3GdT39iESK64stP7~JoinQVcuuTR-paejm3wZb2Jd9BGxSPwdBUhwb6VJw12tBQlME3kZUNZsxFmmGSAgrb9lTtwaUJUxH~9G5P5twHAg9IWEoa8UOuUEfJpODuz3f~-lqm0VS0VbSRhdFHrJW9I1X3~6zAkBRZYQ__"
                alt="dhl" />
          </div>
       </div>
    </div>
 </div>
 <div class="rc-carousel" style="--tiles: 18">
    <div class="rc-carousel-strip reverse">
       <div class="rc-carousel-box">
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
          <div class="rc-carousel-item">
             <img class="rc-carousel-item-image"
                src="https://s3-alpha-sig.figma.com/img/8ab3/2528/43dd4a42dda54dd465e85a4a76e1861f?Expires=1722816000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mTREsEEOndfvmHgDaDXmbd6sHj39TLZts~y11cvtzecRbecjqhM9FqDWJ9~sFSTxdKU1iQ-KnZUfkpUrmshk2BfDEucz~ifybtYqE6UuCtWxi-S44Om5znm2Vu54Z9s~BvC7qZCHL5--AfBoQP9IIZcjalkJBuvC8Nx7MNN7fNNaeK1tEl7TG~GeqPQw-hp9QrY4tCud5Q78xZaUmK4laANCB8osk4~-XzntSVnHgMJUfkt3jph-BdGLikBTbe6Bw~De-0zgqv6UR7te3yj8IKqkNADB62RVsfzOrHuUvSRST6qkkOcObC55WS9ATWvl7nPSnSznmLDtya2m0vlGig__"
                alt="shopify" />
          </div>
       </div>
    </div>
 </div>
 <br>
 <div class="col-md-12">
    <div class="img-part">
       <h1 style="text-align: center;font-weight: 700"> Multi Country Advantage </h1>
       <br>
    </div>
 </div>
 <br><br>
 <div id="rs-about" class="rs-about style1" style="background-image: url(scrn.png);  padding: 80px;">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-8">
             <h1> The World is your Campus!</h1>
             <p> Aspire for more. Choose what suits you the best from 750+ global universities in 31 countries, world
                over. The choices and opportunities our universities offer are endless!
             </p>
             <p> <a href="#"> Explore Countries <i class="flaticon-right-arrow"></i> </a> </p>
          </div>
          <div class="col-md-4">
          </div>
       </div>
    </div>
 </div>


@endsection
