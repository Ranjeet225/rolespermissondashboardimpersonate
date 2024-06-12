@extends('frontend.layouts.main')
@section('frontend-css')
    <style>
        /*mycss*/
        .accordion .card-header:after {
            font-family: 'FontAwesome';
            content: "\f068";
            float: right;
        }

        .accordion .card-header.collapsed:after {
            /* symbol for "collapsed" panels */
            content: "\f067";
        }

        .dashboardacor {
            padding: 0px 0px !important;
        }

        .ct {
            font-size: 17px;
            font-weight: 700;
            color: #505050 !important;
        }

        .clp {
            background: #FFFFFF;
            border-bottom: 2px solid #ced4da82;
        }

        .mynav a {
            font-size: 17px !important;
            padding: 11px 0px;
        }

        .frmpd {
            padding: 0px;
        }

        .srchbtn {
            background: transparent;
            border-left: 0px;
            border-top: 2px solid gray;
            border-bottom: 2px solid #979797;
            border-radius: 0px 20px 20px 0px;
            padding: 5px 8px;
        }

        .keyword {
            width: 86%;
            border-right: 0px;
            border-bottom: 2px solid #979797;
            border-radius: 20px 0px 0px 20px;
            padding: 5px 10px;
        }

        .playlist-name {
            margin: 3px 0px;
        }

        .collapse {
            overflow-y: scroll;
            max-height: 300px !important;
        }
    </style>
@endsection
@section('content')
    <br>
    @php
        $country_name = App\Models\Country::whereIn('id', explode(',', $_GET['country'] ?? null))->get();
        $program_level_name = App\Models\ProgramLevel::whereIn(
            'id',
            explode(',', $_GET['program_level'] ?? null),
        )->get();
        $program_sub_level_name = App\Models\ProgramSubLevel::whereIn(
            'id',
            explode(',', $_GET['program_sub_level'] ?? null),
        )->get();
        $education_level_name = App\Models\EducationLevel::whereIn(
            'id',
            explode(',', $_GET['education_level'] ?? null),
        )->get();
        $program_discipline_name = App\Models\ProgramDiscipline::whereIn(
            'id',
            explode(',', $_GET['program_displine'] ?? null),
        )->get();
        $program_sub_discipline_name = App\Models\ProgramSubdiscipline::whereIn(
            'id',
            explode(',', $_GET['program_subdispline'] ?? null),
        )->get();
        $eng_proficiency_level_name = App\Models\EngProficiencyLevel::whereIn(
            'id',
            explode(',', $_GET['eng_proficiency_level'] ?? null),
        )->get();
        $other_exam_name = App\Models\Exam::whereIn('id', explode(',', $_GET['other_exam'] ?? null))->get();
        $state = App\Models\Province::where('id', $university->state ?? null)->get();
        $university_type = App\Models\SchoolType::where('id', $university->type_of_university ?? null)->get();
    @endphp
    
    <section>
        <div class="container ">
            <div class="d-flex">
                <div class="country_name">
                    @foreach ($country_name as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach
                </div>
                <div class="program_level_name px-2 ">
                    @foreach ($program_level_name as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach
                </div>
                <div class="program_sub_level_name px-2">
                    @foreach ($program_sub_level_name as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach
                </div>
                <div class="education_level_name px-2">
                    @foreach ($education_level_name as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach
                </div>
                <div class="intake_name px-2">
                </div>
                <div class="program_discipline_name px-2">
                    @foreach ($program_discipline_name as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach
                </div>
                <div class="program_sub_discipline_name px-2">
                    @foreach ($program_sub_discipline_name as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach
                </div>
                <div class="eng_proficiency_level_name px-2">
                    @foreach ($eng_proficiency_level_name as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach
                </div>
                <div class="other_exam_name px-2">
                    @foreach ($other_exam_name as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach
                </div>
                <br>
            </div>
            <div class="row">
                <h5>
                    <h4 class="title">
                        <img src="https://images.leverageedu.com/assets/img/course-finder/party.png" style="height: 30px" />
                        <span class="course_count"></span> Courses in <span class="university_count"></span> universities found
                    </h4>
                </h5>
            </div>
        </div>

    </section>
    <section class="intro-section gray-bg  pb-40 md-pt-64 md-pb-70 loaded">
        <div class="container">
            <div class="row clearfix">
                <!-- Video Column -->
                <div class="video-column col-lg-4 col-md-4 ">
                    <div class="inner-column">
                        <div class="course-features-info dashboardacor">
                            <div id="accordion" class="accordion">
                                <div class="card mb-0">
                                    <div class="card-header collapsed clp" data-toggle="collapse" href="#collapseOne">
                                        <a class="ct"> Country </a>
                                    </div>
                                    <div id="collapseOne" class="card-body collapse" data-parent="#accordion">
                                        <div class="addto-search">
                                            <form action="#">
                                                <div class="form-input">
                                                    <input class="keyword" type="text"
                                                        placeholder="Search Country"><button class="search-button  srchbtn">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="addto-playlists">
                                            <ul>
                                                @foreach ($country as $item)
                                                    <li>
                                                        <label for="random-1" class="country-name">
                                                            <input type="checkbox" name="country[]" class="country-checkbox"
                                                                value="{{ $item->id }}"
                                                                id="{{ $item->id }}-country"
                                                                {{ in_array($item->id, $country_name->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                            {{ $item->name }}
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo">
                                        <a class="ct"> Program Level </a>
                                    </div>
                                    <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                                        <div class="addto-search">
                                            <form action="#">
                                                <div class="form-input ">
                                                    <input class="keyword" type="text"
                                                        placeholder="Program Level "><button class="search-button  srchbtn">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="addto-playlists">
                                            <ul>
                                                @foreach ($program_level as $item)
                                                    <li>
                                                        <label for="{{ $item->id }}-program-level"
                                                            class="playlist-name">
                                                            <input class="program_level_value"
                                                                id="{{ $item->id }}-program-level"
                                                                {{ in_array($item->id, $program_level_name->pluck('id')->toArray()) ? 'checked' : '' }}
                                                                type="checkbox" name="program_level[]"
                                                                value="{{ $item->id }}"
                                                                onchange="fetchProgramSubLevel(this.id)">
                                                            {{ $item->name }} </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree">
                                        <a class="ct"> Progam SubLevel </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul class="program-sub-level">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp" id="education_level" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapsefour">
                                        <a class="ct"> Education Level </a>
                                    </div>
                                    <div id="collapsefour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul id="education-level-list">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header collapsed clp" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseThree3">
                                        <a class="ct"> Intake </a>
                                    </div>
                                    <div id="collapseThree3" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul>
                                                    @foreach (range(1, 12) as $month)
                                                        <li>
                                                            <label for="random-{{ $month }}"
                                                                class="playlist-name">
                                                                <input id="random-{{ $month }}" type="checkbox"
                                                                    name="intake[]" class="intake-name-data"
                                                                    value="{{ $month }}" id="">
                                                                {{ date('M', strtotime(date('Y') . '-' . $month . '-01')) }}</label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp" data-toggle="collapse"
                                        data-parent="#accordion" href="#discipline">
                                        <a class="ct">Program Discipline </a>
                                    </div>
                                    <div id="discipline" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul>
                                                    @foreach ($program_discipline as $item)
                                                        <li>
                                                            <label for="random-1" class="playlist-name">
                                                                <input type="checkbox" name="program_discipline[]"
                                                                    class="program_discipline_checkbox"
                                                                    {{ in_array($item->id, $program_discipline_name->pluck('id')->toArray()) ? 'checked' : '' }}
                                                                    value="{{ $item->id }}"
                                                                    id="{{ $item->id }} "> {{ $item->name }}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp subdiscipline" data-toggle="collapse"
                                        data-parent="#accordion" href="#subdiscipline">
                                        <a class="ct">Program Sub Discipline </a>
                                    </div>
                                    <div id="subdiscipline" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul class="program_subdiscipline">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp end_profiency_level" data-toggle="collapse"
                                        data-parent="#accordion" href="#end_profiency_level">
                                        <a class="ct">English Profiency Level </a>
                                    </div>
                                    <div id="end_profiency_level" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul>
                                                    @foreach ($eng_proficiency_level as $item)
                                                        <li>
                                                            <label for="random-1" class="playlist-name">
                                                                <input type="checkbox" name="end_profiency_level[]"
                                                                    class="eng-pro"
                                                                    {{ in_array($item->id, $eng_proficiency_level_name->pluck('id')->toArray()) ? 'checked' : '' }}
                                                                    value="{{ $item->id }}"
                                                                    id="{{ $item->id }} "> {{ $item->name }}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp other_exam" data-toggle="collapse"
                                        data-parent="#accordion" href="#other_exam">
                                        <a class="ct">Other Exam </a>
                                    </div>
                                    <div id="other_exam" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul class="other_exam_show">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseThree4">
                                        <a class="ct">Scholarship </a>
                                    </div>
                                    <div id="collapseThree4" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul>
                                                    <li>
                                                        <label for="random-1" class="playlist-name">
                                                            <input id="random-1" type="checkbox" name="schlorship[]"
                                                                value="schlarship"> Scholarship Available </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header collapsed clp" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseThree5">
                                        <a class="ct"> Tuition Fees Budget </a>
                                    </div>
                                    <div id="collapseThree5" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="addto-playlists">
                                                <ul>
                                                    <li>
                                                        <label for="random-1" class="playlist-name">
                                                            <input id="random-1" type="checkbox" name="tution_fees[]"
                                                                value="tution_fees">Tuition Fees Budget</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Print GET request --}}

                <!-- Content Column -->
                <div class="col-lg-8 col-md-8 sm-mt-50 md-mb-50">
                    <!-- Intro Info Tabs-->
                    <div class="intro-info-tabs">
                        <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                            <li class="nav-item tab-btns w-50 mynav">
                                <a class="nav-link tab-btn active" id="home-tab" data-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="false">
                                    <i class="fa fa-university" aria-hidden="true"></i> Universities (<span class="university_count"></span>)
                                     </a>
                            </li>
                            <li class="nav-item tab-btns w-50 mynav">
                                <a class="nav-item tab-btn nav-link " id="programs-tab" data-toggle="tab"
                                    href="#programs" role="tab" aria-controls="programs" aria-selected="false">
                                    <i class="fa fa-book" aria-hidden="true"></i> Courses  (<span class="course_count"></span>) </a>
                            </li>
                        </ul>
                        <div class="tab-content tabs-content" id="myTabContent">
                            <!-- Home Tab -->
                            <div style="background: transparent !important;" class="tab-pane tab  show active "
                                id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="">
                                    <div class="my-2">
                                        <h3 class="mb-10 c-desc-t-h-r " id="features">Home</h3>
                                        <div class="r-w-s university" id="university">
                                        </div>
                                        <div class="ajax-load text-center" style="display:none">
                                          <i class="fa fa-spinner"></i> Loading ...
                                        </div>
                                        <div class="no-data text-center mb-4" style="display:none">
                                            <b>No data - last page</b>
                                        </div>
                                    </div>
                                    <div id="university-pagination-links">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab " id="programs" role="tabpanel" aria-labelledby="programs-tab">
                                <div class="">
                                    <div class="my-2">
                                        <div class="r-w-s">
                                            <h3 class="mb-10 c-desc-t-h-r" id="features">Programs</h3>
                                            {{-- <form action="#" method="get" class="input-group col-md-12 frmpd">
                                                <input type="hidden" name="tab" value="programs">
                                                <input name="program_name" class="col-md-12 form-control py-2"
                                                    type="search" id="example-search-input" value=""
                                                    placeholder="Search Degree, Program or Courses">
                                                <span class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </form> --}}
                                            <br>
                                            <div class="col-lg-12 col-md-4 col-sm-4 mb-30 course_data">
                                            </div>
                                            <div class="ajax-load text-center" style="display:none">
                                                <i class="fa fa-spinner"></i> Loading ...
                                            </div>
                                            <div class="no-data text-center mb-4" style="display:none">
                                                <b>No data - last page</b>
                                            </div>
                                        </div>
                                        <div id="course-pagination-links">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
    </section>
    <script type="text/javascript">
        (function($) {
            $(".keyword").on('keyup', function(e) {
                var $this = $(this);
                var exp = new RegExp($this.val(), 'i');
                $(".addto-playlists li label").each(function() {
                    var $self = $(this);
                    if (!exp.test($self.text())) {
                        $self.parent().hide();
                    } else {
                        $self.parent().show();
                    }
                });
            });
        })(jQuery);
    </script>
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
            let lastPage;
            $(window).scroll(function() {
                let height = 1000;
                if ($(window).scrollTop() + $(window).height() >= height && bool == false && lastPage > pages - 2) {
                    bool = true;
                    $('.ajax-load').show();
                    lazyLoad(pages)
                        .then(() => {
                            bool = false;
                            pages++;
                            if (pages - 2 == lastPage) {
                                $('.no-data').show();
                            }
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
                            let course_data ='';
                            $.each(response.data.data, function(index, item) {
                                html += `
                                <div class="col-lg-12 col-md-4 col-sm-6 mt-30">
                                    <div class="courses-item course-logo">
                                        <div>
                                            <div class="course_card_logo_sec d-flex">
                                                <div class="img-part" style="margin: 2px 5px;">
                                                    <a href="course_details/${item.id}">
                                                        <img src="${window.location.origin}/${item ? item.logo : ''}" alt="university logo" class="img-thumbnail university_logo">
                                                    </a>
                                                </div>
                                                <div style="flex: 1 1 0%;">
                                                    <h5 class="mb-1">
                                                        <a href="course_details/${item.id}">${item.program && item.program.name ? item.program.name : ""}</a>
                                                    </h5>
                                                    <a href="${item.website}" style="font-weight: 500; font-size: 14px;">${item.university_name ? item.university_name : ""}</a>
                                                </div>
                                            </div>
                                            <div class="content-part">
                                                <ul class="meta-part">
                                                    <li class="user">
                                                        <i class="fa fa-graduation-cap"></i>
                                                        <span class="info_bold">Level</span>
                                                        <span>${item.program && item.program.program_level && item.program.program_level.name ? item.program.program_level.name : ""}</span>
                                                    </li>
                                                    <li class="user">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span class="info_bold">Duration</span>
                                                        <span>4 year</span>
                                                    </li>
                                                    <li class="user">
                                                        <i class="fa fa-money"></i>
                                                        <span class="info_bold">Application Fees</span>
                                                        <span>A$125.00</span>
                                                    </li>
                                                    <li class="user">
                                                        <i class="fa fa-money"></i>
                                                        <span class="info_bold">1st Year Tuition Fees</span>
                                                        <span>A$49,600.00</span>
                                                    </li>
                                                    <li class="user">
                                                        <i class="fa fa-info-circle"></i>
                                                        <span class="info_bold">Exams Required</span>
                                                        <span style="font-size: 12px;">No Exam Required</span>
                                                    </li>
                                                </ul>
                                                <hr class="mb-10 mt-10">
                                                <p class="mb-0" style="font-size: 13px;">fees may vary according to university current structure and policy</p>
                                                <hr class="mb-10 mt-10">
                                                <div class="bottom-part">
                                                    <div class="info-meta">
                                                        <ul>
                                                            <li class="user">
                                                                <i class="fa fa-flag"></i>
                                                                <span>${item.country ? item.country.name : ''}</span>
                                                                <span>-</span>
                                                                <span>Full Time</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            });
                            $.each(response.course_data.data, function(index, item) {
                                $('.course_data').append(`
                                    <div class="courses-item course-logo">
                                        <div>
                                            <div class="d-flex">
                                                <a href="${item.university ? item.university_name.website : ''}" class="university_logo">
                                                    <div class="u-logo">
                                                        <img src="${window.location.origin}/${item.university ? item.university_name.logo : ''}" alt="${item.university ? item.university_name.logo : ''}" class="img-fluid uc-logo">
                                                    </div>
                                                </a>
                                                <h5 class="university_name" style="margin-left: 10px; margin-bottom: 0px; margin-top: 5px;">
                                                    <a href="${item.university_name ? item.university_name.website : ''}">${item.university ? item.university_name.name : ''}</a>
                                                </h5>
                                            </div>
                                            <div class="content-part">
                                                <ul class="meta-part" style="flex: 1 1 0%;">
                                                    <li class="user meta_item">
                                                        <i class="fa fa-map"></i>
                                                        <span class="info_bold">Location: </span>
                                                        <span class="text_ellipsis">${item.university_name ? item.university_name.logo : ''} ${item.university_name ? item.university_name.zip : ''}</span>
                                                    </li>
                                                    <li class="user meta_item">
                                                        <i class="fa fa-flag"></i>
                                                        <span class="info_bold">Country: </span>
                                                        <span>${item.university_name ? item.university_name.country_name.name : '' }</span>
                                                    </li>
                                                    <li class="user meta_item">
                                                        <i class="fa fa-list"></i>
                                                        <span class="info_bold">University Type: </span>
                                                        <span>${item.university_name ? item.university_name.university_type_name.name : ''}</span>
                                                    </li>
                                                </ul>
                                                <hr class="mb-10 mt-10">
                                                <div class="bottom-part">
                                                    <div class="info-meta" style="flex: 1 1 0%;"></div>
                                                    <div class="btn-part">
                                                        <a href="${item.university_name ? item.university_name.website : ''}">View Details <i class="flaticon-right-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            });
                            console.log(response.data.total);
                            $('#university').append(html);
                            $('.course_data').append(course_data);
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
                        lastPage = response.data.last_page;
                        let html = '';
                        let course_data ='';
                        $.each(response.data.data, function(index, item) {
                            html += `
                                <div class="col-lg-12 col-md-4 col-sm-6 mt-30">
                                <div class="courses-item course-logo">
                                    <div>
                                        <div class="course_card_logo_sec d-flex">
                                            <div class="img-part" style="margin: 2px 5px;">
                                                <a href="course_details/${item.id}">
                                                    <img src="${window.location.origin}/${item ? item.logo : ''}" alt="university logo" class="img-thumbnail university_logo">
                                                </a>
                                            </div>
                                            <div style="flex: 1 1 0%;">
                                                <h5 class="mb-1">
                                                    <a href="course_details/${item.id}">${item.program && item.program.name ? item.program.name : ""}</a>
                                                </h5>
                                                <a href="${item.website}" style="font-weight: 500; font-size: 14px;">${item.university_name ? item.university_name : ""}</a>
                                            </div>
                                        </div>
                                        <div class="content-part">
                                            <ul class="meta-part">
                                                <li class="user">
                                                    <i class="fa fa-graduation-cap"></i>
                                                    <span class="info_bold">Level</span>
                                                    <span>${item.program && item.program.program_level && item.program.program_level.name ? item.program.program_level.name : ""}</span>
                                                </li>
                                                <li class="user">
                                                    <i class="fa fa-clock-o"></i>
                                                    <span class="info_bold">Duration</span>
                                                    <span>4 year</span>
                                                </li>
                                                <li class="user">
                                                    <i class="fa fa-money"></i>
                                                    <span class="info_bold">Application Fees</span>
                                                    <span>A$125.00</span>
                                                </li>
                                                <li class="user">
                                                    <i class="fa fa-money"></i>
                                                    <span class="info_bold">1st Year Tuition Fees</span>
                                                    <span>A$49,600.00</span>
                                                </li>
                                                <li class="user">
                                                    <i class="fa fa-info-circle"></i>
                                                    <span class="info_bold">Exams Required</span>
                                                    <span style="font-size: 12px;">No Exam Required</span>
                                                </li>
                                            </ul>
                                            <hr class="mb-10 mt-10">
                                            <p class="mb-0" style="font-size: 13px;">fees may vary according to university current structure and policy</p>
                                            <hr class="mb-10 mt-10">
                                            <div class="bottom-part">
                                                <div class="info-meta">
                                                    <ul>
                                                        <li class="user">
                                                            <i class="fa fa-flag"></i>
                                                            <span>${item.country ? item.country.name : ''}</span>
                                                            <span>-</span>
                                                            <span>Full Time</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        });
                        $.each(response.course_data.data, function(index, item) {
                            $('.course_data').append(`
                                <div class="courses-item course-logo">
                                    <div>
                                        <div class="d-flex">
                                            <a href="${item.university ? item.university_name.website : ''}" class="university_logo">
                                                <div class="u-logo">
                                                    <img src="${window.location.origin}/${item.university ? item.university_name.logo : ''}" alt="${item.university ? item.university_name.logo : ''}" class="img-fluid uc-logo">
                                                </div>
                                            </a>
                                            <h5 class="university_name" style="margin-left: 10px; margin-bottom: 0px; margin-top: 5px;">
                                                <a href="${item.university_name ? item.university_name.website : ''}">${item.university ? item.university_name.name : ''}</a>
                                            </h5>
                                        </div>
                                        <div class="content-part">
                                            <ul class="meta-part" style="flex: 1 1 0%;">
                                                <li class="user meta_item">
                                                    <i class="fa fa-map"></i>
                                                    <span class="info_bold">Location: </span>
                                                    <span class="text_ellipsis">${item.university_name ? item.university_name.logo : ''} ${item.university_name ? item.university_name.zip : ''}</span>
                                                </li>
                                                <li class="user meta_item">
                                                    <i class="fa fa-flag"></i>
                                                    <span class="info_bold">Country: </span>
                                                    <span>${item.university_name ? item.university_name.country_name.name : '' }</span>
                                                </li>
                                                <li class="user meta_item">
                                                    <i class="fa fa-list"></i>
                                                    <span class="info_bold">University Type: </span>
                                                    <span>${item.university_name ? item.university_name.university_type_name.name : ''}</span>
                                                </li>
                                            </ul>
                                            <hr class="mb-10 mt-10">
                                            <div class="bottom-part">
                                                <div class="info-meta" style="flex: 1 1 0%;"></div>
                                                <div class="btn-part">
                                                    <a href="${item.university_name ? item.university_name.website : ''}">View Details <i class="flaticon-right-arrow"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                        $('#university').append(html);
                        $('.course_count').html(response.course_data.total);
                        $('.university_count').html(response.data.total);
                        $('.course_data').append(course_data);
                    }
                });
            }
            window.fetchProgramSubLevel = function(id) {
                var checkboxes = document.getElementsByName('program_level[]');
                var selectedProgramLevelOptions = [];
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        selectedProgramLevelOptions.push(checkboxes[i].value);
                    }
                }
                csrf();
                $.ajax({
                    url: '{{ route('get-program-sublevel') }}',
                    type: 'POST',
                    data: {
                        'program_level_id': selectedProgramLevelOptions
                    },
                    success: function(data) {
                        $('.program-sub-level').empty();
                        if (data.length > 0) {
                            $.each(data, function(index, program_sub_level) {
                                var programSubLevel = <?php echo json_encode($program_sub_level_name); ?>;
                                var programSubLevelIds = programSubLevel.map(function(item) {
                                    return item.id;
                                });
                                var desiredId = program_sub_level.id;
                                var isChecked = programSubLevelIds.includes(desiredId);
                                var checkbox = `
                                            <li>
                                                <label for="random-${index}" class="playlist-name">
                                                    <input id="random-${index}" class="program-sub-level-check" ${isChecked ? 'checked' : ''} data-sublevel-id="${program_sub_level.id}" type="checkbox" value="${program_sub_level.id}" name="program_sub_level[]"> ${program_sub_level.name.toUpperCase()}
                                                </label>
                                            </li>
                                        `;
                                $('.program-sub-level').append(checkbox);
                            });
                        } else {
                            $('.program-sub-level').empty().append(
                                '<li class="nav-item tab-btns"><h4>Not Found</h4></li>');
                        }
                    }
                });
            }
            window.checkAndCall = function() {
                var checkboxes = document.getElementsByName('program_level[]');
                var id = [];
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        id.push(checkboxes[i].value);
                    }
                }
                fetchProgramSubLevel(id);
            }
            checkAndCall();

            $('#education_level').on('click', function() {
                var selectedOptions = [];
                $.each($("input[name='program_level[]']:checked"), function() {
                    selectedOptions.push($(this).val());
                });
                var programSubLevel = [];
                $.each($("input[name='program_sub_level[]']:checked"), function() {
                    programSubLevel.push($(this).val());
                });
                csrf();
                $.ajax({
                    url: '{{ route('get-education-level-filter') }}',
                    type: 'POST',
                    data: {
                        'program_level_id': selectedOptions,
                        'program_sublevel_id': programSubLevel
                    },
                    success: function(data) {
                        $('#education-level-list').empty();
                        if (data.length > 0) {
                            $.each(data, function(index, education_level) {
                                var educationLevel = <?php echo json_encode($education_level_name); ?>;
                                var educationLevelIds = educationLevel.map(function(
                                    education_level) {
                                    return education_level.id;
                                });
                                var desiredId = education_level.id;
                                var isChecked = educationLevelIds.includes(desiredId);
                                $('#education-level-list').append(`
                            <li>
                                <label for="${education_level.id}-education-level" class="playlist-name">
                                    <input id="${education_level.id}-education-level" ${isChecked ? 'checked' : ''} class="education_level_check" type="checkbox" name="education_level[]" value="${education_level.id}"> ${education_level.name.toUpperCase()} </label>
                            </li>
                        `);
                            });
                        } else {
                            $('#education-level-list').empty().append(
                                '<li><label for="random-1" class="playlist-name"> Not Found</label></li>'
                                );
                        }
                    }
                });
            });

            $('.subdiscipline').on('click', function() {
                program_discipline();
            })
            program_discipline();

            function program_discipline() {
                var selectedOptions = [];
                $.each($("input[name='program_discipline[]']:checked"), function() {
                    selectedOptions.push($(this).val());
                });
                csrf();
                $.ajax({
                    url: '{{ route('program-subdiscipline-data') }}',
                    type: 'POST',
                    data: {
                        'program_displine': selectedOptions,
                    },
                    success: function(data) {
                        $('.program_subdiscipline').empty();
                        if (data.length > 0) {
                            $.each(data, function(index, program_sub_discipline) {
                                var program_sub_discipline_name = <?php echo json_encode($program_sub_discipline_name); ?>;
                                var programDiscipline = program_sub_discipline_name.map(
                                    function(program_sub_discipline_name) {
                                        return program_sub_discipline_name.id;
                                    });
                                var desiredId = program_sub_discipline.id;
                                var isChecked = programDiscipline.includes(desiredId);
                                $('.program_subdiscipline').append(`
                            <li>
                                <label for="${program_sub_discipline.id}-discipline" class="playlist-name">
                                <input id="${program_sub_discipline.id}-discipline" class="program-sub-discipline-checkbox" type="checkbox" ${isChecked ? 'checked' : ''} name="program_sub_discipline[]" value="${program_sub_discipline.id}"> ${program_sub_discipline.name.toUpperCase()} </label>
                            </li>
                        `);
                            });
                        } else {
                            $('.program_subdiscipline').empty().append(
                                '<li><label for="random-1" class="playlist-name"> Not Found</label></li>'
                                );
                        }

                    }
                });
            }
            $('.other_exam').on('click', function() {
                other_exam();
            })
            other_exam();

            function other_exam() {
                var checkboxes = document.getElementsByName('program_level[]');
                var selectedProgramLevelOptions = [];
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        selectedProgramLevelOptions.push(checkboxes[i].value);
                    }
                }
                $.ajax({
                    url: "{{ route('fetch-other-exam-data') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        program_id: selectedProgramLevelOptions
                    },
                    success: function(response) {
                        $.each(response, function(index, value) {
                            var other_exam_name = <?php echo json_encode($other_exam_name); ?>;
                            var otherExam = other_exam_name.map(function(other_exam_name) {
                                return other_exam_name.id;
                            });
                            var desiredId = value.id;
                            var isChecked = otherExam.includes(desiredId);
                            var tab_element = `<li>
                                            <label for="${value.id}-other_exam" class="playlist-name">
                                                <input id="${value.id}-other_exam" ${isChecked ? 'checked' : ''} class="other_exam_check" type="checkbox" name="other_exam[]" value="${value.id}"> ${value.name.toUpperCase()} </label>
                                        </li>`;
                            $('.other_exam_show').append(tab_element);
                        });
                    }
                });
            }

            // function makeAjaxRequest(page = 1, selectedProgramLevelOptions, programSubLevel, education_level,
            //     program_discipline, programSubDiscipline, other_exam, country, intake, end_profiency_level,
            //     schlorship, tution_fees) {
            //     csrf();
            //     $.ajax({
            //                 url: '{{ route('get-university-course') }}',
            //                 method: 'POST',
            //                 data: {
            //                     program_level_id: selectedProgramLevelOptions,
            //                     program_sublevel_id: programSubLevel,
            //                     education_level: education_level,
            //                     program_discipline: program_discipline,
            //                     program_sub_discipline: programSubDiscipline,
            //                     other_exam: other_exam,
            //                     country: country,
            //                     intake: intake,
            //                     end_profiency_level: end_profiency_level,
            //                     schlorship: schlorship,
            //                     tution_fees: tution_fees,
            //                     page: page
            //                 },
            //                 success: function(response) {
            //                     $('.university').empty();
            //                     $.each(response.university, function(index, item) {
            //                         $('.university').append(`
            //           <h2>university Data ${item.id}</h2>
            //         `);
            //                     });
            //                     $('.course_data').empty();
            //                     $.each(response.course.data, function(index, item) {
            //                         $('.course_data').append(`
            //                             <div class="courses-item course-logo">
            //                                 <div>
            //                                     <div class="d-flex">
            //                                         <a href="${item.university ? item.university_name.website : ''}" class="university_logo">
            //                                             <div class="u-logo">
            //                                                 <img src="${window.location.origin}/${item.university ? item.university_name.logo : ''}" alt="${item.university ? item.university_name.logo : ''}" class="img-fluid uc-logo">
            //                                             </div>
            //                                         </a>
            //                                         <h5 class="university_name" style="margin-left: 10px; margin-bottom: 0px; margin-top: 5px;">
            //                                             <a href="${item.university_name ? item.university_name.website : ''}">${item.university ? item.university_name.name : ''}</a>
            //                                         </h5>
            //                                     </div>
            //                                     <div class="content-part">
            //                                         <ul class="meta-part" style="flex: 1 1 0%;">
            //                                             <li class="user meta_item">
            //                                                 <i class="fa fa-map"></i>
            //                                                 <span class="info_bold">Location: </span>
            //                                                 <span class="text_ellipsis">${item.university_name ? item.university_name.logo : ''} ${item.university_name ? item.university_name.zip : ''}</span>
            //                                             </li>
            //                                             <li class="user meta_item">
            //                                                 <i class="fa fa-flag"></i>
            //                                                 <span class="info_bold">Country: </span>
            //                                                 <span>${item.university_name ? item.university_name.country_name.name : '' }</span>
            //                                             </li>
            //                                             <li class="user meta_item">
            //                                                 <i class="fa fa-list"></i>
            //                                                 <span class="info_bold">University Type: </span>
            //                                                 <span>${item.university_name ? item.university_name.university_type_name.name : ''}</span>
            //                                             </li>
            //                                         </ul>
            //                                         <hr class="mb-10 mt-10">
            //                                         <div class="bottom-part">
            //                                             <div class="info-meta" style="flex: 1 1 0%;"></div>
            //                                             <div class="btn-part">
            //                                                 <a href="${item.university_name ? item.university_name.website : ''}">View Details <i class="flaticon-right-arrow"></i></a>
            //                                             </div>
            //                                         </div>
            //                                     </div>
            //                                 </div>
            //                             </div>
            //                         `);
            //                     });
            //                     var perPage = 100;
            //                     var totalPages = Math.ceil(response.total_university / perPage);
            //                     var paginationLinks = `
            //         <nav aria-label="Page navigation example">
            //             <ul class="pagination">
            //                 <li class="page-item ${response.current_page > 1 ? '' : 'disabled'}">
            //                     <a class="page-link pagination-custom" href="javascript:void(0);" onclick="makeAjaxRequest(${response.current_page - 1}, '${selectedProgramLevelOptions}', '${programSubLevel}', '${education_level}', '${program_discipline}', '${programSubDiscipline}', '${other_exam}', '${country}', '${intake}', '${end_profiency_level}', '${schlorship}', '${tution_fees}')">Previous</a>
            //                 </li>
            //                 ${Array.from({ length: totalPages }, (_, i) => {
            //                     return ` < li class = "page-item ${(i + 1) == response.current_page ? 'active' : ''}" >
            //                         <
            //                         a class = "page-link pagination-custom"
            //                     href = "javascript:void(0);"
            //                     data - page = "${i + 1}"
            //                     onclick =
            //                         "makeAjaxRequest(${i + 1}, '${selectedProgramLevelOptions}', '${programSubLevel}', '${education_level}', '${program_discipline}', '${programSubDiscipline}', '${other_exam}', '${country}', '${intake}', '${end_profiency_level}', '${schlorship}', '${tution_fees}')" >
            //                         $ {
            //                             i + 1
            //                         } < /a> <
            //                         /li>`;
            //             }).join('')
            //     } <
            //     li class = "page-item ${response.current_page < totalPages ? '' : 'disabled'}" >
            //     <
            //     a class = "page-link"
            //         href = "javascript:void(0);"
            //         onclick =
            //             "makeAjaxRequest(${response.current_page + 1}, '${selectedProgramLevelOptions}', '${programSubLevel}', '${education_level}', '${program_discipline}', '${programSubDiscipline}', '${other_exam}', '${country}', '${intake}', '${end_profiency_level}', '${schlorship}', '${tution_fees}')" >
            //             Next < /a> <
            //             /li> <
            //             /ul> <
            //             /nav>
            //         `;

            //         $('#university-pagination-links').html(paginationLinks);
            //         // $('#university-pagination-links').append(response.university.links);
            //     },
            //     error: function(xhr, status, error) {
            //         // Handle error here
            //     }
            // });
        // }



        function collectSelectedOptions(page = 1) {
            var selectedProgramLevelOptions = [];
            $.each($("input[name='program_level[]']:checked"), function(){
                selectedProgramLevelOptions.push($(this).val());
            });
            var programSubLevel1 = [];
            $.each($("input[name='program_sub_level[]']:checked"), function(){
                programSubLevel1.push($(this).val());
            });
            var education_level = [];
            $.each($("input[name='education_level[]']:checked"), function(){
                education_level.push($(this).val());
            });
            var program_discipline = [];
            $.each($("input[name='program_discipline[]']:checked"), function(){
                program_discipline.push($(this).val());
            });
            var programSubDiscipline = [];
            $.each($("input[name='program_sub_discipline[]']:checked"), function(){
                programSubDiscipline.push($(this).val());
            });
            var other_exam = [];
            $.each($("input[name='other_exam[]']:checked"), function(){
                other_exam.push($(this).val());
            });
            var country = [];

            $.each($("input[name='country[]']:checked"), function(){
                country.push($(this).val());
            });
            var intake = [];
            $.each($("input[name='intake[]']:checked"), function(){
                intake.push($(this).val());
            });
            var end_profiency_level = [];
            $.each($("input[name='end_profiency_level[]']:checked"), function(){
                end_profiency_level.push($(this).val());
            });
            var schlorship = [];
            $.each($("input[name='schlorship[]']:checked"), function(){
                schlorship.push($(this).val());
            });
            var tution_fees = [];
            $.each($("input[name='tution_fees[]']:checked"), function(){
                tution_fees.push($(this).val());
            });
            // makeAjaxRequest(page,selectedProgramLevelOptions, programSubLevel1,education_level,program_discipline, programSubDiscipline,other_exam,country,intake,end_profiency_level,schlorship,tution_fees);
        }
        $('.country-checkbox').on('click', function() {
            var itemName = $(this).closest('label').text().trim();
            var checkedCountries = $("input[name='country[]']:checked").map(function() {
                return this.value;
            }).get().join(',');
            var url = window.location.origin + window.location.pathname;
            if(window.location.search){
                var params = new URLSearchParams(window.location.search);
                params.delete('country');
                if (checkedCountries) {
                    params.append('country', checkedCountries);
                }
                url += '?' + params.toString();
            } else {
                if (checkedCountries) {
                    url += '?country=' + checkedCountries;
                }
            }
            window.history.pushState(null, '', url);
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            $('.country_name').empty();
            if (checkedCountries) {
                $('.country_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            }
        });
        $('.program_level_value').on('click', function() {
            var itemName = $(this).closest('label').text().trim();
            var program_level = $("input[name='program_level[]']:checked").map(function(){
                return this.value;
            }).get().join(',');
            var url = window.location.origin + window.location.pathname;
            if(window.location.search){
                var params = new URLSearchParams(window.location.search);
                params.delete('program_level');
                if (program_level) {
                    params.append('program_level', program_level);
                }
                url += '?' + params.toString();
            } else {
                if (program_level) {
                    url += '?program_level=' + program_level;
                }
            }
            window.history.pushState(null, '', url);
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            $('.program_level_name').empty();
            if (program_level) {
                $('.program_level_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            }
        });
        $(document).on('click', '.program-sub-level-check', function() {
            var itemName = $(this).closest('label').text().trim();
            var program_sub_level = $("input[name='program_sub_level[]']:checked").map(function(){
                return this.value;
            }).get().join(',');
            var url = window.location.origin + window.location.pathname;
            if(window.location.search){
                var params = new URLSearchParams(window.location.search);
                params.delete('program_sub_level');
                if (program_sub_level) {
                    params.append('program_sub_level', program_sub_level);
                }
                url += '?' + params.toString();
            } else {
                if (program_sub_level) {
                    url += '?program_sub_level=' + program_sub_level;
                }
            }
            window.history.pushState(null, '', url);
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            $('.program_sub_level_name').empty();
            if (program_sub_level) {
                $('.program_sub_level_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            }
        });
        $(document).on('click', '.education_level_check', function() {
            var itemName = $(this).closest('label').text().trim();
            var education_level = $("input[name='education_level[]']:checked").map(function(){
                return this.value;
            }).get();
            var url = window.location.origin + window.location.pathname;
            if(window.location.search){
                var params = new URLSearchParams(window.location.search);
                params.delete('education_level');
                if (education_level.length > 0) {
                    params.append('education_level', education_level.join(','));
                }
                url += '?' + params.toString();
            } else {
                if (education_level.length > 0) {
                    url += '?education_level=' + education_level.join(',');
                }
            }
            window.history.pushState(null, '', url);
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            $('.education-level-name').empty();
            if (education_level.length > 0) {
                education_level.forEach(function(level) {
                    $('.education-level-name').append(`<span class="badge badge-primary">${level}</span>`);
                });
            }
            if ($(this).is(':checked')) {
                $('.education-level-name').append(`<span class="badge badge-primary">${itemName}</span>`);
            } else {
                $('.education-level-name .badge:contains("' + itemName + '")').remove();
            }
        });
        $('.intake-name-data').on('click', function() {
            var itemName = $(this).closest('label').text().trim();
            var intake_name = $("input[name='intake[]']:checked").map(function(){
                return this.value;
            }).get().join(',');
            var url = window.location.origin + window.location.pathname;
            if(window.location.search){
                var params = new URLSearchParams(window.location.search);
                params.delete('intake');
                if (intake_name) {
                    params.append('intake', intake_name);
                }
                url += '?' + params.toString();
            } else {
                if (intake_name) {
                    url += '?intake=' + intake_name;
                }
            }
            window.history.pushState(null, '', url);
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            $('.intake_name').empty();
            if (intake_name) {
                $('.intake_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            }
            if ($(this).is(':checked')) {
                $('.intake_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            } else {
                $('.intake_name .badge:contains("' + itemName + '")').remove();
            }
        });
        $('.program_discipline_checkbox').on('click', function() {
            var itemName = $(this).closest('label').text().trim();
            var program_displine = $("input[name='program_discipline[]']:checked").map(function(){
                return this.value;
            }).get();
            var url = window.location.origin + window.location.pathname;
            if (window.location.search) {
                var params = new URLSearchParams(window.location.search);
                params.delete('program_discipline');
                if (program_displine.length > 0) {
                    params.append('program_discipline', program_displine.join(','));
                }
                url += '?' + params.toString();
            } else {
                if (program_displine.length > 0) {
                    url += '?program_discipline=' + program_displine.join(',');
                }
            }
            window.history.pushState(null, '', url);
            $('.program_discipline_name').empty();
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            if (program_displine.length > 0) {
                program_displine.forEach(function(discipline) {
                    $('.program_discipline_name').append(`<span class="badge badge-primary">${$(`input[name='program_discipline[]'][value='${discipline}']`).closest('label').text().trim()}</span>`);
                });
            }
            if ($(this).is(':checked')) {
                $('.program_discipline_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            } else {
                $('.program_discipline_name .badge:contains("' + itemName + '")').remove();
            }
        });
        $(document).on('click', '.program-sub-discipline-checkbox', function() {
            var itemName = $(this).closest('label').text().trim();
            var program_subdispline = $("input[name='program_sub_discipline[]']:checked").map(function(){
                return this.value;
            }).get();
            var url = window.location.origin + window.location.pathname;
            if (window.location.search) {
                var params = new URLSearchParams(window.location.search);
                params.delete('program_subdispline');
                if (program_subdispline.length > 0) {
                    params.append('program_subdispline', program_subdispline.join(','));
                }
                url += '?' + params.toString();
            } else {
                if (program_subdispline.length > 0) {
                    url += '?program_subdispline=' + program_subdispline.join(',');
                }
            }
            window.history.pushState(null, '', url);
            $('.program_sub_discipline_name').empty();
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            if (program_subdispline.length > 0) {
                program_subdispline.forEach(function(discipline) {
                    $('.program_sub_discipline_name').append(`<span class="badge badge-primary">${$(`input[name='program_sub_discipline[]'][value='${discipline}']`).closest('label').text().trim()}</span>`);
                });
            }
            if ($(this).is(':checked')) {
                $('.program_sub_discipline_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            } else {
                $('.program_sub_discipline_name .badge:contains("' + itemName + '")').remove();
            }
        });
        $(document).on('click', '.eng-pro', function() {
            var itemName = $(this).closest('label').text().trim();
            var eng_proficiency_level = $("input[name='end_profiency_level[]']:checked").map(function(){
                return this.value;
            }).get();
            var url = window.location.origin + window.location.pathname;
            if (window.location.search) {
                var params = new URLSearchParams(window.location.search);
                params.delete('eng_proficiency_level');
                if (eng_proficiency_level.length > 0) {
                    params.append('eng_proficiency_level', eng_proficiency_level.join(','));
                }
                url += '?' + params.toString();
            } else {
                if (eng_proficiency_level.length > 0) {
                    url += '?eng_proficiency_level=' + eng_proficiency_level.join(',');
                }
            }
            window.history.pushState(null, '', url);
            $('.eng_proficiency_level_name').empty();
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            if (eng_proficiency_level.length > 0) {
                eng_proficiency_level.forEach(function(level) {
                    $('.eng_proficiency_level_name').append(`<span class="badge badge-primary">${$(`input[name='end_profiency_level[]'][value='${level}']`).closest('label').text().trim()}</span>`);
                });
            }
            if ($(this).is(':checked')) {
                $('.eng_proficiency_level_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            } else {
                $('.eng_proficiency_level_name .badge:contains("' + itemName + '")').remove();
            }
        });
        $(document).on('click', '.other_exam_check', function() {
            var itemName = $(this).closest('label').text().trim();
            var other_exam = $("input[name='other_exam[]']:checked").map(function(){
                return this.value;
            }).get();
            var url = window.location.origin + window.location.pathname;
            if (window.location.search) {
                var params = new URLSearchParams(window.location.search);
                params.delete('other_exam');
                if (other_exam.length > 0) {
                    params.append('other_exam', other_exam.join(','));
                }
                url += '?' + params.toString();
            } else {
                if (other_exam.length > 0) {
                    url += '?other_exam=' + other_exam.join(',');
                }
            }
            window.history.pushState(null, '', url);
            $('#university').empty();
            $('.course_data').empty();
            loadData(1);
            if ($(this).is(':checked')) {
                $('.other_exam_name').append(`<span class="badge badge-primary">${itemName}</span>`);
            } else {
                $('.other_exam_name .badge:contains("' + itemName + '")').remove();
            }
        });

        // $("input[name='program_level[]'], input[name='program_sub_level[]'], input[name='education_level[]'],input[name='program_discipline[]'],input[name='program_sub_discipline[]'],input[name='other_exam[]'],input[name='country[]'],input[name='intake[]'],input[name='end_profiency_level[]'],input[name='schlorship[]'],input[name='tution_fees[]']").change(function() {
        //     collectSelectedOptions();
        // });
        // $(document).on('change',
        //     "input[name='program_level[]'], input[name='program_sub_level[]'], input[name='education_level[]'], input[name='program_discipline[]'], input[name='program_sub_discipline[]'], input[name='other_exam[]'], input[name='country[]'], input[name='intake[]'], input[name='end_profiency_level[]'], input[name='schlorship[]'], input[name='tution_fees[]']",
        //     function() {
        //         collectSelectedOptions();
        //     });

        // collectSelectedOptions();
        });
    </script>
@endsection
