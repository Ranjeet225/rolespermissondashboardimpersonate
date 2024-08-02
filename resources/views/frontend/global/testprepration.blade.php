@extends('frontend.layouts.main')

@section('title', "OverseasEducationLane")
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
.consultant-info-div ul{
	list-style: circle;
	padding-left:20px;
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
							<img src="{{asset('frontend/pages/faq/faq_banner.jpg')}}" alt="Breadcrumbs Image">
					</div>
					<div class="breadcrumbs-text white-color">
						<h1 class="page-title">Test preparation</h1>
						<!--
						<ul>
							<li>
								<a class="active" href="https://overseaseducationlane.com">Home</a>
							</li>
							<li><a>Vas Services</a></li>
							<li>Test Preparation</li>
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
							<h4>Test preparation</h4>
							<p class="about-content">Students are required to give language proficiency tests to demonstrate the institution that candidates have adequate level of knowledge of that language to cope up with the college lectures. These tests are mandatory part of the application.</p>
							<!--
                            <p>

							This will help you in selecting the best-standardized exam which will further help you in getting admission in your selected university. Apart from this, we will also inform the MBA applicants whether they also need to give English language proficiency tests to get into their choice of business schools. On the other hand, GRE or GMAT exam assesses the analytical ability of the aspirants. Also, those who belong to an English-speaking country may not require to give these English language proficiency tests.
							</p>
							-->
                            <b>GMAT:-</b>
                            <p>This exam is taken by applicants who want to apply to business schools. Applicants are tested on their mathematical, analytical, and verbal skills. The main purpose of this exam is to assess the applicants' ability to study in a business school. GMAT aspirants can apply for more than 7000 programs at around 2300 business schools worldwide.</p>
                            <!--
                            <p>This exam is given by those applicants who want to go to business schools.<br>
The main purpose of this exam is to evaluate the aspirants' ability to study at a business school. Top business schools across the world like Harvard, INSEAD and Stanford accept the GMAT score of above 720.</p>
                            -->

                            <b>GRE:-</b>
                             <p>The GRE General Test is the world's largest standardized test taken by students for undergraduate admission. It assesses candidate’s ability to pursue graduation in a variety of streams. It assesses applicant’s skills in analytical, quantitative, and verbal reasoning. The GRE General Test is accepted by thousands of graduate schools around the world.</p>
                             <!--
                             <p>The GRE General Test is accepted by thousands of graduate schools across the world.</p>
                             <p>The GRE test assesses the candidates' ability to pursue graduate level studies in different areas. In addition to this, various business and law schools also accept The GRE General Test.<br>
This exam is given by students who want to secure admission in graduate programs across all the disciplines. It evaluates candidates' ability in analytical, quantitative and verbal reasoning. Apart from this, who wants to study particular subjects also give the GRE Subject test.</p>
                            -->

                            <b>TOEFL:-</b>
							 <p>The TOEFL exam is taken by those who want to go to a country where English is the main language of communication. TOEFL scores are accepted by more than 10,000 educational institutions, including colleges, universities, and other institutions worldwide. This test is used to assess the applicant's English proficiency.</p>
							 <p>Getting the maximum score in these pre- admissions tests require guidance and a plan of action. We connect students with the most qualified IELTS and TOEFL instructors who can assist them in scoring good.</p>

							</div>
						</div>


						<div class="col-md-4">
								<div class="widget-archives mb-50">
                                    <h3 class="widget-title">Other Exams</h3>

                                    <ul>
                                    	<li><a href="{{ url('ielts') }}">IELTS</a></li>
                                        <li><a href="#">ACT</a></li>
                                        <li><a href="#">GMAT</a></li>
                                        <li><a href="#">GRE</a></li>
                                        <li><a href="#">TOEFL</a></li>
                                        <li><a href="#">SAT</a></li>
                                        <li><a href="#">PET</a></li>
                                        <li><a href="#">TEM </a></li>
                                    </ul>
                                </div>

							<div class="expert-form">
									<div class="exp-header mb-25">
										<h5>Quick Query</h5>

										<p class="dis">I can help you with your admission to University of York today.
											<i class="fa fa-caret-down"></i></p>

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


  <!-- body content end here -->


@endsection
