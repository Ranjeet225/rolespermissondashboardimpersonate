@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <div class="card card-buttons">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <ol class="breadcrumb text-muted mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php"> Student</a>
                            </li>
                            <li class="breadcrumb-item text-muted">Manage All Students</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-group">
            <div class="card">
                <div class="card-body myform">
                    <form action="{{ route('student-list') }}" method="GET">

                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control  formmrgin" name="name"
                                    value="{{ request()->get('name') }}" placeholder="Student Name ">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control  formmrgin" name="email"
                                    value="{{ request()->get('email') }}" placeholder="Student Email">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control  formmrgin" name="phone_number"
                                    value="{{ request()->get('phone_number') }}" placeholder="Student Phone Number">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control  formmrgin" name="zip"
                                    value="{{ request()->get('zip') }}" placeholder="Pincode">
                            </div>
                            @php
                                $countries =App\Models\Country::get();
                            @endphp
                            <div class="col-md-4">
                                <select class="form-control  country formmrgin" name="country_id" >
                                    <option value="">-- Select Country --</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request()->get('country_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" name="from_date" class="form-control  formmrgin"
                                    value="{{ request()->get('from_date') }}" placeholder="From Date">
                            </div>

                            <div class="col-md-8 col-sm-8">
                                <input type="date" name="to_date" class="form-control  formmrgin"
                                    value="{{ request()->get('to_date') }}" placeholder="to Date" value="">
                            </div>
                            <div class="col-md-2 ">
                                <a href="{{ route('student-list') }}" class="btn btn-info d-lg-block  formmrgin">Reset
                                </a>
                            </div>
                            <div class="col-md-1 ">
                                <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin px-4"
                                    name="submit">Filter </button>
                            </div>
                        </div>
                        @csrf
                    </form>
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
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Pincode</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>Login</th>
                            <th>Apply Oel 360</th>
                            <th>Payment Link</th>
                        </tr>
                    </thead>
                    <tbody id="lead-list">
                        @foreach ($student_profile as $item)
                        <tr>
                            <td>{{ $loop->index + (($student_profile->currentPage() - 1) * $student_profile->perPage()) + 1 }}</td>
                            <td>{{ $item->first_name ?? null }}</td>
                            <td>{{ $item->email ?? null }}</td>
                            <td>{{ $item->phone_number ?? null }}</td>
                            <td>{{ $item->zip ?? null }}</td>
                            <td>{{ $item->country->name ?? null }}</td>
                            <td>{{ $item->province->name ?? null }}</td>
                            @php
                                $user =\App\Models\User::where('email', $item->email)->first();
                                $users = Auth::user();
                            @endphp
                            <td class="txt-oflo">
                                @if ($user && $user->email !== null && $user->password !== null)
                                    @if ($users->hasRole('Administrator'))
                                        <a class="btn btn-primary btn-sm" href="{{ route('impersonate', $user) }}" style="margin-top: 5px;">
                                            Login To Student {{ $user->name }}
                                        </a>
                                    @endif
                                @endif
                            </td>
                            @if ($item->status_threesixty)
                            <td class="txt-oflo">
                                <a class="btn btn-primary btn-sm" href="{{ route('apply-360', $item->id) }}" style="margin-top: 5px;">
                                    Apply Oel 360
                                </a>
                            </td>
                            @else
                            <td>-</td>

                            @endif
                            @if(!empty($item->email))
                            <td scope="col">
                                <a href="" class="btn btn-primary btn-sm mx-1 payment_model" id="score"  student-id="{{$item->id}}" data-tour="search"
                                data-bs-toggle="offcanvas" data-bs-target="#gmat"
                                aria-controls="gmat"><i class="la la-plus"></i>payment</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{ $student_profile->links() }}
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
                    <h5>Payments</h5>
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
                                      <select class="form-control " name="master_service" id="usr-fees_type" placeholder="Type" required>
                                        <option value="">--Select Master Service--</option>
                                        @foreach ($master_service as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                      </select>
                                      <label for="usr-fees_type" class="form-label">Master Service</label>
                                      <span class="text-danger error-master-service"></span>
                                   </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                     <input id="usr-amount" name="amount" type="number"   class="form-control" placeholder="Number" autocomplete="amount" required>
                                     <label for="usr-amount" class="form-label">Amount</label>
                                     <span class="text-danger error-amount"></span>
                                    </div>
                                 </div>
                                <div class="col-12">
                                   <div class="form-floating">
                                    <input id="usr-listening_score" name="remarks"  type="text" class="form-control" placeholder="Remarks"  required>
                                    <input id="usr-listening_score remark_student" type="hidden" name="student_id">
                                    <label for="usr-listening_score" class="form-label">Remark</label>
                                    <span class="text-danger error-remark"></span>
                                   </div>
                                </div>

                             </form>
                            <div class="col-md-12"><button type="button"
                                class="btn btn-info  py-6 score">Payment</button></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Master Service</th>
                                <th>Amount</th>
                                <th>Remarks</th>
                                <th>Delete</th>
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
                var formData = $('#score-data').serialize();
                setupCSRF();
                $.ajax({
                    url: '{{ route('send-payment-link') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        if (response.status) {
                            fetchscore(response.student_id);
                            $('.responseMessage').html('<span class="alert alert-success">Data Inserted Successfully</span>');
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
                        if(response.errors && response.errors.master_service){
                            $('.error-master-service').html(response.errors.master_service);
                        }else{
                            $('.error-master-service').html('');
                        }
                        if(response.errors && response.errors.amount){
                            $('.error-amount').html(response.errors.amount);
                        }else{
                            $('.error-amount').html('');
                        }
                        if(response.errors && response.errors.remarks){
                            $('.error-remark').html(response.errors.remarks);
                        }else{
                            $('.error-remark').html('');
                        }
                    }
                });
            });
            $('.payment_model').on('click',function(){
                var student_id =$(this).attr('student-id');
                $('input[name="student_id"]').val(student_id);
                fetchscore(student_id);
            });
            function fetchscore(student_id) {
                $('.score-table').empty();
                setupCSRF();
                $.ajax({
                    url: "{{ route('fetch-student-payment') }}",
                    method: 'get',
                    data: {
                        student_id: student_id
                    },
                    success: function(response) {
                        var score =response.payment_data;
                        console.log(score);
                        if ($.isEmptyObject(response)) {
                            $('.score-table').append('<option value="">No records found</option>');
                        } else {
                            $.each(score, function(key, value) {
                                key++;
                                $('.score-table').append('<tr><td>' +
                                    key + '</td><td>' +
                                    (value.master_service ? value.master_service.name : '') + '</td><td>' +
                                    value.amount + '</td><td>' +
                                    value.remarks + '</td><td><a href="#" class="btn btn-sm btn-danger delete-score" data-id="'+value.id+'">Delete</a></td></tr>');
                            });
                        }
                    }
                }).then(function(){
                    $('.delete-score').on('click', function(e){
                        e.preventDefault();
                        var score_id = $(this).data('id');
                        setupCSRF();
                        $.ajax({
                            url: "{{ route('delete-payment-link') }}",
                            method: 'get',
                            data: {
                                score_id: score_id
                            },
                            success: function(response){
                                alert('Payment Deleted Successfully');
                                setTimeout(function(){
                                    location.reload();
                                }, 100);
                            }
                        });
                    });
                });
            }
        });
    </script>
@endsection
