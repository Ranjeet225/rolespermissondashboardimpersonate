@extends('admin.include.app')
@section('style')
    <style>
        .octicon.octicon-light-bulb {
            position: absolute;
            left: 31px;
            top: 43px;
            font-size: 12px;
            width: 99%;
            text-align: center;
        }

        .dropdown-menu {
            min-width: 150px !important;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
@endsection
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage Grading Scheme</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>
                                        Edit Grading Scheme</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row g-4" action="{{ route('update-grading-scheme',$gradingScheme->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                          <label for=""></label>
                                          <select class="form-control sidfrm" name="country_id" id="">
                                            <option value="{{$gradingScheme->country_id}}">
                                              {{$gradingScheme->country->name}}
                                            </option>
                                            @foreach ($country as $item)
                                               <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                          </select>
                                        @error('country_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for=""></label>
                                        <select class="form-control sidfrm" name="education_level_id" id="education_level_id">
                                          <option value="{{$gradingScheme->education_level_id}}">
                                            {{$gradingScheme->education_level->name}}
                                          </option>
                                          @foreach ($education_level as $item)
                                             <option value="{{$item->id}}">{{$item->name}}</option>
                                          @endforeach
                                        </select>
                                      @error('education_level_id')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                    <div class="col-12">
                                        <label>Grade Scheme Name</label>
                                        <input type="text" class="form-control sidfrm" placeholder="Grade Scheme Name" name="name" value="{{$gradingScheme->name}}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12"><button type="submit" class="btn btn-info  py-6">Submit</button>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

