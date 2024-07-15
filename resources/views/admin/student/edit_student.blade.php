@extends('admin.include.app')
@section('style')
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
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
@endsection
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Student Profile</h4>
                </div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="text-center">{{ session('message') }}</h4>
                    </div>
                @endif

                <div class="card-body">
                    <div class="wizard">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title=" General Information ">
                                <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step1" id="step1-tab"   data-bs-toggle="tab" role="tab" aria-controls="step1"
                                    aria-selected="true"> 1 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">General Information </span>
                            </li>
                            <li class="nav-item flex-fill education_data" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Educaton History">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step2" id="step2-tab"   data-bs-toggle="tab" role="tab" aria-controls="step2"
                                    aria-selected="false"> 2 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Educaton History</span>
                            </li>
                            <li class="nav-item flex-fill experience" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Work Experience">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step3" id="step3-tab"   data-bs-toggle="tab" role="tab" aria-controls="step3"
                                    aria-selected="false"> 3 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Work Experience</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Test Score">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step4" id="step4-tab"    data-bs-toggle="tab" role="tab" aria-controls="step4"
                                    aria-selected="false"> 4 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Test Score</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="BackGround Information">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step5" id="step5-tab"   data-bs-toggle="tab" role="tab" aria-controls="step5"
                                    aria-selected="false"> 5 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">BackGround Information</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Document">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step6" id="step6-tab"   data-bs-toggle="tab" role="tab" aria-controls="step6"
                                    aria-selected="false"> 6
                                </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Document</span>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h5>General Information</h5>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input
                                                    value="{{ $about_student->first_name ?? old('first_name') }}"
                                                    name="first_name" type="text" class="form-control"
                                                    placeholder="Name" autocomplete="first_name">
                                                <label for="lead-first_name" class="form-label text-danger">First Name *</label>
                                                <span class="text-danger first_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input type="hidden" name="tab1" value="tab1">
                                                <input  name="middle_name" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->middle_name ?? old('middle_name') }}"
                                                    placeholder="Middle Name" autocomplete="middle_name">
                                                <label for="lead-middle_name" class="form-label">Middle Name</label>
                                                <span class="text-danger middle_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input  name="last_name" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->last_name ?? old('last_name') }}"
                                                    placeholder="Last Name" autocomplete="last_name">
                                                <label for="lead-last_name" class="form-label">Last Name*</label>
                                                <span class="text-danger last_name"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input  name="email" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->email ?? old('email') }}"
                                                    placeholder="Email" autocomplete="Email">
                                                <label for="lead-last_name" class="form-label text-danger">Email*</label>
                                                <span class="text-danger email-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select class="form-control" name="gender" >
                                                    <option value="">-- Select Gender --</option>
                                                    <option value="Male"
                                                        {{ ($about_student->gender ?? old('gender')) == 'Male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="Female"
                                                        {{ ($about_student->gender ?? old('gender')) == 'Female' ? 'selected' : '' }}>
                                                        Female</option>
                                                    <option value="Other"
                                                    {{ ($about_student->gender ?? old('gender')) == 'Other' ? 'selected' : '' }}>
                                                    Other</option>
                                                </select>
                                                <span class="text-danger gender"></span>
                                                <label for="lead-source" class="form-label text-danger">Gender *</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select class="form-control" name="maritial_status" >
                                                    <option value="">-- Maritial Status --</option>
                                                    <option value="Single"
                                                        {{ ($about_student->maritial_status ?? old('maritial_status')) == 'Single' ? 'selected' : '' }}>
                                                        Single</option>
                                                    <option value="Married"
                                                        {{ ($about_student->maritial_status ?? old('maritial_status')) == 'Married' ? 'selected' : '' }}>
                                                        Married</option>
                                                    <option value="Widowed"
                                                        {{ ($about_student->maritial_status ?? old('maritial_status')) == 'Widowed' ? 'selected' : '' }}>
                                                        Widowed</option>
                                                    <option value="Divorced"
                                                        {{ ($about_student->maritial_status ?? old('maritial_status')) == 'Divorced' ? 'selected' : '' }}>
                                                        Divorced</option>
                                                </select>
                                                <label for="lead-source" class="form-label">Maritial Status</label>
                                                <span class="text-danger maritial_status"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4 mt-3">
                                            <div class="form-floating">
                                                <select class="form-control" name="passport_status" id="passport_status"
                                                    placeholder="Passport Status">
                                                    <option value="">-- Select --</option>
                                                    <option value="I have"
                                                        {{ ($about_student->passport_status ?? old('passport_status')) == 'I have' ? 'selected' : '' }}>
                                                        I have</option>
                                                    <option value="I do not have"
                                                        {{ ($about_student->passport_status ?? old('passport_status')) == 'I do not have' ? 'selected' : '' }}>
                                                        I do not have</option>
                                                    <option value="I have applied"
                                                        {{ ($about_student->passport_status ?? old('passport_status')) == 'I have applied' ? 'selected' : '' }}>
                                                        I have applied</option>
                                                </select>
                                                <label for="lead-source" class="form-label">Passport Status</label>
                                                <span class="text-danger passport_status"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3" style="display: none" id="passport_number">
                                            <div class="form-floating">
                                                <input  name="passport_number"
                                                    value="{{ $about_student->passport_number ?? old('passport_number') }}"
                                                    type="text" class="form-control" placeholder="Middle Name"
                                                    autocomplete="passport-number" pattern="[A-Za-z0-9]" title="Only letters and numbers are allowed">
                                                <label for="lead-passport-number" class="form-label">Passport
                                                    Number</label>
                                                <span class="text-danger passport_number"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3" style="display: none" id="passport_expiry">
                                            <div class="form-floating">
                                                <input  name="passport_expiry"
                                                    value="{{ $about_student->passport_expiry ?? old('passport_expiry') }}"
                                                    type="date" class="form-control" placeholder="Passport Expiry Date"
                                                    autocomplete="off" min="{{ now()->toDateString() }}">
                                                <label for="passport_expiry" class="form-label">Passport Expiry Date</label>
                                                <span class="text-danger">{{ $errors->first('passport_expiry') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <div class="form-floating">
                                                <input name="dob" type="date" class="form-control"
                                                    value="{{ $about_student->dob ?? old('dob') }}" >
                                                <label for="lead-passport-number" class="form-label text-danger">Date of Birth *</label>
                                                <span class="text-danger dob"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <div class="form-floating">
                                                <input name="first_language" type="text"
                                                    value="{{ $about_student->first_language ?? old('first_language') }}"
                                                    class="form-control" >
                                                <label for="lead-passport-number" class="form-label">First
                                                    Language</label>
                                                <span class="text-danger first_language "></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 mt-3">
                                        <h5>Address Details</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select class="form-control country" name="country_id" >
                                                    <option value="">-- Select Country --</option>
                                                    @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ ($about_student->country_id ?? old('country_id')) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="lead-source" class="form-label">Country</label>
                                                <span class="text-danger country_id "></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                @php
                                                    $state = DB::table('province')
                                                        ->where('id', $about_student->province_id)
                                                        ->first();
                                                @endphp
                                                <select name="province_id"
                                                    class="form-control province_id" required>
                                                    @if (!empty($about_student->province_id))
                                                        <option value="{{ $about_student->province_id }}"
                                                            {{ ($about_student->province_id ?? old('province_id')) == $state->id ? 'selected' : '' }}>
                                                            {{ $state->name }}</option>
                                                    @endif
                                                </select>
                                                <label for="lead-source" class="form-label">State/Provision </label>
                                            </div>
                                            <span class="text-danger province_id_error"></span>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input name="city" type="text"
                                                    value="{{ $about_student->city ?? old('city') }}"
                                                    class="form-control" >
                                                <label for="lead-city" class="form-label">City</label>
                                                <span class="text-danger city"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input name="address" type="text"
                                                    value="{{ $about_student->address ?? old('address') }}"
                                                    class="form-control" >
                                                <label for="lead-address" class="form-label">Address</label>
                                                <span class="text-danger address"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input name="zip" type="text" class="form-control"
                                                    value="{{ $about_student->zip ?? old('zip') }}" >
                                                <label for="lead-address" class="form-label">Pincode</label>
                                                <span class="text-danger zip"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn btn-primary next ">Continue<span
                                            class="spinner-grow spinner-grow-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade " role="tabpanel" id="step2" aria-labelledby="step2-tab">
                                <div class="mb-4">
                                    <h5>Education History</h5>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-3 mt-2">
                                            <div class="form-floating">
                                                <select class="form-control selected-country" name="pref_countries">
                                                    <option value="">-- Select Country --</option>
                                                    @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}"
                                                        {{ (isset($about_student->pref_countries) &&  $about_student->pref_countries == $item->id) || (old('pref_countries') == $item->id) ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="lead-source text-danger" class="form-label">Country*</label>
                                                <span class="text-danger pref_countries"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-2">
                                            <div class="form-floating">
                                                <select class="form-control education_level_id" name="education_level_id"
                                                    >
                                                    <option value="">-- Education Level --</option>
                                                    @foreach ($progLabel as $item)
                                                        <option value="{{ $item->id }}" {{ (isset($education_history->education_level_id) && $education_history->education_level_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="lead-source" class="form-label text-danger">Education Level*</label>
                                                <span class="text-danger education_level_id_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-2">
                                            <div class="form-floating">
                                                @php
                                                $grading_scheme = DB::table('grading_scheme')
                                                        ->where('id', $education_history->grading_scheme_id ?? null)
                                                        ->first();
                                                @endphp
                                            <select name="grading_scheme_id" id="grading_scheme_id"
                                                class="form-control grading_scheme_id grading-scheme" >
                                                    <option value="0-100" {{ (isset($education_history->grading_scheme_id) && $education_history->grading_scheme_id == '0-100') ? 'selected' : '' }} grading-data= "0-100">0 - 100 out of</option>
                                                    <option value="0-45" {{ (isset($education_history->grading_scheme_id) && $education_history->grading_scheme_id == '0-45') ? 'selected' : '' }} grading-data= "0-45">0 - 45 out of</option>
                                                    <option value="0-10" {{ (isset($education_history->grading_scheme_id) && $education_history->grading_scheme_id == '0-10') ? 'selected' : '' }} grading-data="0-10">0 - 10 out of</option>
                                                    <option value="other" {{ (isset($education_history->grading_scheme_id) && $education_history->grading_scheme_id == 'other') ? 'selected' : '' }} grading-data="other">Other</option>
                                            </select>
                                                 <label for="lead-source" class="form-label text-danger">Grading Scheme*</label>
                                                <span class="text-danger grading_scheme_id_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-2" style="display: none" id="max_score" >
                                            <div class="form-floating">
                                                <input name="max_score"  value="{{ $education_history->max_score ?? null }}" type="number" class="form-control">
                                                <label for="lead-address" class="form-label">Max Score </label>
                                                <span class="text-danger max_score"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-2">
                                            <div class="form-floating">
                                                <input name="grading_average" id="lead-grading_number" value="{{ $education_history->grading_average ?? null }}" type="number" class="form-control">
                                                <input type="hidden" name="tab2" value="tab2">
                                                <label for="lead-address" class="form-label">Grading Score</label>
                                                <span class="text-danger grading_average"></span>
                                                <div id="grading_input_error" class="text-danger"  style="display: none;">Invalid grade. Please enter a value within the selected grading scheme.</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 m-2"><label>
                                            <input type="checkbox" name="graduated_recently" value="Yes">Graduated
                                            from most recent school</label>
                                    </div>
                                </form>
                                <div class="school-attended">

                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="card-stretch-full">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4>Schools Attended</h4>
                                                </div>
                                                <div class="col-md-6 ">
                                                     {{-- class="last_attended" --}}
                                                    <div data-tour="search"
                                                        data-bs-toggle="offcanvas" data-bs-target="#viewlead"
                                                        aria-controls="viewlead"
                                                        student-id="{{ $about_student->user_id ?? null }}">
                                                        <button type="button" class="btn btn-primary float-end last_attended_school"
                                                            aria-controls="exampleOffcanvas">
                                                            Last Attended School <i
                                                                class="las la-hands-helping"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-modern table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="1"> SNo</th>
                                                        <th>Documents</th>
                                                        <th> Name</th>
                                                        <th> Language</th>
                                                        <th> AttendedFrom</th>
                                                        <th> AttendedTo</th>
                                                        <th> Degree</th>
                                                        <th> DegreeOn</th>
                                                        <th> Country</th>
                                                        <th> Province</th>
                                                        <th> City/Town</th>
                                                        <th> Address</th>
                                                        <th> Postal/Zip</th>
                                                        <th> Edit </th>
                                                        <th>Delete</th>

                                                    </tr>
                                                </thead>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                <tbody class="last-attended-school">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn btn-warning previous me-2 "> Back</a>
                                    <a class="btn btn btn-primary next school">Continue
                                        <span class="spinner-grow spinner-grow-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade " role="tabpanel" id="step3" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5>Work Experience</h5>
                                </div>
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input " type="radio" name="work_experience" id="work_experience_1" value="1"  @if ($about_student->work_experience == 1) checked @endif>
                                                <label class="form-check-label" for="work_experience_1">Yes, I have work experience</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="work_experience" id="work_experience_0" value="0" @if ($about_student->work_experience == 0) checked @endif >
                                                <label class="form-check-label" for="work_experience_0">No, I have not any work experience</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 experience_details" style="display: none">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input
                                                    value="{{ $about_student->organization_name ?? old('organization_name') }}"
                                                    name="organization_name" type="text" class="form-control"
                                                    placeholder="Name of Organization" autocomplete="organization_name">
                                                <label for="organization_name" class="form-label">Name of Organization</label>
                                                <span class="text-danger organization_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="hidden" name="tab3" value="tab3">
                                                <input  name="position" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->position ?? old('position') }}"
                                                    placeholder="Position" autocomplete="position">
                                                <label for="position" class="form-label">Position</label>
                                                <span class="text-danger position"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 experience_details"  style="display: none">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input
                                                    value="{{ $about_student->job_profile ?? old('job_profile') }}"
                                                    name="job_profile" type="text" class="form-control"
                                                    placeholder="Job Profile" autocomplete="job_profile">
                                                <label for="job_profile" class="form-label">Job Profile</label>
                                                <span class="text-danger job_profile"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input  name="working_from" type="date"
                                                    class="form-control"
                                                    value="{{ $about_student->working_from ?? old('working_from') }}"
                                                    placeholder="Working From" autocomplete="working_from">
                                                <label for="working_from" class="form-label">Working From</label>
                                                <span class="text-danger working_from"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 experience_details"  style="display: none">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input
                                                    value="{{ $about_student->working_upto ?? old('working_upto') }}"
                                                    name="working_upto" type="date" class="form-control"
                                                    placeholder="Working Upto" autocomplete="working_upto">
                                                <label for="lead-working_upto" class="form-label">Working Upto</label>
                                                <span class="text-danger working_upto"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input  name="mode_of_selary" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->mode_of_selary ?? old('mode_of_selary') }}"
                                                    placeholder="Middle Name" autocomplete="mode_of_selary">
                                                <label for="mode_of_selary" class="form-label">Mode Of Salary</label>
                                                <span class="text-danger mode_of_selary"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 experience_details"  style="display: none">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="working_status" id="working_status1" value="1" {{ isset($about_student->working_status) && $about_student->working_status == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="working_status1">
                                                  I am working here
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="working_status" id="working_status2" value="2" {{ isset($about_student->working_status) && $about_student->working_status == 2 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="working_status2">
                                                  I am not working here
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn btn-warning previous me-2 "> Back</a>
                                    <a class="btn btn btn-primary next">Continue
                                        <span class="spinner-grow spinner-grow-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                                <div class="mb-4">
                                    <h5>Test Score</h5>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="card-stretch-full">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4>Test Score</h4>
                                                </div>
                                                <div class="col-md-8 ">
                                                    <div class="d-flex float-end">
                                                        <a href="" class="btn btn-primary btn-sm mx-1" class="last_attended" data-tour="search"
                                                        data-bs-toggle="offcanvas" data-bs-target="#gre_exam"
                                                        aria-controls="gre_exam">GRE exam scores</a>
                                                        <a href="" class="btn btn-primary btn-sm mx-1"  data-tour="search"
                                                        data-bs-toggle="offcanvas" data-bs-target="#gmat"
                                                        aria-controls="gmat">GMAT exam scores</a>
                                                        <a href="" class="btn btn-primary btn-sm mx-1"
                                                        data-tour="search"  data-bs-toggle="offcanvas" data-bs-target="#testscrores"
                                                        aria-controls="testscrores">Add Test Score</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-modern table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Exam Type</th>
                                                        <th>Date of Exam</th>
                                                        <th>Listening</th>
                                                        <th>Writing</th>
                                                        <th>Reading</th>
                                                        <th>Speaking</th>
                                                        <th>Average</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="test-score">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 ">Previous</a>
                                    <a class="btn btn-primary skipform" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none"
                                            role="status" aria-hidden="true"></span> continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step5" aria-labelledby="step5-tab">
                                <div class="mb-4">
                                    <h5>Background Information</h5>
                                </div>
                                <div class="alert-image-error"> </div>
                            <form>
                                <div class="col-12">
                                    <label>
                                        <b>Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand or Australia?</b>
                                    </label>
                                    <div class="col-6">
                                        <label>
                                            <input type="radio" name="ever_refused_visa" value="Yes"  {{ $about_student->ever_refused_visa === "Yes" ? 'checked' : '' }} onclick="showVisaDetails(this.value)">
                                            &nbsp; Yes &nbsp;&nbsp;&nbsp;</label><label>
                                            <input type="radio" name="ever_refused_visa" value="No" {{ $about_student->ever_refused_visa === "No" ? 'checked' : '' }} onclick="showVisaDetails(this.value)">&nbsp; No</label>
                                            <span class="text-danger ever_refused_visa"></span>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <input type="hidden" name="tab5" value="tab5" >
                                        <label><b>Do you have a valid Study Permit / Visa?</b></label>
                                        <label>
                                        <input type="radio" name="has_visa" value="1" {{ $about_student->has_visa == "1" ? 'checked' : '' }}>&nbsp; Yes &nbsp;&nbsp;&nbsp;</label><label>
                                        <input type="radio" name="has_visa" value="0" {{ $about_student->has_visa == "0" ? 'checked' : '' }}>&nbsp; No</label>
                                        <span class="text-danger has_visa"></span>
                                    </div>
                                    <br>
                                    <div class="col-12 visa_details_info" style="display: {{ $about_student->ever_refused_visa === "Yes" ? 'block' : 'none' }};">
                                        <div class="form-floating">
                                            <input name="visa_details" value="{{ $about_student->visa_details ?? null }}"  type="text" class="form-control" >
                                            <label for="lead-address" class="form-label">Visa Details</label>
                                            <span class="text-danger visa_details"></span>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- <div class="col-12 mb-3">
                                        <div class="form-floating">
                                            <select class="form-control  selectpicker" name="subject_input"
                                                id="lead-subject_input" multiple placeholder="Education Level">
                                                @foreach ($all_subject as $item)
                                                    @php
                                                        $selected = '';
                                                        if ($about_student->pref_subjects !== null && $about_student->pref_subjects !== '') {
                                                            $selected = in_array($item->id, explode(',', $about_student->pref_subjects)) ? 'selected' : '';
                                                        }
                                                    @endphp
                                                    <option value="{{ $item->id }}" {{ $selected }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="lead_documents_id" class="form-label">Subject</label>
                                            <span class="text-danger subject_input"></span>
                                        </div>
                                    </div> --}}
                                </form>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 ">Previous</a>
                                    <a class="btn btn-primary next" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none"
                                            role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step6" aria-labelledby="step6-tab">
                                <div class="mb-4">
                                    <h5>Documents</h5>
                                </div>

                                <form id="document">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <select class="form-control " name="visa_document_type" id="lead-visa_document_type" placeholder="Document Type">
                                                    <option value="">--Select--</option>
                                                 </select>
                                                <label for="lead-source" class="form-label">Document Type</label>
                                                <span class="text-danger visa_document_type"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="file"  class="form-control " name ="document[]" id="lead-document" placeholder="Document">
                                                <input type="hidden" name="tab6" value="tab6">
                                                <label for="lead-address" class="form-label">Document</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-12 mt-2">
                                    <div class="card-stretch-full">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4>Document List</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="responseMessage"></div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-modern table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Type</th>
                                                        <th>Image</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="documents-data">
                                                    @foreach ($student_document as $item)

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 ">Previous</a>
                                    <a class="btn btn-primary documentForm"><span class="spinner-grow spinner-grow-sm d-none"
                                            role="status" aria-hidden="true"></span>Save</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="viewlead">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Last Attended School</h5>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div id="responseMessage"></div>
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="myForm">
                            <div class="col-12 ">
                                <div class="form-floating">
                                    <select class="form-control lead_documents_id" name="lead_documents_id"
                                        id="lead_documents_id" placeholder="Education Level">
                                        <option> --Select Document--</option>
                                    </select>
                                    <label for="lead_documents_id" class="form-label"> Select Documents</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="name" type="text" id="institue_name"
                                        class="form-control " placeholder="Institute Name" autocomplete="name"
                                        value=""><label for="lead-name" class="form-label">Institute Name</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="primary_language" type="text"
                                        class="form-control " id="primary_language" placeholder="Primary Language for Instruction"
                                        autocomplete="primary_language" value=""><label for="lead-primary_language"
                                        class="form-label">Primary Language for Instruction</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="attended_from" type="date"
                                        class="form-control " id="attended_from" placeholder="Attended Institute From"
                                        autocomplete="attended_from" value="">
                                        <label for="lead-attended_from"
                                        class="form-label">Attended Institute From</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="attended_to" type="date"
                                        class="form-control" id="attended_to" placeholder="Attendend Instutute To"
                                        autocomplete="attended_to" value=""><label for="lead-attended_to"
                                        class="form-label">Attendend Instutute To</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="degree_awarded" type="text"
                                        class="form-control " id="degree_awarded" placeholder="Degree Awarded"
                                        autocomplete="degree_awarded" value=""><label for="lead-degree_awarded"
                                        class="form-label">Degree Awarded</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="degree_awarded_on" type="date"
                                        class="form-control " id="degree_awarded_on" placeholder="Degree Awareded On"
                                        autocomplete="degree_awarded_on" value=""><label
                                        for="lead-degree_awarded_on" class="form-label">Degree Awareded On</label></div>
                            </div>
                            <h4 class="m-2">School Address</h4>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <select class="form-control country " name="country_id" id="country_id">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->id }}"
                                                {{ (old('country_id')) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="lead-country" class="form-label">Country Name</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <select name="province_id" class="form-control province_id" id="province_id">
                                    <option value="">-State/Provision -</option>
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="city" type="text" id="city"
                                        class="form-control " placeholder="City/Town" autocomplete="city"
                                        value=""><label for="lead-city" class="form-label">City/Town</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="address" id="address" type="text"
                                        class="form-control " placeholder="Address" autocomplete="address"
                                        value=""><label for="lead-address" class="form-label">Address</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="postal_zip" id="postal_zip" type="text"
                                        class="form-control " placeholder="Postal Code/Zip"
                                        autocomplete="postal_zip" value=""><label for="lead-postal_zip"
                                        class="form-label">Postal Code/Zip</label></div>
                            </div>
                        </form>
                        <div class="col-md-12"><button type="button"
                        class="btn btn-info  py-6 last_attendence">Submit<span
                                    class="spinner-grow spinner-grow-sm d-none" role="status"
                                    aria-hidden="true"></button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- gre exam score  --}}
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="gre_exam">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>GRE exam scores</h5>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="responseMessage"></div>
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="greExam">
                            <label class="form-check-label" for="result_receive">Result Receive</label><br>
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input " id="result_receive1" type="radio" name="result_receive"  value="1"  @if (isset($additional_qualification) && $additional_qualification->result_receive == 1) checked @endif>
                                    <label class="form-check-label" for="result_receive1">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="result_receive"  value="0" @if (isset($additional_qualification) && $additional_qualification->result_receive  == 0) checked @endif >
                                    <label class="form-check-label" for="result_receive">No</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="date_of_exam" type="date" value="{{ $additional_qualification->date_of_exam ?? \Carbon\Carbon::now()->toDateString() }}" class="form-control ">
                                    <label for="lead-name" class="form-label">Exam Date</label>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input type="hidden" name="type" value="GRE">
                                        <input name="verbal_score" type="number"  class="form-control gre_score"  value="{{$additional_qualification->verbal_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="verbal_rank" type="number"  class="form-control gre_score" value="{{$additional_qualification->verbal_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display:none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_score" type="number"  class="form-control gre_score" value="{{$additional_qualification->quantitative_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_rank" type="number"  class="form-control gre_score" value="{{$additional_qualification->quantitative_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_score" type="number"  class="form-control gre_score"  value="{{$additional_qualification->writing_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_rank" type="number"  class="form-control gre_score" value="{{$additional_qualification->writing_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_score" type="number"  class="form-control gre_score" value="{{$additional_qualification->total_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_rank" type="number"  class="form-control gre_score" value="{{$additional_qualification->total_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Rank</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12"><button type="button"
                            class="btn btn-info  py-6 greExam">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- gmat score  --}}
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="gmat">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>GMAT exam scores</h5>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="responseMessage"></div>
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="gmatform">
                            <label class="form-check-label" for="gmat_result_receive">Result Receive</label><br>
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input " id="gmat_result_receive1" type="radio" name="gmat_result_receive"  value="1"  @if ($gmat && $gmat->result_receive == 1) checked @endif>
                                    <label class="form-check-label" for="gmat_result_receive1">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="gmat_result_receive"  value="0" @if ($gmat && $gmat->result_receive == 0) checked @endif >
                                    <label class="form-check-label" for="gmat_result_receive">No</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="date_of_exam" type="date" value="{{ $gmat->date_of_exam ?? \Carbon\Carbon::now()->toDateString() }}" class="form-control ">
                                    <label for="lead-name" class="form-label">Exam Date</label>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input type="hidden" name="type" value="GMAT">
                                        <input name="verbal_score" type="number"  class="form-control gmat_score" value="{{$gmat->verbal_score ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="verbal_rank" type="number"  class="form-control gmat_score" value="{{$gmat->verbal_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_score" type="number"  class="form-control gmat_score" value="{{$gmat->quantitative_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_rank" type="number"  class="form-control gmat_score" value="{{$gmat->quantitative_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_score" type="number"  class="form-control gmat_score"  value="{{$gmat->writing_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_rank" type="number"  class="form-control gmat_score" value="{{$gmat->writing_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_score" type="number"  class="form-control gmat_score" value="{{$gmat->total_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_rank" type="number"  class="form-control gmat_score" value="{{$gmat->total_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Rank</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12"><button type="button"
                            class="btn btn-info  py-6 gmat">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- test Score --}}
     <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="testscrores">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Add Test Score</h5>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="responseMessage"></div>
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="testscore">
                            <label class="form-check-label" for="eng_prof_level_result">Result Receive</label><br>
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input " id="eng_prof_level_result1" type="radio" name="eng_prof_level_result"  value="1"  @if ($about_student && $about_student->eng_prof_level_result == 1) checked @endif>
                                    <label class="form-check-label" for="eng_prof_level_result1">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="eng_prof_level_result"  value="0" @if ($about_student && $about_student->eng_prof_level_result == 0) checked @endif >
                                    <label class="form-check-label" for="eng_prof_level_result">No</label>
                                </div>
                            </div>
                            <div class="row " >
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <select class="form-control eng_prof_level" name="type" id="lead-type" placeholder="Exam Type">
                                            <option value="">--Select--</option>
                                            @foreach ($eng_prof_level as $item)
                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="lead-name" class="form-label">Exam Type</label>
                                        <span class="text-danger type"></span>
                                    </div>
                                </div>
                                <input type="hidden" name="eng_prof_level_score" value="" id="eng_prof_level_score">
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead-exam_date" name="exam_date" type="date" class="form-control " placeholder="Date of Exam" autocomplete="exam_date" value="">
                                        <label for="lead-name" class="form-label">Exam Date</label>
                                        <span class="text-danger exam_date"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-listening_score" name="listening_score" type="number" class="form-control eng_prof_score" placeholder="Listening" autocomplete="listening_score" value="">
                                        <label for="lead-name" class="form-label">Listening</label>
                                        <span class="text-danger listening_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-writing_score" name="writing_score" type="number" class="form-control eng_prof_score" placeholder="Writing" autocomplete="writing_score" value="">
                                        <label for="lead-name" class="form-label">Writing</label>
                                        <span class="text-danger writing_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-reading_score" name="reading_score" type="number" class="form-control eng_prof_score" placeholder="Reading" autocomplete="reading_score" value="">
                                        <label for="lead-name" class="form-label">Reading</label>
                                        <span class="text-danger reading_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-speaking_score" name="speaking_score" type="number" class="form-control eng_prof_score" placeholder="Speaking" autocomplete="speaking_score" value="">
                                        <label for="lead-name" class="form-label">Speaking</label>
                                        <span class="text-danger speaking_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-average_score" name="average_score" type="number" class="form-control eng_prof_score" placeholder="Average" autocomplete="average_score" value="">
                                        <label for="lead-name" class="form-label">Average</label>
                                        <span class="text-danger average_score"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12"><button type="button"
                            class="btn btn-info  py-6 testscore">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
          const gradingSchemeSelect = document.getElementById('grading_scheme_id');
          const gradingInput = document.getElementById('lead-grading_number');

          gradingSchemeSelect.addEventListener('change', function () {
              validateInput();
          });
          gradingInput.addEventListener('input', function () {
              validateInput();
          });
          function extractMaxGrade(value) {
              const match = value.match(/(\d+)$/);
              return match ? parseInt(match[0], 10) : null;
          }

          function validateInput() {
              const selectedOption = gradingSchemeSelect.options[gradingSchemeSelect.selectedIndex];
              const selectedScheme = selectedOption.getAttribute('grading-data');
              if(selectedScheme == 'other'){
                $('#max_score').show();
              }else{
                $('#max_score').hide();
              }
              const inputValue = gradingInput.value;
              if (selectedScheme && inputValue !== '') {
                  const maxGrade = extractMaxGrade(selectedScheme);
                  if (maxGrade && inputValue > maxGrade) {
                      gradingInput.classList.add('is-invalid');
                      $('#grading_input_error').show();
                  } else {
                      gradingInput.classList.remove('is-invalid');
                      $('#grading_input_error').hide();
                  }
              } else {
                  gradingInput.classList.remove('is-invalid');
                  $('#grading_input_error').hide();
              }
          }
          validateInput();
    });
    function showVisaDetails(value) {
        var visaDetails = document.getElementsByClassName('visa_details_info');
        if (value == 'Yes') {
            for (var i = 0; i < visaDetails.length; i++) {
                visaDetails[i].style.display = 'block';
            }
        } else {
            for (var i = 0; i < visaDetails.length; i++) {
                visaDetails[i].style.display = 'none';
            }
        }
    }

    $(document).ready(function() {
        var passport_status = $('#passport_status').val();
        if(passport_status == 'I have') {
            $('#passport_number').show();
            $('#passport_expiry').show();
        }
    });
    $('#passport_status').change(function() {
        var passport_stauts=$(this).val();
        if($(this).val() == 'I have') {
            $('#passport_number').show();
            $('#passport_expiry').show();
        } else {
            $('#passport_number').hide();
            $('#passport_expiry').hide();
        }
    });
</script>
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        $(document).ready(function() {
            function setupCSRF() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            function fetchStates(country_id) {
                $('.province_id').empty();
                setupCSRF();
                $.ajax({
                    url: "{{ route('states.get') }}",
                    method: 'get',
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data)) {
                            $('.province_id').append('<option value="">No records found</option>');
                        } else {
                            $.each(data, function(key, value) {
                                $('.province_id').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    }
                });
            }
            // fetchStates($('.country').val());
            $('.country').change(function() {
                var country_id = $(this).val();
                fetchStates(country_id);
            });
            function student_test_score(){
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                $.ajax({
                    url: '{{ route('get-student-test-score') }}',
                    type: 'POST',
                    data: { student_id: student_id },
                    success: function(response) {
                        var test_score_data = response.test_score;
                        var tableRow = '';
                        test_score_data.forEach(function(item) {
                            tableRow += '<tr>';
                            tableRow += '<td>' + item.id + '</td>';
                            tableRow += '<td>' + item.type + '</td>';
                            tableRow += '<td>' + item.exam_date + '</td>';
                            tableRow += '<td>' + item.listening_score + '</td>';
                            tableRow += '<td>' + item.writing_score + '</td>';
                            tableRow += '<td>' + item.reading_score + '</td>';
                            tableRow += '<td>' + item.speaking_score + '</td>';
                            tableRow += '<td>' + item.average_score + '</td>';
                            tableRow += `<td><a href="javascript:void(0)" class="text-danger test-score" data-id="${item.id}"><i class="fa-solid fa-trash"></i></a></td>`;
                            tableRow += '</tr>';
                        });
                        $('.test-score').html(tableRow);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            $(document).on('click', '.test-score', function(){
                var id = $(this).data('id');
                if(confirm('Are you sure you want to delete this Test Score?')){
                    setupCSRF();
                    $.ajax({
                        url: '{{ url('student/delete-student-test-score')}}/'+id,
                        type: 'GET',
                        success: function(response){
                            alert('Test Score deleted successfully');
                            student_test_score();
                        }
                    });
                }
            });
            student_test_score();
            $('.education_level_id').change(function() {
                var program_level_id = $(this).val();
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                $.ajax({
                    url: '{{ route('fetch-documents')}}',
                    method: 'get',
                    data: {
                        program_level_id: program_level_id,
                        student_id: student_id,
                    },
                    success: function(data) {
                        $('.school-attended').empty();
                        $('#lead-visa_document_type').empty();
                        var documents = data.documents;
                        var school_attended = data.school_attended;
                        $('#lead-visa_document_type').append('<option value="">--Select Document--</option>');
                        $('#lead-visa_document_type').append('<option value="0">Other Documents</option>');
                        $.each(documents, function(key, value) {
                            $('#lead-visa_document_type').append(`<option value="${value.id}">${value.name}</option>`);
                            if(school_attended){
                                var isChecked = school_attended.includes(String(value.id)) ? 'checked' : '';
                                $('.school-attended').append(`
                                <div class="form-check">
                                    <input class="form-check-input already_filled_data" ${isChecked} name="education_level_id[]" disabled type="checkbox" id="education_level_id_${value.id}" value="${value.id}">
                                    <label class="form-check-label" for="education_level_id_${value.id}">${value.name}</label>
                                </div>`);
                            }
                        });
                    }
                });
            });
            function school_data(){
                var program_level_id = $('.education_level_id').val();
                var student_id = $('.last_attended').attr('student-id');
                if(program_level_id){
                    setupCSRF();
                    $.ajax({
                        url: '{{ route('fetch-documents') }}',
                        method: 'get',
                        data: {
                            program_level_id: program_level_id,
                            student_id: student_id,
                        },
                        success: function(data) {
                            $('.school-attended').empty();
                            $('#lead-visa_document_type').empty();
                            var documents = data.documents;
                            var school_attended = data.school_attended;
                            $('#lead-visa_document_type').append('<option value="">--Select Document--</option>');
                            $('#lead-visa_document_type').append('<option value="0">Other Documents</option>');
                            $.each(documents, function(key, value) {
                                $('#lead-visa_document_type').append(`<option value="${value.id}">${value.name}</option>`);
                                if(school_attended){
                                    var isChecked = school_attended.includes(String(value.id)) ? 'checked' : '';
                                    $('.school-attended').append(`
                                    <div class="form-check">
                                        <input class="form-check-input already_filled_data" ${isChecked} name="education_level_id[]" disabled type="checkbox" id="education_level_id_${value.id}" value="${value.id}">
                                        <label class="form-check-label" for="education_level_id_${value.id}">${value.name}</label>
                                    </div>`);
                                }
                            });
                        }
                    });
                }
            }
            function checkEducationAttended(){
                school_data();
                let checkedCount = $('.school-attended input[type="checkbox"]:checked').length;
                alert(checkedCount);
                var program_level_id = $('.education_level_id').val();
                setupCSRF();
                $.ajax({
                    url: '{{ route('check-education-attended') }}',
                    method: 'get',
                    data: {
                        program_level_id: program_level_id,
                        checkedCount: checkedCount
                    },
                    success: function(response) {
                        if(response.document == 0){
                            $('.school').addClass('disabled');
                        }else{
                            if(response.status == true){
                                $('.school').removeClass('disabled');
                            }else{
                                $('.school').addClass('disabled');
                            }
                        }
                    }
                });
            }
            $('.education_data').on('click',function(){
                checkEducationAttended();
            });
            function lead_education_level_id(){
                var program_level_id = $('.education_level_id').val();
                setupCSRF();
                $.ajax({
                    url: '{{ route('fetch-documents') }}',
                    method: 'get',
                    data: {
                        program_level_id: program_level_id
                    },
                    success: function(data) {
                        var optionsHtml =`<option disabled>--Select Document--</option>`;
                        $.each(data.documents, function(key, value) {
                            var disabled = data.disabled_education_history.includes(String(value.id)) ? 'disabled' : '';
                            optionsHtml += '<option value="' + value.id + '"' + disabled + '>' + value.name +
                                '</option>';
                        });
                        $('.lead_documents_id').html(optionsHtml);
                    }
                });
            }
            $('.last_attended_school').on('click',function() {
                $('#myForm')[0].reset();
                lead_education_level_id();
            });
            // $('.selected-country, .education_level_id').change(function() {
            //     var country_id = $('.selected-country').val();
            //     var education_level_id = $('.education_level_id').val();
            //     fetchData(country_id, education_level_id);
            // });
            // function fetchData(country_id, education_level_id) {
            //     setupCSRF();
            //     $.ajax({
            //         url: '{{ route('grading-scheme-list') }}',
            //         method: 'Post',
            //         data: {
            //             country_id: country_id,
            //             education_level_id: education_level_id
            //         },
            //         success: function(response) {
            //             var optionsHtml = '<option value="">-- Select --</option>';
            //             $.each(response.data, function(index, item) {
            //                 optionsHtml += '<option value="' + item.id + '">' + item.name +
            //                     '</option>';
            //             });
            //             $('.grading-scheme').html(optionsHtml);
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(error);
            //         }
            //     });
            // }
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
            $('.previous').on('click', handlePrevious);
            $('.skipform').on('click', function(event) {
                handleNext();
            });
            function deleteDocument(id) {
                setupCSRF();
                if (confirm('Are you sure you want to delete this document?')) {
                    $.ajax({
                        url: "{{ route('delete-student-document') }}",
                        type: "get",
                        data: {
                            id: id
                        },
                        success: function(response) {
                            documents_list();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            }
            function documents_list(){
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                $.ajax({
                    url: "{{ route('get-student-document') }}",
                    type: "GET",
                    data: {
                        student_id: student_id
                    },
                    success: function(response) {
                        var tableBody = $('.documents-data');
                        tableBody.empty();
                        var assetBaseUrl = "{{ asset('') }}";
                        if(response?.student_documents_data){
                            var tr = $('<tr>');
                            tr.append($('<td>').text(response?.student_documents_data.id ?? null));
                            tr.append($('<td>').text('Other Documents'));
                            tr.append($('<td>').html(`<img src="${assetBaseUrl}${response?.student_documents_data.image_url ?? ''}" style="width:150px;height:150px">`));
                            tr.append($('<td>').html(`<a href="#" class="btn btn-warning delete-document" data-id="${response?.student_documents_data.id}">Delete</a>`));
                            tableBody.append(tr);
                        }
                        $.each(response.documents, function(index, item) {
                            var tr = $('<tr>');
                            tr.append($('<td>').text(item.id ?? null));
                            tr.append($('<td>').text(item.name ?? null));
                            tr.append($('<td>').html(`<img src="${assetBaseUrl}${item.image_url ?? ''}" style="width:150px;height:150px">`));
                            tr.append($('<td>').html(`<a href="#" class="btn btn-warning delete-document" data-id="${item.id}">Delete</a>`));
                            tableBody.append(tr);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            $(document).on('click', '.delete-document', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                deleteDocument(id);
            });
            documents_list();
            $('.next').on('click', function(event) {
                event.preventDefault();
                var spinner = this.querySelector('.spinner-grow');
                spinner.classList.remove('d-none');
                $('.next').addClass('disabled');
                var activeTab = document.querySelector('.tab-pane.fade.show.active');
                var activeForm = activeTab.querySelector('form');
                var formData = new FormData(activeForm);
                var subject_input = $('#lead-subject_input').val();
                formData.append('subject_input',subject_input);
                setupCSRF();
                $.ajax({
                    url: '{{route('student/student-store')}}',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            $('#responseMessage').html('<span class="alert alert-success">' +
                                response.success + '</span>');
                            setTimeout(() => {

                            }, 1000);
                        }
                        spinner.classList.add('d-none');
                        $('.next').removeClass('disabled');
                        checkEducationAttended();
                        handleNext();
                    },
                    error: function(xhr) {
                        spinner.classList.add('d-none');
                        $('.next').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors.email){
                            $('.email-error').html(response.errors.email);
                        }else{
                            $('.email-error').html('');
                        }
                        if(response.errors.middle_name){
                            $('.middle_name').html(response.errors.middle_name);
                        }else{
                            $('.middle_name').html('');
                        }
                        if(response.errors.passport_number){
                            $('.passport_number').html(response.errors.passport_number);
                        }else{
                            $('.passport_number').html('');
                        }
                        if(response.errors.last_name){
                            $('.last_name').html(response.errors.last_name);
                        }else{
                            $('.last_name').html('');
                        }
                        if(response.errors.zip){
                            $('.zip').html(response.errors.zip);
                        }else{
                            $('.zip').html('');
                        }
                        if(response.errors.gender){
                            $('.gender').html(response.errors.gender);
                        }else{
                            $('.gender').html('');
                        }
                        if(response.errors.maritial_status){
                            $('.maritial_status').html(response.errors.maritial_status);
                        }else{
                            $('.maritial_status').html('');
                        }
                        if(response.errors.first_language){
                            $('.first_language').html(response.errors.first_language);
                        }else{
                            $('.first_language').html('');
                        }
                        if(response.errors.passport_status){
                            $('.passport_status').html(response.errors.passport_status);
                        }else{
                            $('.passport_status').html('');
                        }
                        if(response.errors.dob){
                            $('.dob').html(response.errors.dob);
                        }else{
                            $('.dob').html('');
                        }
                        if(response.errors.country_id){
                            $('.country_id').html(response.errors.country_id);
                        }else{
                            $('.country_id').html('');
                        }
                        if(response.errors.province_id){
                            $('.province_id_error').html(response.errors.province_id);
                        }else{
                            $('.province_id_error').html('');
                        }
                        if(response.errors.city){
                            $('.city').html(response.errors.city);
                        }else{
                            $('.city').html('');
                        }
                        if(response.errors.address){
                            $('.address').html(response.errors.address);
                        }else{
                            $('.address').html('');
                        }
                        if(response.errors.pref_countries){
                            $('.pref_countries').html(response.errors.pref_countries);
                        }else{
                            $('.pref_countries').html('');
                        }
                        if(response.errors.education_level_id){
                            $('.education_level_id_error').html(response.errors.education_level_id);
                        }else{
                            $('.education_level_id_error').html('');
                        }
                        if(response.errors.grading_average){
                            $('.grading_average').html(response.errors.grading_average);
                        }else{
                            $('.grading_average').html('');
                        }
                        if(response.errors.grading_scheme_id){
                            $('.grading_scheme_id_error').html(response.errors.grading_scheme_id);
                        }else{
                            $('.grading_scheme_id_error').html('');
                        }
                        if(response.errors.ever_refused_visa){
                            $('.ever_refused_visa').html(response.errors.ever_refused_visa);
                        }else{
                            $('.ever_refused_visa').html('');
                        }
                        if(response.errors.has_visa){
                            $('.has_visa').html(response.errors.has_visa);
                        }else{
                            $('.has_visa').html('');
                        }
                        if(response.errors.visa_details){
                            $('.visa_details').html(response.errors.visa_details);
                        }else{
                            $('.visa_details').html('');
                        }
                        if(response.errors.pref_subjects){
                            $('.pref_subjects').html(response.errors.pref_subjects);
                        }else{
                            $('.pref_subjects').html('');
                        }
                        if(response.errors.job_profile){
                            $('.job_profile').html(response.errors.job_profile);
                        }else{
                            $('.job_profile').html('');
                        }
                        if(response.errors.organization_name){
                            $('.organization_name').html(response.errors.organization_name);
                        }else{
                            $('.organization_name').html('');
                        }
                        if(response.errors.mode_of_selary){
                            $('.mode_of_selary').html(response.errors.mode_of_selary);
                        }else{
                            $('.mode_of_selary').html('');
                        }
                        if(response.errors.position){
                            $('.position').html(response.errors.position);
                        }else{
                            $('.position').html('');
                        }
                        if(response.errors.working_from){
                            $('.working_from').html(response.errors.working_from);
                        }else{
                            $('.working_from').html('');
                        }
                        if(response.errors.working_upto){
                            $('.working_upto').html(response.errors.working_upto);
                        }else{
                            $('.working_upto').html('');
                        }
                    }
                });
            });
            function get_school_attendend(){
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                $.ajax({
                    url: '{{ route('get-school-attendaned') }}',
                    type: 'get',
                    data: {
                        student_id: student_id
                    },
                    success: function(response){
                        $('.last-attended-school').html('');
                        $.each(response.school_attendend, function(i, data){
                            $('.last-attended-school').append(`
                                    <tr>
                                        <td>${i+1}</td>
                                        <td>${data.documents?.name ?? null}</td>
                                        <td>${data.student?.first_name ?? null}</td>
                                        <td>${data.primary_language ?? null}</td>
                                        <td>${data.attended_from ?? null}</td>
                                        <td>${data.attended_to ?? null}</td>
                                        <td>${data.degree_awarded ?? null}</td>
                                        <td>${data.degree_awarded_on ?? null}</td>
                                        <td>${data.country?.name ?? null}</td>
                                        <td>${data.province?.name ?? null}</td>
                                        <td>${data.city ?? null}</td>
                                        <td>${data.address ?? null}</td>
                                        <td>${data.postal_zip ?? null}</td>
                                        <td>
                                            <div class="last_attended" data-tour="search"
                                                data-bs-toggle="offcanvas" data-bs-target="#viewlead"
                                                aria-controls="viewlead"
                                                student-id="${data.id}">
                                                    <i class="las la-pen"></i>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0)" class="text-danger delete-attendance" data-id="${data.id}"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                            `);
                            checkEducationAttended();
                        });
                    }
                });
            }
            get_school_attendend();
            $('.education_level_id').change(function() {
                var program_level_id = $('.education_level_id').val();
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                $.ajax({
                    url: '{{ url('admin/check-student-attendend')}}',
                    type: 'POST',
                    data: {
                        'program_level_id': program_level_id,'student_id':student_id,
                    },
                    success: function(response){
                        if(response.success){
                            get_school_attendend();
                        }else{
                            $('.last-attended-school').empty();
                        }
                    }
                });
            });
            $(document).on('click', '.last_attended', function(){
                lead_education_level_id();
                var student_id = $(this).attr('student-id');
                setupCSRF();
                $.ajax({
                    url: '{{ url('student/get-student-attendence')}}/'+student_id,
                    type: 'GET',
                    success: function(response){
                        var selectedValues = response.school_attended?.documents;
                        if (!Array.isArray(selectedValues)) {
                            selectedValues = selectedValues ? [selectedValues] : [];
                        }
                        selectedValues.forEach(function(value) {
                            $('.lead_documents_id option[value="' + value + '"]').prop('disabled', false);
                        });
                        $('.lead_documents_id').val(selectedValues);
                        $('#institue_name').val(response.school_attended?.name);
                        $('#primary_language').val(response.school_attended?.primary_language);
                        $('#attended_from').val(response.school_attended?.attended_from);
                        $('#attended_to').val(response.school_attended?.attended_to);
                        $('#degree_awarded').val(response.school_attended?.degree_awarded);
                        $('#degree_awarded_on').val(response.school_attended?.degree_awarded_on);
                        $('#country_id').val(response.school_attended?.country_id);
                        fetchStates(response.school_attended?.country_id);
                        $('#province_id').val(response.school_attended?.province_id);
                        $('#city').val(response.school_attended?.city);
                        $('#address').val(response.school_attended?.address);
                        $('#postal_zip').val(response.school_attended?.postal_zip);
                    }
                });
            });
            $(document).on('click', '.delete-attendance', function(){
                var id = $(this).data('id');
                if(confirm('Are you sure you want to delete this Schools Attended?')){
                    school_data();
                    setupCSRF();
                    $.ajax({
                        url: '{{ url('student/delete-student-attendence')}}/'+id,
                        type: 'GET',
                        success: function(response){
                            alert('Schools Attended deleted successfully');
                            get_school_attendend();
                            lead_education_level_id();
                            checkEducationAttended();
                        }
                    });
                }
            });
            $('.last_attendence').on('click', function(event) {
                var document_id =$('.lead_documents_id').val();
                var program_level_id = $('.education_level_id').val();
                if(!document_id){
                    alert('Please Select Document  level');
                    return false;
                }
                var spinner = this.querySelector('.spinner-grow');
                spinner.classList.remove('d-none');
                var student_id = $('.last_attended').attr('student-id');
                var formData = $('#myForm').serialize();
                formData += '&student_id=' + student_id + '&program_level_id=' + program_level_id;
                setupCSRF();
                $('.last_attendence').addClass('disabled');
                $.ajax({
                    url: '{{ route('update-attended-school') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        spinner.classList.add('d-none');
                        school_data();
                        if (response.status) {
                            $('#responseMessage').html('<span class="alert alert-success">' +
                                response.success + '</span>');
                            // setTimeout(() => {
                            //     location.reload();
                            // }, 1000);
                        }
                        get_school_attendend();
                        lead_education_level_id();
                        $('.last_attendence').removeClass('disabled');
                        $('#myForm')[0].reset();
                    },
                    error: function(xhr) {
                        $('.last_attendence').removeClass('disabled');
                        spinner.classList.add('d-none');
                        lead_education_level_id();
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            $('.gre_score').on('input', function(){
                var gre_score =$(this).val();
                if(gre_score < 0){
                    $(this).val(0);
                }
                if(gre_score > 340){
                    $(this).val(340);
                    alert('Sorry! You cannot enter greater than 340');
                }
            });
            $('.greExam').on('click', function(event) {
                $('.greExam').addClass('disabled');
                var student_id = $('.last_attended').attr('student-id');
                var formData = $('#greExam').serialize();
                formData += '&student_id=' + student_id;
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-gre-exam-data') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        $('.greExam').removeClass('disabled');
                        $('#greExam')[0].reset();
                        if (response.status) {
                            $('.responseMessage').html('<span class="alert alert-success">' +
                                response.success + '</span>');
                            setTimeout(() => {
                                // location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr) {
                        $('.greExam').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            $('.eng_prof_level').on('change', function(){
                var eng_prof_level =$(this).val();
                $.ajax({
                    url: '{{ route('fetch-eng-prof-level-score') }}',
                    type: 'post',
                    data: {eng_prof_level: eng_prof_level},
                    success: function(response) {
                        $('#eng_prof_level_score').val(response.score.number);
                    },
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            $('.eng_prof_score').on('input', function() {
                var eng_prof_level = $('.eng_prof_level').val();
                if (eng_prof_level) {
                    var eng_prof_score = parseFloat($(this).val());
                    var eng_score = parseFloat($('#eng_prof_level_score').val());

                    if (eng_prof_score < 0) {
                        $(this).val(0);
                    }
                    if (eng_prof_score > eng_score) {
                        $(this).val(eng_score);
                        console.log('Sorry! You cannot enter greater than ' + eng_score);
                        alert('Sorry! You cannot enter greater than ' + eng_score);
                    }
                } else {
                    alert('Please Select English Proficiency Level');
                    return false;
                }
            });
            $('.gmat_score').on('input', function(){
                var gmat_score =$(this).val();
                if(gmat_score < 0){
                    $(this).val(0);
                }
                if(gmat_score > 805){
                    $(this).val(805);
                    alert('Sorry! You cannot enter greater than 805');
                }
            });
            $('.gmat').on('click', function(event) {
                $('.gmat').addClass('disabled');
                var student_id = $('.last_attended').attr('student-id');
                var formData = $('#gmatform').serialize();
                formData += '&student_id=' + student_id;
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-gmat-exam-data') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        $('.gmat').removeClass('disabled');
                        if (response.status) {
                            $('.responseMessage').html('<span class="alert alert-success">' +
                                response.success + '</span>');
                            setTimeout(() => {
                                // location.reload();
                            }, 1000);
                        }
                    },
                    error: function(response) {
                        $('.gmat').removeClass('disabled');
                    }
                });
            });
            $('.testscore').on('click', function(event) {
                $('.testscore').addClass('disabled');
                var student_id = $('.last_attended').attr('student-id');
                var formData = $('#testscore').serialize();
                formData += '&student_id=' + student_id;
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-test-score') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        $('.testscore').removeClass('disabled');
                        student_test_score();
                        $('#testscore')[0].reset();
                        if (response.status) {
                            $('.responseMessage').html('<span class="alert alert-success">' +
                                response.success + '</span>');
                            setTimeout(() => {
                                // location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr) {
                        $('.testscore').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors.exam_date){
                            $('.exam_date').html(response.errors.exam_date);
                        }else{
                            $('.exam_date').html('');
                        }
                        if(response.errors.listening_score){
                            $('.listening_score').html(response.errors.listening_score);
                        }else{
                            $('.listening_score').html('');
                        }
                        if(response.errors.speaking_score){
                            $('.speaking_score').html(response.errors.speaking_score);
                        }else{
                            $('.speaking_score').html('');
                        }
                        if(response.errors.reading_score){
                            $('.reading_score').html(response.errors.reading_score);
                        }else{
                            $('.reading_score').html('');
                        }
                        if(response.errors.type){
                            $('.type').html(response.errors.type);
                        }else{
                            $('.type').html('');
                        }
                        if(response.errors.writing_score){
                            $('.writing_score').html(response.errors.writing_score);
                        }else{
                            $('.writing_score').html('');
                        }
                    }
                });
            });
            $('.documentForm').on('click', function(event) {
                event.preventDefault();
                $('.documentForm').addClass('disabled');
                var student_id = $('.last_attended').attr('student-id');
                var formData = new FormData($('#document')[0]);
                formData.append('student_id', student_id);
                setupCSRF();
                $.ajax({
                    url: '{{ route('student/student-store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#document')[0].reset();
                        documents_list();
                        if (response.status) {
                            $('.responseMessage').html('<span class="alert alert-success">' + response.success + '</span>');
                        }
                        if(response.redirect){
                            setTimeout(() => {
                                window.location.href = "{{ route('dashboard') }}";
                            }, 2000);
                        }
                        $('.documentForm').removeClass('disabled');
                    },
                    error: function(xhr) {
                        $('.documentForm').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            function toggleDetails(inputName, inputId, detailClass) {
                $(`input[name="${inputName}"]`).on('change', function() {
                    if ($(`#${inputId}`).is(':checked')) {
                        $(`.${detailClass}`).show();
                    } else {
                        $(`.${detailClass}`).hide();
                    }
                }).trigger('change');
            }
            toggleDetails('work_experience', 'work_experience_1', 'experience_details');
            toggleDetails('result_receive', 'result_receive1', 'result_receive_details');
            toggleDetails('gmat_result_receive', 'gmat_result_receive1', 'gmat_details');
            toggleDetails('eng_prof_level_result', 'eng_prof_level_result1', 'eng_prof_level_details');
        });
    </script>
@endsection
