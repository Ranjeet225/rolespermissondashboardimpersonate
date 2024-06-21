@extends('admin.include.app')
@section('main-content')
<div class="main-content">
    <!--card section check from here-->
    <section class="college-detail-page loaded">
       <div class="my-5 container">
          <div class="row mb-2">
             <div class="col-12">
                <div class="c-detail-right">
                   <div class="row">
                      <div class="col-md-12 my-4" id="financials">
                         <div class="r-w-s">
                            <h3 class="mb-20 c-desc-t-h-r">Applied Program List</h3>
                            <div class="row">
                               <div class="col-md-12 table-responsive">
                                  <table class="table table-hover">
                                     <thead>
                                        <tr>
                                           <th>Application Id</th>
                                           <th>University Name</th>
                                           <th>Program Name</th>
                                           <th>Payment Status</th>
                                           <th>Applied On</th>
                                           <th>Delete</th>
                                           <th></th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        @foreach ($program_applied as $item)
                                        <tr>
                                           <td><a href="">{{$item->fallowp_unique_id}}</a></td>
                                           <td><a class="text-success" href="{{url('university_details')}}/{{$item->program->university_name->id ?? null}}">{{$item->program->university_name->university_name ?? null}}</a></td>
                                           <td><a class="text-info" href="{{route('course-details')}}/{{$item->program->id ?? null}}">{{$item->program->name ?? null}}</a> </td>
                                           <td>
                                             @if((!empty($item->payments->payment_status) == 'success'))
                                                {{'Success'}}
                                            @else
                                            {{'Pending'}}
                                            @endif
                                            </td>
                                           <td>{{$item->created_at}}</td>
                                           <td><a class="btn btn-info" href="{{route('delete-program',[$item->id])}}" style="margin-top:5px;">Delete</a>
                                           </td>
                                           <td>
                                              <a class="btn btn-info" href="student_application_status/171888157666740d2888ae2" style="margin-top:5px;">Application Status</a>
                                              <a class="btn btn-info" href="{{route('apply-program-payment',[$item->user_id,$item->program_id])}}" style="margin-top:5px;">Application-Details</a>
                                           </td>
                                        </tr>
                                        @endforeach
                                     </tbody>
                                  </table>
                               </div>
                               <div class="col-md-12">
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!--nus-->
          </div>
       </div>
    </section>
 </div>
@endsection
