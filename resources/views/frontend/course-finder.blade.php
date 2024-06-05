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
    </style>
@endsection
@section('content')
<br>
    <section>
      <div class="container">
        <div class="row">
          <h5>
            <h4 class="title">
              <img src="https://images.leverageedu.com/assets/img/course-finder/party.png" style="height: 30px" />
               {{$course->count()}} Courses in {{$university->count()}} universities found
            </h4>
          </h5>
        </div>
      </div>
    </section>
    <section class="intro-section gray-bg  pb-40 md-pt-64 md-pb-70 loaded">
        <div class="container">
          <div class="row clearfix position-relative">
            <!-- Video Column -->
            <div class="video-column col-lg-4 ">
              <div class="inner-column" style="position: sticky;top:100px">
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
                              <input class="keyword" type="text" placeholder="Search Country"><button class="search-button  srchbtn">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </form>
                        </div>
                        <div class="addto-playlists">
                          <ul>
                            <li>
                              <label for="random-1" class="playlist-name">
                                <input id="random-1" type="checkbox" name="" id=""> Hanoi </label>
                            </li>
                            <li>
                              <label for="random-2" class="playlist-name">
                                <input id="random-2" type="checkbox" name="" id=""> Danang </label>
                            </li>
                            <li>
                              <label for="random-2" class="playlist-name">
                                <input id="random-2" type="checkbox" name="" id=""> ankit </label>
                            </li>
                            <li>
                              <label for="random-2" class="playlist-name">
                              <input id="random-2" type="checkbox" name="" id=""> veerendr </label>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-header collapsed clp" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <a class="ct"> Area of Interest </a>
                      </div>
                      <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                        <div class="addto-search">
                          <form action="#">
                            <div class="form-input ">
                              <input class="keyword" type="text" placeholder="Search Country"><button class="search-button  srchbtn">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </form>
                        </div>
                        <div class="addto-playlists">
                          <ul>
                            <li>
                              <label for="random-1" class="playlist-name">
                                <input id="random-1" type="checkbox" name="" id=""> Hanoi </label>
                            </li>
                            <li>
                              <label for="random-2" class="playlist-name">
                                <input id="random-2" type="checkbox" name="" id=""> Danang </label>
                            </li>
                            <li>
                              <label for="random-2" class="playlist-name">
                                <input id="random-2" type="checkbox" name="" id=""> ankit </label>
                            </li>
                            <li>
                              <label for="random-2" class="playlist-name">
                                <input id="random-2" type="checkbox" name="" id=""> veerendr </label>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-header collapsed clp" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <a class="ct"> University Type </a>
                      </div>
                      <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <div class="addto-playlists">
                            <ul>
                              <li>
                                <label for="random-1" class="playlist-name">
                                  <input id="random-1" type="checkbox" name="" id=""> Hanoi </label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                       <div class="card-header collapsed clp" data-toggle="collapse" data-parent="#accordion" href="#collapseThree3">
                        <a class="ct"> Intake </a>
                      </div>
                      <div id="collapseThree3" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <div class="addto-playlists">
                            <ul>
                              <li>
                                <label for="random-1" class="playlist-name">
                                  <input id="random-1" type="checkbox" name="" id="">  Aug - Nov 2024</label>
                              </li>

                               <li>
                                <label for="random-1" class="playlist-name">
                                  <input id="random-1" type="checkbox" name="" id="">  Aug - Nov 2024</label>
                              </li>

                               <li>
                                <label for="random-1" class="playlist-name">
                                  <input id="random-1" type="checkbox" name="" id="">  Aug - Nov 2024</label>
                              </li>

                               <li>
                                <label for="random-1" class="playlist-name">
                                  <input id="random-1" type="checkbox" name="" id="">  Aug - Nov 2024</label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card-header collapsed clp" data-toggle="collapse" data-parent="#accordion" href="#collapseThree4">
                        <a class="ct">Scholarship  </a>
                      </div>
                      <div id="collapseThree4" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <div class="addto-playlists">
                            <ul>
                              <li>
                                  <label for="random-1" class="playlist-name">
                                  <input id="random-1" type="checkbox" name="" id=""> Scholarship Available </label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                        <div class="card-header collapsed clp" data-toggle="collapse" data-parent="#accordion" href="#collapseThree5">
                        <a class="ct"> Tuition Fees  Budget  </a>
                      </div>
                      <div id="collapseThree5" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <div class="addto-playlists">
                            <ul>
                              <li>
                                <label for="random-1" class="playlist-name">
                                <input id="random-1" type="checkbox" name="" id=""> Scholarship Available </label>
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
            <!-- Content Column -->
            <div class="col-lg-8 sm-mt-50 md-mb-50">
              <!-- Intro Info Tabs-->
              <div class="intro-info-tabs">
                <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                  <li class="nav-item tab-btns w-50 mynav">
                    <a class="nav-link tab-btn active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">
                      <i class="fa fa-university" aria-hidden="true"></i> Universities ({{$university->count()}}) </a>
                  </li>
                  <li class="nav-item tab-btns w-50 mynav">
                    <a class="nav-item tab-btn nav-link " id="programs-tab" data-toggle="tab" href="#programs" role="tab" aria-controls="programs" aria-selected="false">
                      <i class="fa fa-book" aria-hidden="true"></i> Courses ({{$course->count()}}) </a>
                  </li>
                </ul>
                <div class="tab-content tabs-content" id="myTabContent">
                  <!-- Home Tab -->
                  <div style="background: transparent !important;" class="tab-pane tab  show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="">
                      <div class="my-2">
                        <div class="r-w-s">
                          <h3 class="mb-10 c-desc-t-h-r" id="features">Home</h3>
                          @foreach ($university as $item)
                          <div class="col-lg-12 col-md-4 col-sm-6 mt-30">
                            <div class="courses-item course-logo">
                              <div>
                                <div class="course_card_logo_sec d-flex">
                                  <div class="img-part" style="  margin: 2px 5px;">
                                    <a href="course_details/13279">
                                      <img src="https://reactoel.skylabsapp.com/public/university_logos/university_logo_1685187983.png" alt="university logo" class="img-thumbnail university_logo">
                                    </a>
                                  </div>
                                  <div style="flex: 1 1 0%;">
                                    <h5 class="mb-1">
                                      <a href="course_details/13279"> Bachelor of Engineering (Honours) (Surveying)</a>
                                    </h5>
                                    <a href="university_details/288" style="font-weight: 500; font-size: 14px;"> University of New South Wales, Sydney</a>
                                  </div>
                                </div>
                                <div class="content-part">
                                  <ul class="meta-part">
                                    <li class="user">
                                      <i class="fa fa-graduation-cap"></i>
                                      <span class="info_bold">Level</span>
                                      <span>Undergraduate</span>
                                    </li>
                                    <li class="user">
                                      <i class="fa fa-clock-o"></i>
                                      <span class="info_bold">Duration</span>
                                      <span>4 year</span>
                                    </li>
                                    <li class="user">
                                      <i class="fa fa-money"></i>
                                      <span class="info_bold">Application Fees</span>
                                      <span> A$125.00</span>
                                    </li>
                                    <li class="user">
                                      <i class="fa fa-money"></i>
                                      <span class="info_bold">1st Year Tuition Fees</span>
                                      <!---->
                                      <span> A$49,600.00</span>
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
                                          <span>Australia</span>
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
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane tab " id="programs" role="tabpanel" aria-labelledby="programs-tab">
                    <div class="">
                      <div class="my-2">
                        <div class="r-w-s">
                          <h3 class="mb-10 c-desc-t-h-r" id="features">Programs</h3>
                          <form action="#" method="get" class="input-group col-md-12 frmpd">
                            <input type="hidden" name="tab" value="programs">
                            <input name="program_name" class="col-md-12 form-control py-2" type="search" id="example-search-input" value="" placeholder="Search Degree, Program or Courses">
                            <span class="input-group-append">
                              <button class="btn btn-outline-secondary" type="submit">
                                <i class="fa fa-search"></i>
                              </button>
                            </span>
                          </form>
                          <br>
                          <div class="col-lg-12 col-md-4 col-sm-4 mb-30">
                            <div class="courses-item course-logo">
                              <div>
                                <div class="d-flex">
                                  <a href="https://reactoel.skylabsapp.com/university_details/288" class="university_logo">
                                    <div class="u-logo">
                                      <img src="https://reactoel.skylabsapp.com/public/university_logos/university_logo_1685187983.png" class="img-fluid uc-logo">
                                    </div>
                                  </a>
                                  <h5 class="university_name" style="margin-left: 10px; margin-bottom: 0px; margin-top: 5px;">
                                    <a href="https://reactoel.skylabsapp.com/university_details/288">University of New South Wales, Sydney</a>
                                  </h5>
                                </div>
                                <div class="content-part">
                                  <ul class="meta-part" style="flex: 1 1 0%;">
                                    <li class="user meta_item">
                                      <i class="fa fa-map"></i>
                                      <span class="info_bold">Location: </span>
                                      <span class="text_ellipsis">Sydney NSW 2052, Australia</span>
                                    </li>
                                    <li class="user meta_item">
                                      <i class="fa fa-flag"></i>
                                      <span class="info_bold">Country: </span>
                                      <span>Australia</span>
                                    </li>
                                    <li class="user meta_item">
                                      <i class="fa fa-list"></i>
                                      <span class="info_bold">University Type: </span>
                                      <span>Public</span>
                                    </li>
                                  </ul>
                                  <hr class="mb-10 mt-10">
                                  <div class="bottom-part">
                                    <div class="info-meta" style="flex: 1 1 0%;"></div>
                                    <div class="btn-part">
                                      <a href="https://reactoel.skylabsapp.com/university_details/288">View Details <i class="flaticon-right-arrow"></i>
                                      </a>
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
                  <div class="tab-pane tab " id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    <div class="">
                      <div class="my-2">
                        <div class="r-w-s">
                          <h3 class="mb-10 c-desc-t-h-r" id="features">Gallery</h3>
                          <div class="galary_images row">
                            <img class="img-fluid galary_image_item" onclick="openModal(parseInt('0') + 1)" src="https://reactoel.skylabsapp.com/public/university_galary_images/galary_image_0_1685187983.jpg">
                          </div>
                        </div>
                        <div class="galary_videos"></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane tab " id="accomodation" role="tabpanel" aria-labelledby="accomodation-tab">
                    <div class="">
                      <div class="my-2">
                        <div class="r-w-s">
                          <h3 class="mb-10 c-desc-t-h-r" id="location">Accomodation</h3>
                          <h2>On-Campus Accommodation</h2>
                          <p>Living on campus can be a great experience.&nbsp;Apart from being close to class,&nbsp;college life is a great social experience, living with other students from all around the world you will get to make the most of your Australian experience and create&nbsp;lifelong&nbsp;friendships.</p>
                          <h2>Off-Campus Accommodation</h2>
                          <p>Finding accommodation off campus can be difficult as you often can’t be sure if what you have found is&nbsp;a reputable accommodation provider. To help you with this we have two websites we recommend for finding reasonably priced&nbsp;accommodation off-campus.&nbsp;&nbsp;</p>
                          <div class="mt-3">
                            <h3>Accomodation Website:</h3>
                            <a target="_blank" href="https://www.student.unsw.edu.au">https://www.student.unsw.edu.au</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane tab " id="placement" role="tabpanel" aria-labelledby="placement-tab">
                    <div class="">
                      <div class="my-2">
                        <div class="r-w-s">
                          <h3 class="mb-10 c-desc-t-h-r" id="location">Placement</h3>
                          <p>UNSW Science offers you the opportunity to gain professional work experience with a range of host organisations. Work placements help you develop your skills, build industry networks and improve your chances of landing the job you want when you graduate.</p>
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
@endsection
