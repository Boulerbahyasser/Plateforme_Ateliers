<?php

use App\Http\Controllers\adminActiviteeController;
use App\Http\Controllers\adminActiviteeOffreController;
use App\Http\Controllers\adminOffreController;
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
Route::post('/add/activity/{offre}/{activite}',[adminActiviteeOffreController::class,'addActivityToOffer']);
Route::get('/show/offers/',[showController::class,'showOffer']);
Route::get('/show/offers/parent/',[showController::class,'showOfferParent']);
Route::get('/show/activities/',[showController::class,'showActivities']);
Route::get('/show/demandes/',[showController::class,'showDemande']);
Route::get('/show/offer/activity/enfants/{id_Activite}',[showController::class,'showEnfantInActivity']);
Route::get('/show/offer/activity/horaires/{id_Activite}',[showController::class,'showHoraireInActivity']);
Route::get('/show/Offer/activities/{offer}',[showController::class,'showActivitiesInOffer']);
Route::delete('/delete/activity/{activity}',[adminActiviteeController::class,'destroyActivity']);
Route::delete('/delete/offer/activity/{activityOffer}',[adminActiviteeOffreController::class,'destroyActivity']);
Route::delete('/delete/offer/{offer}',[adminOffreController::class,'destroyOffer']);
Route::post('/create/offer/',[adminOffreController::class,'createOffer']);
Route::put('/update/offer/{offer}',[adminOffreController::class,'updateOffer']);

