@extends('frontend.layouts.main')
@section('content')
<style>
    .img-btn img{
    width:100px;
    height:50px;
    }
    .img-btn > input{
    display:none
    }
    .img-btn > img{
    cursor:pointer;
    border:5px solid transparent;
    }
    .img-btn > input:checked + img{
    border-color: black;
    border-radius:10px;
    }
    /*Author*/
    .author{
    position:fixed;
    bottom:10px;
    right:10px;
    background:black;
    padding:3px;
    border-radius:5px;
    }
    .author p{
    text-align:center;
    padding:5px 10px;
    margin:0;
    color:white;
    border:2px solid lightgrey;
    border-radius:5px;
    }
    .author a{
    color:lightgrey;
    }
</style>
    <!-- Main content Start -->
    <section class="wizard-section">
        <div class="row no-gutters">
            <div class="col-lg-1 col-md-6">
            </div>
            <div class="col-lg-10 col-md-12">
                <div class="form-wizard">
                    <form action="" method="post" role="form">
                        <div class="form-wizard-header">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Check My Eligibility </h2>
                            <ul class="list-unstyled form-wizard-steps clearfix">
                                <li class="active"><span>1</span></li>
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                                <li><span>4</span></li>
                                <li><span>5</span></li>
                                <li><span>6</span></li>
                                <li><span>7</span></li>
                                <li><span>8</span></li>
                            </ul>
                        </div>
                        <link rel="stylesheet"
                            href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
                        <fieldset class="wizard-fieldset show">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which country do you wish to
                                pursue your education in?</h2>
                            <br>
                            <section class="flg">
                                <div class="container">
                                    <div class="row">
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
                                        <select class="js-select2" multiple="multiple" name="country[]"
                                            id="country" onchange="ajaxRequest($(this).val())">
                                            @foreach ($country as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="showDiv" style="display: none; width: 100%">
                                            <div class="row" id="appendImg88">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="col-lg-1 col-md-6">
                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Continue</a>
                            </div>
                        </fieldset>
                        <fieldset class="wizard-fieldset">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Current Track: MASTERS </h2>
                            <h4 style="text-align: center;"> Do you have any work experience?</h4>
                            <h4 style="text-align: center;">Program Level?</h4>
                            <br>
                            <section class="flg">
                                <div class="container">
                                    <div class="row">
                                        @foreach ($program_level as $item)
                                            <div class="col-md-2 col-6">
                                                <label class="img-btn">
                                                        <input type="radio" name="program_level" id="program_level" value="{{ $item->id }}" />
                                                        <img  class="img-responsive w-50 text-justify-center mx-auto" src="{{ asset('assets/degree.png') }}" alt="Sri Lanka Flag">
                                                        <p class="countrypapa text-center"> {{ ucfirst($item->name) }} </p>
                                                    </label>
                                                {{-- <label class="image-checkbox">
                                                    <img class="img-responsive w-50 text-justify-center mx-auto"
                                                        src="{{ asset('assets/degree.png') }}" />
                                                    <p class="countrypapa text-center"> {{ ucfirst($item->name) }}
                                                    </p>
                                                    <input type="checkbox" name="program_level" id="program_level"
                                                        value="{{ $item->id }}" />
                                                    <i class="fa fa-check hidden"></i>
                                                </label> --}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left ">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right program-level">Next</a>
                            </div>

                        </fieldset>
                        <fieldset class="wizard-fieldset">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Current Track: MASTERS </h2>
                            <h4 style="text-align: center;margin: 0px">Program SubLevel </h4>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="intro-info-tabs  ">
                                        <ul class="nav nav-tabs intro-tabs tabs-box program-sub-level" id="myTab" role="tablist">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right " id="program-sub-level">Next</a>
                            </div>
                        </fieldset>
                        <fieldset class="wizard-fieldset">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which major do you want to
                                pursue? </h2>
                                <h4>Education Level</h4>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="intro-info-tabs  ">
                                        <ul class="nav nav-tabs intro-tabs tabs-box education-level" id="myTab" role="tablist">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right program-subdiscipline" data-url="{{route('program-subdiscipline-data')}}">Next</a>
                            </div>
                        </fieldset>
                        <fieldset class="wizard-fieldset">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which major do you want to
                                pursue? </h2>
                                <h4>Program  Discipline</h4>
                            <br>
                            <section class="flg">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select class="form-control" multiple name="program_displine" id="">
                                               @foreach ($program_discipline as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                {{-- <label class="image-checkbox">
                                                    <img class="img-responsive"
                                                    src="{{asset('assets/degree.png')}}" />
                                                    <p class="countrypapa"> {{$item->name}}</p>
                                                    <input type="checkbox" name="program_displine" value="{{$item->id}}" />
                                                    <i class="fa fa-check hidden"></i>
                                                </label> --}}
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <ul>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right program-subdiscipline" data-url="{{route('program-subdiscipline-data')}}">Next</a>
                            </div>
                        </fieldset>
                        <fieldset class="wizard-fieldset">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px">Program SubDiscipline? </h2>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="intro-info-tabs  ">
                                        <ul class="nav nav-tabs intro-tabs tabs-box program-sub-discipline" id="myTab" role="tablist">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Continue</a>
                            </div>
                        </fieldset>
                        <fieldset class="wizard-fieldset">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which english language test
                                have you taken OR are planning to take? </h2>
                            <h4 style="text-align: center;"> Scoring high in language tests increases your options
                                multi fold.</h4>
                            <br>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <div class="intro-info-tabs">
                                    <div class="tabcntr">
                                        <ul class="nav nav-tabs intro-tabs tabs-box " id="myTab" role="tablist">
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn active" id="prod-overview-tab"
                                                    data-toggle="tab" href="#prod-overview2" role="tab"
                                                    aria-controls="prod-overview" aria-selected="true"> TOEFL</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#description2" role="tab"
                                                    aria-controls="description" aria-selected="false">IELTS</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#Undergraduate2" role="tab"
                                                    aria-controls="description" aria-selected="false">PTE</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#Postgraduate2" role="tab"
                                                    aria-controls="description" aria-selected="false">TEST NOT TAKE
                                                    YET</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <br>
                                    <div class="tab-content tabs-content" id="myTabContent">
                                        <!-- Home Tab -->
                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Description Tab -->
                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Continue</a>
                            </div>
                        </fieldset>
                        <fieldset class="wizard-fieldset">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which academic test have you
                                taken OR are planning to take? </h2>
                            <h4 style="text-align: center;"> Scoring high in academic tests increases your options
                                multi fold.</h4>
                            <br>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <div class="intro-info-tabs">
                                    <div class="tabcntr">
                                        <ul class="nav nav-tabs intro-tabs tabs-box " id="myTab" role="tablist">
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn active" id="prod-overview-tab"
                                                    data-toggle="tab" href="#gre" role="tab"
                                                    aria-controls="prod-overview" aria-selected="true"> GRE</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#gmat" role="tab"
                                                    aria-controls="description" aria-selected="false">IELTS</a>
                                            </li>
                                            <li class="nav-item tab-btns">
                                                <a class="nav-item tab-btn nav-link" id="description-tab"
                                                    data-toggle="tab" href="#not" role="tab"
                                                    aria-controls="description" aria-selected="false">TEST NOT TAKE
                                                    YET</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <br>
                                    <div class="tab-content tabs-content" id="myTabContent">
                                        <!-- Home Tab -->
                                        <div class="tab-pane tab" id="gre" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Description Tab -->
                                        <div class="tab-pane tab" id="gmat" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane tab" id="not" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                            aria-labelledby="prod-overview-tab">
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="name"
                                                            name="name" placeholder="Enter Your Score"
                                                            value="">
                                                        <br><br>
                                                        <p style="text-align: center;color: red"> PTE score must be in
                                                            between 10-90</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Check my Eligible</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-lg-1 col-md-6">
            </div>
        </div>
    </section>
    <!--Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center" style="margin-right:0px">
                                    <div class="col-md-6 tree-img">
                                        <!--<h4>What we have to offer for students</h4>-->
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true" class="myspan">&times;</span>
                                        </button>
                                    </div>
                                    <div class="col-md-6"
                                        style="background: #8080802b;border-right: 3px solid #8080803b;border-radius: 20px;">
                                        <center>
                                            <h4 style="margin-top:70px">REQUEST AN ENQUIRY<br>we usually respond in
                                                seconds</h4>
                                        </center>
                                        <div class="modal-header">
                                            <!--<h5 class="modal-title" id="exampleModalLabel">Enquiry Now </h5>-->
                                        </div>
                                        <form class="mx-1 mx-md-4" id="bookingForm"
                                            action="https://reactoel.skylabsapp.com/enquiry" method="POST"
                                            autocomplete="off">
                                            <input type="hidden" name="_token"
                                                value="w1Uqpqj2VdTNaZ6NAmaG0jpQSUBRBlzDks489QOP">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fa fa-user-circle-o" aria-hidden="true"
                                                    style="height: 29px;padding: 0px 6px;font-size: 24px;color: #070758;"></i>
                                                <input type="text" class="form-control" name="full_name"
                                                    aria-describedby="emailHelp" placeholder="First Name">
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fa fa-envelope" aria-hidden="true"
                                                    style="height: 32px;padding: 0px 6px;font-size: 22px;color: #070758;"></i>
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Enter email">

                                            </div>
                                            <span
                                                style="margin-left: 37px;margin-bottom: 50px !important;position: relative;
                                             top: -8px;font-size: 12px;">We'll
                                                never share your email with anyone else.</span>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fa fa-mobile" aria-hidden="true"
                                                    style="height: 44px;padding: 0px 8px;font-size: 42px;color: #070758;"></i>
                                                <input type="text" name="mobile_number" class="form-control"
                                                    aria-describedby="emailHelp" placeholder="Enter mobile number">
                                            </div>
                                            <div class="form-group">
                                                <!--<label for="exampleFormControlSelect1">Example select</label>-->
                                                <select class="form-control" name="interested_in"
                                                    id="exampleFormControlSelect1"
                                                    style="padding:0px 0px; !important">
                                                    <option>Select Option</option>
                                                    <option value="Meet OEL Counsellors">Meet OEL Counsellors</option>
                                                    <option value="Psychometric Test">Psychometric Test</option>
                                                    <option value="Country Program & University Selection">Country
                                                        Program & University Selection</option>
                                                    <option value="Admission Guidance">Admission Guidance</option>
                                                    <option value="Test Preparation">Test Preparation</option>
                                                    <option value="Pre Test Preparation">Pre Test Preparation</option>
                                                    <option value="Resume Evaluation & Prepration">Resume Evaluation &
                                                        Prepration</option>
                                                    <option value="Visa & Interview Assistance">Visa & Interview
                                                        Assistance</option>
                                                    <option value="Travel & Medical Insurance">Travel & Medical
                                                        Insurance</option>
                                                    <option value="Foreign Exchange">Foreign Exchange</option>
                                                    <option value="Pre Departure Briefing">Pre Departure Briefing
                                                    </option>
                                                    <option value="Bon Voyage">Bon Voyage</option>
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" id="booking_enquiry"
                                                    class="btn btn-primary btn-lg">Submit Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="rs-newsletter style1 orange-color mt-50 sm-mt-10 mb--90 sm-mb--30">
        <div class="container">
            <div class="newsletter-wrap">
                <div class="row y-middle">
                    <div class="col-lg-6 col-md-12 md-mb-30">
                        <div class="content-part">
                            <div class="sec-title">
                                <div class="title-icon md-mb-15">
                                    <img src="{{ asset('frontend/home/images/newsletter.png') }}" alt="images">
                                </div>
                                <h2 class="title mb-0 white-color">Subscribe to Newsletter</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <form class="newsletter-form">
                            <input type="email" name="email" placeholder="Enter Your Email" required=""
                                id="subscribe_to_email">
                            <button class="primary newsletter_button" type="button"
                                onclick="send_subscribe_to_email()">
                                <span id="newsletter_subs_show_loading" style="display: none;"
                                    class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true"></span> Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function ajaxRequest(id) {
            $('#appendImg88').empty();
            $.ajax({
                url: '{{ route('get-country-flags') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'country_id': id
                },
                success: function(data) {
                    $.each(data.country, function(index, country) {
                        $("#showDiv").show();
                        $('#appendImg88').append(
                            `<div class="ml-3" style="width:8vw;height:8vw">
                                <img class="img-responsive w-100" height="200" width="200" src="{{ asset('assets/flags/${country.name}.png') }}" />
                                <p class="countrypapa">${country.name.substring(0, 10)}</p><i class="fa fa-check hidden"></i>
                            </div>`
                        );
                    });
                }
            });
            $('input[name="image[]"]').on('change', function() {
                var item = $(this).val();
                var url = "{{ route('get-item-details') }}";
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        item: item,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            });
        }
        $('.program-level').click(function() {
            var selectedOptions = [];
            $('#program_level:checked').each(function() {
                selectedOptions.push($(this).val());
            });
            $.ajax({
                url: '{{ route('get-program-sublevel') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'program_level_id': selectedOptions
                },
                success: function(data) {
                    console.log(data);
                    $('.program-sub-level').empty();
                    if (data.length > 0) {
                        $.each(data, function(index, program_sub_level) {
                            $('.program-sub-level').append(`
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-overview-tab"
                                    data-toggle="tab" href="#prod-overview" role="tab"
                                    data-sublevel-id="${program_sub_level.id}"
                                    aria-controls="prod-overview" aria-selected="true">${program_sub_level.name.toUpperCase()}</a>
                            </li>
                            `);
                        });
                    } else {
                        $('.program-sub-level').empty().append('<li class="nav-item tab-btns"><h4>Not Found</h4></li>');
                    }
                }
            });
        });
        $('#program-sub-level').click(function() {
            var selectedProgramLevelOptions = [];
            $('#program_level:checked').each(function() {
                selectedProgramLevelOptions.push($(this).val());
            });
            var selectedProgramSubLevelOptions = [];
            $('.program-sub-level').find('a.active').each(function() {
                var selectedSubLevelId = $(this).attr('data-sublevel-id');
                selectedProgramSubLevelOptions.push(selectedSubLevelId);
            });
            $.ajax({
                url: '{{ route('get-education-level-data') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'program_level_id': selectedProgramLevelOptions,
                    'program_sublevel_id': selectedProgramSubLevelOptions
                },
                success: function(data) {
                    if (data.length > 0) {
                        $('.education-level').empty();
                        $.each(data, function(index, education_level) {
                            $('.education-level').append(`
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-overview-tab"
                                    data-toggle="tab" href="#prod-overview" role="tab"
                                    data-education-level-id="${education_level.id}"
                                    aria-controls="prod-overview" aria-selected="true">${education_level.name.toUpperCase()}</a>
                            </li>
                            `);
                        });
                    } else {
                        $('.education-level').empty().append('<li class="nav-item tab-btns"><h4>Not Found</h4></li>');
                    }
                }
            });
        });
    </script>
    {{-- sub-discipline --}}
       <script>
        $(document).on('click', '.program-subdiscipline', function() {
            var url = $(this).data('url');
            var program_displine = $('input[name="program_displine"]:checked');
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            program_displine.each(function() {
                formData.append('program_displine[]', $(this).val());
            });
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.length > 0) {
                        $('.program-sub-discipline').empty();
                        $.each(data, function(index, program_sub_discipline) {
                            $('.program-sub-discipline').append(`
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-overview-tab"
                                    data-toggle="tab" href="#prod-overview" role="tab"
                                    data-program-sub-discipline-level-id="${program_sub_discipline.id}"
                                    aria-controls="prod-overview" aria-selected="true">${program_sub_discipline.name.toUpperCase()}</a>
                            </li>
                            `);
                        });
                    } else {
                        $('.program-sub-discipline').empty().append('<li class="nav-item tab-btns"><h4>Not Found</h4></li>');
                    }
                }
            });
        });
    </script>
@endsection
