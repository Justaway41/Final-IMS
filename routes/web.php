<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectAdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TodoAdminController;
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

Route::get('/', [LoginController::class, 'index'])->middleware('guest');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [dashboard::class, 'index'])->name('dashboard');
    Route::resource('leaves', LeavesController::class);

    Route::middleware("can:create,App\Models\User")->group(function () {
        Route::resource('departments', DepartmentController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('settings');

        Route::get('/missedWorklog', [Work_logController::class, 'users'])->name('missedWorklog');
        Route::get('/totalHours', [Work_logController::class, 'total'])->name('totalhours');
    });

    Route::resource('videos', VideoController::class);
    Route::resource('Work_log', Work_logController::class);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/view', [DepartmentController::class, 'view']);

    // projects & todo route
    Route::group([
        'prefix' => 'admin/projects',
        'middleware' => 'isAdmin',
        'as' => 'admin.projects.'
    ], function () {
        Route::get('/', [ProjectAdminController::class, 'index'])
            ->name('index');
        Route::get('/create', [ProjectAdminController::class, 'create'])
            ->name('create');
        Route::get('/edit/{id}', [ProjectAdminController::class, 'edit'])
            ->name('edit');
        Route::post('/store', [ProjectAdminController::class, 'store'])
            ->name('store');
        Route::put('/update/{id}', [ProjectAdminController::class, 'update'])
            ->name('update');
        Route::delete('/delete/{id}', [ProjectAdminController::class, 'destroy'])
            ->name('delete');
        Route::get('/{id}', [ProjectAdminController::class, 'show'])
            ->name('show');
    });

    // todo tasks route
    Route::group([
        'prefix' => 'admin/todo',
        'midddleware' => 'isAdmin',
        'as' => 'admin.todo.'
    ], function () {
        Route::get('/create/{id}', [TodoAdminController::class, 'create'])
            ->name('create');
        Route::post('/store/{id}', [TodoAdminController::class, 'store'])
            ->name('store');
        Route::group([
            'prefix' => 'tasks',
            'as' => 'tasks.'
        ], function () {
            Route::get('/', [TodoAdminController::class, 'show'])
                ->name('show');
            Route::get('/edit/{id}', [TodoAdminController::class, 'edit'])
                ->name('edit');
            Route::put('/update/{id}', [TodoAdminController::class, 'update'])
                ->name('update');
            Route::delete('/delete/{id}', [TodoAdminController::class, 'destroy'])
                ->name('delete');
            Route::put('/updateProgress/{id}', [TodoAdminController::class, 'updateProgress'])
                ->name('updateProgress');
        });
    });

    // intern todo panel
    Route::group([
        'prefix' => 'todo',
        'as' => 'todo.'
    ], function () {
        Route::get('/', [TodoAdminController::class, 'index']);
    });
});
