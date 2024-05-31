<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\EducationLevel;
use App\Models\Exam;
use App\Models\Fieldsofstudytype;
use App\Models\GradingScheme;
use App\Models\HomeProgramLevel;
use App\Models\Program;
use App\Models\ProgramLevel;
use App\Models\Subject;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function manage_program(Request $request)
    {
        $program = Program::with('study_type', 'educationLevel', 'currency_data', 'ProgramCategory', 'school')
            ->whereHas('school', function ($query) use ($request) {
                if ($request->univerisity_name) {
                    $query->where('university_name', 'LIKE', "%{$request->univerisity_name}%");
                }
            });
        $user=Auth::user();
        if(!($user->hasRole('Administrator'))){
            $program->where('user_id',$user->id);
        }
        if($request->program_name){
            $program->where('name', 'LIKE', "%{$request->program_name}%");
        }
        if($request->approve_status == 'approve'){
            $program->where('is_approved',1);
        } else if($request->approve_status == 'unapprove'){
            $program->where('is_approved',0);
        }
        $program= $program->paginate(12);
        return view('admin.program.manage-program',compact('program'));
    }

    public function approve_program(Request $request)
    {
        $program = Program::with('study_type', 'educationLevel', 'currency_data', 'ProgramCategory', 'school')->where('is_approved',1)
        ->whereHas('school', function ($query) use ($request) {
            if ($request->univerisity_name) {
                $query->where('university_name', 'LIKE', "%{$request->univerisity_name}%");
            }
        });
        $user=Auth::user();
        if(!($user->hasRole('Administrator'))){
            $program->where('user_id',$user->id);
        }
        if($request->program_name){
            $program->where('name', 'LIKE', "%{$request->program_name}%");
        }
        $program= $program->paginate(12);
    return view('admin.program.approve',compact('program'));
    }


    public function add_program(Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole('Administrator')) {
            $universities = University::get();
        } else {
            $universities = University::where('user_id', $user->id)->get();
        }
        $program_category=DB::table('tbl_program_category')->get();
        $all_subject = Subject::where('status', '1')->get();
        $filed_of_study =Fieldsofstudytype::where('status', '1')->get();
        $education_level = EducationLevel::get();
        $currency =Currency::get();
        return view('admin.program.create-program', compact('universities','program_category','all_subject','filed_of_study','education_level','currency'));
    }


    public function store_program(Request $request)
    {
        $request->validate([
            'school_id' => 'required|max:200',
            'prog_category' => 'required|max:200',
            'name' => 'required|max:200',
            'length' => 'required|max:200',
            'programType' => 'required|max:200',
            'programCampus' => 'required|max:200',
            'lang_spec_for_program' => 'required|max:200',
            'fieldsofstudytype' => 'required|max:200',
            'degree_scheme_id' => 'required|max:200',
            'total_credits' => 'required|max:200',
            'application_fee' => 'required|max:200',
            'application_apply_date' => 'required|max:200',
            'application_closing_date' => 'required|max:200',
            'tution_fee' => 'required|max:200',
            'currency' => 'required|max:200',
            'intake' => 'required|max:200',
            'min_gpa' => 'required|max:200',
        ]);
        $sub_type = gettype($request->subject_id_input);
        if($sub_type == "string"){
            $subject_id_input = $request->subject_id_input;
        } else {
            if(isset($request->subject_id_input)){
                $subject_id_input = implode(",",$request->subject_id_input);
            } else {
                $subject_id_input = "";
            }
        }
        $programSave = DB::table('program')
        ->insert([
            'user_id' => Auth::user()->id,
            'school_id' => $request->school_id ?? null,
            'name' => $request->name  ?? null,
            'length' => $request->length  ?? null,
            'programType' => $request->programType  ?? null,
            'programCampus' => $request->programCampus  ?? null,
            'subject_id' => $subject_id_input  ?? null,
            'fieldsofstudytype' => $request->fieldsofstudytype  ?? null,
            'description' => $request->details  ?? null,
            'education_level_id' => $request->education_level_id  ?? null,
            'program_level_id' => $request->program_level_id ?? null,
            'grading_scheme_id' => $request->grading_scheme_id  ?? null,
            'total_credits' => $request->total_credits  ?? null,
            'application_fee' => $request->application_fee  ?? null,
            'application_apply_date' => $request->application_apply_date  ?? null,
            'application_closing_date' => $request->application_closing_date  ?? null,
            'lang_spec_for_program'=>$request->lang_spec_for_program  ?? null,
            'degree_scheme_id'=>$request->degree_scheme_id  ?? null,
            'tution_fee' => $request->tution_fee  ?? null,
            'currency' => $request->currency  ?? null,
            'intake' => $request->intake  ?? null,
            'min_gpa' => $request->min_gpa  ?? null,
            'other_requirements' => $request->other_requirements  ?? null,
            'extra_notes' => $request->extra_notes  ?? null,
            // 'tags' => $request->tags ?? null,
            'priority' => $request->priority ?? null,
            'cost_of_living_fee' => '00.00',
            'cost_of_living' => '00.00',
            'is_approved' => '1',
            'prog_category' => $request->prog_category ?? null,
        ]);
        return redirect()->route('manage-program')->with('success', 'Program Added Successfully');
    }

    public function edit_program($id){
        $program = Program::with('currency_data')->find($id);
        $user = Auth::user();
        if ($user->hasRole('Administrator')) {
            $universities = University::get();
        } else {
            $universities = University::where('user_id', $user->id)->get();
        }
        $program_category=DB::table('tbl_program_category')->get();
        $all_subject = Subject::where('status', '1')->get();
        $filed_of_study =Fieldsofstudytype::where('status', '1')->get();
        $education_level = EducationLevel::get();
        $currency =Currency::get();
        return view('admin.program.edit-program', compact('universities','program_category','all_subject','filed_of_study','education_level','currency','program'));
    }

    public function view_program($id){
        $program = Program::with('study_type', 'educationLevel', 'currency_data', 'ProgramCategory', 'school')->where('is_approved',1)->find($id);
        return view('admin.program.program-details',compact('program'));
    }


    public function update_program(Request $request,$id){
        $request->validate([
            'school_id' => 'required|max:200',
            'prog_category' => 'required|max:200',
            'name' => 'required|max:200',
            'length' => 'required|max:200',
            'programType' => 'required|max:200',
            'programCampus' => 'required|max:200',
            'lang_spec_for_program' => 'required|max:200',
            'fieldsofstudytype' => 'required|max:200',
            'grading_scheme_id' => 'required|max:200',
            'degree_scheme_id' => 'required|max:200',
            'total_credits' => 'required|max:200',
            'application_fee' => 'required|max:200',
            'application_apply_date' => 'required|max:200',
            'application_closing_date' => 'required|max:200',
            'tution_fee' => 'required|max:200',
            'currency' => 'required|max:200',
            'intake' => 'required|max:200',
            'min_gpa' => 'required|max:200',
        ]);
        $sub_type = gettype($request->subject_id_input);
        if($sub_type == "string"){
            $subject_id_input = $request->subject_id_input;
        } else {
            if(isset($request->subject_id_input)){
                $subject_id_input = implode(",",$request->subject_id_input);
            } else {
                $subject_id_input = "";
            }
        }
        $programSave = Program::find($id);
        $programSave->update([
            'user_id' => Auth::user()->id,
            'school_id' => $request->school_id ?? null,
            'name' => $request->name  ?? null,
            'length' => $request->length  ?? null,
            'programType' => $request->programType  ?? null,
            'programCampus' => $request->programCampus  ?? null,
            'subject_id' => $subject_id_input  ?? null,
            'fieldsofstudytype' => $request->fieldsofstudytype  ?? null,
            'description' => $request->details  ?? null,
            'education_level_id' => $request->education_level_id  ?? null,
            'program_level_id' => $request->program_level_id ?? null,
            'grading_scheme_id' => $request->grading_scheme_id  ?? null,
            'total_credits' => $request->total_credits  ?? null,
            'degree_scheme_id'=>$request->degree_scheme_id ?? null,
            'application_fee' => $request->application_fee  ?? null,
            'application_apply_date' => $request->application_apply_date  ?? null,
            'application_closing_date' => $request->application_closing_date  ?? null,
            'tution_fee' => $request->tution_fee  ?? null,
            'currency' => $request->currency  ?? null,
            'intake' => $request->intake  ?? null,
            'min_gpa' => $request->min_gpa  ?? null,
            'other_requirements' => $request->other_requirements  ?? null,
            'extra_notes' => $request->extra_notes  ?? null,
            // 'tags' => $request->tags ?? null,
            'priority' => $request->priority ?? null,
            'cost_of_living_fee' => '00.00',
            'cost_of_living' => '00.00',
            'is_approved' => '1',
            'prog_category' => $request->prog_category ?? null,
        ]);
        return redirect()->route('manage-program')->with('success', 'Program Updated Successfully');
    }


    public function req_score_prog_add(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'program_id' => 'required',
            'listening_score' => 'required',
            'writing_score' => 'required',
            'reading_score' => 'required',
            'speaking_score' => 'required',
            'program_id' => 'required',
        ]);
        $reqScore = DB::table('program_english_required')->insert([
            'program_id' => $request->program_id,
            'type' => $request->type,
            'listening_score' => $request->listening_score,
            'writing_score' => $request->writing_score,
            'reading_score' => $request->reading_score,
            'speaking_score' => $request->speaking_score,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return response()->json(['status'=>true,'success'=>'Data Inserted Successfully']);
    }

    public function fetch_req_score_prog(Request $request)
    {
       $data = DB::table('program_english_required')->where('program_id',$request->program_id)->get();
       return response()->json([
        'status'=>true,
        'data'=>$data
       ]);
    }

    public function delete_score_program(Request $request){
        $deleteScore = DB::table('program_english_required')->where('id', $request->score_id)->delete();
        if($deleteScore){
            return response()->json(['status'=>true,'success'=>'Data Deleted Successfully']);
        } else {
            return response()->json(['status'=>false,'success'=>'Data Not Deleted']);
        }
    }

    public function update_program_commission(Request $request)
    {
        DB::table('program')
            ->Where('id', $request->program_id)
            ->update([
                'commission' => $request->commission,
                'commission_for_program_payment_to_franchise' => $request->commission_for_program_payment_to_franchise,
                'commission_for_added_program_payment_to_franchise' => $request->commission_for_added_program_payment_to_franchise,
                'commission_for_program_payment_to_counselor' => $request->commission_for_program_payment_to_counselor
        ]);
        return response()->json(['message'=>'Program Commission Update Successfully']);
    }


    public function program_level_details(Request $request)
    {
        $home_program=HomeProgramLevel::with('home_program_levels')->where('status',1);
        if($request->program_level){
                $home_program->where('program_level_id',$request->program_level);
        }
        $home_program=$home_program->paginate(12);
        $program_level=ProgramLevel::get();
        return view('admin.program.home-program-level',compact('home_program','program_level'));
    }

    public function create_program_level(){
        $program_level=ProgramLevel::get();
        return view('admin.program.add-home-program-level',compact('program_level'));
    }

    public function store_program_level(Request $request){
        $request->validate([
            'program_level_id' => 'required',
            'description' => 'required',
        ]);

        HomeProgramLevel::create($request->except('_token'));
        return redirect()->route('program-level-details')->with('success','Data Inserted Successfully');
    }

    public function edit_program_level($id){
        $program_level=ProgramLevel::get();
        $home_program=HomeProgramLevel::find($id);
        return view('admin.program.edit-home-program-level',compact('program_level','home_program'));
    }

    public function update_program_level(Request $request,$id){
        $request->validate([
            'program_level_id' => 'required',
            'description' => 'required',
        ]);
        $programLevel = HomeProgramLevel::find($id);
        $programLevel->update([
            'program_level_id' => $request->program_level_id,
            'description' => $request->description,
        ]);
        return redirect()->route('program-level-details')->with('success','Data Updated Successfully');
    }

    public function delete_program_level($id){
        $delete_program=HomeProgramLevel::find($id);
        $delete_program->delete();
        return redirect()->route('program-level-details')->with('success','Data Deleted Successfully');
    }



    // educationlevel

    public function education_level(Request $request){
        $name = $request->get('name');
        $educationlevel = EducationLevel::when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(12);

        return view('admin.program.educationlevel.index', compact('educationlevel'));
    }

    public function education_level_create(){
        return view('admin.program.educationlevel.create');
    }

    public function education_level_store(Request $request){
        $request->validate([
            'name' => 'required',
            'item_order'=>'required|numeric'
        ]);
        EducationLevel::create($request->except('_token'));
        return redirect()->route('education-level')->with('success','Data Inserted Successfully');
    }

    public function education_level_edit($id){
        $educationlevel=EducationLevel::find($id);
        return view('admin.program.educationlevel.edit',compact('educationlevel'));
    }

    public function education_level_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'item_order'=>'required|numeric'
        ]);
        $educationlevel=EducationLevel::find($id);
        $educationlevel->update([
            'name' => $request->name,
            'item_order'=>$request->item_order
        ]);
        return redirect()->route('education-level')->with('success','Data Updated Successfully');
    }

    // public function education_level_delete($id){
    //     $educationlevel=EducationLevel::find($id);
    //     $educationlevel->delete();
    //     dd($educationlevel);
    //     return redirect()->route('education-level')->with('success','Data Deleted Successfully');
    // }
     // educationlevel

    public function program_level(Request $request){
        $name = $request->get('name');
        $programlevel = ProgramLevel::when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(12);

        return view('admin.program.programlevel.index', compact('programlevel'));
    }

    public function program_level_create(){
        return view('admin.program.programlevel.create');
    }

    public function program_level_store(Request $request){
        $request->validate([
            'name' => 'required',
            'orders'=>'required|numeric'
        ]);
        ProgramLevel::create($request->except('_token'));
        return redirect()->route('program-level')->with('success','Data Inserted Successfully');
    }

    public function program_level_edit($id){
        $programlevel=ProgramLevel::find($id);
        return view('admin.program.programlevel.edit',compact('programlevel'));
    }

    public function program_level_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'orders'=>'required|numeric'
        ]);
        $programlevel=programLevel::find($id);
        $programlevel->update([
            'name' => $request->name,
            'orders'=>$request->orders
        ]);
        return redirect()->route('program-level')->with('success','Data Updated Successfully');
    }

    // grading scheme
    public function grading_scheme(Request $request){
        $name = $request->get('name');
        $country_id = $request->get('country_id');
        $education_level_id = $request->get('education_level_id');

        $grading_scheme = GradingScheme::when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->when($country_id, function ($query) use ($country_id) {
            return $query->where('country_id', $country_id);
        })->when($education_level_id, function ($query) use ($education_level_id) {
            return $query->where('education_level_id', $education_level_id);
        })->with('country','education_level')->paginate(12);

        $country=Country::get();
        $education_level =EducationLevel::get();
        return view('admin.program.gradingscheme.index',compact('grading_scheme','country','education_level'));
    }

    public function grading_scheme_create()
    {
        $country=Country::get();
        $education_level =EducationLevel::get();
        return view('admin.program.gradingscheme.create',compact('country','education_level'));
    }

    public function grading_scheme_store(Request $request){
        $request->validate([
            'name' => 'required|max:200',
            'country_id'=>'required|numeric',
            'education_level_id'=>'required|numeric'
        ]);
        GradingScheme::create($request->except('_token'));
        return redirect()->route('grading-scheme')->with('success','Data Inserted Successfully');
    }

    public function grading_scheme_edit($id){
        $gradingScheme=GradingScheme::find($id);
        $country=Country::get();
        $education_level =EducationLevel::get();
        return view('admin.program.gradingscheme.edit',compact('gradingScheme','country','education_level'));
    }

    public function grading_scheme_update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:200',
            'country_id'=>'required|numeric',
            'education_level_id'=>'required|numeric'
        ]);
        $grading_scheme=GradingScheme::find($id);
        $grading_scheme->update([
            'name' => $request->name,
            'country_id'=>$request->country_id,
            'education_level_id'=>$request->education_level_id,
        ]);
        return redirect()->route('grading-scheme')->with('success','Data Updated Successfully');
    }
    // exam


    public function exam(Request $request){
        $name = $request->get('name');
        $exam = Exam::when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(12);

        return view('admin.program.exam.index', compact('exam'));
    }

    public function exam_create(){
        return view('admin.program.exam.create');
    }

    public function exam_store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        Exam::create($request->except('_token'));
        return redirect()->route('exam')->with('success','Data Inserted Successfully');
    }

    public function exam_edit($id){
        $exam=Exam::find($id);
        return view('admin.program.exam.edit',compact('exam'));
    }

    public function exam_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
        ]);
        $exam=Exam::find($id);
        $exam->update([
            'name' => $request->name,
        ]);
        return redirect()->route('exam')->with('success','Data Updated Successfully');
    }


    public function exam_delete($id){
        $exam=Exam::find($id);
        $exam->delete();
        return redirect()->route('exam')->with('success','Data Deleted Successfully');
    }


    // field of study

    public function field_of_study(Request $request){
        $name = $request->get('name');
        $status = $request->get('status');
        $fieldofstudy = Fieldsofstudytype::when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->when($status !== null, function ($query) use ($status) {
            return $query->where('status', $status);
        })->paginate(12);

        return view('admin.program.fieldofstudy.index', compact('fieldofstudy'))->with('status', $status)->with('name', $name);
    }

    public function field_of_study_create(){
        return view('admin.program.fieldofstudy.create');
    }

    public function field_of_study_store(Request $request){
        $request->validate([
            'name' => 'required',
            'status'=>'required'
        ]);
        Fieldsofstudytype::create($request->except('_token'));
        return redirect()->route('field-of-study')->with('success','Data Inserted Successfully');
    }

    public function field_of_study_edit($id){
        $fieldOfStudy=Fieldsofstudytype::find($id);
        return view('admin.program.fieldofstudy.edit',compact('fieldOfStudy'));
    }

    public function field_of_study_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'status'=>'required'
        ]);
        $fieldofstudy=Fieldsofstudytype::find($id);
        $fieldofstudy->update([
            'name' => $request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('field-of-study')->with('success','Data Updated Successfully');
    }
    public function field_of_study_delete($id){
        $fieldofstudy=Fieldsofstudytype::find($id);
        $fieldofstudy->delete();
        return redirect()->route('field-of-study')->with('success','Data Deleted Successfully');
    }
    // subjects

    public function subjects(Request $request){
        $name = $request->get('name');
        $status = $request->get('status');
        $subjects = Subject::when($name, function ($query) use ($name) {
            return $query->where('subject_name', 'like', '%' . $name . '%');
        })->when($status !== null, function ($query) use ($status) {
            return $query->where('status', $status);
        })->paginate(12);
        return view('admin.program.subjects.index', compact('subjects'))->with('status', $status)->with('name', $name);
    }

    public function subjects_create(){
        return view('admin.program.subjects.create');
    }

    public function subjects_store(Request $request){
        $request->validate([
            'subject_name' => 'required',
            'status'=>'required'
        ]);
        Subject::create($request->except('_token'));
        return redirect()->route('subject')->with('success','Data Inserted Successfully');
    }

    public function subjects_edit($id){
        $subject=Subject::find($id);
        return view('admin.program.subjects.edit',compact('subject'));
    }

    public function subjects_update(Request $request,$id){
        $request->validate([
            'subject_name' => 'required',
            'status'=>'required'
        ]);
        $subject=Subject::find($id);
        $subject->update([
            'name' => $request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('subject')->with('success','Data Updated Successfully');
    }
    public function subjects_delete($id){
        $subject=Subject::find($id);
        $subject->delete();
        return redirect()->route('subject')->with('success','Data Deleted Successfully');
    }
}
