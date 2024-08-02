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
						<h1 class="page-title">Travel & Medical Insurance</h1>


					</div>
			</div>
			<!-- Breadcrumbs End -->

			<!-- About Section Start -->
			<div id="rs-about" class="rs-popular-courses style3 pb-40 pt-100 md-mt--140 md-pt-70 md-pb-30">
				<div class="container">
					<div class="row">

						<div class="col-md-8">
						<h4>Travel & Medical Insurance</h4>
						<p><b>Why do you need insurance?</b> <br>
                            To cover all the eventualities and to ensures that you do not have to bear the cost out of your own pocket.</p>
                            <p><b>Travel Insurance</b> <br>
                                OEL offers students studying abroad a travel insurance policy through their third party collaborations. This policy covers medical expenses, baggage risks, break in stay, and other travel-related risks student may face during their entire tenure.</p>

                                <p><b>Medical Insurance</b> <br>
                                    Student travel insurance covers not only their hospital and medical bills, but also takes care of visits from family members in case of hospitalization and medical examination.</p>


						<!--

							<div class="consultant-info-div ">
							<h4>Travel & Medical Insurance</h4>
							<p class="about-content">
							OEL provide travel insurance for student who are going for study in foreign country.it provide coverage against medical expenses, baggage-related risk, stay disruption and other travel-related risk that students may face during their trip. <br>
OEL travel insurance policy comes loaded with unique features such as policy extension and auto renewal facilities. <br>
The coverage under student travel insurance plan not just aids students to pay their hospital and medical bills, but also takes care of visits from Family in case of emergency hospitalization and medical evaluation
							</p>
                            <u>Why do you Need Student Travel Insurance?</u>
                            <p>If you are studying abroad and living alone, there might be possibilities for things to go wrong and you would require support or a back-up to tackle the situation.<br>
Students living outside India may also have visitor from their Families during an emergency medical condition, which require financial back up as well. <br>
Student travel insurance cover all such eventualities and ensures that you don't have to bear the out of the packet expense.</p>

              <h5><u>Other Than these, student travel insurance comes in handy in covering those non-medical expense as well such as:</u></h5>
                            <p><b>Expense arising out of emergency hospitalization due to an accident or illness
Unfortunate events like loss of checked –in baggage etc.</b></p>
                            <ul>
                            <li>Bail bonds and tuition fee.</li>
                            <li>Delay in take-off or cancellation of flight.</li>
                            <li>Loss of Passport</li>
                            <li>Compassionate visit</li>
                            <li>Bail Bond cover</li>

                            </ul>


							</div>
							-->
						</div>


						<div class="col-md-4">

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


@endsection
