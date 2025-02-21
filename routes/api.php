<?php

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

use App\Http\Controllers\Api\ClientController;
Route::get('/clients',[ClientController::class,'index']);
Route::get('/clients/{id}',[ClientController::class,'show']);
Route::get('/clients/create',[ClientController::class,'create']);
Route::post('/clients/store',[ClientController::class,'store']);
Route::put('/clients/{id}',[ClientController::class,'update']);
Route::delete('/clients/{id}',[ClientController::class,'destroy']);