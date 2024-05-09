<?php

use App\Http\Controllers\adminActiviteeOffreController;
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
Route::get('/show/demandes/{idDemande}',[showController::class,'showDemande']);
Route::get('/show/offer/activity/enfant/{id_Activite}',[showController::class,'showEnfantOfActivitieIncludedInAnOffer']);
Route::get('/show/Offer/activities/{offer}',[showController::class,'showActivitiesOfOffer']);
