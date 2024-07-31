@extends('frontend.layouts.main')
@section('title', 'About Oel')
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
          <h1 class="page-title">Contact Us</h1>
       </div>
    </div>
    <div class="contact-page-section orange-color pt-20 pb-20 md-pt-20 md-pb-20">
       <div class="container">
          <div class="row align-items-center pb-50">
             <div class="contact-address-section style2">
                <div class="row">
                   <div class="col-md-12">
                   </div>
                   <div class="col-md-4 mt-50">
                      <div class="contact-info">
                         <div class="icon-part">
                            <i class="fa fa-envelope-open-o"></i>
                         </div>
                         <div class="content-part">
                            <h6 class="info-subtitle">Please email us for your enquiry</h6>
                            <h4 class="info-title"><a href="mailto:info@overseaseducationlane.com">info@overseaseducationlane.com</a></h4>
                            <h4 class="info-title"><a href="mailto:help@overseaseducationlane.com">help@overseaseducationlane.com</a></h4>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-4 mt-50">
                      <div class="contact-info">
                         <div class="icon-part">
                            <i class="fa fa-headphones"></i>
                         </div>
                         <div class="content-part">
                            <h5 class="info-subtitle">Phone Number</h5>
                            <h4 class="info-title"><a href="tel:+(91) 892 992 2525">+(91) 892 992 2525</a></h4>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-4 mt-50">
                      <div class="contact-info">
                         <div class="icon-part">
                            <i class="fa fa-map-marker"></i>
                         </div>
                         <div class="content-part">
                            <h5 class="info-subtitle">Corporate office</h5>
                            <h6 class="info-title">A 12-13,2nd Floor, Sector 16 Noida, Uttar Pradesh, 201301</h6>
                            <br>
                            <h5 class="info-subtitle">Branch office</h5>
                            <h6 class="info-title">22/ A  Parha mohaddipur P. O  Railway colony Gorakhpur 273008</h6>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-7  mt-50 md-mb-50 sm-mb-0">
                      <div class="contact-info">
                         <h2 class="title mb-15">Quick Query</h2>
                         <form action="{{ route('contact_us.store') }}" method="POST" class="onSubmitdisableButton">
                            {{csrf_field()}}
                            <div class="row">
                                    <div class="col-lg-6 mb-15 col-md-12">
                                        <input class="from-control" type="text" id="name" name="name" required placeholder="Name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mb-15 col-md-12">
                                        <input class="from-control" type="text" id="email" name="email" required placeholder="Email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mb-15 col-md-12">
                                        <input class="from-control" type="text" id="phone" name="phone" required placeholder="Phone" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mb-15 col-md-12">
                                        <input class="from-control" type="text" id="subject" name="subject" required placeholder="Subject" value="{{ old('subject') }}">
                                        @if ($errors->has('subject'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-lg-12 mb-15">
                                        <textarea row="10" class="from-control" id="message" name="message" required placeholder=" Message" >{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 mb-15">
                                        <div class="form-group has-feedback">
                                            {!! app('captcha')->display(['data-theme' => 'light', 'data-type' =>  'audio']) !!}

                                        </div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                     <div class="form-group col-md-12 mb-0">
                                        <input class="apply-btn submitButton" type="submit" value="Submit Now">
                                    </div>
                            </div>
                        </form>
                      </div>
                   </div>
                   <div class="col-lg-5 mt-50">
                      <div class="contact-map">
                         <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d112110.81895152271!2d77.23344859115441!3d28.585881104489292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390d1fb7b5dcf419%3A0x61593bc5ea9d697!2sB-95%2C%20B%20Block%2C%20Sector%202%2C%20Noida%2C%20Uttar%20Pradesh%20201301!3m2!1d28.585884399999998!2d77.3158113!5e0!3m2!1sen!2sin!4v1706535441310!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <section class="contact-bg">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <p class="text-center lead"> If you are an existing customer, contact your account representative for assistance. For questions about student applications, please leave a message in the notes of the application and our customer experience team will respond.
                </p>
             </div>
             <div class="col-md-12">
                <p class="p-line text-center social_buttons">
                   <a type="button" class="bg-facebook color-white btn btn-fb" href="https://www.facebook.com/overseasedulane"><i class="fa fa-facebook-f pr-1"></i>Facebook</a>
                   <!--Twitter-->
                   <a type="button" class="btn btn-tw bg-blue-1 color-white" href="https://twitter.com/LaneEducation"><i class="fa fa-twitter pr-1"></i> Twitter</a>
                   <!--Linkedin-->
                   <a type="button" class="btn btn-li" href="https://www.linkedin.com/company/75765761/admin/"><i class="fa fa-linkedin-in pr-1"></i> Linkedin</a>
                   <!--Instagram-->
                   <a type="button" class="btn btn-ins" href="https://www.instagram.com/overseaseducation_lane/"><i class="fa fa-instagram pr-1"></i> Instagram</a>
                   <!--Pinterest-->
                </p>
             </div>
          </div>
       </div>
    </section>
    <script type="text/javascript">
       $(document).on('submit', '.onSubmitdisableButton', function(e) {
           if (confirm("Are You Sure ?") == true) {
               $('.submitButton').attr('disabled',true);
               return true;
           } else {
               return false;
           }
       });
    </script>
 </div>
@endsection
