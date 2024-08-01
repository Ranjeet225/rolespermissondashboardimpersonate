@extends('frontend.layouts.main')
@section('title', 'Blogs')
@section('content')
<style type="text/css">
    .contact-bg{
    background: linear-gradient(
    135deg
    , rgb(48, 131, 1) 0%, rgba(10, 95, 239, 0.9) 100%);
    padding: 30px 0;
    color: #fff !important;
    text-align: center;
    }
    .bg-facebook{
    color: #fff;
    background:#3b5998 !important;
    }
    .btn-gplus {
    color: #fff;
    background-color: #dd4b39 !important;
    }
    .bg-blue-1 {
    color: #fff;
    background-color: #5aadff;
    }
    .btn-li {
    color: #fff;
    background-color: #0082ca !important;
    }
    .btn-ins {
    color: #fff;
    background-color: #2e5e86 !important;
    }
    @media  only screen and (max-width: 760px) {
    .social_buttons a{
    margin-bottom: 7px !important;
    }
    }
    .invalid-feedback {
    display: block;
    }
</style>
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
 <div class="rs-inner-blog orange-color pt-40 pb-10 md-pt-30">
    <div class="container">
       <div class="row">
        @forelse ($blogs as $item)
        <div class="col-lg-4 col-sm-6 mt-40">
           <div class="blog-item">
              <div class="blog-img">
                 <a href="{{url('blog-details')}}/{{$item->id}}">
                  <img src="{{asset('imagesapi/')}}{{$item->image}}" alt=""></a>
              </div>
              <div class="blog-content">
                 <h3 class="blog-title">
                    <a href="{{url('blog-details')}}/{{$item->id}}">{{$item->title}}</a></h3>
                 <div class="blog-meta">
                    <ul class="btm-cate">
                       <li>
                          <div class="blog-date">
                             <i class="fa fa-calendar-check-o"></i>
                             <span>{{date('Y-m-d',strtotime($item->created_at))}}</span>
                          </div>
                       </li>
                    </ul>
                 </div>
                 <section class="loaded">
                    @php
                    $text = strip_tags($item->text);
                    $words = explode(" ", $text);
                    $newwords = array_splice($words, 0, 20);
                    $trimmedText = implode(" ", $newwords) . "...";
                    @endphp
                    {{ $trimmedText }}
                    <div class="blog-button">
                       <a class="blog-btn" href="{{url('blog-details')}}/{{$item->title}}">Continue Reading</a>
                    </div>
                 </section>
              </div>
           </div>
        </div>
        @empty
        @endforelse
       </div>
    </div>
 </div>
@endsection
