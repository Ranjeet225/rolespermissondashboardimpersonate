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
        min-width: 150px !important;
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
        <h4 class="card-title mb-0"> Add Program </h4>
    </div>
        <div class="card-body">
          <div class="wizard">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                <!--  <div class="col-lg-12"><select class="selectpicker" multiple data-live-search="true"><option> UNIVERSITY OF SOUTHERN CALIFORNIA</option><option> HARVARD UNIVERSITY</option><option> COLUMBIA UNIVERSITY</option><option> STANFORD UNIVERSITY</option><option> UNIVERSITY OF CALIFORNIA UCB</option><option> YALE UNIVERSITY</option></select></div> -->
                <div class="mb-4">
                  <h3> Add Program</h3>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="row g-4"  action="{{route('store-program')}}" method="POST">
                    @csrf
                    @method('post')
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="school_id" id="lead-school_id" placeholder="University / College Name">
                             <option value="">-- University / College Name --</option>
                             @foreach ($universities as $item)
                                <option value="{{$item->id}}" {{ old('school_id') == $item->id ? 'selected' : '' }}>{{$item->university_name}}</option>
                             @endforeach
                          </select>

                          <label for="lead-school_id" class="form-label">University / College Name</label>
                          @error('school_id')
                                  <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="prog_category" id="lead-prog_category" placeholder="Program Category">
                             <option value="">-- Select Program Category --</option>
                             @foreach ($program_category as $item)
                                <option value="{{$item->id}}" {{ old('prog_category') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                             @endforeach
                          </select>
                          <label for="lead-prog_category" class="form-label">Program Category</label>
                        </div>
                        @error('prog_category')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-name" name="name" type="text" class="form-control sidfrm" value="{{ old('name')}}" placeholder="Program / Courses Name" autocomplete="name" >
                            <label for="lead-name" class="form-label">Program / Courses Name</label>
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                            <input id="lead-length" name="length" type="text" class="form-control sidfrm"  value="{{ old('length')}}" placeholder="Program / Courses Duration" autocomplete="length" value="">
                            <label for="lead-length" class="form-label">Program / Courses Duration</label>
                        </div>
                        @error('length')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="programType" id="lead-programType" placeholder="Program / Courses Type">
                             <option value="">-- Select programType --</option>
                             <option value="Full Time"  {{ old('programType') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                             <option value="Part Time"  {{ old('programType') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                             <option value="Correspondence"  {{ old('programType') == 'Correspondence' ? 'selected' : '' }}>Correspondence</option>
                          </select>
                          <label for="lead-programType" class="form-label">Program / Courses Type</label>
                        </div>
                        @error('programType')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm " name="programCampus" id="lead-programCampus" placeholder="Courses Campus">
                             <option value="">-- Select programCampus --</option>
                             <option value="Online"  {{ old('programCampus') == 'Online' ? 'selected' : '' }}>Online</option>
                             <option value="Residential" {{ old('programCampus') == 'Residential' ? 'selected' : '' }}>Residential</option>
                             <option value="NonResidential"  {{ old('programCampus') == 'NonResidential' ? 'selected' : '' }}>NonResidential</option>
                          </select>
                          <label for="lead-programCampus" class="form-label">Courses Campus</label>
                          @error('programCampus')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                       </div>
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="lang_spec_for_program" id="lead-lang_spec_for_program" placeholder="Language Specification For Program / Courses">
                             <option value="">-- Select Language --</option>
                             <option value="English" {{ old('lang_spec_for_program') == 'English' ? 'selected' : '' }}>English</option>
                             <option value="Hindi" {{ old('lang_spec_for_program') == 'Hindi' ? 'selected' : '' }}>Hindi</option>
                             <option value="Other" {{ old('lang_spec_for_program') == 'Other' ? 'selected' : '' }}>Other</option>
                          </select>
                          <label for="lead-lang_spec_for_program" class="form-label">Language Specification For Program / Courses</label>
                        </div>
                        @error('lang_spec_for_program')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4 ">
                        <div class="form-floating">
                            <select class="form-control sidfrm  selectpicker" name="subject_id_input"
                                id="subject_id_input" multiple placeholder="Education Level">
                                @foreach ($all_subject as $item)
                                    {{-- @php
                                        $selected = '';
                                        if ($about_student->pref_subjects !== null && $about_student->pref_subjects !== '') {
                                            $selected = in_array($item->id, explode(',', $about_student->pref_subjects)) ? 'selected' : '';
                                        }
                                    @endphp --}}
                                    {{-- <option value="{{ $item->id }}" {{ $selected }}>{{ $item->subject_name }}</option> --}}
                                    <option value="{{ $item->id }}">{{ $item->subject_name }}</option>
                                @endforeach
                            </select>
                            <label for="lead-education_level_id" class="form-label">-- Program / Courses Subject --</label>
                        </div>
                        @error('subject_id_input')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="fieldsofstudytype" id="lead-fieldsofstudytype" placeholder="Fields Of Study Type (Degree type offered)">
                             <option value="">-- Select Fields Of Study Type --</option>
                             @foreach ($filed_of_study as $item)
                             <option value="{{$item->id}}" {{ old('fieldsofstudytype ') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                             @endforeach
                            </select>
                          <label for="lead-fieldsofstudytype" class="form-label">Fields Of Study Type (Degree type offered)</label>
                        </div>
                        @error('fieldsofstudytype')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="grading_scheme_id" id="lead-grading_scheme_id" placeholder="Grading Scheme">
                             <option>-- Education Lavel --</option>
                             <option value="1" {{ old('grading_scheme_id ') == 1 ? 'selected' : '' }}>Primary</option>
                             <option value="2" {{ old('grading_scheme_id ') == 2 ? 'selected' : '' }}>Secondary</option>
                             <option value="3" {{ old('grading_scheme_id ') == 3 ? 'selected' : '' }}>Graduate</option>
                             <option value="4" {{ old('grading_scheme_id ') == 4 ? 'selected' : '' }}>Undergraduate</option>
                          </select>
                          <label for="lead-grading_scheme_id" class="form-label">Grading Scheme</label>
                        </div>
                        @error('grading_scheme_id')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="degree_scheme_id" id="lead-degree_scheme_id" placeholder="Degree">
                             <option value="">-- Select Minimum Level of Education Required --</option>
                             @foreach ($education_level as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                             @endforeach

                          </select>
                          <label for="lead-degree_scheme_id" class="form-label">Degree</label>
                        </div>
                        @error('degree_scheme_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating ">
                            <input id="lead-total_credits" name="total_credits" type="number" class="form-control sidfrm" placeholder="Total Credits" autocomplete="total_credits" value="{{old('total_credits')}}">
                            <label for="lead-total_credits" class="form-label">Total Credits</label>
                        </div>
                        @error('total_credits')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-application_fee" name="application_fee" type="number" class="form-control sidfrm" placeholder="Application Fees in INR" autocomplete="application_fee" value="{{old('application_fee')}}">
                            <label for="lead-application_fee" class="form-label">Application Fees in INR</label>
                        </div>
                        @error('application_fee')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                            <input id="lead-application_apply_date" name="application_apply_date" type="date" class="form-control sidfrm" placeholder="Application Apply Date" autocomplete="application_apply_date" value="{{old('application_apply_date')}}">
                            <label for="lead-application_apply_date" class="form-label">Application Apply Date</label>
                        </div>
                        @error('application_apply_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-application_closing_date" name="application_closing_date" type="date" class="form-control sidfrm" placeholder="Application Closing Date" autocomplete="application_closing_date" value="{{old('application_closing_date')}}">
                            <label for="lead-application_closing_date" class="form-label">Application Closing Date</label>
                        </div>
                        @error('application_closing_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-tution_fee" name="tution_fee" type="number" class="form-control sidfrm" placeholder="Tution Fee" autocomplete="tution_fee" value="{{old('tution_fee')}}">
                            <label for="lead-tution_fee" class="form-label">Tution Fee</label>
                        </div>
                        @error('tution_fee')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="currency" id="lead-currency" placeholder="Currency">
                             <option value="EUR">-- Currency --</option>
                             @foreach ($currency as $item)
                                <option value="{{$item->id}}"  {{ old('currency') == $item->id ? 'selected' : '' }}>{{$item->currency}}</option>
                             @endforeach
                          </select>
                          <label for="lead-currency" class="form-label">Currency</label>
                        </div>
                        @error('currency')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control sidfrm" name="intake" id="lead-intake" placeholder="Intake">
                             <option value="">--Select--</option>
                             @foreach (range(1, 12) as $month)
                                <option value="{{ date('m', mktime(0, 0, 0, $month, 10)) }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                             @endforeach
                          </select>
                          <label for="lead-intake" class="form-label">Intake</label>
                        </div>
                        @error('intake')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-min_gpa" name="min_gpa" type="number" class="form-control sidfrm" placeholder="Minimum GPA" autocomplete="min_gpa" value="{{old('min_gpa')}}">
                            <label for="lead-min_gpa" class="form-label">Minimum GPA</label>
                        </div>
                        @error('min_gpa')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-tags" name="tags" type="text" class="form-control sidfrm" placeholder="Course Tags" autocomplete="tags" value="{{old('tags')}}">
                            <label for="lead-tags" class="form-label">Course Tags</label>
                        </div>
                        @error('tags')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-priority" name="priority" type="number" class="form-control sidfrm" placeholder="Priority" autocomplete="priority" value="{{old('priority')}}">
                            <label for="lead-priority" class="form-label">Priority</label>
                        </div>
                        @error('priority')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-other_requirements" name="other_requirements" type="text" class="form-control sidfrm" placeholder="Other Requirements (Eligibility Of Program / Courses)" autocomplete="other_requirements" value="">
                            <label for="lead-other_requirements" class="form-label">Other Requirements (Eligibility Of Program / Courses)</label>
                        </div>
                        @error('other_requirements')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-12">
                       <label>Description</label>
                        <textarea name="details" id="summernote1" cols="30" rows="10"></textarea>
                    </div>

                    <div class="col-12">
                        <label>Extra Notes</label>
                         <textarea name="extra_notes" id="summernote2" cols="30" rows="10"></textarea>
                         @error('notes')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <div class="col-12"><button type="submit" class="btn btn-info  py-6">Submit</button></div>
                 </form>
                <br>
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

 {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> --}}
 {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
 <script>
    $('#summernote1').summernote({
      placeholder: ' Write Here',
      tabsize: 2,
      height: 100
    });
    $('#summernote2').summernote({
      placeholder: ' Write Here',
      tabsize: 2,
      height: 100
    });
</script>
@endsection
