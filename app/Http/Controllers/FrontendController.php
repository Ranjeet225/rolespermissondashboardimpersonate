<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EngProficiencyLevel;
use App\Models\Fieldsofstudytype;
use App\Models\Program;
use App\Models\ProgramDiscipline;
use App\Models\ProgramLevel;
use App\Models\ProgramSubLevel;
use App\Models\University;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

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

    public function course_university(Request $request)
    {
        $country=explode(',',$request->country);
        $university=University::whereIn('country_id',$country)->get();
        $course=Program::where('program_level_id',$request->program_level)
               ->orwhere('program_sub_level',$request->program_sub_level)
               ->orwhere('education_level_id',$request->education_level)
               ->orwhere('program_discipline',$request->program_displine)
               ->orwhere('program_subdiscipline',$request->program_subdispline)
               ->orwhere('program_subdiscipline',$request->program_subdispline)
               ->get();
        return view('frontend.course-finder',compact('course','university'));
    }
}
