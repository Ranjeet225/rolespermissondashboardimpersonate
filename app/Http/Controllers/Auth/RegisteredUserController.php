<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Student;
use App\Models\StudentByAgent;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccess;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validate=  $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'admin_type' => 'super_admin',
            'status' => 1,
            'password' => Hash::make($request->password),
        ]);
//        $user->assignRole(['Administrator']);

        //event(new Registered($user));
        //Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        //return redirect('login');
        return redirect('login')->with('status', __('Congratulations, Your account has been successfully created.'));
    }

    public function franchise_register()
    {
        return view('auth.franchise_register');
    }

    public function student_registration()
    {
        return view('auth.student_registration');
    }

    public function student_store(Request $request)
    {
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|confirmed',
        'phone_number'=>'required',
       ]);
       $student = StudentByAgent::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
       ]);
       $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'admin_type'=>'student',
            'phone_number'=>$request->phone_number,
            'status'=>1,
            'is_active'=>1,
            'password'=>Hash::make($request->password),
       ]);
       Student::create([
            'user_id'=>$user->id,
            'first_name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
        ]);
        $role = Role::where('name','student')->first();
        if ($role) {
            $user->assignRole([$role->id]);
        }
       $student->user_id = $user->id;
       $student->save();
       Mail::to($request->email,)->send(new RegistrationSuccess($student));
       Auth::login($user);
       return redirect()->route('dashboard');
       return redirect()->route('user-login')->with('success', 'You have successfully registered. Please login to continue.');
    }
    public function counselor_register()
    {
        return view('auth.counselor_register');
    }

    public function franchise_user_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'integer'],
            'state_id' => ['nullable', 'integer'],
            'city' => ['nullable', 'string', 'max:255'],
            'business_name' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'string', 'max:255'],
            'profession' => ['nullable', 'string', 'max:255'],
            'expertise' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'address2' => ['nullable', 'string', 'max:255'],
           'password'=>'required|confirmed',
           'otp' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $storedOtp = session('otp');
        if ($request->otp == $storedOtp) {
            session()->forget('otp');
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'admin_type' => 'agent',
                'phone_number' => $request->phone,
                'status' => 1,
                'is_active' => 1,
                'password' => Hash::make($request->password),
            ]);
            $role = Role::where('name','agent')->first();
            if ($role) {
                $user->assignRole([$role->id]);
            }
            $agent = new Agent();
            $agent->user_id = $user->id;
            $agent->legal_first_name = $request->name;
            $agent->email = $request->email;
            $agent->phone = $request->phone;
            $agent->country_id = $request->country_id;
            $agent->state_id = $request->state_id;
            $agent->city = $request->city;
            $agent->business_name = $request->business_name;
            $agent->zip = $request->zip;
            $agent->profession = $request->profession;
            $agent->expertise = $request->expertise;
            $agent->address = $request->address;
            $agent->address2 = $request->address2;
            $agent->save();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            Mail::to($data['email'])->send(new RegistrationSuccess($data));
            Auth::login($user);
            return response()->json(['message' => 'OTP verified successfully.','success'=>true,'frenchise_id'=>$agent->id]);
        } else {
            return response()->json(['message' => 'Invalid OTP.','success'=>false], 401);
        }
        return redirect()->route('dashboard');
    }

    public function counselor_register_store(Request $request)
    {
      dd($request->all());
    }
}
