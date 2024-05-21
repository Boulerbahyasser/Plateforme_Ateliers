<?php

use App\Http\Controllers\AdminActiviteeController;
use App\Http\Controllers\AdminActiviteeOffreController;
use App\Http\Controllers\AdminDemandeController;
use App\Http\Controllers\AdminOffreController;
use App\Http\Controllers\Authentication\EmailVerificationController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\RegistrationController;
use App\Http\Controllers\Authentication\ResetPasswordCntroller;
use App\Http\Controllers\ParentDemandeController;
use App\Http\Controllers\showController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//show
Route::get('/show/offers/',[showController::class,'showOffers']);
Route::get('/show/offers/top/',[showController::class,'showTopOffers']);
Route::get('/show/offers/remaining/',[showController::class,'showRemainingOffers']);
Route::get('/show/offer/{offre}',[showController::class,'showOffer']);


Route::get('/show/activities/',[showController::class,'showActivities']);

Route::get('/show/demandes/',[showController::class,'showDemandes']);

Route::get('/show/offer/activities/{offer}',[showController::class, 'showActivitiesInOffer']);
Route::get('/show/offer/activities/more/{offer}',[showController::class, 'showActivitiesOfferInOffer']);
Route::get('/show/offer/activities/all/{offer}',[showController::class,'showActivitiesInOfferAllInfos']);


Route::get('/show/parent/enfant/',[showController::class,'showEnfantOfParent']);


Route::get('/show/offer/activity/horaires/{activite_id}',[showController::class,'showHoraireInActivity']);

Route::get('/show/offer/activity/enfants/{activite_id}',[showController::class,'showEnfantInActivity']);

//notifications
Route::get('/show/notification/parent/top/',[ShowController::class,'showTopParentNotification']);
Route::get('/show/notification/parent/remaining/',[ShowController::class,'showRemainingParentNotification']);

//AdminActiviteeOffreController

Route::post('/add/offer/activity/{offer}/{activity}',[AdminActiviteeOffreController::class,'addActivityToOffer']);

Route::put('/update/offer/activity/{activityOffer}',[AdminActiviteeOffreController::class,'updateActivityInOffer']);

Route::delete('/delete/offer/activity/{activityOffer}',[AdminActiviteeOffreController::class,'destroyActivity']);


//AdminOffreController
Route::post('/create/offer/',[AdminOffreController::class,'createOffer']);

Route::put('/update/offer/{offer}/',[AdminOffreController::class,'updateOffer']);

Route::delete('/delete/offer/{offer}',[AdminOffreController::class,'destroyOffer']);




Route::put('/update/demande/inscription/{demande_id}/{activite_offre_id}/{enfant_id}',[AdminDemandeController::class,'gererDemande']);




Route::post('/create/activity/',[AdminActiviteeController::class,'createActivity']);

Route::put('/update/activity/{activity}',[AdminActiviteeController::class,'updateActivity']);

Route::delete('/delete/activity/{activity}',[AdminActiviteeController::class,'destroyActivity']);
Route::post('/create/demande/',[ParentDemandeController::class,'storeDemande']);
