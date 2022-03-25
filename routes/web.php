<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;

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

Route::get('/', function () {
    return view('welcome');
});

// refers to the URL /database-test
Route::get('database-test', function () {
    if (DB::connection()->getDatabaseName()) {
        echo 'Connected successfully to database'
            . DB::connection()->getDatabaseName();
    }
});

Route::get('add-student', [StudentController::class, 'selectSchools'])->name('save.student');
Route::post('add-student', [StudentController::class, 'saveStudent'])->name('save.student');
Route::get('select-school', [EnrollmentController::class, 'schoolDropdown'])->name('list.student');
Route::post('select-school', [EnrollmentController::class, 'displayStudents'])->name('list.student');
Route::post('display-students', [EnrollmentController::class, 'displayStudents'])->name('list.student');
