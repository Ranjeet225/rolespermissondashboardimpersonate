<?php

use App\Http\Controllers\CmsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrenchiseController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LeadsManageCotroller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OtherMasterDataController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use Maatwebsite\Excel\Row;

URL::forceScheme('https');


Route::fallback(function () {
    return view('errors.404');
});
Route::get('/', function(){
    return view('frontend.comming-soon');
});
Route::get('/apply-program', [FrontendController::class,'course_university'])->name('check-eligible');
Route::post('/get-country-flags',[FrontendController::class,'get_country'])->name('get-country-flags');
Route::post('/get-item-details',[FrontendController::class,'get_country'])->name('get-item-details');
Route::post('get-program-sublevel',[ProgramController::class,'get_program_sublevel'])->name('get-program-sublevel');
Route::post('get-education-level-data',[ProgramController::class,'get_education_level'])->name('get-education-level-data');
Route::post('program-subdiscipline-data',[ProgramController::class,'program_subdiscipline_data'])->name('program-subdiscipline-data');
Route::post('fetch-other-exam-data',[ProgramController::class,'other_exam'])->name('fetch-other-exam-data');
Route::get('course-finder',[FrontendController::class,'course_university'])->name('course-finder');
Route::get('fetch-university-course',[FrontendController::class,'course_university'])->name('fetch-university-course');
Route::post('get-education-level-filter',[FrontendController::class,'education_level_filter'])->name('get-education-level-filter');
Route::post('get-university-course',[FrontendController::class,'get_university_course'])->name('get-university-course');
Route::get('course-details/{id?}',[FrontendController::class,'course_details'])->name('course-details');
Route::get('view-program-data/{id?}',[FrontendController::class,'view_program_data'])->name('view-program-data');
Route::get('apply-program-payment/{student_id}/{program_id}',[FrontendController::class,'apply_program_payment'])->name('apply-program-payment');
Route::get('pay-later/{student_id}/{program_id}/{amount?}',[FrontendController::class,'pay_later'])->name('pay-later');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/impersonate/{user}', 'UserController@impersonate')->name('impersonate')->middleware('can:impersonate-users');
// Route::get('/impersonate/{user}', [UserController::class, 'impersonate'])->name('impersonate')->middleware('auth', 'role:Administrator');
// Route::get('/revert-to-admin', [UserController::class, 'revertToAdmin'])->name('revert_to_admin')->middleware('auth');
Route::get('pay-now/{token?}',[LeadsManageCotroller::class,'payment_view']);
Route::post('payment/create',[LeadsManageCotroller::class,'store'])->name('razorpay.payment.store');
Route::post('payment/failure',[LeadsManageCotroller::class,'failure'])->name('razorpay.payment.failure');
Route::get('payment/success',[LeadsManageCotroller::class,'success'])->name('razorpay.payment.succes');

Route::post('send-payment-link',[StudentController::class,'payment_link'])->name('send-payment-link');
Route::get('payment_link_details',[StudentController::class,'payment_link_details'])->name('fetch-student-payment');
Route::get('delete-payment-link',[StudentController::class,'delete_payment_link'])->name('delete-payment-link');
// student mobile number verfication
Route::post('/send-otp',[FrontendController::class,'send_otp'])->name('send-otp');
Route::post('/verify-otp', [FrontendController::class, 'verify_otp'])->name('verify-otp');

Route::get('pay-amount/{student_id?}/{program_id?}/{amount?}', [FrontendController::class, 'pay_amount'])->name('pay-amount');

Route::middleware('auth')->group(function () {
    // Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('dashborad-data/{key}', [DashboardController::class, 'dashboard_data'])->name('dashboard-data');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('admin-management')->group(function () {
        Route::get('/revert-to-admin', [UserController::class, 'revertToAdmin'])->name('revert_to_admin');
        Route::get('/impersonate/{user}', [UserController::class, 'impersonate'])->name('impersonate');
        // Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::match(['get', 'post'], 'users/{action?}', [UserController::class, 'index'])->name('users.index');
        Route::get('/create-user', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/roles-permissions', [RolesController::class, 'index'])->name('roles-permissions.index');
        Route::get('/roles-permissions/create', [RolesController::class, 'create'])->name('roles-permissions.create');
        Route::post('/roles-permissions/store', [RolesController::class, 'store'])->name('roles-permissions.store');
        Route::get('/roles-permissions/edit/{id}', [RolesController::class, 'edit'])->name('roles-permissions.edit');
        Route::post('/roles-permissions/update/{id}', [RolesController::class, 'update'])->name('roles-permissions.update');
        Route::get('/roles-permissions/delete/{id}', [RolesController::class, 'destroy'])->name('roles-permissions.delete');
    });
    Route::prefix('admin')->group(function () {
        Route::get('leads-dashboard', [LeadsManageCotroller::class, 'leadsDashboard']);
        Route::get('add-leads', [LeadsManageCotroller::class, 'create_new_lead'])->name('admin.create_new_lead');
        Route::post('add-leadData-tab', [LeadsManageCotroller::class, 'add_lead_data'])->name('add-leadData-tab');
        Route::match(['get', 'post'], 'leads-lists/{action?}', [LeadsManageCotroller::class, 'lead_list'])->name('leads-filter');
        Route::get('assigned-lead',[LeadsManageCotroller::class,'assigned_leads'])->name('assigned-leads');
        Route::get('assigned-leads-filter',[LeadsManageCotroller::class,'assigned_leads'])->name('assigned-leads-filter');

        Route::get('pending-lead',[LeadsManageCotroller::class,'pending_leads'])->name('pending-leads');
        Route::get('pending-leads-filter',[LeadsManageCotroller::class,'pending_leads'])->name('pending-leads-filter');

        Route::any('excel-sheet-export', [LeadsManageCotroller::class, 'lead_list_export'])->name('lead_list_export');
        Route::get('manage-lead/{id?}', [LeadsManageCotroller::class, 'manage_lead'])->name('manage-lead');
        Route::get('edit-lead/{id?}', [LeadsManageCotroller::class, 'edit_lead_data'])->name('edit-lead');
        Route::get('show-lead/{id?}', [LeadsManageCotroller::class, 'show_lead'])->name('view-lead');
        Route::get('create_student_profile/{id}', [LeadsManageCotroller::class, 'create_student_profile'])->name('create-student-profile');
        Route::get('oel-360/', [LeadsManageCotroller::class, 'oel_360'])->name('oel_360');
        Route::get('lead-details', [LeadsManageCotroller::class, 'lead_details'])->name('lead-details');
        Route::get('apply-360/{id?}', [LeadsManageCotroller::class, 'aply_360'])->name('apply-360');
        Route::get('apply-oel-360', [LeadsManageCotroller::class, 'aply_360'])->name('apply-oel-360');
        Route::post('aply-lead-360/', [LeadsManageCotroller::class, 'store_lead_360'])->name('store-lead-360');
        Route::get('leads/{key}', [LeadsManageCotroller::class, 'fetch_leads'])->name('fetch-leads');
        Route::get('bulk-upload/', [LeadsManageCotroller::class, 'bulk_upload'])->name('bulk-upload');
        Route::post('excel-sheet-uplod-lead',[LeadsManageCotroller::class,'excel_sheet_leads'])->name('excel-sheet-leads');
        Route::Post('add-user-follow-up',[LeadsManageCotroller::class,'add_user_follow_up'])->name('add-user-follow-up');
        Route::get('fetch-follow-up-date',[LeadsManageCotroller::class,'follow_up_list'])->name('follow-up-list');
        Route::post("update-user-status",[UserController::class,'updateUserStatus'])->name('statusUpdateUser');
        Route::post("approve-user-status",[UserController::class,'approveUserStatus'])->name('approveStatusUpdate');
        Route::get("relocate-frenchise",[LeadsManageCotroller::class,'relocated_frenchise'])->name('relocated-frenchise');
        Route::post('assign-leads',[LeadsManageCotroller::class,'allocate_franchise'])->name('assign-leads');
        // Route::post('assign-leads',[LeadsManageCotroller::class,'allocate_franchise']);
        Route::get("student-list",[StudentController::class,'student_list'])->name('student-list');
        // Route::get('cehckout/{say}',[LeadsManageCotroller::class,'with_parameter'])->name('parameter');

        Route::post('university-course',[LeadsManageCotroller::class,'university_course'])->name('university.courses');
        // student registration fees
        Route::get('student-registration-fees',[StudentController::class,'student_registration_fees'])->name('student-registration-fees');
        Route::get('student-registration-fees-filter',[StudentController::class,'student_registration_fees'])->name('student-registration-fees-filter');
        Route::get('create-student-registration-fees',[StudentController::class,'student_registration_fees_create'])->name('create-student-registration-fees');
        Route::post('store-student-registration-fees',[StudentController::class,'student_registration_fees_store'])->name('store-student-registration-fees');
        Route::get('edit-student-registration-fees/{id?}',[StudentController::class,'student_registration_fees_edit'])->name('edit-student-registration-fees');
        Route::post('update-student-registration-fees/{id?}',[StudentController::class,'student_registration_fees_update'])->name('update-student-registration-fees');
        Route::get('delete-student-registration-fees/{id?}',[StudentController::class,'student_registration_fees_destroy'])->name('delete-student-registration-fees');
        Route::get('delete-program/{id}',[StudentController::class,'delete_program'])->name('delete-program');

        Route::get('student-apply-question',[StudentController::class,'student_question'])->name('student-question');
        Route::get('student-question-filter',[StudentController::class,'student_question'])->name('student-question-filter');
        Route::get('create-student-question',[StudentController::class,'student_question_create'])->name('create-student-question');
        Route::post('store-student-question',[StudentController::class,'student_question_store'])->name('store-student-question');
        Route::get('edit-student-question/{id?}',[StudentController::class,'student_question_edit'])->name('edit-student-question');
        Route::post('update-student-question/{id?}',[StudentController::class,'student_question_update'])->name('update-student-question');
        Route::get('delete-student-question/{id?}',[StudentController::class,'student_question_destroy'])->name('delete-student-question');

        // Student assistance
        Route::get('student-assistance',[StudentController::class,'student_assistance'])->name('student-assistance');
        Route::get('student-assistance-filter',[StudentController::class,'student_assistance'])->name('student-assistance-filter');
        Route::get('create-student-assistance',[StudentController::class,'student_assistance_create'])->name('create-student-assistance');
        Route::post('store-student-assistance',[StudentController::class,'student_assistance_store'])->name('store-student-assistance');
        Route::get('edit-student-assistance/{id?}',[StudentController::class,'student_assistance_edit'])->name('edit-student-assistance');
        Route::post('update-student-assistance/{id?}',[StudentController::class,'student_assistance_update'])->name('update-student-assistance');
        Route::get('delete-student-assistance/{id?}',[StudentController::class,'student_assistance_destroy'])->name('delete-student-assistance');

        // Student guide
        Route::get('popular-student-guide',[StudentController::class,'student_guide'])->name('student-guide');
        Route::get('student-guide-filter',[StudentController::class,'student_guide'])->name('student-guide-filter');
        Route::get('create-student-guide',[StudentController::class,'student_guide_create'])->name('create-student-guide');
        Route::post('store-student-guide',[StudentController::class,'student_guide_store'])->name('store-student-guide');
        Route::get('edit-student-guide/{id?}',[StudentController::class,'student_guide_edit'])->name('edit-student-guide');
        Route::post('update-student-guide/{id?}',[StudentController::class,'student_guide_update'])->name('update-student-guide');
        Route::get('delete-student-guide/{id?}',[StudentController::class,'student_guide_destroy'])->name('delete-student-guide');
        // university
        Route::get("manage-university",[UniversityController::class,'manage_university'])->name('manage-university');
        Route::get("filter-university",[UniversityController::class,'manage_university'])->name('filter-university');



        Route::get('add-university',[UniversityController::class,'create_university'])->name('add-university');
        Route::post('store-university',[UniversityController::class,'store_university'])->name('store-university');
        Route::post('add-uni-ranking/{id?}', [UniversityController::class, 'add_uni_ranking'])->name('add-university-rank');
        Route::get('all_uni_rank/{id?}', [UniversityController::class, 'all_uni_ranking'])->name('all-uni-ranking');
        Route::get('delete-uni-ranking/{id?}', [UniversityController::class, 'delete_uni_ranking']);

        Route::post('add-uni-accerediation/{id?}', [UniversityController::class, 'add_uni_accerediation'])->name('add-uni-accerediation');
        Route::get('all-uni-accerediation/{id?}', [UniversityController::class, 'all_uni_accerediation'])->name('all-uni-accerediation');
        Route::get('delete-uni-accerediation/{id?}', [UniversityController::class, 'delete_uni_accerediation']);

        // University document
        Route::post('add-uni-documents/{id?}', [UniversityController::class, 'add_uni_documents'])->name('add-uni-documents');
        Route::get('university-document/{id?}', [UniversityController::class, 'university_document'])->name('university-document');

        Route::get('edit-university/{id?}', [UniversityController::class, 'edit_university'])->name('edit-university');
        Route::get('delete-university/{id?}', [UniversityController::class, 'delete_university'])->name('delete-university');

        Route::post("approve-university",[UniversityController::class,'approve_university'])->name('approve-university');

        Route::get("approved-university",[UniversityController::class,'view_approve_university'])->name('view-approved-university');
        // Route::get("filter-approved-university",[UniversityController::class,'view_approve_university'])->name('filter-approved-university');

        Route::get("un-approve-university",[UniversityController::class,'view_unapprove_university'])->name('unapproved-university');
        Route::get("filter-un-approve-university",[UniversityController::class,'view_unapprove_university'])->name('filter-unapproved-university');
        Route::get("view-details-university",[UniversityController::class,'view_university'])->name('view-university');
        Route::get("updation-manage-university",[UniversityController::class,'update_university'])->name('update-university');

        // oel-review
        Route::get('oel-review',[UniversityController::class,'oel_review'])->name('oel-review');
        Route::get('add-review',[UniversityController::class,'add_review'])->name('add-review');
        Route::post('store-oel-review',[UniversityController::class,'store_oel_review'])->name('store-oel-review');
        Route::get('edit-review/{id?}',[UniversityController::class,'edit_oel_review'])->name('edit-review');
        Route::post('update-oel-review/{id?}',[UniversityController::class,'update_oel_review'])->name('update-oel-review');
        Route::get('delete-review/{id?}',[UniversityController::class,'delete_oel_review'])->name('delete-review');


        // oel type
        Route::get('university-type',[UniversityController::class,'oel_type'])->name('oel-type');
        Route::get('add-type',[UniversityController::class,'add_type'])->name('add-type');
        Route::post('store-oel-type',[UniversityController::class,'store_oel_type'])->name('store-oel-type');
        Route::get('edit-type/{id?}',[UniversityController::class,'edit_oel_type'])->name('edit-type');
        Route::post('update-oel-type/{id?}',[UniversityController::class,'update_oel_type'])->name('update-oel-type');
        Route::get('delete-type/{id?}',[UniversityController::class,'delete_oel_type'])->name('delete-type');

        // program module
        Route::get('manage-program',[ProgramController::class,'manage_program'])->name('manage-program');
        Route::get('add-program',[ProgramController::class,'add_program'])->name('add-program');
        Route::get('get-program-sub-discipline',[ProgramController::class,'get_program_sub_discipline'])->name('get-program-sub-discipline');
        Route::post('get-education-level',[ProgramController::class,'get_education_level'])->name('get-education-level');
        Route::post('store-program',[ProgramController::class,'store_program'])->name('store-program');
        Route::get('edit-program/{id}',[ProgramController::class,'edit_program'])->name('edit-program');
        Route::Post('update-program/{id}',[ProgramController::class,'update_program'])->name('update-program');
        Route::post('req_score_prog_add', [ProgramController::class, 'req_score_prog_add'])->name('req-score-prog-add');
        Route::get('req_score_prog', [ProgramController::class, 'fetch_req_score_prog'])->name('fetch-req-score-prog');
        Route::post('update_program_commission', [ProgramController::class, 'update_program_commission'])->name('update-program-commission');
        Route::get('delete-score-program',[ProgramController::class,'delete_score_program'])->name('delete-score-program');
        Route::get('program-filter',[ProgramController::class,'manage_program'])->name('program-filter');
        Route::get('approve-program',[ProgramController::class,'approve_program'])->name('approve-program');
        Route::get('view-program/{id?}',[ProgramController::class,'view_program'])->name('view-program');
        Route::post('education-level-fetch',[ProgramController::class,'education_level_fetch'])->name('education-level-fetch');
        Route::post('fetch-scheme-data',[ProgramController::class,'fetch_scheme_data'])->name('fetch-scheme-data');
        Route::post('fetch-other-exam',[ProgramController::class,'other_exam'])->name('fetch-other-exam');

        Route::get('approve-program-filter',[ProgramController::class,'approve_program'])->name('approve-program-filter');
        Route::get('program-level-details',[ProgramController::class,'program_level_details'])->name('program-level-details');
        Route::get('edit-program-details/{id?}',[ProgramController::class,'edit_program_details'])->name('edit-program-details');
        Route::get('delete-program-details/{id?}',[ProgramController::class,'delete_program_details'])->name('delete-program-details');
        Route::post('update-home-program-details/{id?}',[ProgramController::class,'update_program_details'])->name('update-home-program-details');
        Route::get('create-new-program-details',[ProgramController::class,'create_program_details'])->name('create-new-program-details');
        Route::post('store-program-details',[ProgramController::class,'store_program_details'])->name('store-program-details');


        Route::get('program-sub-level',[ProgramController::class,'program_sub_level'])->name('program-sub-level');
        // Route::get('program-sub-level-filter',[ProgramController::class,'program_sub_level'])->name('program-sub-level-filter');
        Route::get('edit-program-sub-level/{id?}',[ProgramController::class,'program_sub_level_edit'])->name('edit-program-sub-level');
        Route::get('delete-program-sub-level/{id?}',[ProgramController::class,'delete_program_sub_level'])->name('delete-program-sub-level');
        Route::post('update-program-sub-level/{id?}',[ProgramController::class,'program_sub_level_update'])->name('update-program-sub-level');
        Route::get('create-new-program-sub-level',[ProgramController::class,'program_sub_level_create'])->name('create-new-program-sub-level');
        Route::post('store-program-sub-level',[ProgramController::class,'program_sub_level_store'])->name('store-program-sub-level');

        // EducationLevel
        Route::get('education-level',[ProgramController::class,'education_level'])->name('education-level');
      //Route::get('education-level-filter',[ProgramController::class,'education_level'])->name('education-level-filter');
        Route::get('edit-education-level/{id?}',[ProgramController::class,'education_level_edit'])->name('edit-education-level');
        Route::get('delete-education-level/{id?}',[ProgramController::class,'education_level_delete'])->name('delete-education-level');
        Route::post('update-education-level/{id?}',[ProgramController::class,'education_level_update'])->name('update-education-level');
        Route::get('create-new-education-level',[ProgramController::class,'education_level_create'])->name('create-new-education-level');
        Route::post('store-education-level',[ProgramController::class,'education_level_store'])->name('store-education-level');
        // Program level
        Route::get('program-level',[ProgramController::class,'program_level'])->name('program-level');
        // Route::get('program-level-filter',[ProgramController::class,'program_level'])->name('program-level-filter');
        Route::get('edit-program_level/{id?}',[ProgramController::class,'program_level_edit'])->name('edit-program_level');
        Route::get('delete-program-level/{id?}',[ProgramController::class,'program_level_delete'])->name('delete-program-level');
        Route::post('update-program-level/{id?}',[ProgramController::class,'program_level_update'])->name('update-program-level');
        Route::get('create-new-program_level',[ProgramController::class,'program_level_create'])->name('create-new-program_level');
        Route::post('store-program-level',[ProgramController::class,'program_level_store'])->name('store-program-level');

        // PROGRAM DISPLINE

        Route::get('program-discipline',[ProgramController::class,'program_discipline'])->name('program-discipline');
        Route::get('edit-program-discipline/{id?}',[ProgramController::class,'program_discipline_edit'])->name('edit-program-discipline');
        Route::get('delete-program-discipline/{id?}',[ProgramController::class,'program_discipline_delete'])->name('delete-program-discipline');
        Route::post('update-program-discipline/{id?}',[ProgramController::class,'program_discipline_update'])->name('update-program-discipline');
        Route::get('create-new-program-discipline',[ProgramController::class,'program_discipline_create'])->name('create-program-discipline');
        Route::post('store-program-discipline',[ProgramController::class,'program_discipline_store'])->name('store-program-discipline');


        // PROGRAM SUB DISCIPLINE
        Route::get('program-subdiscipline',[ProgramController::class,'program_subdiscipline'])->name('program-subdiscipline');
        Route::get('edit-program-subdiscipline/{id?}',[ProgramController::class,'program_subdiscipline_edit'])->name('edit-program-subdiscipline');
        Route::get('delete-program-subdiscipline/{id?}',[ProgramController::class,'program_subdiscipline_delete'])->name('delete-program-subdiscipline');
        Route::post('update-program-subdiscipline/{id?}',[ProgramController::class,'program_subdiscipline_update'])->name('update-program-subdiscipline');
        Route::get('create-new-program-subdiscipline',[ProgramController::class,'program_subdiscipline_create'])->name('create-program-subdiscipline');
        Route::post('store-program-subdiscipline',[ProgramController::class,'program_subdiscipline_store'])->name('store-program-subdiscipline');

        // grading scheme
        Route::get('grading-scheme',[ProgramController::class,'grading_scheme'])->name('grading-scheme');
        // Route::get('grading-scheme-filter',[ProgramController::class,'grading_scheme'])->name('grading-scheme-filter');
        Route::get('create-new-grading-scheme',[ProgramController::class,'grading_scheme_create'])->name('create-new-grading-scheme');
        Route::get('edit-grading-scheme/{id?}',[ProgramController::class,'grading_scheme_edit'])->name('edit-grading-scheme');
        Route::get('delete-grading-scheme/{id?}',[ProgramController::class,'grading_scheme_delete'])->name('delete-grading-scheme');
        Route::post('update-grading-scheme/{id?}',[ProgramController::class,'grading_scheme_update'])->name('update-grading-scheme');
        Route::post('store-grading-scheme',[ProgramController::class,'grading_scheme_store'])->name('store-grading-scheme');

        // exam
        Route::get('exams',[ProgramController::class,'exam'])->name('exam');
        // Route::get('exam-filter',[ProgramController::class,'exam'])->name('exam-filter');
        Route::get('create-new-exam',[ProgramController::class,'exam_create'])->name('create-exam');
        Route::get('edit-exam/{id?}',[ProgramController::class,'exam_edit'])->name('edit-exam');
        Route::get('delete-exam/{id?}',[ProgramController::class,'exam_delete'])->name('delete-exam');
        Route::post('update-exam/{id?}',[ProgramController::class,'exam_update'])->name('update-exam');
        Route::post('store-exam',[ProgramController::class,'exam_store'])->name('store-exam');
        Route::get('delete-exam/{id?}',[ProgramController::class,'exam_delete'])->name('delete-exam');

        // proficiency table
        Route::get('eng-proficiency-level',[ProgramController::class,'eng_proficiency_level'])->name('eng-proficiency-level');
        Route::get('create-eng-proficiency-level',[ProgramController::class,'eng_proficiency_level_create'])->name('create-eng-proficiency-level');
        Route::get('edit-eng-proficiency-level/{id?}',[ProgramController::class,'eng_proficiency_level_edit'])->name('edit-eng-proficiency-level');
        Route::get('delete-eng-proficiency-level/{id?}',[ProgramController::class,'eng_proficiency_level_delete'])->name('delete-eng-proficiency-level');
        Route::post('update-eng-proficiency-level/{id?}',[ProgramController::class,'eng_proficiency_level_update'])->name('update-eng-proficiency-level');
        Route::post('store-eng-proficiency-level',[ProgramController::class,'eng_proficiency_level_store'])->name('store-eng-proficiency-level');
        Route::get('delete-eng-proficiency-level/{id?}',[ProgramController::class,'eng_proficiency_level_delete'])->name('delete-eng-proficiency-level');

        // field-of-study
        Route::get('field-of-study-types',[ProgramController::class,'field_of_study'])->name('field-of-study');
        // Route::get('field-of-study-filter',[ProgramController::class,'field_of_study'])->name('field-of-study-filter');
        Route::get('create-field-of-study',[ProgramController::class,'field_of_study_create'])->name('create-field-of-study');
        Route::get('edit-field-of-study/{id?}',[ProgramController::class,'field_of_study_edit'])->name('edit-field-of-study');
        Route::get('delete-field-of-study/{id?}',[ProgramController::class,'field_of_study_delete'])->name('delete-field-of-study');
        Route::post('update-field-of-study/{id?}',[ProgramController::class,'field_of_study_update'])->name('update-field-of-study');
        Route::post('store-field-of-study',[ProgramController::class,'field_of_study_store'])->name('store-field-of-study');
        Route::get('delete-field-of-study/{id?}',[ProgramController::class,'field_of_study_delete'])->name('delete-field-of-study');

        // subjects
        Route::get('subjects',[ProgramController::class,'subjects'])->name('subject');
        Route::get('subject-filter',[ProgramController::class,'subjects'])->name('subjects-filter');
        Route::get('create-subject',[ProgramController::class,'subjects_create'])->name('create-subjects');
        Route::get('edit-subject/{id?}',[ProgramController::class,'subjects_edit'])->name('edit-subject');
        Route::get('delete-subject/{id?}',[ProgramController::class,'subjects_delete'])->name('delete-subject');
        Route::post('update-subject/{id?}',[ProgramController::class,'subjects_update'])->name('update-subject');
        Route::post('store-subject',[ProgramController::class,'subjects_store'])->name('store-subject');
        Route::get('delete-subject/{id?}',[ProgramController::class,'subject_delete'])->name('delete-subject');

        // specilization(
        Route::get('specializations',[OtherMasterDataController::class,'specializations'])->name('specilization');
        Route::get('specilization-filter',[OtherMasterDataController::class,'specializations'])->name('specilization-filter');
        Route::get('create-specilization',[OtherMasterDataController::class,'specializations_create'])->name('create-specilization');
        Route::get('edit-specilization/{id?}',[OtherMasterDataController::class,'specializations_edit'])->name('edit-specilization');
        Route::get('delete-specilization/{id?}',[OtherMasterDataController::class,'specializations_delete'])->name('delete-specilization');
        Route::post('update-specilization/{id?}',[OtherMasterDataController::class,'specializations_update'])->name('update-specilization');
        Route::post('store-specilization',[OtherMasterDataController::class,'specializations_store'])->name('store-specilization');
        Route::get('delete-specilization/{id?}',[OtherMasterDataController::class,'specializations_delete'])->name('delete-specilization');
        // source   (
        Route::get('source',[OtherMasterDataController::class,'source'])->name('source');
        Route::get('source-filter',[OtherMasterDataController::class,'source'])->name('source-filter');
        Route::get('create-source',[OtherMasterDataController::class,'source_create'])->name('create-source');
        Route::get('edit-source/{id?}',[OtherMasterDataController::class,'source_edit'])->name('edit-source');
        Route::get('delete-source/{id?}',[OtherMasterDataController::class,'source_delete'])->name('delete-source');
        Route::post('update-source/{id?}',[OtherMasterDataController::class,'source_update'])->name('update-source');
        Route::post('store-source',[OtherMasterDataController::class,'source_store'])->name('store-source');
        Route::get('delete-source/{id?}',[OtherMasterDataController::class,'source_delete'])->name('delete-source');
        // interested
        Route::get('interested',[OtherMasterDataController::class,'interested'])->name('interested');
        Route::get('interested-filter',[OtherMasterDataController::class,'interested'])->name('interested-filter');
        Route::get('create-interested',[OtherMasterDataController::class,'interested_create'])->name('create-interested');
        Route::get('edit-interested/{id?}',[OtherMasterDataController::class,'interested_edit'])->name('edit-interested');
        Route::get('delete-interested/{id?}',[OtherMasterDataController::class,'interested_delete'])->name('delete-interested');
        Route::post('update-interested/{id?}',[OtherMasterDataController::class,'interested_update'])->name('update-interested');
        Route::post('store-interested',[OtherMasterDataController::class,'interested_store'])->name('store-interested');
        Route::get('delete-interested/{id?}',[OtherMasterDataController::class,'interested_delete'])->name('delete-interested');

           // country
        Route::get('country',[OtherMasterDataController::class,'country'])->name('country');
        Route::get('country-filter',[OtherMasterDataController::class,'country'])->name('country-filter');
        Route::get('create-country',[OtherMasterDataController::class,'country_create'])->name('create-country');
        Route::get('edit-country/{id?}',[OtherMasterDataController::class,'country_edit'])->name('edit-country');
        Route::get('delete-country/{id?}',[OtherMasterDataController::class,'country_delete'])->name('delete-country');
        Route::post('update-country/{id?}',[OtherMasterDataController::class,'country_update'])->name('update-country');
        Route::post('store-country',[OtherMasterDataController::class,'country_store'])->name('store-country');
        Route::get('delete-country/{id?}',[OtherMasterDataController::class,'country_delete'])->name('delete-country');
          // provience
        Route::get('province',[OtherMasterDataController::class,'province'])->name('province');
        Route::get('province-filter',[OtherMasterDataController::class,'province'])->name('province-filter');
        Route::get('create-province',[OtherMasterDataController::class,'province_create'])->name('create-province');
        Route::get('edit-province/{id?}',[OtherMasterDataController::class,'province_edit'])->name('edit-province');
        Route::get('delete-province/{id?}',[OtherMasterDataController::class,'province_delete'])->name('delete-province');
        Route::post('update-province/{id?}',[OtherMasterDataController::class,'province_update'])->name('update-province');
        Route::post('store-province',[OtherMasterDataController::class,'province_store'])->name('store-province');
        Route::get('delete-province/{id?}',[OtherMasterDataController::class,'province_delete'])->name('delete-province');
        // visa-type
        Route::get('visa-type',[OtherMasterDataController::class,'visa_type'])->name('visa-type');
        Route::get('visa-type-filter',[OtherMasterDataController::class,'visa_type'])->name('visa-type-filter');
        Route::get('create-visa-type',[OtherMasterDataController::class,'visa_type_create'])->name('create-visa-type');
        Route::get('edit-visa-type/{id?}',[OtherMasterDataController::class,'visa_type_edit'])->name('edit-visa-type');
        Route::get('delete-visa-type/{id?}',[OtherMasterDataController::class,'visa_type_delete'])->name('delete-visa-type');
        Route::post('update-visa-type/{id?}',[OtherMasterDataController::class,'visa_type_update'])->name('update-visa-type');
        Route::post('store-visa-type',[OtherMasterDataController::class,'visa_type_store'])->name('store-visa-type');
        Route::get('delete-visa-type/{id?}',[OtherMasterDataController::class,'visa_type_delete'])->name('delete-visa-type');
        // faq
        Route::get('faqs',[OtherMasterDataController::class,'faq'])->name('faq');
        Route::get('faq-filter',[OtherMasterDataController::class,'faq'])->name('faq-filter');
        Route::get('create-faq',[OtherMasterDataController::class,'faq_create'])->name('create-faq');
        Route::get('edit-faq/{id?}',[OtherMasterDataController::class,'faq_edit'])->name('edit-faq');
        Route::get('delete-faq/{id?}',[OtherMasterDataController::class,'faq_delete'])->name('delete-faq');
        Route::post('update-faq/{id?}',[OtherMasterDataController::class,'faq_update'])->name('update-faq');
        Route::post('store-faq',[OtherMasterDataController::class,'faq_store'])->name('store-faq');
        Route::get('delete-faq/{id?}',[OtherMasterDataController::class,'faq_delete'])->name('delete-faq');
        // vas-service
        Route::get('vas-services',[OtherMasterDataController::class,'vas_service'])->name('vas-service');
        Route::get('vas-service-filter',[OtherMasterDataController::class,'vas_service'])->name('vas-service-filter');
        Route::get('create-vas-service',[OtherMasterDataController::class,'vas_service_create'])->name('create-vas-service');
        Route::get('edit-vas-service/{id?}',[OtherMasterDataController::class,'vas_service_edit'])->name('edit-vas-service');
        Route::get('delete-vas-service/{id?}',[OtherMasterDataController::class,'vas_service_delete'])->name('delete-vas-service');
        Route::post('update-vas-service/{id?}',[OtherMasterDataController::class,'vas_service_update'])->name('update-vas-service');
        Route::post('store-vas-service',[OtherMasterDataController::class,'vas_service_store'])->name('store-vas-service');
        Route::get('delete-vas-service/{id?}',[OtherMasterDataController::class,'vas_service_delete'])->name('delete-vas-service');


        // Education Lane
        Route::get('education-lane',[OtherMasterDataController::class,'education_lane'])->name('education-lane');
        Route::get('education-lane-filter',[OtherMasterDataController::class,'education_lane'])->name('education-lane-filter');
        Route::get('create-education-lane',[OtherMasterDataController::class,'education_lane_create'])->name('create-education-lane');
        Route::get('edit-education-lane/{id?}',[OtherMasterDataController::class,'education_lane_edit'])->name('edit-education-lane');
        Route::get('delete-education-lane/{id?}',[OtherMasterDataController::class,'education_lane_delete'])->name('delete-education-lane');
        Route::post('update-education-lane/{id?}',[OtherMasterDataController::class,'education_lane_update'])->name('update-education-lane');
        Route::post('store-education-lane',[OtherMasterDataController::class,'education_lane_store'])->name('store-education-lane');
        Route::get('delete-education-lane/{id?}',[OtherMasterDataController::class,'education_lane_delete'])->name('delete-education-lane');

        // scholorship
        Route::get('scholarship/{id?}',[StudentController::class,'scholarship'])->name('scholarship');
        Route::get('scholarship-filter',[StudentController::class,'scholarship'])->name('scholarship-filter');
        Route::get('create-scholorship',[StudentController::class,'scholarship_create'])->name('create-scholarship');
        Route::get('edit-scholarship/{id?}',[StudentController::class,'scholarship_edit'])->name('edit-scholarship');
        Route::get('delete-scholarship/{id?}',[StudentController::class,'scholarship_delete'])->name('delete-scholarship');
        Route::post('update-scholarship/{id?}',[StudentController::class,'scholarship_update'])->name('update-scholarship');
        Route::post('store-scholarship',[StudentController::class,'scholarship_store'])->name('store-scholarship');

             // Blogs
        Route::get('blogs/{id?}',[CmsController::class,'blogs'])->name('blogs');
        Route::get('blogs-filter',[CmsController::class,'blogs'])->name('blogs-filter');
        Route::get('create-blogs',[CmsController::class,'blogs_create'])->name('create-blogs');
        Route::get('edit-blogs/{id?}',[CmsController::class,'blogs_edit'])->name('edit-blogs');
        Route::get('delete-blogs/{id?}',[CmsController::class,'blogs_delete'])->name('delete-blogs');
        Route::post('update-blogs/{id?}',[CmsController::class,'blogs_update'])->name('update-blogs');
        Route::post('store-blogs',[CmsController::class,'blogs_store'])->name('store-blogs');

        Route::get('master-service/{id?}',[CmsController::class,'master_service'])->name('master_service');
        Route::get('create-master-service',[CmsController::class,'master_service_create'])->name('create-master-service');
        Route::get('edit-master-service/{id?}',[CmsController::class,'master_service_edit'])->name('edit-master-service');
        Route::get('delete-master-service/{id?}',[CmsController::class,'master_service_delete'])->name('delete-master-service');
        Route::post('update-master-service/{id?}',[CmsController::class,'master_service_update'])->name('update-master-service');
        Route::post('store-master-service',[CmsController::class,'master_service_store'])->name('store-master-service');
        // testimonial
        Route::get('testimonial/{id?}',[CmsController::class,'testimonial'])->name('testimonial');
        Route::get('testimonial-filter',[CmsController::class,'testimonial'])->name('testimonial-filter');
        Route::get('create-testimonial',[CmsController::class,'testimonial_create'])->name('create-testimonial');
        Route::get('edit-testimonial/{id?}',[CmsController::class,'testimonial_edit'])->name('edit-testimonial');
        Route::get('delete-testimonial/{id?}',[CmsController::class,'testimonial_delete'])->name('delete-testimonial');
        Route::post('update-testimonial/{id?}',[CmsController::class,'testimonial_update'])->name('update-testimonial');
        Route::post('store-testimonial',[CmsController::class,'testimonial_store'])->name('store-testimonial');

        // message lead
        Route::get('message-lead',[MessageController::class,'message_lead'])->name('message-lead');
        Route::get('message-franchise',[MessageController::class,'message_frenchise'])->name('message-frenchise');
        Route::get('message-student',[MessageController::class,'message_student'])->name('message-student');
        Route::get('message-lead',[MessageController::class,'message_lead'])->name('message-lead');
        Route::post('send-sms',[MessageController::class,'sendSmsToLeadUsers'])->name('send-sms');
        Route::post('send-email',[MessageController::class,'sendEmailToLeadUsers'])->name('send-email');
        Route::post('send-sms-frenchise',[MessageController::class,'sendSmsToFrenchise'])->name('send-sms-frenchise');
        Route::post('send-email-frenchise',[MessageController::class,'sendEmailToFrenchise'])->name('send-email-frenchise');
        Route::post('send-sms-student',[MessageController::class,'sendSmsToStudent'])->name('send-sms-student');
        Route::post('send-email-student',[MessageController::class,'sendEmailToStudent'])->name('send-email-student');
        Route::get('outbox',[MessageController::class,'outbox'])->name('outbox');
        Route::get('trash',[MessageController::class,'trash'])->name('trash');
        Route::post('delete-sms',[MessageController::class,'delete_sms'])->name('delete-sms');
        Route::post('delete-sms-permanent',[MessageController::class,'delete_outbox'])->name('delete-sms-permanent');
        // sms-template

        Route::get('sms-template/{id?}',[MessageController::class,'sms_template'])->name('sms-template');
        Route::get('sms-template-filter',[MessageController::class,'sms_template'])->name('sms-template-filter');
        Route::get('create-sms-template',[MessageController::class,'sms_template_create'])->name('create-sms-template');
        Route::get('edit-sms-template/{id?}',[MessageController::class,'sms_template_edit'])->name('edit-sms-template');
        Route::get('delete-sms-template/{id?}',[MessageController::class,'sms_template_delete'])->name('delete-sms-template');
        Route::post('update-sms-template/{id?}',[MessageController::class,'sms_template_update'])->name('update-sms-template');
        Route::post('store-sms-template',[MessageController::class,'sms_template_store'])->name('store-sms-template');
        Route::post('show-lead-sms',[MessageController::class,'show_msg'])->name('show-lead-sms');
        Route::post('show-lead-email',[MessageController::class,'show_email'])->name('show-lead-email');

    });
    Route::prefix('franchise')->group(function () {
           // frenchise
           Route::get("franchise-list",[FrenchiseController::class,'index'])->name('frenchise.index');
           Route::get("create-franchise",[FrenchiseController::class,'create'])->name('frenchise-create');
           Route::get("edit-franchise/{id?}",[FrenchiseController::class,'edit'])->name('frenchise-edit');
           Route::Post("store-franchise",[FrenchiseController::class,'store'])->name('frenchise-store');
        //    Route::get("pincode",[FrenchiseController::class,'pincode'])->name('frenchise-pincode');
           Route::get("manage-oel-presentation",[FrenchiseController::class,'manage_oel_pres'])->name('manage-oel-pres');
           Route::post("manage-oel-presentation",[FrenchiseController::class,'store_manage_oel_pres'])->name('store-manage-oel-pres');
           Route::get("delete-manage-oel-presentation/{id?}",[FrenchiseController::class,'delete_manage_oel_pres'])->name('delete-manage-oel-presentation');
           Route::match(['get', 'post'], 'frenchise-filter/{action?}', [FrenchiseController::class, 'index'])->name('frenchise-filter');
           Route::get("manage-oel-agreement-letter",[FrenchiseController::class,'manage_oel_agreement'])->name('manage-oel-agreement');
           Route::post("manage-oel-agreement",[FrenchiseController::class,'store_manage_oel_agreement'])->name('store-manage-oel-agreement');

    });
    Route::prefix('student')->group(function () {
        Route::get('applied-program',[StudentController::class,'applieed_program'])->name('applied-program');
        Route::get("my-profile",[StudentController::class,'student_profile'])->name('student-profile');
        Route::get("edit-profile",[StudentController::class,'edit_student'])->name('student-edit');
        Route::post("store-profile",[StudentController::class,'store_student'])->name('student-store');
        Route::post("grading-scheme-list",[StudentController::class,'grading_scheme_list'])->name('grading-scheme-list');
        Route::post('update-attended-school', [StudentController::class, 'update_attendended_school'])->name('update-attended-school');
        Route::get('delete-student-attendence/{id?}', [StudentController::class, 'delete_attendended'])->name('delete-student-attendence');
        Route::get('delete-student-test-score/{id?}', [StudentController::class, 'delete_test_score'])->name('delete-student-test-score');
        Route::post('update-gre-exam-data/{id?}', [StudentController::class, 'update_gre_exam_data'])->name('update-gre-exam-data');
        Route::post('update-gmat-exam-data/{id?}', [StudentController::class, 'update_gmat_exam_data'])->name('update-gmat-exam-data');
        Route::post('update_test_core/{id?}', [StudentController::class, 'update_test_score'])->name('update-test-score');
        Route::get('delete-student-document/{id?}', [StudentController::class, 'delete_document'])->name('delete-student-document');


    });

    Route::get('/fetch-state', [LeadsManageCotroller::class, 'fetchStates'])->name('state.get');
});
Route::middleware(['auth'])->prefix('landing-page')->group(function () {
    Route::get("/ads",[\App\Http\Controllers\LandingPage\DashboardController::class,'getAds'])->name('getAds');
    Route::get("create/ads",[\App\Http\Controllers\LandingPage\DashboardController::class,'createAds'])->name('create.ads');
    Route::post("store/ads",[\App\Http\Controllers\LandingPage\DashboardController::class,'storeAds'])->name('store.ads');
    Route::get("edit/ads/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'editAds'])->name('edit.ads');
    Route::post("update/ads/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'updateAds'])->name('update.ads');
    Route::get("delete/ads/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'deleteAds'])->name('delete.ads');
    // slider
    Route::get("getSlider",[\App\Http\Controllers\LandingPage\DashboardController::class,'getSlider'])->name('getSlider');
    Route::get("create/slider",[\App\Http\Controllers\LandingPage\DashboardController::class,'createSlider'])->name('create.slider');
    Route::get('/fetch-states', [\App\Http\Controllers\LandingPage\DashboardController::class, 'fetchStates'])->name('states.get');
    Route::post("store/slider",[\App\Http\Controllers\LandingPage\DashboardController::class,'storeSlider'])->name('store.slider');
    Route::get("edit/slider/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'editSlider'])->name('edit.slider');
    Route::get("show/slider/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'showSlider'])->name('show.slider');
    Route::post("update/slider/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'updateSlider'])->name('update.slider');
    Route::get("delete/slider/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'deleteSlider'])->name('delete.slider');
    Route::post("update-slider-status",[\App\Http\Controllers\LandingPage\DashboardController::class,'updateSliderStatus'])->name('statusUpdate');
    // indexpage Data'
    Route::get("emailData",[\App\Http\Controllers\LandingPage\DashboardController::class,'emailData'])->name('emailData');
    Route::get("email-delete/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'emailDelete'])->name('emailDelete');
    // whycountry
    Route::get("country-university",[\App\Http\Controllers\LandingPage\DashboardController::class,'countryUniversity'])->name('country.university');
    Route::get("create/country-university",[\App\Http\Controllers\LandingPage\DashboardController::class,'createCountryUniversity'])->name('create.country.university');
    Route::post("country-university/store",[\App\Http\Controllers\LandingPage\DashboardController::class,'storeCountryUniversity'])->name('store.country.university');
    Route::get("edit/country-university/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'editCountryUniversity'])->name('edit.country.university');
    Route::post("update/country-university/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'updateCountryUniversity'])->name('update.country.university');
    Route::get("delete/country-university/{id}",[\App\Http\Controllers\LandingPage\DashboardController::class,'deleteCountryUniversity'])->name('delete.country.university');

});

Route::get('/landing-page', [App\Http\Controllers\LandingPage\HomeController::class, 'index'])->name('index');
Route::post('landing-page/get-country-data', [App\Http\Controllers\LandingPage\HomeController::class, 'getCountryData'])->name('get-country-data');
// Route::get('country/{id}',[App\Http\Controllers\LandingPage\HomeController::class,'getIndexPageData'])->name('country');
Route::post('landing-page/send-mail',[App\Http\Controllers\LandingPage\HomeController::class,'sendMail'])->name('send-mail');



require __DIR__.'/auth.php';
