@extends('frontend.layouts.main')
@section('content')
<style>
.college-banner img {
    position: relative;
    display: block;
    width: 100%;
    height: 60%;
}
</style>
<div class="rs-breadcrumbs breadcrumbs-overlay" style="height:300px">
	<div class="breadcrumbs-img college-banner">
                    <img src="{{asset($program_data->university_name->logo ?? null)}}">
    </div>
	<div class="breadcrumbs-text white-color">
		<h1 class="page-title">{{$program_data->name ?? null}}</h1>
		<h4 class="dn-about">
			<a class="university_title" href="{{$program_data->university_name->website ?? null}}">{{$program_data->university_name->university_name ?? null}}</a>
		</h4>
	</div>
</div>
<section class="intro-section gray-bg pt-94 pb-40 md-pt-64 md-pb-70 sm-pb-30 loaded">
    <div class="container">
       <div class="row clearfix">
          <div class="video-column col-lg-4">
             <div class="inner-column">
                <div class="course-features-info">
                   <h4>{{$program_data->name ?? null}}</h4>
                   <ul>
                      <li class="lectures-feature">
                         <i class="fa fa-flag"></i>
                         <span class="label">Country</span>
                         <span class="value">{{$program_data->university_name->country_name->name ?? null}}</span>
                      </li>
                      <li class="quizzes-feature">
                         <i class="flaticon-timer"></i>
                         <span class="label">Course Duration</span>
                         <span class="value">{{$program_data->length ?? null}}</span>
                      </li>
                      <li class="duration-feature">
                         <i class="fa fa-tag"></i>
                         <span class="label">Course Type</span>
                         <span class="value">{{$program_data->programType ?? null}}</span>
                      </li>
                      <li class="duration-feature">
                         <i class="fa fa-building"></i>
                         <span class="label">Courses Campus</span>
                         <span class="value">{{$program_data->programCampus ?? null}}</span>
                      </li>
                      <li class="duration-feature">
                         <i class="fa fa-language"></i>
                         <span class="label">Language Specification</span>
                         <span class="value">{{$exam_text->type ?? null}}</span>
                      </li>
                      <li class="duration-feature">
                         <i class="fa fa-graduation-cap"></i>
                         <span class="label">Program Level</span>
                         <span class="value">{{$program_data->programLevel->name ?? null}}</span>
                      </li>
                      <li class="duration-feature">
                         <i class="fa fa-graduation-cap"></i>
                         <span class="label">Education Required</span>
                         <span class="text-wrap">-{{$program_data->educationLevelprogram->name ?? null}}</span>
                      </li>
                      <li class="duration-feature">
                         <i class="fa fa-calendar"></i>
                         <span class="label">Admission intake</span>
                         <span class="value">{{date('F', mktime(0, 0, 0, $program_data->intake ?? null, 10))}}</span>
                      </li>
                      <li class="duration-feature">
                         <i class="fa fa-trophy"></i>
                         <span class="label">Minimum GPA</span>
                         <span class="value">{{$program_data->min_gpa ?? null}}</span>
                      </li>
                   </ul>
                </div>

                <div class="btn-part mb-20">
                        @if(Auth::check())
                            @php
                                $user=Auth::user();
                                $student_id=App\Models\Student::where('user_id',$user->id)->select('id')->first();
                                $student_program_applied = App\Models\PaymentsLink::with('program:name,id,school_id')->where('payment_type_remarks','applied_program')->where('user_id', $student_id->id)->get();
                                $university_id = $student_program_applied->pluck('program.school_id')->toArray();
                            @endphp
                            @if(in_array($program_data->school_id,$university_id))
                                 <button class="btn btn-primary">You Can Select One University One Program</button>
                            @else
                                @if($user->hasRole('student'))
                                    <a href="{{ route('apply-program-payment', ['student_id' => $student_id->id, 'program_id' => $program_data->id]) }}" class="btn btn-primary">Apply</a>
                                @endif
                            @endif
                        @else
                            <a href="{{route('user-login')}}"  class="btn btn-primary ">Login</a>
                        @endif
                </div>
             </div>
          </div>
          <!-- Content Column -->
          <div class="col-lg-8 sm-mt-50">
             <!-- Intro Info Tabs-->
             <div class="intro-info-tabs">
                <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                   <li class="nav-item tab-btns">
                      <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab" href="#prod-overview"
                         role="tab" aria-controls="prod-overview" aria-selected="false">Home</a>
                   </li>
                   <li class="nav-item tab-btns">
                      <a class="nav-item tab-btn nav-link" id="description-tab" data-toggle="tab"
                         href="#description" role="tab" aria-controls="description"
                         aria-selected="false">Description</a>
                   </li>
                   <li class="nav-item tab-btns">
                      <a class="nav-item tab-btn nav-link " id="extranotes-tab" data-toggle="tab"
                         href="#extranotes" role="tab" aria-controls="extranotes" aria-selected="true">Extra
                      Notes</a>
                   </li>
                </ul>
                <div class="tab-content tabs-content" id="myTabContent">
                   <!-- Home Tab -->
                   <div class="tab-pane tab active" id="prod-overview" role="tabpanel"
                      aria-labelledby="prod-overview-tab">
                      <div class="content white-bg pt-30">
                         <!-- Application Charges -->
                         <div class="course-overview">
                            <div class="inner-box">
                               <h4>Application Charges</h4>
                               <div class="table-responsive">
                                  <table class="table table-bordered">
                                     <thead>
                                        <tr>
                                           <th scope="col">Application Fee</th>
                                           <th scope="col">Tution Fee</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        <tr>
                                           <td>
                                              @if (empty($program_data->application_fee))
                                                {{'Free'}}
                                              @else
                                                  {{$program_data->application_fee ?? null}}
                                              @endif
                                           </td>
                                           <td>
                                              {{$program_data->currency ?? null}}
                                              {{$program_data->tution_fee ?? null}}
                                           </td>
                                        </tr>
                                     </tbody>
                                  </table>
                               </div>
                            </div>
                            <!-- Application Date -->
                            <div class="inner-box">
                               <h4>Application Date</h4>
                               <div class="table-responsive">
                                  <table class="table table-bordered">
                                     <thead>
                                        <tr>
                                           <th scope="col">Application Start Date</th>
                                           <th scope="col">Application Closing Date</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        <tr>
                                           <td>
                                              <div class="details_item_value"><i class="fa fa-calendar"
                                                 style="margin-right: 10px;"></i>{{$program_data->application_apply_date ?? null}}</div>
                                           </td>
                                           <td>
                                              <div>{{$program_data->application_closing_date ?? null}}    </div>
                                           </td>
                                        </tr>
                                     </tbody>
                                  </table>
                               </div>
                            </div>
                            <div class="inner-box">
                               <h4>Exam Test Required</h4>
                               <div class="exam_heading">{{$exam_text->type ?? null}}</div>
                               <div class="table-responsive">
                                  <table class="table table-bordered">
                                     <thead>
                                        <tr>
                                           <th scope="col">Speaking Score</th>
                                           <th scope="col">Listening Score</th>
                                           <th scope="col">Writing Score</th>
                                           <th scope="col">Reading Score</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        <tr>
                                           <td>{{$exam_text->speaking_score ?? null}}</td>
                                           <td>{{$exam_text->listening_score ?? null}}</td>
                                           <td>{{$exam_text->writing_score ?? null}}</td>
                                           <td>{{$exam_text->reading_score ?? null}}</td>
                                        </tr>
                                     </tbody>
                                  </table>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <!-- Description Tab -->
                   <div class="tab-pane tab" id="description" role="tabpanel"
                      aria-labelledby="description-tab">
                      <div class="content white-bg pt-30">
                         <div class="course-overview">
                            <div class="inner-box">
                                {!! $program_data->description !!}
                            </div>
                         </div>
                      </div>
                   </div>
                   <!-- Requirements Tab -->
                   <!-- Extra Note Tab -->
                   <div class="tab-pane tab " id="extranotes" role="tabpanel"
                      aria-labelledby="extranotes-tab">
                      <div class="content white-bg pt-30">
                         <div class="course-overview">
                            <div class="inner-box">
                               <h4>Extra Notes</h4>
                               <div><br></div>
                               <div>{!! $program_data->extra_notes !!}
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!-- Related Programs -->
             <div id="related_programs_list" class="related_programs"></div>
          </div>
       </div>
       <div>
       </div>
    </div>
 </section>
@endsection