<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDatatable;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
    {
        view()->share('page_title', 'Admin User List');
        $this->middleware('auth');
       $this->middleware('role_or_permission:admin_user.create', ['only' => ['create', 'store']]);
       $this->middleware('role_or_permission:admin_user.update', ['only' => ['edit', 'update']]);
       $this->middleware('role_or_permission:admin_user.view', ['only' => ['index', 'show']]);
       $this->middleware('role_or_permission:admin_user.delete', ['only' => ['destroy']]);
       $roles = Role::pluck('name','id')->toArray();
        view()->share('roles', $roles);
    }

    public function index(Request $request)
    {
        $user = User::query();
        if($request->status == 'Active'){
            $active_Status = 1;
        }else{
            $active_Status = 0;
        }
        if($request->approvestatus == 'Approve'){
            $approvestatus = 1;
        }else{
            $approvestatus = 0;
        }
        // die;
        $authuser = Auth::user();
        if (!($authuser->hasRole('Administrator'))) {
            $userid = Auth::user()->id;
            $user->where('added_by',$userid);
        }
        if ($request->name) {
            $user->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->email) {
            $user->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->roles) {
            $user->where('admin_type', 'LIKE', $request->roles . '%');
        }
        if ($request->status) {
            $user->where('is_active',$active_Status);
        }
        if ($request->approvestatus) {
            $user->where('status', $approvestatus);
        }
        $roles = Role::select('name','id')->get();
        $users = $user->paginate(15);
        return view('user.index')->with(compact('roles','users'));
    }

    public function create()
    {
        $role = Role::pluck('name','id')->toArray();
        $user = Auth::user();
        if (!($user->hasRole('Administrator'))) {
            $role = array_filter($role, function ($name) {
                return !in_array($name, ['Administrator', 'agent']);
            });
        }
        return view('user.create',compact('role'));
    }

    public function store(UserRequest $request)
    {
        $input = $request->only('name', 'email', 'status', 'password');
        $checkUserExist = User::where('email', trim($input['email']))->exists();
        if ($checkUserExist) {
            throw ValidationException::withMessages([
                'email' => [__('This Email has already been taken.')],
            ]);
        }
        $input['is_active'] = $request->filled('status') ? 1 : 0;
        $input['password'] = Hash::make($request->password);
        $role =Role::where('id',$request->role)->first();
        $input['admin_type'] = $role->name;
        $input['phone_number'] = $request->phone_number;
        $input['added_by'] = Auth::user()->id;
        $userInserted = DB::table('users')->insert($input);
        if ($userInserted) {
            $user = User::where('email', $input['email'])->first();
            if ($request->filled('role')) {
                $role = Role::find($request->get('role'));
                if ($role) {
                    $user->assignRole([$role->id]);
                }
            }
        }
        return redirect()->route('users.index')->with('success', $user->firstname . ' New User Added Successfully');
    }

    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $users = User::with('roles')->where('id', $id)->first();
        return view('user.edit', [
            'users' => $users
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(UserRequest $request, $id)
    {
        $input = $request->only('name', 'email', 'status');
        if($request->missing('status')){
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }
        $input['phone_number'] = $request->phone_number;
        $input['added_by'] = Auth::user()->id;
        $user = User::find($id);
        if($request->filled('role')){
            $role = Role::find($request->get('role'));
            $input['admin_type'] = $role->name;
        }
        $user->update($input);
        $user->roles()->detach();
        if($request->filled('role')){
            $role = Role::find($request->get('role'));
            if(!empty($role)){
                $user->assignRole([$request->get('role')]);
            }
        }
        return redirect()->route('users.index')->with('success', $user->firstname . ' User Updated Successfully');
        // return redirect()->back()->with('success', $user->firstname.'User Updated Successfully');
    }

    public function show($id)
    {
        $users = User::find($id);
        if (empty($users)) {
            throw ValidationException::withMessages([
                'error' => [__('Admin User is not found')],
            ]);
        }
        return view('user.show', ['users' => $users]);
    }

    /**
     * Delere user by admin
     *
     *
     * */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->withErrors('Unable to find user.');
        }
        if ($user->hasRole('Administrator')) {
            return redirect()->back()->withErrors('Administrative users cannot be deleted.');
        }
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }

    /**
     * Delete the user's account from profile section.
     */
    public function deleteAccount(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/login');
    }

    public function impersonate(User $user)
    {
        if (Auth::user()->hasRole('Administrator')) {
            $adminUser = Auth::user();
            Auth::login($user);
            Session::put('admin_user', $adminUser);
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'You are not authorized to impersonate users.');
    }
    public function revertToAdmin()
    {
        $adminUser = Session::get('admin_user');
        if ($adminUser) {
            Auth::login($adminUser);
            Session::forget('admin_user');
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Admin user information not found.');
    }

    public function updateUserStatus(Request $request)
    {
        $userrole =User::where('id',$request->id)->first();
        if($userrole->admin_type == 'agent' || $userrole->admin_type == 'sub_agent'){
            DB::table('agents')->where('email', $userrole->email)->update(['is_active' => $request->status]);
        }
        $Id = $request->input('id');
        DB::table('users')->where('id', $Id)->update(['is_active' => $request->status]);
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function approveUserStatus(Request $request)
    {
        $Id = $request->userId;
        $userrole =User::where('id',$Id)->first();
        if($userrole->admin_type == 'agent' || $userrole->admin_type == 'sub_agent'){
            DB::table('agents')->where('email', $userrole->email)->update(['is_approve' => $request->selectedValue]);
        }
        DB::table('users')->where('id', $Id)->update(['status' => $request->selectedValue]);
        return response()->json(['message' => 'Status updated successfully']);
    }


}
