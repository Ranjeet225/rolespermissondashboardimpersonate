@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.php"> Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Student Assistance
                        </li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('create-student-assistance') }}" class="btn add-btn">
                        <i class="las la-plus"></i>Create Student  Assistance</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('student-assistance-filter')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input  name="title" type="text" class="form-control sidfrm" placeholder="title" >
                    <label  class="form-label">title</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('student-assistance')}}" class="btn btn-info px-5 mx-2">
                    Reset
                </a>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($student_assistance as $item)
                    <tr>
                        <td>{{ $loop->index + (($student_assistance->currentPage() - 1) * $student_assistance->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->title }}</td>
                        <td><a  href="{{route('edit-student-assistance',$item->id)}}"><i class="fa-solid fa-pen"></i></a></td>
                        <td><a href="{{route('delete-student-assistance',$item->id)}}"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$student_assistance->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
