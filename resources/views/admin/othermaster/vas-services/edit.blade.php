@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Vas Service Item</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>
                                        Edit Vas Service</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row g-4" action="{{ route('update-vas-service', $vas_service->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label>Title</label>
                                    <input type="text" class="form-control sidfrm" name="title" value="{{ $vas_service->title }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label>Icon Image</label>
                                    <input type="file" class="form-control sidfrm" name="icon_file">
                                    @error('icon_file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <img src="{{ asset('imagesapi') }}/{{ $vas_service->icon_file }}" alt="" width="100" height="100" style="margin-top: 10px;">
                                </div>
                                <div class="col-12">
                                    <label>Content</label>
                                    <textarea class="form-control sidfrm" name="content">{!! $vas_service->content !!}</textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label>Order</label>
                                    <input type="number" class="form-control sidfrm" name="order" value="{{ $vas_service->order }}">
                                    @error('order')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12"><button type="submit" class="btn btn-info  py-6">Update</button>
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