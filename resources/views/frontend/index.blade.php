@extends('frontend.layouts.main')
@section('title', 'Home')
@section('content')
<style>
    .btn-shop {
    font-size: 15px;
    padding: 8px 13px;
    }
    .rc-carousel-item {
    margin: 0px 13px;
    }
 </style>
<style>
    .instagram-media {
        max-width: 400px !important;
        min-width: 350px !important;
        max-height: 400px !important;
        min-height: 300px !important;
    }
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
<div class="main-content">

    <video id="myVideo" style="width: 100%; margin: 0px auto;display: block;" autoplay="" muted="" loop="">
       <source src="https://hucpl.com/IELTS_landing/webinar_video.mp4" type="video/mp4">
       <source src="mov_bbb.ogg" type="video/ogg">
       Your browser does not support HTML video.
    </video>
    <div class="main-page-bottom-content"></div>
 </div>
 <!-- ankitcss -->

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
                @foreach ($service as $item)
                <div class="col-md-3">
                   <div class="subject-wrap bgc1">
                      <a href="">
                         <img src="{{ asset('imagesapi/' . $item->image) }}" alt="">
                         <h4 class="title2"> <b> {{ $item->name }}</b></h4>
                      </a>
                      <p>
                        <?php
                        $content = strip_tags($item->content);
                        $words = explode(' ', $content);
                        $content = implode(' ', array_slice($words, 0, 10));
                        echo $content . '...';
                        ?>
                      </p>
                   </div>
                </div>
                @endforeach
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
                      <h4 class="title"><a href="{{url('programs')}}">Find Programs Faster</a></h4>
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
          <div class="col-lg-6 pr-70 md-pr-15" style="width: 100%">
             <div class="img-part">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1000 918">
                    <image width="1000" height="918" xlink:href="{{asset('frontend/tree.png')}}"></image>
                    <a xlink:href="https://overseaseducationlane.com/bonvoyage" target="_blank">
                      <rect x="652" y="678" fill="#fff" opacity="0" width="106" height="77"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/predeparturebriefing" target="_blank">
                      <rect x="781" y="581" fill="#fff" opacity="0" width="110" height="53"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/resumeevaluation" target="_blank">
                      <rect x="656" y="110" fill="#fff" opacity="0" width="100" height="100"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/financialcounselling" target="_blank">
                      <rect x="703" y="305" fill="#fff" opacity="0" width="100" height="158"></rect>
                    </a><a xlink:href="#">
                      <rect x="880" y="326" fill="#fff" opacity="0" width="88" height="86"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/foreignexchange">
                      <rect x="811" y="456" fill="#fff" opacity="0" width="100" height="100" ></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/visa&amp;interview" target="_blank">
                      <rect x="557" y="518" fill="#fff" opacity="0" width="81" height="80" target="_blank"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/universityapplicationassistance">
                      <rect x="534" y="368" fill="#fff" opacity="0" width="82" height="81" target="_blank"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/psychometricstest">
                      <rect x="171" y="546" fill="#fff" opacity="0" width="86" height="86" target="_blank"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/countryprogram">
                      <rect x="113" y="310" fill="#fff" opacity="0" width="212" height="137" target="_blank"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/admissionguidance">
                      <rect x="209" y="120" fill="#fff" opacity="0" width="103" height="108"  target="_blank"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/testprepration">
                      <rect x="354" y="36" fill="#fff" opacity="0" width="100" height="100" target="_blank"></rect>
                    </a><a xlink:href="#">
                      <rect x="0" y="0" fill="#fff" opacity="0" width="100" height="100"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/pretestprepration">
                      <rect x="494" y="92" fill="#fff" opacity="0" width="116" height="152"></rect>
                    </a><a xlink:href="https://overseaseducationlane.com/meetoel">
                      <rect x="287" y="605" fill="#fff" opacity="0" width="140" height="86"></rect>
                    </a>
                  </svg>
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
                @foreach ($instagram as $key=>$item)
                    @if($key==0)
                    <div class="item active">
                    @else
                    <div class="item">
                    @endif
                       <div class="col-xs-12 col-sm-6 col-md-2">
                          @if(strpos($item->url,'embed') !== false)
                            <div class="instagram-video">
                                {!! str_replace('?igshid=', '?', $item->url) !!}
                            </div>
                          @endif
                       </div>
                    </div>
                @endforeach
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
        @foreach ($blogs as $item)
        <div class="col-lg-4 padding-0 md-pl-15 md-pr-15 md-mb-30">
           <div class="img-part">
              <img class=""
                 src="{{asset('imagesapi')}}/{{$item->image}}"
                 alt="About Image">
              <br> <br>
              <p style="text-align: center;">
                     {!! $item->text !!}
              </p>
           </div>
        </div>
        @endforeach
       </div>
    </div>
 </div>

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
                <div class="">
                   <ul class="crul">
                    @forelse ($ads as $item)
                    <li><img
                       src="{{asset($item->image)}}"
                       style="height: 250px"
                       alt="{{$item->title}}"
                       class="crim" /></li>
                    @empty

                    @endforelse
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
                <p style="text-align: center;">The STEM for Change Scholarship empowers women worldwide to pursue STEM education.<a href="{{url('programs')}}" style="float: right;text-align:center"> View All Courses</a></p>
             </div>
             @forelse ($programs as $item)
             <div class="col-lg-3 col-md-4 col-sm-4 mb-30">
                <div class="card" style="width: 100%;">

                   <img
                      src="{{asset($item->university_name->banner)}}"
                      class="card-img-top" alt="{{($item->university_name->university_name)}}">
                   <div class="card-body">
                      <h5 class="card-title">{{($item->name)}}</h5>
                      <p class="card-text">
                      </p>
                      <a href="{{'course-details/'}}{{$item->id}}" class="btn btn-primary w-100">View Course</a>
                   </div>
                </div>
             </div>
             @empty
             @endforelse

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
          @foreach ($testimonials as $key=>$item)
          @if($key ==0)
          <div class="col-md-8">
             <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                   <img
                      src="{{asset('imagesapi')}}/{{$item->profile_picture}}"
                      style="border-radius: 100%;border: 5px solid #d0cdcd;    padding: 2px;    background: white;">
                </div>
                <div class="col-md-4">
                   <h4>{{$item->name}}</h4>
                   <p>{{$item->location}}</p>
                </div>
             </div>
          </div>
          <div class="col-md-5">
          </div>
          @elseif ($key == 1)
          <div class="col-md-7">
             <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                   <img
                       src="{{asset('imagesapi')}}/{{$item->profile_picture}}"
                      style="border-radius: 100%;    border: 5px solid #d0cdcd;    padding: 2px;    background: white;">
                </div>
                <div class="col-md-4">
                    <h4>{{$item->name}}</h4>
                    <p>{{$item->location}}</p>
                </div>
             </div>
          </div>
          <div class="col-md-4">
          </div>
          @elseif ($key == 2)
          <div class="col-md-8">
             <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                   <br>
                   <img
                      src="{{asset('imagesapi')}}/{{$item->profile_picture}}"
                      style="border-radius: 100%;    border: 5px solid #d0cdcd;    padding: 2px;    background: white;">
                </div>
                <div class="col-md-4">
                   <br>
                   <h4>{{$item->name}}</h4>
                   <p>{{$item->location}}</p>
                </div>
             </div>
          </div>
          @endif
          @endforeach
       </div>
    </div>
 </div>

 <div class="rs-cta style7">
    <div class="partition-bg-wrap">
       <div class="container">
          <div class="row pt-40 md-pt-70 pb-40 md-pb-70">
             <div class="col-lg-6 md-pl-15 sm-pb-70 col-md-12 md-pb-70">
                <div class="sec-title2 mb-40">
                   <h2 class="white-color mb-16">Browse programs by category</h2>
                   <div class="row">
                      <div class="col-md-6">
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Art &amp; Design</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Business</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Computer Science</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Engineering</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> General Studies</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Medicine &amp; Health</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Tourism &amp; Hospitality</a> </div>
                      </div>
                      <div class="col-md-6">
                         <div class="mt-20"> <a class="btn-shop" href="/{{url('programs')}}"> Humanities</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Languages</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Law</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Media</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Science</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}"> Teaching</a> </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-lg-6 pl-62 md-pl-15 col-md-12">
                <div class="sec-title2 mb-20">
                   <h2 class="white-color mb-16">Browse programs by level</h2>
                   <div class="row">
                      <div class="col-md-6">
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">Bachelor's degree</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">Master's degree</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">Doctorate / PhD</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">MBA</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">MCA</a> </div>
                      </div>
                      <div class="col-md-6">
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">Graduate diploma</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">Diploma/certificate</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">Summer/Short course</a> </div>
                         <div class="mt-20"> <a class="btn-shop" href="{{url('programs')}}">Associate's degree</a> </div>
                      </div>
                   </div>
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
        @foreach ($universitiesltl as $item)
        <div class="rc-carousel-item" style="height: 100px">
            <a href="{{url('/universities')}}">
           <img class="rc-carousel-item-image"
              src="{{asset($item->logo)}}"
              alt="{{$item->name}}" /></a>
        </div>
        @endforeach
       </div>
    </div>
 </div>
 <div class="rc-carousel" style="--tiles: 18">
    <div class="rc-carousel-strip reverse">
       <div class="rc-carousel-box">
         @foreach ($universitiesrtl as $item)
         <div class="rc-carousel-item" style="height: 100px">
            <a href="{{url('/universities')}}">
            <img class="rc-carousel-item-image"
               src="{{asset($item->logo)}}"
               alt="{{$item->name}}" /></a>
         </div>
         @endforeach
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
 <div id="rs-about" class="rs-about style1" style="background-image: url({{asset('frontend/scrn.png')}});  padding: 80px;">
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
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
@endsection
