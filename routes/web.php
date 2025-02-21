<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Chemin d'accès au controller client version de base
use App\Http\Controllers\ClientController;
//Mise en place des routes du client
Route::get('clients', [ClientController::class,'index'])->name('clients.index');
Route::get('clients/{numeroClient}', [ClientController::class, 'show'])->name('clients.show');
Route::get('clients/{numeroClient}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('clients/{numeroClient}/update', [ClientController::class, 'update'])->name('clients.update');
Route::delete('clients/{numeroClient}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/store', [ClientController::class, 'store'])->name('clients.store');

Auth::routes();

//Mise en place de la route vers home après connexion
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Chemin d'accès au controller session
use App\Http\Controllers\SessionController;

//Mise en place des routes de l'utilisateur
Route::get('/sessions/{id}', [SessionController::class, 'show'])->name('sessions.show');
Route::get('/sessions/logout', [SessionController::class, 'destroy'])->name('sessions.logout');
