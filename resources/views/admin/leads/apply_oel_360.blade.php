@extends('admin.include.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <style>
    .octicon.octicon-light-bulb {
        position: absolute;
        left: 31px;
        top: 43px;
        font-size: 12px;
        width: 99%;
        text-align: center;
    }
    .dropdown-menu{
        min-width: 900px !important;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{$studentDetails->first_name}}</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title=" Universities ">
                                <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1"
                                    aria-selected="true"> 1 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Universities </span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Courses">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2"
                                    aria-selected="false"> 2 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Courses</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Application Status">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3"
                                    aria-selected="false"> 3 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Application Status</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Offer Detail">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4"
                                    aria-selected="false"> 4 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Offer Detail</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Visa Application">
                                  <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab" aria-controls="step5"
                                    aria-selected="false"> 5
                                  </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Visa Application</span>
                            </li>
                            <li class="nav-item flex-fill"role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Visa Status">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step6" id="step6-tab" data-bs-toggle="tab" role="tab" aria-controls="step6"
                                    aria-selected="false"> 6
                                </a>
                                <br>
                                <span class="octicon octicon-light-bulb"> Visa Status</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step7" id="step7-tab" data-bs-toggle="tab" role="tab" aria-controls="step7"
                                    aria-selected="false"> 7 </a>
                                <br>
                                <span class="octicon octicon-light-bulb"> Fees Details</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step8" id="step8-tab" data-bs-toggle="tab" role="tab" aria-controls="step8"
                                    aria-selected="false"> 8
                                </a>
                                <br>
                                <span class="octicon octicon-light-bulb"> Flight Details</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step9" id="step9-tab" data-bs-toggle="tab" role="tab" aria-controls="step9"
                                    aria-selected="false"> 9
                                </a>
                                <br>
                                <span class="octicon octicon-light-bulb"> Take Off </span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step10" id="step10-tab" data-bs-toggle="tab" role="tab" aria-controls="step10"
                                    aria-selected="false"> 10 </a>
                                <br>
                                <span class="octicon octicon-light-bulb"> Boarding</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step11" id="step11-tab" data-bs-toggle="tab" role="tab" aria-controls="step11"
                                    aria-selected="false"> 11 </a>
                                <br>
                                <span class="octicon octicon-light-bulb"> Done</span>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                                <form class="row g-4"  id ="tab1DataForm">
                                    <h4>Selected University</h4>
                                    @if(!empty($university_in_three_sixtee))
                                    <div class="row">
                                        @foreach ($university_in_three_sixtee as $item)
                                            <div class="col-md-4">
                                                <input class="form-check-input college-checkbox" name="college" type="checkbox" checked value="{{$item->id}}" id="college{{$loop->iteration}}">
                                                <label class="form-check-label" for="college{{$loop->iteration}}">{{$item->university_name}}</label>
                                            </div>
                                        @endforeach
                                        </div>
                                        @endif
                                        <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                        <br>
                                        <h4>Select University</h4>
                                        <div class="alert-college"> </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="selectedValues"></div>
                                                <select id="universitySelect" class="selectpicker college-checkbox" name="college" multiple data-live-search="true">
                                                    @foreach($university as $item)
                                                        <option class="un" value="{{ $item->id }}">{{ $item->university_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    <br>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary next  @cannot('universities.create') disabled @endcan" id="tab1datasubmit">
                                            <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                            Next
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade " role="tabpanel" id="step2" aria-labelledby="step2-tab">
                                <div class="mb-4">
                                    <h5> Select your Cource Details</h5>
                                </div>
                                <div class="alert-course"> </div>
                                <h4>Selected Course Details</h4>
                                <form id ="tab2DataForm">
                                    <div class="row">
                                        @if(!empty($course_in_three_sixtee))
                                            @foreach ($course_in_three_sixtee as $item)
                                                <div class="col-md-4">
                                                    <input class="form-check-input course-checkbox" name="course" type="checkbox" value="{{$item->id}}" checked id="course{{$loop->iteration}}">
                                                    <label class="form-check-label" for="course{{$loop->iteration}}">{{$item->subject_name}}</label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                    <h4>Select Course</h4>
                                    <div class="row mb-2">
                                        <div id="courseValues"></div>
                                        <select id="courseSelect" class="selectpicker course-checkbox" name="course" multiple data-live-search="true">
                                            @foreach($course as $item)
                                                <option class="un" value="{{ $item->id }}">{{Str::ucfirst($item->subject_name) }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @foreach ($course as $item)
                                            <div class="col-md-4">
                                                <input class="form-check-input course-checkbox" name="course" type="checkbox" value="{{$item->id}}" id="course{{$loop->iteration}}">
                                                <label class="form-check-label" for="course{{$loop->iteration}}">{{$item->tag_name}}</label>
                                            </div>
                                        @endforeach --}}
                                        </div>
                                </form>

                                <div class="d-flex">
                                    <a class="btn btn btn-warning previous me-2 @cannot('courses.create') disabled @endcan"> Back</a>
                                    <a class="btn btn btn-primary next @cannot('courses.create') disabled @endcan">Continue
                                        <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span></a>
                                </div>

                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5>Application Status </h5>
                                </div>
                                <form id ="tab3DataForm">
                                    <div class="row">
                                        <div class="col-lg-4">
                                                <label  class="form-label">Accepted
                                                    </label>
                                                    <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                                <input type="radio" name="application_status" {{ isset($threesixtee) && $threesixtee->application == 'accepted' ? 'checked' : '' }} value="accepted" id="accepted">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-block mb-3">
                                                <label  class="form-label">Rejected</label>
                                                <input type="radio" name="application_status" value="rejected" {{ isset($threesixtee) && $threesixtee->application == 'rejected' ? 'checked' : '' }} id="rejected">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-expiration-input"  class="form-label">InProgress</label>
                                                <input type="radio" name="application_status" value="inprogress" {{ isset($threesixtee) && $threesixtee->application == 'inprogress' ? 'checked' : '' }} id="inprogress">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row "  id ="tab3remarks" style="display: none" >
                                        <div class="input-block mb-3">
                                            <label for="basicpill-expiration-input" class="form-label">Remarks</label>
                                            <input type="text" maxlength ="150"  class="form-control" name="remarks" id="remarksdata"   value="{{ $threesixtee->remarks ?? '' }}" >
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 @cannot('application_status.create') disabled @endcan">Previous</a>
                                    <a class="btn btn-primary next  @cannot('application_status.create') disabled @endcan" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span> continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                                <div class="mb-4">
                                    <h5>Offer Details</h5>
                                </div>
                                <div class="alert-image-error"> </div>
                                <form  id ="tab4DataForm">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-namecard-input" class="form-label">Date of Joining
                                                </label>
                                                <input type="date" class="form-control" name="joining_date" id="joining_date" value="{{ isset($threesixtee->joining_date) ? $threesixtee->joining_date : date('Y-m-d') }}">
                                                <input type="hidden" class="form-control" name="tab" id="tab4" value="tab4">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-namecard-input" class="form-label">Fee Amount
                                                </label>
                                                <input type="number" class="form-control" name="fee_amount" id="fee_amount"  value="{{ $threesixtee->offer_amount ?? ''}}" max="50">
                                                <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-cardno-input" class="form-label">Course Details</label>
                                                <input type="text" maxlength ="150"  class="form-control" id="course_details" value="{{ $threesixtee->cource_details ?? '' }}" name="course_details">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-cardno-input" class="form-label">Document</label>
                                                <input type="file" class="form-control" id="document" multiple  name="document">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <a class="btn btn-warning previous me-2 @cannot('offer_details.create') disabled @endcan">Previous</a>
                                            <a class="btn btn-success upload-image me-2 @cannot('offer_details.create') disabled @endcan">
                                                <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Uplaod image</a>
                                            <a class="btn btn-primary next @cannot('offer_details.create') disabled @endcan" data-bs-toggle="modal"
                                                data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            @if(!empty($table_three_sixtee_image))
                                                @foreach ($table_three_sixtee_image as $item)
                                                <div class="col-4" >
                                                    <img src="{{ asset($item->image) }}" style="height: 100px;width:100%" alt="">
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step5" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> Visa Application Details</h5>
                                </div>
                                <form id ="tab5DataForm">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Document Type</label>
                                                <select class="form-select" name="visa_document" id="visa_document">
                                                    <option >Document Type</option>
                                                    <option value="direct" {{ isset($threesixtee) && $threesixtee->visa_document == 'direct' ? 'selected' : '' }}>Direct</option>
                                                    <option value="agent" {{ isset($threesixtee) && $threesixtee->visa_document == 'agent' ? 'selected' : '' }}>Agent</option>
                                                    <option value="manual" {{ isset($threesixtee) && $threesixtee->visa_document == 'manual' ? 'selected' : '' }}>Manual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4" style="display:none" id="agent">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Agent</label>
                                                <select class="form-select" name="visa_agent" id="visa_agent">
                                                    <option value="">Agent</option>
                                                    @foreach ($agent as  $item)
                                                        <option value="{{$item->id}}" {{ isset($threesixtee) && $threesixtee->visa_agent == $item->id ? 'selected' : '' }}>{{$item->legal_first_name.' '. $item->legal_last_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4" style="display:none" id="manual">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Agent Name</label>
                                                <input type="text" maxlength ="150" id="visa_manual"  name="visa_manual" class="visa_manual form-control" placeholder="agent name" value="{{ $threesixtee->visa_manual ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Date of Apply</label>
                                                    <input type="date" name="visa_apply_date" required class="form-control" value="{{ isset($threesixtee->visa_apply_date) ? $threesixtee->visa_apply_date : date('Y-m-d') }}" id="visa_apply_date">
                                                    <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                            </div>
                                        </div>
                                    </div>
                                    <a  class="btn btn-primary w-100 my-2">Country Portal Login Details</a>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="input-block mb-3">
                                                <label for="portal_url" class="form-label">Portal Url</label>
                                                <input type="url" maxlength ="255"  class="form-control" name="portal_url" value="{{ $threesixtee->portal_url ?? ''}}" id="portal_url">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-block mb-3">
                                                <label for="portal_email" class="form-label">Portal Email</label>
                                                <input type="email" class="form-control" value="{{ $threesixtee->portal_email ?? ''}}" id="portal_email">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-block mb-3">
                                                <label for="portal_email" class="form-label">Portal User Id</label>
                                                <input type="text" maxlength ="150"  class="form-control"  value="{{ $threesixtee->portal_userid ?? ''}}" id="portal_userid"name="portal_userid">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-block mb-3">
                                                <label for="portal_email" class="form-label">Portal Password</label>
                                                <input type="password" class="form-control" id="portal_password"  value="{{ $threesixtee->portal_password ?? ''}}"  name="portal_password">
                                            </div>
                                        </div>
                                    </div>
                                    <a  class="btn btn-primary w-100 my-2">Country Portal Faq</a>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-expiration-input" class="form-label">
                                                    Question</label>
                                                <input type="text" maxlength ="150"  class="form-control" value="{{ $threesixtee->portal_question ?? ''}}" id="portal_question" name="portal_question"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-expiration-input" class="form-label">
                                                    Answer</label>
                                                <input type="text" maxlength ="150"  value="{{ $threesixtee->portal_answer ?? ''}}" class="form-control" name="portal_answer" id="portal_answer">
                                            </div>
                                        </div>
                                    </div>
                                    <a  class="btn btn-primary w-100 my-2">Visa Document</a>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Document Type</label>
                                                <select class="form-select" name="visa_document_type" id="visa_document_type">
                                                    <option value="">--Select--</option>
                                                    <option value="Passport" {{ isset($threesixtee) && $threesixtee->visa_document_type == 'Passport' ? 'selected' : '' }}>Passport</option>
                                                    <option value="SOP" {{ isset($threesixtee) && $threesixtee->visa_document_type == 'SOP' ? 'selected' : '' }}>SOP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-expiration-input" class="form-label">
                                                    Document</label>
                                                <input type="file" multiple class="form-control" name="lead-document" id="lead-document">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 @cannot('visa_application.create') disabled @endcan">Previous</a>
                                    <a class="btn btn-primary next @cannot('visa_application.create') disabled @endcan" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step6" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5>Visa status</h5>
                                </div>
                                <form id ="tab6DataForm">
                                    <div class="row">
                                        <div class="col-lg-4">
                                                <label  class="form-label">Accepted
                                                    </label>
                                                    <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                                <input type="radio" name="visa_application" {{ isset($threesixtee) && $threesixtee->visa_application == 'Accepted' ? 'checked' : '' }} value="Accepted" id="Accepted">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-block mb-3">
                                                <label  class="form-label">Rejected</label>
                                                <input type="radio" name="visa_application" {{ isset($threesixtee) && $threesixtee->visa_application == 'Rejected' ? 'checked' : '' }} value="Rejected" id="Rejected">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-expiration-input"  class="form-label">InProgress</label>
                                                <input type="radio" name="visa_application" {{ isset($threesixtee) && $threesixtee->visa_application == 'Inprogress' ? 'checked' : '' }} value="Inprogress"  id="Inprogress">
                                                <input type="hidden" class="form-control" name="tab" id="tab6" value="tab6">
                                                <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row remarks" style="display: none" >
                                        <div class="input-block mb-3">
                                            <label for="basicpill-expiration-input" class="form-label">Remarks</label>
                                            <input type="text" maxlength ="150"  class="form-control"  value="{{ $threesixtee->remarks ?? ''}}" name="remarks" id="remarks"  >
                                        </div>
                                    </div>
                                    <div class="row visa-data"  style="display: none">
                                        <div class="col-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-expiration-input" class="form-label">Visa No</label>
                                                <input type="text" maxlength ="150"  class="form-control" value="{{ $threesixtee->visa_no ?? ''}}" name="visa_no" id="visa_no"   >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-expiration-input" class="form-label">Visa Expire Date</label>
                                                <input type="date"   class="form-control" name="visa_exp_date" value="{{ $threesixtee->visa_exp_date ?? ''}}" id="visa_exp_date"   >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 @cannot('visa_status.create') disabled @endcan">Previous</a>
                                    <a class="btn btn-primary next  @cannot('visa_status.create') disabled @endcan" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span> Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step7" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> Payment Details</h5>
                                </div>
                                <form id ="tab7DataForm">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <input type="hidden" class="form-control" name="tab" id="tab7" value="tab7">
                                                <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                                <label for="basicpill-namecard-input" class="form-label" >Payment Mode</label>
                                                <input type="text" maxlength ="150"  value="{{ $threesixtee->fee_payment_mode ?? ''}}" placeholder="payment mode" name ="fee_payment_mode" id="fee_payment_mode"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-namecard-input" class="form-label" >Fee Amount</label>
                                                <input type="text" maxlength ="150"  value="{{ $threesixtee->fee_amount ?? ''}}"  placeholder="fee amount" name ="fee_amount" id="fee_amount"  class="form-control" >
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Transferred By</label>
                                                <select class="form-select" id="fee_payment_by" name="fee_payment_by">
                                                    <option value="">-Select -</option>
                                                    <option value="agent" {{ isset($threesixtee) && $threesixtee->fee_payment_by == 'agent' ? 'selected' : '' }}>Agent</option>
                                                    <option value="direct" {{ isset($threesixtee) && $threesixtee->fee_payment_by == 'direct' ? 'selected' : '' }}>Direct</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none" id="feeagent">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Agent</label>
                                                <select class="form-select" id="fee_agent" name="fee_agent">
                                                        <option value="">--Select--</option>
                                                        <option value="1" {{ isset($threesixtee) && $threesixtee->fee_agent == '1' ? 'selected' : '' }}>IDFC</option>
                                                        <option value="2" {{ isset($threesixtee) && $threesixtee->fee_agent == '2' ? 'selected' : '' }}>HSBC</option>
                                                        <option value="3" {{ isset($threesixtee) && $threesixtee->fee_agent == '3' ? 'selected' : '' }}>ICICI</option>
                                                        <option value="4" {{ isset($threesixtee) && $threesixtee->fee_agent == '4' ? 'selected' : '' }}>HDFC</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-namecard-input" class="form-label" >Remarks</label>
                                                <input type="text"  name ="fee_remarks" id="fee_remarks" placeholder="remarks" value="{{ $threesixtee->fee_remarks ?? ''}}"  class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 @cannot('fee_details.create') disabled @endcan">Previous</a>
                                    <a class="btn btn-primary next @cannot('fee_details.create') disabled @endcan" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step8" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> Flight Details</h5>
                                </div>
                                <form id ="tab8DataForm">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <input type="hidden" class="form-control" name="tab" id="tab8" value="tab8">
                                                <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                                <label for="basicpill-namecard-input" class="form-label">Flight Name</label>
                                                <input type="text" maxlength ="250"  name="flight_name" value="{{ $threesixtee->flight_name ?? ''}}" id="flight_name" class="form-control" >

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-namecard-input" class="form-label">Flight Number</label>
                                                <input type="number" maxlength ="150"  name="flight_no" id="flight_no" value="{{ $threesixtee->flight_no ?? ''}}" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label for="basicpill-namecard-input" class="form-label">Date and Time of Departure</label>
                                                <input type="date"  name="flight_dep_date" id="flight_dep_date" value="{{ $threesixtee->flight_dep_date ?? ''}}" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 @cannot('flight_details.create') disabled @endcan">Previous</a>
                                    <a class="btn btn-primary next @cannot('flight_details.create') disabled @endcan" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step9" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> Take Off</h5>
                                </div>
                                <form id ="tab9DataForm">
                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Hand Holding</label>
                                                <select class="form-select"  name="hand_holding" id="hand_holding">
                                                    <option value=""> --Select-- </option>
                                                    <option value="yes" {{ isset($threesixtee) && $threesixtee->hand_holding == 'yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="no" {{ isset($threesixtee) && $threesixtee->hand_holding == 'no' ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <input type="hidden" class="form-control" name="tab" id="tab9" value="tab9">
                                                <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                                <label for="basicpill-namecard-input" class="form-label">Agent Name</label>
                                                <input type="text" maxlength ="150" name="agent_name" value="{{ $threesixtee->agent_name ?? ''}}" id="agent_name" placeholder="agent name"  class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous  @cannot('take_off.create') disabled @endcan me-2">Previous</a>
                                    <a class="btn btn-primary next @cannot('take_off.create') disabled @endcan" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step10" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> Borading</h5>
                                </div>
                                <form id="tab10DataForm">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <label class="form-label">Hostel</label>
                                                <select class="form-select"  name="hostel" id="hostel">
                                                    <option value="Personal" {{ isset($threesixtee) && $threesixtee->hostel == 'Personal' ? 'selected' : '' }}>Personal</option>
                                                    <option value="Address" {{ isset($threesixtee) && $threesixtee->hostel == 'Address' ? 'selected' : '' }}>Address</option>
                                                    <option value="Contact Number" {{ isset($threesixtee) && $threesixtee->hostel == 'Contact Number' ? 'selected' : '' }}>Contact Number</option>
                                                    <option value="Email Id" {{ isset($threesixtee) && $threesixtee->hostel == 'Email Id' ? 'selected' : '' }}>Email Id</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-block mb-3">
                                                <input type="hidden" class="form-control" name="tab" id="tab10" value="tab10">
                                                <input type="hidden" name="sba_id" class="sba_id" value="{{$leadDetails->id}}">
                                                <label for="basicpill-expiration-input" class="form-label">
                                                    Contact Number</label>
                                                <input type="text"  class="form-control" value="{{ $threesixtee->personal ?? ''}}" maxlength="200" name="personal" id="personal">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2  @cannot('boarding.create') disabled @endcan">Previous</a>
                                    <a class="btn btn-primary next @cannot('boarding.create') disabled @endcan" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step11" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> 5Payment Details</h5>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Done!</strong> Success! 🎉
                                                You have Successfully Update the Student 360.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2  @cannot('done.show') disabled @endcan">Previous</a>
                                    <a class="btn btn-primary" href="{{route('oel_360')}}"
                                       >Back To 360</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
    $(document).ready(function(){
            function handleNext() {
                const activeTab = $('.tab-pane.active');
                const nextTab = activeTab.next('.tab-pane');
                if (nextTab.length) {
                    activeTab.removeClass('active');
                    activeTab.removeClass('show');
                    nextTab.addClass('active show');
                    const nextTabLink = nextTab.attr('id') + '-tab';
                    $('#' + nextTabLink).tab('show');
                }
            }
            function handlePrevious() {
                const activeTab = $('.tab-pane.active');
                const previousTab = activeTab.prev('.tab-pane');
                if (previousTab.length) {
                    activeTab.removeClass('active');
                    activeTab.removeClass('show');
                    previousTab.addClass('active show');
                    const previousTabLink = previousTab.attr('id') + '-tab';
                    $('#' + previousTabLink).tab('show');
                }
            }
            // $('.next').on('click', handleNext);
            $('.previous').on('click', handlePrevious);
            $('.next').on('click', function() {
                // $('.next').addClass('disabled');
                var spinner = this.querySelector('.spinner-grow');
                spinner.classList.remove('d-none');
                event.preventDefault();
                var sba_id = $('.sba_id').val();
                var activeTab = document.querySelector('.tab-pane.fade.show.active');
                var activeFormId = activeTab.querySelector('form').id;
                if('tab1DataForm' == activeFormId){
                    var tab1 = 'tab1';
                    var collegeValues = [];
                    $('.college-checkbox').each(function() {
                        if ($(this).is(':checked')) {
                            collegeValues.push($(this).val());
                        }
                    });
                    var formData ={sba_id:sba_id,collegeValues:collegeValues,tab1:tab1};
                }else if('tab2DataForm' == activeFormId){
                    var tab2 = 'tab2';
                    var courseValues = [];
                    $('.course-checkbox').each(function() {
                        if ($(this).is(':checked')) {
                            courseValues.push($(this).val());
                        }
                    });
                    var formData ={sba_id:sba_id,courseValues:courseValues,tab2:tab2};
                }else if('tab3DataForm' == activeFormId){
                    var tab3 = 'tab3';
                    const radioButtons = document.getElementsByName("application_status");
                    let selectedValue = "";
                    radioButtons.forEach(radioButton => {
                        if (radioButton.checked) {
                            selectedValue = radioButton.id;
                        }
                    });
                    if ($('#tab3remarks').is(':visible'))
                    {
                        var remarksdata  =  $('#remarksdata').val();
                    }else{
                        var remarksdata  =  '';
                    }
                    var formData ={sba_id:sba_id,application_status:selectedValue,tab3:tab3,remarks:remarksdata};
                }else if('tab4DataForm' == activeFormId){
                    var tab = 'tab4';
                    var joining_date = $('#joining_date').val();
                    var fee_amount = $('#fee_amount').val();
                    var course_details = $('#course_details').val();
                    var formData ={sba_id:sba_id,joining_date:joining_date,fee_amount:fee_amount,course_details:course_details,tab:tab};
                }else if('tab5DataForm' == activeFormId){
                    var tab = 'tab5';
                    if ($('#visa_manual').is(':visible'))
                    {
                        var visa_manual = $('#visa_manual').val();
                    }else{
                        var visa_manual  =  '';
                    }
                    if ($('#visa_agent').is(':visible'))
                    {
                        var visa_agent = $('#visa_agent').val();
                    }else{
                        var visa_agent  =  '';
                    }
                    var visa_apply_date = $('#visa_apply_date').val();
                    var portal_url = $('#portal_url').val();
                    var portal_email = $('#portal_email').val();
                    var portal_userid = $('#portal_userid').val();
                    var portal_password = $('#portal_password').val();
                    var portal_question = $('#portal_question').val();
                    var portal_answer = $('#portal_answer').val();
                    var visa_document_type = $('#visa_document_type').val();
                    var visa_document = $('#visa_document').val();
                    var formData = new FormData();
                    formData.append('sba_id', sba_id);
                    formData.append('tab', tab);
                    formData.append('visa_agent', visa_agent);
                    formData.append('visa_manual', visa_manual);
                    formData.append('visa_apply_date', visa_apply_date);
                    formData.append('portal_url', portal_url);
                    formData.append('portal_email', portal_email);
                    formData.append('portal_userid', portal_userid);
                    formData.append('portal_password', portal_password);
                    formData.append('portal_question', portal_question);
                    formData.append('portal_answer', portal_answer);
                    formData.append('visa_document_type', visa_document_type);
                    formData.append('visa_document', visa_document);
                    var files = $('#lead-document')[0].files;
                    for (var i = 0; i < files.length; i++) {
                        formData.append('images[]', files[i]);
                   }
                   $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('store-lead-360') }}',
                        type: 'post',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            spinner.classList.add('d-none');
                            if(response.success){
                                if(response.status !='Rejected'){
                                    handleNext();
                                }else{
                                    return false;
                                }
                            }
                        },
                        error: function(xhr) {
                            $('.next').removeClass('disabled');
                            spinner.classList.add('d-none');
                            var response = JSON.parse(xhr.responseText);
                            console.log(response);
                        }
                    });
                }else if('tab6DataForm' == activeFormId){
                    var tab = 'tab6';
                    if ($('#visa_no').is(':visible'))
                    {
                        var visa_no = $('#visa_no').val();
                    }else{
                        var visa_no  =  '';
                    }
                    if ($('#visa_exp_date').is(':visible'))
                    {
                        var visa_exp_date = $('#visa_exp_date').val();
                    }else{
                        var visa_exp_date  =  '';
                    }
                    if ($('#remarks').is(':visible'))
                    {
                        var remarks = $('#remarks').val();
                    }else{
                        var remarks  =  '';
                    }
                    const radioButtons = document.getElementsByName("visa_application");
                    let visa_application = "";
                    radioButtons.forEach(radioButton => {
                        if (radioButton.checked) {
                            visa_application = radioButton.id;
                        }
                    });
                    var formData ={sba_id:sba_id,visa_no:visa_no,visa_exp_date:visa_exp_date,remarks:remarks,visa_application:visa_application,tab:tab};
                }else if('tab7DataForm' == activeFormId){
                    var formData =   $('#tab7DataForm').serialize();
                }else if('tab8DataForm' == activeFormId){
                    var formData =   $('#tab8DataForm').serialize();
                }else if('tab9DataForm' == activeFormId){
                    var formData =   $('#tab9DataForm').serialize();
                }else if('tab10DataForm' == activeFormId){
                    var formData =   $('#tab10DataForm').serialize();
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('store-lead-360') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        spinner.classList.add('d-none');
                        if(response.success){
                            if(response.status !='Rejected'){
                                handleNext();
                            }else{
                                return false;
                            }
                        }
                    },
                    error: function(xhr) {
                        spinner.classList.add('d-none');
                        $('.next').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors.collegeValues){
                            var collegeError =` <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>${response.errors.collegeValues}</strong>
                                                </div>`;
                            $('.alert-college').html(collegeError);
                        }
                        if(response.errors.courseValues){
                            var courseError =` <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>${response.errors.courseValues}</strong>
                                                </div>`;
                            $('.alert-course').html(courseError);
                        }

                    }
                });
                return false;
            });
            $('.upload-image').on('click', function(){
                $('.upload-image').addClass('disabled');
                var spinner = this.querySelector('.spinner-grow');
                spinner.classList.remove('d-none');
                var formData = new FormData($('#tab4DataForm')[0]);
                var files = $('#document')[0].files;
                    for (var i = 0; i < files.length; i++) {
                        formData.append('images[]', files[i]);
                   }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store-lead-360") }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        spinner.classList.add('d-none');
                        $('.upload-image').removeClass('disabled');
                        console.log(response);
                    },
                    error: function(xhr){
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors.document){
                        var documents =` <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>${response.errors.document}</strong>
                                            </div>`;
                        $('.alert-image-error').html(documents);
                    }
                    }
                });
            });

            $('#visa_document').on('change',function() {
                var selectedValue = $(this).val();
                if (selectedValue == 'agent') {
                    $('#agent').show();
                    $('#manual').hide();
                } else if(selectedValue == 'manual') {
                    $('#manual').show();
                    $('#agent').hide();
                }else{
                    $('#manual').hide();
                    $('#agent').hide();
                }
            });
            $('#fee_payment_by').on('change',function() {
                var selectedValue = $(this).val();
                if (selectedValue == 'agent') {
                    $('#feeagent').show();
                }else{
                    $('#feeagent').hide();
                }
            });

            $('#rejected').on('click',function(){
                $('#tab3remarks').show();
            });
            if ($('#rejected').is(':checked')) {
                $('#tab3remarks').show();
            }
            $('#accepted').on('click',function(){
                $('#tab3remarks').hide();
            });
            $('#Accepted').on('click',function(){
                $('.remarks').hide();
                $('.visa-data').show();
            });
            $('#Rejected').on('click',function(){
                $('.remarks').show();
                $('.visa-data').hide();
            });
            if ($('#Rejected').is(':checked')) {
                $('.remarks').show();
                $('.visa-data').hide();
            }
            if ($('#Accepted').is(':checked')) {
                $('.remarks').hide();
                $('.visa-data').show();
            }
            $('#inprogress').on('click',function(){
                $('#tab3remarks').hide();
            });
            $('#Inprogress').on('click',function(){
                $('.remarks').hide();
                $('.visa-data').hide();
            });
            $('#universitySelect').change(function(){
                $('#selectedValues').empty();
                $('#universitySelect option:selected').each(function(){
                    var value = $(this).val();
                    var text = $(this).text();
                    $('#selectedValues').append('<input type="checkbox" class="universityCheckbox college-checkbox" value="' + value + '" checked> ' + text + '<br>');
                });
                $('#universitySelect option:not(:selected)').each(function(){
                    var value = $(this).val();
                    $('.universityCheckbox[value="' + value + '"]').remove();
                });
            });
            $('#courseSelect').change(function(){
                $('#courseValues').empty();
                $('#courseSelect option:selected').each(function(){
                    var value = $(this).val();
                    var text = $(this).text();
                    $('#courseValues').append('<input type="checkbox" class="courseCheckbox course-checkbox" value="' + value + '" checked> ' + text + '<br>');
                });
                $('#courseSelect option:not(:selected)').each(function(){
                    var value = $(this).val();
                    $('.universityCheckbox[value="' + value + '"]').remove();
                });
            });
          });
    </script>

@endsection
