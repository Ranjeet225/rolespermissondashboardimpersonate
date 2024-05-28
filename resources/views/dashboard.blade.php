@extends('admin.include.app')
@section('main-content')
    <div class="main-content">
        <div class="row">
            <div class="card card-buttons">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <ol class="breadcrumb text-muted mb-0">
                                <li class="breadcrumb-item">
                                    <a href="#"> Welcome</a>
                                </li>
                                <li class="breadcrumb-item text-muted">Admin Dashboard</li>
                            </ol>
                        </div>
                        <div class="col-md-3">
                            <p class="subheader_left"> Overseas Education Lane</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        @can('total_member.total_member_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Members</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_members'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{url('admin-management/users')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan
        @can('total_student.total_student_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Students</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_student'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('student-list')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan
        {{-- @can('total_school_manager.total_school_manager_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total School Manager</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_school_manager'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan --}}
        @can('total_franchise.total_franchise_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Franchise</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_frenchise'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('frenchise.index')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan
        @can('active_franchise.active_franchise_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5> Active Franchise profile</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_active_frenchise'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{url('franchise/frenchise-filter?status=Active')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan
        @can('inactive_franchise.inactive_franchise_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Inactive Franchise Profile</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_inactive_frenchise'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{url('franchise/frenchise-filter?status=InActive')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan
        @can('approve_franchise.approve_franchise_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Approve Franchise Profile</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_approve_frenchise'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{url('franchise/frenchise-filter?approvestatus=Approve')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan
        @can('unapprove_franchise.unapprove_franchise_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>UnApprove Franchise Profile</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_unapprove_frnchise'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{url('franchise/frenchise-filter?approvestatus=UnApprove')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan
        @can('total_agent.total_agent_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total  Agents</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_agent'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                             @php
                                 $user=Auth::user();
                             @endphp
                             @if($user->hasRole('Administrator'))
                                <a href="{{url('admin-management/users?roles=agent')}}">
                                    <button type="button" class="btn btn-outline-primary">Read More</button>
                                </a>
                            @else
                                <a href="{{url('admin-management/users?roles=sub_agent')}}">
                                    <button type="button" class="btn btn-outline-primary">Read More</button>
                                </a>
                            @endif
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_university.total_university_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Universities </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_university'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('manage-university')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_unapprove_universties.total_unapprove_universties_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total UnApprove Universities </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_unapprove_universties'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('unapproved-university')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_unapprove_universties.total_unapprove_universties_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Approve Universities </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_approve_universties'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('view-approved-university')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_program.total_program_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Programs</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_program'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('manage-program')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_unapprove_program.total_unapprove_program_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5> Total UnApprove Programs</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_unapprove_program'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{url('program-filter?approve_status=unapprove')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_unapprove_program.total_unapprove_program_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5> Total Approve Programs</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_approve_program'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('approve-program')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_application.total_application_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5> Applied Applications</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_application'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endcan


        @can('total_unapprove_counceler.total_unapprove_counceler_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total UnApprove Counselor</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_unapprove_counceler'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_approve_counceler.total_approve_counceler_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Approve Counselor</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_approve_counceler'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_leads.total_leads_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Leads</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_leads'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('leads-filter')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_assigned_leads.total_assigned_leads_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Allocated Leads</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_assigned_leads'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('assigned-leads')}}">
                                <button type="button" class="btn btn-outline-primary">Read More</button>
                            </a>
                            {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_non_allocated_leads.total_non_allocated_leads_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Non Allocated Leads</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_non_allocated_leads'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </div>
    </div>
@endsection
