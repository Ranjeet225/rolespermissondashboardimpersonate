@extends('frontend.layouts.main')
@section('title', 'Blogs Details')
@section('content')

<div class="main-content">
    <div class="rs-breadcrumbs breadcrumbs-overlay">
       <div class="breadcrumbs-img">
          <img src="{{asset('frontend/pages/faq/faq_banner.jpg')}}" alt="Breadcrumbs Image">
       </div>
       <div class="breadcrumbs-text white-color">
          <h1 class="page-title">Blogs</h1>
       </div>
    </div>
 </div>
 <div class="rs-inner-blog orange-color">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 pr-50 md-pr-15">
             <div class="blog-deatails">
                <div class="blog-full">
                   <div class="bs-img">
                      <h1 style="font-size: 26px;">{{$blog->title}}</h1>
                   </div>
                   <ul class="single-post-meta">
                      <li>
                         <span class="p-date"> <i class="fa fa-calendar-check-o"></i> {{date('Y-m-d',strtotime($blog->created_at))}} </span>
                      </li>
                   </ul>
                   <div class="bs-img">
                      <img src="{{asset('imagesapi')}}/{{$blog->image}}" alt="{{$blog->title}}">
                   </div>
                   <div class="blog-desc">
                    {!! $blog->text !!}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
