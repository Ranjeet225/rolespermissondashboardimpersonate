<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrenchiseController;
use App\Http\Controllers\LeadsManageCotroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use App\Models\University;
use Maatwebsite\Excel\Row;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
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
