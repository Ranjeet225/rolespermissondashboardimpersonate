@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
      <div class="card-body">
        <div class="row">
          <div class="col-md-10">
            <ol class="breadcrumb text-muted mb-0">
              <li class="breadcrumb-item">
                <a href="#"> Home</a>
              </li>
              <li class="breadcrumb-item text-muted"> OEL 360 </li>
            </ol>
          </div>
          <div class="col-md-2">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                </i> Actions </button>
              <ul class="dropdown-menu morebtn2" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="la la-file-text"></i>Manage Lead </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="la la-file-text"></i>assigned Lead </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="la la-file-text"></i>Add Lead </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-striped custom-table mb-0">
          <thead>
            <tr>
              <th>S.N</th>
              <th>Pincode</th>
              <th>Name</th>
              <th>Phone</th>
              <th> Email</th>
              <th> Intake</th>
              <th> IntakeYear </th>
              <th> AllocatedFranchise </th>
              <th> Status</th>
            </tr>
          </thead>
          <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($studentData as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->zip}}</td>
                <td>
                    <a class="lead-details" href="#" data-bs-toggle="offcanvas"  lead-id="{{$item->id}}" data-bs-target="#viewlead" aria-controls="viewlead">
                    <span class="badge bg-inverse-success">
                    <i class="la la-money"></i> {{$item->name}} </span>
                    </a>
                </td>
                <td>
                    <a href="tel:{{$item->phone_number}}">
                        <span class="badge bg-inverse-success">
                            <i class="la la-phone"></i> {{$item->phone_number}}
                        </span>
                    </a>
                </td>
                <td>{{$item->email}}</td>
                <td>{{$item->intake}}</td>
                <td>{{$item->intake_year}}</td>
                <td></td>
                @php
                    $master_data = App\Models\MasterLeadStatus::where('id',$item->lead_status)->first();
                @endphp
                <td>{{$master_data->name ?? ''}}</td>
                <td>
                    <a href="{{url('admin/apply-360')}}/{{$item->id}}">
                        <span class="badge bg-inverse-success">
                        <i class="la la-money"></i> Apply for 360 </span>
                    </a>
                </td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
          </tbody>
        </table>
        <div class="row">
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="viewlead">
    <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
      <div class="sidebar-headersets">
        <h5> Lead Details </h5>
      </div>
      <div class="sidebar-headerclose">
        <a data-bs-dismiss="offcanvas" aria-label="Close">
          <img src="{{asset('assets/img/close.png')}}" alt="Close Icon">
        </a>
      </div>
    </div>
    <div class="table-responsive" style="  margin: 0px 12px;">
      <table class="table table-striped custom-table mb-0" id="lead-details-table">
      </table>
    </div>
  </div>

@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>
<script>
    $(document).ready(function(){
        function fetchStates(country_id) {
            $('.province_id').empty();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                url: "{{ route('states.get') }}",
                method: 'get',
                data: {
                    country_id: country_id
                },
                success: function(data){
                    if ($.isEmptyObject(data)) {
                        $('.province_id').append('<option value="">No records found</option>');
                    } else {
                        $.each(data, function(key, value){
                            $('.province_id').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                }
            });
        }
        fetchStates($('.country').val());
        $('.country').change(function(){
            var country_id = $(this).val();
            fetchStates(country_id);
        });
        $('.lead-details').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            var lead_id = $(this).attr('lead-id');
            $.ajax({
                url: "{{ route('lead-details') }}",
                method: 'get',
                data: {
                    lead_id: lead_id
                },
                success: function(response){
                    console.log(response);
                    var intakeDate = new Date(response.intake);
                    var monthName = intakeDate.toLocaleString('default', { month: 'long' });
                    var lead_details=
                            `<tr>
                                <th>Date :</th>
                                <td>${response.created_at}</td>
                            </tr>
                            <tr>
                                <th>socure:</th>
                                <td>${response.source}</td>
                            </tr>
                            <tr>
                                <th>course:</th>
                                <td>${response.course}</td>
                            </tr>
                            <tr>
                                <th>pincode:</th>
                                <td>${response.zip}</td>
                            </tr>
                            <tr>
                                <th>name</th>
                                <td>${response.name}</td>
                            </tr>
                            <tr>
                                <th>Father name </th>
                                <td>${response.father_name}</td>
                            </tr>
                            <tr>
                                <th>Phone no </th>
                                <td>${response.phone_number}</td>
                            </tr>
                            <tr>
                                <th>Email </th>
                                <td>${response.email}</td>
                            </tr>
                            <tr>
                                <th>caste </th>
                                <td>${response.caste_data.name}</td>
                            </tr>
                            <tr>
                                <th>Subject </th>
                                <td>${response.subject.subject_name} </td>
                            </tr>
                            <tr>
                                <th>Stream </th>
                                <td>${response.stream} </td>
                            </tr>
                            <tr>
                                <th>country </th>
                                <td>${response.country.name}</td>
                            </tr>
                            <tr>
                                <th>state </th>
                                <td>${response.state.name}</td>
                            </tr>
                            <tr>
                                <th>Preferred country </th>
                                <td>${response.preferred_country_id}</td>
                            </tr>
                            <tr>
                                <th> school </th>
                                <td>${response.school}</td>
                            </tr>
                            <tr>
                                <th>intake </th>
                                <td>${monthName}</td>
                            </tr>
                            <tr>
                                <th>intake year </th>
                                <td>${response.intake_year}</td>
                            </tr>
                            <tr>
                                <th>Allocate Franchise </th>
                                <td>static@data.com</td>
                            </tr>
                            <tr>
                                <th>Status </th>
                                <td> ${response.status} </td>
                            </tr>
                            <tr>
                                <th>Intrested in </th>
                                <td>${response.interested_in}</td>
                            </tr>
                            <tr>
                                <th>Comments </th>
                                <td>${response.student_comment}</td>
                            </tr>`;
                    $('#lead-details-table').html(lead_details);
                }
            });
        });
    });
</script>
@endsection

