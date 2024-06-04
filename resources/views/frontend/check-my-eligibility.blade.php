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
                        <fieldset class="wizard-fieldset ">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px">Program  Discipline?</h2>
                            <br>
                            <section class="flg">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
                                            <select class="js-select2" multiple="multiple"
                                                name="program_displine" id="program_displine" onchange="ajaxRequestprogram($(this).val())">
                                                @foreach ($program_discipline as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="showDiv" style="display: none; width: 100%">
                                                <div class="row" id="appendImg88">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 ">
                                            <ul class="nav-tabs program_subdiscipline_list float-end">

                                            </ul>
                                            <h4 class="program_discipline_name"></h4>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="col-lg-1 col-md-6">
                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                            </div>
                        </fieldset>
                        {{-- <fieldset class="wizard-fieldset">
                            <h2 style="text-align: center;font-weight: 800;margin: 0px"> Which major do you want to
                                pursue? </h2>
                                <h4>Program  Discipline</h4>
                            <br>
                            <section class="flg">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select class="form-control" multiple name="program_displine" id="program_displine">
                                               @foreach ($program_discipline as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <ul class="program_subdiscipline_list">

                                            </ul>
                                            <h4 class="program_discipline_name"></h4>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right program-subdiscipline" data-url="{{route('program-subdiscipline-data')}}">Next</a>
                            </div>
                        </fieldset> --}}
                        {{-- <fieldset class="wizard-fieldset">
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
                        </fieldset> --}}
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
                                            @foreach ($eng_proficiency_level  as $item)
                                            <li class="nav-item tab-btns ">
                                                <a class="nav-link tab-btn eng_proficiency_level" data-eng="{{$item->id}}" data-toggle="tab" href="#{{$item->name}}"
                                                    role="tab" aria-controls="prod-overview" id=
                                                    onclick="$('#{{$item->name}}-input').toggle()" >{{$item->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <br>
                                    <div class="tab-content tabs-content" id="myTabContent">
                                        <!-- Home Tab -->
                                        @foreach ($eng_proficiency_level  as $item)
                                        <div class="tab-pane tab" id="{{$item->name}}" role="tabpanel"
                                            aria-labelledby="prod-overview-tab" >
                                            <div class="content white-bg pt-30">
                                                <!-- Application Charges -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <input class="from-control" type="text" id="en-input"
                                                            name="{{$item->name}}-input" placeholder="Enter Your Score"
                                                             oninput="validateScore('{{$item->name}}')">
                                                        <br><br>
                                                        <p style="text-align: center;color: red" class="msg-{{$item->name}}"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- Description Tab -->
                                    </div>
                                </div>
                                <script>
                                    function validateScore(name){
                                        var score = document.getElementById(name+"-input").value;
                                        var message = document.querySelector(".msg-"+name);
                                        if(name=='TOFEL'){
                                            if(score<0 || score>120){
                                                message.innerHTML = "TOFEL  score must be in between 0-120";
                                            }else{
                                                message.innerHTML = "";
                                            }
                                        }else if(name=='IELTS'){
                                            if(score<0 || score>9){
                                                message.innerHTML = "IELTS  score must be in between 0-9";
                                            }else{
                                                message.innerHTML = "";
                                            }
                                        }else if(name=='PTE'){
                                            if(score<10 || score>90){
                                                message.innerHTML = "PTE  score must be in between 10-90";
                                            }else{
                                                message.innerHTML = "";
                                            }
                                        }
                                        else if(name=='DET'){
                                            if(score<10 || score>90){
                                                message.innerHTML = "DTE  score must be in between 10-160";
                                            }else{
                                                message.innerHTML = "";
                                            }
                                        }else{

                                        }
                                    }
                                </script>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="form-group">
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
                                        <ul class="nav nav-tabs other-exam tabs-box " id="myTab" role="tablist">

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
                                <a href="javascript:void(0)" class="form-wizard float-right check-my-eligibility" >Check my Eligibility</a>
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

    <script>
        function csrf(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function ajaxRequest(id) {
            $('#appendImg88').empty();
            csrf();
            $.ajax({
                url: '{{ route('get-country-flags') }}',
                type: 'POST',
                data: {
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
                csrf();
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        item: item,
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
            csrf();
            $.ajax({
                url: '{{ route('get-program-sublevel') }}',
                type: 'POST',
                data: {
                    'program_level_id': selectedOptions
                },
                success: function(data) {
                    console.log(data);
                    $('.program-sub-level').empty();
                    if (data.length > 0) {
                        $.each(data, function(index, program_sub_level) {
                            $('.program-sub-level').append(`
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn program-sub-level-data" id="prod-overview-tab"
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
            csrf();
            $.ajax({
                url: '{{ route('get-education-level-data') }}',
                type: 'POST',
                data: {
                    'program_level_id': selectedProgramLevelOptions,
                    'program_sublevel_id': selectedProgramSubLevelOptions
                },
                success: function(data) {
                    if (data.length > 0) {
                        $('.education-level').empty();
                        $.each(data, function(index, education_level) {
                            $('.education-level').append(`
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn data_education_level" id="prod-overview-tab"
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
            function ajaxRequestprogram(ids){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('program-subdiscipline-data') }}',
                    method: 'POST',
                    data:{program_displine:ids},
                    success: function(data) {
                        if (data.length > 0) {
                            $('.program_subdiscipline_list').empty();
                            $.each(data, function(index, program_sub_discipline) {
                                $('.program_subdiscipline_list').append(`
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn data-sub-discipline-id" id="${program_sub_discipline.name}"
                                            data-toggle="tab" href="#${program_sub_discipline.name}" role="tab"
                                            data-sub-discipline-id="${program_sub_discipline.id}"
                                            aria-controls="prod-overview" aria-selected="true">${program_sub_discipline.name.toUpperCase()}</a>
                                    </li>
                                `);
                            });
                        } else {
                            $('.program_subdiscipline_list').empty().append('<li class="nav-item tab-btns"><h4>Not Found</h4></li>');
                        }
                    }
                });
            }

        </script>
        <script>
            function validateTOEFLScore() {
                const toeflScore = document.getElementById('toeflScore').value;
                const error = document.getElementById('error');
                if (toeflScore > 120) {
                    error.style.display = 'block';
                } else {
                    error.style.display = 'none';
                }
            }
            var program_level_id =$('#program_level').val();
            $.ajax({
                url: "{{ route('fetch-other-exam-data') }}",
                type: "POST",
                data:{
                    _token: '{{ csrf_token() }}',
                    program_id:program_level_id
                },
                success: function(response){
                    $.each(response, function(index, value){
                        var tab_element = '<li class="nav-item tab-btns">'+
                                            '  <a class="nav-link tab-btn" id="prod-overview-tab"'+
                                            '     data-toggle="tab" href="#'+value.name+'" role="tab"'+
                                            '     aria-controls="prod-overview" aria-selected="true">'+value.name+'</a>'+
                                            '</li>';
                        $('.other-exam').append(tab_element);
                    });
                }
            });
        </script>
        <script type="text/javascript">
            $(".js-select2").select2({
                closeOnSelect: false,
                placeholder: "select country",
                allowClear: true,
                tags: true, // creates new options on the fly
                templateResult: function(data) {
                    if (!data.id) {
                        return data.text;
                    }
                    var $image = $("<img>", {
                        class: "select-image",
                        src: $(data.element).data("image"),
                        width: 24
                    });
                    var $text = $("<span>", {
                        text: " " + data.text
                    });
                    return $("<span>").append($image).append($text);
                },
                templateSelection: function(data) {
                    if (!data.id) {
                        return data.text;
                    }
                    var $image = $("<img>", {
                        class: "select-image",
                        src: $(data.element).data("image"),
                        width: 24
                    });
                    return $("<span>").append($image).append(" " + data.text);
                }
            });

            $(".js-select2").on('select2:unselect', function(e) {
                if ($(".js-select2").val() == null) {
                    $("#showDiv").hide();
                }
            });
        </script>
        <script type="text/javascript">
            let mobile_header1_visible1 = false;
            function toggleMobileHeader() {
                if (mobile_header1_visible1 == false) {
                    document.getElementById("mobile_header1").style.display = "block";
                    mobile_header1_visible1 = true;
                } else {
                    document.getElementById("mobile_header1").style.display = "none";
                    mobile_header1_visible1 = false;
                }
            }
            document.getElementById("dropdown_trigger_nav2").addEventListener("click", function() {
                document.getElementById("user_dropdown_content2").style.display = "block";
            });
            document.addEventListener("click", function(event) {
                let el = document.getElementById("user_dropdown_content2");
                if (el !== null) {
                    if (event.target.closest("#dropdown_trigger_nav2")) {
                        el.style.display = "block";
                    } else {
                        el.style.display = "none";
                    }
                }
            });
        </script>
        <script type="text/javascript">
            //============Shree=============
            var testSleep = function() {
                setTimeout(function() {
                    $('#exampleModal').modal('show');
                }, 10000);
            }
            //=== Shree

            function clearStorage() {
                let session = sessionStorage.getItem('register');
                if (session == null) {
                    localStorage.removeItem('visible_popup');
                }
                sessionStorage.setItem('register', 1);
            }
            window.addEventListener('load', clearStorage);
        </script>
        <script type="text/javascript">
            $(".js-select2").select2({
                closeOnSelect: false,
                placeholder: "select country",
                allowClear: true,
                tags: true, // creates new options on the fly
                templateResult: function(data) {
                    if (!data.id) {
                        return data.text;
                    }
                    var $image = $("<img>", {
                        class: "select-image",
                        src: $(data.element).data("image"),
                        width: 24
                    });
                    var $text = $("<span>", {
                        text: " " + data.text
                    });
                    return $("<span>").append($image).append($text);
                },
                templateSelection: function(data) {
                    if (!data.id) {
                        return data.text;
                    }
                    var $image = $("<img>", {
                        class: "select-image",
                        src: $(data.element).data("image"),
                        width: 24
                    });
                    return $("<span>").append($image).append(" " + data.text);
                }
            });
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.form-wizard-next-btn').click(function() {
                    var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                    var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                        '.form-wizard-steps .active');
                    var next = jQuery(this);
                    var nextWizardStep = true;
                    parentFieldset.find('.wizard-required').each(function() {
                        var thisValue = jQuery(this).val();

                        if (thisValue == "") {
                            jQuery(this).siblings(".wizard-form-error").slideDown();
                            nextWizardStep = false;
                        } else {
                            jQuery(this).siblings(".wizard-form-error").slideUp();
                        }
                    });
                    if (nextWizardStep) {
                        next.parents('.wizard-fieldset').removeClass("show", "400");
                        currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',
                            "400");
                        next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                        jQuery(document).find('.wizard-fieldset').each(function() {
                            if (jQuery(this).hasClass('show')) {
                                var formAtrr = jQuery(this).attr('data-tab-content');
                                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(
                                    function() {
                                        if (jQuery(this).attr('data-attr') == formAtrr) {
                                            jQuery(this).addClass('active');
                                            var innerWidth = jQuery(this).innerWidth();
                                            var position = jQuery(this).position();
                                            jQuery(document).find('.form-wizard-step-move').css({
                                                "left": position.left,
                                                "width": innerWidth
                                            });
                                        } else {
                                            jQuery(this).removeClass('active');
                                        }
                                    });
                            }
                        });
                    }
                });
                //click on previous button
                jQuery('.form-wizard-previous-btn').click(function() {
                    var counter = parseInt(jQuery(".wizard-counter").text());;
                    var prev = jQuery(this);
                    var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                        '.form-wizard-steps .active');
                    prev.parents('.wizard-fieldset').removeClass("show", "400");
                    prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
                    currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',
                        "400");
                    jQuery(document).find('.wizard-fieldset').each(function() {
                        if (jQuery(this).hasClass('show')) {
                            var formAtrr = jQuery(this).attr('data-tab-content');
                            jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(
                                function() {
                                    if (jQuery(this).attr('data-attr') == formAtrr) {
                                        jQuery(this).addClass('active');
                                        var innerWidth = jQuery(this).innerWidth();
                                        var position = jQuery(this).position();
                                        jQuery(document).find('.form-wizard-step-move').css({
                                            "left": position.left,
                                            "width": innerWidth
                                        });
                                    } else {
                                        jQuery(this).removeClass('active');
                                    }
                                });
                        }
                    });
                });
                //click on form submit button
                jQuery(document).on("click", ".form-wizard .form-wizard-submit", function() {
                    var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                    var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                        '.form-wizard-steps .active');
                    parentFieldset.find('.wizard-required').each(function() {
                        var thisValue = jQuery(this).val();
                        if (thisValue == "") {
                            jQuery(this).siblings(".wizard-form-error").slideDown();
                        } else {
                            jQuery(this).siblings(".wizard-form-error").slideUp();
                        }
                    });
                });
                // focus on input field check empty or not
                jQuery(".form-control").on('focus', function() {
                    var tmpThis = jQuery(this).val();
                    if (tmpThis == '') {
                        jQuery(this).parent().addClass("focus-input");
                    } else if (tmpThis != '') {
                        jQuery(this).parent().addClass("focus-input");
                    }
                }).on('blur', function() {
                    var tmpThis = jQuery(this).val();
                    if (tmpThis == '') {
                        jQuery(this).parent().removeClass("focus-input");
                        jQuery(this).siblings('.wizard-form-error').slideDown("3000");
                    } else if (tmpThis != '') {
                        jQuery(this).parent().addClass("focus-input");
                        jQuery(this).siblings('.wizard-form-error').slideUp("3000");
                    }
                });
            });
        </script>
        <script type="text/javascript">
            // image gallery
            // init the state from the input
            $(".image-checkbox").each(function() {
                if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                    $(this).addClass('image-checkbox-checked');
                } else {
                    $(this).removeClass('image-checkbox-checked');
                }
            });
            // sync the state to the input
            $(".image-checkbox").on("click", function(e) {
                $(this).toggleClass('image-checkbox-checked');
                var $checkbox = $(this).find('input[type="checkbox"]');
                $checkbox.prop("checked", !$checkbox.prop("checked"))
                e.preventDefault();
            });

        </script>
        <script>
            $('.check-my-eligibility').on('click',function(){
                var country = $('#country').val();
                var program_level = $('#program_level').val();
                var program_sub_level=$('.program-sub-level-data').attr('data-sublevel-id');
                var education_level = $('.data_education_level').attr('data-education-level-id');
                var program_displine=$('#program_displine').val();
                var program_subdispline=$('.data-sub-discipline-id').attr('data-sub-discipline-id');
                var eng_proficiency_level =$('.eng_proficiency_level.active').attr('data-eng');
                var redirect_url = '{{ route('course-finder') }}?country='+country+'&program_level='+program_level+'&program_sub_level='+program_sub_level+'&education_level='+education_level+'&program_displine='+program_displine+'&program_subdispline='+program_subdispline+'&eng_proficiency_level='+eng_proficiency_level;
                window.location.href=redirect_url;
            });
        </script>
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
