<?php

use App\Http\Controllers\Authentication\EmailVerificationController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\ResetPasswordCntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Authentication\RegistrationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// registration admins,parents,animateurs,enfants
Route::post('auth/registerparent', [RegistrationController::class,'RegisterAdminParent']);
Route::get('auth/verify-email/{token}', [EmailVerificationController::class,'verifyemail'])->name('verify');
Route::post('auth/login', [LoginController::class,'login'])->name('login');
Route::post('auth/forget-password', [ResetPasswordCntroller::class,'RessetPasswordEmail'])->name('forgetPassword');
Route::post('auth/reset-password/{token}', [ResetPasswordCntroller::class,'ResetPassword'])->name('restpassword');

// ici tous les choses isi l'authetification est nececiare
Route::middleware(['auth:sanctum','RefreshToken'])->prefix('auth')->group(function (){
    Route::post('registeradmin', [RegistrationController::class,'RegisterAdminParent']);
    Route::post('user', [LoginController::class,'user']);
    Route::post('logout', [LogoutController::class,'logout']);
    Route::post('registerenfant', [RegistrationController::class,'RegisterEnfant']);
    Route::post('registeranim', [RegistrationController::class,'RegisterAnimateur']);


});



