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
@endsection
