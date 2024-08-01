<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Ads;
use App\Models\Blog;
use App\Models\Contactus;
use App\Models\Country;
use App\Models\EducationLevel;
use App\Models\EngProficiencyLevel;
use App\Models\Fieldsofstudytype;
use App\Models\Instagram;
use App\Models\Payment;
use App\Models\Program;
use App\Models\ProgramDiscipline;
use App\Models\ProgramLevel;
use App\Models\ProgramSubdiscipline;
use App\Models\ProgramSubLevel;
use App\Models\Student;
use App\Models\StudentByAgent;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Crypt;
use App\Models\PaymentsLink;
use App\Models\ServiceLanding;
use App\Models\Testimonials;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Faq;

class FrontendController extends Controller
{

    public function index()
    {

        return view('frontend.index', [
            'service'=>ServiceLanding::where('status',1)->take(4)->get(),
            'instagram'=>Instagram::where('status',1)->get(),
            'blogs'=>Blog::where('status',1)->take(3)->get(),
            'programs'=>Program::with('university_name:id,university_name,logo,banner')->Select('id','school_id','name')->where('is_approved',1)->latest()->take(8)->get(),
            'ads'=>Ads::get(),
            'program_level'=>ProgramLevel::get(),
            'program_sublevel'=>ProgramSubLevel::get(),
            'testimonials'=> Testimonials::where('status',1)->orderBy('id','desc')->get(),
            'universitiesltl' => University::select('id', 'university_name', 'logo')->where('is_approved',1)->take(30)->get(),
            'universitiesrtl' => University::select('id', 'university_name', 'logo')->where('is_approved',1)->latest()->take(30)->get()
        ]);
    }



    public function check_eligibility()
    {
         $country =Country::select('name','id')->get();
         $program_level =ProgramLevel::select('name','id')->get();
         $sub_program_level =ProgramSubLevel::select('name','id','program_id')->get();
         $program_discipline=ProgramDiscipline::select('name','id')->get();
         $eng_proficiency_level=EngProficiencyLevel::select('name','id')->get();
         return view('frontend.check-my-eligibility',compact('country','eng_proficiency_level','program_level','sub_program_level','program_discipline'));
    }

    public function get_country(Request $request){
        $country =Country::whereIn('id',$request->country_id)->get();
        return response()->json(['country'=>$country,'']);
    }

    public function education_level_filter(Request $request)
    {
        $education_level =EducationLevel::whereIn('program_level_id',$request->program_level_id)->whereIn('program_sublevel_id',$request->program_sublevel_id)->get();
        return response()->json($education_level);
    }

    public function course_university(Request $request)
    {
        $course = Program::where('is_approved',1)->paginate(1);
        $country =Country::select('name','id')->get();
        $program_level =ProgramLevel::select('name','id')->get();
        $sub_program_level =ProgramSubLevel::select('name','id','program_id')->get();
        $program_discipline=ProgramDiscipline::select('name','id')->get();
        $eng_proficiency_level=EngProficiencyLevel::select('name','id')->get();
        if($request->ajax()){
            if($request->has('country') || $request->has('intake') || $request->has('other_exam') || $request->has('program_level') ||  $request->has('program_sub_level') ||  $request->has('education_level') ||  $request->has('program_displine') ||  $request->has('program_subdispline') ||  $request->has('eng_proficiency_level') ||  $request->has('eng_pro_input') ||  $request->has('other_exam')){
                $course = Program::with('university_name','programLevel','university_name.country_name','university_name.university_type_name')->where('is_approved',1)
                            ->when($request->has('program_level'), function ($query) use ($request) {
                                return $query->whereIn('program_level_id', explode(',', $request->program_level));
                            })
                            ->when($request->has('country'), function ($query) use ($request) {
                                return $query->whereHas('university_name', function ($query) use ($request) {
                                    return $query->whereIn('country_id', explode(',', $request->country));
                                });
                            })
                            ->when($request->has('intake'), function ($query) use ($request) {
                                $intakes = array_map(function($intake) {
                                    return str_pad($intake, 2, "0", STR_PAD_LEFT);
                                }, explode(',', $request->intake));
                                 $query->whereIn('intake', $intakes);
                            })
                            ->when($request->has('other_exam'), function ($query) use ($request) {
                                return $query->whereIn('other_exam', explode(',', $request->other_exam));
                            })
                            ->when($request->has('program_sub_level'), function ($query) use ($request) {
                                return $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
                            })
                            ->when($request->has('education_level'), function ($query) use ($request) {
                                return $query->whereIn('education_level_id', explode(',', $request->education_level));
                            })
                            ->when($request->has('program_displine'), function ($query) use ($request) {
                                return $query->whereIn('program_discipline', explode(',', $request->program_displine));
                            })
                            ->when($request->has('program_subdispline'), function ($query) use ($request) {
                                return $query->whereIn('program_subdiscipline', explode(',', $request->program_subdispline));
                            })
                            ->when($request->has('other_exam'), function ($query) use ($request) {
                                return $query->whereIn('other_exam', explode(',', $request->other_exam));
                            })
                    ->paginate(12);

                    $applyProgramFilters = function ($query) use ($request) {
                                    $query->when($request->program_level, function ($query) use ($request) {
                                        $query->whereIn('program_level_id', explode(',', $request->program_level));
                                    })
                                    ->when($request->has('intake'), function ($query) use ($request) {
                                        return $query->whereIn('intake', explode(',', $request->intake));
                                    })
                                    ->when($request->has('other_exam'), function ($query) use ($request) {
                                        return $query->whereIn('other_exam', explode(',', $request->other_exam));
                                    })
                                    ->when($request->program_sub_level, function ($query) use ($request) {
                                        $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
                                    })
                                    ->when($request->education_level, function ($query) use ($request) {
                                        $query->whereIn('education_level_id', explode(',', $request->education_level));
                                    })
                                    ->when($request->program_discipline, function ($query) use ($request) {
                                        $query->whereIn('program_discipline', explode(',', $request->program_discipline));
                                    })
                                    ->when($request->program_subdiscipline, function ($query) use ($request) {
                                        $query->whereIn('program_subdiscipline', explode(',', $request->program_subdiscipline));
                                    });
                                };
                            $universities = University::select('universities.*')
                                ->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                                ->selectSub(function ($query) use ($applyProgramFilters) {
                                    $query->from('program')
                                        ->selectRaw('COUNT(*)')
                                        ->whereColumn('universities.id', 'program.school_id');
                                    $applyProgramFilters($query);
                                }, 'program_count')
                                ->when($request->has('country'), function ($query) use ($request) {
                                    return $query->whereIn('country_id', explode(',', $request->country));
                                })
                                 ->whereExists(function ($query) use ($applyProgramFilters) {
                                     $query->from('program');
                                        // ->whereColumn('universities.id', 'program.school_id');
                                    $applyProgramFilters($query);
                                })
                                // ->orwhereHas('program', function ($query) use ($applyProgramFilters) {
                                //     $applyProgramFilters($query);
                                // })
                                ->paginate(12);
                return response()->json(['data' => $universities,'course_data'=>$course]);
            }else{
                $user = Auth::user();
                if (!empty($user)) {
                    if($user->hasRole('student')){
                        $student_data = DB::table('student')->select('country_id', 'id')->where('user_id', $user->id)->first();
                        $program_ids = DB::table('student_by_agent')->select('program_label')->where('student_user_id', $student_data->id ?? null)->pluck('program_label')->toArray();
                        $education_ids = DB::table('education_history')->select('education_level_id')->where('student_id', $student_data->id  ?? null)->pluck('education_level_id')->toArray();
                        if (!empty($program_ids) || !empty($education_ids) || !empty($student_data)) {
                            $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved',1)
                                    ->when(!empty($program_ids), function ($query) use ($program_ids) {
                                        $query->whereIn('program_level_id', $program_ids);
                                    })
                                    ->when(!empty($education_ids), function ($query) use ($education_ids) {
                                        $query->whereIn('education_level_id', $education_ids);
                                    })
                                    ->whereHas('university_name', function ($query) use ($student_data) {
                                        $query->where('country_id', $student_data->country_id);
                                    })
                                    ->paginate(12);
                            $applyFilter = function ($query) use ($program_ids, $education_ids) {
                                if (!empty($program_ids) || !empty($education_ids)) {
                                    $query->where(function ($query) use ($program_ids, $education_ids) {
                                        if (!empty($program_ids)) {
                                            $query->whereIn('program_level_id', $program_ids);
                                        }
                                        if (!empty($education_ids)) {
                                            $query->whereIn('education_level_id', $education_ids);
                                        }
                                    });
                                }
                            };
                            $universities = University::select('universities.*')
                                        ->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                                        ->selectSub(function ($query) use ($applyFilter) {
                                            $query->from('program')
                                                ->selectRaw('COUNT(*)')
                                                ->whereColumn('universities.id', 'program.school_id')
                                                ->where(function ($query) use ($applyFilter) {
                                                    $applyFilter($query);
                                                });
                                        }, 'program_count')
                                        ->when($request->has('country'), function ($query) use ($request) {
                                            return $query->whereIn('country_id', explode(',', $request->country));
                                        })
                                        ->whereHas('program', function ($query) use ($applyFilter) {
                                            $applyFilter($query);
                                        })
                                        ->paginate(12);
                        } else {
                            $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved',1)->paginate(12);
                            $universities = University::withCount('program')->with('country', 'province','university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                                ->where('country_id', $student_data->country_id ?? null)
                                ->paginate(12);
                        }
                    }else{
                        $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved',1)->paginate(12);
                        $universities = University::withCount('program')->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')->paginate(12);
                    }
                } else {
                    $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved',1)->paginate(12);
                    $universities = University::withCount('program')->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')->paginate(12);
                    return response()->json(['data' => $universities,'course_data'=>$course]);
                }
                return response()->json(['data' => $universities,'course_data'=>$course]);
            }
        }
        return view('frontend.course-finder', compact('country','program_level','program_discipline','eng_proficiency_level'));
    }


    public function send_otp(Request $request)
    {
        try {
            $request->validate([
                'phone_number' => 'required|numeric',
            ]);
            $otp = rand(100000, 999999);
            session(['otp' => $otp]);
            $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
            $twilio->messages->create(
                '+' . 91 . $request->phone_number,
                [
                    'from' => env('TWILIO_PHONE_NUMBER'),
                    'body' => "Your OTP code is $otp"
                ]
            );
            return response()->json(['message' => 'OTP sent successfully.','success'=>true]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'success'=>false]);
        }
    }
    public function verify_otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric',
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'unique:student,email',
                'unique:student_by_agent,email',
            ],
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $storedOtp = session('otp');
        if ($request->otp == $storedOtp) {
            session()->forget('otp');
            StudentByAgent::create([
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);
            return response()->json(['message' => 'OTP verified successfully.','success'=>true]);
        } else {
            return response()->json(['message' => 'Invalid OTP.','success'=>false], 401);
        }
    }

    public function view_program_data(Request $request ,$id)
    {
        $program_data = Program::where('school_id',$id)->with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved',1)
                        ->when($request->has('program_level'), function ($query) use ($request) {
                            return $query->whereIn('program_level_id', explode(',', $request->program_level));
                        })
                        ->when($request->has('country'), function ($query) use ($request) {
                            return $query->whereHas('university_name', function ($query) use ($request) {
                                return $query->whereIn('country_id', explode(',', $request->country));
                            });
                        })
                        ->when($request->has('intake'), function ($query) use ($request) {
                            return $query->whereIn('intake', explode(',', $request->intake));
                        })
                        ->when($request->has('other_exam'), function ($query) use ($request) {
                            return $query->whereIn('other_exam', explode(',', $request->other_exam));
                        })
                        ->when($request->has('program_sub_level'), function ($query) use ($request) {
                            return $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
                        })
                        ->when($request->has('education_level'), function ($query) use ($request) {
                            return $query->whereIn('education_level_id', explode(',', $request->education_level));
                        })
                        ->when($request->has('program_displine'), function ($query) use ($request) {
                            return $query->whereIn('program_discipline', explode(',', $request->program_displine));
                        })
                        ->when($request->has('program_subdispline'), function ($query) use ($request) {
                            return $query->whereIn('program_subdiscipline', explode(',', $request->program_subdispline));
                        })
                        ->when($request->has('other_exam'), function ($query) use ($request) {
                            return $query->whereIn('other_exam', explode(',', $request->other_exam));
                        })->get();
        if ($program_data->isEmpty()) {
            abort(404);
        }
        return view('frontend.program-data', compact('program_data'));
    }


    public function course_details($id = null)
    {
        $program_data = Program::where('id', $id)->with('university_name','educationLevelprogram', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved',1)->first();
        $exam_text =DB::table('program_english_required')->where('program_id',$id)->first();
        if (!$program_data) {
            abort(404);
        }
        return view('frontend.program-details', compact('program_data','exam_text'));
    }

    public function apply_program_payment($student_id,$program_id){
        $student_details=Student::where('id',$student_id)->first();
        $program_data=Program::with('university_name')->where('id',$program_id)->where('is_approved',1)->first();
        if (!$student_details) {
            abort(404);
        }
        if (Auth::check() && Auth::user()->hasRole('student') && ($student_details->profile_complete != 1)) {
            return redirect()->route('student-edit')->with(['message'=>'Please Complete Your Profile']);
        }
        return view('frontend.apply-program-payment',compact('program_data','student_id'));
    }

    public function pay_amount($student_id,$program_id,$amount)
    {
        $fee = Crypt::decrypt($amount);
        // CONVERT CURRENCY
        $student_details=Student::where('id',$student_id)->first();
        $program_data=Program::with('university_name')->where('is_approved',1)->select('id','currency')->where('id',$program_id)->first();
        $freecurrencyapi = new \FreeCurrencyApi\FreeCurrencyApi\FreeCurrencyApiClient('fca_live_mt9NJ25AtC6V2SEojGBNmlM01WMMdmOUyJOctMzI');
        $rates = $freecurrencyapi->latest([
            'base_currency' => $program_data->currency,
            'symbols' => 'INR',
            'amount' => $fee,
        ]);
        $currency = $rates['data']['INR'];
        $controller = new LeadsManageCotroller();
        $token 		= $controller->generateToken();
        $uniqueId 		= $controller->uniqidgenrate();
        $paymentLink = PaymentsLink::updateOrCreate(
            ['program_id' => $program_data->id],
            [
                'token'					=> $token,
                'user_id'				=> $student_details->user_id,
                'email'					=> $student_details->email,
                'payment_type'			=> null,
                'payment_type_remarks' 	=> "applied_program",
                'payment_mode'  		=> null,
                'payment_mode_remarks' 	=> "",
                'amount' 				=> round($currency*$fee,2),
                'expired_in'			=> date('Y-m-d H:i:s',strtotime('+ 10 days')),
                'fallowp_unique_id'=> $uniqueId,
            ]
        );
        return redirect(url('/pay-now/c?token=' . $token));
        // return view('emails.payment_link',compact('paymentData'));
    }

    public function pay_later($student_id,$program_id,$amount)
    {
        $fee = Crypt::decrypt($amount);
        $student_details=Student::where('id',$student_id)->first();
        $program_data=Program::with('university_name')->where('is_approved',1)->select('id')->where('id',$program_id)->first();
        $controller = new LeadsManageCotroller();
        $token 		= $controller->generateToken();
        $uniqueId 		= $controller->uniqidgenrate();
        $paymentLink = PaymentsLink::updateOrCreate(
            ['program_id' => $program_data->id],
            [
                'token'					=> $token,
                'user_id'				=> $student_details->user_id,
                'email'					=> $student_details->email,
                'payment_type'			=> null,
                'payment_type_remarks' 	=> "applied_program_pay_later",
                'payment_mode'  		=> null,
                'payment_mode_remarks' 	=> "",
                'amount' 				=> $fee,
                'expired_in'			=> date('Y-m-d H:i:s',strtotime('+ 10 days')),
                'fallowp_unique_id'=> $uniqueId,
            ]
        );
        return redirect(url('student/applied-program'));
    }

    public function continue_course($student_id,$program_id,$amount)
    {
        $fee = Crypt::decrypt($amount);
        $student_details=Student::where('id',$student_id)->first();
        $program_data=Program::with('university_name')->where('is_approved',1)->select('id')->where('id',$program_id)->first();
        PaymentsLink::updateOrCreate(
            ['program_id' => $program_data->id],
            [
                'token'					=> 'token',
                'user_id'				=> $student_details->user_id,
                'email'					=> $student_details->email,
                'payment_type'			=> null,
                'payment_type_remarks' 	=> "applied_program",
                'payment_mode'  		=> null,
                'payment_mode_remarks' 	=> "",
                'amount' 				=> $fee,
                'expired_in'			=> date('Y-m-d H:i:s',strtotime('+ 10 days')),
                'fallowp_unique_id'=> 'free',
            ]
        );
        Payment::create([
            'payment_id' => 'free',
            'payment_method' => 'free',
            'currency' => $fee,
            'fallowp_unique_id' =>'free',
            'customer_name'=>$student_details->name,
            'user_id'=>$student_details->user_id,
            'customer_email' => $student_details->email,
            'amount' =>$fee,
            'payment_status' => 'free',
            'json_response' => 'free'
        ]);
        return redirect(url('apply-program'))->with('success', 'Program Applied Successfully!');
    }

    public function universities(Request $request)
    {
        $country =Country::select('name','id')->get();
        $universities =University::select('id','university_name')->get();
        if($request->ajax()) {
            if($request->has('university_name') || $request->has('country') || $request->has('country_name')){
                $country_id = $country->where('name', 'like', '%' . $request->country_name . '%')->pluck('id')->first();
                $universities = University::select('universities.*')->with('country', 'province','university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram');
                if(!empty($request->university_name)){
                    $universities = $universities->where('id',$request->university_name);
                }
                if(!empty($country_id)){
                    $universities = $universities->where('country_id',$country_id);
                }
                if(!empty($request->country)){
                    $universities = $universities->where('country_id',$request->country);
                }
                $universities = $universities->latest()->paginate(12);
            }else{
             $universities = University::select('universities.*')->with('country', 'province','university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                 ->latest()->paginate(12);
            }
            return response()->json(['data' => $universities]);
        }
        return view('frontend.universities',compact('country','universities'));
    }


    public function programs(Request $request)
    {
        $programs=Program::where('is_approved',1)->get();
        $country =Country::select('name','id')->get();
        $universities =University::select('id','university_name')->get();
        if($request->ajax()) {
            if($request->has('university_id') || $request->has('country') || $request->has('program_id') || $request->has('course')){
            $programs = Program::with(['university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name'])->where('is_approved',1)
                    ->when(!empty($request->country), function ($query) use ($request) {
                        $query->whereHas('university_name', function ($subquery) use ($request) {
                            $subquery->where('country_id', $request->country);
                        });
                    })
                    ->when(!empty($request->university_id), function ($query) use ($request) {
                        $query->where('school_id', $request->university_id);
                    })
                    ->when(!empty($request->course), function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->course . '%');
                    })
                    ->when(!empty($request->program_id), function ($query) use ($request) {
                        $query->where('id', $request->program_id);
                    })
                    ->latest()
                    ->paginate(12);
            }else{
             $programs =  Program::with('university_name','programLevel','university_name.country_name','university_name.university_type_name')->where('is_approved',1)->latest()->paginate(12);
            }
            return response()->json(['data' => $programs]);
        }
        return view('frontend.programs',compact('programs','country','universities'));
    }


    public function about_oel(){
        return view('frontend.about_oel');
    }

    public function contact_us(){
        return view('frontend.contact_us');
    }

    public function storeContactus(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'subject' => 'required|string|max:191|min:5',
            'message' => 'required|string|max:255|min:20',
            'g-recaptcha-response' => 'required|captcha',

        ],[
            'name.required' => 'Your Name is required',
            'g-recaptcha-response.required' => 'Approve captcha validation',
            'g-recaptcha-response.captcha' => 'Captcha is invalid'
        ]);
        try {
            $contactus = Contactus::create($validatedData);
            $mail_details = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ];
            // Mail::to('ranjeetmaurya2033@gmail.com')->send(new ContactMail($mail_details));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($mail_details));
            session()->flash('message', 'We have successfully received your message, We are working hard to get in touch with you as soon as possible. Thank you for your patience.');
        } catch (\Exception $exception) {
            Log::error($exception);
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->back();
	}


    Public  function blogs()
    {
        $blogs = Blog::where('status',1)->get();
        return view('frontend.blogs',compact('blogs'));
    }

    public function blog_details($title)
    {
        $blog = Blog::where('title', $title)->where('status', 1)->first();
        if (!$blog) {
            abort(404);
        }
        return view('frontend.blog_details',compact('blog'));
    }

    public function testimonials()
    {
        $testimonials = Testimonials::where('status',1)->get();
        return view('frontend.testimonials',compact('testimonials'));
    }

    public function frequently_asked_questions(){
        $faqs = Faq::where('status',1)->get();
        return view('frontend.faq',compact('faqs'));
    }

    public function privacy_policy(){
        return view('frontend.privacy_policy');
    }
}
