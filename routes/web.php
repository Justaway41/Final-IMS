<?php


use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Work_logController;
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


Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/user/authenticate', [LoginController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/profile', [UserController::class, 'profile']);
    Route::resource('departments', DepartmentController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('work_logs', Work_logController::class);


    Route::get('send-email', function () {
        $user = [
            "email" => "test@test.com",
            "password" => "12345678"
        ];
    });
});
