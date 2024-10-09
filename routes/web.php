<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\HebergementController;

use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ReponseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('dashboard', 'dashboard');


Route::resource('itineraires', ItineraireController::class);
Route::resource('transports', TransportController::class);
Route::get('/itinerairestem', [ItineraireController::class, 'itineraireStem'])->name('itinerairestem');
Route::get('/transportstem', [TransportController::class, 'transportStem'])->name('transportstem');



Route::get('reclamations1', [ReclamationController::class, 'index1'])->name('reclamations.index1');
Route::resource('reclamations', ReclamationController::class);
Route::post('reclamations/{reclamation}/reponses', [ReponseController::class, 'store'])->name('reponses.store');
Route::delete('reclamations/{reclamation}/reponses/{reponse}', [ReponseController::class, 'destroy'])->name('reponses.destroy');
Route::post('reclamations/index2', [ReclamationController::class, 'index2'])->name('reclamations.index2');
