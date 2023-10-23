<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//prefix('admin')->
Route::middleware(['auth','isadmin'])->group(function() {
    Route::resource('admin',  AdminController::class)->parameters([
            'admin' => 'article'
        ])->except('show');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store']);
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authorization'])->name('logon');;
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.post');
});

Route::middleware('auth')->group(function ()
{
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('profile', [ProfileController::class, 'store_profile'])->name('store_profile');
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('upload_avatar', [ImageController::class, 'update'])->name('upload_avatar');
    Route::post('delete_avatar', [ImageController::class, 'destroy'])->name('delete_avatar');
    Route::delete('profile', [ProfileController::class, 'store_password'])->name('store_password');
});

Route::get('/articles/{id?}', ArticlesController::class);
Route::get('/article/{id?}', ArticleController::class);
Route::get('/', HomeController::class)->name('home');


