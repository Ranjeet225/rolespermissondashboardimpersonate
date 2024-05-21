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
              <li class="breadcrumb-item text-muted"> OEL Review  </li>
            </ol>
          </div>
          <div class="col-md-2">
            <a href="{{ route('add-review') }}" class="btn add-btn">
                <i class="las la-plus"></i>Add Review </a>
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
              <form action="#" method="GET">
                <div class="row">
                  <div class="col-md-3">
                    <input type="text" class="form-control formmrgin" name="application_id" value="" placeholder=" Search by School Id">
                  </div>
                  <div class="col-md-3">
                    <select name="status" class="form-control formmrgin">
                      <option value="">- Active Status-</option>
                      <option value="pending">Pending</option>
                      <option value="Active" selected="">Active</option>
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <button type="submit" class="btn btn-info d-lg-block  formmrgin" name="country_submit" value="1">Search</button>
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
                  <th>School ID </th>
                  {{-- <th> School </th> --}}
                  <th> Review Heading</th>
                  <th> Status</th>
                  <th> Details</th>
                  <th> Edit</th>
                  <th> Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reviews as $key=>$review)
                <tr>
                  <td>{{(($reviews->currentPage()-1)*$reviews->perPage())+($key+1)}}</td> {{-- new line --}}
                  <td>{{$review->school_id}}</td>
                  {{-- <td>{{$review->school}}</td> --}}
                  <td>{{$review->heading}}</td>
                  @if($review->status == 1)
                    <td><span class="badge bg-success">Active</span></td>
                  @else
                    <td><span class="badge bg-danger">Inactive</span></td>
                  @endif
                  <td>{{$review->details}}</td>
                  <td><a href="{{route('edit-review')}}/{{$review->id}}"><i class="fa-solid fa-pen"></i></a></td>
                  <td>  <a href="{{route('delete-review')}}/{{$review->id}}"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$reviews->links()}}
          </div>
        </div>

    </div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>

@endsection
