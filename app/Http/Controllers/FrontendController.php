<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EducationLevel;
use App\Models\EngProficiencyLevel;
use App\Models\Fieldsofstudytype;
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

class FrontendController extends Controller
{



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

        $course = Program::paginate(1);
        $country =Country::select('name','id')->get();
        $program_level =ProgramLevel::select('name','id')->get();
        $sub_program_level =ProgramSubLevel::select('name','id','program_id')->get();
        $program_discipline=ProgramDiscipline::select('name','id')->get();
        $eng_proficiency_level=EngProficiencyLevel::select('name','id')->get();
        if($request->ajax()){
            if($request->has('country') || $request->has('intake') || $request->has('other_exam') || $request->has('program_level') ||  $request->has('program_sub_level') ||  $request->has('education_level') ||  $request->has('program_displine') ||  $request->has('program_subdispline') ||  $request->has('eng_proficiency_level') ||  $request->has('eng_pro_input') ||  $request->has('other_exam')){
                    $course = Program::with('university_name','programLevel','university_name.country_name','university_name.university_type_name')
                            ->when($request->has('program_level'), function ($query) use ($request) {
                                return $query->whereIn('program_level_id', explode(',', $request->program_level));
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
                            })
                    ->paginate(12);
                    $universities = University::withCount('program')->with('country', 'province', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevel')
                    ->when($request->has('country'), function ($query) use ($request) {
                        return $query->whereIn('country_id', explode(',', $request->country));
                    })
                    ->when($request->has('program_level') || $request->has('intake') || $request->has('other_exam') || $request->has('program_sub_level') || $request->has('program_discipline')  || $request->has('program_subdiscipline') || $request->has('education_level_id') || $request->has('program_discipline'), function ($query) use ($request) {
                        $query->whereHas('program', function ($query) use ($request) {
                            $query->when($request->program_level, function ($query) use ($request) {
                                $query->whereIn('program_level_id', explode(',', $request->program_level));
                            });
                            $query->when($request->has('intake'), function ($query) use ($request) {
                                return $query->whereIn('intake', explode(',', $request->intake));
                            });
                            $query->when($request->has('other_exam'), function ($query) use ($request) {
                                return $query->whereIn('other_exam', explode(',', $request->other_exam));
                            });
                            $query->when($request->program_sub_level, function ($query) use ($request) {
                                $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
                            });
                            $query->when($request->education_level, function ($query) use ($request) {
                                $query->whereIn('education_level_id', explode(',', $request->education_level));
                            });
                            $query->when($request->program_discipline, function ($query) use ($request) {
                                $query->whereIn('program_discipline', explode(',', $request->program_discipline));
                            });
                            $query->when($request->program_subdiscipline, function ($query) use ($request) {
                                $query->whereIn('program_subdiscipline', explode(',', $request->program_subdiscipline));
                            });
                        });
                    })->paginate(12);
                return response()->json(['data' => $universities,'course_data'=>$course]);
            }else{
                $user = Auth::user();
                if (!empty($user)) {
                    if($user->hasRole('student')){
                        $student_data = DB::table('student')->select('country_id', 'id')->where('user_id', $user->id)->first();
                        $program_ids = DB::table('student_by_agent')->select('program_label')->where('student_user_id', $student_data->id ?? null)->pluck('program_label')->toArray();
                        $education_ids = DB::table('education_history')->select('education_level_id')->where('student_id', $student_data->id  ?? null)->pluck('education_level_id')->toArray();
                        if (!empty($program_ids) || !empty($education_ids) || !empty($student_data)) {
                            $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')
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
                            $universities = University::withCount('program')->with('country', 'province', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevel')
                                ->when($request->has('country'), function ($query) use ($student_data) {
                                    return $query->where('country_id', $student_data->country_id ?? null);
                                })
                                ->when(!empty($program_ids) || !empty($education_ids), function ($query) use ($program_ids, $education_ids) {
                                    $query->whereHas('program', function ($query) use ($program_ids, $education_ids) {
                                        $query->when(!empty($program_ids), function ($query) use ($program_ids) {
                                            $query->whereIn('program_level_id', $program_ids);
                                        });
                                        $query->when(!empty($education_ids), function ($query) use ($education_ids) {
                                            $query->whereIn('education_level_id', $education_ids);
                                        });
                                    });
                                })
                                ->paginate(12);
                        } else {
                            $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->paginate(12);
                            $universities = University::withCount('program')->with('country', 'province','university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                                ->where('country_id', $student_data->country_id ?? null)
                                ->paginate(12);
                        }
                    }else{
                        $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->paginate(12);
                        $universities = University::withCount('program')->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')->paginate(12);
                    }
                } else {
                    $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->paginate(12);
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
        $request->validate([
            'otp' => 'required|numeric',
        ]);
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

    public function view_program_data($id)
    {
        $program_data = Program::where('school_id',$id)->with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->get();
        if ($program_data->isEmpty()) {
            abort(404);
        }
        return view('frontend.program-data', compact('program_data'));
    }


    public function course_details($id)
    {
        $program_data = Program::where('id', $id)->with('university_name','educationLevelprogram', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->first();
        $exam_text =DB::table('program_english_required')->where('program_id',$id)->first();
        if (!$program_data) {
            abort(404);
        }
        return view('frontend.program-details', compact('program_data','exam_text'));
    }

    public function apply_program_payment($student_id,$program_id){
        $student_details=Student::where('id',$student_id)->first();
        $program_data=Program::with('university_name')->where('id',$program_id)->first();
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
        $student_details=Student::where('id',$student_id)->first();
        $program_data=Program::with('university_name')->select('id')->where('id',$program_id)->first();
        $controller = new LeadsManageCotroller();
        $token 		= $controller->generateToken();
        $uniqueId 		= $controller->uniqidgenrate();
        $paymentLink = PaymentsLink::updateOrCreate(
            ['program_id' => $program_data->id],
            [
                'token'					=> $token,
                'user_id'				=> $student_details->id,
                'email'					=> $student_details->email,
                'payment_type'			=> null,
                'payment_type_remarks' 	=> "applied_program",
                'payment_mode'  		=> null,
                'payment_mode_remarks' 	=> "",
                'amount' 				=> $fee,
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
        $program_data=Program::with('university_name')->select('id')->where('id',$program_id)->first();
        $controller = new LeadsManageCotroller();
        $token 		= $controller->generateToken();
        $uniqueId 		= $controller->uniqidgenrate();
        $paymentLink = PaymentsLink::updateOrCreate(
            ['program_id' => $program_data->id],
            [
                'token'					=> $token,
                'user_id'				=> $student_details->id,
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


}
