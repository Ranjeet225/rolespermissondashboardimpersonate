@extends('admin.include.app')
@section('main-content')
<div class="page-header">
    <div class="row">
      <div class="card card-buttons">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <ol class="breadcrumb text-muted mb-0">
                <li class="breadcrumb-item">
                  <a href="index.php"> Home</a>
                </li>
                <li class="breadcrumb-item text-muted"> Bulk Upload </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="card card-stretch-full">
      <div class="card-body">
        <div class="card-header">
          <h5 class="card-title"> Add Lead</h5>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <div class="col-12"></div>
        <br>
        <div class="col-12">
          <form class="row g-4" action="{{route('excel-sheet-leads')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <label> &nbsp;&nbsp;Upload Excel File : <span class="text-danger">*</span>
                </label>
                <span class="text-muted">Format: .csv</span>
                <input type="file" name="file" multiple="" class="form-control" required="">
              </div>
              <div class="col-md-12">
                <br>
                <a href="{{ asset('leads.xlsx') }}" class="btn btn-success" download>Download Excel File</a>
                <button type="submit" class="mybtn px-5">Upload</button>
              </div>
            </div>
          </form>
        </div>
        <div></div>
        <br>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>

@endsection

