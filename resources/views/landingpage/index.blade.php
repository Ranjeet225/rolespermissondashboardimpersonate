@extends('landingpage.layouts.app')
@section('style')
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css
" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <style>
     .uniimage {
          /*border-top-left-radius: calc(.25rem - 1px);*/
          /*border-top-right-radius: calc(.25rem - 1px);*/
         max-height: 105px;
          height: 100%;
          object-fit: cover;
          min-height: 105px;

        }
        .flag-icon {
            display: inline-block;
            width: 40px;
            /* Adjust the width and height as needed */
            height: 40px;
            border-radius: 50%;
            /* This creates the circular shape */
            overflow: hidden;
            /* Hides any parts of the image that exceed the circular shape */
            border: 1px solid #ccc;
            /* Optional: Add border for better visibility */
        }

        .flag-icon img {
            width: 100%;
            /* Ensures the image fills the circular container */
            height: auto;
            /* Allows the image to scale proportionally */
        }
    </style>
    <style>
        /* CSS for spinner */
        .blockMsg,.blockPage,.blockUI{
            background-color:transparent !important;
            border:none !important;
        }
        .spinner {
            border-top: 4px solid #333;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: auto;
            margin-top: 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
@endsection
@section('content')
    <div class="wraper">
        <div class="banner">
            <div class="treeSectins">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group col-md-12 mb-0 bannerbutton rounded">
                            <div class="row " style="display: flex;margin-top:40px;border-radius:10px">
                                {{-- <form action="{{ route('index') }}" method="get" class="col-md-12 "> --}}
                                {{-- <select class="custom-select" id="inputGroupSelect04" name="country" style="height: 40px">
                                            @foreach ($country as $data)
                                                    <option value="{{ $data->name }}"  data-value="{{ $data->name }}"  @if (request()->has('country') && request()->country == $data->name) selected @endif>{{ substr($data->name,0,22) }}</option>
                                            @endforeach
                                        </select> --}}
                                {{-- <form id="countryForm" action="{{route('index')}}" method="GET">
                                            <select class="custom-select" id="inputGroupSelect04" name="country" style="height: 40px">
                                                @foreach ($country as $data)
                                                    <option value="{{ $data->name }}" @if (request()->has('country') && request()->country == $data->id) selected @endif>{{ substr($data->name,0,22) }}</option>
                                                @endforeach
                                            </select>
                                        </form> --}}
                                {{-- <form id="countryForm" action="{{ route('index') }}" method="GET"> --}}
                                <div class="input-group" style="width: 300px">
                                    <select class="custom-select form-control" id="inputGroupSelect04" name="country"
                                        style="height: 40px;">
                                        <option>Select Country</option>
                                        @foreach ($country as $data)
                                            <option value="{{ $data->id }}"
                                                @if (request()->has('country') && request()->country == $data->id) selected @endif>
                                                {{ substr($data->name, 0, 22) }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                {{-- </form> --}}

                                {{-- <div class="input-group-append">
                                          <button class="btn btn-primary" type="submit"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                        </div> --}}
                                {{-- <div class="col-md-10 ">
                                        <select class="form-control " style="height: 40px" name="country" id="country">
                                            <option value="">--Select Country--</option>
                                            @foreach ($country as $data)
                                                <option value="{{ $data->name }}"  @if (request()->has('country') && request()->country == $data->name) selected @endif>{{ substr($data->name,0,22) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2" style="float: right;margin-top:-41px">
                                        <button type="submit" class="btn btn-primary" style="height: 40px;"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    </div> --}}
                                {{-- </form> --}}
                            </div>
                        </div>
                        {{-- <section class="section wrapper wrapper-section" style="margin-top: 50% !important">
                            <div class="container wrapper-column">
                               <form name="country" class="form" id="form">
                                  <div class="form-group">
                                     <select name="country" id="country" class="dropdown" onchange="myFunction()">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($country as $data)
                                            <option value="{{ $data->name }}"  @if (request()->has('country') && request()->country == $data->name) selected @endif> {{ substr($data->name,0,22) }}</option>
                                        @endforeach
                                     </select>
                                  </div>
                               </form>
                            </div>
                        </section> --}}
                    </div>



                    <div class="col-md-3 " style="text-align: center;">
                        <div class="bannergirl">
                            <img src="{{ asset('assets/images1/redgirl.png') }}" style="height:440px" />
                        </div>
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                        <div class="formcontent BannerFOrm">
                            <!-- <h4>  in CANADA</h4> -->
                            <h3  class="study-in">
                                Study in {{ $countryName->name }}
                                {{-- <a href="" class="typewrite" data-period="2000"
                                    data-type='[{{ $allCountriesString }}]'>
                                    <span class="wrap"></span>
                                </a> --}}
                            </h3>
                            <p class="get-admission"> Secure admission to a highly-ranked university in {{ $countryName->name }}
                            </p>
                               @if (session('success'))
                                <script>
                                    Swal.fire({
                                        title: "Thank You",
                                        text: "Our counsellor will contact You!",
                                        icon: "success"
                                    });
                                </script>
                            @endif
                            <form action="{{ route('send-mail') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-15 col-md-12">
                                        <Select class="form-control" name="country" style="height: 44px !important">
                                            <option value="">Choose Your Country</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="New Zeeland">New Zeeland</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="USA">USA</option>
                                            <option value="Other">Other</option>
                                        </Select>
                                    </div>
                                    <div class=" mb-15 col-md-6">
                                        <input class="from-control" type="text" required id="first_name"
                                            name="first_name" placeholder="First Name" value="">
                                    </div>
                                    <div class=" mb-15 col-md-6">
                                        <input class="from-control" type="text" required name="last_name"
                                            placeholder="Last Name" value="">
                                    </div>
                                    <div class=" mb-15 col-md-12">
                                        <input class="from-control" type="text" required name="email_id"
                                            placeholder="Email" value="">
                                    </div>
                                    <div class=" mb-15 col-md-12">
                                        <input class="from-control" type="text" required name ="phone_no"
                                            placeholder="Phone" value="">
                                    </div>

                                    <div class=" mb-15 col-md-12">
                                        <input class="from-control" type="text" required name="location"
                                            placeholder="Location" value="">
                                    </div>
                                    <div class=" mb-15 col-md-12">
                                        <input class="from-control" type="text" required name="city"
                                            placeholder="City" value="">
                                    </div>
                                    <!--<div class=" mb-15 col-md-12 ">-->
                                    <!--    <input  type="checkbox" required >-->
                                    <!--    <label class="form-check-label" for="defaultCheck1">I have <a href='https://overseaseducationlane.com/privacy-policy'>Read T&C's</a></label>-->
                                    <!--</div>-->
                                     <div class=" mb-15 col-md-12 ">
                                        <input  type="checkbox" class="float-left " style="margin-top:5px" required >
                                        <label class="form-check-label float-left px-2" for="defaultCheck1">I have <a href='https://overseaseducationlane.com/privacy-policy'>read T&C's</a></label>
                                    </div>
                                    <div class="form-group col-md-12 mb-0">
                                        <button type="submit" class="apply-btn"
                                            style="background-image: linear-gradient(to right, #0452b8, #38d0da);padding: 5px 20px;display: inline-block;margin-top: 6px;border-radius: 6px;color: white;width: 100%;text-align: center;">
                                            Submit now <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
            </div>
            <div id="demo" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner sliderData">
                    @if (!empty($sliderImages[0]) && count($sliderImages[0]) > 0)
                        @foreach ($sliderImages[0] as $key => $item)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }} ">
                                <img src="{{ asset($item->filepath) }}" width="100%" height="529px !important">
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images1/banner/banner1.png') }}" width="100%"
                                height="529px !important">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images1/banner/banner2.png') }}" width="100%"
                                height="529px !important">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images1/banner/banner3.png') }}" width="100%"
                                height="529px !important">
                        </div>
                    @endif
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <section class="snddiv">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h5 class="studyStudent"
                            style="    font-size: 23px;
                    font-weight: 700;
                    color: #1086f3;">
                            66,000+ Indian students choose to study in {{ $countryName->name }}
                        </h5>
                        <div class="row">
                            <div class="col-md-4">
                                <h5
                                    style="    font-size: 25px;
                            font-weight: 700;
                            color: #1086f3;">
                                    You could be the <br>
                                    NEXT!</h5>
                            </div>
                            {{-- <div class="col-md-4">
                            <a class="apply-btn" href="#"
                                style="background-image: linear-gradient(to right, #38d0da , #38d0da);padding: 5px 20px;
                                        display: inline-block;  margin-top: 6px;  border-radius: 6px;color: white;width: 100%;
                                        text-align: center;">
                                Talk to a counsellor <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                        </div> --}}
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
        </section>
        <section class="bluebackgrouns">
            <div class="container">
                <h4 class="whycanada"> Why {{ $countryName->name }}</h4>
                </h4>
                <div class="flex-container">
                    {{-- admin/uploads/aboutcountry --}}
                    @if ($aboutcountry->count() > 0)
                        @foreach ($aboutcountry as $item)
                            <div class="whyimg text-white text-capitalize " style="font-size: 15px;">
                                <img src="{{ asset('admin/uploads/aboutcountry') }}/{{ $item->image }}"
                                    style="border-radius:100%;">
                                {!! $item->aboutcountry !!}
                            </div>
                        @endforeach
                    @else
                        <div class="whyimg">
                            <img src="{{ asset('assets/images1/why1.png') }}">
                            <p class="whycanadapara"> 37 universities ranked invthe top 500 universities in the world.</p>
                        </div>
                        <div class="whyimg">
                            <img src="{{ asset('assets/images1/why2.png') }}">
                            <p class="whycanadapara"> Get guarenteed Scholarships and explore affordable options with the guidance of OEL counselers.</p>
                        </div>
                        <div class="whyimg">
                            <img src="{{ asset('assets/images1/why3.png') }}">
                            <p class="whycanadapara">  Large student network across 27+ countries in diverse courses and portfolios.</p>
                        </div>
                        <div class="whyimg">
                            <img src="{{ asset('assets/images1/why4.png') }}">
                            <p class="whycanadapara"> Explore the top universities offering your preferred courses in UK, USA, Canada, France, South Korea etc.</p>
                        </div>
                        <div class="whyimg">
                            <img src="{{ asset('assets/images1/why5.png') }}">
                            <p class="whycanadapara"> End-to-End services from Profile Evaluation to Visa Consultation.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="sec-title text-center">
                    <h4 class="univerheading universitycount"> Over {{ count($universities) }} + Universities and Colleges to study in
                       {{ $countryName->name }}
                    </h4>
                    <p class="findourheading"> Find out which
                    {{ $countryName->name }} universities are a good match for your academic
                    profile</p>
                    <br>
                </div>
                <div class="row">
                </div>
            </div>
        </section>
        <section class="pinkback">
            <div class="container">
                <div class="sec-title text-center">
                    <div class="row universityData">

                        @foreach ($universities as $index => $item)
                            @if ($index >= 11)
                                @break
                            @endif

                            <div class="col-md-4 ">
                                <div class="card">
                                    @if (!empty($item->thumbnail))
                                        <img class="card-img-top uniimage"
                                            src="{{ $item->thumbnail }}"
                                            alt="Card image cap">
                                    @endif
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 unipd">
                                                @if (!empty($item->logo))
                                                    <img
                                                        src="{{ $item->logo }}">
                                                @endif
                                            </div>
                                            <div class="col-md-9 align-self-center">
                                                <h5 class="unihd"> {{ str_replace(["\r", "\n", "\r\n"], '', substr($item->university_name, 0, 22)) }}</h5>
                                            </div>
                                            <div class="col-md-12">
                                                <ul class="deslist">
                                                    <li>
                                                        <i class="fa fa-map"></i>
                                                        Location-{{ str_replace(["\r", "\n", "\r\n"], '', substr($item->university_location, 0, 22)) }}
                                                        </li>
                                                    <li>
                                                        <i class="fa fa-flag"></i>
                                                        Country - {{$item->country->name}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group col-md-12 mb-0">
                                            <a class="apply-btn" href="#"
                                                style="background-image: linear-gradient(to right, #0452b8 , #38d0da);padding: 5px 20px;
                                    display: inline-block;  margin-top: 6px;  border-radius: 6px;color: white;width: 100%;
                                    text-align: center;">
                                                View now </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-4">
                           <div class="card bluecard">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12 ">
                                       <h4 class="bluediv"> {{ count($universities) }} + Universities </h4>
                                       <p class="bluepara"> Find out more about fees, eligibility,
                                          intakes &amp; admission process.
                                          Know the perfect university or college
                                          that suits you!
                                       </p>
                                       <a class="apply-btn" href="#" style="background:white;display: inline-block;  margin-top: 6px;  border-radius: 6px;color: blue;width: 100%;  padding: 10px 0px;text-align: center;"> Contact us  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="">
            <div class="container">
                <div class="sec-title text-center">
                    <p class="Indianstudentheading"> More than 42,000 Indian students studying <br> in
                     {{ $countryName->name }}
                    </p>
                </div>
                <div class="row">
                    @foreach ($testimonials as $key =>$data)
                        <div class="col-md-4"  @if($key == 1) style ='margin-top:50px' @endif>
                            <div class="card customcard ">
                                @if (!empty($data->profile_picture))
                                    <img class="card-img-top"
                                        src="{{ asset('admin/uploads/testimonials') }}/{{ $data->profile_picture }}"
                                        alt="Card image cap">
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 align-self-center">
                                            <h5 class="unihd"> {{ $data->name }}</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-12">
                                            <p>{!! $data->testimonial_desc !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-md-4">
                    <div class="card customcard  bhoomika">
                        <img class="card-img-top" src="{{asset('assets/images1/vin.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 align-self-center">
                                    <h5 class="unihd"> Bhoomika Sanagaram </h5>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <p> She is our esteemed client who
                                        approached Y-Axis to get her German
                                        student visa process done. Y-Axis
                                        helped her to achieve her dream of
                                        studying in Germany.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card customcard">
                        <img class="card-img-top" src="{{asset('assets/images1/grgirl.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 align-self-center">
                                    <h5 class="unihd"> Bhoomika Sanagaram </h5>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <p> She is our esteemed client who
                                        approached Y-Axis to get her German
                                        student visa process done. Y-Axis
                                        helped her to achieve her dream of
                                        studying in Germany.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                </div>
            </div>
        </section>
        <section class="bluebackgrouns loaded">
            <div class="container">
                <h4 class="whycanada"> Why Choose OEL</h4>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="checklist">
                            <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Our approach is Right Course,
                                Right Path</li>
                            <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> One Stop Shop for everything
                                Study Abroad</li>
                            <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Unbiased & Personalized
                                counselling</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="checklist">
                            <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Result driven Test-prep
                                training </li>
                            <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> 1000s of success stories
                                (Test-Prep & Admissions)</li>
                            <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Partners beyond Studies (Post
                                Study Employment Assistance) </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <!--<div class="col-md-3 col-6 pt-30 pb-30">-->
                    <!--    <h2 class="number"> 1M + </h2>-->
                    <!--</div>-->
                    <!--<div class="col-md-3 col-6 pt-30 pb-30">-->
                    <!--    <h2 class="number"> 100k + </h2>-->
                    <!--</div>-->
                    <!--<div class="col-md-3 col-6 pt-30 pb-30">-->
                    <!--    <h2 class="number"> 50 + </h2>-->
                    <!--</div>-->
                    <!--<div class="col-md-3 col-6 pt-30 pb-30">-->
                    <!--    <h2 class="number"> 20 + </h2>-->
                    <!--</div>-->
                    <div class="form-group col-md-5">
                    </div>

                    <div class="form-group col-md-2">
                         <br> <br>
                        <a class="apply-btn" href="#"
                            style="background:white;
                display: inline-block;  margin-top: 6px;  border-radius: 6px;color: blue;width: 100%;  padding: 10px 0px;
                text-align: center;">
                            Check Eligibility <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                            <br> <br>
                    </div>
                    <div class="form-group col-md-5">
                    </div>
                </div>
            </div>
        </section>
        <h4 class="weare"> We are EVERYWHERE </h4>
        <div class="mainlogodiv mb-10 mt-10">
            <div class="slick marquee">
                @foreach ($country as $item)
                    <div class="slick-slide">
                        <div class="inner logobkl">
                            <div class="row">
                                {{-- <div class="col-md-6 crlimg">
                            <img src="{{ asset('assets/images1/aaa.jpg') }}" style="border-radius:60px;width:30px">
                        </div> --}}

                                <div class="col-md-6 crlimg">
                                    <h4 class="aus text-nowrap" style="text-align: center">
                                        {{ substr($item->name, 0, 10) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- 2ndcarousel -->

            <div dir="rtl">
                <div class="slick marquee_rtl">
                    @foreach ($country as $item)
                        <div class="slick-slide">
                            <div class="inner logobkl">
                                <div class="row">
                                    {{-- <div class="col-md-6 crlimg">
                                <img src="{{ asset('assets/images1/aaa.jpg') }}" style="border-radius: 50px">
                            </div> --}}
                                    <div class="col-md-6 crlimg">
                                        <h4 class="ausleft text-nowrap"> {{ substr($item->name, 0, 10) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <section class="girlback">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="girldiv">
                            <h4 class="Chooseheading"> Choose the right course &<br>achieve your goals </h4>
                            <div class="row">
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Business Administration
                                </div>
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Computer Science & IT
                                </div>
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Engineering
                                </div>
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Natural Sciences
                                </div>
                                <div class="col-md-6  col-12 btmpoint">
                                    <li class="dash"> </li> Medicine
                                </div>
                                <div class="col-md-6  col-12 btmpoint">
                                    <li class="dash"> </li> Teaching
                                </div>
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Law
                                </div>
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Computer Science
                                </div>
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Social Work
                                </div>
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Mathematics
                                </div>
                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> Nursing
                                </div>

                                <div class="col-md-6 col-12 btmpoint">
                                    <li class="dash"> </li> MBBS
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </section>
        <div class="rs-newsletter">
            <div class="container">
                <div class="newsletter-wrap">
                    <div class="row ">
                        <div class=" col-md-8">
                            <div class="content-part">
                                <div class="sec-title">
                                    <h3 class="title mb-0 white-color"> Discover OEL . It's easier than you think.</h3>
                                </div>
                                <p class="footerp"> Stay assured, we are always available. </p>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>

                        <div class="form-group col-md-2">
                            <a class="apply-btn" href="#"
                                style="background:white;
                                display: inline-block;  margin-top: 6px;  border-radius: 6px;color: blue;width: 100%;  padding: 10px 0px;
                                text-align: center;">
                                Contact us <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#inputGroupSelect04').select2({
                    placeholder: 'Search...'
                });
                $('#inputGroupSelect04').on('change', function() {
                    var countryId = $(this).val();
                    $.blockUI({ message: '<div class="spinner"></div><h4>Loading...</h4>' });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('get-country-data') }}",
                        type: 'POST',
                        data: {
                            countryId: countryId
                        },
                        success: function(response) {
                            if (response.success) {
                                if (response.countryName) {
                                    $('.countryName').text(response.countryName);
                                    $('.study-in').text(`Study in ${ response.countryName }`);
                                    $('.studyStudent').text(`66,000+ Indian students choose to study in ${ response.countryName }`);
                                    $('.get-admission').text(`Secure admission to a highly-ranked university in  ${ response.countryName }`);
                                    $('.whycanada').text(`Why ${ response.countryName }`);
                                    $('.findourheading').text(`Find out which ${ response.countryName } universities are a good match for your academic profile`);
                                    $('.Indianstudentheading').text(`More than 42,000 Indian students studying in ${ response.countryName }`);
                                }
                                 if (response.universities) {
                                    $('.universityData').empty();
                                    var count = 0;
                                    $.each(response.universities, function(index, item) {
                                        if (count > 10) {
                                            return false; // Exit the loop once 12 items are processed
                                        }
                                        var html = generateUniversityCardHtml(item);
                                        $('.universityData').append(html);
                                        count++;
                                    });
                                    var blueCardHtml = generateBlueCardHtml();
                                    $('.universityData').append(blueCardHtml);
                                }
                                function generateUniversityCardHtml(item) {
                                    var html = `<div class="col-md-4">
                                                    <div class="card">`;
                                    if (item.thumbnail) {
                                        html += `<img class="card-img-top uniimage" src="${item.thumbnail}" alt="Card image cap">`;
                                    }
                                    html += `<div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3 unipd">`;
                                    if (item.logo) {
                                        html += `<img src="${item.logo}">`;
                                    }
                                    html += ` </div>
                                                        <div class="col-md-9 align-self-center">
                                                            <h5 class="unihd">${item.university_name}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <ul class="deslist">
                                                                <li><i class="fa fa-map"></i>
                                                                    Location - ${item.university_location}</li>
                                                                <li>
                                                                    <i class="fa fa-flag"></i>
                                                                    Country -  ${item.country.name}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group col-md-12 mb-0">
                                                        <a class="apply-btn" href="#" style="background-image: linear-gradient(to right, #0452b8 , #38d0da);padding: 5px 20px; display: inline-block; margin-top: 6px; border-radius: 6px;color: white;width: 100%;text-align: center;">View now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                    return html;
                                }
                                function generateBlueCardHtml() {
                                    var html = `<div class="col-md-4">
                                                    <div class="card bluecard">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 ">
                                                                    <h4 class="bluediv"> 112 + Universities </h4>
                                                                    <p class="bluepara"> Find out more about fees, eligibility,
                                                                        intakes &amp; admission process.
                                                                        Know the perfect university or college
                                                                        that suits you!
                                                                    </p>
                                                                    <a class="apply-btn" href="#" style="background:white;display: inline-block;  margin-top: 6px;  border-radius: 6px;color: blue;width: 100%;  padding: 10px 0px;text-align: center;"> Contact us  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
                                    return html;
                                }
                                if (response.totalUniversity || response.countryName) {
                                    var data = `Over ${response.totalUniversity} + Universities and Colleges to study in ${response.countryName}`;
                                    $('.universitycount').text(data);
                                }
                                if (response.sliderimage && response.sliderimage.length > 0) {
                                    $('.sliderData').empty();
                                    $.each(response.sliderimage[0], function(key, imageitem) {
                                        var slider = '<div class="carousel-item ' + (key === 0 ? 'active' : '') + '">' +
                                                    '<img src="' + imageitem.filepath + '" width="100%" height="529px !important">' +
                                                    '</div>';
                                        $('.sliderData').append(slider);
                                    });
                                }else{
                                    $('.sliderData').empty();
                                    var slider =` <div class="carousel-item active">
                                                <img src="{{ asset('assets/images1/banner/banner1.png') }}" width="100%"
                                                    height="529px !important">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ asset('assets/images1/banner/banner2.png') }}" width="100%"
                                                        height="529px !important">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ asset('assets/images1/banner/banner3.png') }}" width="100%"
                                                        height="529px !important">
                                                </div>`;
                                    $('.sliderData').append(slider);

                                }
                            } else {
                                // Handle the case where success is false
                            }
                            $.unblockUI();
                        },
                        error: function(xhr, status, error) {
                            $.unblockUI();
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>

    @endsection
