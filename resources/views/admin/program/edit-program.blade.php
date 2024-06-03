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
        <h4 class="card-title mb-0"> Edit Program </h4>
    </div>
        <div class="card-body">
          <div class="wizard">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                <!--  <div class="col-lg-12"><select class="selectpicker" multiple data-live-search="true"><option> UNIVERSITY OF SOUTHERN CALIFORNIA</option><option> HARVARD UNIVERSITY</option><option> COLUMBIA UNIVERSITY</option><option> STANFORD UNIVERSITY</option><option> UNIVERSITY OF CALIFORNIA UCB</option><option> YALE UNIVERSITY</option></select></div> -->
                <div class="mb-4">
                  <h3> Edit Program</h3>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row g-4"  action="{{route('update-program',$program->id)}}" method="POST">
                    @csrf
                    @method('post')
                <div class="col-4">
                    <div class="form-floating">
                        <select class="form-control " name="school_id" id="lead-school_id" placeholder="University / College Name">
                           <option value="">-- University / College Name --</option>
                           @foreach ($universities as $item)
                              <option value="{{$item->id}}" {{ $item->id == $program->school_id ? 'selected' : '' }}>{{$item->university_name}}</option>
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
                       <select class="form-control program_discipline_select" name="program_discipline" id="program-discipline" placeholder="Program Category">
                          <option value="">-- Select Program Discipline --</option>
                          @foreach ($program_discipline as $item)
                             <option value="{{$item->id}}" {{ old('program_discipline') == $item->id ? 'selected' : ($program->program_discipline == $item->id ? 'selected' : '') }}>{{$item->name}}</option>
                          @endforeach
                       </select>
                       <label for="lead-program-discipline" class="form-label">Program discipline <span class="text-danger">*</span></label>
                     </div>
                     @error('program_discipline')
                       <div class="text-danger">{{ $message }}</div>
                   @enderror
                 </div>
                 <div class="col-4">
                     <div class="form-floating">
                         <select class="form-control program_sub_discipline_select" name="program_subdiscipline" id="lead-program-sub-discipline" placeholder="Program Sub Discipline">
                             <option value="">-- Select Program Sub Discipline --</option>
                             @foreach ($program_subdiscipline as $item)
                                 <option value="{{$item->id}}" {{ old('program_subdiscipline') == $item->id ? 'selected' : ($program->program_subdiscipline == $item->id ? 'selected' : '') }}>{{$item->name}}</option>
                             @endforeach
                         </select>
                         <label for="lead-program-sub-discipline" class="form-label">Program sub discipline</label>
                     </div>
                     @error('program_subdiscipline')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                 </div>

                 <div class="col-4">
                    <div class="form-floating">
                        <input id="lead-name" name="name" type="text" class="form-control " value="{{ $program->name}}" placeholder="Program / Courses Name" autocomplete="name" >
                        <label for="lead-name" class="form-label">Program / Courses Name</label>
                    </div>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-4">
                    <div class="form-floating">
                         <input id="lead-length" name="length" type="text" class="form-control "  value="{{ $program->length }}" placeholder="Program / Courses Duration" autocomplete="length" value="">
                         <label for="lead-length" class="form-label">Program / Courses Duration</label>
                     </div>
                     @error('length')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="col-4">
                    <div class="form-floating">
                       <select class="form-control " name="programType" id="lead-programType" placeholder="Program / Courses Type">
                          <option value="">-- Select programType --</option>
                          <option value="Full Time"  {{ $program->programType == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                          <option value="Part Time"  {{ $program->programType == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                          <option value="Correspondence"  {{ $program->programType == 'Correspondence' ? 'selected' : '' }}>Correspondence</option>
                       </select>
                       <label for="lead-programType" class="form-label">Program / Courses Type</label>
                     </div>
                     @error('programType')
                      <div class="text-danger">{{ $message }}</div>
                   @enderror
                 </div>
                 <div class="col-4">
                    <div class="form-floating">
                       <select class="form-control  " name="programCampus" id="lead-programCampus" placeholder="Courses Campus">
                          <option value="">-- Select programCampus --</option>
                          <option value="Online"  {{ $program->programCampus == 'Online' ? 'selected' : '' }}>Online</option>
                          <option value="Residential" {{ $program->programCampus == 'Residential' ? 'selected' : '' }}>Residential</option>
                          <option value="NonResidential"  {{ $program->programCampus == 'NonResidential' ? 'selected' : '' }}>NonResidential</option>
                       </select>
                       <label for="lead-programCampus" class="form-label">Courses Campus</label>
                       @error('programCampus')
                       <div class="text-danger">{{ $message }}</div>
                   @enderror
                    </div>
                 </div>
                 <div class="col-4">
                    <div class="form-floating">
                       <select class="form-control " name="lang_spec_for_program" id="lead-lang_spec_for_program" placeholder="Language Specification For Program / Courses">
                          <option value="">-- Select Language --</option>
                          <option value="English" {{ $program->lang_spec_for_program == 'English' ? 'selected' : '' }}>English</option>
                          <option value="Hindi" {{ $program->lang_spec_for_program == 'Hindi' ? 'selected' : '' }}>Hindi</option>
                          <option value="Other" {{ $program->lang_spec_for_program == 'Other' ? 'selected' : '' }}>Other</option>
                       </select>
                       <label for="lead-lang_spec_for_program" class="form-label">Language Specification For Program / Courses</label>
                     </div>
                     @error('lang_spec_for_program')
                     <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>
                 {{-- <div class="col-4 ">
                    <div class="form-floating">
                        <select class="form-control   selectpicker" name="subject_id_input"
                            id="subject_id_input" multiple placeholder="Education Level">
                            @foreach ($all_subject as $item)
                                @php
                                    $selected = '';
                                    if ($program->subject_id !== null && $program->subject_id !== '') {
                                        $selected = in_array($item->id, explode(',', $program->subject_id)) ? 'selected' : '';
                                    }
                                @endphp
                                <option value="{{ $item->id }}" {{ $selected }}>{{ $item->subject_name }}</option>
                            @endforeach
                        </select>
                        <label for="lead-education_level_id" class="form-label">-- Program / Courses Subject --</label>
                    </div>
                    @error('subject_id_input')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="fieldsofstudytype" id="lead-fieldsofstudytype" placeholder="Fields Of Study Type (Degree type offered)">
                             <option value="">-- Select Fields Of Study Type --</option>
                             @foreach ($filed_of_study as $item)
                             <option value="{{$item->id}}" {{ $program->fieldsofstudytype == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
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
                          <select class="form-control " name="grading_scheme_id" id="lead-grading_scheme_id" placeholder="Grading Scheme">
                             <option value="">-- Grading Scheme --</option>
                             @foreach ($grading_scheme as $item)
                                <option value="{{$item->id}}" {{ old('grading_scheme_id') == $item->id ? 'selected' : ($program->grading_scheme_id == $item->id ? 'selected' : '') }}>{{$item->name}}</option>
                             @endforeach
                          </select>
                          <label for="lead-grading_scheme_id" class="form-label">Grading Scheme <span class="text-danger">*</span></label>
                        </div>
                        @error('grading_scheme_id')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control " name="program_level" id="lead-program-level" placeholder="Degree" onchange="showEducationLevel(this.value)">
                              <option value="">-- Program level--</option>
                              @foreach ($program_level as $item)
                                   <option value="{{$item->id}}" {{ old('program-level') == $item->id ? 'selected' : ($program->program_level == $item->id ? 'selected' : '') }}>{{$item->name}}</option>
                              @endforeach
                           </select>
                           <label for="lead-program-level" class="form-label">Program level <span class="text-danger">*</span></label>
                         </div>
                         @error('program-level')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                     </div>

                     <div class="col-4" id="education-level">
                         <div class="form-floating">
                           <select class="form-control " name="education-level" id="lead-education-level" placeholder="Education Level">
                              <option value="">-- Education Level--</option>
                              @if(isset($education_level) && !empty($education_level))
                                  @foreach ($education_level as $item)
                                       <option value="{{$item->id}}" {{ $program->education_level == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                  @endforeach
                              @endif
                           </select>
                           <label for="lead-education-level" class="form-label">Education Level <span class="text-danger">*</span></label>
                         </div>
                         @error('education-level')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                     </div>

                    {{--
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="degree_scheme_id" id="lead-degree_scheme_id" placeholder="Degree">
                             <option value="">-- Select Minimum Level of Education Required --</option>
                             @foreach ($education_level as $item)
                                  <option value="{{$item->id}}" {{ $program->degree_scheme_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                             @endforeach

                          </select>
                          <label for="lead-degree_scheme_id" class="form-label">Degree</label>
                        </div>
                        @error('degree_scheme_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div> --}}
                    <div class="col-4">
                        <div class="form-floating ">
                            <input id="lead-total_credits" name="total_credits" type="number" class="form-control " placeholder="Total Credits" autocomplete="total_credits" value="{{$program->total_credits}}">
                            <label for="lead-total_credits" class="form-label">Total Credits</label>
                        </div>
                        @error('total_credits')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-application_fee" name="application_fee" type="number" class="form-control " placeholder="Application Fees in INR" autocomplete="application_fee" value="{{$program->application_fee}}">
                            <label for="lead-application_fee" class="form-label">Application Fees in INR</label>
                        </div>
                        @error('application_fee')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                            <input id="lead-application_apply_date" name="application_apply_date" type="date" class="form-control " placeholder="Application Apply Date" autocomplete="application_apply_date" value="{{$program->application_apply_date}}">
                            <label for="lead-application_apply_date" class="form-label">Application Apply Date</label>
                        </div>
                        @error('application_apply_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-application_closing_date" name="application_closing_date" type="date" class="form-control " placeholder="Application Closing Date" autocomplete="application_closing_date" value="{{$program->application_closing_date}}">
                            <label for="lead-application_closing_date" class="form-label">Application Closing Date</label>
                        </div>
                        @error('application_closing_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-tution_fee" name="tution_fee" type="number" class="form-control " placeholder="Tution Fee" autocomplete="tution_fee" value="{{$program->tution_fee}}">
                            <label for="lead-tution_fee" class="form-label">Tution Fee</label>
                        </div>
                        @error('tution_fee')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="currency" id="lead-currency" placeholder="Currency">
                             <option value="">-- Currency --</option>
                             @foreach ($currency as $item)
                                <option value="{{$item->currency}}" {{ $program->currency_data->id == $item->id ? 'selected' : '' }}>{{$item->currency}}</option>
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
                          <select class="form-control " name="intake" id="lead-intake" placeholder="Intake">
                             <option value="">--Select--</option>
                             @foreach (range(1, 12) as $month)
                                <option value="{{ date('m', mktime(0, 0, 0, $month, 10)) }}" {{ $program->intake == date('m', mktime(0, 0, 0, $month, 10)) ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
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
                            <input id="lead-min_gpa" name="min_gpa" type="number" class="form-control " placeholder="Minimum GPA" autocomplete="min_gpa" value="{{$program->min_gpa}}">
                            <label for="lead-min_gpa" class="form-label">Minimum GPA</label>
                        </div>
                        @error('min_gpa')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-tags" name="tags" type="text" class="form-control " placeholder="Course Tags" autocomplete="tags" value="{{$program->tags}}">
                            <label for="lead-tags" class="form-label">Course Tags</label>
                        </div>
                        @error('tags')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-priority" name="priority" type="number" class="form-control " placeholder="Priority" autocomplete="priority" value="{{$program->priority}}">
                            <label for="lead-priority" class="form-label">Priority</label>
                        </div>
                        @error('priority')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-12">
                            <label>Other Requirements (Eligibility Of Program / Courses)</label>
                            <textarea name="other_requirements" id="summernote7" cols="30" rows="10">{!! $program->other_requirements !!}</textarea>
                            {{-- <label for="lead-other_requirements" class="form-label">Other Requirements (Eligibility Of Program / Courses)</label> --}}
                        @error('other_requirements')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-12">
                       <label>Description</label>
                        <textarea name="details" id="summernote1" cols="30" rows="10">{!! $program->description !!}</textarea>
                    </div>

                    <div class="col-12">
                        <label>Extra Notes</label>
                         <textarea name="extra_notes" id="summernote2" cols="30" rows="10">{!! $program->extra_notes !!}</textarea>
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
    ['#summernote1', '#summernote2', '#summernote7'].forEach(selector => {
        $(selector).summernote({
            placeholder: ' Write Here',
            tabsize: 2,
            height: 100
        });
    });
</script>
<script>
    $(document).ready(function() {
        function csrf(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        $('.program_discipline_select').on('change', function() {
            var program_discipline_id = $('#program-discipline').val();
            if (program_discipline) {
                csrf();
                $.ajax({
                    url: '/admin/get-program-sub-discipline/'+program_discipline,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var program_sub_discipline_select = $('.program_sub_discipline_select');
                        program_sub_discipline_select.empty();
                        program_sub_discipline_select.append('<option value="">-- Select Program Sub Discipline --</option>');
                        $.each(data, function(index, subdisciplineObj) {
                            program_sub_discipline_select.append('<option value="'+subdisciplineObj.id+'">'+subdisciplineObj.name+'</option>');
                        });
                    }
                });
            }
        });
        function showEducationLevel(program_level) {
            $.ajax({
                url: "{{route('get-education-level')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    programLevelId: programLevelId,
                },
                success: function(response) {
                    var educationLevel = $('#lead-education-level');
                    educationLevel.empty();
                    educationLevel.append("<option value=''>-- Education Level--</option>");
                    response.forEach(element => {
                        educationLevel.append("<option value='"+element.id+"'>"+element.name+"</option>");
                    });
                }
            });
        }
    });
 </script>
@endsection
