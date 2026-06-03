<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;

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
);


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
