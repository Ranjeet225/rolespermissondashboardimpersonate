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
                            Student Apply Question
                        </li>
                    </ol>
                </div>
                @can('student_apply_question.create')
                    <div class="col-md-4">
                        <a href="{{ route('create-student-question') }}" class="btn add-btn float-end">
                            <i class="las la-plus"></i>Create Student  Apply Question</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('student-question-filter')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input  name="question" type="text" class="form-control " placeholder="Question" >
                    <label  class="form-label">Question</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('student-question')}}" class="btn btn-info px-5 mx-2">
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
                        <th>Question</th>
                        @can('student_apply_question.update')
                            Edit
                        @endcan
                        @can('student_apply_question.delete')
                            Delete
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($student_question as $item)
                    <tr>
                        <td>{{ $loop->index + (($student_question->currentPage() - 1) * $student_question->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->question }}</td>
                        @can('student_apply_question.update')
                           <td><a  href="{{route('edit-student-question',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('student_apply_question.delete')
                            <td><a href="{{route('delete-student-question',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$student_question->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
