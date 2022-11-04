<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Work_logController;
use App\Mail\worklogMail;
use App\Models\Work_log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [LoginController::class, 'index'])->middleware('guest');




Route::middleware(['auth'])->group(function () {


    Route::get('dashboard', [dashboard::class, 'index'])->name('dashboard');

    Route::middleware("can:create,App\Models\User")->group(function () {
        Route::resource('departments', DepartmentController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('/settings', function () {
            // dd("Hello world");
            return view('admin.settings');
        })->name('settings');
        Route::get('/missedWorklog', [Work_logController::class, 'users'])->name('missedWorklog');
    });

    Route::resource('videos', VideoController::class);
    Route::resource('Work_log', Work_logController::class);

    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/view', [DepartmentController::class, 'view']);
});


// Mail template viewing
// Route::get('/mailable', function () {
//     $work_logs = Work_log::whereDate('created_at', Carbon::today())->get();

//     return new App\Mail\worklogMail($work_logs);
// });
