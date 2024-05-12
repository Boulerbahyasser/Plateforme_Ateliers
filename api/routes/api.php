<?php

use App\Http\Controllers\AdminActiviteeController;
use App\Http\Controllers\AdminActiviteeOffreController;
use App\Http\Controllers\AdminOffreController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/show/offers/',[showController::class,'showOffer']);

Route::get('/show/activities/',[showController::class,'showActivities']);

Route::get('/show/demandes/{admin_id}',[showController::class,'showDemandes']);

Route::get('/show/offer/activities/{offer}',[showController::class,'showActivitiesInOffer']);

Route::get('/show/offer/activity/horaires/{activite_id}',[showController::class,'showHoraireInActivity']);

Route::get('/show/offer/activity/enfants/{activite_id}',[showController::class,'showEnfantInActivity']);


//Route::get('/show/offers/parent/',[showController::class,'showOfferParent']);

Route::post('/add/offer/activity/{offer}/{activity}',[AdminActiviteeOffreController::class,'addActivityToOffer']);

Route::put('/update/offer/activity/{activityOffer}',[AdminActiviteeOffreController::class,'updateActivityInOffer']);

Route::delete('/delete/offer/activity/{activityOffer}',[AdminActiviteeOffreController::class,'destroyActivity']);



Route::post('/create/offer/',[AdminOffreController::class,'createOffer']);

Route::put('/update/offer/{offer}/',[AdminOffreController::class,'updateOffer']);

Route::delete('/delete/offer/{offer}',[AdminOffreController::class,'destroyOffer']);




Route::post('/create/activity/',[AdminActiviteeController::class,'createActivity']);

Route::put('/update/activity/{activity}',[AdminActiviteeController::class,'updateActivity']);

Route::delete('/delete/activity/{activity}',[AdminActiviteeController::class,'destroyActivity']);
