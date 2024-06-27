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
                                    href="#step1" id="step1-tab" @disabled(true)  data-bs-toggle="tab" role="tab" aria-controls="step1"
                                    aria-selected="true"> 1 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">General Information </span>
                            </li>
                            <li class="nav-item flex-fill education_data" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Educaton History">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step2" id="step2-tab" @disabled(true)  data-bs-toggle="tab" role="tab" aria-controls="step2"
                                    aria-selected="false"> 2 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Educaton History</span>
                            </li>
                            <li class="nav-item flex-fill experience" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Work Experience">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step3" id="step3-tab" @disabled(true)  data-bs-toggle="tab" role="tab" aria-controls="step3"
                                    aria-selected="false"> 3 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Work Experience</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Test Score">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step4" id="step4-tab"  @disabled(true)  data-bs-toggle="tab" role="tab" aria-controls="step4"
                                    aria-selected="false"> 4 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Test Score</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="BackGround Information">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step5" id="step5-tab" @disabled(true)  data-bs-toggle="tab" role="tab" aria-controls="step5"
                                    aria-selected="false"> 5 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">BackGround Information</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Document">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step6" id="step6-tab" @disabled(true)  data-bs-toggle="tab" role="tab" aria-controls="step6"
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
                                                    placeholder="Middle Name" autocomplete="first_name">
                                                <label for="lead-first_name" class="form-label">First Name</label>
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
                                                <label for="lead-last_name" class="form-label">Last Name</label>
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
                                                <label for="lead-last_name" class="form-label">Email</label>
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
                                                        FeMale</option>
                                                </select>
                                                <span class="text-danger gender"></span>
                                                <label for="lead-source" class="form-label">Gender</label>
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
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select class="form-control" name="passport_status"
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
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input  name="passport_number"
                                                    value="{{ $about_student->passport_number ?? old('passport_number') }}"
                                                    type="text" class="form-control" placeholder="Middle Name"
                                                    autocomplete="passport-number">
                                                <label for="lead-passport-number" class="form-label">Passport
                                                    Number</label>
                                                <span class="text-danger passport_number"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input name="dob" type="date" class="form-control"
                                                    value="{{ $about_student->dob ?? old('dob') }}" >
                                                <label for="lead-passport-number" class="form-label">Date of Birth</label>
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
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <select class="form-control selected-country" name="pref_countries">
                                                    <option value="">-- Select Country --</option>
                                                    @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}"  {{ (isset($education_history->country_id)) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="lead-source" class="form-label">Country</label>
                                                <span class="text-danger pref_countries"></span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <select class="form-control education_level_id" name="education_level_id"
                                                    >
                                                    <option value="">-- Education Level --</option>
                                                    @foreach ($progLabel as $item)
                                                        <option value="{{ $item->id }}" {{ (isset($education_history->education_level_id)) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="lead-source" class="form-label">Education Level</label>
                                                <span class="text-danger education_level_id_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                @php
                                                $grading_scheme = DB::table('grading_scheme')
                                                        ->where('id', $education_history->grading_scheme_id ?? null)
                                                        ->first();
                                                @endphp
                                            <select name="grading_scheme_id" id="grading_scheme_id"
                                                class="form-control grading_scheme_id grading-scheme" required>
                                                @if (!empty($education_history->grading_scheme_id))
                                                    <option value="{{ $education_history->grading_scheme_id }}" grading-data="{{$grading_scheme->name}}"
                                                        {{ ($education_history->grading_scheme_id ?? old('grading_scheme_id'))}}>
                                                        {{ $grading_scheme->name }}</option>
                                                @else
                                                  <option value="">--Grading Scheme --</option>
                                                @endif
                                            </select>
                                                 <label for="lead-source" class="form-label">Grading Scheme</label>
                                                <span class="text-danger grading_scheme_id_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <input name="grading_average" id="lead-grading_number" value="{{ $education_history->grading_average ?? null }}" type="number" class="form-control">
                                                <input type="hidden" name="tab2" value="tab2">
                                                <label for="lead-address" class="form-label">Grading Average</label>
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
                                                    <div class="last_attended" data-tour="search"
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
                                    <div class="row mb-3">
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
                                    <div class="row mb-3">
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
                                    <div class="row mb-3">
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
                                        <label><b>Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand or Australia?</b></label>
                                        <div class="col-6">
                                            <label>
                                                <input type="radio" name="ever_refused_visa" value="Yes"  {{ $about_student->ever_refused_visa === "Yes" ? 'checked' : '' }}>
                                                &nbsp; Yes &nbsp;&nbsp;&nbsp;</label><label>
                                                <input type="radio" name="ever_refused_visa" value="No" {{ $about_student->ever_refused_visa === "No" ? 'checked' : '' }}>&nbsp; No</label>
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
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input name="visa_details" value="{{ $about_student->visa_details ?? null }}"  type="text" class="form-control" >
                                            <label for="lead-address" class="form-label">Visa Details</label>
                                            <span class="text-danger visa_details"></span>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12 mb-3">
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
                                            <label for="lead-education_level_id" class="form-label">Subject</label>
                                            <span class="text-danger subject_input"></span>
                                        </div>
                                    </div>
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
                                                    <option value="10th Mark sheet and Certificate">10th Mark sheet and Certificate</option>
                                                    <option value="12th/Equivalant Mark sheet and Certficate">12th/Equivalant Mark sheet and Certficate</option>
                                                    <option value="Bachelors Individual Marksheets">Bachelors Individual Marksheets</option>
                                                    <option value="Bachelors Transcript/Consolidated Marsheet">Bachelors Transcript/Consolidated Marsheet</option>
                                                    <option value="Bachelors Degree">Bachelors Degree</option>
                                                    <option value="Two Letter Of Reccomondation">Two Letter Of Reccomondation</option>
                                                    <option value="Statement Of Purpose">Statement Of Purpose</option>
                                                    <option value="Resume/Cv">Resume/Cv</option>
                                                    <option value="Valid Passport">Valid Passport</option>
                                                    <option value="Medium Of Instruction Letter(If applicable)">Medium Of Instruction Letter(If applicable)</option>
                                                    <option value="Language Profiency Test (IELTS/TOFEL/PTE/DET/GRE/GMAT)">Language Profiency Test (IELTS/TOFEL/PTE/DET/GRE/GMAT)</option>
                                                    <option value="Work Exp Letter (If Applicable)">Work Exp Letter (If Applicable)</option>
                                                    <option value="Gap Explanation Letter (If Applicable)">Gap Explanation Letter (If Applicable)</option>
                                                    <option value="Backlog Certificate (if app;licable)">Backlog Certificate (if app;licable)</option>
                                                 </select>
                                                <label for="lead-source" class="form-label">Document Type</label>
                                                <span class="text-danger visa_document_type"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="file" multiple class="form-control " name ="document[]" id="lead-document" placeholder="Document">
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
                                                <tbody>
                                                    @foreach ($student_document as $item)
                                                        <tr>
                                                            <td>{{$item->id ?? null}}</td>
                                                            <td>{{$item->document_type ?? null}}</td>
                                                            <td><img src="{{asset($item->image_url ?? null)}}" style="width:150px;height:150px"></td>
                                                            <td>
                                                                <a
                                                                    href="{{ route('delete-student-document', $item->id) }}" class="btn btn-warning">
                                                                    Delete
                                                                </a>
                                                            </td>
                                                        </tr>
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
                                    <select class="form-control lead-education_level_id" name="education_level_id"
                                        id="lead-education_level_id" placeholder="Education Level">
                                    </select>
                                    <label for="lead-education_level_id" class="form-label">Education Level</label>
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
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="date_of_exam" type="date" value="{{ $additional_qualification->date_of_exam ?? \Carbon\Carbon::now()->toDateString() }}" class="form-control ">
                                    <label for="lead-name" class="form-label">Exam Date</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input type="hidden" name="type" value="GRE">
                                        <input name="verbal_score" type="number"  class="form-control " value="{{$additional_qualification->verbal_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="verbal_rank" type="number"  class="form-control " value="{{$additional_qualification->verbal_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_score" type="number"  class="form-control " value="{{$additional_qualification->quantitative_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_rank" type="number"  class="form-control " value="{{$additional_qualification->quantitative_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_score" type="number"  class="form-control "  value="{{$additional_qualification->writing_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_rank" type="number"  class="form-control " value="{{$additional_qualification->writing_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_score" type="number"  class="form-control " value="{{$additional_qualification->total_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_rank" type="number"  class="form-control " value="{{$additional_qualification->total_rank  ?? null}}">
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
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="date_of_exam" type="date" value="{{ $gmat->date_of_exam ?? \Carbon\Carbon::now()->toDateString() }}" class="form-control ">
                                    <label for="lead-name" class="form-label">Exam Date</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input type="hidden" name="type" value="GMAT">
                                        <input name="verbal_score" type="number"  class="form-control " value="{{$gmat->verbal_score ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="verbal_rank" type="number"  class="form-control " value="{{$gmat->verbal_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_score" type="number"  class="form-control " value="{{$gmat->quantitative_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_rank" type="number"  class="form-control " value="{{$gmat->quantitative_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_score" type="number"  class="form-control "  value="{{$gmat->writing_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_rank" type="number"  class="form-control " value="{{$gmat->writing_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_score" type="number"  class="form-control " value="{{$gmat->total_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_rank" type="number"  class="form-control " value="{{$gmat->total_rank  ?? null}}">
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
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <select class="form-control " name="type" id="lead-type" placeholder="Exam Type">
                                            <option value="">--Select--</option>
                                            @foreach ($eng_prof_level as $item)
                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="lead-name" class="form-label">Exam Type</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead-exam_date" name="exam_date" type="date" class="form-control " placeholder="Date of Exam" autocomplete="exam_date" value="">
                                        <label for="lead-name" class="form-label">Exam Date</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead-listening_score" name="listening_score" type="number" class="form-control " placeholder="Listening" autocomplete="listening_score" value="">
                                        <label for="lead-name" class="form-label">Listening</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead-writing_score" name="writing_score" type="number" class="form-control " placeholder="Writing" autocomplete="writing_score" value="">
                                        <label for="lead-name" class="form-label">Writing</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead-reading_score" name="reading_score" type="number" class="form-control " placeholder="Reading" autocomplete="reading_score" value="">
                                        <label for="lead-name" class="form-label">Reading</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead-speaking_score" name="speaking_score" type="number" class="form-control " placeholder="Speaking" autocomplete="speaking_score" value="">
                                        <label for="lead-name" class="form-label">Speaking</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead-average_score" name="average_score" type="number" class="form-control " placeholder="Average" autocomplete="average_score" value="">
                                        <label for="lead-name" class="form-label">Average</label>
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
                    url: '{{ route('fetch-documents') }}',
                    method: 'get',
                    data: {
                        program_level_id: program_level_id,
                        student_id: student_id,
                    },
                    success: function(data) {
                        $('.school-attended').empty();
                        var documents = data.documents;
                        var school_attended = data.school_attended;
                        $.each(documents, function(key, value) {
                            var isChecked = school_attended.includes(value.id) ? 'checked' : '';
                            $('.school-attended').append(`
                            <div class="form-check">
                                <input class="form-check-input already_filled_data" ${isChecked} name="education_level_id[]" type="checkbox" id="education_level_id_${value.id}" value="${value.id}">
                                <label class="form-check-label" for="education_level_id_${value.id}">${value.name}</label>
                            </div>`);
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
                                var documents = data.documents;
                                var school_attended = data.school_attended;
                            $.each(documents, function(key, value) {
                                var isChecked = school_attended.includes(value.id) ? 'checked' : '';
                                $('.school-attended').append(`
                                <div class="form-check">
                                    <input class="form-check-input already_filled_data" ${isChecked} name="education_level_id[]" type="checkbox" id="education_level_id_${value.id}" value="${value.id}">
                                    <label class="form-check-label" for="education_level_id_${value.id}">${value.name}</label>
                                </div>`);
                            });
                        }
                    });
                }
            }
            school_data();
            function checkEducationAttended(){
                school_data();
                let checkedCount = $('.school-attended input[type="checkbox"]:checked').length;
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
                        if(response.status == true){
                            $('.school').removeClass('disabled');
                        }else{
                            $('.school').addClass('disabled');
                        }
                    }
                });
            }
            $('.education_data').on('click',function(){
                school_data();
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
                        var optionsHtml = '<option value="">-- Select --</option>';
                        $.each(data.documents, function(key, value) {
                            optionsHtml += '<option value="' + value.id + '">' + value.name +
                                '</option>';
                        });
                        $('.lead-education_level_id').html(optionsHtml);
                    }
                });
            }
            $('.last_attended_school').on('click',function() {
                lead_education_level_id();
            });
            $('.selected-country, .education_level_id').change(function() {
                var country_id = $('.selected-country').val();
                var education_level_id = $('.education_level_id').val();
                fetchData(country_id, education_level_id);
            });
            function fetchData(country_id, education_level_id) {
                setupCSRF();
                $.ajax({
                    url: '{{ route('grading-scheme-list') }}',
                    method: 'Post',
                    data: {
                        country_id: country_id,
                        education_level_id: education_level_id
                    },
                    success: function(response) {
                        var optionsHtml = '<option value="">-- Select --</option>';
                        $.each(response.data, function(index, item) {
                            optionsHtml += '<option value="' + item.id + '">' + item.name +
                                '</option>';
                        });
                        $('.grading-scheme').html(optionsHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
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
            function last_attendance(){
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                $.ajax({
                    url: '{{ route('get-last-attendance') }}',
                    type: 'get',
                    data: {
                        student_id: student_id
                    },
                    success: function(response){
                        $('.last-attended-school').html('');
                        $.each(response.student_attendence, function(i, data){
                            $('.last-attended-school').append(`
                                    <tr>
                                        <td>${i+1}</td>
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
                            school_data();
                            checkEducationAttended();
                        });
                    }
                });
            }
            $(document).on('click', '.last_attended', function(){
                lead_education_level_id();
                var student_id = $(this).attr('student-id');

                setupCSRF();
                $.ajax({
                    url: '{{ url('student/get-student-attendence')}}/'+student_id,
                    type: 'GET',
                    success: function(response){
                        $('.lead-education_level_id').val(response.school_attended.education_level_id);
                        $('#institue_name').val(response.school_attended.name);
                        $('#primary_language').val(response.school_attended.primary_language);
                        $('#attended_from').val(response.school_attended.attended_from);
                        $('#attended_to').val(response.school_attended.attended_to);
                        $('#degree_awarded').val(response.school_attended.degree_awarded);
                        $('#degree_awarded_on').val(response.school_attended.degree_awarded_on);
                        $('#country_id').val(response.school_attended.country_id);
                        fetchStates(response.school_attended.country_id);
                        $('#province_id').val(response.school_attended.province_id);
                        $('#city').val(response.school_attended.city);
                        $('#address').val(response.school_attended.address);
                        $('#postal_zip').val(response.school_attended.postal_zip);
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
                            last_attendance();
                            school_data();
                            checkEducationAttended();
                        }
                    });
                }
            });
            last_attendance();
            $('.last_attendence').on('click', function(event) {
                var education_level_id =$('.lead-education_level_id').val();
                if(!education_level_id){
                    alert('Please Select Education level');
                    return false;
                }
                var spinner = this.querySelector('.spinner-grow');
                spinner.classList.remove('d-none');
                var student_id = $('.last_attended').attr('student-id');
                var formData = $('#myForm').serialize();
                formData += '&student_id=' + student_id;
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
                        last_attendance();
                        $('.last_attendence').removeClass('disabled');
                    },
                    error: function(xhr) {
                        $('.last_attendence').removeClass('disabled');
                        spinner.classList.add('d-none');
                        var response = JSON.parse(xhr.responseText);
                    }
                });
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
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
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
                        if (response.status) {
                            $('.responseMessage').html('<span class="alert alert-success">' +
                                response.success + '</span>');
                            setTimeout(() => {
                                // location.reload();
                            }, 1000);
                        }
                        $('.greExam').removeClass('disabled');
                    },
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            $('.documentForm').on('click', function(event) {
                event.preventDefault();
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
                        if (response.status) {
                            $('.responseMessage').html('<span class="alert alert-success">' + response.success + '</span>');
                            setTimeout(() => {
                                // Reload the page after 1 second
                                location.reload();
                            }, 1000);
                        }
                        $('.documentForm').removeClass('disabled');
                    },
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });

        });
    </script>
@endsection
