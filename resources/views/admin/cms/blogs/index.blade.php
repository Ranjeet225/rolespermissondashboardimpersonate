@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('blogs')}}"> Blogs</a>
                        </li>
                    </ol>
                </div>
                @can('blogs.create')
                <div class="col-md-2">
                    <a href="{{ route('create-blogs') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Blogs</a>
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
          <form id="eudcation" action="{{route('blogs')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input  name="title" type="text" class="form-control " placeholder="title" >
                    <label  class="form-label">title</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('blogs')}}" class="btn btn-info px-5 mx-2">
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
                        <th>Image</th>
                        <th>Status</th>
                        @can('blogs.update')
                          <th>Edit</th>
                        @endcan
                        @can('blogs.delete')
                          <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($blogs as $item)
                    <tr>
                        <td>{{ $loop->index + (($blogs->currentPage() - 1) * $blogs->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->title }}</td>
                        <td><img src="{{asset('imagesapi/'.$item->image)}}" width="100" alt=""></td>
                        <td>{{ $item->status == 1 ? 'Publish' : 'UnPublish' }}</td>
                        @can('blogs.update')
                           <td><a  href="{{route('edit-blogs',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('blogs.delete')
                           <td><a href="{{route('delete-blogs',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
