@extends('frontend.layouts.main')
@section('title', 'frequently asked questions')
@section('content')

<div class="main-content">
    <div class="rs-breadcrumbs breadcrumbs-overlay">
       <div class="breadcrumbs-img">
          <img src="{{asset('frontend/pages/faq/faq_banner.jpg')}}" alt="Breadcrumbs Image">
       </div>
       <div class="breadcrumbs-text white-color">
          <h1 class="page-title">Frequently Asked Questions</h1>
       </div>
    </div>
    <div class="rs-faq-part orange-color pt-80 pb-30 md-pt-70 md-pb-70">
       <div class="container">
          <div class="content-part mb-50 md-mb-30">
             <div id="accordion" class="accordion">
                @forelse ($faqs as $item)
                <div class="card">
                   <div class="card-header">
                      <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{$item->id}}" aria-expanded="false">{{$item->faq_question}}</a>
                   </div>
                   <div id="collapse{{$item->id}}" class="collapse" data-parent="#accordion" style="">
                      <div class="card-body">
                        {!! $item->faq_answer !!}
                      </div>
                   </div>
                </div>
                @empty
                @endforelse
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
