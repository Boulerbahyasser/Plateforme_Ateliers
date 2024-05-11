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
Route::get('/show/offers/',[showController::class,'showOffer']);

Route::get('/show/activities/',[showController::class,'showActivities']);

Route::get('/show/demandes/{admin_id}',[showController::class,'showDemandes']);

Route::get('/show/offer/activities/{offer}',[showController::class,'showActivitiesInOffer']);

Route::get('/show/offer/activity/horaires/{activite_id}',[showController::class,'showHoraireInActivity']);

Route::get('/show/offer/activity/enfants/{activite_id}',[showController::class,'showEnfantInActivity']);

Route::delete('/delete/activity/{activity}',[adminActiviteeController::class,'destroyActivity']);
Route::delete('/delete/offer/activity/{activityOffer}',[adminActiviteeOffreController::class,'destroyActivity']);
Route::post('/create/offer/',[adminOffreController::class,'createOffer']);
Route::put('/update/offer/{offer}',[adminOffreController::class,'updateOffer']);
//Route::get('/show/offers/parent/',[showController::class,'showOfferParent']);

Route::post('/add/offer/activity/{offer}/{activity}',[adminActiviteeOffreController::class,'addActivityToOffer']);

Route::put('/update/offer/activity/{activityOffer}',[adminActiviteeOffreController::class,'updateActivityInOffer']);

Route::delete('/delete/offer/{offer}',[adminOffreController::class,'destroyOffer']);


Route::post('/create/activity/',[adminActiviteeController::class,'createActivity']);


