<!DOCTYPE html>
<html>
<head>
    <title>Oel 360 Email</title>
<style>
        .card {
        width: 40%;
        background-color: #f5f5f5;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: auto;
        align-items: center;
        padding: auto;
    }

    /* Card image */
    .card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    /* Card content */
    .card-content {
        padding: 20px;
    }
</style>
</head>
<body>
    <div class="card">
        <div class="card-content">
            @isset($threesixteeddata['student'])
            <h3>Dear : {{$threesixteeddata['student']}}</h3>
            @endisset
            @isset($threesixteeddata['university'])
                @foreach ($threesixteeddata as $key=>$item)
                    @if(!empty($threesixteeddata['university']))
                        @if ($key === 'university')
                        <h4>University : {{$item}}</h4>
                        @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['course'])
                @foreach ($threesixteeddata as $key=>$item)
                   @if(!empty($threesixteeddata['course']))
                      @if ($key === 'course')
                        <h4>Course : {{$item}}</h4>
                        @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['application'])
                @foreach ($threesixteeddata as $key => $item)
                    @if ($key === 'application')
                        <h4>Application: {{ $item }}</h4>
                    @endif
                    @if(!empty($threesixteeddata['remarks']))
                    @if ($key === 'remarks')
                        <h4>Remarks: {{ $item }}</h4>
                    @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['joining_date'])
                @foreach ($threesixteeddata as $key => $item)
                    @if(!empty($threesixteeddata['joining_date']))
                        @if ($key === 'joining_date')
                            <h4>Joining Date: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['offer_amount']))
                        @if ($key === 'offer_amount')
                            <h4>Offer Amount: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['course_details']))
                        @if ($key === 'course_details')
                            <h4>Course Details {{ $item }}</h4>
                        @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['visa_document'])
                @foreach ($threesixteeddata as $key => $item)
                    @if(!empty($threesixteeddata['visa_document']))
                        @if ($key === 'visa_document')
                            <h4>Visa Document: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['visa_apply_date']))
                        @if ($key === 'visa_apply_date')
                            <h4>Visa Apply Date: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['visa_agent']))
                        @if ($key === 'visa_agent')
                            <h4>Visa Agent:{{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['visa_manual']))
                        @if ($key === 'visa_manual')
                            <h4>Visa Manual: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['portal_url']))
                        @if ($key === 'portal_url')
                            <h4>Portal Url: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['portal_email']))
                        @if ($key === 'portal_email')
                            <h4>Portal Email: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['portal_userid']))
                        @if ($key === 'portal_userid')
                            <h4>Portal User ID: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['portal_password']))
                        @if ($key === 'portal_password')
                            <h4>Portal Password: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['portal_question']))
                        @if ($key === 'portal_question')
                            <h4>Portal Question: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['portal_answer']))
                        @if ($key === 'portal_answer')
                            <h4>Portal Answer: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['visa_document_type']))
                        @if ($key === 'visa_document_type')
                            <h4>Visa Document Type: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['visa_application']))
                        @if ($key === 'visa_application')
                            <h4>Visa Application: {{ $item }}</h4>
                        @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['visa_no'])
                @foreach ($threesixteeddata as $key => $item)
                    @if(!empty($threesixteeddata['visa_no']))
                        @if ($key === 'visa_no')
                            <h4>Visa No: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['visa_exp_date']))
                        @if ($key === 'visa_exp_date')
                            <h4>Visa Expire Date: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['visa_application']))
                        @if ($key === 'visa_application')
                            <h4>Visa Application: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['remarks']))
                        @if ($key === 'remarks')
                            <h4>Remarks: {{ $item }}</h4>
                        @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['fee_payment_mode'])
                @foreach ($threesixteeddata as $key => $item)
                    @if(!empty($threesixteeddata['fee_payment_mode']))
                        @if ($key === 'fee_payment_mode')
                            <h4>Fee Payment Mode: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['fee_amount']))
                        @if ($key === 'fee_amount')
                            <h4>Fee Amount: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['fee_payment_by']))
                        @if ($key === 'fee_payment_by')
                            <h4>Fee Payment By: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['fee_agent']))
                        @if ($key === 'fee_agent')
                            <h4>Fee Agent: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['fee_remarks']))
                        @if ($key === 'fee_remarks')
                            <h4>Fee Remarks: {{ $item }}</h4>
                        @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['flight_name'])
                @foreach ($threesixteeddata as $key => $item)
                    @if(!empty($threesixteeddata['flight_name']))
                        @if ($key === 'flight_no')
                            <h4>Flight Numner: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['flight_name']))
                        @if ($key === 'flight_name')
                            <h4>Flight Name: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['flight_dep_date']))
                        @if ($key === 'flight_dep_date')
                            <h4>Flight Dep Date: {{ $item }}</h4>
                        @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['hostel'])
                @foreach ($threesixteeddata as $key => $item)
                    @if(!empty($threesixteeddata['hostel']))
                        @if ($key === 'hostel')
                            <h4>Hostal: {{ $item }}</h4>
                        @endif
                    @endif
                    @if(!empty($threesixteeddata['personal']))
                        @if ($key === 'personal')
                            <h4>Personal: {{ $item }}</h4>
                        @endif
                    @endif
                @endforeach
            @endisset
            @isset($threesixteeddata['hand_holding'])
            @foreach ($threesixteeddata as $key => $item)
                @if(!empty($threesixteeddata['hand_holding']))
                    @if ($key === 'hand_holding')
                        <h4>Hand Holding: {{ $item }}</h4>
                    @endif
                @endif
                @if(!empty($threesixteeddata['agent_name']))
                    @if ($key === 'agent_name')
                        <h4>Agent Name: {{ $item }}</h4>
                    @endif
                @endif
            @endforeach
        @endisset
        </div>
    </div>
</body>
</html>
