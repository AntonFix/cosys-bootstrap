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

Auth::routes();

Route::resource('debug', App\Http\Controllers\DebugController::class);
Route::get('/search-debugs', [App\Http\Controllers\SearchController::class, 'filterDebugs'])->name('filterDebugs');

Route::resource('appointment', App\Http\Controllers\AppointmentController::class)->middleware('auth');

Route::get('appointment/{id}/copy', [App\Http\Controllers\AppointmentController::class, 'appointmentCopy'])->name('appointment.copy');
Route::get('appointment/{id}/in-progress', [App\Http\Controllers\AppointmentController::class, 'appInProgress'])->name('appointment.inProgress');
Route::get('appointment/{id}/is-carried-out', [App\Http\Controllers\AppointmentController::class, 'appIsCarriedOut'])->name('appointment.isCarriedOut');


Route::resource('appointment-code', App\Http\Controllers\AppointmentCodeController::class)->middleware('auth');
Route::resource('appointment-status', App\Http\Controllers\AppointmentStatusController::class)->middleware('auth');

Route::get('/search/appointments', [App\Http\Controllers\SearchController::class, 'filterAppointments'])->name('filterAppointments');


Route::resource('address', App\Http\Controllers\AddressController::class)->middleware('auth');
Route::get('/search/addresses', [App\Http\Controllers\SearchController::class, 'filterAddresses'])->name('filterAddresses');

Route::resource('archive', App\Http\Controllers\ArchiveController::class)->middleware('auth');
Route::resource('calendar', App\Http\Controllers\CalendarController::class)->middleware('auth');
Route::resource('report', App\Http\Controllers\ReportController::class)->middleware('auth');

Route::resource('person', App\Http\Controllers\PersonController::class)->middleware('auth');
Route::resource('person-address', App\Http\Controllers\PersonAddressController::class)->middleware('auth');
Route::resource('person-language', App\Http\Controllers\PersonLanguageController::class)->middleware('auth');
Route::get('/search/persons', [App\Http\Controllers\SearchController::class, 'filterPersons'])->name('filterPersons');

Route::resource('dictionary-geo', App\Http\Controllers\DictionaryGeoController::class);
Route::resource('dictionary-language', App\Http\Controllers\DictionaryLanguageController::class);

/*Return JSON*/
Route::get('/json/debugs.json', [App\Http\Controllers\DebugController::class, 'returnDebugsJson'])->middleware('auth');
Route::get('/json/appointments.json', [App\Http\Controllers\AppointmentController::class, 'returnAppointmentsJson'])->middleware('auth');
Route::get('/json/appointment-{id}.json', [App\Http\Controllers\AppointmentController::class, 'returnAppointmentByIdJson'])->middleware('auth');
Route::get('/json/persons.json', [App\Http\Controllers\PersonController::class, 'returnPersonsJson'])->middleware('auth');
Route::get('/json/person-{id}.json', [App\Http\Controllers\PersonController::class, 'returnPersonByIdJson'])->middleware('auth');
Route::get('/json/addresses.json', [App\Http\Controllers\AddressController::class, 'returnAddressesJson'])->middleware('auth');
Route::get('/json/address-{id}.json', [App\Http\Controllers\AddressController::class, 'returnAddressByIdJson'])->middleware('auth');

Route::get('/json/languages.json', [App\Http\Controllers\DictionaryLanguageController::class, 'returnLanguagesJson'])->middleware('auth');
Route::get('/json/languages-person-{id}.json', [App\Http\Controllers\DictionaryLanguageController::class, 'returnLanguagesByIdJson'])->middleware('auth');

Route::get('/json/regions.json', [App\Http\Controllers\DictionaryGeoController::class, 'returnAllRegionsJson'])->middleware('auth');

Route::get('/json/calendar-appointments.json', [App\Http\Controllers\CalendarController::class, 'returnCalendarAppointmentsJson'])->middleware('auth');

Route::get('/generate-passsword', function () {
    $password = Hash::make('anton@ictoplossing.be');
    return $password;
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
