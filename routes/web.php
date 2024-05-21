<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrenchiseController;
use App\Http\Controllers\LeadsManageCotroller;
use App\Http\Controllers\OtherMasterDataController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use App\Models\EducationLevel;
use App\Models\Program;
use App\Models\University;
use Maatwebsite\Excel\Row;

/*
in this project some name of model or function and table name is wrong because
this project make with refrence with another project har project are working

so sorry for repeat this mistake because i am not makeing new table just i am using exiting database
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/impersonate/{user}', 'UserController@impersonate')->name('impersonate')->middleware('can:impersonate-users');
// Route::get('/impersonate/{user}', [UserController::class, 'impersonate'])->name('impersonate')->middleware('auth', 'role:Administrator');
// Route::get('/revert-to-admin', [UserController::class, 'revertToAdmin'])->name('revert_to_admin')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
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
        Route::any('excel-sheet-export', [LeadsManageCotroller::class, 'lead_list_export'])->name('lead_list_export');
        Route::get('manage-lead/{id}', [LeadsManageCotroller::class, 'manage_lead'])->name('manage-lead');
        Route::get('edit-lead/{id}', [LeadsManageCotroller::class, 'edit_lead_data'])->name('edit-lead');
        Route::get('show-lead/{id}', [LeadsManageCotroller::class, 'show_lead'])->name('view-lead');
        Route::get('create_student_profile/{id}', [LeadsManageCotroller::class, 'create_student_profile'])->name('create-student-profile');
        Route::get('oel-360/', [LeadsManageCotroller::class, 'oel_360'])->name('oel_360');
        Route::get('lead-details', [LeadsManageCotroller::class, 'lead_details'])->name('lead-details');
        Route::get('apply-360/{id}', [LeadsManageCotroller::class, 'aply_360'])->name('apply-360');
        Route::get('apply-oel-360', [LeadsManageCotroller::class, 'aply_360'])->name('apply-oel-360');
        Route::post('aply-lead-360/', [LeadsManageCotroller::class, 'store_lead_360'])->name('store-lead-360');
        Route::get('leads/{key}', [LeadsManageCotroller::class, 'fetch_leads'])->name('fetch-leads');
        Route::get('bulk-upload/', [LeadsManageCotroller::class, 'bulk_upload'])->name('bulk-upload');
        Route::post('excel-sheet-uplod-lead',[LeadsManageCotroller::class,'excel_sheet_leads'])->name('excel-sheet-leads');
        Route::Post('add-user-follow-up',[LeadsManageCotroller::class,'add_user_follow_up'])->name('add-user-follow-up');
        Route::get('fetch-follow-up-date',[LeadsManageCotroller::class,'follow_up_list'])->name('follow-up-list');
        Route::post("update-user-status",[UserController::class,'updateUserStatus'])->name('statusUpdate');
        Route::post("approve-user-status",[UserController::class,'approveUserStatus'])->name('approveStatusUpdate');
        Route::get("relocate-frenchise",[LeadsManageCotroller::class,'relocated_frenchise'])->name('relocated-frenchise');
        Route::post('assign-leads',[LeadsManageCotroller::class,'allocate_franchise'])->name('assign-leads');
        // Route::post('assign-leads',[LeadsManageCotroller::class,'allocate_franchise']);
        Route::get("student-list",[StudentController::class,'student_list'])->name('student-list');

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
        Route::get("approved-university",[UniversityController::class,'manage_university'])->name('approved-university');
        Route::get("un-approve-university",[UniversityController::class,'manage_university'])->name('unapproved-university');
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
        Route::get('oel-type',[UniversityController::class,'oel_type'])->name('oel-type');
        Route::get('add-type',[UniversityController::class,'add_type'])->name('add-type');
        Route::post('store-oel-type',[UniversityController::class,'store_oel_type'])->name('store-oel-type');
        Route::get('edit-type/{id?}',[UniversityController::class,'edit_oel_type'])->name('edit-type');
        Route::post('update-oel-type/{id?}',[UniversityController::class,'update_oel_type'])->name('update-oel-type');
        Route::get('delete-type/{id?}',[UniversityController::class,'delete_oel_type'])->name('delete-type');

        // program module
        Route::get('manage-program',[ProgramController::class,'manage_program'])->name('manage-program');
        Route::get('add-program',[ProgramController::class,'add_program'])->name('add-program');
        Route::post('store-program',[ProgramController::class,'store_program'])->name('store-program');
        Route::get('edit-program/{id}',[ProgramController::class,'edit_program'])->name('edit-program');
        Route::Post('update-program/{id}',[ProgramController::class,'update_program'])->name('update-program');
        Route::post('req_score_prog_add', [ProgramController::class, 'req_score_prog_add'])->name('req-score-prog-add');
        Route::get('req_score_prog', [ProgramController::class, 'fetch_req_score_prog'])->name('fetch-req-score-prog');
        Route::post('update_program_commission', [ProgramController::class, 'update_program_commission'])->name('update-program-commission');
        Route::get('delete-score-program',[ProgramController::class,'delete_score_program'])->name('delete-score-program');
        Route::get('program-filter',[ProgramController::class,'manage_program'])->name('program-filter');
        Route::get('approve-program',[ProgramController::class,'approve_program'])->name('approve-program');
        Route::get('view-program/{id}',[ProgramController::class,'view_program'])->name('view-program');

        Route::get('approve-program-filter',[ProgramController::class,'approve_program'])->name('approve-program-filter');
        Route::get('program-level-details',[ProgramController::class,'program_level_details'])->name('program-level-details');
        Route::get('edit-program-level/{id?}',[ProgramController::class,'edit_program_level'])->name('edit-program-level');
        Route::get('delete-program-level/{id?}',[ProgramController::class,'delete_program_level'])->name('delete-program-level');
        Route::post('update-home-program-level/{id?}',[ProgramController::class,'update_program_level'])->name('update-home-program-level');
        Route::get('create-new-program-level',[ProgramController::class,'create_program_level'])->name('create-new-program-level');
        Route::post('store-program-level',[ProgramController::class,'store_program_level'])->name('store-program-level');

        // EducationLevel
        Route::get('education-level',[ProgramController::class,'education_level'])->name('education-level');
        Route::get('education-level-filter',[ProgramController::class,'education_level'])->name('education-level-filter');
        Route::get('edit-education-level/{id?}',[ProgramController::class,'education_level_edit'])->name('edit-education-level');
        Route::get('delete-education-level/{id?}',[ProgramController::class,'education_level_delete'])->name('delete-education-level');
        Route::post('update-education-level/{id?}',[ProgramController::class,'education_level_update'])->name('update-education-level');
        Route::get('create-new-education-level',[ProgramController::class,'education_level_create'])->name('create-new-education-level');
        Route::post('store-education-level',[ProgramController::class,'education_level_store'])->name('store-education-level');
        // Program level

        Route::get('program-level',[ProgramController::class,'program_level'])->name('program-level');
        Route::get('program-level-filter',[ProgramController::class,'program_level'])->name('program-level-filter');
        Route::get('edit-program-level/{id?}',[ProgramController::class,'program_level_edit'])->name('edit-program-level');
        Route::get('delete-program-level/{id?}',[ProgramController::class,'program_level_delete'])->name('delete-program-level');
        Route::post('update-program-level/{id?}',[ProgramController::class,'program_level_update'])->name('update-program-level');
        Route::get('create-new-program-level',[ProgramController::class,'program_level_create'])->name('create-new-program-level');
        Route::post('store-program-level',[ProgramController::class,'program_level_store'])->name('store-program-level');

        // grading scheme
        Route::get('grading-scheme',[ProgramController::class,'grading_scheme'])->name('grading-scheme');
        Route::get('grading-scheme-filter',[ProgramController::class,'grading_scheme'])->name('grading-scheme-filter');
        Route::get('create-new-grading-scheme',[ProgramController::class,'grading_scheme_create'])->name('create-new-grading-scheme');
        Route::get('edit-grading-scheme/{id?}',[ProgramController::class,'grading_scheme_edit'])->name('edit-grading-scheme');
        Route::get('delete-grading-scheme/{id?}',[ProgramController::class,'grading_scheme_delete'])->name('delete-grading-scheme');
        Route::post('update-grading-scheme/{id?}',[ProgramController::class,'grading_scheme_update'])->name('update-grading-scheme');
        Route::post('store-grading-scheme',[ProgramController::class,'grading_scheme_store'])->name('store-grading-scheme');

        // exam
        Route::get('exams',[ProgramController::class,'exam'])->name('exam');
        Route::get('exam-filter',[ProgramController::class,'exam'])->name('exam-filter');
        Route::get('create-new-exam',[ProgramController::class,'exam_create'])->name('create-exam');
        Route::get('edit-exam/{id?}',[ProgramController::class,'exam_edit'])->name('edit-exam');
        Route::get('delete-exam/{id?}',[ProgramController::class,'exam_delete'])->name('delete-exam');
        Route::post('update-exam/{id?}',[ProgramController::class,'exam_update'])->name('update-exam');
        Route::post('store-exam',[ProgramController::class,'exam_store'])->name('store-exam');
        Route::get('delete-exam/{id?}',[ProgramController::class,'exam_delete'])->name('delete-exam');
        // field-of-study
        Route::get('field-of-study-types',[ProgramController::class,'field_of_study'])->name('field-of-study');
        Route::get('field-of-study-filter',[ProgramController::class,'field_of_study'])->name('field-of-study-filter');
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
        Route::get('province-filter',[OtherMasterDataController::class,'province'])->name('provience-filter');
        Route::get('create-province',[OtherMasterDataController::class,'province_create'])->name('create-province');
        Route::get('edit-province/{id?}',[OtherMasterDataController::class,'province_edit'])->name('edit-province');
        Route::get('delete-province/{id?}',[OtherMasterDataController::class,'province_delete'])->name('delete-province');
        Route::post('update-province/{id?}',[OtherMasterDataController::class,'province_update'])->name('update-province');
        Route::post('store-province',[OtherMasterDataController::class,'province_store'])->name('store-province');
        Route::get('delete-province/{id?}',[OtherMasterDataController::class,'province_delete'])->name('delete-province');

    });
    Route::prefix('franchise')->group(function () {
           // frenchise
           Route::get("franchise-list",[FrenchiseController::class,'index'])->name('frenchise.index');
           Route::get("create-franchise",[FrenchiseController::class,'create'])->name('frenchise-create');
           Route::get("edit-franchise/{id?}",[FrenchiseController::class,'edit'])->name('frenchise-edit');
           Route::Post("store-franchise",[FrenchiseController::class,'store'])->name('frenchise-store');
           Route::get("manage-oel-presentation",[FrenchiseController::class,'manage_oel_pres'])->name('manage-oel-pres');
           Route::post("manage-oel-presentation",[FrenchiseController::class,'store_manage_oel_pres'])->name('store-manage-oel-pres');
           Route::get("delete-manage-oel-presentation/{id?}",[FrenchiseController::class,'delete_manage_oel_pres'])->name('delete-manage-oel-presentation');
           Route::match(['get', 'post'], 'frenchise-filter/{action?}', [FrenchiseController::class, 'index'])->name('frenchise-filter');
           Route::get("manage-oel-agreement-letter",[FrenchiseController::class,'manage_oel_agreement'])->name('manage-oel-agreement');
           Route::post("manage-oel-agreement",[FrenchiseController::class,'store_manage_oel_agreement'])->name('store-manage-oel-agreement');

    });
    Route::prefix('student')->group(function () {
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

    Route::get('/fetch-states', [LeadsManageCotroller::class, 'fetchStates'])->name('states.get');
});

require __DIR__.'/auth.php';
