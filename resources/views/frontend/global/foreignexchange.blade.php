
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
						<h1 class="page-title">Foreign Exchange</h1>

						<ul>
							<li>
								<a class="active" href="https://overseaseducationlane.com">Home</a>
							</li>
							<li><a>Vas Services</a></li>
							<li>Foreign Exchange</li>
						</ul>
					</div>
			</div>
			<!-- Breadcrumbs End -->

			<!-- About Section Start -->
			<div id="rs-about" class="rs-popular-courses style3 pb-40 pt-100 md-mt--140 md-pt-70 md-pb-30">
				<div class="container">
					<div class="row">

						<div class="col-md-8">

							<div class="consultant-info-div ">
							<h4>Foreign Exchange</h4>
							<p class="about-content">
                            OEL provide a currency's value exchange to another country's currency, such as the U.S. dollar, or even to a basket of currencies.<br>
Foreign exchange, or forex, is the conversion of one country's currency into another.<br>
In a free economy, a country's currency is valued according to the laws of supply and demand.<br>
The economic factors include a government's economic policies, trade balances, inflation, and economic growth outlook.<br>
Political conditions also exert a significant impact on the forex rate, as events such as political instability and political conflicts may negatively affect the strength of a currency. The psychology of forex market participants can also influence exchange rates.<br>
Many factors can potentially influence the market forces behind foreign exchange rates. The factors include various economic, political, and even psychological conditions.
							 </p>


							</div>
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
