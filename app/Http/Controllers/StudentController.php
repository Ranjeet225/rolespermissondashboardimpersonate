<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EducationHistory;
use App\Models\EducationLevel;
use App\Models\SchoolAttended;
use App\Models\Student;
use App\Models\StudentAttendence;
use App\Models\StudentByAgent;
use App\Models\Subject;
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
    public function student_list()
    {
        $user = Auth::user();
        if ($user->hasRole('Administrator')) {
            $student_profile =Student::with('country','province')->paginate(20);
        } else {
            $student_profile =Student::with('country','province')->where('added_by', $user->id)->paginate(20);
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
                'status_threesixty' => '1'
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
        DB::table('school_attended')->where('id',$id)->delete();
        $data =[
            'tab2'=>'tab2',
            'success'=>'Deleted Successfully',
        ];
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
        DB::table('student_documents')->where('id',$id)->delete();
        $data =[
            'success'=>'Deleted Successfully',
        ];
        return redirect()->route('student-edit')->with($data);
    }

    public function delete_test_score($id)
    {
        DB::table('test_scores')->where('id',$id)->delete();
        $data =[
            'success'=>'Deleted Successfully',
        ];
        return redirect()->route('student-edit')->with($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
