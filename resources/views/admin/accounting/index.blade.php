
@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href=""> Accounting</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>OEL Registration Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$oel_registration_fees ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>University Application Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$university_application_fees ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Course Tuition Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$course_tution_fees ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Visa Processing Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$visa_processing_fees ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Embassy Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$embassy_fees ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Accommodationn Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$accommodation_fees ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Ticket Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$ticket_fees ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>English Test/ Other Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$english_test ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
