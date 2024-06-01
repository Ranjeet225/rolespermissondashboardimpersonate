<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EducationHistory;
use App\Models\EducationLevel;
use App\Models\PopularStudentGuide;
use App\Models\Program;
use App\Models\SchoolAttended;
use App\Models\Scholarship;
use App\Models\Student;
use App\Models\StudentApplyQuestions;
use App\Models\StudentAssistance;
use App\Models\StudentAttendence;
use App\Models\StudentByAgent;
use App\Models\StudentRegistrationFees;
use App\Models\Subject;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student_list(Request $request)
    {
        $user = Auth::user();
        $query = Student::with('country','province');
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone_number) {
            $query->where('phone_number', 'like', '%' . $request->phone_number . '%');
        }
        if ($request->zip) {
            $query->where('zip', 'like', '%' . $request->zip . '%');
        }
        if ($request->country_id) {
            $query->where('country_id', $request->country_id);
        }
        if ($request->from_date && $request->to_date) {
            $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        }
        if ($user->hasRole('Administrator')) {
            $student_profile = $query->paginate(20);
        } else {
            $student_profile = $query->where('added_by', $user->id)->paginate(20);
        }
        return view('admin.student.index', compact('student_profile'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student_profile()
    {
        $auth_user =Auth::user()->id;
        $about_student =Student::with('country','province')->where('user_id',$auth_user)->first();
        $education_history = EducationHistory::with('country','educationLevel','gradingScheme')->where('student_id',$auth_user)->first();
        $student = DB::table('student')->select('id')->where('user_id', $auth_user)->first();
        $student_id = $student->id;
        $test_score= DB::table('test_scores')->where('student_id',$student_id)->get();
        $attended_school =SchoolAttended::with('country','educationLevel','Student','province')->where('student_id',$student_id)->get();
        $additional_qualification = DB::table('additional_qualification')->where('student_id', $student_id)->whereIn('type', ['GRE', 'GMAT'])->get();
        $student_document = DB::table('student_documents')->where('student_id',$auth_user)->get();
        return view('admin.student.myprofile',compact('additional_qualification','student_document','about_student','test_score','education_history','attended_school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_student(Request $request)
    {
        $auth_user =Auth::user()->id;
        $about_student =DB::table('student')->where('user_id',$auth_user)->first();
        $countries = Country::all();
        $progLabel = EducationLevel::All();
        $student_attendence = StudentAttendence::with('country','province','student')->WHERE('student_id', $about_student->id)->get();
        $additional_qualification= DB::table('additional_qualification')->WHERE('student_id', $about_student->id)->where('type', 'GRE')->first();
        $gmat=  DB::table('additional_qualification')->WHERE('student_id', $about_student->id)->where('type', 'GMAT')->first();
        $test_score = DB::table('test_scores')->where('student_id', $about_student->id)->get();
        $all_subject = Subject::where('status', '1')->get();
        $student_document = DB::table('student_documents')->where('student_id', $auth_user)->get();
        $education_history = DB::table('education_history')->where('student_id', $auth_user)->first();
        return view('admin.student.edit_student',compact('education_history','about_student','student_document','all_subject','gmat','test_score','countries','progLabel','student_attendence','additional_qualification'));
    }

    public function store_student(Request $request)
    {
       $student_id = Auth::user()->id;
       $student = Student::where('user_id',$student_id)->first();
       if($request->tab1){
           $student_data =[
                "first_name" => $request->first_name,
                "middle_name" =>  $request->middle_name,
                "last_name" =>  $request->last_name,
                "gender" => $request->gender,
                "maritial_status" => $request->maritial_status,
                "passport_status" => $request->passport_status,
                "passport_number" =>  $request->passport_number,
                "dob" =>$request->dob,
                "first_language" => $request->first_language,
                "country_id" => $request->country_id,
                "province_id" => $request->province_id,
                "city" =>  $request->city,
                "address" => $request->address,
                "zip" => $request->zip,
           ];
           DB::table('student')->where('user_id',$student_id)->update($student_data);
           return response()->json(['success'=>'Data inserted Successfully']);
       }elseif($request->tab2){
            DB::table('education_history')
            ->updateOrInsert(
                ['student_id' => $student_id],
                [
                    'country_id' => $request->country_id,
                    'education_level_id' => $request->education_level_id,
                    'grading_average' => $request->grading_average,
                    'grading_scheme_id' => $request->grading_scheme_id,
                    'graduated_recently' => $request->graduated_recently
                ]
            );
             return response()->json(['success'=>'Data inserted Successfully']);
       }elseif($request->tab4){
                DB::table('student')->where('user_id',$student_id)
                ->update([
                    'ever_refused_visa' => $request->ever_refused_visa,
                    'has_visa' => $request->has_visa,
                    'visa_details' => $request->visa_details,
                    'pref_subjects'=>$request->subject_input,
                ]);
        return response()->json(['success'=>'Data inserted Successfully']);
       }elseif($request->tab5){
            if ($request->document) {
                    $images = $request->file('document');
                    foreach($images as $uploadedImage) {
                        $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                        $imagePath = 'imagesapi/' . $imageName;
                        $uploadedImage->move(public_path('imagesapi/'), $imageName);
                        DB::table('student_documents')
                        ->insert([
                            'student_id' => $student_id,
                            'image_url' => $imagePath,
                            'document_type' => $request->visa_document_type,
                            'file_type' => $imageName,
                            'file_client_name' => $imageName,
                        ]);
                    }
            }
        $student_email = Auth::user()->email;
        DB::table('student_by_agent')
        ->Where('email', $student_email)
        ->update([
            'status_threesixty' => '1',
            'student_user_id'=>$student->id
        ]);
        DB::table('student')
        ->Where('email', $student_email)
        ->update([
            'status_threesixty' => '1'
        ]);
        return response()->json(['status'=>true,'success'=>'Data inserted Successfully']);
       }

    }
    public function update_gre_exam_data( Request $request)
    {
        $student = DB::table('student')->select('id')->where('user_id', $request->student_id)->first();
        $student_id = $student->id;
        $test_score = DB::table('additional_qualification')->select('id')->where('student_id', $student_id)->where('type', 'GRE')->first();
        if($test_score == null){
            DB::table('additional_qualification')
            ->insert([
                'student_id' => $student_id,
                'type' => 'GRE',
                'date_of_exam' => $request->date_of_exam,
                'verbal_score' => $request->verbal_score,
                'verbal_rank' => $request->verbal_rank,
                'quantitative_score' => $request->quantitative_score,
                'quantitative_rank' => $request->quantitative_rank,
                'writing_score' => $request->writing_score,
                'writing_rank' => $request->writing_rank,
                'total_score' => $request->total_score,
                'total_rank' => $request->total_rank
            ]);
            return response()->json(['status' =>true,'success'=>'Data inserted Successfully']);
        } else {
            DB::table('additional_qualification')
            ->WHERE('student_id', $student_id)
            ->where('type', $request->type)
            ->update([
                'student_id' => $student_id,
                'type' => 'GRE',
                'date_of_exam' => $request->date_of_exam,
                'verbal_score' => $request->verbal_score,
                'verbal_rank' => $request->verbal_rank,
                'quantitative_score' => $request->quantitative_score,
                'quantitative_rank' => $request->quantitative_rank,
                'writing_score' => $request->writing_score,
                'writing_rank' => $request->writing_rank,
                'total_score' => $request->total_score,
                'total_rank' => $request->total_rank
            ]);
            return response()->json(['status' =>true,'success'=>'Data inserted Successfully']);
        }
        return response()->json(['success'=>'Data inserted Successfully']);
    }
    public function update_gmat_exam_data(Request $request)
    {
        $student = DB::table('student')
            ->select('id')
            ->where('user_id', $request->student_id)
            ->first();
        $student_id = $student->id;

        $test_score = DB::table('additional_qualification')
            ->select('id')
            ->where('student_id', $student_id)
            ->where('type', 'GMAT')
            ->first();

        if($test_score == null){
            DB::table('additional_qualification')
            ->insert([
                'student_id' => $student_id,
                'type' => 'GMAT',
                'date_of_exam' => $request->date_of_exam,
                'verbal_score' => $request->verbal_score,
                'verbal_rank' => $request->verbal_rank,
                'quantitative_score' => $request->quantitative_score,
                'quantitative_rank' => $request->quantitative_rank,
                'writing_score' => $request->writing_score,
                'writing_rank' => $request->writing_rank,
                'total_score' => $request->total_score,
                'total_rank' => $request->total_rank
            ]);
            return response()->json(['status' =>true,'success'=>'Data inserted Successfully']);
        } else {
            DB::table('additional_qualification')
            ->WHERE('student_id', $student_id)
            ->where('type', $request->type)
            ->update([
                'student_id' => $student_id,
                'type' => 'GMAT',
                'date_of_exam' => $request->date_of_exam,
                'verbal_score' => $request->verbal_score,
                'verbal_rank' => $request->verbal_rank,
                'quantitative_score' => $request->quantitative_score,
                'quantitative_rank' => $request->quantitative_rank,
                'writing_score' => $request->writing_score,
                'writing_rank' => $request->writing_rank,
                'total_score' => $request->total_score,
                'total_rank' => $request->total_rank
            ]);
            return response()->json(['status' =>true,'success'=>'Data inserted Successfully']);
        }
    }

    public function update_attendended_school(Request $request)
    {
        $student = DB::table('student')->select('id')->where('user_id', $request->student_id)->first();
        $student_id = $student->id;
        DB::table('school_attended')
        ->insert([
            'student_id' => $student_id,
            'education_level_id' => $request->education_level_id,
            'name' => $request->name,
            'primary_language' => $request->primary_language,
            'attended_from' => $request->attended_from,
            'attended_to' => $request->attended_to,
            'degree_awarded' => $request->degree_awarded,
            'degree_awarded_on' => $request->degree_awarded_on,
            'country_id' => $request->country_id,
            'province' => $request->province,
            'city' => $request->city,
            'postal_zip' => $request->postal_zip,
            'address' => $request->address
        ]);
        $data = [
            'status'=>true,
            'success'=>'Data Inserted Successfully',
        ];
        return response()->json($data);
    }

    public function update_test_score(Request $request){
        $student = DB::table('student')
            ->select('id')
            ->where('user_id', $request->student_id)
            ->first();
        $student_id = $student->id;
        $test_score = DB::table('test_scores')
                    ->select('id')
                    ->where('student_id', $student_id)
                    ->where('type', $request->type)
                    ->first();

        if($test_score == null){
            DB::table('test_scores')
            ->insert([
                'student_id' => $student_id,
                'type' => $request->type,
                'exam_date' => $request->exam_date,
                'listening_score' => $request->listening_score,
                'writing_score' => $request->writing_score,
                'reading_score' => $request->reading_score,
                'speaking_score' => $request->speaking_score,
                'average_score' => $request->average_score
            ]);

            return response()->json(['status' =>true,'success'=>'Data inserted Successfully']);
        } else {
            DB::table('test_scores')
            ->WHERE('student_id', $student_id)
            ->where('type', $request->type)
            ->update([
                'student_id' => $student_id,
                'type' => $request->type,
                'exam_date' => $request->exam_date,
                'listening_score' => $request->listening_score,
                'writing_score' => $request->writing_score,
                'reading_score' => $request->reading_score,
                'speaking_score' => $request->speaking_score,
                'average_score' => $request->average_score
            ]);
            return response()->json(['status' =>true,'success'=>'Data inserted Successfully']);
        }
    }

    public function delete_attendended($id)
    {
        $schoolAttended = DB::table('school_attended')->where('id', $id)->first();
        if ($schoolAttended) {
            DB::table('school_attended')->where('id', $id)->delete();
            $data = [
                'tab2' => 'tab2',
                'success' => 'Deleted Successfully',
            ];
        } else {
            $data = [
                'tab2' => 'tab2',
                'error' => 'Id is not exist',
            ];
        }
        return redirect()->route('student-edit')->with($data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function grading_scheme_list(Request $request)
    {
        $country_id = $request->get('country_id');
        $ed_id = $request->get('education_level_id');
        $education_level = DB::table('grading_scheme')->WHERE('education_level_id', $ed_id)->WHERE('country_id', $country_id )->get();
        $data = array(
            "data" => $education_level
        );
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_document($id)
    {
        $document = DB::table('student_documents')->where('id', $id)->first();
        if ($document) {
            DB::table('student_documents')->where('id', $id)->delete();
            $data = [
                'success' => 'Deleted Successfully',
            ];
        } else {
            $data = [
                'error' => 'Id is not exist',
            ];
        }
        return redirect()->route('student-edit')->with($data);
    }

    public function delete_test_score($id)
    {
        $test_score = DB::table('test_scores')->where('id',$id)->first();
        if ($test_score) {
            DB::table('test_scores')->where('id',$id)->delete();
            $data =[
                'success'=>'Deleted Successfully',
            ];
        } else {
            $data =[
                'error'=>'Id is not exist',
            ];
        }
        return redirect()->route('student-edit')->with($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function scholarship(Request $request)
    {
        if ($request->heading) {
            $scholarship = Scholarship::where('heading', 'like', '%' . $request->heading . '%')->paginate(12);
        } else {
            $scholarship = Scholarship::paginate(12);
        }

        return view('admin.scholarship.index', compact('scholarship'));
    }

    public function scholarship_create(Request $request)
    {
        $university =University::get();
        $program=Program::get();
        return view('admin.scholarship.create',compact('university','program'));
    }
    public function scholarship_store(Request $request)
    {
        $request->validate([
            'heading'=>'required|max:222',
            'universty_id'=>'required|max:222',
            'course_id'=>'required|max:222',
            'scholarship_type'=>'required|max:222',
            'offered_by'=>'required|max:222',
            'application_dead_line'=>'required|max:222',
            'no_of_scholarship'=>'required|max:222',
            'scholarship_amount'=>'required|max:222',
            'level_of_study'=>'required|max:222',
            'organization'=>'required|max:222',
            'renewability'=>'required|max:222',
            'international_student_eligibility'=>'required',
        ]);
        Scholarship::create($request->except('_token'));
        return redirect()->route('scholarship')->with('success', 'Scholarship created successfully');
    }

    public function scholarship_edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $university = University::get();
        $program = Program::get();
        return view('admin.scholarship.edit', compact('scholarship', 'university', 'program'));
    }

    public function scholarship_update(Request $request, $id)
    {

        $request->validate([
            'heading'=>'required|max:222',
            'universty_id'=>'required|max:222',
            'course_id'=>'required|max:222',
            'scholarship_type'=>'required|max:222',
            'offered_by'=>'required|max:222',
            'application_dead_line'=>'required|max:222',
            'no_of_scholarship'=>'required|max:222',
            'scholarship_amount'=>'required|max:222',
            'level_of_study'=>'required|max:222',
            'organization'=>'required|max:222',
            'renewability'=>'required|max:222',
            'international_student_eligibility'=>'required',
        ]);
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->update($request->except('_token'));
        return redirect()->route('scholarship')->with('success', 'Scholarship updated successfully');
    }

    public function scholarship_delete($id)
    {
        if(Scholarship::find($id)) {
            $scholarship = Scholarship::findOrFail($id);
            $scholarship->delete();
            return redirect()->route('scholarship')->with('success', 'Scholarship deleted successfully');
        } else {
            return redirect()->route('scholarship')->with('success', 'Scholarship not deleted successfully');
        }
    }



    // student registration fees

    public function student_registration_fees(Request $request)
    {
        if ($request->has('fees_type')) {
            $student_registraion_fees = StudentRegistrationFees::where('fees_type', 'like', '%' . $request->fees_type . '%')->paginate(12);
        } else {
            $student_registraion_fees = StudentRegistrationFees::paginate(12);
        }
        return view('admin.student.student-registraion-fees.index', compact('student_registraion_fees'));
    }

    public function student_registration_fees_create()
    {
        return view('admin.student.student-registraion-fees.create');
    }

    public function student_registration_fees_store(Request $request)
    {
        $request->validate([
            'fees_type' => 'required|max:222',
            'fees_amount' => 'required|max:222',
        ]);
        StudentRegistrationFees::create($request->all());
        return redirect()->route('student-registration-fees')->with('success', 'Student registration fees created successfully');
    }

    public function student_registration_fees_edit($id)
    {
        $student_registraion_fees = StudentRegistrationFees::findOrFail($id);
        return view('admin.student.student-registraion-fees.edit', compact('student_registraion_fees'));
    }

    public function student_registration_fees_update(Request $request, $id)
    {
        $student_registraion_fees = StudentRegistrationFees::findOrFail($id);
        $student_registraion_fees->update($request->all());
        return redirect()->route('student-registration-fees')->with('success', 'Student registration fees updated successfully');
    }

    public function student_registration_fees_destroy($id)
    {
        if (StudentRegistrationFees::find($id)) {
            StudentRegistrationFees::find($id)->delete();
            return redirect()->route('student-registration-fees')->with('success', 'Student registration fees deleted successfully');
        }
        return redirect()->route('student-registration-fees')->with('error', 'Student registration fees not found');
    }

    // Question
     public function student_question(Request $request)
     {
         if ($request->has('question')) {
             $student_question = StudentApplyQuestions::where('question', 'like', '%' . $request->question . '%')->paginate(12);
         } else {
             $student_question = StudentApplyQuestions::paginate(12);
         }
         return view('admin.student.student-apply-question.index', compact('student_question'));
     }

     public function student_question_create()
     {
         return view('admin.student.student-apply-question.create');
     }

     public function student_question_store(Request $request)
     {
         $request->validate([
             'question' => 'required',
         ]);
         StudentApplyQuestions::create($request->except('_token') + ['user_id' => Auth::user()->id]);
         return redirect()->route('student-question')->with('success', 'Student Apply Question created successfully');
     }

     public function student_question_edit($id)
     {
         $student_question = StudentApplyQuestions::findOrFail($id);
         return view('admin.student.student-apply-question.edit', compact('student_question'));
     }

     public function student_question_update(Request $request, $id)
     {
         $student_question = StudentApplyQuestions::findOrFail($id);
         $student_question->update($request->all());
         return redirect()->route('student-question')->with('success', 'Student Question  updated successfully');
     }

     public function student_question_destroy($id)
     {
         $student_question = StudentApplyQuestions::find($id);
         if($student_question){
             $student_question->delete();
             return redirect()->route('student-question')->with('success', 'Student Question deleted successfully');
         }else{
             return redirect()->route('student-question')->with('error', 'Student Question not found');
         }
     }


    //  student assistance
     public function student_assistance(Request $request)
     {
         if ($request->has('title')) {
             $student_assistance = StudentAssistance::where('title', 'like', '%' . $request->title . '%')->paginate(12);
         } else {
             $student_assistance = StudentAssistance::paginate(12);
         }
         return view('admin.student.student-assistance.index', compact('student_assistance'));
     }
     public function student_assistance_create()
     {
         return view('admin.student.student-assistance.create');
     }
     public function student_assistance_store(Request $request)
     {
         $request->validate([
             'title' => 'required',
         ]);
         StudentAssistance::create($request->except('_token'));
         return redirect()->route('student-assistance')->with('success', 'Student Assistance created successfully');
     }
     public function student_assistance_edit($id)
     {
         $student_assistance = StudentAssistance::findOrFail($id);
         return view('admin.student.student-assistance.edit', compact('student_assistance'));
     }
     public function student_assistance_update(Request $request, $id)
     {
         $student_assistance = StudentAssistance::findOrFail($id);
         $student_assistance->update($request->except('_token'));
         return redirect()->route('student-assistance')->with('success', 'Student Assistance  updated successfully');
     }
     public function student_assistance_destroy($id)
     {
         if ($student_assistance = StudentAssistance::find($id)) {
             $student_assistance->delete();
             return redirect()->route('student-assistance')->with('success', 'Student Assistance deleted successfully');
         } else {
             return redirect()->route('student-assistance')->with('error', 'Student Assistance not found');
         }
     }

    //  student guide
    public function student_guide(Request $request)
    {
        if ($request->has('title')) {
            $student_guide = PopularStudentGuide::where('title', 'like', '%' . $request->title . '%')->paginate(12);
        } else {
            $student_guide = PopularStudentGuide::paginate(12);
        }
        return view('admin.student.student-guide.index', compact('student_guide'));
    }
    public function student_guide_create()
    {
        return view('admin.student.student-guide.create');
    }
    public function student_guide_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'doc_file' => 'mimes:pdf,doc,docx|max:2048',
        ]);
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }
        if ($request->hasFile('doc_url')) {
            $doc_file = $request->file('doc_url');
            $name = time() . '.' . $doc_file->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $doc_file->move($destinationPath, $name);
            $data['doc_url'] = $name;
        }
        PopularStudentGuide::create($data);
        return redirect()->route('student-guide')->with('success', 'Student Guide created successfully');
    }
    public function student_guide_edit($id)
    {
        $studentGuide = PopularStudentGuide::findOrFail($id);
        return view('admin.student.student-guide.edit', compact('studentGuide'));
    }
    public function student_guide_update(Request $request, $id)
    {
        $student_guide = PopularStudentGuide::findOrFail($id);
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }else{
            $data['image'] = $student_guide->image;
        }
        if ($request->hasFile('doc_url')) {
            $doc_file = $request->file('doc_url');
            $name = time() . '.' . $doc_file->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $doc_file->move($destinationPath, $name);
            $data['doc_url'] = $name;
        }else{
            $data['doc_url'] = $student_guide->doc_url;
        }
        $student_guide->update($data);
        return redirect()->route('student-guide')->with('success', 'Student Guide updated successfully');
    }
    public function student_guide_destroy($id)
    {
        if(PopularStudentGuide::find($id)){
            $student_guide = PopularStudentGuide::findOrFail($id);
            $student_guide->delete();
            return redirect()->route('student-guide')->with('success', 'Student Guide deleted successfully');
        }
        return redirect()->route('student-guide')->with('error', 'Student Guide not found');
    }


1
}
