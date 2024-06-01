<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Fieldsofstudytype;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function check_eligibility()
    {
         $country =Country::select('name','id')->get();
         $field_of_study=Fieldsofstudytype::select('name')->where('status',1)->get();
         return view('frontend.check-my-eligibility',compact('country','field_of_study'));
    }

    public function get_country(Request $request){
        $country =Country::whereIn('id',$request->country_id)->get();
        return response()->json(['country'=>$country,'']);
    }
}
