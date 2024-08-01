@extends('frontend.layouts.main')
@section('title', 'Program')

@section('content')
<style>
.rs-popular-courses.style3 .courses-item .content-part {
        position: relative;
        padding: 30px 10px 20px;
    }
    .course_card_logo_sec {
    padding: 10px 10px 0px;
    display: flex;
    min-height: 100px;
    }

    .vd{
        width: 96%;
    position: relative;
    top: -34px;
    }
    .courses-item.course-logo {
        margin: 0px 2px;
        border: 2px solid #dee2e6;
        padding: 0px 10px !important;
    }
</style>
<div class="rs-course-breadcrumbs breadcrumbs-overlay">
    <div class="breadcrumbs-img">
       <img src="{{asset('frontend/courses.jpg')}}" alt="Breadcrumbs Image">
    </div>
    <form class="breadcrumbs-text white-color" id="filter_form" action="{{url('programs')}}" method="get" novalidate="novalidate">
       <h1 class="page-title">OEL / Programs</h1>
       <div class="container">
          <div class="row form_input_wrapper">
             <div class="col-lg-3 col-md-3 col-sm-12">
                <select name="country" class="form-control search-slt" >
                   <option value="">--Select Country--</option>
                   @foreach ($country as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
                </select>
             </div>
             <div class="col-lg-3 col-md-3 col-sm-12">
                <select  name="university_id" class="form-control search-slt">
                    <option value="" >-- Select University --</option>
                    @foreach ($universities as $item)
                    <option value="{{$item->id}}">{{ Str::limit($item->university_name, 30) }}</option>
                    @endforeach
                </select>
             </div>
             <div class="col-lg-3 col-md-3 col-sm-12">
                <select  name="program_id" class="form-control search-slt">
                    <option value="" >-- Select Program --</option>
                    @foreach ($programs as $item)
                    <option value="{{$item->id}}">{{ Str::limit($item->name, 30) }}</option>
                    @endforeach
                </select>
             </div>
             <div class="col-lg-3 col-md-3 col-sm-12">
                <button type="submit" class="form-control search-slt btn btn-primary">Search</button>
             </div>
          </div>
          <div id="filter_form_error" class="text-danger"></div>
       </div>
    </form>
 </div>
<section id="app" class="numbers mt-40 sm-mt--60 loaded">
    <div class="container">
        <div  class="row" id="program-data">
        </div>
        <div class="ajax-load text-center" style="display:none">
            <i class="fa fa-spinner"></i> Loading ...
         </div>
         <div class="no-data text-center mb-4" style="display:none">
             <b>No data - last page</b>
         </div>
    </div>
 </section>
<script>
     $(document).ready(function() {
            function csrf() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            let pages = 2;
            let current_page = 0;
            let bool = false;
            $(window).scroll(function() {
                let height = 1500;
                if ($(window).scrollTop() + $(window).height() >= height && bool == false ) {
                    bool = true;
                    $('.ajax-load').show();
                    lazyLoad(pages)
                        .then(() => {
                            bool = false;
                            pages++;
                            // $('.no-data').show();
                        })
                }
            })
            function getParams() {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.toString();
            }
            function lazyLoad(page) {
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: `?page=${page}&${getParams()}`,
                        type: 'GET',
                        beforeSend: function() {
                            $('.ajax-load').show();
                        },
                        success: function(response) {
                            $('.ajax-load').hide();
                            let html = '';
                            if (response.data.data.length == 0) {
                                $('.ajax-load').hide();
                                $('.no-data').show();
                                return;
                            }
                            $.each(response.data.data, function(index, item) {
                               var url_param =getParams();
                               console.log(item);
                               var assetBaseUrl = "{{ asset('') }}";
                                html += `
                                    <div class="col-lg-4 col-md-4 col-sm-6 mt-30 " style="padding: 0px 4px !important">
                                        <div class="courses-item course-logo">
                                            <div>
                                                <div class="course_card_logo_sec d-flex">
                                                    <div class="img-part">
                                                        <a href="{{url('course-details')}}/${item.id}">
                                                        <img src="${assetBaseUrl}${item.university_name?.logo}" alt="${item.university_name?.university_name}" class="img-thumbnail ${item.university_name?.university_name}">
                                                        </a>
                                                    </div>
                                                    <div style="flex: 1 1 0%;">
                                                    <h5 class="mb-1"><a href="{{url('course-details')}}/${item.id}">${item.name}</a></h5>
                                                    <a href="{{url('university-details')}}/${item.university_name?.id}" style="font-weight: 500; font-size: 14px;">${item.university_name?.university_name}</a>
                                                    </div>
                                                </div>
                                                <div class="content-part">
                                                    <ul class="meta-part">
                                                        <li class="user"><i class="fa fa-graduation-cap"></i> <span class="info_bold">Level</span> <span>${item.program_level?.name}</span></li>
                                                        <li class="user"><i class="fa fa-clock-o"></i> <span class="info_bold">Duration</span> <span>${item.length} month</span></li>
                                                        <li class="user"><i class="fa fa-money"></i> <span class="info_bold">Application Fees</span> <span>${item.application_fee}</span></li>
                                                        <li class="user">
                                                            <i class="fa fa-money"></i> <span class="info_bold">1st Year Tuition Fees</span> <!----> <span>${item.currency}  ${item.tution_fee}</span>
                                                        </li>
                                                        <li class="user"><i class="fa fa-info-circle"></i>
                                                            <span class="info_bold">Exams Required</span>
                                                            <span><span class="exam_type_item">${item.university_name?.testrequired}</span></span>
                                                        </li>
                                                    </ul>
                                                    <hr class="mb-10 mt-10">
                                                    <p class="mb-0" style="font-size: 13px;">fees may vary according to university current structure and policy</p>
                                                    <hr class="mb-10 mt-10">
                                                    <div class="bottom-part">
                                                    <div class="info-meta">
                                                        <ul>
                                                            <li class="user"><i class="fa fa-flag"></i> <span>${item.university_name?.country_name?.name}</span> <span>-</span> <span>${item.programType}</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="btn-part vd"><a href="{{url('course-details')}}/${item.id}">View Details<i class="flaticon-right-arrow"></i></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $('#program-data').append(html);
                            resolve();
                        }
                    });
                })
            }
            loadData(1);
            function loadData(page) {
                $.ajax({
                    url: `?page=${page}&${getParams()}`,
                    type: 'GET',
                    beforeSend: function() {
                        $('.ajax-load').show();
                    },
                    success: function(response) {
                        $('.ajax-load').hide();
                        let html = '';
                        if (response.data.data.length == 0) {
                                $('.ajax-load').hide();
                                $('.no-data').show();
                                return;
                        }
                        $.each(response.data.data, function(index, item) {
                                var url_param =getParams();
                                var assetBaseUrl = "{{ asset('') }}";
                                html += `
                                 <div class="col-lg-4 col-md-4 col-sm-6 mt-30 " style="padding: 0px 4px !important">
                                        <div class="courses-item course-logo">
                                            <div>
                                                <div class="course_card_logo_sec d-flex">
                                                    <div class="img-part">
                                                        <a href="{{url('course-details')}}/${item.id}">
                                                        <img src="${assetBaseUrl}${item.university_name?.logo}" alt="${item.university_name?.university_name}" class="img-thumbnail ${item.university_name?.university_name}">
                                                        </a>
                                                    </div>
                                                    <div style="flex: 1 1 0%;">
                                                    <h5 class="mb-1"><a href="{{url('course-details')}}/${item.id}">${item.name}</a></h5>
                                                    <a href="{{url('university-details')}}/${item.university_name?.id}" style="font-weight: 500; font-size: 14px;">${item.university_name?.university_name}</a>
                                                    </div>
                                                </div>
                                                <div class="content-part">
                                                    <ul class="meta-part">
                                                        <li class="user"><i class="fa fa-graduation-cap"></i> <span class="info_bold">Level</span> <span>${item.program_level?.name}</span></li>
                                                        <li class="user"><i class="fa fa-clock-o"></i> <span class="info_bold">Duration</span> <span>${item.length} month</span></li>
                                                        <li class="user"><i class="fa fa-money"></i> <span class="info_bold">Application Fees</span> <span>${item.application_fee}</span></li>
                                                        <li class="user">
                                                            <i class="fa fa-money"></i> <span class="info_bold">1st Year Tuition Fees</span> <!----> <span>${item.currency}  ${item.tution_fee}</span>
                                                        </li>
                                                        <li class="user"><i class="fa fa-info-circle"></i>
                                                            <span class="info_bold">Exams Required</span>
                                                            <span><span class="exam_type_item">${item.university_name?.testrequired}</span></span>
                                                        </li>
                                                    </ul>
                                                    <hr class="mb-10 mt-10">
                                                    <p class="mb-0" style="font-size: 13px;">fees may vary according to university current structure and policy</p>
                                                    <hr class="mb-10 mt-10">
                                                    <div class="bottom-part">
                                                    <div class="info-meta">
                                                        <ul>
                                                            <li class="user"><i class="fa fa-flag"></i> <span>${item.university_name?.country_name?.name}</span> <span>-</span> <span>${item.programType}</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="btn-part vd"><a href="{{url('course-details')}}/${item.id}">View Details<i class="flaticon-right-arrow"></i></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            `;
                        });
                        $('#program-data').append(html);
                    }
                });
            }
        });
</script>
@endsection
