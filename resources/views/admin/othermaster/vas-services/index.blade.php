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
                            Manage Vas Service
                        </li>
                    </ol>
                </div>
                @can('vas_services.create')
                <div class="col-md-4">
                    <a href="{{ route('create-vas-service') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Vas Service's</a>
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
          <form id="eudcation" action="{{route('vas-service')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="title" type="text" class="form-control " placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">Title</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('vas-service')}}" class="btn btn-info px-5 mx-2">
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
                        <th>Order</th>
                        <th>Content</th>
                        @can('vas_services.update')
                        <th>Edit</th>
                        @endcan
                        @can('vas_services.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($vas_service as $item)
                    <tr>
                        <td>{{ $loop->index + (($vas_service->currentPage() - 1) * $vas_service->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->title }}</td>
                        <td class="text-wrap">{{ $item->order }}</td>
                        <td class="text-wrap">{!! $item->content !!}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                        @can('vas_services.update')
                        <td><a  href="{{route('edit-vas-service',$item->id)}}"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('vas_services.delete')
                        <td><a href="{{route('delete-vas-service',$item->id)}}"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$vas_service->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
