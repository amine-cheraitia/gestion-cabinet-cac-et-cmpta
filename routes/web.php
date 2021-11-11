<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\MandatController;
use App\Http\Controllers\ConventionController;
use App\Http\Controllers\TacheController;

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
    return view('main');
})->name('/');

//clients
Route::get('/clients', [EntrepriseController::class, 'index'])->name('client.list');
Route::get('/clients/create', [EntrepriseController::class, 'create'])->name('client.index');
Route::post('/clients/store', [EntrepriseController::class, 'store'])->name('client.store');
Route::get('/clients/{id}', [EntrepriseController::class, 'edit'])->name('client.edit');
Route::patch('/clients/{id}', [EntrepriseController::class, 'update'])->name('client.update');
Route::get('/clients/{id}/delete', [EntrepriseController::class, 'destroy'])->name('client.destroy');
/* Route::resource('/clients', EntrepriseController::class); */
//devis
Route::get('/devis', [DevisController::class, 'index'])->name('devis.list');
Route::get('/devis/create', [DevisController::class, 'create'])->name('devis.create');
Route::post('/devis/store', [DevisController::class, 'store'])->name('devis.store');
Route::get('/devis/{id}', [DevisController::class, 'edit'])->name('devis.edit');
Route::patch('/devis/{id}', [DevisController::class, 'update'])->name('devis.update');
Route::get('/devis/{id}/delete', [DevisController::class, 'destroy'])->name('devis.destroy');
//---pdf
Route::get('/devis/pdf/{id}', [DevisController::class, 'pdf'])->name('devis.pdf');
//---ajax devis
Route::post('/devis/fetch', [DevisController::class, 'calculPrix'])->name('devis.calculPrix');

//mission
Route::get('/missions', [MissionController::class, 'index'])->name('mission.list');
Route::get('/missions/{id}/show', [MissionController::class, 'show'])->name('mission.show');
Route::get('/missions/create', [MissionController::class, 'create'])->name('mission.create');
Route::post('/missions/store', [MissionController::class, 'store'])->name('mission.store');
Route::get('/missions/edit/{id}', [MissionController::class, 'edit'])->name('mission.edit');
Route::patch('/missions/{id}', [MissionController::class, 'update'])->name('mission.update');
Route::get('/missions/{id}/delete', [MissionController::class, 'destroy'])->name('mission.destroy');
//mission planning
Route::get('/missions/planning/fetch', [MissionController::class, 'planning'])->name('mission.planning');
Route::get('/missions/planning', [MissionController::class, 'planningLayout'])->name('mission.planningLayout');


//--ajax mission
Route::post('/missions/fetch/', [MissionController::class, 'devisContent'])->name('mission.devisContent');
//--ajax mission planning store
Route::post('/missions/planning/store', [MissionController::class, 'storeViaPlanning'])->name('mission.storeViaPlanning');
Route::get('/missions/{id}/deleteViaPlanning', [MissionController::class, 'deleteViaPlanning'])->name('mission.deleteViaPlanning');
//mandat
Route::get('/mandat/generate/{id}', [MandatController::class, 'generate'])->name('mandat.generate');
Route::get('/mandat/pdf/{id}', [MandatController::class, 'pdf'])->name('mandat.pdf');

//convention
Route::get('/convention/generate/{id}', [ConventionController::class, 'generate'])->name('convention.generate');
Route::get('/convention/pdf/{id}', [ConventionController::class, 'pdf'])->name('convention.pdf');

//taches
Route::get('/taches', [TacheController::class, 'index'])->name('tache.list');
Route::get('/taches/{id}/show', [TacheController::class, 'show'])->name('tache.show');
Route::get('/taches/create', [TacheController::class, 'create'])->name('tache.create');
Route::post('/taches/store', [TacheController::class, 'store'])->name('tache.store');
Route::get('/taches/edit/{id}', [TacheController::class, 'edit'])->name('tache.edit');
Route::patch('/taches/{id}', [TacheController::class, 'update'])->name('tache.update');
Route::get('/taches/{id}/delete', [TacheController::class, 'destroy'])->name('tache.destroy');
/* Route::get('/missions', 'App\Http\Controllers\MissionController@index')->name('mission.list');
[MissionController::class, 'index'] */