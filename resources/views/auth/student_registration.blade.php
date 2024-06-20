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
                <h2 class="title mb-10">Student Registration</h2>
             </div>
             <!-- Login Form -->
             <div class="styled-form">
                <form id="contact-form" method="POST" action="https://overseaseducationlane.com/register" aria-label="Register">
                   <div class="row clearfix">
                      <input type="hidden" name="_token" value="j4L3drDpDVFnhtiqiTpduovA0C7JqmingCcV2gNI">
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Name <span class="required">*</span></label>
                            <input id="name_input" type="text" name="name" value="" class="form-control " placeholder="Enter Name">
                            <span class="invalid-feedback" role="alert" id="name_error">
                            </span>
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Email address <span class="required">*</span></label>
                            <input type="email" name="email" value="" class="form-control " id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            <span id="email_error" class="invalid-feedback" role="alert">
                            </span>
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="exampleInputPhoneNumber1">Mobile No. <span class="required">*</span></label>
                            <input type="text" name="phone_number" value="" class="form-control  phone_number" id="exampleInputPhoneNumber1" placeholder="Phone Number">
                            <span id="phone_number_error" class="invalid-feedback" role="alert">
                            </span>
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Password <span class="required">*</span></label>
                            <input type="password" name="password" value="" class="form-control " placeholder="Password" id="password_box">
                            <span id="password_error" class="invalid-feedback" role="alert">
                            </span>
                         </div>
                      </div>
                      <div class="col-md-12">
                         <p class="otp_failed text-danger"></p>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group" style="display :none;" id="otpDiv">
                            <label for="VerifyOtp">Enter OTP</label>
                            <input type="text" name="otp" class="form-control " id="VerifyOtp" placeholder="OTP">
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
                         <button type="button" class="readon submit-btn" id="send_otp">Register</button>
                      </div>
                      <div class="form-group col-lg-12 col-md-12 col-sm-12">
                         <div class="users">Already have an account? <a href="https://overseaseducationlane.com/login">Login</a></div>
                         <hr>
                         <div>
                            <a href="https://overseaseducationlane.com/franchise-register" class="url_link">Register as a Franchise</a>
                         </div>
                         <div>
                            <a href="https://overseaseducationlane.com/counselor_register" class="url_link">Register as a Counselor</a>
                         </div>
                         <hr>
                         <div class="users">
                            By joining OEL, you agree to OEL's Student
                            <a href="https://overseaseducationlane.com/privacy-policy">Privacy Policy</a>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </section>
    <script type="text/javascript">
       let buttons = document.querySelectorAll(".loading_button");
       for(let i=0; i<buttons.length; i++){
           let button = buttons[i];
           button.addEventListener("click", function(){
               button.firstElementChild.style.display = "inline-block";
           });
       }
    </script>
 </div>
@endsection
