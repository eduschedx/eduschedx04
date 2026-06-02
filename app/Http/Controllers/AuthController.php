<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Faculty;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $facultyId = strtoupper($request->faculty_id);

        // Login limiter

        $key = Str::lower($facultyId) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {

            return back()->with(
                'error',
                'Too many login attempts. Please try again after 1 minute.'
            );
        }

        // Admin Login

        $admin = Admin::where(
            'admin_id',
            $facultyId
        )->first();

        if ($admin) {

            if (!Hash::check(
                $request->password,
                $admin->password
            )) {

                RateLimiter::hit($key, 60);

                return back()->with(
                    'error',
                    'Incorrect password.'
                );
            }

            RateLimiter::clear($key);

                session([

                    'admin_id' => $admin->admin_id,

                    'admin_name' =>
                        $admin->first_name . ' ' .
                        $admin->last_name

                ]);

            return redirect('/admin/dashboard');
        }

        // Faculty Login

        $faculty = Faculty::where(
            'faculty_id',
            $facultyId
        )->first();

        if (!$faculty) {

            return back()->with(
                'error',
                'Faculty ID not found.'
            );
        }

        if ($faculty->status === 'pending') {

            return back()->with(
                'error',
                'Your application is still pending administrator approval.'
            );
        }

        if ($faculty->status === 'rejected') {

            return back()->with(
                'error',
                'Your application has been rejected.'
            );
        }

        if (!Hash::check(
            $request->password,
            $faculty->password
        )) {

            RateLimiter::hit($key, 60);

            return back()->with(
                'error',
                'Incorrect password.'
            );
        }

      $faculty->update([

            'last_seen' => now()

        ]);

        RateLimiter::clear($key);

        return redirect('/faculty/dashboard');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $googleUser = Socialite::driver('google')
                ->stateless()
                ->user();

        } catch (\Exception $e) {

            return redirect('/login')
                ->with(
                    'error',
                    'Google authentication failed. Please try again.'
                );
        }

        $faculty = Faculty::where(
            'email',
            $googleUser->email
        )->first();

        if ($faculty) {

            // Pending application

            if ($faculty->status === 'pending') {

                return redirect('/login')
                    ->with(
                        'error',
                        'Your application is still pending administrator approval.'
                    );
            }

            // Approved account

            if ($faculty->status === 'approved') {

                return redirect('/login')
                    ->with(
                        'error',
                        'This Google account already has an approved faculty account.'
                    );
            }

            // Rejected account

            if ($faculty->status === 'rejected') {

                $faculty->delete();
            }
        }

        return view('faculty.application', [

            'google_id' => $googleUser->id,

            'name' => $googleUser->name,

            'email' => $googleUser->email,

        ]);
    }

    public function submitFacultyApplication(Request $request)
    {
        $request->validate(

            [

                'faculty_id' => [
                    'required',
                    'regex:/^VA-\d{5}$/',
                    'unique:faculties,faculty_id'
                ],

                'department' => 'required',

                'specialization' => 'required',

                'password' => [
                    'required',
                    'confirmed',
                    'min:8'
                ],

            ],

            [

                'faculty_id.unique' =>
                    'Faculty ID is already registered in the system.',

                'faculty_id.regex' =>
                    'Faculty ID must follow the format VA-00001.',

                'faculty_id.required' =>
                    'Faculty ID is required.',

                'password.confirmed' =>
                    'Passwords do not match.'

            ]
        );

        Faculty::create([

            'google_id' => $request->google_id,

            'faculty_id' => strtoupper(
                $request->faculty_id
            ),

            'first_name' => $request->first_name,

            'middle_name' => $request->middle_name,

            'last_name' => $request->last_name,

            'email' => $request->email,

            'department' => $request->department,

            'specialization' => $request->specialization,

            'password' => Hash::make(
                $request->password
            ),

            'status' => 'pending'
        ]);

        return redirect('/login')
            ->with(
                'success',
                'Application submitted successfully. Please wait for administrator approval.'
            );
    }

    public function logout()
{
    session()->flush();

    return redirect('/login')
        ->with(
            'success',
            'You have successfully logged out.'
        );
}
}
