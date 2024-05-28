@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('testimonial')}}"> Testimonial</a>
                        </li>
                    </ol>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('create-testimonial') }}" class="btn add-btn">
                        <i class="las la-plus"></i>Create Testimonial</a>
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
          <form id="eudcation" action="{{route('testimonial-filter')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input  name="name" type="text" class="form-control " placeholder="Name" >
                    <label  class="form-label">Name</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('testimonial')}}" class="btn btn-info px-5 mx-2">
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
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($testimonial as $item)
                    <tr>
                        <td>{{ $loop->index + (($testimonial->currentPage() - 1) * $testimonial->perPage()) + 1 }}</td>
                        <td><img src="{{asset('imagesapi/'.$item->profile_picture)}}" width="100" alt=""></td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{{ $item->designation }}</td>
                        <td class="text-wrap">{{ $item->location }}</td>
                        <td>{{ $item->status == 1 ? 'Publish' : 'UnPublish' }}</td>
                        <td><a  href="{{route('edit-testimonial',$item->id)}}"><i class="fa-solid fa-pen"></i></a></td>
                        <td><a href="{{route('delete-testimonial',$item->id)}}"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$testimonial->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
