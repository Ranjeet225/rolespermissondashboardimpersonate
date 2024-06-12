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
use App\Models\StudentByAgent;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Twilio\Rest\Client;

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

    // public function course_university(Request $request)
    // {
    //     $country = explode(',', $request->input('country'));
    //     $program_discipline = explode(',', $request->input('program_discipline'));
    //     // $university = University::whereIn('country_id', $country)->paginate(1);
    //     // $course = Program::orwhere('program_level_id', $request->input('program_level'))
    //     //                 ->orWhere('program_sub_level', $request->input('program_sub_level'))
    //     //                 ->orWhere('education_level_id', $request->input('education_level'))
    //     //                 ->orWhereIn('program_discipline', $program_discipline)
    //     //                 ->orWhere('program_subdiscipline', $request->input('program_subdispline'))
    //     //                 ->paginate(1);
    //     $university = University::paginate(1);
    //     $university->setPath('');
    //     $course = Program::paginate(1);
    //     $country =Country::select('name','id')->get();
    //     $program_level =ProgramLevel::select('name','id')->get();
    //     $sub_program_level =ProgramSubLevel::select('name','id','program_id')->get();
    //     $program_discipline=ProgramDiscipline::select('name','id')->get();
    //     $eng_proficiency_level=EngProficiencyLevel::select('name','id')->get();
    //     return view('frontend.course-finder', compact('course', 'university','country','program_level','program_discipline','eng_proficiency_level'));
    // }

    public function education_level_filter(Request $request)
    {
        $education_level =EducationLevel::whereIn('program_level_id',$request->program_level_id)->whereIn('program_sublevel_id',$request->program_sublevel_id)->get();
        return response()->json($education_level);
    }

    // public function get_university_course(Request $request)
    // {
    //     $inputFields = ['country', 'program_level_id', 'program_sublevel_id', 'education_level', 'program_discipline', 'programSubDiscipline'];
    //     $inputData = [];
    //     foreach ($inputFields as $field) {
    //         if ($request->has($field)) {
    //             $inputData[$field] = $request->input($field);
    //         }
    //     }
    //     $perPage = 100;
    //     $page = $request->page ?? 1;
    //     $offset = ($page - 1) * $perPage;
    //     $totalUniversities = University::count();
    //     $universities = University::offset($offset)->limit($perPage)->get();
    //     // dd($universities);
    //     // with('country','program','program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
    //                 // ->where('country_id', $inputData['country'] ?? [])
    //                 // offset($offset)
    //                 // ->limit($perPage)
    //                 // ->get();
    //                 // ->paginate(1);
    //     // $course = Program::with('school')->whereIn('program_level_id', $inputData['program_level_id'] ?? [])
    //     //         ->orWhereIn('program_sub_level', $inputData['program_sublevel_id'] ?? [])
    //     //         ->orWhereIn('education_level_id', $inputData['education_level'] ?? [])
    //     //         ->orWhereIn('program_discipline', $inputData['program_discipline'] ?? [])
    //     //         ->orWhereIn('program_subdiscipline', $inputData['programSubDiscipline'] ?? [])
    //     //         ->paginate(1);
    //     // $course=Program::with('university_name','university_name.country','university_name.university_type')->paginate(12);
    //     $course=Program::with('university_name','university_name.country_name','university_name.university_type_name')->paginate(1);
    //     return response()->json([
    //         'university' => $universities,
    //         'current_page' => $page,
    //         'total_university' => $totalUniversities,
    //         'per_page' => $perPage,
    //         'course'=>$course,
    //     ]);
    //     // return response()->json(
    //     //     [
    //     //     'university'=>$university,
    //     //     'total_university' =>'2',
    //     //     'course'=>$course,
    //     // ]);
    // }

    public function course_university(Request $request)
    {
        $course = Program::paginate(1);
        $country =Country::select('name','id')->get();
        $program_level =ProgramLevel::select('name','id')->get();
        $sub_program_level =ProgramSubLevel::select('name','id','program_id')->get();
        $program_discipline=ProgramDiscipline::select('name','id')->get();
        $eng_proficiency_level=EngProficiencyLevel::select('name','id')->get();
        if($request->ajax()){
            if($request->has('country') ||  $request->has('program_level') ||  $request->has('program_sub_level') ||  $request->has('education_level') ||  $request->has('program_displine') ||  $request->has('program_subdispline') ||  $request->has('eng_proficiency_level') ||  $request->has('eng_pro_input') ||  $request->has('other_exam')){
                $course=Program::with('university_name','university_name.country_name','university_name.university_type_name')
                // ->whereIn('program_level_id',explode(',',$request->program_level))
                // ->whereIn('program_sub_level',explode(',',$request->program_sub_level))
                // ->whereIn('education_level_id',explode(',',$request->education_level))
                // ->whereIn('program_discipline', explode(',',$request->program_displine))
                // ->whereIn('program_subdiscipline', explode(',',$request->program_subdispline))
                // ->whereIn('eng_pro_input',explode(',',$request->eng_pro_input))
                // ->whereIn('other_exam',explode(',',$request->other_exam))
                ->paginate(12);
                $universities = University::with('country','program','program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                ->whereIn('country_id', explode(',',$request->country))
                // ->whereHas('program', function ($query) use ($request) {
                //     $query->whereIn('program_level_id',explode(',',$request->program_level))
                //     ->whereIn('program_sub_level',explode(',',$request->program_sub_level))
                //     ->whereIn('education_level_id',explode(',',$request->education_level))
                //     ->whereIn('program_discipline',explode(',',$request->program_displine))
                //     ->whereIn('program_subdiscipline',explode(',',$request->program_displine));
                // })
                ->paginate(12);
                return response()->json(['data' => $universities,'course_data'=>$course]);
            }else{
                $course=Program::with('university_name','university_name.country_name','university_name.university_type_name')->paginate(12);
                $universities = University::with('country','program','program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')->paginate(12);
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
}
