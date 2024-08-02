@extends('frontend.layouts.main')

@section('title', 'OverseasEducationLane')
@section('content')


    <style>
        .search-slt {
            display: block;
            width: 100%;
            font-size: 0.875rem;
            line-height: 1.5;
            color: #55595c;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            height: calc(3rem + 2px) !important;
            border-radius: 0;
        }

        /*--------*/
        .consultant-info-div ul {
            list-style: circle;
            padding-left: 20px;
        }

        .consultant-info-div label {
            display: block;
            font-size: 14px;
            color: #9b9b9b;
            font-weight: 500;
        }

        .consultant-info-div span {
            color: #4a4a4a;
            font-weight: 500;
            font-size: 16px;
        }

        .consultant-image {
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
            width: 180px;
            height: 180px;
        }
    </style>

    <!-- body content start here -->

    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-course-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{ asset('frontend/pages/faq/faq_banner.jpg') }}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Psychometric Test</h1>
                <!--
              <ul>
               <li>
                <a class="active" href="https://overseaseducationlane.com">Home</a>
               </li>
               <li><a>Vas Services</a></li>
               <li>Psychometric Test</li>
              </ul>
              -->
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- About Section Start -->
        <div id="rs-about" class="rs-popular-courses style3 pb-40 pt-100 md-mt--140 md-pt-70 md-pb-30">
            <div class="container">
                <div class="row clearfix">
                    <!-- Content Column -->
                    <div class="col-lg-8 md-mb-50">
                        <p>Psychometric Test is a test researched and designed to assess the aptitude and tendency of the
                            students. It is a holistic method implemented to measure potential based on ability, personality
                            and interests.</p>

                        <p>Our counsellors put students through this test and figure out their mind-set and aptitude. They
                            identify the areas of interest and recommend right courses and destinations.</p>
                        <!-- Intro Info Tabs-->
                        <!--
                                    <div class="intro-info-tabs">
                                        <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab" href="#prod-overview" role="tab" aria-controls="prod-overview" aria-selected="true">Overview</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn" id="prod-curriculum-tab" data-toggle="tab" href="#prod-curriculum" role="tab" aria-controls="prod-curriculum" aria-selected="false">Curriculum</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn" id="prod-instructor-tab" data-toggle="tab" href="#prod-instructor" role="tab" aria-controls="prod-instructor" aria-selected="false">Instructor</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn" id="prod-faq-tab" data-toggle="tab" href="#prod-faq" role="tab" aria-controls="prod-faq" aria-selected="false">Faq</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn" id="prod-reviews-tab" data-toggle="tab" href="#prod-reviews" role="tab" aria-controls="prod-reviews" aria-selected="false">Assessment types
        </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tabs-content" id="myTabContent">
                                            <div class="tab-pane tab fade active show" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                                                <div class="content white-bg pt-30">
                                                    <!- - Cource Overview -  ->
                                                    <div class="course-overview">
                                                        <div class="inner-box">
                                                            <h4>Know more about Psychometric Test</h4>
                                                            <p>Psychometric exam helps in determining your abilities, knowledge, and personality. They are frequently employed in preliminary screening or as part of an assessment centre. They are objective, convenient, and good predictors of job performance, making them extremely popular.</p>
                                                            <p>The vast majority of psychometric testing is done online; however, some paper surveys are still used. The majority of exams are timed; however, some can be done in numerous sessions.</p>
                                                <p>Personality testing and aptitude tests are the two basic categories of psychometric test.</p>

                                                 <p>Personality tests delve into your interests, beliefs, and motivations, examining how your personality matches the position and organisation. In a variety of circumstances, they examine your emotions, behaviours, and connections.</p>
                                                <p>Aptitude exams evaluate your reasoning or mental capacity to determine if you have the necessary expertise for a profession. When presented under exam settings, you will frequently be allowed one minute to complete each multiple choice question. Aptitude exam has 5 sub-categories.</p>

                                                <p><b>Numerical reasoning</b></p>
                                                <p><b>Verbal reasoning</b></p>
                                                <p><b>Abstract reasoning</b></p>
                                                <p><b>Situational judgemen</b></p>
                                                <p><b>Error checking</b></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="prod-curriculum" role="tabpanel" aria-labelledby="prod-curriculum-tab">
                                                <div class="content">
                                                    <div id="accordion" class="accordion-box">
                                                        <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                                    <h3 class="instructor-title">Curriculum</h3>

                   </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="prod-instructor" role="tabpanel" aria-labelledby="prod-instructor-tab">
                                                <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                                    <h3 class="instructor-title">Instructors</h3>
                                                    <div class="row rs-team style1 orange-color transparent-bg clearfix">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                                            <div class="team-item">
                                                                <img src="/home/images/1.jpg" alt="">
                                                                <div class="content-part">
                                                                    <h4 class="name"><a href="#">Jhon Pedrocas</a></h4>
                                                                    <span class="designation">Professor</span>
                                                                    <ul class="social-links">
                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="team-item">
                                                                <img src="/home/images/2.jpg" alt="">
                                                                <div class="content-part">
                                                                    <h4 class="name"><a href="#">Jhon Pedrocas</a></h4>
                                                                    <span class="designation">Professor</span>
                                                                    <ul class="social-links">
                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="prod-faq" role="tabpanel" aria-labelledby="prod-faq-tab">
                                                <div class="content">
                                                    <div id="accordion3" class="accordion-box">
                                                        <div class="card accordion block">
                                                            <div class="card-header" id="headingSeven">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link acc-btn" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">What is a psychometric test?</button>
                                                                </h5>
                                                            </div>

                                                            <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordion3">
                                                                <div class="card-body acc-content current">
                                                                    We pride ourselves on being intuitive and easy-to-use. Regardless of your experience with people analytics, candidate assessment or even technology; you'll be able to use our platform right out of the box.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card accordion block">
                                                            <div class="card-header" id="headingEight">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link acc-btn collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Types of psychometric testing </button>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion3">
                                                                <div class="card-body acc-content">

                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card accordion block">
                                                            <div class="card-header" id="headingNine">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link acc-btn collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">Taking a personality test</button>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion3">
                                                                <div class="card-body acc-content">

                                                                     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="prod-reviews" role="tabpanel" aria-labelledby="prod-reviews-tab">
                                                <div class="content pt-30 pb-30 white-bg">

                                                   <h3>Download our free guide on assessment types</h3>
                  <p>Fill out the form on this page to download our free guide with practical tips for selecting the types of candidates that are right for you using the right assessments. </p>
                  <h4>This guide will detail:</h4>

                  <ul class="review-list">
                    <li><b>Goals- </b>  what is each assessment intended to measure?</li>
                    <li><b>Use Cases -</b> what are the job roles or job traits that apply to each assessment type?</li>
                    <li><b>Advantages and Disadvantages -</b> what are the strengths and weaknesses of each type?</li>
                   </ul>

                  <hr>
                  <h4>Contact our psychometric experts</h4>
                   <p>Want to know more about our psychometric solutions? Speak to one of our expert consultant today and see how PSI can help.</p>
                   <hr>
                   <a href="#" class="btn readon2">Contact Us</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                    </div>

                    <!-- Video Column -->
                    <div class="video-column col-lg-4">
                        <div class="inner-column">
                            <!-- Video Box -->
                            <div class="intro-video media-icon orange-color2">
                                <img class="video-img" src="{{ asset('public/home/images/about-video-bg2.png') }}"
                                    alt="Video Image">
                                <a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">
                                    <i class="fa fa-play"></i>
                                </a>
                                <hr>
                                <h4>Preview this course</h4>
                            </div>
                            <!-- End Video Box -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section End -->





    </div>


    <!-- body content end here -->




@endsection
