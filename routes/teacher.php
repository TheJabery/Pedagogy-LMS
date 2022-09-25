<?php

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teachers\dashboard;
use App\Http\Controllers\Teachers\dashboard\StudentController;
use App\Http\Controllers\Teachers\dashboard\ProfileController;
use App\Http\Controllers\Teachers\dashboard\QuizzController;
use App\Http\Controllers\Teachers\dashboard\QuestionController;
use App\Http\Controllers\Teachers\TeacherDashboardController;


/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', TeacherDashboardController::class);


        //==============================students===========================
    Route::controller(StudentController::class)->group(function (){
        Route::get('student','index')->name('student.index');
        Route::get('sections','sections')->name('sections');
        Route::post('attendance','attendance')->name('attendance');
        Route::post('edit_attendance','editAttendance')->name('attendance.edit');
        Route::get('attendance_report','attendanceReport')->name('attendance.report');
        Route::post('attendance_report','attendanceSearch')->name('attendance.search');
    });

       //==============================Questions===========================
    Route::resource('questions', QuestionController::class);


       //==============================OnlineZoomClasses===========================

    //  Route::resource('online_zoom_classes', 'OnlineZoomClassesController');
    //  Route::get('/indirect', 'OnlineZoomClassesController@indirectCreate')->name('indirect.teacher.create');
    //  Route::post('/indirect', 'OnlineZoomClassesController@storeIndirect')->name('indirect.teacher.store');


       //==============================profile===========================

    Route::controller(ProfileController::class)->group(function (){
        Route::get('profile','index')->name('profile.show');
        Route::post('profile/{id}','update')->name('profile.update');
    });


     //==============================Quizze===========================
    Route::controller(QuizzController::class)->group(function (){
        Route::resource('quizzes', QuizzController::class);
        Route::get('student_quizze/{id}','student_quizze')->name('student.quizze');
        Route::post('repeat_quizze', 'repeat_quizze')->name('repeat.quizze');
    });



});
