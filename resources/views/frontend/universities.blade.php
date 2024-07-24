@extends('frontend.layouts.main')
@section('title', 'Universities')

@section('content')
<div class="rs-course-breadcrumbs breadcrumbs-overlay">
    <div class="breadcrumbs-img">
       <img src="{{asset('frontend/courses.jpg')}}" alt="Breadcrumbs Image">
    </div>
    <form class="breadcrumbs-text white-color" id="filter_form" action="{{url('universities')}}" method="get" novalidate="novalidate">
        @csrf
       <h1 class="page-title">OEL / Universities</h1>
       <div class="container">
          <div class="row form_input_wrapper">
             <div class="col-lg-4 col-md-4 col-sm-12">
                <select name="country" class="form-control search-slt" >
                   <option value="">--Select Country--</option>
                   @foreach ($country as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
                </select>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-12">
                <select  name="university_name" class="form-control search-slt">
                    <option value="" >-- Select University --</option>
                    @foreach ($universities as $item)
                    <option value="{{$item->id}}">{{ Str::limit($item->university_name, 30) }}</option>
                    @endforeach
                </select>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-12">
                <button type="submit" class="form-control search-slt btn btn-primary">Search</button>
             </div>
          </div>
          <div id="filter_form_error" class="text-danger"></div>
       </div>
    </form>
 </div>
<section id="app" class="numbers mt-40 sm-mt--60 loaded">
    <div class="container">
        <div  class="row" id="university-data">
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
                               var assetBaseUrl = "{{ asset('') }}";
                                html += `
                                 <div class="col-lg-4 col-md-4 col-sm-4 mb-30">
                                    <div class="courses-item course-logo">
                                        <div>
                                        <a href="${item.website}" class="u__thumbnail">
                                            <img src="${assetBaseUrl}${item.thumbnail ?? ''}" class="university_thumbnail">
                                        </a>
                                        <div class="d-flex">
                                            <a href="${item.website}" class="university_logo">
                                                <div class="u-logo"><img src="${assetBaseUrl}${item.logo ?? ''}" class="img-fluid uc-logo"></div>
                                            </a>
                                            <h5 class="university_name" style="margin-left: 10px; margin-bottom: 0px; margin-top: 5px;">
                                                <a href=""></a>
                                            </h5>
                                        </div>
                                        <div class="content-part">
                                            <ul class="meta-part" style="flex: 1 1 0%;">
                                                <li class="user meta_item"><i class="fa fa-map"></i> <span class="info_bold">Location: </span> <span class="text_ellipsis">${item.country?.name ?? ''}, ${item.province?.name},${item.city},${item.zip}</span></li>
                                                <li class="user meta_item"><i class="fa fa-flag"></i> <span class="info_bold">Country: </span> <span>${item.country?.name ?? ''}</span></li>
                                                <li class="user meta_item"><i class="fa fa-list"></i> <span class="info_bold">University Type: </span> <span> ${item.university_type?.name}</span></li>
                                            </ul>
                                            <hr class="mb-10 mt-10">
                                            <div class="bottom-part">
                                                <div class="info-meta" style="flex: 1 1 0%;"></div>
                                                <div class="btn-part"><a href="{{url('university-details')}}/${item.id}">View Details<i class="flaticon-right-arrow"></i></a></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            });
                            $('#university-data').append(html);
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
                                <div class="col-lg-4 col-md-4 col-sm-4 mb-30">
                                    <div class="courses-item course-logo">
                                        <div>
                                        <a href="${item.website}" class="u__thumbnail">
                                            <img src="${assetBaseUrl}${item.thumbnail ?? ''}" class="university_thumbnail">
                                        </a>
                                        <div class="d-flex">
                                            <a href="${item.website}" class="university_logo">
                                                <div class="u-logo"><img src="${assetBaseUrl}${item.logo ?? ''}" class="img-fluid uc-logo"></div>
                                            </a>
                                            <h5 class="university_name" style="margin-left: 10px; margin-bottom: 0px; margin-top: 5px;">
                                                <a href=""></a>
                                            </h5>
                                        </div>
                                        <div class="content-part">
                                            <ul class="meta-part" style="flex: 1 1 0%;">
                                                <li class="user meta_item"><i class="fa fa-map"></i> <span class="info_bold">Location: </span> <span class="text_ellipsis">${item.country?.name ?? ''}, ${item.province?.name},${item.city},${item.zip}</span></li>
                                                <li class="user meta_item"><i class="fa fa-flag"></i> <span class="info_bold">Country: </span> <span>${item.country?.name ?? ''}</span></li>
                                                <li class="user meta_item"><i class="fa fa-list"></i> <span class="info_bold">University Type: </span> <span> ${item.university_type?.name}</span></li>
                                            </ul>
                                            <hr class="mb-10 mt-10">
                                            <div class="bottom-part">
                                                <div class="info-meta" style="flex: 1 1 0%;"></div>
                                                <div class="btn-part"><a href="{{url('university-details')}}/${item.id}">View Details<i class="flaticon-right-arrow"></i></a></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#university-data').append(html);
                    }
                });
            }
        });
</script>
@endsection
