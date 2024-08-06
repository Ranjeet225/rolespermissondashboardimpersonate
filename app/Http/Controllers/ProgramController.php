<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\Documents;
use App\Models\EducationLevel;
use App\Models\EngProficiencyLevel;
use App\Models\Exam;
use App\Models\Fieldsofstudytype;
use App\Models\GradingScheme;
use App\Models\HomeProgramLevel;
use App\Models\Program;
use App\Models\ProgramDiscipline;
use App\Models\ProgramLevel;
use App\Models\ProgramSubdiscipline;
use App\Models\ProgramSubLevel;
use App\Models\SchoolAttended;
use App\Models\Student;
use App\Models\Subject;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PaymentsLink;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function manage_program(Request $request)
    {
        $program = Program::with('study_type', 'educationLevel','programLevel', 'currency_data', 'ProgramCategory', 'school')
            ->whereHas('school', function ($query) use ($request) {
                if ($request->univerisity_name) {
                    $query->where('university_name', 'LIKE', "%{$request->univerisity_name}%");
                }
            })->latest();
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
        $eng_proficiency_level =EngProficiencyLevel::get();
        return view('admin.program.manage-program',compact('program','eng_proficiency_level'));
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
        // if ($user->hasRole('Administrator')) {
            $universities = University::get();
        // } else {
        //     $universities = University::where('user_id', $user->id)->get();
        // }
        // $program_category=DB::table('tbl_program_category')->get();
        $program_discipline =ProgramDiscipline::select('name','id')->where('status', '1')->get();
        $all_subject = Subject::where('status', '1')->get();
        $filed_of_study =Fieldsofstudytype::where('status', '1')->get();
        $grading_scheme=GradingScheme::select('name','id')->get();
        $program_level = ProgramLevel::get();
        $currency =Currency::get();
        return view('admin.program.create-program', compact('universities','program_discipline','grading_scheme','all_subject','filed_of_study','program_level','currency'));
    }


    public function store_program(Request $request)
    {
        $request->validate([
            'school_id' => 'required|max:200',
            'name' => 'required|max:200',
            'length' => 'required|max:200',
            'programType' => 'required|max:200',
            'programCampus' => 'required|max:200',
            'lang_spec_for_program' => 'required|max:200',
            'application_fee' => 'required|max:200',
            'application_apply_date' => 'required|max:200',
            'application_closing_date' => 'required|max:200',
            'tution_fee' => 'required|max:200',
            'currency' => 'required|max:200',
            'intake' => 'required|max:200',
            'program_discipline'=>'required'
        ]);
        // $sub_type = gettype($request->subject_id_input);
        // if($sub_type == "string"){
        //     $subject_id_input = $request->subject_id_input;
        // } else {
        //     if(isset($request->subject_id_input)){
        //         $subject_id_input = implode(",",$request->subject_id_input);
        //     } else {
        //         $subject_id_input = "";
        //     }
        // }
        $programSave = DB::table('program')
        ->insert([
            'user_id' => Auth::user()->id,
            'school_id' => $request->school_id ?? null,
            'name' => $request->name  ?? null,
            'length' => $request->length  ?? null,
            'programType' => $request->programType  ?? null,
            'programCampus' => $request->programCampus  ?? null,
            'grading_number' => $request->grading_number  ?? null,
            'description' => $request->details  ?? null,
            'grading_scheme_id' => $request->grading_scheme_id  ?? null,
            'application_fee' => $request->application_fee  ?? null,
            'application_apply_date' => $request->application_apply_date  ?? null,
            'application_closing_date' => $request->application_closing_date  ?? null,
            'lang_spec_for_program'=>$request->lang_spec_for_program  ?? null,
            'program_level_id'=>$request->program_level  ?? null,
            'program_sub_level'=>$request->program_sub_level  ?? null,
            'education_level_id'=>$request->education_level  ?? null,
            'program_discipline'=>$request->program_discipline ?? null,
            'program_subdiscipline'=>$request->program_subdiscipline ?? null,
            'tution_fee' => $request->tution_fee  ?? null,
            'currency' => $request->currency  ?? null,
            'intake' => $request->intake  ?? null,
            'min_gpa' => $request->min_gpa  ?? null,
            'other_exam'=>$request->other_exam,
            'other_requirements' => $request->other_requirements  ?? null,
            'extra_notes' => $request->extra_notes  ?? null,
            // 'tags' => $request->tags ?? null,
            'priority' => $request->priority ?? null,
            'cost_of_living_fee' => '00.00',
            'cost_of_living' => '00.00',
            'is_approved' => '1',
        ]);
        return redirect()->route('manage-program')->with('success', 'Program Added Successfully');
    }

    public function edit_program($id){
        $program = Program::with('currency_data')->find($id);
        // $user = Auth::user();
        // if ($user->hasRole('Administrator')) {
            $universities = University::get();
        // } else {
        //     $universities = University::where('user_id', $user->id)->get();
        // }
        $program_discipline =ProgramDiscipline::select('name','id')->where('status', '1')->get();
        $program_subdiscipline =ProgramSubdiscipline::select('name','id')->where('id',$program->program_subdiscipline)->where('status', '1')->get();
        $country_id=University::where('id',$program->school_id)->value('country_id');
        $grading_scheme=GradingScheme::select('name','id')->where('id',$program->grading_scheme_id)->get();
        $program_category=DB::table('tbl_program_category')->get();
        $all_subject = Subject::where('status', '1')->get();
        $filed_of_study =Fieldsofstudytype::where('status', '1')->get();
        $program_level = ProgramLevel::get();
        $program_sublevel = ProgramSubLevel::where('id',$program->program_sub_level)->get();
        $education_level = EducationLevel::where('id',$program->education_level_id)->get();
        $other_exam = Exam::where('id',$program->other_exam)->get();
        $currency=Currency::get();
        return view('admin.program.edit-program', compact('grading_scheme','other_exam','program_sublevel','program_level','program_discipline','program_subdiscipline','universities','program_category','all_subject','filed_of_study','education_level','currency','program'));
    }

    public function view_program($id){
        $program = Program::with('study_type', 'programLevel','educationLevel', 'currency_data', 'ProgramCategory', 'school')->where('is_approved',1)->find($id);
        return view('admin.program.program-details',compact('program'));
    }


    public function update_program(Request $request,$id){
        $request->validate([
            'school_id' => 'required|max:200',
            'name' => 'required|max:200',
            'length' => 'required|max:200',
            'programType' => 'required|max:200',
            'programCampus' => 'required|max:200',
            'lang_spec_for_program' => 'required|max:200',
            'program_level' => 'required|max:200',
            'application_fee' => 'required|max:200',
            'application_apply_date' => 'required|max:200',
            'application_closing_date' => 'required|max:200',
            'tution_fee' => 'required|max:200',
            'currency' => 'required|max:200',
            'intake' => 'required|max:200',
            'program_discipline'=>'required|max:200'
        ]);
        // $sub_type = gettype($request->subject_id_input);
        // if($sub_type == "string"){
        //     $subject_id_input = $request->subject_id_input;
        // } else {
        //     if(isset($request->subject_id_input)){
        //         $subject_id_input = implode(",",$request->subject_id_input);
        //     } else {
        //         $subject_id_input = "";
        //     }
        // }
        // dd($request->all());
        $programSave = Program::find($id);
        $programSave->update([
            'user_id' => Auth::user()->id,
            'school_id' => $request->school_id,
            'name' => $request->name,
            'length' => $request->length,
            'programType' => $request->programType,
            'programCampus' => $request->programCampus,
            'grading_number' => $request->grading_number,
            'fieldsofstudytype' => $request->fieldsofstudytype,
            'description' => $request->details,
            'program_level_id'=>$request->program_level,
            'program_sub_level'=>$request->program_sub_level  ?? null,
            'education_level_id'=>$request->education_level,
            'grading_scheme_id' => $request->grading_scheme_id,
            'application_fee' => $request->application_fee,
            'other_exam'=>$request->other_exam,
            'application_apply_date' => $request->application_apply_date,
            'application_closing_date' => $request->application_closing_date,
            'program_discipline'=>$request->program_discipline,
            'program_subdiscipline'=>$request->program_subdiscipline,
            'tution_fee' => $request->tution_fee,
            'currency' => $request->currency,
            'intake' => $request->intake,
            'min_gpa' => $request->min_gpa,
            'other_requirements' => $request->other_requirements,
            'extra_notes' => $request->extra_notes,
            // 'tags' => $request->tags,
            'priority' => $request->priority,
            'cost_of_living_fee' => '00.00',
            'cost_of_living' => '00.00',
            'is_approved' => 1,
        ]);
        return redirect()->route('manage-program')->with('success', 'Program Updated Successfully');
    }


    public function req_score_prog_add(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'program_id' => 'required',
            'listening_score' => 'required|numeric',
            'writing_score' => 'required|numeric',
            'reading_score' => 'required|numeric',
            'speaking_score' => 'required|numeric',
            'program_id' => 'required',
        ]);
        $reqScore = DB::table('program_english_required')
            ->updateOrInsert(
                ['program_id' => $request->program_id],
                [
                    'type' => $request->type,
                    'listening_score' => $request->listening_score,
                    'writing_score' => $request->writing_score,
                    'reading_score' => $request->reading_score,
                    'speaking_score' => $request->speaking_score,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        return response()->json(['status'=>true,'success'=>'Data Inserted Successfully','program_id'=>$request->program_id]);
    }

    public function fetch_req_score_prog(Request $request)
    {
       $data = DB::table('program_english_required')->where('program_id',$request->program_id)->get();
       return response()->json([
        'status'=>true,
        'data'=>$data,
        'program_id'=>$request->program_id
       ]);
    }

    public function delete_score_program(Request $request){
        $score = DB::table('program_english_required')->where('id', $request->score_id)->first();
        $program_id = $score->program_id;
        if($score){
            $deleteScore = DB::table('program_english_required')->where('id', $request->score_id)->delete();
            return response()->json(['status'=>true,'success'=>'Data Deleted Successfully','program_id'=>$program_id]);
        } else {
            return response()->json(['status'=>false,'success'=>'Data Not Exist','program_id',$score->program_id]);
        }
    }

    public function update_program_commission(Request $request)
    {
        DB::table('program')
            ->Where('id', $request->program_commission_id)
            ->update([
                'commission' => $request->commission,
                'commission_for_program_payment_to_franchise' => $request->commission_for_program_payment_to_franchise,
                'commission_for_added_program_payment_to_franchise' => $request->commission_for_added_program_payment_to_franchise,
                'commission_for_program_payment_to_counselor' => $request->commission_for_program_payment_to_counselor
        ]);
        return response()->json(['message'=>'Program Commission Update Successfully','status'=>true]);
    }

    public function get_program_commission(Request $request)
    {
        $program_commission = DB::table('program')
            ->select('commission','commission_for_program_payment_to_franchise','commission_for_added_program_payment_to_franchise','commission_for_program_payment_to_counselor')
            ->where('id', $request->program_id)
            ->first();
        return response()->json(['data'=>$program_commission]);
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

    public function create_program_details(){
        $program_level=ProgramLevel::get();
        return view('admin.program.add-home-program-details',compact('program_level'));
    }

    public function store_program_details(Request $request){
        $request->validate([
            'program_level_id' => 'required',
            'description' => 'required',
        ]);

        HomeProgramLevel::create($request->except('_token'));
        return redirect()->route('program-level-details')->with('success','Data Inserted Successfully');
    }

    public function edit_program_details($id){
        $program_level=ProgramLevel::get();
        $home_program=HomeProgramLevel::find($id);
        return view('admin.program.edit-home-program-details',compact('program_level','home_program'));
    }

    public function update_program_details(Request $request,$id){
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

    public function delete_program_details($id){
        $delete_program=HomeProgramLevel::find($id);
        if($delete_program){
            $delete_program->delete();
            return redirect()->route('program-level-details')->with('success','Data Deleted Successfully');
        }
        return redirect()->route('program-level-details')->with('error','Data not found');
    }


    // program sublevel
    public function program_sub_level(){
        $program_sub_level=ProgramSubLevel::with('programLevel')->paginate(12);
        return view('admin.program.programsublevel.index',compact('program_sub_level'));
    }

    public function program_sub_level_create(){
        $program_level=ProgramLevel::paginate(12);
        return view('admin.program.programsublevel.create',compact('program_level'));
    }

    public function program_sub_level_store(Request $request){
        $request->validate([
            'program_id' => 'required',
            'name' => 'required',
        ]);

        ProgramSubLevel::create($request->except('_token'));
        return redirect()->route('program-sub-level')->with('success','Data Inserted Successfully');
    }

    public function program_sub_level_edit($id){
        $program_sub_level=ProgramSubLevel::find($id);
        $programlevels=ProgramLevel::paginate(12);
        return view('admin.program.programsublevel.edit',compact('program_sub_level','programlevels'));
    }

    public function program_sub_level_update(Request $request,$id){
        $request->validate([
            'program_id' => 'required',
            'name' => 'required',
        ]);

        $programsubdiscipline=ProgramSubLevel::find($id);
        $programsubdiscipline->update($request->except('_token'));
        return redirect()->route('program-sub-level')->with('success','Data Updated Successfully');
    }

    public function delete_program_sub_level($id){
        $programsubdiscipline=ProgramSubLevel::find($id);
        if($programsubdiscipline){
            $programsubdiscipline->delete();
            return redirect()->route('program-sub-level')->with('success','Data Deleted Successfully');
        }
        return redirect()->route('program-sub-level')->with('error','Data not found');
    }



    // educationlevel

    public function education_level(Request $request){
        $name = $request->get('name');
        $educationlevel = EducationLevel::with('programLevel','program_sublevel')->when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(12);

        return view('admin.program.educationlevel.index', compact('educationlevel'));
    }

    public function education_level_create(){
        $programlevels =ProgramLevel::select('name','id')->get();
        return view('admin.program.educationlevel.create',compact('programlevels'));
    }

    public function education_level_store(Request $request){
        $request->validate([
            'name' => 'required',
            'program_level_id'=>'required',
        ]);
        EducationLevel::create($request->except('_token'));
        return redirect()->route('education-level')->with('success','Data Inserted Successfully');
    }

    public function education_level_edit($id){
        $educationlevel=EducationLevel::find($id);
        $programlevels =ProgramLevel::select('name','id')->get();
        $program_sublevels=ProgramSubLevel::get();
        return view('admin.program.educationlevel.edit',compact('educationlevel','programlevels','program_sublevels'));
    }

    public function education_level_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'program_level_id'=>'required',
        ]);
        $educationlevel=EducationLevel::find($id);
        $educationlevel->update([
            'name' => $request->name,
            'program_level_id'=>$request->program_level_id,
            'program_sublevel_id'=>$request->program_sublevel_id,
        ]);
        return redirect()->route('education-level')->with('success','Data Updated Successfully');
    }

    public function education_level_delete($id){
        if(EducationLevel::find($id)){
            EducationLevel::find($id)->delete();
            return redirect()->route('education-level')->with('success','Data Deleted Successfully');
        }else{
            return redirect()->route('education-level')->with('error','Data not found');
        }
    }
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
        ]);
        $programlevel=programLevel::find($id);
        $programlevel->update([
            'name' => $request->name,
            'orders'=>$request->orders
        ]);
        return redirect()->route('program-level')->with('success','Data Updated Successfully');
    }

    public function program_level_delete($id){
        if(ProgramLevel::find($id)){
            ProgramLevel::find($id)->delete();
            return redirect()->route('program-level')->with('success','Data Deleted Successfully');
        }else{
            return redirect()->route('program-level')->with('error','Data not found');
        }
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


    public function grading_scheme_delete($id){
        GradingScheme::find($id)->delete();
        return redirect()->route('grading-scheme')->with('success','Data Deleted Successfully');
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
        $exam = Exam::with('program_level')->when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(12);

        return view('admin.program.exam.index', compact('exam'));
    }

    public function exam_create(){
        $programlevels =ProgramLevel::select('name','id')->get();
        return view('admin.program.exam.create',compact('programlevels'));
    }

    public function exam_store(Request $request){
        $request->validate([
            'name' => 'required',
            'program_level_id'=>'required',
            'number'=>'required|max:11'
        ]);
        Exam::create($request->except('_token'));
        return redirect()->route('exam')->with('success','Data Inserted Successfully');
    }

    public function exam_edit($id){
        $exam=Exam::find($id);
        $programlevels =ProgramLevel::select('name','id')->get();
        return view('admin.program.exam.edit',compact('exam','programlevels'));
    }

    public function exam_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'program_level_id'=>'required',
            'number'=>'required|max:11'
        ]);
        $exam=Exam::find($id);
        $exam->update([
            'name' => $request->name,
            'program_level_id'=>$request->program_level_id,
            'number'=>$request->number
        ]);
        return redirect()->route('exam')->with('success','Data Updated Successfully');
    }


    public function exam_delete($id){
        $exam=Exam::find($id);
        if($exam){
            $exam->delete();
            return redirect()->route('exam')->with('success','Data Deleted Successfully');
        }else{
            return redirect()->route('exam')->with('error','Data Not Found');
        }
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
        $fieldofstudy = Fieldsofstudytype::find($id);
        if($fieldofstudy){
            $fieldofstudy->delete();
            return redirect()->route('field-of-study')->with('success','Data Deleted Successfully');
        }
        return redirect()->route('field-of-study')->with('error','Data Not Found');
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
        $subject = Subject::find($id);
        if($subject){
            $subject->delete();
            return redirect()->route('subject')->with('success','Data Deleted Successfully');
        } else {
            return redirect()->route('subject')->with('success','Data not found');
        }
    }


    public function eng_proficiency_level(){
        $eng_proficiency_level=EngProficiencyLevel::paginate(12);
        return view('admin.program.eng_proficiency_level.index', compact('eng_proficiency_level'));
    }
    public function eng_proficiency_level_create(){
        return view('admin.program.eng_proficiency_level.create');
    }
    public function eng_proficiency_level_store(Request $request){
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'status'=>'required'
        ]);
        EngProficiencyLevel::create($request->except('_token'));
        return redirect()->route('eng-proficiency-level')->with('success','Data Inserted Successfully');
    }
    public function eng_proficiency_level_edit($id){
        $eng_level=EngProficiencyLevel::find($id);
        return view('admin.program.eng_proficiency_level.edit',compact('eng_level'));
    }
    public function eng_proficiency_level_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'status'=>'required',
            'number' => 'required',
        ]);
        $eng_level=EngProficiencyLevel::find($id);
        $eng_level->update($request->except('_token'));
        return redirect()->route('eng-proficiency-level')->with('success','Data Updated Successfully');
    }
    public function eng_proficiency_level_delete($id){
        $eng_level = EngProficiencyLevel::find($id);
        if($eng_level) {
            $eng_level->delete();
            return redirect()->route('eng-proficiency-level')->with('success','Data Deleted Successfully');
        } else {
            return redirect()->route('eng-proficiency-level')->with('success','Data not found');
        }
    }


    public function program_discipline(){
        $program_discipline=ProgramDiscipline::paginate(12);
        return view('admin.program.program_discipline.index', compact('program_discipline'));
    }
    public function program_discipline_create(){
        return view('admin.program.program_discipline.create');
    }
    public function program_discipline_store(Request $request){
        $request->validate([
            'name' => 'required',
            'status'=>'required'
        ]);
        ProgramDiscipline::create($request->except('_token'));
        return redirect()->route('program-discipline')->with('success','Data Inserted Successfully');
    }
    public function program_discipline_edit($id){
        $program_discipline=ProgramDiscipline::find($id);
        return view('admin.program.program_discipline.edit',compact('program_discipline'));
    }
    public function program_discipline_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'status'=>'required'
        ]);
        $program_discipline=ProgramDiscipline::find($id);
        $program_discipline->update($request->except('_token'));
        return redirect()->route('program-discipline')->with('success','Data Updated Successfully');
    }
    public function program_discipline_delete($id){
        $program_subdiscipline=ProgramSubdiscipline::where('program_discipline_id',$id)->first();
        if($program_subdiscipline){
            return redirect()->route('program-discipline')->with('error','Can Not Delete Subdicipline exit not found');
        }
        if(ProgramDiscipline::find($id)){
            ProgramDiscipline::find($id)->delete();
            return redirect()->route('program-discipline')->with('success','Data Deleted Successfully');
        }
        return redirect()->route('program-discipline')->with('error','Data not found');
    }


    public function program_subdiscipline(){
        $program_subdiscipline=ProgramSubdiscipline::with('programdiscipline')->paginate(12);
        return view('admin.program.program_subdiscipline.index', compact('program_subdiscipline'));
    }
    public function program_subdiscipline_create(){
        $program_discipline=ProgramDiscipline::all();
        return view('admin.program.program_subdiscipline.create',compact('program_discipline'));
    }
    public function program_subdiscipline_store(Request $request){
        $request->validate([
            'name' => 'required',
            'status'=>'required',
            'program_discipline_id'=>'required'
        ]);
        ProgramSubdiscipline::create($request->except('_token'));
        return redirect()->route('program-subdiscipline')->with('success','Data Inserted Successfully');
    }
    public function program_subdiscipline_edit($id){
        $program_subdiscipline=ProgramSubdiscipline::find($id);
        $program_discipline=ProgramDiscipline::all();
        return view('admin.program.program_subdiscipline.edit',compact('program_subdiscipline','program_discipline'));
    }
    public function program_subdiscipline_update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'status'=>'required',
            'program_discipline_id'=>'required'
        ]);
        $program_subdiscipline=ProgramSubdiscipline::find($id);
        $program_subdiscipline->update($request->except('_token'));
        return redirect()->route('program-subdiscipline')->with('success','Data Updated Successfully');
    }
    public function program_subdiscipline_delete($id){
        $program_subdiscipline=ProgramSubdiscipline::find($id);
        if($program_subdiscipline){
            $program_subdiscipline->delete();
            return redirect()->route('program-subdiscipline')->with('success','Data Deleted Successfully');
        }
        return redirect()->route('program-subdiscipline')->with('error','Data not found');
    }


    public function get_program_sub_discipline(Request $request){
        if($request->ajax()){
            $program_subdiscipline=ProgramSubdiscipline::where('status', '1')->where('program_discipline_id',$request->program_discipline_id)->get();
            return response()->json($program_subdiscipline);
        }
    }

    public function get_education_level(Request $request)
    {
        if($request->ajax()){
            $programLevelId=is_array($request->program_level_id) ? implode(',',$request->program_level_id) : $request->program_level_id;
            $program_sublevel_id=is_array($request->program_sublevel_id) ? implode(',',$request->program_sublevel_id):$request->program_sublevel_id;
            $education_level=EducationLevel::where('program_level_id',$programLevelId)->where('program_sublevel_id',$program_sublevel_id)->get();
            return response()->json($education_level);
        }
    }

    public function get_program_sublevel(Request $request)
    {
        if($request->ajax()){
            $program_level_id=is_array($request->program_level_id) ? $request->program_level_id : explode(',',$request->program_level_id);
            $program_sub_level=ProgramSubLevel::whereIn('program_id',$program_level_id)->get();
            return response()->json($program_sub_level);
        }
    }

    public function program_subdiscipline_data(Request $request)
    {
        if($request->ajax()){
            $program_sub_discipline=ProgramSubdiscipline::where('status',1)->whereIn('program_discipline_id',$request->program_displine)->get();
            return response()->json($program_sub_discipline);
        }
    }

    public function education_level_fetch(Request $request)
    {
        $education_level=EducationLevel::where('program_level_id',$request->program_level_id)->where('program_sublevel_id',$request->program_sublevel_id)->get();
        return response()->json($education_level);
    }


    public function fetch_scheme_data(Request $request)
    {
        if($request->ajax()){
            $country_id=University::where('id',$request->university_id)->value('country_id');
            $grading_scheme=GradingScheme::where('country_id',$country_id)->where('education_level_id',$request->education_level_id)->get();
            return response()->json($grading_scheme);
        }
    }


    public function other_exam(Request $request)
    {
        if($request->ajax()){
            $program_level = is_array($request->program_id) ? $request->program_id : explode(',',$request->program_id);
            $other_exam = Exam::whereIn('program_level_id',$program_level)->get();
            return response()->json($other_exam);
        }
    }


    public function documents(){
        $documents = Documents::with('programlevel')->paginate(12);
        return view('admin.program.documents.index',compact('documents'));
    }

    public function documents_edit($id = null){
        $document = Documents::find($id);
        return view('admin.program.documents.edit',compact('document'));
    }

    public function documents_delete($id = null){
        Documents::find($id)->delete();
        return redirect()->route('documents')->with('success','Data Deleted Successfully');
    }

    public function documents_update(Request $request, $id = null){
        $request->validate([
            'name' => 'required',
            'program_level_id' => 'required',
        ]);
        $document = Documents::find($id)->update([
            'name' => $request->name,
            'program_level_id' => $request->program_level_id,
        ]);
        return redirect()->route('documents')->with('success','Data Updated Successfully');
    }

    public function documents_create(){
        $programlevels =ProgramLevel::get();
        return view('admin.program.documents.create',compact('programlevels'));
    }

    public function documents_store(Request $request){
        $request->validate([
            'name' => 'required',
            'program_level_id' => 'required',
        ]);
        Documents::create([
            'name' => $request->name,
            'program_level_id' => $request->program_level_id,
        ]);
        return redirect()->route('documents')->with('success','Data Added Successfully');
    }

    public function total_applied_program()
    {
        $user=Auth::user();
        if($user->hasRole('Administrator')) {
            $student = Student::pluck('user_id');
        } else {
            $student = Student::where('user_id', $user->id)->pluck('user_id');
        }
        if(count($student)<0) {
            abort(404);
        }
        $table_three_sixtee =DB::table('tbl_three_sixtee')->whereIn('sba_id',$student)->select('application','visa_application')->first();
        if(isset($table_three_sixtee->application) && $table_three_sixtee->application != 'null' && isset($table_three_sixtee->visa_application) && $table_three_sixtee->visa_application != 'null'){
            $application=json_decode($table_three_sixtee->application,true);
            $visa_application = $table_three_sixtee->visa_application;
            $applied_application = [];
            foreach ($application['program_ids'] as $program_id) {
                $status_key = $program_id . '_application_status';
                $remarks_key = 'remarks_' . $program_id;
                if (isset($application[$status_key])) {
                    $applied_application[$program_id] = $application[$status_key];
                }
            }
        }else{
            $applied_application=[];
            $visa_application=null;
        }
        $program_applied = PaymentsLink::with('program:name,id,school_id','program.university_name:university_name,id','payments')->orwhere('payment_type_remarks','applied_program_pay_later')->orwhere('payment_type_remarks','applied_program')->whereIn('user_id', $student)->get();
        return view('admin.applied-program',compact('program_applied','table_three_sixtee','applied_application','visa_application'));
    }








}
