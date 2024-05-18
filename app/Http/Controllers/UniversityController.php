<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function manage_university()
    // {
    //     $university = University::with('country','province')->paginate(12);
    //     return view('admin.university.manage-university',compact('university'));
    // }

    public function manage_university(Request $request)
    {
        $countries = Country::all();
        $results = University::with('country', 'province');
        $route = Route::currentRouteName();
        $originUrl = url('');
        $currentUrl = URL::current();
        if (($route == 'approved-university') || ($currentUrl == $originUrl.'/admin/approved-university')) {
            $results->where('is_approved', 1);
        }elseif(($route == 'unapproved-university') || ($currentUrl == $originUrl.'/admin/un-approve-university')){
            $results->where('is_approved', 0);
        }
        if ($request->ajax()) {
            $search = $request->input('search');
            $isApproved = null;
            if (strtolower($search) == 'approve') {
                $isApproved = 1;
            } elseif (strtolower($search) == 'unapprove') {
                $isApproved = 0;
            }
            if ($request->has('university_name') && $request->university_name != '') {
                $results->where('university_name', 'LIKE', "%{$request->university_name}%");
            }
            if ($request->has('country') && $request->country != '') {
                $results->where('country_id', $request->country);
            }
            if ($request->has('approve') && $request->approve != '') {
                $isApproved = $request->approve == 'approve' ? 1 : 0;
                $results->where('is_approved', $isApproved);
            }
            if ($request->has('status') && $request->status != '') {
                $results->where('status', $request->status);
            }
            $results->where(function ($query) use ($search, $isApproved) {
                if (!is_null($isApproved)) {
                    $query->orWhere('is_approved', $isApproved);
                }else{
                    $query->orWhere('is_approved', 1);
                }
                $query->orWhereHas('country', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('province', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
            });
            $results = $results->paginate(12);
            return response()->json([
                'data' => $results,
                'links' => $results->links()->toHtml()
            ]);
        }
        if($request->routeIs('manage-university')){
            return view('admin.university.manage-university', compact('countries'));
        }elseif(($route == 'approved-university') || ($currentUrl == $originUrl.'/admin/approved-university')) {
            return view('admin.university.approved-university', compact('countries'));
        }elseif(($route == 'unapproved-university') || ($currentUrl == $originUrl.'/admin/un-approve-university')){
            return view('admin.university.unapproved-university', compact('countries'));
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_university()
    {
        $college_type=DB::table('schooltype')->where('active',1)->get();
        $currency =DB::table('currencies')->get();
        $countries = Country::get();
        return view('admin.university.create-university',compact('college_type','currency','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_university(Request $request)
    {
        if($request->tab1){
            $validator = Validator::make($request->all(), [
                'university_name' => 'required|max:200',
                'phone_number' => 'required|max:200',
                'email'=>'required|email|max:200',
                'type_of_university' => 'required|max:200',
                'founded_in' => 'required|max:200',
                'total_students' => 'required|max:200',
                'international_students' => 'required|max:200',
                'size_of_campus' => 'required|max:200',
                'male_female_ratio' => 'required|max:200',
                'faculty_student_ratio' => 'required|max:200',
                'expense_amount' => 'required|max:200',
                'expense_currencies' => 'required|max:200',
                'financial_aid' => 'required|max:200',
                'accomodation' => 'required|max:200',
                'website2' => 'required|max:200',
                'website'=>'required',
                'application_cost' => 'required',
                'fafsa_code' => 'required',
                'added_by_name' => 'required',
                'added_on_date' => 'required',
                'testrequired_input'=>'required',
                'application_cost_currencies'=>'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $slugs = Str::slug($request->university_name);
            $id=Auth::user()->id;
            $tst_type = gettype($request->testrequired_input);
            if($tst_type == "string"){
                $testrequired = $request->testrequired_input;
            } else {
                if(isset($request->testrequired_input)){
                    $testrequired = implode(",",$request->testrequired_input);
                } else {
                    $testrequired = "";
                }
            }
            $uniSave = University::updateOrCreate(
                ['id' => $request->university_id],
                [
                    'user_id' => $id,
                    'university_name' => $request->university_name,
                    'university_slug' => $slugs,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,
                    'details' => $request->details,
                    'website' => $request->website,
                    'type_of_university' => $request->type_of_university,
                    'founded_in' => $request->founded_in,
                    'total_students' => $request->total_students,
                    'international_students' => $request->international_students,
                    'size_of_campus' => $request->size_of_campus,
                    'male_female_ratio' => $request->male_female_ratio,
                    'faculty_student_ratio' => $request->faculty_student_ratio,
                    'yearly_hostel_expense_amount' => $request->expense_amount,
                    'yearly_hostel_expense_currencies' => $request->expense_currencies,
                    'financial_aid' => $request->financial_aid,
                    'placement' => $request->placement,
                    'accomodation' => $request->accomodation,
                    'accomodation_details' => $request->accomodation_details,
                    'website2' => $request->website2,
                    'application_cost' => $request->application_cost,
                    'application_cost_currencies' => $request->application_cost_currencies,
                    'fafsa_code' => $request->fafsa_code,
                    'testrequired' => $testrequired,
                    'added_by_name' => $request->added_by_name,
                    'notes' => $request->notes,
                    'added_on_date' => $request->added_on_date,
                    'created_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ]
            );
            $data = [
                'status' => true,
                'university_id' => $uniSave->id,
            ];
            return response()->json($data);
        }elseif($request->tab2){
            if($request->university_id){
                $validator = Validator::make($request->all(), [
                    'country_id' => 'required|max:200',
                    'province_id' => 'required|max:200',
                    'university_location' => 'required|max:200',
                    'city' => 'required|max:200',
                    'zip' => 'required|max:200',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
                }
                $uniSave = DB::table('universities')
                ->WHERE('id', $request->university_id)
                ->update([
                    'country_id' => $request->country_id,
                    'state' => $request->province_id,
                    'university_location' => $request->university_location,
                    'city' => $request->city,
                    'zip' => $request->zip,
                    'map_location' => $request->map_location
                ]);
            }else{
                return response()->json(['status' => false, 'errors' => 'Please Create university'], 422);
            }
            $data = [
                'status' => true,
                'university_id' => $request->university_id,
            ];
            return response()->json($data);
        }
    }

    public function add_uni_ranking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ranking' => 'required|max:200',
            'from_place' => 'required|max:200',
            'year' => 'required|max:200',
            'type' => 'required|max:200',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        if($request->university_id){
            $uniSave = DB::table('university_ranking')
                ->insert([
                    'ranking' => $request->ranking,
                    'from_place' => $request->from_place,
                    'year' => $request->year,
                    'type' => $request->type,
                    'university_id' => $request->university_id,
                    'status' => '1',
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                $data = [
                    'status' => true,
                    'university_id' => $request->university_id,
                ];
            return response()->json($data);
        }else{
            return response()->json(['status' => false, 'errors' => 'Please Create University'], 422);
        }

    }

    public function all_uni_ranking(Request $request, $id = null)
    {
        $id = $id ?? $request->id;
        $data = $id ? DB::table('university_ranking')->where('university_id', $id)->orderBy('id', 'DESC')->get() : null;
        return response()->json($data);
    }



    public function delete_uni_ranking($id)
    {
       $data = DB::table('university_ranking')->where('id',$id)->delete();
       return redirect()->back()->with('success','University Ranking Deleted Successfully');
    }

    public function add_uni_accerediation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'year' => 'required|max:200',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        if($request->university_id){
            if ($request->company_logo) {
                    $company_logo = $request->file('company_logo');
                    $imageName = time() . '_' . $company_logo->getClientOriginalName();
                    $imagePath = 'imagesapi/' . $imageName;
                    $company_logo->move(public_path('imagesapi/'), $imageName);
            }
            $uniSave = DB::table('university_accerediations')
            ->insert([
                'name' => $request->name,
                'year' => $request->year,
                'university_id' => $request->university_id,
                'logo'=> $imagePath,
                'status' => '1',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $data = [
                'status' => true,
                'university_id' => $request->university_id,
            ];
            return response()->json($data);
        }else{
            return response()->json(['status' => false, 'errors' => 'Please Create University'], 422);
        }

    }

    public function all_uni_accerediation(Request $request, $id = null)
    {
        $id = $id ?? $request->id;
        $data = $id ? DB::table('university_accerediations')->where('university_id', $id)->orderBy('id', 'DESC')->get() : null;
        return response()->json($data);
    }

    public function delete_uni_accerediation($id)
    {
       $data = DB::table('university_accerediations')->where('id',$id)->delete();
       return redirect()->back()->with('success','University Accerediation Deleted Successfully');
    }

    public function add_uni_documents(Request $request,$id=null)
    {
        if($request->university_id){
            $uniDoc = DB::table('universities')->where('id', $request->university_id)->first();
            $validator = Validator::make($request->all(), [
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'banner' => 'required|image|mimes:jpeg,png,jpg|max:6048',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            if($request->logo){
                $logo = $request->file('logo');
                $logoName = time() . '_' . $logo->getClientOriginalName();
                $logoPath = 'imagesapi/' . $logoName;
                $logo->move(public_path('imagesapi/'), $logoName);
            }
            if($request->thumbnail){
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
                $thumbnailPath = 'imagesapi/' . $thumbnailName;
                $thumbnail->move(public_path('imagesapi/'), $thumbnailPath);
            }
            if($request->banner){
                $banner = $request->file('banner');
                $bannerName = time() . '_' . $banner->getClientOriginalName();
                $bannerPath = 'imagesapi/' . $bannerName;
                $banner->move(public_path('imagesapi/'), $bannerPath);
            }
            if ($request->images) {
                $images = $request->file('images');
                foreach ($images as $uploadedImage) {
                    $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                    $imagePath = 'imagesapi/' . $imageName;
                    $uploadedImage->move(public_path('imagesapi/'), $imageName);
                    DB::table('university_galary_images')
                    ->insert([
                        'file_name' => $imagePath,
                        'university_id' => $request->university_id,
                        'mime_type'=> '',
                        'status' => '1',
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
            $uniUpd = DB::table('universities')
                ->where('id',$request->university_id)
                ->update([
                    'logo' => $logoPath,
                    'banner' => $bannerPath,
                    'thumbnail'=> $thumbnailPath,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            $data = [
                'status' => true,
                'university_id' => $request->university_id,
            ];
           return response()->json($data);
        }else{
            return response()->json(['status' => false, 'errors' => 'Please Create University'], 422);
        }
    }

    public function university_document(Request $request)
    {
        $uniDoc = DB::table('universities')->Select('logo','banner','thumbnail')->where('id',$request->id)->first();
        $university_gallery = DB::table('university_galary_images')->where('id',$request->id)->get();
        $data = [
            'status' => true,
            'uniDoc' => $uniDoc,
            'university_gallery' => $university_gallery,
        ];
        return response()->json($data);
    }


    public function delete_university($id)
    {
        $university = University::find($id);
        if ($university) {
            $university->delete();
            $data = [
                'status' => true,
                'message' => 'University deleted successfully',
            ];
        } else {
            $data = [
                'status' => false,
                'message' => 'University not found',
            ];
        }
        return redirect()->route('manage-university')->with('success','University Deleted Successfully');
    }


    public function edit_university($id){
        $university = University::find($id);
        $college_type=DB::table('schooltype')->where('active',1)->get();
        $currency =DB::table('currencies')->get();
        $countries = Country::get();
        return view('admin.university.create-university',compact('college_type','university','currency','countries'));
    }

    public function approve_university(Request $request)
    {
        University::findOrFail($request->university_id)->update(['is_approved' => $request->selectedValue]);
        return response()->json(['message' => 'Approve updated successfully']);
    }


    public function update_university()
    {
        $oldUniversities = University::whereDate('updated_at', '<', Carbon::now()->subMonths(3))->paginate(12);
        return view('admin.university.updation-university',compact('oldUniversities'));
    }



}
