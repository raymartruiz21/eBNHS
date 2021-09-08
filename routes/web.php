<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [StudentController::class, 'login']);
Route::get('register', [StudentController::class, 'registration']);
Route::post('registerStudent', [StudentController::class, 'registerUser'])->name('registerStudent');
Route::post('loginStudent', [StudentController::class, 'loginUser'])->name('loginStudent');

// user dashboard
Route::get('dasboard', [StudentController::class, 'dashboard']);
