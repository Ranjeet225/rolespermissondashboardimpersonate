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
                                           <th> Application-Status</th>
                                           <th> Application-Details</th>
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
                                           <td><a class="btn btn-info" href="{{route('delete-program',[$item->id])}}" style="margin-top:5px;"><i class="fa-solid fa-trash"></i></a>
                                           </td>

                                           <td>
                                            <ul style="list-style-type: none;">
                                                <li >
                                                    @if(isset($applied_application[$item->program->id]))
                                                       <div class="badge bg-success">Application Status - {{$applied_application[$item->program->id]}}</div>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if(isset($visa_application))
                                                       <div class="badge bg-info mt-2">Visa Status - {{$visa_application}}</div>
                                                    @endif
                                                </li>
                                            </ul>
                                           </td>
                                           <td>
                                              <a class="btn btn-info" data-toggle="tooltip" title="Application Details" href="{{route('apply-program-payment',[App\Models\Student::where('user_id',$item->user_id)->first()->id,$item->program_id])}}" style="margin-top:5px;"><i class="fa fa-info"></i></a>
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
