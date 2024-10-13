<?php

use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\CertificatController;

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
Route::get('/destinations/{id}', [ActiviteController::class, 'show'])->name('destination');

Route::resource('events', EventController::class);
Route::resource('activites', ActiviteController::class);
Route::get('/activites/{id}', [ActiviteController::class, 'show'])->name('activite');
Route::resource('avis', AvisController::class);
Route::get('/activitestem', [ActiviteController::class, 'activiteStem'])->name('activitestem');
Route::get('/avisstem', [AvisController::class, 'avisStem'])->name('avisstem');
Route::post('/avis/{activite}', [AvisController::class, 'store'])->name('avis.store');


Route::delete('/avis/{avis}', [AvisController::class, 'destroy'])->name('avis.destroy');

Route::resource('certificats', CertificatController::class); // Added certificat routes
Route::resource('partenaires', PartenaireController::class);
Route::get('/certificatstem', [CertificatController::class, 'certificatStem'])->name('certificatstem'); // Added certificat stem route
Route::get('/partenaireStem', [PartenaireController::class, 'partenaireStem'])->name('partenaireStem'); // Added patenaire stem route
