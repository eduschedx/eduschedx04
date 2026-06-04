<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FacultyLoadController;
use App\Http\Controllers\FacultySubjectController;

Route::get('/', function () {

    return view('welcome');

});


// =====================
// AUTHENTICATION
// =====================

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
)->name('login');

Route::post(
    '/login',
    [AuthController::class, 'login']
);


// =====================
// GOOGLE LOGIN
// =====================

Route::get(
    '/auth/google',
    [AuthController::class, 'redirectToGoogle']
)->name('google.login');

Route::get(
    '/auth/google/callback',
    [AuthController::class, 'handleGoogleCallback']
);


// =====================
// FACULTY APPLICATION
// =====================

Route::get(
    '/faculty/application',
    function () {

        return view(
            'faculty.application'
        );

    }
);

Route::post(
    '/faculty/application',
    [
        AuthController::class,
        'submitFacultyApplication'
    ]
);


// =====================
// ADMIN DASHBOARD
// =====================

Route::get(
    '/admin/dashboard',
    [
        AdminController::class,
        'dashboard'
    ]
)->name('dashboard');


// =====================
// APPROVE FACULTY
// =====================

Route::get(
    '/admin/approve/{id}',
    [
        AdminController::class,
        'approve'
    ]
);


// =====================
// REJECT FACULTY
// =====================

Route::get(
    '/admin/reject/{id}',
    [
        AdminController::class,
        'reject'
    ]
);


// =====================
// EDIT FACULTY
// =====================

Route::put(
    '/admin/faculty/update/{id}',
    [
        AdminController::class,
        'updateFaculty'
    ]
);

Route::get(
    '/logout',
    [AuthController::class, 'logout']
)->name('logout');

//faculty dashboard

Route::get(
    '/faculty/dashboard',
    [FacultyController::class, 'dashboard']
)->name('faculty.dashboard');

Route::get(
    '/admin/subjects',
    [SubjectController::class,'index']
)->name('subjects.index');

Route::post(
    '/admin/subjects/store',
    [SubjectController::class, 'store']
)->name('subjects.store');

Route::put(
    '/admin/subjects/update/{id}',
    [SubjectController::class, 'update']
)->name('subjects.update');

Route::delete(
    '/admin/subjects/delete/{id}',
    [SubjectController::class, 'destroy']
)->name('subjects.delete');

Route::get(
    '/admin/faculty-loads',
    [FacultyLoadController::class, 'index']
)->name('faculty-loads.index');

Route::post(
    '/admin/faculty-loads/store',
    [FacultyLoadController::class, 'store']
)->name('faculty-loads.store');

Route::delete(
    '/admin/faculty-loads/delete/{id}',
    [FacultyLoadController::class, 'destroy']
)->name('faculty-loads.delete');

Route::post(
    '/admin/subjects/import',
    [SubjectController::class,'import']
)->name('subjects.import');

Route::post(
    '/admin/subjects/import',
    [SubjectController::class,'import']
)->name('subjects.import');

Route::get(
    '/admin/faculty-subjects',
    [FacultySubjectController::class,'index']
)->name('faculty-subjects.index');

Route::post(
    '/admin/faculty-subjects/store',
    [FacultySubjectController::class,'store']
)->name('faculty-subjects.store');
