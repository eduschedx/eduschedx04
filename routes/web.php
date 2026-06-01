<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin/dashboard', function () {
    return 'WELCOME ADMIN';
});


Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])
    ->name('google.login');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'
]);

Route::get(
    '/faculty/application',
    function () {
        return view('faculty.application');
    }
);
Route::post('/faculty/application', [AuthController::class, 'submitFacultyApplication'
]);
