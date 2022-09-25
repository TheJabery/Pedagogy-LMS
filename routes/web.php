<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Students\OnlineClasseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Calendar;
use Livewire\LivewireManager;


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
//==============================Translate all pages============================

Route::controller( LoginController::class)->group( function(){
    Route::get('/login/{type}','loginForm')->middleware('guest')->name('login.show');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout/{type}', 'logout')->name('logout');




});
Route::get('/', function () {
    return view('auth.selection');

})->name('selection');


Route::get('/dashboard', function () {
    return view('dashboardSYS');

})->name('dashboard');

//require __DIR__.'/auth.php';


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

    Route::group(['namespace' => 'App\Http\Controllers\Grades'], function () {
        Route::resource('Grades', GradeController::class);
    });
    //==============================Classrooms============================
    Route::group(['namespace' => 'App\Http\Controllers\Classrooms'], function () {
        Route::resource('Classrooms', ClassroomController::class);
        Route::controller(ClassroomController::class)->group(function () {
            Route::post('delete_all', 'delete_all')->name('delete_all');
            Route::post('Filter_Classes', 'Filter_Classes')->name('Filter_Classes');
});
});
            //==============================Sections============================
            Route::group(['namespace' => 'App\Http\Controllers\Sections'], function () {
                Route::resource('Sections', SectionController::class);
                Route::get('/classes/{id}',[App\Http\Controllers\Sections\SectionController::class ,'get_classes']);
            });


            Route::view('add_parent', 'livewire.show_Form')->name('add_parent');


            Route::group(['namespace' => 'App\Http\Controllers\Teachers'], function () {
                Route::resource('Teachers', TeacherController::class);
            });

            Route::group(['namespace' => 'App\Http\Controllers\Students'], function () {
                Route::resource('Students', StudentController::class);
                Route::controller(App\Http\Controllers\Students\StudentController::class)->group(function () {
                    Route::get('/Get_classrooms/{id}', 'Get_classrooms');
                    Route::get('/Get_Sections/{id}', 'Get_Sections');
                    Route::get('Download_attachment/{studentsname}/{filename}', 'Download_attachment')->name('Download_attachment');
                    Route::post('Upload_attachment', 'Upload_attachment')->name('Upload_attachment');
                    Route::post('Delete_attachment', 'Delete_attachment')->name('Delete_attachment');

        });
                Route::resource('online_classes', OnlineClasseController::class);
                Route::post('Start_lesson', [OnlineClasseController::class ,'startLesson'])->name('startLesson.admin');
                Route::post('Jion_lesson', [OnlineClasseController::class, 'JionLesson'])->name('JionLesson.admin');
                Route::resource('Promotion', PromotionController::class);
                Route::resource('Graduated', GraduatedController::class);
                Route::resource('Fees_Invoices', FeesInvoicesController::class);
                Route::resource('receipt_students', ReceiptStudentsController::class);
                Route::resource('ProcessingFee', ProcessingFeeController::class);
                Route::resource('Payment_students', PaymentController::class);
                Route::resource('Fees', FeesController::class);
                Route::resource('Attendance', AttendanceController::class);
                Route::get('download_file/{filename}', [App\Http\Controllers\Students\LibraryController::class,'downloadAttachment'])->name('downloadAttachment');
                Route::resource('library', LibraryController::class);
            });

            Route::group(['namespace' => 'App\Http\Controllers\Subjects'], function () {
                Route::resource('subjects', SubjectController::class);
            });

            Route::group(['namespace' => 'App\Http\Controllers\Quizzes'], function () {
                Route::resource('Quizzes', QuizzController::class);
            });

            Route::group(['namespace' => 'App\Http\Controllers\questions'], function () {
                Route::resource('questions', QuestionController::class);
            });

            Route::resource('settings', SettingController::class);
            Livewire::component('calender',Calendar::class);


});






