<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\TransportController;
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

Route::resource('destinations', DestinationController::class);
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destination', [DestinationController::class, 'destination'])->name('destinations.destination');

Route::resource('events', EventController::class);