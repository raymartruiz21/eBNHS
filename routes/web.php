<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// pre enrollment route
// Route::get('pre-enrollment',[EnrollmentController::class,'register'])->name('register');
// Route::post('pre-enrollment/store',[EnrollmentController::class,'store']);

//digdi so login 
// Route::get('/', [AuthController::class,'login'])->name('login');

//logout
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

// Auth route
Route::middleware(['guest:web', 'preventBackHistory'])->name('auth.')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('login/post', [AuthController::class, 'login_post'])->name('login_post');
});
Route::middleware(['auth:web', 'preventBackHistory'])->name('admin.')->prefix('admin/my/')->group(function () {
    // dashboard route
    Route::get('dashboard', [AdministratorController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth:teacher', 'preventBackHistory'])->name('teacher.')->prefix('teacher/my/')->group(function () {
    // teacher route
    Route::get('dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
});

Route::get('/clear', function () { //-> tawagin mo to url sa browser -> 127.0.0.1:8000/clear
    Artisan::call('view:clear'); //   -> Clear all compiled files
    Artisan::call('route:clear'); //  -> Remove the route cache file 
    Artisan::call('optimize:clear'); //-> Remove the cache bootstrap files
    Artisan::call('event:clear'); //   -> clear all cache events and listener
    Artisan::call('config:clear'); //  -> Remove the configuration cache file
    Artisan::call('cache:clear'); //   -> Flush the application cache
    return back();
});