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
						<h1 class="page-title">Financial Counselling</h1>


					</div>
			</div>
			<!-- Breadcrumbs End -->

			<!-- About Section Start -->
			<div id="rs-about" class="rs-popular-courses style3 pb-40 pt-100 md-mt--140 md-pt-70 md-pb-30">
				<div class="container">
					<div class="row">

						<div class="col-md-8">

						<h4>Financial Counselling</h4>
						<p>Studying abroad could be a little exorbitant for the students who belong to weaker section. Students can apply for Student’s loan or Scholarship programs to get financial aid. Some Universities/colleges facilitate scholarship/fellowship programs for the students.</p>
						<h4>Scholarships</h4>
						<h5>NEED BASED SCHOLARSHIP</h5>
						<p>University facilitates this type of scholarship on the basis of the financial status of the student. The university checks the candidate's family income, assets and liabilities and disburses the amount based on that.</p>
						<h5>MERIT BASED SCHOLARSHIP</h5>
						<p>Merit based scholarship is financial aid reserved for students with special qualifications, such as academic or extra-curricular activities.</p>
						<h4>Student’s Loan</h4>
						<p>We provide education loan to the students seeking for financial aid. We have some collaboration with the firms offering education loan. We assist student in applying for loan and in filling the needed document.</p>
						<h5>Eligibility Criteria</h5>
						<ul>
						    <li>Borrower must be a citizen of India.</li>
                            <li>All co-applicants must be Indian citizens.</li>
                            <li>Capability to provide collateral in certain instances</li>
                            <li>The co-borrower must have a bank account in any bank in India that offers check writing services.</li>
                            <li>Admission to universities confirmed prior to disbursement</li>
						</ul>

						<!---

							<div class="consultant-info-div ">
							<h4>Financial Counsling Including Education Scholarship etc</h4>
							<p class="about-content">
							Thousands of scholarships and fellowships from several sponsors are awarded each year. College scholarships are forms of aid that help students pay for their education. Unlike student loans, scholarships do not have to be repaid.<br>
                            Awards are also available for students who are interested in particular fields of study, who are members of underrepresented groups, who live in certain areas of the country or who demonstrate financial need.
                            <br>
                            Generally, scholarships and fellowships are reserved for students with special qualifications, such as academic, athletic or artistic talent.
							</p>

							<b>Who can apply for scholarships?</b>
                            <p>Anyone who meets the application requirements can apply. Always check if you can apply, if the scholarship application deadlines are up-to-date, and if the scholarship is open to national students, international students, or both.</p>

                            <ul>
                            <li>Registration or application form</li>
                            <li>Letter of motivation or personal essay</li>
                            <li>Letter of recommendation</li>
                            <li>Letter of acceptance from an academic institution</li>
                            <li>Proof of low income, official financial statements</li>
                            <li>Proof of extraordinary academic or athletic achievement</li>
                            </ul>
                            <br>

                            <b>How can you apply for a scholarship?</b>
                            <p>Once you've found a study abroad scholarship for which you can apply, start preparing your documents. A typical application process looks like this:</p>

                            <p>
                            Register for the scholarship, usually by completing an online application form.
                            <br>
Check your inbox to make sure you've received the confirmation email.<br>
Write a personal statement or essay. There are enough models on the internet but remember to be original and impress through your unique experiences and ideas.<br>
Get official proof of your academic, athletic, or artistic achievements. Translate the documents if necessary — it usually is.<br>
Or get official proof of your low income or nationality (for region-based scholarships). Again, a translation might be necessary.<br>
Proofread all documents for errors and send them to the scholarship provider.<br>
Submit the acceptance letter from the university (or an official document from the university proving you've been accepted). You won't receive the scholarship without confirming that you will actually begin studies.<br>
Wait for the results. If selected, congratulations, you're a winner! Go ahead and throw a party but don't spend all your scholarship money on it. Just kidding; the university or college usually receive the money directly to cover your tuition (or a part of it).
                            </p>

							<h4>Student Loan</h4>
							<p>
							Studying abroad at a top university is every student’s dream but having finances to study abroad might be a little s exorbitant. Almost everyone seeks an education loan for study abroad. However, having finances to go overseas might be a little exorbitant for the students. <br><br>
							We are an elite portal that provides the greatest financial choices for international education seekers looking to carve out a place academically. Our sole goal is to provide financial assistance to international students at all levels, whether it is for Undergraduate or Postgraduate studies in the most sought-after study destinations such as the United States, the United Kingdom, Canada, Australia, New Zealand, Ireland, Europe, Singapore, Dubai, or any other country of the students' choice. Our Education Loan Experts not only help students choose the proper financial institution, but they also help them from application to loan disbursement through our Banking Partners. OEL is the best Study Abroad Funding Solution due to a thorough combination of knowledge and technology.
							</p>
							<b>Eligibility Criteria  </b>
								<p>Borrower must be a citizen of India.<br>
								All co-applicants must be Indian citizens.<br>
								Capability to provide collateral in certain instances<br>
								The co-borrower must have a bank account in any bank in India that offers check writing services.<br>
								Admission to universities confirmed prior to disbursement.</p>

								<b>DOCUMENT REQUIRED</b>
								<p>
									Two Passport Size Photos<br>
									Photo ID<br>
									Residence Proof<br>
									Academic Documents of Student<br>
									Proof of Admission (If available)<br>
									Last 8 Months Bank Statements of Co-Applicant<br>
									Income Proof of Co-Applicant
								</p>



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


  <!-- body content end here -->

@endsection
