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
    </style>
@endsection
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Oel 360</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title=" Basic ">
                                <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1"
                                    aria-selected="true"> 1 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Basic </span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Address">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2"
                                    aria-selected="false"> 2 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Address</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Education">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3"
                                    aria-selected="false"> 3 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Education</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Offer Detail">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4"
                                    aria-selected="false"> 4 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Last Attended School</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Test Score">
                                  <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab" aria-controls="step5"
                                    aria-selected="false"> 5
                                  </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Test Score</span>
                            </li>
                            <li class="nav-item flex-fill"role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Additional Qualification">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step6" id="step6-tab" data-bs-toggle="tab" role="tab" aria-controls="step6"
                                    aria-selected="false"> 6
                                </a>
                                <br>
                                <span class="octicon octicon-light-bulb"> Additional Qualification</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Background">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step7" id="step7-tab" data-bs-toggle="tab" role="tab" aria-controls="step7"
                                    aria-selected="false"> 7 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Background</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step8" id="step8-tab" data-bs-toggle="tab" role="tab" aria-controls="step8"
                                    aria-selected="false"> 8
                                </a>
                                <br>
                                <span class="octicon octicon-light-bulb"> Document</span>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                                <div class="card table-responsive">
                                    <div>
                                       <table class="table table-modern table-hover">
                                          <tbody>
                                            <tr>
                                                <th> ID</th>
                                                <td> {{$about_student->id ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th> Name</th>
                                                <td>{{$about_student->first_name ?? null }} {{$about_student->middle_name ?? null }}  {{$about_student->last_name ?? null }} </td>
                                            </tr>
                                            <tr>
                                                <th> Email</th>
                                                <td>{{$about_student->email ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th> Phone Number</th>
                                                <td>{{$about_student->phone_number ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th> Gender</th>
                                                <td>{{$about_student->gender ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th> Maritial Status</th>
                                                <td>{{$about_student->maritial_status ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th> Passport No</th>
                                                <td>{{$about_student->passport_number ?? null }} </td>
                                            </tr>
                                            <tr>
                                                <th> DOB</th>
                                                <td> {{$about_student->dob ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th> First Language </th>
                                                <td> {{$about_student->first_language ?? null }} </td>
                                            </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                <div class="d-flex">
                                    <a class="btn btn btn-primary next ">Continue
                                        <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span></a>
                                </div>
                            </div>
                            <div class="tab-pane fade " role="tabpanel" id="step2" aria-labelledby="step2-tab">
                                <div class="card table-responsive">
                                    <div>
                                       <table class="table table-modern table-hover">
                                          <tbody>
                                            <tr>
                                                <th>Country</th>
                                                <td> {{$about_student->country->name ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>Province</th>
                                                <td>{{$about_student->province->name ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>City</th>
                                                <td>{{$about_student->city ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{$about_student->address ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>Zip</th>
                                                <td>{{$about_student->zip ?? null }}</td>
                                            </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <a class="btn btn btn-warning previous me-2 "> Back</a>
                                    <a class="btn btn btn-primary next ">Continue
                                        <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span></a>
                                </div>

                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                                <div class="card table-responsive">
                                    <table class="table table-modern table-hover">
                                        <tbody>
                                        <tr>
                                            <th>Country</th>
                                            <td> {{$education_history->country->name  ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <th>Education Level</th>
                                            <td>{{$education_history->educationLevel->name ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <th>Grading Scheme</th>
                                            <td>{{$education_history->gradingScheme->name ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <th>Grading Average</th>
                                            <td>{{$education_history->grading_average ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <th>Graduated from most recent school</th>
                                            <td>{{$education_history->graduated_recently ?? null }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 ">Previous</a>
                                    <a class="btn btn-primary next" data-bs-toggle="modal"
                                        data-bs-target="#save_modal">
                                        <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                         continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                                @foreach ($attended_school as $item)
                                <div class="card card-stretch-full">
                                    <div class="card-header">
                                       <h4>{{$item->educationLevel->name ?? null }}</h4>
                                    </div>
                                    <div class="card-body table-responsive">
                                       <table class="table table-modern table-hover">
                                          <tbody>
                                             <tr>
                                                <th>Institution Name</th>
                                                <td>{{$item->name ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Primary Language of Instruction</th>
                                                <td> {{$item->primary_language ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Attended Institution From</th>
                                                <td> {{$item->attended_from ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Attended Institution To</th>
                                                <td> {{$item->attended_to ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Degree Awarded</th>
                                                <td> {{$item->degree_awarded ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Degree Awarded On</th>
                                                <td>{{$item->degree_awarded_on ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Country</th>
                                                <td> {{$item->country->name ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Province</th>
                                                <td> {{$item->province->name ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> City/Town</th>
                                                <td>  {{$item->city ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Postal/Zip Code</th>
                                                <td>{{$item->postal_zip ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Address</th>
                                                <td>{{$item->address ?? null }}</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <a class="btn btn-warning previous me-2 ">Previous</a>
                                            <a class="btn btn-primary next " data-bs-toggle="modal"
                                                data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step5" aria-labelledby="step3-tab">
                                @foreach ($test_score as $item)
                                <div class="card card-stretch-full">
                                    <div class="card-header">
                                       <h4>{{$item->type ?? null }}</h4>
                                    </div>
                                    <div class="card-body table-responsive">
                                       <table class="table table-modern table-hover">
                                          <tbody>
                                             <tr>
                                                <th>Date of Exam</th>
                                                <td>{{$item->exam_date ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th>Listening</th>
                                                <td> {{$item->listening_score ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th>Writing</th>
                                                <td> {{$item->writing_score ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Reading</th>
                                                <td> {{$item->reading_score ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th> Speaking</th>
                                                <td> {{$item->speaking_score ?? null }}</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                @endforeach

                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2 ">Previous</a>
                                    <a class="btn btn-primary next " data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step6" aria-labelledby="step3-tab">
                                @foreach ($additional_qualification as $item)
                                 <div class="card card-stretch-full">
                                    <div class="card-header">
                                       <h4>{{$item->type ?? null }}</h4>
                                    </div>
                                    <div class="card-body table-responsive">
                                       <table class="table table-modern table-hover">
                                          <tbody>
                                             <tr>
                                                <th>Date of Exam</th>
                                                <td>{{$item->date_of_exam ?? null }}</td>
                                             </tr>
                                             <tr>
                                                <th>Verbal</th>
                                                <td>Score: {{$item->verbal_score }}<br>Rank: {{$item->verbal_rank}}</td>
                                             </tr>
                                             <tr>
                                                <th>Quantitative</th>
                                                <td>Score: {{$item->quantitative_score}}<br>Rank: {{$item->quantitative_rank}}</td>
                                             </tr>
                                             <tr>
                                                <th> Writing</th>
                                                <td>Score: {{$item->writing_score}}<br>Rank: {{$item->writing_score}}</td>
                                             </tr>
                                             <tr>
                                                <th> Total</th>
                                                <td>Score: {{$item->total_score}}<br>Rank: {{$item->total_rank}}</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                @endforeach

                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2">Previous</a>
                                    <a class="btn btn-primary next " data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span> Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step7" aria-labelledby="step3-tab">
                                <div class="card card-stretch-full">
                                   <div class="card-body table-responsive">
                                      <table class="table table-modern table-hover">
                                         <tbody>
                                            <tr>
                                               <th>Refused a visa from Canada, the USA, the United Kingdom, New Zealand or Australia</th>
                                               <td>{{$about_student->ever_refused_visa ?? null }}</td>
                                            </tr>
                                            <tr>
                                               <th>Do you have a valid Study Permit / Visa?</th>
                                               <td>{{$about_student->has_visa ?? null }}</td>
                                            </tr>
                                            <tr>
                                               <th>Visa Details</th>
                                               <td>{{$about_student->visa_details ?? null }}</td>
                                            </tr>
                                         </tbody>
                                      </table>
                                   </div>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2">Previous</a>
                                    <a class="btn btn-primary next" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade " role="tabpanel" id="step8" aria-labelledby="step3-tab">
                                <div class="row">
                                    @foreach ($student_document as $item)
                                    <div class="col-3" >
                                        <img src="{{asset($item->image_url)}}" alt="{{($item->document_type)}}" style="height:200px" class="border">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="d-flex mt-2">
                                    <a class="btn btn-warning previous me-2 ">Previous</a>
                                    <a class="btn btn-primary next " data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step9" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> Take Off</h5>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous   me-2">Previous</a>
                                    <a class="btn btn-primary next " data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step10" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> Borading</h5>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2  ">Previous</a>
                                    <a class="btn btn-primary next " data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step11" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5> 5Payment Details</h5>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn-warning previous me-2  ">Previous</a>
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
    $('.next').on('click', handleNext);
</script>
@endsection
