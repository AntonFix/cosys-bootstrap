<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('debug', App\Http\Controllers\DebugController::class);
Route::get('/search-debugs', [App\Http\Controllers\SearchController::class, 'filterDebugs'])->name('filterDebugs');

Route::resource('appointment', App\Http\Controllers\AppointmentController::class);
Route::resource('appointment-code', App\Http\Controllers\AppointmentCodeController::class);
Route::resource('appointment-status', App\Http\Controllers\AppointmentStatusController::class);

Route::get('/search-appointments', [App\Http\Controllers\SearchController::class, 'filterAppointments'])->name('filterAppointments');


Route::resource('address', App\Http\Controllers\AddressController::class);
Route::resource('archive', App\Http\Controllers\ArchiveController::class);

Route::resource('person', App\Http\Controllers\PersonController::class);
Route::resource('person-address', App\Http\Controllers\PersonAddressController::class);
Route::resource('person-language', App\Http\Controllers\PersonLanguageController::class);

Route::resource('dictionary-geo', App\Http\Controllers\DictionaryGeoController::class);
Route::resource('dictionary-language', App\Http\Controllers\DictionaryLanguageController::class);

/*Return JSON*/
Route::get('/json/debugs.json', [App\Http\Controllers\DebugController::class, 'returnDebugsJson']);
Route::get('/json/appointments.json', [App\Http\Controllers\AppointmentController::class, 'returnAppointmentsJson']);
Route::get('/json/appointment-{id}.json', [App\Http\Controllers\AppointmentController::class, 'returnAppointmentByIdJson']);
Route::get('/json/persons.json', [App\Http\Controllers\PersonController::class, 'returnPersonsJson']);
Route::get('/json/person-{id}.json', [App\Http\Controllers\PersonController::class, 'returnPersonByIdJson']);
Route::get('/json/addresses.json', [App\Http\Controllers\AddressController::class, 'returnAddressesJson']);
Route::get('/json/address-{id}.json', [App\Http\Controllers\AddressController::class, 'returnAddressByIdJson']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
