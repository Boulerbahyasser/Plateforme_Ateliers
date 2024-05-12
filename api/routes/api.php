<?php

use App\Http\Controllers\FatherController;
use App\Http\Controllers\EnfantController;
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
Route::put('/parent/update',[FatherController::class, 'UpdateParent']);
Route::delete('/parent/delete',[FatherController::class, 'DestroyParent']);
Route::put('/enfant/update/{id}',[EnfantController::class, 'UpdateEnfant']);
Route::delete('/enfant/delete/{id}',[EnfantController::class, 'DestroyEnfant']);