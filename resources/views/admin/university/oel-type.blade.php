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
              <li class="breadcrumb-item text-muted">  University Type  </li>
            </ol>
          </div>
          <div class="col-md-2">
            <a href="{{ route('add-type') }}" class="btn add-btn flaot-end">
                <i class="las la-plus"></i>Add Type </a>
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
              <form action="{{route('oel-type')}}" method="GET">
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" class="form-control formmrgin" name="name" value="" placeholder="">
                  </div>
                  {{-- <div class="col-md-4">
                    <select name="status" class="form-control formmrgin">
                      <option value="">- Active Status-</option>
                      <option value="pending">Pending</option>
                      <option value="Active" >Active</option>
                    </select>
                  </div> --}}
                  <div class="col-md-2 col-sm-2">
                    <button type="submit" class="btn btn-info d-lg-block px-5  formmrgin"  value="1">Search</button>
                  </div>
                  <div class="col-md-2 col-sm-2">
                    <a href="{{route('oel-type')}}">
                        <button type="button" class="btn btn-info d-lg-block px-5  formmrgin"  value="1">Reset</button>
                    </a>
                  </div>
                </div>
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
                  <th> Edit</th>
                  <th> Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key=>$type)
                <tr>
                  <td>{{ $loop->index + 1 + ($data->currentPage() - 1) * $data->perPage() }}</td>
                  <td>{{$type->name}}</td>
                  <td><a href="{{route('edit-type')}}/{{$type->id}}"><i class="fa-solid fa-pen"></i></a></td>
                  <td>  <a href="{{route('delete-type')}}/{{$type->id}}"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$data->links()}}
          </div>
        </div>

    </div>
@endsection
{{-- @section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>

@endsection --}}
