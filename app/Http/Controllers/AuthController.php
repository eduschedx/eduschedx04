<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Faculty;
use Illuminate\Support\Facades\Hash;
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

        /*
        |--------------------------------------------------------------------------
        | ADMIN LOGIN
        |--------------------------------------------------------------------------
        */
        $admin = Admin::where('admin_id', $facultyId)->first();

        if ($admin) {

            if (!Hash::check($request->password, $admin->password)) {

                return back()->with(
                    'error',
                    'Incorrect password.'
                );
            }

            return redirect('/admin/dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | FACULTY LOGIN
        |--------------------------------------------------------------------------
        */
        $faculty = Faculty::where('faculty_id', $facultyId)->first();

        if (!$faculty) {

            return back()->with(
                'error',
                'Faculty ID not found.'
            );
        }

        if ($faculty->status === 'pending') {

            return back()->with(
                'error',
                'Your application is still pending wait for administrator approval.'
            );
        }

        if ($faculty->status === 'rejected') {

            return back()->with(
                'error',
                'Your application has been rejected.'
            );
        }

        if (!Hash::check($request->password, $faculty->password)) {

            return back()->with(
                'error',
                'Incorrect password.'
            );
        }

        return redirect('/faculty/dashboard');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        /*
        |--------------------------------------------------------------------------
        | CHECK IF FACULTY ALREADY EXISTS
        |--------------------------------------------------------------------------
        */
        $faculty = Faculty::where(
            'email',
            $googleUser->email
        )->first();

        if ($faculty) {

            return redirect('/login')
                ->with(
                    'error',
                    'An application already exists for this Google account.'
                );
        }

        return view('faculty.application', [
            'google_id' => $googleUser->id,
            'name'      => $googleUser->name,
            'email'     => $googleUser->email,
        ]);
    }

    public function submitFacultyApplication(Request $request)
    {
        $request->validate([
            'faculty_id' => [
                'required',
                'unique:faculties,faculty_id',
                'regex:/^VA-\d{5}$/'
            ],

            'department' => 'required',
            'specialization' => 'required',

            'password' => [
                'required',
                'confirmed',
                'min:8'
            ],
        ]);

                Faculty::create([
            'google_id' => $request->google_id,

            'faculty_id' => strtoupper($request->faculty_id),

            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,

            'email' => $request->email,

            'department' => $request->department,
            'specialization' => $request->specialization,

            'password' => Hash::make($request->password),

            'status' => 'pending'
        ]);
        return redirect('/login')
            ->with(
                'success',
                'Application submitted successfully. Please wait for administrator approval.'
            );
    }
}
