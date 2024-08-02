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
						<h1 class="page-title">Resume Building & preparation of SOP</h1>


					</div>
			</div>
			<!-- Breadcrumbs End -->

			<!-- About Section Start -->
			<div id="rs-about" class="rs-popular-courses style3 pb-40 pt-100 md-mt--140 md-pt-70 md-pb-30">
				<div class="container">
					<div class="row">

						<div class="col-md-8">

						    <h4>Resume Building</h4>
						    <p>The resume plays a major role in getting a seat in your dream university. Our counselors provide the required guidance that you need to write an impactful resume that showcases all of the unique experiences and skills that make you the perfect candidate for the chosen University.</p>

						    <p>Talk to the counselors at OEL to begin with your application and make your dreams come true!</p>

						    <h4>Preparation of SOP</h4>
						    <p>SOP is essay that mirrors your intentions for applying for admission. It reflects your personality, and describes your past experience and future goals. SOP tells about your purpose behind choosing that particular college/programs.</p>
						    <p>Our counsellors assist you in writing an impactful SOP that highlight your traits accurately.</p>

						    <!--

							<div class="consultant-info-div ">
							<h4>Resume Evaluation & Prepration of SOP etc.</h4>
							<p class="about-content">
							Our company decides that decision-making cycles need to be faster, and executives need to make decisions and balance trade-offs concerning dividends, debt, cash-flow, and capital investments. You and your executive team decide it's time to institute a portfolio management process.
							<br>
							The most effective way to go through a portfolio management process is to follow consistent steps that will guide your thinking. Our Executive Consulting Team recommends 4 steps as a framework for organizing your portfolio management process.  These are key to obtaining business value from your portfolio initiative.
							</p>

							<b>1. Executive Framing</b>
                            <p>The executive framing is always first. By clarifying metrics of interest, priorities, and major strategic concerns, portfolio management is focused on the very specific needs of the corporation as dictated by its executives. Framing is often the difference between building an effective decision tool and an academic exercise. It also provides the focus necessary for streamlining data collection.</p>

							<b>2. Data Collection</b>
                            <p>The next step is to collect the data. It is important to bear in mind that data need not be perfect to build an initial portfolio model. Our experience working with clients indicates that actually analysing the data and engaging in strategic conversation can account for less than 5% of time spent in the planning process. One of the root causes is the time spent attempting to produce "perfect" data, rather than the data that is truly meaningful to the decisions at hand.</p>
                            <p>The best way to start portfolio analysis is to make do with the data you already have. After all, this is the data that the company is currently using to inform decisions. The quality of insights available from fairly "high level" data is often quite surprising. Data can be improved over time as needed, and you can spend your energy where it matters most.</p>

                            <b>3. Modelling and Analysis</b>
                            <p>Modelling and analysis are best done by someone (or a team) with both modelling and business savvy. Unfortunately, it can be easy to create a model that is mathematically accurate but "misses the point." Always generate a series of analyses to understand the model dynamics and validate these by comparing them to an existing plan and by reviewing them with appropriate business and financial experts within your company.</p>

                            <b>4. Synthesis and Communication</b>
                            <p>Once models are created and the analysis is done, it is vital to synthesize the information to make it easy to share with executives. Analysis means little if it doesn't lead to greater understanding and insight, an improved strategic conversation, and more informed decisions. This step will often kick off a new round of analysis, as decision makers use the new insights, they gained to formulate new and more profound questions.</p>
                            <p>The four steps above are a guide to companies new to portfolio management. They also represent the ongoing process. If you're new at developing a portfolio model, we recommend you bring an expert who can advise you. The right strategic adviser can help you streamline model structure, improve analysis times, distil critical insights and facilitate management discussions.</p>
                            <p>Whether you are new to the process or experienced with portfolio analysis, remember that all four steps outlined above are critical. It is a common mistake to focus solely on the middle steps of data collection and modelling without paying enough attention to the first and last steps of framing and communication.</p>





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
