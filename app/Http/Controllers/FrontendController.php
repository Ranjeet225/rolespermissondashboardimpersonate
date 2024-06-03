<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Fieldsofstudytype;
use App\Models\ProgramDiscipline;
use App\Models\ProgramLevel;
use App\Models\ProgramSubLevel;
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
         return view('frontend.check-my-eligibility',compact('country','program_level','sub_program_level','program_discipline'));
    }

    public function get_country(Request $request){
        $country =Country::whereIn('id',$request->country_id)->get();
        return response()->json(['country'=>$country,'']);
    }
}
