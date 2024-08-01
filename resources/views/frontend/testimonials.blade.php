@extends('frontend.layouts.main')
@section('title', 'About Oel')
@section('content')
<style type="text/css">
    .course-title{
    white-space: nowrap;
    display: inline-block;
    text-overflow: ellipsis;
    width: 280px;
    overflow: hidden;
    margin-bottom: 0 !important;
    }
    #most_viewed_section .bottom-part{
    display: flex;
    flex-direction: column;
    }
</style>
<div class="main-content">
    <div class="rs-breadcrumbs breadcrumbs-overlay">
       <div class="breadcrumbs-img">
          <img src="{{asset('frontend/pages/faq/faq_banner.jpg')}}" alt="Breadcrumbs Image">
       </div>
       <div class="breadcrumbs-text white-color">
          <h1 class="page-title">We are Overseas Education Lane</h1>
          <h4 class="dn-about">Empowering people around the world to study abroad and access the best education</h4>
       </div>
    </div>
    <div id="most_viewed_section" class="rs-latest-couses  pt-80 pb-70 md-pt-70 md-pb-70">
       <div class="container">
          <div class="sec-title  mb-60 md-mb-45">
             <h2 class="title mb-17"> Testimonials</h2>
          </div>
          <div class="row">
            @forelse ($testimonials as $item)
            <div class="col-lg-6 mb-40">
               <div class="course-item">
                  <div class="course-image">
                    <a><img src="{{asset('imagesapi/' . $item->profile_picture)}}"></a></div>
                  <div class="course-info">
                     <ul class="meta-part">
                        <li class="user">{{$item->location}}</li>
                     </ul>
                     <h3 class="course-title">
                        {{$item->name}}
                     </h3>
                     <div class="meta-part">
                        @php
                        $text = strip_tags($item->testimonial_desc);
                        $words = explode(" ", $text);
                        $newwords = array_splice($words, 0, 30);
                        $trimmedText = implode(" ", $newwords) . "...";
                        @endphp
                        {{ $trimmedText }}
                     </div>
                  </div>
               </div>
            </div>
            @empty
            @endforelse
          </div>
          <div class="col-12"></div>
       </div>
    </div>
 </div>
@endsection
