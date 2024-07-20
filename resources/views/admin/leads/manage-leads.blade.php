@extends('admin.include.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
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
                            <li class="breadcrumb-item text-muted"> Manage Leads</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="student_section">
                                <div class="col-md-12">
                                    <h3 style="margin-bottom: 20px;">Student Details</h3>
                                </div>
                                <p><label>Name</label>: {{ $studentAgentData->name  ?? null}}</p>
                                <p><label>Email</label>: {{ $studentAgentData->email ?? null }} </p>
                                <p><label>Address</label>: , {{ $studentAgentData->zip ?? null }},
                                    {{ $studentAgentData->country->name ?? null }}</p>
                                <p><label>Preferred Country</label>: {{ $studentAgentData->country->name ?? null }}</p>
                                <p><label>Interested In</label>: {{ $studentAgentData->interested_in ?? null }} </p>
                                <p><label>Phone Number</label>: {{ $studentAgentData->phone_number ?? null }}</p>

                                <p><label>Allocated Franchise</label>: not know</p>
                                <p><label>Lead Status</label>: {{ $studentAgentData->lead_status ?? null }}</p>
                                <p><label>Next Calling Date</label>: {{ $studentAgentData->next_calling_date ?? null }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <form method="post" id="add_follow_up">
                                <input type="hidden" name="student_id" id="student_id" value="{{ $student_id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 style="margin-bottom: 20px;">Add Follow Up</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Next Calling Date <span class="text-danger">*</span></label>
                                        <input type="datetime-local" min="{{ now()->toDateTimeLocalString() }}" class="form-control "
                                            name="next_calling_date" id="next_calling_date"
                                            placeholder="Next Calling Date">
                                        <span class="text-danger next_calling_date"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Lead Status<span class="text-danger">*</span></label>
                                        <select name="lead_status" id="lead_status" class="form-control ">
                                            <option value="" >--Select Lead Status--</option>
                                            @foreach ($masterLeadStatus as $data)
                                              <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger lead_status"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 vsb payment" style="display: none;">
                                    <label>Payment Type <span class="text-danger">*</span></label>
                                    <select name="paymentType" id="paymentType" class="form-control ">
                                        <option value="">Select Payment Type</option>
                                        <option value="Registeraion Fee">Registeraion Fee</option>
                                        <option value="Visa Fee">Visa Fee</option>
                                        <option value="Application Fee">Application Fee</option>
                                        <option value="Counseling Fee">Counseling Fee</option>
                                        <option value="Course Fee">Course Fee</option>
                                    </select>
                                    <span class="text-danger payment_type_error"></span>
                                    <br>
                                    <div class="paymentTypeRemarks " style="display:none;">
                                        <input type="text" name="paymentTypeRemarks" id="paymentTypeRemarks" class="form-control "
                                            placeholder="Enter Details Here">
                                        <div class="payment_type_remarks_error text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 vsb payment" style="display: none;">
                                    <label>Payment Mode<span class="text-danger">*</span></label>
                                    <select name="paymentMode" class="form-control " id="paymentMode">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Online">Online</option>
                                        <option value="Bank">Bank</option>
                                    </select>
                                    <div class="payment-mode-error text-danger"></div>
                                    <br>
                                    <div class="paymentModeRemarks" style="display:none;">
                                        <input type="text" name="paymentModeRemarks" class="form-control "
                                            placeholder="Enter Details Here" id="paymentModeRemarks">
                                        <div class="payment-mode-remarks-error text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 vsb payment" style="display: none;">
                                    <label>Amount (With gst)<span class="text-danger">*</span></label>
                                    <input type="number" name="amount" id="amount" min="0" class="form-control ">
                                    <div class="amount-error text-danger"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-sm-6">
                                        <label>Intake<span class="text-danger">*</span></label>
                                        <select class="form-control sidfrmintake " name="intake" id="intake" >
                                            <option value="">Please select Intake</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <span class="text-danger intake-error"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-sm-6">
                                        <label>Intake Year<span class="text-danger">*</span></label>
                                        <select class="form-control " name="intake_year" id="intake_year" >
                                            <option value="">Please select intake Year</option>
                                            @php
                                            $currentYear = date('Y');
                                            $startYear = $currentYear +10; // Adjust this if you want a different range
                                            @endphp
                                            @for ($year = $currentYear; $year <= $startYear; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        <span class="text-danger intake-year-error"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Comment</label>
                                        <textarea class="form-control sidfrmps ps--theme_default " name="comment" id="comment" placeholder="Comment"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row followup">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="button"  class="btn btn-info d-lg-block m-l-15 btnDiv" >Add
                                            FollowUp</button>
                                    </div>
                                </div>
                                <div class="row payment-button"  style="display: none">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="button" value=""  class="btn btn-info d-lg-block m-l-15 btnDiv " id="payment" >
                                            Payment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Date</th>
                            <th>User</th>
                            <th>Comment</th>
                            <th>Next Calling Date</th>
                            <th>Lead Status	</th>
                            <th>Payment Mode</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @php
                            $i=1;
                        @endphp
                        @foreach ($follow_up_list as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->comment}}</td>
                            <td>{{$item->next_calling_date}}</td>
                            @php
                                $leadstatus = App\Models\MasterLeadStatus::where('id',$item->status)->first();
                                $payment_status = App\Models\Payment::where('fallowp_unique_id',$item->fallowp_unique_id)->first();
                            @endphp
                            <td>{{$leadstatus->name ?? null }}</td>
                            <td>{{$item->paymentMode}}</td>
                            <td>{{$item->amount}}</td>
                            <td class="text-capitalize">{{$payment_status->payment_status ?? null}}</td>
                            <td class="text-capitalize">
                                <a href="{{route('delete-user-follow-up',$item->id)}}" class="btn btn-warning" >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        <tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{-- {{ $lead_list->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
 <script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
 <script>
    $(document).ready(function(){
        $('.btnDiv').on('click', function() {
            $('.btnDiv').addClass('disabled');
            var lead_status = null;
            var paymentType = null;
            var paymentTypeRemarks = null;
            var paymentMode = null;
            var paymentModeRemarks = null;
            var next_calling_date = $('#next_calling_date').val();
            var student_id = $('#student_id').val();
            if(!next_calling_date){
                $('.next_calling_date').html('Next Calling Date Field Required');
                $('.btnDiv').removeClass('disabled');
                return;
            }
             lead_status = $('#lead_status').val();
            if(!lead_status){
                $('.lead_status').html('Lead Status Field Required');
                $('.btnDiv').removeClass('disabled');
                return;
            }
            if ($('.payment-button').is(':visible'))
            {
                var payment_data = 'payment_form';
            }else{
                var payment_data = 'follow_up';
            }
            if ($('.payment').is(':visible')) {
                 paymentType = $('#paymentType').val();
                if(!paymentType){
                    console.log(paymentType);
                    $('.payment_type_error').html('Payment Type Field Required');
                    $('.btnDiv').removeClass('disabled');
                    return;
                }
                 paymentMode = $('#paymentMode').val();
                if(!paymentMode){
                    console.log(paymentMode);
                    $('.payment-mode-error').html('Payment mode Field Required');
                    $('.btnDiv').removeClass('disabled');
                    return;
                }
                var amount = $('#amount').val();
                if(!amount){
                    $('.amount-error').html('Amount Field Required');
                    $('.btnDiv').removeClass('disabled');
                    return;
                }
            }
            if ($('.paymentModeRemarks').is(':visible')) {
                 paymentModeRemarks = $('#paymentModeRemarks').val();
                if(!paymentModeRemarks){
                    $('.payment-mode-remarks-error').html('Payment  Mode Remarks Field Required');
                    $('.btnDiv').removeClass('disabled');
                    return;
                }
            }
            if ($('.paymentTypeRemarks').is(':visible')) {
                var paymentTypeRemarks = $('#paymentTypeRemarks').val();
                if(!paymentTypeRemarks){
                    console.log(paymentTypeRemarks);
                    $('.payment_type_remarks_error').html('Payment Type Remarks Field Required');
                    $('.btnDiv').removeClass('disabled');
                    return;
                }
            }

            var intake = $('#intake').val();
            if(!intake){
                $('.intake-error').html('Intake Field Required');
                $('.btnDiv').removeClass('disabled');
                return;
            }
            var intake_year = $('#intake_year').val();
            if(!intake_year){
                $('.intake-year-error').html('Intake Year Field Required');
                $('.btnDiv').removeClass('disabled');
                return;
            }
            var comment = $('#comment').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-user-follow-up') }}',
                type: 'post',
                data: {
                    student_id:student_id,
                    lead_status:lead_status,
                    paymentType:paymentType,
                    paymentTypeRemarks:paymentTypeRemarks,
                    paymentMode:paymentMode,
                    paymentModeRemarks:paymentModeRemarks,
                    amount:amount,
                    intake:intake,
                    intake_year:intake_year,
                    comment:comment,
                    next_calling_date:next_calling_date,
                    payment_data:payment_data,
                },
                success: function(response) {
                    $('.btnDiv').removeClass('disabled');
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                    $('.btnDiv').removeClass('disabled');
                    console.log(response);
                }
            });
        });
        $('#lead_status').on('change',function() {
            var selectedValue = $(this).val();
            if (selectedValue == 7) {
                $('.payment').show();
                $('.payment-button').show();
                $('.followup').hide();
            } else {
                $('.payment').hide();
            }
        });
        $('#paymentMode').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Cash' || selectedValue === 'Bank') {
                $('.paymentModeRemarks').show();
            } else {
                $('.paymentModeRemarks').hide();
            }
        });
        $('#paymentType').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Course Fee') {
                $('.paymentTypeRemarks').show();
            } else {
                $('.paymentTypeRemarks').hide();
            }
        });

    })
</script>
@endsection
