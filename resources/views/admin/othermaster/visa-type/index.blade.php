@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.php"> Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Manage  Visa Type
                        </li>
                    </ol>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('create-visa-type') }}" class="btn add-btn">
                        <i class="las la-plus"></i>Create New Visa</a>
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
          <form id="eudcation" action="{{route('visa-type-filter')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="name" type="text" class="form-control sidfrm" placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('visa-type')}}" class="btn btn-info px-5 mx-2">
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
                        <th> Name</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($visa_type as $item)
                    <tr>
                        <td>{{ $loop->index + (($visa_type->currentPage() - 1) * $visa_type->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td><a  href="{{route('edit-visa-type',$item->id)}}"><i class="fa-solid fa-pen"></i></a></td>
                        {{-- <td><a href="{{route('delete-province',$item->id)}}"><i class="fa-solid fa-trash"></i></a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$visa_type->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
