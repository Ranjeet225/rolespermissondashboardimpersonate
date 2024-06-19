@extends('frontend.layouts.main')
@section('content')
<div class="row m-5">
@foreach ($program_data as $item)
    <div class="col-md-4">
        <div class="card" >
            <img class="card-img-top" src="{{asset($item->university_name->logo ?? null)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$item->name ?? null}}</h5>
                <p>Program level - {{$item->programLevel->name ?? null}}
                <br> Duration  - {{$item->length ?? null}}.
                <br> Tution Fees  - {{$item->currency}} {{$item->tution_fee ?? null}}.
                </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
