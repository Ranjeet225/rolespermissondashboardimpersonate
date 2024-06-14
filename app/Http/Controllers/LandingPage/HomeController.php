<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\EnquiryMail;
use App\Models\Ads;
use App\Models\Country;
use App\Models\University;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $country =  Country::select('name','id')->get();
        $slider = DB::table('sliders')->where('status', '1')->first();
        $countryId = $slider->country_id;
        if(empty($countryId)){
            $countryId =82;
        }
        $testimonials = DB::table('testimonials')->take(3)->get();
        $universities = University::where('country_id',$countryId)->get();
        $countryName =  Country::where('id', $countryId)->select('name','id')->first();
        $aboutcountry = DB::table('country_universities')->where('country_id', $countryId)->get();
        $sliders = DB::table('sliders')->where('country_id', $countryId)->get();
        $sliderImages = [];
        foreach ($sliders as $slider) {
            $images = DB::table('images')->where('slider_id', $slider->id)->get();
            $sliderImages[] = $images;
        }
        $ads = Ads::get();
        return view('landingpage.index', compact('universities','ads', 'sliderImages', 'country', 'testimonials', 'countryName','aboutcountry'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email_id'   => 'required|email',
            'phone_no'   => 'required|string|regex:/^[0-9\-\+\s]+$/',
            'country'    => 'required|string|max:255',
            'location'  => 'nullable|string|max:255',
            'city'       => 'nullable|string|max:255'
        ]);
        $data = [
            'first_name'=>$request->first_name,
            'country'=>$request->country,
            'last_name'=>$request->last_name,
            'email_id'=>$request->email_id,
            'phone_no'=>$request->phone_no,
            'location'=>$request->location,
            'city'=>$request->city,
        ];
        EnquiryMail::insert($data);
        try {
            Mail::to('info@overseaseducationlane.com')->send(new WelcomeMail($data));
        } catch (\Exception $e) {
            Log::error('Error sending welcome email: ' . $e->getMessage());
        }
        // Mail::to('info@overseaseducationlane.com')->send(new WelcomeMail($data));
        return redirect()->route('index')->with('success','Mail Send Successfully');
    }

    public function getCountryData(Request $request)
    {
        $countryName =  Country::where('id', $request->countryId)->select('name','id')->first();
        $universities = University::with('country')->where('country_id',$request->countryId)->get();
        $universityCount = count($universities);
        $sliders = DB::table('sliders')->where('country_id',$request->countryId)->get();
        $sliderImages = [];
        foreach ($sliders as $slider) {
            $images = DB::table('images')->where('slider_id', $slider->id)->get();
            $sliderImages[] = $images;
        }
        return response()->json([
            'countryName'=>$countryName->name,
            'universities'=>$universities,
            'sliderimage'=>$sliderImages,
            'totalUniversity'=>$universityCount,
            'success'=>true
        ]);
    }
}
