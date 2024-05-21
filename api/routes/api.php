<?php

use App\Http\Controllers\FatherController;
use App\Http\Controllers\EnfantController;
use App\Http\Controllers\ParentDemandeController;
use App\Http\Controllers\ParentFactureController;
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
Route::put('/parent/update',[FatherController::class, 'UpdateFather']);
Route::delete('/parent/delete',[FatherController::class, 'DestroyParent']);
Route::post('/enfant/create/',[EnfantController::class, 'AddEnfant']);
Route::post('/enfant/update/{id}',[EnfantController::class, 'UpdateEnfant']);
Route::delete('/enfant/delete/{enfant}',[EnfantController::class, 'DestroyEnfant']);


Route::get('/activiteoffre/{id}',[ParentDemandeController::class, 'ShowHorairetoEnfant']);
Route::post('/demande',[ParentDemandeController::class,'StoreDemande']);
Route::put('/devis/{id}',[ ParentDemandeController::class,'UpdateDevis']);
Route::post('/facture',[ ParentFactureController::class,'createFacture']);

