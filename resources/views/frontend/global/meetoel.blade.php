@extends('frontend.layouts.main')
@section('title', 'OverseasEducationLane')
@section('content')


    <style type="text/css">
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

        textarea {
            height: 100px !important;
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
                <h1 class="page-title">Meet OEL Counsellors ...</h1>
                <!--
          <ul>
           <li>
            <a class="active" href="https://overseaseducationlane.com">Home</a>
           </li>
           <li><a>Vas Services</a></li>
           <li>Meet OEL Counsellors...</li>
          </ul>
          -->
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- About Section Start -->
        <div id="rs-about" class="rs-popular-courses style3 pb-40 pt-100 md-mt--140 md-pt-70 md-pb-30">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">

                        <div class="consultant-info-div ">
                            <h4>Meet Counsellors </h4>
                            <p>Counselling for study overseas is the process in which, an overseas education expert talks to
                                the students and assist them in assessing their options, formulating a plan, and choosing
                                the right program to fulfil their dream of studying abroad. It is the most initial and
                                important part, that gives a lot of clarity to even the confused students who have just came
                                out of the school or college. It helps them in finding the best university and choosing
                                academic destinations according to their needs.</p>

                            <p>Our dedicated and expert counsellors at OEL make this process a whole lot easier through
                                their vast experience in this field. By one to one comprehensive counselling process they
                                understand the interest of student and provide them with a suitable course and destination
                                according to their inclination. </p>

                            <p>Our counsellors have successfully counselled over 1000 students since our inception and given
                                students pathways to build a good career and study a high-quality education overseas.</p>

                            <p>To reach counsellors at OEL, you can simply Call/WhatsApp/Mail to Overseas education Lane. We
                                will provide the best counselling to you with all options.</p>


                        </div>
                    </div>


                    <div class="col-md-4">

                        <div class="expert-form">
                            <div class="exp-header mb-25">
                                <h5>Quick Query</h5>

                                <p class="dis">I can help you with your admission to University of York today.
                                    <i class="fa fa-caret-down"></i>
                                </p>

                            </div>
                            <hr>
                            <div class="exp-form mt-25">



                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- About Section End -->

    </div>




@endsection
