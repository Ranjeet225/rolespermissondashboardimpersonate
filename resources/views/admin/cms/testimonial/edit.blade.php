@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage   Blogs</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>
                                        Edit   Blogs</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif  
                                @if (isset($testimonial))
                                <form class="row g-4" action="{{ route('update-testimonial',$testimonial->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4 col-sm-6">
                                       <label> Name : <span class="required_mark">*</span></label>
                                       <input type="text" class="form-control sidfrm" name="name" value="{{ old('name', $testimonial->name) }}" placeholder="Enter Name">
                                       @error('name')
                                           <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 ">
                                       <label> Designation : <span class="required_mark">*</span></label>
                                       <input type="text" class="form-control sidfrm" name="designation" value="{{ old('designation', $testimonial->designation) }}" placeholder="Enter Designation">
                                       @error('designation')
                                           <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 ">
                                       <label> Location : <span class="required_mark">*</span></label>
                                       <input type="text" class="form-control sidfrm" name="location" value="{{ old('location', $testimonial->location) }}" placeholder="Enter Location">
                                       @error('location')
                                           <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                    <!-- Details -->
                                    <div class="col-md-4 col-sm-6">
                                        <label> Upload profile Picture : <span class="required_mark">*</span></label><br>
                                        <input type="file" name="profile_picture" class="form-control sidfrm" accept="image/x-png,image/gif,image/jpeg">
                                        @error('profile_picture')
                                           <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                     <div class="col-md-4 col-sm-6">
                                        <label>Status : <span class="required_mark">*</span></label>
                                        <select class="form-control sidfrm" name="status">
                                           <option value="1" {{ old('status', $testimonial->status) == 1 ? 'selected' : '' }}>Active</option>
                                           <option value="0" {{ old('status', $testimonial->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                           <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                    <div class="col-md-12 col-sm-12">
                                       <label class="control-label">Details :<span class="required_mark">*</span></label>
                                       <textarea name="testimonial_desc"  id="summernote1" >{{ old('testimonial_desc', $testimonial->testimonial_desc) }}</textarea>
                                       @error('testimonial_desc')
                                           <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                   
                                    <div class="col-12"><button type="submit" class="btn btn-info  py-6">Submit</button>
                                    </div>
                                </form>
                                @endif
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        ['#summernote1'].forEach(function(id) {
            $(id).summernote({
                placeholder: ' Write Here',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection