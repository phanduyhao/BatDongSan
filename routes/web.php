<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminThietbiController;
use App\Http\Controllers\Admin\AdminLoainhadatController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::get('/showRegister', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotPass'])->name('showForgotPass');
Route::post('/forgot-password', [AuthController::class, 'sendMailForgotPass'])->name('sendMailForgotPass');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('resetPassword');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('postResetPassword');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('posts')->group(function () {
        Route::get('', [PostController::class, 'index'])->name('postPage');
        Route::post('/upload', [PostController::class, 'store'])->name('dangbai');
    
    });


    // Admin
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            // Quản lý USERS 
            Route::resource('users', AdminUserController::class);
            Route::get('/adminUser', [AdminUserController::class, 'adminUser'])->name('adminUser');
            Route::get('/user', [AdminUserController::class, 'user'])->name('user');

            // Quản lý Job_Category
            Route::resource('thietbi', AdminThietbiController::class);
            Route::resource('loainhadat', AdminLoainhadatController::class);
            // Route::resource('jobs', AdminJobController::class);
            // Route::get('/jobs-loading', [AdminJobController::class, 'loading'])->name('jobsLoading');
            // Route::get('/jobs-canceled', [AdminJobController::class, 'canceled'])->name('jobsCanceled');
            // Route::post('/jobs/{id}/approve', [AdminJobController::class, 'approve'])->name('jobs.approve');
            // Route::post('/jobs/{id}/cancel', [AdminJobController::class, 'cancel'])->name('jobs.cancel');
           

            Route::get('/', [AdminHomeController::class, 'index'])->name('homeAdmin');
            Route::resource('settings', AdminSettingController::class);
            Route::post('/settings/updateAll', [AdminSettingController::class, 'updateAll'])->name('updateSetting');
        
        });
    });
});
