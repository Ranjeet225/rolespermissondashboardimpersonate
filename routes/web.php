<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadsManageCotroller;
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
        Route::get('oel-360/', [LeadsManageCotroller::class, 'oel_360'])->name('oel_360');
        Route::get('lead-details', [LeadsManageCotroller::class, 'lead_details'])->name('lead-details');
        Route::get('apply-360/{id}', [LeadsManageCotroller::class, 'aply_360'])->name('aply-360');
        Route::post('aply-lead-360/', [LeadsManageCotroller::class, 'store_lead_360'])->name('store-lead-360');
        Route::get('leads/{key}', [LeadsManageCotroller::class, 'fetch_leads'])->name('fetch-leads');
        Route::get('bulk-upload/', [LeadsManageCotroller::class, 'bulk_upload'])->name('bulk-upload');
        Route::post('excel-sheet-uplod-lead',[LeadsManageCotroller::class,'excel_sheet_leads'])->name('excel-sheet-leads');
        Route::Post('add-user-follow-up',[LeadsManageCotroller::class,'add_user_follow_up'])->name('add-user-follow-up');
        Route::get('fetch-follow-up-date',[LeadsManageCotroller::class,'follow_up_list'])->name('follow-up-list');
        // Route::post('/users/store', [LeadsManageCotroller::class, 'store']);
        // Route::get('/users/edit/{id}', [LeadsManageCotroller::class, 'edit']);
        // Route::post('/users/update/{id}', [LeadsManageCotroller::class, 'update']);
        // Route::get('/users/delete/{id}', [LeadsManageCotroller::class, 'destroy']);
        Route::post("update-user-status",[UserController::class,'updateUserStatus'])->name('statusUpdate');
        Route::post("approve-user-status",[UserController::class,'approveUserStatus'])->name('approveStatusUpdate');
        Route::get("relocate-frenchise",[LeadsManageCotroller::class,'relocated_frenchise'])->name('relocated-frenchise');
        Route::post('assign-leads',[LeadsManageCotroller::class,'allocate_franchise'])->name('assign-leads');
    });
    Route::get('/fetch-states', [LeadsManageCotroller::class, 'fetchStates'])->name('states.get');
});

require __DIR__.'/auth.php';
