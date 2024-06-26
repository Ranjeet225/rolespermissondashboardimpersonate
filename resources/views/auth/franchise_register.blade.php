@extends('frontend.layouts.main')
@section('content')
<div class="main-content">
    <style type="text/css">
       .url_link{
       position: relative;
       color: #3a67f0;
       font-weight: 600;
       text-decoration: underline;
       }
       .form-group label{
       margin-bottom: 0 !important;
       }
       #send_otp, #register{
       height: unset !important;
       }
       .invalid-feedback{
       display: block !important;
       }
       #resendOTP{
       display: flex;
       }
       .otp_success{
       display: none;
       padding: 10px;
       background: #e0ffe7;
       border-radius: 4px;
       margin-bottom: 10px;
       }
       .otp_success p{
       font-size: 13px;
       margin-bottom: 13px;
       }
       #resend_otp{
       text-decoration: underline;
       cursor: pointer;
       color: #007bff;
       }
       .required{
       color: red;
       }
    </style>
    <section class="register-section loaded">
       <div class="container">
          <div class="register-box">
             <div class="sec-title text-center mb-30">
                <h2 class="title mb-10">Franchise Registration</h2>
             </div>
             <!-- Login Form -->
             <div class="styled-form">
                <form id="contact-form" method="POST" action="{{route('franchise-user-store')}}" aria-label="Register">
                   <div class="row clearfix">
                    @csrf
                      <!-- Name -->
                      <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label for="name_input">Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control " id="name_input" placeholder="Enter Name">
                            @error('name')
                                  <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Email address <span class="required">*</span></label>
                            <input type="email" name="email"  value="{{old('email')}}"  class="form-control " id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('email')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12" style="padding-bottom: 20px;">
                         <label for="exampleInputEmail1">Select Gender <span class="required">*</span></label><br>
                         <div style="display: flex;">
                            <div class="form-check" style="margin-right: 15px;">
                               <input class="form-check-input" type="radio" value="{{old('gender')}}"  name="gender" id="flexRadioDefault1" value="Male">
                               <label class="form-check-label" for="flexRadioDefault1">
                               Male
                               </label>
                            </div>
                            <div class="form-check">
                               <input class="form-check-input" type="radio"  value="{{old('gender')}}"  name="gender" id="flexRadioDefault2" value="Female">
                               <label class="form-check-label" for="flexRadioDefault2">
                               Female
                               </label>
                            </div>
                            @error('gender')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="phone_number_input">Mobile No. <span class="required">*</span></label>
                            <input type="text" maxlength="10" name="phone" value="{{old('phone')}}" class="form-control  phone" id="phone" placeholder="Phone Number">
                            @error('phone')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Select Country <span class="required">*</span></label>
                            @php
                                $country=App\Models\Country::select('name','id')->get();
                            @endphp
                            <select name="country_id" class="form-control country" id="country_select" style="height: 45px;">
                                <option value="">--Select Country--</option>
                                @foreach ($country as  $item)
                                <option value="{{$item->id}}" {{ old('country_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Select State <span class="required">*</span></label>
                            <select name="state_id" class="form-control province_id" id="state_id" style="height: 45px;">
                               <option value="">--Select State--</option>
                            </select>
                            @error('state_id')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>City<span class="required">*</span></label>
                            <input type="text" class="form-control" value="{{old('city')}}" placeholder="Enter City" name="city" >
                            @error('city')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="pincode_input">Business Name</label>
                            <input type="text" class="form-control" placeholder="Enter Business Name" name="business_name" value="{{old('business_name')}}">
                            @error('business_name')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="zip">Pincode <span class="required">*</span></label>
                            <input type="text" class="form-control" id="zip" placeholder="Enter Pincode" name="zip" value="{{old('zip')}}">
                            @error('zip')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="exampleInputEmail1"> Current Profession<span class="required">*</span></label>
                            <select name="profession" class="form-control" id="profession">
                                <option value="">--Select Current Profession--</option>
                                <option value="JOB" {{ old('profession') == 'JOB' ? 'selected' : '' }}>JOB</option>
                                <option value="BUSINESS" {{ old('profession') == 'BUSINESS' ? 'selected' : '' }}>BUSINESS</option>
                                <option value="FREELANCER" {{ old('profession') == 'FREELANCER' ? 'selected' : '' }}>FREELANCER</option>
                                <option value="OTHERS" {{ old('profession') == 'OTHERS' ? 'selected' : '' }}>OTHERS</option>
                            </select>
                            @error('profession')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12" style="display: none;">
                         <div class="form-group">
                            <label for="expertise_input">Expertise <span class="required">*</span></label>
                            <input type="text" name="expertise" class="form-control" id="expertise_input" value="{{old('expertise')}}" placeholder="Enter Your Specialization">
                            @error('expertise')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="address">Address 1 <span class="required">*</span></label>
                            <input  type="text" class="form-control" id="address" value="{{old('address')}}"  placeholder="Enter Address" name="address">
                            @error('address1')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="address2">Address 2</label>
                            <input value="" type="text" class="form-control " id="address2" value="{{old('address2')}}" placeholder="Enter Address" name="address2">
                            @error('address2')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control " placeholder="Password" id="password_box">
                            @error('password')
                                    <span class="text-danger invalid-feedback">{{$message}}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                           <label>Confirm Password <span class="required">*</span></label>
                           <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Confirm Password">
                           @error('password_confirmation')
                           <span class="text-danger">    {{$message}}</span>
                           @enderror
                        </div>
                     </div>
                      <div class="col-md-12">
                         <p class="otp_failed text-danger"></p>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group" style="display :none;" id="otpDiv">
                            <label for="VerifyOtp">Enter OTP</label>
                            <input type="text"  class="form-control " id="VerifyOtp" placeholder="OTP">
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="otp_success">
                            <p class="success_messages">One Time Password Sent To Your Email  &amp; Phone No.</p>
                            <p>
                               <a type="button" class="loading_button" id="resend_otp">
                               <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                               <span>Resend OTP</span>
                               </a>
                            </p>
                            <p id="resendOTPText"></p>
                         </div>
                      </div>
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                         <button type="submit" class="readon submit-btn" id="send_otp">Register</button>
                      </div>
                      <div class="form-group col-lg-12 col-md-12 col-sm-12">
                         <div class="users">Already have an account? <a href="{{route('user-login')}}">Login</a></div>
                         <hr>
                         <div>
                            <a href="{{route('franchise-register')}}" class="url_link current">Register as a Franchise</a>
                         </div>
                         {{-- <div>
                            <a href="{{route('counselor_register')}}" class="url_link">Register as a Counselor</a>
                         </div> --}}
                         <hr>
                         <div class="users">
                            By joining OEL, you agree to OEL's <a href="https://overseaseducationlane.com/privacy-policy">Privacy Policy</a>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </section>
 </div>
 <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
<script>
     $(document).ready(function() {
         function setupCSRF() {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
         }
         function fetchStates(country_id) {
             $('.province_id').empty();
             setupCSRF();
             $.ajax({
                 url: "{{ route('fetch-states.get') }}",
                 method: 'get',
                 data: {
                     country_id: country_id
                 },
                 success: function(data) {
                     if ($.isEmptyObject(data)) {
                         $('.province_id').append(
                             '<option value="">No records found</option>');
                     } else {
                         $.each(data, function(key, value) {
                             $('.province_id').append('<option value="'+ key +'">' + value +
                                 '</option>');
                         });
                     }
                 }
             });
         }
         fetchStates($('.country').val());
         $('.country').change(function() {
             var country_id = $(this).val();
             fetchStates(country_id);
            });
        });
</script>
@endsection
