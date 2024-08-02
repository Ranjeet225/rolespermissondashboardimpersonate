@extends('frontend.layouts.main')
@section('title', 'About Oel')
@section('content')
<style>
    .aboutus_pill{
    height: 260px;
    }
    .aboutus_pill>div:first-child{
    height: inherit;
    overflow-y: hidden;
    }
    .text-center p{
    text-align: center !important;
    }
    .for-heading-med, .for-heading p{
    text-align: center !important;
    font-size: 20px;
    }
    .event-banner{
    content: "";
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(45, 64, 82, 0.5);
    background: url(../images/event-single.png) no-repeat center center / cover;
    z-index: -999;
    }
    @media  only screen and (max-width: 768px) {
    .for-heading-med, .for-heading h1 { font-size: 26px;}
    .for-heading p { font-size: 22px; margin-bottom: 0px;}
    }
    .jumbotron{
    border-radius: 0 !important;
    }
    p{
    text-align: justify !important;
    }
    .p-line{
    text-align: center !important;
    }
    @media  only screen and (max-width: 760px) {
    .about-part{
    margin-top: 0 !important;
    }
    }
</style>
<div class="main-content">
    <div class="rs-breadcrumbs breadcrumbs-overlay">
       <div class="breadcrumbs-img">
          <img src="{{asset('frontend/courses.jpg')}}" alt="Breadcrumbs Image">
       </div>
       <div class="breadcrumbs-text white-color">
          <h1 class="page-title">We are Overseas Education Lane</h1>
          <h4 class="dn-about">Empowering people around the world to study abroad and access the best education</h4>
       </div>
    </div>
    <div id="rs-about" class="rs-about style1 pb-40 pt-100 md-pt-70 md-pb-30">
       <div class="container">
          <div class="row align-items-center">
             <div class="col-lg-6 order-last padding-0 md-pl-15 md-pr-15 md-mb-30">
                <div class="img-part">
                   <img class="" src="{{asset('frontend/about3.png')}}" alt="About Image">
                </div>
             </div>
             <div class="col-lg-6 pr-70 md-pr-15">
                <div class="sec-title">
                   <div class="sub-title primary">Overseas Education Lane</div>
                   <!--<h2 class="title mb-17">About</h2>-->
                   <div class="bold-text mb-22">One of the biggest challenges students of tier 2 and tier 3 cities in India face is accessibility to quality international education unlike their counterparts in Metros and Tier 1 cities. </div>
                   <div class="desc">Overseas Education Lane, a venture of Ekon Solutions India Pvt Ltd was incepted to bridge this divide and provide equal opportunities of higher education. We are a one-stop-solution, facilitating assistance to the students and simplify the hassled process of college selection, admission, test, VISA and Accommodation. We help students make the right choice when it comes to pursuing education abroad.</div>
                   <div class="desc">Our innovative approach has filled this gap by making over 3000 global educational institutions and their programs accessible to the students living in smaller towns and cities.  We’ve counselled and placed over 1000 students in some reputed institutions all over the world with 100% success rate. </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-30">
       <div class="container">
          <div class="row align-items-center">
             <div class="col-lg-6 padding-0 md-pl-15 md-pr-15 md-mb-30">
                <div class="img-part">
                   <img class="" src="{{asset('frontend/history.jpg')}}" alt="About Image">
                </div>
             </div>
             <div class="offset-lg-1"></div>
             <div class="col-lg-5">
                <div class="tab-content tabs-content" id="myTabContent">
                   <div class="tab-pane tab fade show active" id="about-history" role="tabpanel" aria-labelledby="about-history-tab">
                      <div class="sec-title mb-25">
                         <h2 class="title">Mission</h2>
                         <div class="desc">To clear all the doubts of students through counselling and recommend right course and destination after analysing their interest and financial background. We work to make the hassled process of Application to getting Visa streamlined.</div>
                      </div>
                      <div class="sec-title mb-25">
                         <h2 class="title">Vision</h2>
                         <div class="desc">Our mission is to make higher education overseas accessible for the everyone and to provide assistance to students seeking admission overseas. We opened our doors more than 10 years ago, and since then we have been consistently providing the necessary support and quality consultation services for studying overseas.</div>
                      </div>
                   </div>
                   <div class="tab-pane fade" id="about-mission" role="tabpanel" aria-labelledby="about-mission-tab">
                      <div class="sec-title mb-25">
                         <h2 class="title">Vision</h2>
                         <div class="desc">Our mission is to make higher education overseas accessible for the everyone and to provide assistance to students seeking admission overseas. We opened our doors more than 10 years ago, and since then we have been consistently providing the necessary support and quality consultation services for studying overseas.</div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- Intro Info Tabs-->
       </div>
    </div>
    <div class="rs-subject values style1 pt-94 pb-30 md-pt-64 md-pb-30">
       <div class="container">
          <div class="sec-title mb-60 text-center md-mb-30">
             <div class="sub-title primary">Our Values</div>
             <h2 class="title mb-0">At Overseas Education Lane, we commit to: </h2>
          </div>
          <div class="row justify-content-center">
             <div class="col-lg-4 col-md-6 mb-30 aboutus_pill">
                <div class="subject-wrap bgc1">
                   <img src="{{asset('frontend/student_success-1.png')}}" alt="">
                   <h4 class="title"><a>Trust and Transparency</a></h4>
                   <span class="course-qnty"></span>
                </div>
             </div>
             <div class="col-lg-4 col-md-6 mb-30 aboutus_pill">
                <div class="subject-wrap bgc2 text-light">
                   <img src="{{asset('frontend/customer_experience.png')}}" alt="">
                   <h4 class="title"><a>Mutual Respect</a></h4>
                   <span class="course-qnty"></span>
                </div>
             </div>
             <div class="col-lg-4 col-md-6 mb-30 aboutus_pill">
                <div class="subject-wrap bgc3">
                   <img src="{{asset('frontend/pages/about_us/taking_ownership.png')}}" alt="">
                   <h4 class="title"><a>Quality</a></h4>
                   <span class="course-qnty"></span>
                </div>
             </div>
             <div class="col-lg-4 col-md-6 mb-30 aboutus_pill">
                <div class="subject-wrap bgc4">
                   <img src="{{asset('frontend/innovating_improving.png')}}" alt="">
                   <h4 class="title"><a>Excellence </a></h4>
                   <span class="course-qnty"></span>
                </div>
             </div>
             <div class="col-lg-4 col-md-6 mb-30 aboutus_pill">
                <div class="subject-wrap bgc5">
                   <img src="{{asset('frontend/have_fun.png')}}" alt="">
                   <h4 class="title"><a>Customer Orientation </a></h4>
                   <span class="course-qnty"></span>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
