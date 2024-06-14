<?php

namespace App\Http\Controllers\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\Slider;
use App\Models\EnquiryMail;
use App\Models\Image;
use App\Models\Ads;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CountryUniversity;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;


class DashboardController extends Controller
{
    public function getAds()
    {

        $ads=Ads::paginate(10);
        return view('landingpage.admin.ads.index', compact('ads'));
    }
    public function createAds()
    {
        return view('landingpage.admin.ads.create');
    }
    public function storeAds(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'=>'required|max:198'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'assets/ads/' . $imagename;
            $image->move(public_path('assets/ads/'), $imagename);
        }
        $data =Ads::insert([
            'title'=>$request->title,
            'image'=>$imagePath,
        ]);
        return redirect()->route('getAds')->with('success', 'Ads Added successfully.');
    }
    public function editAds($id)
    {
        $ads=Ads::find($id);
        return view('landingpage.admin.ads.edit', compact('ads'));
    }
    public function updateAds(Request $request,$id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'=>'required|max:198'
        ]);

        $data =[
            'title'=>$request->title,
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'assets/ads/' . $imagename;
            $image->move(public_path('assets/ads/'), $imagePath);
            $data['image']  =$imagePath;
        }
        Ads::where('id', $id)->update($data);
        return redirect()->route('getAds')->with('success', 'Ads Updated successfully.');
    }
    public function deleteAds($id)
    {
        $deleted = Ads::where('id', $id)->first();
        if(!$deleted){
            return redirect()->route('getAds')->with('error', 'Ads not found.');
        }
        if($deleted->image){
            $imagePath = public_path($deleted->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $deleted->delete();
        if ($deleted) {
            return redirect()->route('getAds')->with('success', 'Ads deleted successfully.');
        } else {
            return redirect()->route('getAds')->with('error', 'Failed to delete Ad.');
        }
    }
    // slider
    public function getSlider()
    {

        $slider = Slider::with('images')->paginate(10);
        return view('landingpage.admin.slider.index', compact('slider'));
    }
    public function createSlider()
    {
        $countries =Country::select('name','id')->get();
        return view('landingpage.admin.slider.create',compact('countries'));
    }
    public function fetchStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = Province::where('country_id', $country_id)->pluck('name', 'id');
        return response()->json($states);
    }
    public function storeSlider(Request $request)
    {
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider = Slider::create([
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'title' => $request->title,
        ]);
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $uploadedImage) {
                $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                $imagePath = 'assets/sliderimage/' . $imageName;
                $uploadedImage->move(public_path('assets/sliderimage'), $imageName);
                $image = Image::create([
                    'slider_id'=>$slider->id,
                    'filename' => $imageName,
                    'filepath' => $imagePath,
                ]);
            }
        }
        return redirect()->route('getSlider')->with('success', 'Slider added successfully.');
    }
    public function showSlider($id)
    {
        $slider=Slider::with('images')->find($id);
        return view('landingpage.admin.slider.show', compact('slider'));
    }
    public function editSlider($id)
    {
        $slider=Slider::find($id);
        $countries = Country::select('name','id')->get();
        return view('landingpage.admin.slider.edit', compact('slider','countries'));
    }
    public function updateSlider(Request $request, $id)
    {
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $slider = Slider::findOrFail($id);
        $slider->update([
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'title' => $request->title,
        ]);
        if ($request->hasFile('images')) {
            foreach ($slider->images as $image) {
                $imagePath = public_path($image->filepath);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
            foreach ($request->file('images') as $uploadedImage) {
                $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                $imagePath = 'assets/sliderimage/' . $imageName;
                $uploadedImage->move(public_path('assets/sliderimage'), $imageName);
                Image::create([
                    'slider_id' => $slider->id,
                    'filename' => $imageName,
                    'filepath' => $imagePath,
                ]);
            }
        }
        return redirect()->route('getSlider')->with('success', 'Slider updated successfully.');
    }
    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('getSlider')->with('error', 'Slider not found.');
        }
        $images = Image::where('slider_id', $id)->get();
        foreach ($images as $image) {
            $imagePath = public_path($image->filepath);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete();
        }
        $deleted = $slider->delete();
        if ($deleted) {
            return redirect()->route('getSlider')->with('success', 'Slider deleted successfully.');
        } else {
            return redirect()->route('getSlider')->with('error', 'Failed to delete Slider.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */




    //  public function deleteUniversity($id)
    //  {
    //      $university = DB::table('universities')->where('id', $id)->first();
    //      $logoPath = public_path('admin/uploads/university/' . $university->logo);
    //      $bannerPath = public_path('admin/uploads/university/' . $university->banner);
    //      if (File::exists($logoPath)) {
    //          File::delete($logoPath);
    //      }
    //      if (File::exists($bannerPath)) {
    //          File::delete($bannerPath);
    //      }
    //      $deleted = DB::table('universities')->where('id', $id)->delete();
    //      if ($deleted) {
    //          return redirect()->route('getUniversity')->with('success', 'University deleted successfully.');
    //      } else {
    //          return redirect()->route('getUniversity')->with('error', 'Failed to delete University.');
    //      }
    //  }

    // Testimonial

    public function getIndexPageData(Request $request)
    {
        $universities = DB::table('universities')->where('country_id',$request->country_id)->get();
        $testimonials = DB::table('testimonials')->get();
        $sliders = DB::table('sliders')->where('country_id',$request->country_id)->get();
        $sliderImages = [];
        foreach ($sliders as $slider) {
            $images = DB::table('images')->where('slider_id', $slider->id)->get();
            $sliderImages[$slider->id] = $images;
        }
        return response()->json([
            'universities' => $universities,
            'testimonials' => $testimonials,
            'sliderImages' => $sliderImages,
        ]);
    }

    /**
     * Display the speefied resource.
     */
    public function emailData()
    {
        $emailData=EnquiryMail::orderBy('created_at', 'desc')->paginate(10);
        return view('landingpage.admin.sendEmail.index',compact('emailData'));
    }

    public function emailDelete($id)
    {
        $deleted = EnquiryMail::find($id)->delete();
        if ($deleted) {
            return redirect()->route('emailData')->with('success', 'Email deleted successfully.');
        } else {
            return redirect()->route('emailData')->with('error', 'Failed to delete country.');
        }
    }

    public function updateSliderStatus(Request $request)
    {
        $sliderId = $request->input('slider_id');
        DB::table('sliders')->update(['status' => '0']);
        DB::table('sliders')->where('id', $sliderId)->update(['status' => '1']);
        return response()->json(['message' => 'Status updated successfully']);
    }


    public function countryUniversity()
    {
        $countryuniversity=CountryUniversity::paginate(10);
        return view('landingpage.admin.countryuniversity.index',compact('countryuniversity'));
    }
    public function createCountryUniversity()
    {
        $countries = Country::select('name','id')->get();
        return view('landingpage.admin.countryuniversity.create',compact('countries'));
    }
    public function storeCountryUniversity(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'aboutcountry' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $picture = $request->file('image');
            $profilePIcture = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('admin/uploads/aboutcountry'), $profilePIcture);
        } else {
            return redirect()->back()->withInput()->withErrors(['image' => 'The image field is required.']);
        }
        DB::table('country_universities')->insert([
            'country_id'=>$request->country_id,
            'aboutcountry'=>$request->aboutcountry,
            'image'=>$profilePIcture,
        ]);

        return redirect()->route('country.university')->with('success', 'Country Added successfully.');
    }
    public function editCountryUniversity($id)
    {
        $aboutCountry= DB::table('country_universities')->find($id);
        $countries = Country::select('name','id')->get();
        return view('landingpage.admin.countryuniversity.edit', compact('aboutCountry','countries'));
    }
    public function updateCountryUniversity(Request $request, $id)
    {
       $request->validate([
            'country_id' => 'required',
            'aboutcountry' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $updateData = [
            'country_id' => $request->country_id,
            'aboutcountry' => $request->aboutcountry,
        ];
        if ($request->hasFile('image')) {
            $picture = $request->file('image');
            $profilePIcture = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('admin/uploads/aboutcountry'), $profilePIcture);
            $updateData['image'] = $profilePIcture;
        }
        DB::table('country_universities')->where('id', $id)->update($updateData);
        return redirect()->route('country.university')->with('success', 'Country Updated successfully.');
    }

    public function deleteCountryUniversity($id)
    {
        $deleted = DB::table('country_universities')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('country.university')->with('success', 'Country deleted successfully.');
        } else {
            return redirect()->route('country.university')->with('error', 'Failed to delete country.');
        }
    }
}
