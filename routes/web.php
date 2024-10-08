<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\CertificatController; // Import the CertificatController
use App\Http\Controllers\PartenaireController; // Import the PatenaireController
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AvisController;
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

Route::resource('destinations', DestinationController::class);
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destination', [DestinationController::class, 'destination'])->name('destinations.destination');

Route::resource('events', EventController::class);

Route::resource('activites', ActiviteController::class);
Route::resource('avis', AvisController::class);
Route::get('/activitestem', [ActiviteController::class, 'activiteStem'])->name('activitestem');
Route::get('/avisstem', [AvisController::class, 'avisStem'])->name('avisstem');
Route::post('/avis/{activite}', [AvisController::class, 'store'])->name('avis.store');
//Route::get('/activites/{id}', [ActiviteController::class, 'show'])->name('show');
// Route for creating avis (reviews)
//Route::post('activites/{activite}/avis', [AvisController::class, 'store'])->name('avis.store');

// Route for deleting avis (reviews)
//Route::delete('avis/{avis}', [AvisController::class, 'destroy'])->name('avis.destroy');

//Route::get('/activites', [ActiviteController::class, 'index'])->name('activites.index');
//Route::get('/activites/{id}', [ActiviteController::class, 'show'])->name('activites.show');
//Route::post('/avis/{activiteId}', [AvisController::class, 'store'])->name('avis.store');
