@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href=""> Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Manage Slider
                        </li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('create.slider') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Slider</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="form-validation">
                <div class="row">
                    <div class="col-xl-8">
                        @php
                        $country = DB::table('country')->find($slider->country_id);
                        $state = App\Models\Province::find($slider->state_id);
                        @endphp
                         <p class="bold"><b>Country Name</b> : {{Str::ucfirst($country->name)}} </p>
                         <p class="bold"><b>State Name</b> : {{Str::ucfirst($state->name)}} </p>
                         @if (!empty($slider->title))
                           <p><b>Title</b> : {{ ucfirst($slider->title) }}</p>
                         @endif
                         @if (!empty($slider->images))
                         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($slider->images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img class="d-block w-100" src="{{ asset($image->filepath) }}" alt="Slide {{ $key + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

