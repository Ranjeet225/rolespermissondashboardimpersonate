@extends('frontend.layouts.main')
@section('content')
    <section class="intro-section gray-bg pt-94 pb-40 md-pt-64 md-pb-70 loaded">
        <div class="container">
            <div class="row clearfix">

                <!-- Video Column -->
                <div class="video-column col-lg-4">
                    <div class="inner-column">
                        <div class="course-features-info">
                            <div class="logo_center">
                                <div class="university-logo">
                                    <img src="{{asset($about_university->logo ?? null)}}">
                                </div>
                                <h4 class="university_name">{{$about_university->university_name}}</h4>
                            </div>

                            <ul>
                                <li class="lectures-feature">
                                    <i class="fa fa-flag"></i>
                                    <span class="label">Country</span>
                                    <span class="value">{{$about_university->country->name ?? null}}</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-calendar"></i>
                                    <span class="label">Founded In</span>
                                    <span class="value">{{$about_university->founded_in}}</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-list-alt"></i>
                                    <span class="label">University Type</span>
                                    <span class="value">{{$about_university->university_type->name}}</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-users"></i>
                                    <span class="label">Total Students</span>
                                    <span class="value">{{$about_university->total_students ?? null}}+</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-phone"></i>
                                    <span class="label">Phone Number</span>
                                    <span class="value">+{{$about_university->phone_number ?? null}}</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-envelope"></i>
                                    <span class="label">Email</span>
                                    <span class="value">{{$about_university->email ?? null}}</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-map-marker"></i>
                                    <span class="label">ZIP Code</span>
                                    <span class="value">{{$about_university->zip ?? null}}</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-globe"></i>
                                    <span class="label">Website</span>
                                    <span
                                        class="value">{{$about_university->website ?? null}}</span>
                                </li>


                                <li class="lectures-feature">
                                    <i class="fa fa-building-o"></i>
                                    <span class="label">Size of Campus</span>
                                    <span class="value">{{$about_university->size_of_campus ?? null}}</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-users"></i>
                                    <span class="label">Male Female Ratio</span>
                                    <span class="value">{{$about_university->male_female_ratio ?? null}}</span>
                                </li>

                                <li class="lectures-feature">
                                    <i class="fa fa-users"></i>
                                    <span class="label">Faculty Student Ratio</span>
                                    <span class="value">{{$about_university->faculty_student_ratio ?? null}}</span>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Content Column -->
                <div class="col-lg-8 sm-mt-50 md-mb-50">
                    <!-- Intro Info Tabs-->
                    <div class="intro-info-tabs">
                        <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="false">Home</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-item tab-btn nav-link " id="programs-tab" data-toggle="tab" href="#programs"
                                    role="tab" aria-controls="programs" aria-selected="false">Programs</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-item tab-btn nav-link " id="gallery-tab" data-toggle="tab"
                                    href="#gallery" role="tab" aria-controls="gallery" aria-selected="true">Gallery</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-item tab-btn nav-link" id="notes-tab" data-toggle="tab" href="#notes"
                                    role="tab" aria-controls="notes" aria-selected="false">Notes</a>
                            </li>
                        </ul>
                        <div class="tab-content tabs-content" id="myTabContent">
                            <!-- Home Tab -->
                            <div style="background: transparent !important;" class="tab-pane tab active show" id="home"
                                role="tabpanel" aria-labelledby="home-tab">
                                <div class="">

                                    <div class="my-2">
                                        <div class="r-w-s ">
                                            <h3 class="mb-10 c-desc-t-h-r" id="features">Home</h3>
                                            <div class="details">
                                                <p>{!! $about_university->placement ?? null !!}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="c-detail-right">
                                        <div class="row">
                                            <div class="col-md-12 my-2">
                                                <div class="r-w-s">
                                                    <h3 class="mb-10 c-desc-t-h-r" id="location">Location</h3>
                                                    <div class="row">
                                                        <div class="col-12 ">
                                                            <p><i class="fa fa-map-marker fa-2x" style="font-size: 18px;">
                                                                </i> &nbsp; {{$about_university->country->name ?? null}},
                                                                {{$about_university->province->name ?? null}},{{$about_university->city ?? null}},
                                                                {{$about_university->zip ?? null}}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="tab-content" id="myTabContent">
                                                                <div class="tab-pane fade show active" role="tabpanel"
                                                                    aria-labelledby="map-tab">
                                                                    <div id="map">
                                                                        @php
                                                                        $src = explode('src="', $about_university->map_location);
                                                                        $src = explode('"', $src[1]);
                                                                        $src = isset($src[0]) ? $src[0] : '';
                                                                        @endphp
                                                                        @if(!empty($src))
                                                                        <iframe src="{{$src}}" width="100%" frameborder="0"></iframe>
                                                                        @else
                                                                        <iframe src="{{$about_university->map_location}}" width="100%" frameborder="0"></iframe>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="street" role="tabpanel"
                                                                    aria-labelledby="street-tab">
                                                                    ...
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane tab" id="programs" role="tabpanel" aria-labelledby="programs-tab">
                                <div class="">
                                    {{-- <div class="my-2">
                                        <div class="r-w-s">
                                            <h3 class="mb-10 c-desc-t-h-r" id="features">Programs</h3>
                                            <form action="https://overseaseducationlane.com/university_details/710"
                                                method="get" class="input-group col-md-12">
                                                <input type="hidden" name="tab" value="programs">
                                                <input name="program_name" class="col-md-12 form-control py-2"
                                                    type="search" id="example-search-input" value=""
                                                    placeholder="Search Degree, Program or Courses">

                                                <span class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </form>
                                        </div>
                                    </div> --}}
                                    <div class="my-2">
                                        <div class="r-w-s">
                                            <h3 class="mb-10 c-desc-t-h-r" id="program">All Courses offered</h3>
                                            <div class="row">
                                                @forelse ($about_university->program as $item )
                                                <div class="col-md-12 mb-20 border  ">
                                                    {{$item->name}}
                                                    <div class="courses-item course-logo">
                                                        <div>
                                                           <div class="course_card_logo_sec d-flex">
                                                              <div class="img-part"><a href="course_details/27907">
                                                                <img src="{{asset($about_university->logo)}}" alt="university logo" class="img-thumbnail university_logo"></a></div>
                                                              <div style="flex: 1 1 0%;">
                                                                 <h5 class="mb-1"><a href="course_details/27907">{{$item->name}}</a></h5>
                                                                 <a href="{{$about_university->website}}" style="font-weight: 500; font-size: 14px;">{{$about_university->university_name ?? null}}</a>
                                                              </div>
                                                           </div>
                                                           <div class="content-part">
                                                              <ul class="meta-part">
                                                                 <li class="user"><i class="fa fa-graduation-cap"></i> <span class="info_bold">Level</span> <span>{{$item->program->programLevel->name ?? null}}</span></li>
                                                                 <li class="user"><i class="fa fa-clock-o"></i> <span class="info_bold">Duration</span> <span>{{$item->program->length ?? null}}</span></li>
                                                                 <li class="user"><i class="fa fa-money"></i> <span class="info_bold">Application Fees</span> <span>FREE</span></li>
                                                                 <li class="user">
                                                                    <i class="fa fa-money"></i> <span class="info_bold">1st Year Tuition Fees</span> <!----> <span> {{$item->program->currency ?? null}} {{$item->program->tution_fee ?? null}}</span>
                                                                 </li>
                                                                 <li class="user"><i class="fa fa-info-circle"></i> <span class="info_bold">Exams Required</span> <span><span class="exam_type_item">{{$item->program->tution_fee ?? null}}</span></span></li>
                                                              </ul>
                                                              <p class="mb-0" style="font-size: 13px;">fees may vary according to university current structure and policy</p>
                                                              <div class="bottom-part">
                                                                 <div class="info-meta">
                                                                    <ul>
                                                                       <li class="user"><i class="fa fa-flag"></i> <span>United Kingdom</span> <span>-</span> <span>Full Time</span></li>
                                                                    </ul>
                                                                 </div>
                                                                 <div class="btn-part"><a href="{{url('course-details/'.$item->id)}}" class="btn btn-primary">View Details<i class="flaticon-right-arrow"></i></a></div>
                                                              </div>
                                                           </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                <hr class="mb-20">
                                                @empty
                                                <div class="nodata">
                                                    No Program or Courses are currently offered by this university
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane tab " id="gallery" role="tabpanel"
                                aria-labelledby="gallery-tab">
                                <div class="">
                                    <div class="my-2">
                                        <div class="r-w-s">
                                            <h3 class="mb-10 c-desc-t-h-r" id="features">Gallery</h3>
                                            <div class="galary_images row">
                                                @php
                                                    $images= DB::table('university_galary_images')->where('university_id',$about_university->id)->get();
                                                @endphp
                                                @foreach ($images as $image)
                                                <div class="col-md-4 col-sm-6" style="margin: 15px 0px;">
                                                    <img class="img-fluid galary_image_item"
                                                        onclick="openModal(parseInt('0') + 1)"
                                                        src="{{asset($image->file_name)}}" alt="{{$image->file_name}}">
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="galary_videos">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                                <div class="">
                                    <div class="my-2">
                                        <div class="r-w-s">
                                            <h3 class="mb-10 c-desc-t-h-r" id="location">Notes</h3>
                                            <p>{!! $about_university->notes !!}.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>
    </section>
@endsection
