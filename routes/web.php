<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\CertificatController; // Import the CertificatController
use App\Http\Controllers\PartenaireController; // Import the PatenaireController

/*
|--------------------------------------------------------------------------|
| Web Routes                                                              |
|--------------------------------------------------------------------------|
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
Route::resource('certificats', CertificatController::class); // Added certificat routes

Route::resource('partenaires', PartenaireController::class);

Route::get('/itinerairestem', [ItineraireController::class, 'itineraireStem'])->name('itinerairestem');
Route::get('/transportstem', [TransportController::class, 'transportStem'])->name('transportstem');
Route::get('/certificatstem', [CertificatController::class, 'certificatStem'])->name('certificatstem'); // Added certificat stem route
Route::get('/partenaireStem', [PartenaireController::class, 'partenaireStem'])->name('partenaireStem'); // Added patenaire stem route
