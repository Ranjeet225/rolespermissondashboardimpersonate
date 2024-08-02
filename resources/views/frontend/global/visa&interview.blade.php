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
						<h1 class="page-title">Visa Interview Assistance</h1>


					</div>
			</div>
			<!-- Breadcrumbs End -->

			<!-- About Section Start -->
			<div id="rs-about" class="rs-popular-courses style3 pb-40 pt-100 md-mt--140 md-pt-70 md-pb-30">
				<div class="container">
					<div class="row">

						<div class="col-md-8">

						    <p>If you are planning to study in foreign country, you will require a Student visa.</p>
                            <p>After completing the visa application, you need to go through the <b>visa interview</b> process.</p>
                            <p>This process is quite challenging and requires special preparation. Our visa counsellors will facilitate you with all the necessary assistance and information.</p>
                            <h4>Types of Questions Asked </h4>
                            <b>It is important that you know before-hand the type of questions that can be asked in the interview:</b>
                            <p>
                                a)	Questions related to Study Plan <br>
                                b)	University Choice <br>
                                c)	Academic Capabilities <br>
                                d)	Financial Status <br>
                                e)	Post-Graduation Plans <br>
                                f)	Study Plan and University Choice Questions <br>
                            </p>

                            <p>Counsellors at OEL will train you to tackle the interview in very first round.</p>

                            <p>Reach Us: <br>
                                Tel: <a href="tel:+918929922525">+918929922525</a></p>

						    <!---
							<div class="consultant-info-div ">
							<h4>Visa &amp; Interview Assistance</h4>
							<p class="about-content">
							If you are planning to study in Foreign country, you will require a student visa.<br>
							After completing the <b>visa application process,</b> you need to go through the visa interview process.
							</p>
                            <p>Now, this process is quite challenging and requires special preparation. Here we have detailed every possible information, that is necessary to prepare the candidate to crack the Visa interview round at once.  </p>

                            <b>Types of Questions Asked</b>
                            <p>It is important that you know before-hand the type of questions that can be asked in the interview. International students going to foreign must be well aware of the answers to following situations:</p>
                            <ul>
                            <li>Questions related to Study Plan</li>
                            <li>University Choice</li>
                            <li>Academic Capabilities</li>
                            <li>Financial Status</li>
                            <li>Post-Graduation Plans</li>
                            <li>Study Plan and University Choice Questions</li>
                            </ul>

                            <p>If you are appearing as an International student, interviewer will ask you questions related to choose of study, qualification, the reason behind joining the university, your future plans, etc.</p>
                            <b><u>Here is the list of questions that the interviewer may ask you:</u></b>
                            <ul>
                            <li>Which university have you applied for?</li>
                            <li>Which degree and what specialization you will do?</li>
                            <li>How many colleges have you applied for?</li>
                            <li>Where have you completed your previous qualifications?</li>
                            <li>Are you working? Your current employer? What do you do?</li>
                            <li>Why do you choose to continue your education abroad?</li>
                            <li>Have you been to the country before?</li>
                            <li>How will your current program be related to your previous work or study?</li>
                            <li>Do you know any professor at the University you are planning to join?</li>
                            <li>Where is your college or university located?</li>
                            </ul>
                            <br>
                            <h5><u>Questions related to Academic Capabilities</u></h5>
                            <b>Previous academic details matter a lot when applying for a study permit in Canada. Some of the questions likely to come your way are:</b>
                            <ul>
                            <li>What is your GRE, TOEFL, IELTS, GMAT, SAT score?</li>
                            <li>Are you fluent in English?</li>
                            <li>How much do you know about the universities and colleges of this country?</li>
                            <li>How will you manage the cultural and educational differences?</li>
                            <li>What is the reason for pursuing a degree in our country?</li>
                            <li>Did you get any scholarship?</li>
                            </ul>
                            <br>
                            <b><u>Questions Regarding Financial Status</u></b>
                            <p>Questions related to your finances are crucial and decisive in nature. Based on your answers, you might get a study permit or may face rejection. Therefore, before you appear for the interview, plan your finances and gather all the ins and outs of it. The interviewer will investigate your financial plans and strategies.</p>
                            <ul>
                            <li>How will you fund your entire education?</li>
                            <li>What is your source of income?</li>
                            <li>How much does your education cost?</li>
                            <li>Do you have any sponsor? What does he do?</li>
                            <li>Do you have any scholarship?</li>
                            <li>What are your financial plans? </li>
                            <li>How will you manage your expenses?</li>
                            <li>Can you show me a copy of your bank statement?</li>
                            <li>Is your family paying for your education?</li>
                            <li>What does your father do?</li>
                            <li>What is his annual income?</li>
                            <li>Does he pay income tax?</li>
                            </ul>
                            <br>
                            <h5>Tips to Crack the Interview</h5>
                            <p>Now you know what sorts of questions are asked during a visa interview. It is the time to collect some well-aimed </p>
                            <h5>Keep All Your Documents Handy</h5>
                            <p>The most important thing while you plan your studies abroad is to keep all the official documents handy. Some mandatory documents are Visa application form, university acceptance letter, income certificate. Collect and arrange all the mandatory documents as detailed and bring along enough evidence to the interview to get the visa. Check them twice before going for the interview.</p>
                            <h5>Polish Your Language</h5>
                            <p>If you had English as second language of study, then work on your English proficiency skill. This will help you to communicate with the interviewer properly. It will also be beneficial during your stay in the country. Practice reading English newspapers, magazines, novels, blogs as much as possible. Watch English movies, TV shows, listen to songs and try to communicate in English in your daily life.</p>
                            <h5>Stay Positive and Be Attentive</h5>
                            <p>Your gesture and attitude lay the foundation for your interview. It is important to stay positive, responsive, and attentive during the interview. Listen to the questions carefully, give complete attention to the interviewer or the translator. Think before you answer and try to keep your answers concise and to the point. Time matters a lot and all the consular officers are under time pressure and want to conduct quick interviews. Hence, the first few minutes of the interview are the decisive ones. Try to give a good initial impression.</p>
                            <h5>Know Your Program and Career Plans</h5>
                            <p>How can you expect to get a student visa if you know nothing about your study program? Prepare the reason why you have decided to continue your studies abroad. It is important to convince the consular about your study plan and you need to explain how it will shape your career in your home country.</p>
                            <h5>Talk About Family or Dependent at Home</h5>
                            <p>In case you are married, and your spouse or children are not coming along with you, you must address this condition during the interview. You will be required to explain how they will manage their lives in your absence, especially if you are the primary income generator of the family. In any case, the consular gets the impression that they will need your support financially by remitting money from abroad, there are chances that your visa application will get denied. If there are chances that your family will join you later make sure they apply for the visa at the same post where you had applied.</p>

                             <h5>Speak for Yourself</h5>
                            <p>Attend the interview all by yourself. Do not bring your parents with you. It will give an impression that you are not able to speak for yourself. You need to make them believe that you are capable enough to live on your own in another country. If any family member assists you to the interview tell them to wait in the waiting room.</p>

                             <h5>Employment or Study</h5>
                            <p>BE sure your purpose to go abroad should be to study and not work. Do not plan to work during or after completing the program. However, work while study on-campus or off-campus is not counted as it is meant to support and complete the education with the consent of the university. Make it very clear during the interview that you plan to return home once you complete the program.</p>

							</div>-->
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
