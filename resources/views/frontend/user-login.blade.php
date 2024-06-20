@extends('frontend.layouts.main')
@section('content')
<div class="main-content">
    <script type="text/javascript">
       let el = document.createElement("meta");
       el.setAttribute("name", "google-signin-client_id");
       el.setAttribute("content", "4944446154-tlnh60kv8dbees511upfv4bkl4ft8pil.apps.googleusercontent.com");
       document.head.appendChild(el);
    </script>
    <script src="https://apis.google.com/js/platform.js" async="" defer="" gapi_processed="true"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
       .noticedbg.noticed.\32 nd {
            background: #f9f8f8 url('{{ asset('frontend/images/n6.png') }}') no-repeat left !important;
            background-size: cover;
        }
       #google_sign_in>div:first-child {
       width: 100% !important;
       }
       .abcRioButtonContentWrapper{
       width: 100%;
       }
       .login_label{
       font-style: normal;
       font-weight: 600;
       font-size: 20px;
       line-height: 32px;
       text-align: center;
       margin-bottom: 20px;
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
       #password_section, #otp_section{
       display: none;
       }
       .google_sign_in_custom_button{
       display: flex;
       align-items: center;
       justify-content: center;
       }
       .google_sign_in_custom_button svg{
       margin-right: 10px;
       }
       .last-password{
       padding-top: 15px;
       }
       .last-password p{
       margin-bottom: 0 !important;
       }
       .main-part{
       padding: 20px;
       margin-right:90px !important;
       }
       /*.noticedbg{background:#f9f8f8 url(/home/images/loginbg.jpg) no-repeat left !important; background-size:cover;}*/
       .noticedbg.noticed.\32 nd{
        background: #f9f8f8 url('{{ asset('frontend/images/n6.png') }}') no-repeat left !important;
        }
       .noticedbg.noticed.\33 3 {
        background: #f9f8f8 url('{{ asset('frontend/images/agnet2.png') }}') no-repeat left !important;
       }
       .noticedbg.noticed.\34 4 {
        background: #f9f8f8 url('{{ asset('frontend/images/cn2.png') }}') no-repeat left !important;
       }
       .loginform{background:#fff; padding:30px; border:1px solid #cccccc; border-radius:10px;}
       @media  only screen and (max-width: 760px) {
       #otpDiv .radio label{
       text-align: left !important;
       }
       .main-part{
       padding: 0px;
       margin-right:0px!important;
       }
       h2{font-size:27px !important;}
       .loginform{background:#fff; padding:10px; border:1px solid #cccccc; border-radius:10px;}
       }
       .btn-become{
       background: #3567f1;
       border-radius: 5px;
       text-align: center;
       color: #fff;
       display: block;
       float: right;
       padding: 2px 8px;
       max-width: 100%;
       float: none;
       }
       /*
       CSS for the main interaction
       */
       .tabset > input[type="radio"] {
       position: absolute;
       left: -200vw;
       }
       .tabset .tab-panel {
       display: none;
       }
       .tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
       .tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
       .tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
       .tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
       .tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
       .tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
       display: block;
       }
       /*
       Styling
       */
       .tabset > label {
       position: relative;
       display: inline-block;
       padding: 15px 15px 25px;
       border: 1px solid transparent;
       border-bottom: 0;
       cursor: pointer;
       font-weight: 600;
       color: #4c5669 !important;
       }
       .tabset > label::after {
       content: "";
       position: absolute;
       left: 15px;
       bottom: 10px;
       width: 69px;
       height: 4px;
       background: #8d8d8d;
       }
       .tabset > label:hover,
       .tabset > input:focus + label {
       color: #06c;
       }
       .tabset > label:hover::after,
       .tabset > input:focus + label::after,
       .tabset > input:checked + label::after {
       background: #06c;
       }
       .tabset > input:checked + label {
       /*border-color: #ccc;*/
       /*border-bottom: 1px solid #fff;*/
       margin-bottom: -1px;
       }
       .tab-panel {
       /*padding: 30px 0;*/
       border-top: 1px solid #ccc;
       }
       /*
       Demo purposes only
       */
       *,
       *:before,
       *:after {
       box-sizing: border-box;
       }
       .tabset {
       max-width: 100%;
       text-align: center;
       background: #f9f8f8;
       /*border-top: 1px solid #ccc;*/
       margin-top: 15px;
       }
       .lb{
       margin-bottom: 0px;
       }
       .lb {
       border-radius: 20px 1px 38px 23px;
       background: #f4f4f4;
       /*border: 1px solid #ccc !important;*/
       margin: 10px 35px;
       margin-bottom: 10px !important;
       }
       .tabset > label:hover, .tabset > input:focus + label {
       color: #0066cc !important;
       }
       /*
       .rs-login, .register-section { background:url(/home/images/banner_01.jpg); background-repeat: no-repeat;
       background-position: center; background-size: cover; position: relative; z-index:1;}
       */
       @media  only screen and  (max-width: 600px) {
       .lb2 {
       height:24px !important;
       }
       }
       @media  only screen and  (max-width: 600px) {
       .noticedbg {
       background:none !important;
       }
       .noticedbg.noticed.\32 nd{
       background:none !important;
       }
       .noticedbg.noticed.\34 4{
       background:none !important;
       }
       .noticedbg.noticed.\33 3{
       background:none !important;
       }
       }
    </style>
    <div class="tabset ">
       <!-- Tab 1 -->
       <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked="">
       <label for="tab1" class="lb ">
       <img src="https://overseaseducationlane.com/public/images/student.png" style="height:50px" class="lb2">
       <span class="studentspan ">Student Login </span>
       </label>
       <!-- Tab 2 -->
       <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
       <label for="tab2" class="lb ">
       <img src=" https://overseaseducationlane.com/public/images/fr.png " class="lb2" style="height:50px">
       Franchise/Agent Login
       </label>
       <!-- Tab 4 -->
       <input type="radio" name="tabset" id="tab4" aria-controls="coun">
       <label for="tab4" class="lb">
       <img src="https://overseaseducationlane.com/public/images/coun.png" class="lb2" style="height:50px">
       Counselor Login
       </label>
       <div class="tab-panels">
          <section id="marzen" class="tab-panel loaded">
             <div class="rs-login">
                <div class="container">
                   <div class="noticedbg noticed 2nd">
                      <div class="main-part">
                         <div class="loginform">
                            <h2>Student Login</h2>
                            <hr>
                            <form method="POST" action="{{route('login')}}" aria-label="Login">
                                @csrf
                               <div class="form-group">
                                  <input id="email" type="email" placeholder="Enter Email Address" class="form-control " name="email" value="" required="" autofocus="">
                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                               </div>
                               <p class="otp_failed text-danger" style="display: none; margin-bottom: 0;"></p>
                               <div id="otpDiv" class="otpDiv" style="display: none;">
                                  <div class="form-group">
                                     <div style="display: flex; justify-content: center; align-items: center;">
                                        <div class="radio" style="margin-right: 20px;">
                                           <label><input onchange="toggleLoginType('password')" type="radio" checked="" name="login_type" value="password">
                                           Login with Password
                                           </label>
                                        </div>
                                     </div>
                                  </div>
                                  <div id="password_section" style="display: block;">
                                     <div class="form-group">
                                        <label for="exampleInputPassword1">Enter Password</label>
                                        <input type="password" name="password" class="form-control " id="password_input" placeholder="Password">
                                        <div class="pt-10 pb-10">
                                           <a href="{{route('password.request')}}">Forgot your password?</a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <button type="button" class="readon submit-btn login_next_button" id="login_next_button">
                               <span>Log In</span>
                               </button>
                               <div class="last-password">
                                  <p>Not registered? <a href="https://overseaseducationlane.com/register">Create an account</a></p>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <br>
             <div class="rs-about style9 pt-50 pb-100 md-pb-70">
                <div class="container">
                   <div class="row">
                      <div class="offset-lg-3">
                      </div>
                      <div class="col-lg-9">
                         <div class="content-part">
                            <div class="about-img md-mb-50">
                               <div class="media-icon orange-color">
                                  <img src="https://overseaseducationlane.com/public/home/images/admission.jpg" alt="">
                               </div>
                            </div>
                            <div class="sec-title3 pl-65 md-pl-15 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                               <div class="sec-title ">
                                  <h2 class="title"> Students</h2>
                               </div>
                               <div>
                                  <p style="text-align:left;">Our mission is to promote higher education at the international level and to provide quality counselling services to students wishing to enrol abroad. We opened our doors more than 10 years ago and have consistently provided the support and quality advisory services we need to study abroad. OEL simplifies student and individual study abroad searches. We support admission procedures by combining international students, recruitment partners, and academic institutions into one platform. We plan to become the world's largest online platform for international student registration and educational support for students on their educational journey. </p>
                                  <p style="text-align:left;">The educational program offered by OEL is structured and planned to enable full compatibility of work, personal life, and research. Depending on the needs of continuing education, students can choose from a certificate course, a diploma course, a specialized course, a PG diploma course, or a master's course.</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div id="most_viewed_section" class="rs-latest-couses gray-bg2 pt-80 pb-70 md-pt-70 md-pb-70">
                   <div class="container">
                      <div class="sec-title text-center mb-60 md-mb-45">
                         <h2 class="title mb-0">Student Benefits</h2>
                      </div>
                      <div class="row">
                         <div class="col-lg-12 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/brand.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title" style="float:left;"> COUNCELLING </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p style="text-align:left;">An overseas education adviser is essential in supporting and assisting students in the simple or hassle-free application or paperwork processing. OEL is approved by several government regulatory agencies across the country. A consultant's responsibility is to work with the student and the university to gain admission. The specialist will provide all relevant information and assistance regarding Profile evaluation, University selection, Admission Processing and Documentation. the counsellors will help you filing for education loan if required and assist you in writing an effective and impactful SOP/LOR.</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-lg-12 mb-40">
                            <div class="course-item">
                               <div class="course-info">
                                  <h3 class="course-title" style="float:right;">ADMISSION  </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p style="text-align:right;">By studying abroad, you are allowing yourself to develop holistically, to experience the world outside your own country, to learn and adopt a new culture, to make new friends, and, most significantly, to boost your employability worldwide. Not every college overseas is a top or well-known institution. Accept reality and strategize for that CV that will get you into top firms. Counsellors at OEL assist you in choosing the best college for you overseas and suggest the best programs related to your stream and that helps in reaching the new heights in your career. </p>
                                     </div>
                                  </div>
                               </div>
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/income_icon.jpg"></a></div>
                            </div>
                         </div>
                         <div class="col-lg-12 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/operational-help.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title" style="text-align:left;">VISA ASSITANCE </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p style="text-align:left;">There are several phases to consider while applying for a student visa. We will make ensure that you are well informed on the most recent visa standards and circumstances. To reduce your troubles, we assist you certify, translate, and ship your documents. Whether it is Australia, Ireland, Canada, New Zealand, the United Kingdom, or the United States, we can help you with the entire process.</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <!--                    <div class="col-lg-12 mb-40">-->
                         <!--                        <div class="course-item">-->
                         <!--                        <div class="course-image"><a><img src="/home/images/administrations-icon.jpg"></a></div>-->
                         <!--                        <div class="course-info">-->
                         <!--                            <h3 class="course-title" style="text-align:right;">ACCOMMODATION </h3>-->
                         <!--                            <div class="bottom-part">-->
                         <!--                            <div class="info-meta">-->
                         <!--                                <p style="text-align:left;">Moving to another nation, especially at a young age, can be intimidating, and we understand that.-->
                         <!--Making a new home away from your own country is a crucial element of adapting to a new culture and surroundings. The correct lodging can make or break your move to living abroad.Our counsellors help with you and your parents to choose the type of housing that is ideal for you.-->
                         <!--</p>-->
                         <!--                            </div>-->
                         <!--                            </div>-->
                         <!--                        </div>-->
                         <!--                        </div>-->
                         <!--                    </div>-->
                         <div class="col-lg-12 mb-40">
                            <div class="course-item">
                               <div class="course-info">
                                  <h3 class="course-title" style="float:right;">ADMISSION  </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p style="text-align:right;">Moving to another nation, especially at a young age, can be intimidating, and we understand that.
                                           Making a new home away from your own country is a crucial element of adapting to a new culture and surroundings. The correct lodging can make or break your move to living abroad.Our counsellors help with you and your parents to choose the type of housing that is ideal for you. We take into consideration factors such as safety, travel time, cost, quality of life, and college timings when advising you on making the choice between on and off campus accommodation. We also help you identify areas in your city of choice which are international student friendly.
                                        </p>
                                     </div>
                                  </div>
                               </div>
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/administrations-icon.jpg"></a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
          <section id="rauchbier" class="tab-panel loaded">
             <div class="rs-login">
                <div class="container">
                   <div class="noticedbg noticed 33">
                      <div class="main-part">
                         <div class="loginform">
                            <h2>Franchise Login </h2>
                            <hr>
                            <form method="POST" action="{{route('login')}}" aria-label="Login">
                                @csrf
                               <div class="form-group">
                                  <input id="email" type="email" placeholder="Enter Email Address" class="form-control " name="email" value="" required="" autofocus="">
                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                               </div>
                               <p class="otp_failed text-danger" style="display: none; margin-bottom: 0;"></p>
                               <div id="otpDiv" class="otpDiv" style="display: none;">
                                  <div class="form-group">
                                     <div style="display: flex; justify-content: center; align-items: center;">
                                        <div class="radio" style="margin-right: 20px;">
                                           <label><input onchange="toggleLoginType('password')" type="radio" checked="" name="login_type" value="password">
                                           Login with Password
                                           </label>
                                        </div>
                                     </div>
                                  </div>
                                  <div id="password_section" style="display: block;">
                                     <div class="form-group">
                                        <label for="exampleInputPassword1">Enter Password</label>
                                        <input type="password" name="password" class="form-control " id="password_input" placeholder="Password">
                                        <div class="pt-10 pb-10">
                                           <a href="{{route('password.request')}}">Forgot your password?</a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <button type="button" class="readon submit-btn login_next_button" id="login_next_button">
                               <span>Log In</span>
                               </button>
                               <div class="last-password">
                                  <p>Not registered? <a href="https://overseaseducationlane.com/franchise-register">Create an account</a></p>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <br>
             <div class="rs-about style9 pt-50 pb-100 md-pb-70">
                <div class="container">
                   <div class="row">
                      <div class="offset-lg-3">
                      </div>
                      <div class="col-lg-9">
                         <div class="content-part">
                            <div class="about-img md-mb-50">
                               <div class="media-icon orange-color">
                                  <img src="https://overseaseducationlane.com/public/home/images/admission.jpg" alt="">
                               </div>
                            </div>
                            <div class="sec-title3 pl-65 md-pl-15 wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                               <div class="sec-title">
                                  <h2 class="title">OEL Student</h2>
                               </div>
                               <div class="desc mb-30 pr-50 md-pr-15">
                                  India turns out to be a market with huge potential for abroad training anyway intricacies engaged with beginning another business are definitely more than beginning a partner office. To have organization of workplaces all over and presence in the entire of India is undeniably challenging for large associations and marginally unthinkable for the medium size and more modest ones also.  This is the extraordinary business design, which can empower fair organizations to go for a public development and arrive at clients in all pieces of the country.
                                  <div class="row" style="padding-top: 20px;">
                                     <div class="col-lg-6"><a class="btn-become" href="https://overseaseducationlane.com/franchise-register">Become Franchise</a>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div id="most_viewed_section" class="rs-latest-couses gray-bg2 pt-80 pb-70 md-pt-70 md-pb-70">
                   <div class="container">
                      <div class="sec-title text-center mb-60 md-mb-45">
                         <h2 class="title mb-0">Franchisee Benefits</h2>
                      </div>
                      <div class="row">
                         <div class="col-lg-6 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/brand.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title"> Information Vault </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p>Our Franchisee gains admittance to an information base of 700+ Colleges, 80,000 + programs, introductions, learning materials and applicable documentation required in the everyday concentrate abroad enrollment exercises.</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-lg-6 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/income_icon.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title">Income </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p>Industry with most noteworthy return for money invested. We make opportune installments towards commission got after fruitful enrolment of understudy to the tie-up college. </p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-lg-6 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/operational-help.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title">Operational Help</h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p>We give total hand holding to the franchisee - preparing and on-boarding at Nagpur HQ, foundation set up help, publicizing counsel - outside, computerized, online media and print channels, enlistment help, normalized methods, functional rules and updates.</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-lg-6 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/administrations-icon.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title">Complete Administration</h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p>We give help at each progression of the client lifecycle beginning from Lead The executives through College and Program determination, Confirmations, Applications and Visa Help, Pre-Takeoff Instructions and other Worth Added Administrations.</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
          <section id="coun" class="tab-panel loaded">
             <div class="rs-login">
                <div class="container">
                   <div class="noticedbg noticed 44">
                      <div class="main-part">
                         <div class="loginform">
                            <h2>Counselor Login</h2>
                            <hr>
                            <form method="POST" action="{{route('login')}}" aria-label="Login">
                                @csrf
                               <div class="form-group">
                                  <input id="email" type="email" placeholder="Enter Email Address" class="form-control " name="email" value="" required="" autofocus="">
                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                               </div>
                               <div id="otpDiv" class="otpDiv" style="display: none;">
                                  <div class="form-group">
                                     <div style="display: flex; justify-content: center; align-items: center;">
                                        <div class="radio" style="margin-right: 20px;">
                                           <label><input onchange="toggleLoginType('password')" type="radio" checked="" name="login_type" value="password">
                                           Login with Password
                                           </label>
                                        </div>
                                     </div>
                                  </div>
                                  <div id="password_section" style="display: block;">
                                     <div class="form-group">
                                        <label for="exampleInputPassword1">Enter Password</label>
                                        <input type="password" name="password" class="form-control " id="password_input" placeholder="Password">
                                        <div class="pt-10 pb-10">
                                           <a href="{{route('password.request')}}">Forgot your password?</a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <button type="button" class="readon submit-btn login_next_button" id="login_next_button">
                               <span>Log In</span>
                               </button>
                               <div class="last-password">
                                  <p>Not registered? <a href="https://overseaseducationlane.com/counselor_register">Create an account</a></p>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <br>
             <div class="rs-about style9 pt-50 pb-100 md-pb-70">
                <div class="container">
                   <div class="row">
                      <div class="offset-lg-3">
                      </div>
                      <div class="col-lg-9">
                         <div class="content-part">
                            <div class="about-img md-mb-50">
                               <div class="media-icon orange-color">
                                  <img src="https://overseaseducationlane.com/public/home/images/admission.jpg" alt="">
                               </div>
                            </div>
                            <div class="sec-title3 pl-65 md-pl-15 wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                               <div class="sec-title ">
                                  <h2 class="title"> Counselor </h2>
                               </div>
                               <div class="desc mb-30 pr-50 md-pr-15">
                                  <p style="text-align:left">Counselling is important for study abroad. It plays a crucial role for students who want to study abroad. It specifically helps scholars to find the right academic institute and the right course to explore. Such overseas counsellors can easily collect all the necessary information on a student visa, scholarship schemes, educational loans, and more.</p>
                                  <p style="text-align:left">The counselors' help in choosing a study destination and choosing the right education provider and course. They also assist with registration and preparation for your English test and visa application support. Our counsellors also help with your accommodation. Not just this, they also perform career counselling and help in job search support and advise you to get a better job and opportunity.
                                  </p>
                                  <div class="row" style="padding-top: 20px;">
                                     <div class="col-lg-6"><a class="btn-become" href="https://overseaseducationlane.com/franchise-register">Become Franchise</a>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div id="most_viewed_section" class="rs-latest-couses gray-bg2 pt-80 pb-70 md-pt-70 md-pb-70">
                   <div class="container">
                      <div class="sec-title text-center mb-60 md-mb-45">
                         <h2 class="title mb-0">Counselor Benefits</h2>
                      </div>
                      <div class="row">
                         <div class="col-lg-12 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/brand.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title" style="text-align:left;"> LANGUAGE COUNSELLOR </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p style="text-align:left;">Language counsellors provide education to students in order to assist them understand the fundamentals of a specific language. They typically begin with the fundamentals of basic grammar and format, then progress to more complex stuff, eventually aiming to become comfortable speaking and understanding conversational conversations. They may deliver this instruction onsite in a classroom setting or remotely via a remote learning platform. They choose a curriculum, teach topics, and assess students' progress.</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-lg-12 mb-40">
                            <div class="course-item">
                               <div class="course-info">
                                  <h3 class="course-title" style="text-align:right;">Career Counsellor  </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p style="text-align:right;">A career counsellor is a professional who assists people in choosing a career and achieving their professional objectives. Counsellors assist clients in entering the labour field, changing jobs, and looking for work. People in this sector operate in a variety of contexts, including schools, government agencies, commercial corporations, and community organisations. Choosing a career can be difficult. A career counsellor is a professional who assists people in choosing a career and achieving their professional objectives. People in this sector operate in a variety of contexts, including schools, government agencies, commercial corporations, and community organisations. </p>
                                     </div>
                                  </div>
                               </div>
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/income_icon.jpg"></a></div>
                            </div>
                         </div>
                         <div class="col-lg-12 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/operational-help.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title" style="text-align:left;"> EDUCATION COUNSELOR </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p style="text-align:left;">AN education counselor’s work is to provide counselling and career advices to the students to choose them a right course in right college. They also help in tackle the different academic challenges and assist them reaching the goal. The major responsibility is to assist teenagers in term of course and program selection, school adjustments &amp; career planning. education counsellors keep an eye on the personal/social and behavioural problems which may affect their academic life. It is not just job; you can make a difference by helping students make their career. The job of an education counsellor is quite adventurous and you get new challenges every day.</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-lg-12 mb-40">
                            <div class="course-item">
                               <div class="course-image"><a><img src="https://overseaseducationlane.com/public/home/images/administrations-icon.jpg"></a></div>
                               <div class="course-info">
                                  <h3 class="course-title" style="text-align:right;">ESSAY WRITING COUNSELORS </h3>
                                  <div class="bottom-part">
                                     <div class="info-meta">
                                        <p style="text-align:right;">Admission essays, also known as application essays, are an essential element of the application process that allow institutions to gain a clear understanding of your personality and interests. An essay writing counsellor provides assistance to students to write an impactful and impressive essay that can describe the required information such as "Why Will Studying Abroad Help Your Academics?" or "Why did you choose the location you want to study?" clearly and neatly. These counsellors help with writing admission essays in such a manner that they show the full potential and the traits of the personality of the students.</p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
       </div>
    </div>
    <script type="text/javascript">
       var account_type='';
       if(account_type=='agent'){
         $('#tab2').click();
       } else if(account_type=='sub_agent'){
         $('#tab4').click();
       }else{
         $('#tab1').click();
       }
       function triggerGoogleLogin(){
         console.log("Loggin with Google !");
         document.getElementById("google_sign_in").click();
       }
       let buttons = document.querySelectorAll(".loading_button");
       for(let i=0; i<buttons.length; i++){
         let button = buttons[i];
         button.addEventListener("click", function(){
             button.firstElementChild.style.display = "inline-block";
         });
       }
       function toggleLoginType(type){
         if(type == "password"){
             document.getElementById("password_section").style.display = 'block';
             document.getElementById("otp_section").style.display = 'none';
         }else if(type == "otp"){
             document.getElementById("password_section").style.display = 'none';
             document.getElementById("otp_section").style.display = 'block';
         }
       }
       toggleLoginType("");
       window.onbeforeunload = function(e){
       gapi.auth2.getAuthInstance().signOut();
       };
       let email = "";
       let name = "";
       let flag = false;
       let profile_id = "";
       let image_url = "";

       $(document).ready(function() {
         $(document).on('click', '.sub_dis', function() {
             $('.sub_dis').html('<i class="fa fa-spinner fa-spin"></i> Send OTP');
             $('.sub_dis').attr('disabled', 'disabled');

         });
       });
       $(".login_next_button").on('click', function(event){
         $(".otpDiv").show();
         setTimeout(function(){
             $(".login_next_button").attr("type", 'submit');
         }, 1000);
       });
    </script>
 </div>
@endsection
