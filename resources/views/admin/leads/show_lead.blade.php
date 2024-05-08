@extends('admin.include.app')
@section('main-content')
<div class="page-header">
    <div class="row">
       <div class="card card-buttons">
          <div class="card-body">
             <div class="row">
                <div class="col-md-10">
                   <ol class="breadcrumb text-muted mb-0">
                      <li class="breadcrumb-item">
                         <a href="index.php"> Home</a>
                      </li>
                      <li class="breadcrumb-item text-muted">Show lead</li>
                   </ol>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div clas="row">
    <div class="col-md-12">
       <div class="card bg-white">
          <div class="card-header">
             <h5 class="card-title text-center">Lead Details</h5>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="col-md-12">
                        <h4>Name : {{$studentData->name ?? ''}}</h4>
                        <h4>Father Name : {{$studentData->father_name ?? ''}}</h4>
                        <h4>Gender : {{$studentData->gender ?? ''}}</h4>
                        <h4>Email : {{$studentData->email ?? ''}}</h4>
                        <h4>Phone Number : {{$studentData->phone_number ?? ''}}</h4>
                        <h4>Zip : {{$studentData->zip ?? ''}}</h4>
                        <h4>Caste : {{$studentData->caste_data->name ?? ''}}</h4>
                        <h4>Country : {{$studentData->country->name ?? ''}}</h4>
                        <h4>State : {{$studentData->state->name ?? ''}}</h4>
                        <h4>Subject : {{$studentData->subject->subject_name ?? ''}}</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="col-md-12">
                        <h4>Created By : {{$studentData->added_by_user->name ?? ''}}</h4>
                        <h4>Calling Date : {{$studentData->next_calling_date ?? ''}}</h4>
                        <h4>Lead Status: {{$studentData->lead_status_data->name ?? ''}}</h4>
                        <h4>Source : {{$studentData->source ?? ''}}</h4>
                        <h4>Date of Birth : {{$studentData->dob ?? ''}}</h4>
                        <h4>Working : {{$studentData->cand_working ?? ''}}</h4>
                        <h4>Status Study : {{$studentData->status_study ?? ''}}</h4>
                        <h4>Board : {{$studentData->board ?? ''}}</h4>
                        <h4>Month : {{$studentData->intake ?? ''}}</h4>
                        <h4>Year : {{$studentData->intake_year ?? ''}}</h4>
                        <h4>Assigned To : {{$studentData->assigned_to_user->email ?? ''}}</h4>
                    </div>
                </div>
            </div>
          </div>
       </div>
    </div>
 </div>
@endsection


