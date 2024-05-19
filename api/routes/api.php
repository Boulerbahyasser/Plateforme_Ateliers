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
Route::post('auth/register-parent', [RegistrationController::class,'RegisterParent'])
->name('Enregistrement');
Route::get('auth/verify-email/{token}', [EmailVerificationController::class,'verifyemail'])
    ->name('verify');


Route::post('auth/login', [LoginController::class,'login'])->name('login');
Route::post('auth/forget-password', [ResetPasswordCntroller::class,'RessetPasswordEmail'])->name('forgetPassword');
Route::post('auth/reset-password/{token}', [ResetPasswordCntroller::class,'ResetPassword'])->name('restpassword');

// ici tous les choses isi l'authetification est nececiare
Route::middleware(['auth:sanctum','RefreshToken'])->prefix('auth')->group(function (){
    Route::post('register-admin', [RegistrationController::class,'RegisterAdmin'])
        ->name('AjouterAdmin')
        ->middleware('Check_Admin_User');// administarateur si ill va ajouter un sous admin
    Route::post('register-animateur', [RegistrationController::class,'RegisterAnimateur'])
        ->name('AjouterAnimateur')
        ->middleware('Check_Admin_User');
    Route::get('my-profile', [LoginController::class,'AuthenticatedProflie'])
    ->name('Myprofile');
    Route::post('logout', [LogoutController::class,'logout'])->name('logout');

});



