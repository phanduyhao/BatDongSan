<?php

use App\Http\Controllers\Admin\AdminBaidangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminThietbiController;
use App\Http\Controllers\Admin\AdminLoainhadatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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

Route::prefix('posts')->group(function () {
    Route::get('/list', [PostController::class, 'listBaidang'])->name('posts.list');
    Route::get('/baidang/loai/{slug}', [PostController::class, 'getByLoaiNhadat'])->name('listByNhadat');
    Route::get('/posts/detail/{slug}', [PostController::class, 'baidangDetail'])->name('baidangDetail');

});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('posts')->group(function () {
        Route::get('', [PostController::class, 'index'])->name('postPage');
        Route::post('/upload', [PostController::class, 'store'])->name('dangbai');
        Route::post('/isVip/{id}', [PostController::class, 'toggleIsVip']);
        Route::post('/update-status', [PostController::class, 'updateStatus']);

    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('/update/{user}', [ProfileController::class,'updateProfile'])->name('profile.update');
        Route::get('/list-baidang', [ProfileController::class,'listBaidang'])->name('profile.listBaidang');
        Route::get('/{slug}/edit', [ProfileController::class, 'editBaidang'])->name('baidang.edit');

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
            Route::prefix('posts')->group(function () {
                Route::get('/', [AdminBaidangController::class, 'index'])->name('baidangDaduyet');
                Route::get('/loading', [AdminBaidangController::class, 'loading'])->name('baidangChoduyet');
                Route::get('/cancel', [AdminBaidangController::class, 'cancel'])->name('baidangDahuy');
                Route::post('/{id}/approve', [AdminBaidangController::class, 'approve'])->name('baidang.approve');
                Route::post('/{id}/cancel', [AdminBaidangController::class, 'cancelPost'])->name('baidang.cancel');
            });
           
            Route::get('/', [AdminHomeController::class, 'index'])->name('homeAdmin');
            Route::resource('settings', AdminSettingController::class);
            Route::post('/settings/updateAll', [AdminSettingController::class, 'updateAll'])->name('updateSetting');
        
        });
    });
});
