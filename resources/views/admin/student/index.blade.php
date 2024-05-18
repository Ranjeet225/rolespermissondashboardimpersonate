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
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{ $student_profile->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
