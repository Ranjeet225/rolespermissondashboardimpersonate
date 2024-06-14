@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <div class="card card-buttons">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <ol class="breadcrumb text-muted mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php"> Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted">Manage Program / Courses</li>
                        </ol>
                    </div>
                    @can('programs.create')
                    <div class="col-md-2">
                        <a href="{{ route('add-program') }}" class="btn add-btn">
                            <i class="las la-university"></i>Add Program </a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="card-group">
          <div class="card">
            <div class="card-body myform">
              <form id="program_filter" action="{{route('program-filter')}}" method="get">
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" class="form-control formmrgin" name="program_name" id="program_name" placeholder="Search By Program Name">
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control formmrgin" name="univerisity_name" id="university_name" placeholder="Search By University Name">
                  </div>
                  <div class="col-md-4">
                    <select name="approve_status" class="form-control formmrgin" id="approve">
                      <option>-Select Approval-</option>
                      <option value="approve">Approve</option>
                      <option value="unapprove">UnApprove</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 ">
                  <button type="submit" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5 mx-2" id="submit" value="1">Search</button>
                   <a href="{{route('manage-program')}}" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5 mx-2">
                       Reset
                   </a>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
      <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>ProgramName </th>
                            <th>UniversityName </th>
                            {{-- <th>MinimumLev elOfEducationRequired</th> --}}
                            <th>ProgramLevel</th>
                            <th>ApproveStatus</th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($program as $item)
                        <tr>
                            <td>{{ $loop->index + (($program->currentPage() - 1) * $program->perPage()) + 1 }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->school->university_name ?? null}}</td>
                            <td>{{$item->programLevel->name ?? null}}</td>
                            {{-- <td>
                                @if($item->grading_scheme_id == 1)
                                    Primary
                                @elseif($item->grading_scheme_id == 2)
                                    Secondary
                                @elseif($item->grading_scheme_id == 3)
                                    Graduate
                                @elseif($item->grading_scheme_id == 4)
                                    Undergraduate
                                @endif
                            </td> --}}
                            <td>
                                @if ($item->is_approved == 1)
                                   {{'Approved'}}
                                @else
                                   {{'UnApproved'}}
                                @endif
                            </td>
                            <td scope="col">
                                <a href="" class="btn btn-primary btn-sm mx-1" id="score"  program-id="{{$item->id}}" data-tour="search"
                                data-bs-toggle="offcanvas" data-bs-target="#gmat"
                                aria-controls="gmat"><i class="la la-plus"></i>Score</a>
                            </td>
                            <td scope="col">
                                <a href="" class="btn btn-primary btn-sm mx-1"
                                data-tour="search" program-id="{{$item->id}}"  id="commission" data-bs-toggle="offcanvas" data-bs-target="#testscrores"
                                aria-controls="testscrores"> <i class="la la-plus"></i>
                                Commission</a>
                            </td>
                            @can('programs.create')
                            <td><a class="btn btn-primary" href="{{route('edit-program',$item->id)}}"><i class="la la-pen">Edit</a></td>
                            @endcan
                        </tr>
                        <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="testscrores">
                            <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
                                <div class="sidebar-headersets">
                                    <h5>Commission for MBA - (INTERNATIONAL LEADERSHIP)</h5>
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
                                            <form class="row g-4" id="commission-data">
                                                <div class="col-12">
                                                   <div class="form-floating">
                                                    <input id="usr-commission" name="commission" value="{{$item->commission}}" type="number" class="form-control " placeholder="Program Commission (In Percentage)" autocomplete="commission" >
                                                    <label for="usr-commission" class="form-label">Program Commission (In Percentage)</label>
                                                    <span class="text-danger error-commission"></span>
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="form-floating">
                                                    <input id="usr-commission_for_program_payment_to_franchise" value="{{$item->commission_for_program_payment_to_franchise}}" name="commission_for_program_payment_to_franchise" type="number" class="form-control " placeholder="Commission to Franchise when student pays (In Percentage)" autocomplete="commission_for_program_payment_to_franchise" ><label for="usr-commission_for_program_payment_to_franchise" class="form-label">Commission to Franchise when student pays (In Percentage)</label>
                                                    <span class="text-danger error-commission_for_program_payment_to_franchise"></span>
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="form-floating">
                                                    <input id="usr-commission_for_added_program_payment_to_franchise"  value="{{$item->commission_for_added_program_payment_to_franchise}}" name="commission_for_added_program_payment_to_franchise" type="number" class="form-control " placeholder="Commission to Franchise for Program/University added (In Percentage)" autocomplete="commission_for_added_program_payment_to_franchise" ><label for="usr-commission_for_added_program_payment_to_franchise" class="form-label">Commission to Franchise for Program/University added (In Percentage)</label>
                                                    <span class="text-danger error-commission_for_added_program_payment_to_franchise"></span>
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="form-floating">
                                                    <input id="usr-commission_for_program_payment_to_counselor"  value="{{$item->commission_for_program_payment_to_counselor}}"  name="commission_for_program_payment_to_counselor" type="number" class="form-control " placeholder="Commission to Counselor for Program/University added (In Percentage)" autocomplete="commission_for_program_payment_to_counselor" ><label for="usr-commission_for_program_payment_to_counselor" class="form-label">Commission to Counselor for Program/University added (In Percentage)</label>
                                                    <span class="text-danger error-commission_for_program_payment_to_counselor"></span>
                                                   </div>
                                                </div>
                                             </form>
                                            <div class="col-md-12"><button type="button"
                                                class="btn btn-info  py-6 commission">Submit</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                            {{$program->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- gmat score  --}}
     <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="gmat">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Required Score for MBA - (INTERNATIONAL LEADERSHIP)</h5>
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
                        <form class="row g-4" id="score-data">
                            <div class="col-12">
                               <div class="form-floating">
                                  <select class="form-control " name="type" id="usr-fees_type" placeholder="Type" required>
                                     <option value="">--- Select Type ---</option>
                                     <option value="TOEFL">TOEFL</option>
                                     <option value="IELTS">IELTS</option>
                                     <option value="SAT">SAT</option>
                                     <option value="PTE">PTE</option>
                                  </select>
                                  <label for="usr-fees_type" class="form-label">Type</label>
                                  <span class="text-danger error-type"></span>
                               </div>
                            </div>
                            <div class="col-12">
                               <div class="form-floating">
                                <input id="usr-listening_score" name="listening_score"  max="120"  oninput="if(value > 120) this.setCustomValidity('Grading Number must be less than or equal to 120')" type="number" class="form-control " placeholder="Listening Score" autocomplete="listening_score" required>
                                <label for="usr-listening_score" class="form-label">Listening Score</label>
                                <span class="text-danger error-listening_score"></span>
                               </div>
                            </div>
                            <div class="col-12">
                               <div class="form-floating">
                                <input id="usr-writing_score" name="writing_score" type="number"  max="120"  oninput="if(value > 120) this.setCustomValidity('Grading Number must be less than or equal to 120')" class="form-control " placeholder="Writing Score" autocomplete="writing_score" required>
                                <label for="usr-writing_score" class="form-label">Writing Score</label>
                                <span class="text-danger error-writing_score"></span>
                               </div>
                            </div>
                            <div class="col-12">
                               <div class="form-floating">
                                <input id="usr-reading_score" name="reading_score"  max="120"  oninput="if(value > 120) this.setCustomValidity('Grading Number must be less than or equal to 120')" type="number" class="form-control " placeholder="Reading Score" autocomplete="reading_score" required>
                                <label for="usr-reading_score" class="form-label">Reading Score</label>
                                <span class="text-danger error-reading_score"></span>
                               </div>
                            </div>
                            <div class="col-12">
                               <div class="form-floating">
                                <input id="usr-speaking_score" name="speaking_score" type="number"  max="120"  oninput="if(value > 120) this.setCustomValidity('Grading Number must be less than or equal to 120')" class="form-control " placeholder="Speaking Score" autocomplete="speaking_score" required>
                                <label for="usr-speaking_score" class="form-label">Speaking Score</label>
                                <span class="text-danger error-speaking_score"></span>
                               </div>
                            </div>
                         </form>
                        <div class="col-md-12"><button type="button"
                            class="btn btn-info  py-6 score">Submit</button></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Listening Score</th>
                            <th>Writing Score</th>
                            <th>Reading Score</th>
                            <th>Speaking Score</th>
                        </tr>
                    </thead>
                    <tbody class="score-table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
     {{-- test Score --}}

@endsection
@section('scripts')
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
            $('.score').on('click', function(event) {
                $('.score').addClass('disabled');

                var program_id = $('#score').attr('program-id');
                var formData = $('#score-data').serialize();
                formData += '&program_id=' + program_id;
                setupCSRF();
                $.ajax({
                    url: '{{ route('req-score-prog-add') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        if (response.status) {
                            $('.responseMessage').html('<span class="alert alert-success">' +
                                response.success + '</span>');
                            setTimeout(() => {
                                // location.reload();
                            }, 1000);
                        }
                        $('.score').removeClass('disabled');
                        $('#score-data')[0].reset();
                    },
                    error: function(xhr) {
                        $('.score').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors && response.errors.type){
                            $('.error-type').html(response.errors.type);
                        }else{
                            $('.error-type').html('');
                        }
                        if(response.errors && response.errors.listening_score){
                            $('.error-listening_score').html(response.errors.listening_score);
                        }else{
                            $('.error-listening_score').html('');
                        }
                        if(response.errors && response.errors.writing_score){
                            $('.error-writing_score').html(response.errors.writing_score);
                        }else{
                            $('.error-writing_score').html('');
                        }
                        if(response.errors && response.errors.reading_score){
                            $('.error-reading_score').html(response.errors.reading_score);
                        }else{
                            $('.error-reading_score').html('');
                        }
                        if(response.errors && response.errors.reading_score){
                            $('.error-speaking_score').html(response.errors.speaking_score);
                        }else{
                            $('.error-speaking_score').html('');
                        }
                    }
                });
            });

            $('.commission').on('click', function(event) {
                event.preventDefault();
                $('.commission').addClass('disabled');
                var program_id = $('#commission').attr('program-id');
                var formData = $('#commission-data').serialize();
                formData += '&program_id=' + program_id;
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-program-commission') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        if (response.status) {
                            $('.responseMessage').html('<span class="alert alert-success">' +
                                response.success + '</span>');
                            setTimeout(() => {
                                // location.reload();
                            }, 1000);
                        }
                        $('.commission').removeClass('disabled');
                        $('#commission-data')[0].reset();
                    },
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors && response.errors.type){
                            $('.error-commission').html(response.errors.type);
                        }else{
                            $('.error-commission').html('');
                        }
                        if(response.errors && response.errors.listening_score){
                            $('.error-commission_for_program_payment_to_franchise').html(response.errors.listening_score);
                        }else{
                            $('.error-commission_for_program_payment_to_franchise').html('');
                        }
                        if(response.errors && response.errors.writing_score){
                            $('.error-commission_for_added_program_payment_to_franchise').html(response.errors.writing_score);
                        }else{
                            $('.error-commission_for_added_program_payment_to_franchise').html('');
                        }
                        if(response.errors && response.errors.reading_score){
                            $('.error-commission_for_program_payment_to_counselor').html(response.errors.reading_score);
                        }else{
                            $('.error-commission_for_program_payment_to_counselor').html('');
                        }
                    }
                });
            });
            function fetchscore(country_id) {
                $('.score-table').empty();
                var program_id = $('#score').attr('program-id');
                setupCSRF();
                $.ajax({
                    url: "{{ route('fetch-req-score-prog') }}",
                    method: 'get',
                    data: {
                        program_id: program_id
                    },
                    success: function(response) {
                        var score =response.data;
                        if ($.isEmptyObject(response)) {
                            $('.score-table').append('<option value="">No records found</option>');
                        } else {
                            $.each(score, function(key, value) {
                                $('.score-table').append('<tr><td>' +
                                    value.id + '</td><td>' +
                                    value.listening_score + '</td><td>' +
                                    value.writing_score + '</td><td>' +
                                    value.reading_score + '</td><td>' +
                                    value.speaking_score + '</td><td><a href="#" class="btn btn-sm btn-danger delete-score" data-id="'+value.id+'">Delete</a></td></tr>');
                            });
                        }
                    }
                }).then(function(){
                    $('.delete-score').on('click', function(e){
                        e.preventDefault();
                        var score_id = $(this).data('id');
                        setupCSRF();
                        $.ajax({
                            url: "{{ route('delete-score-program') }}",
                            method: 'get',
                            data: {
                                score_id: score_id
                            },
                            success: function(response){
                                alert('Score Deleted Successfully');
                                fetchscore();
                            }
                        });
                    });
                });
            }
            fetchscore();
        });
    </script>
@endsection
