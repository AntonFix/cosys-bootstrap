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
Route::get('appointment/{id}/copy', [App\Http\Controllers\AppointmentController::class, 'appointmentCopy'])->name('appointment.copy');
Route::get('appointment/{id}/in-progress', [App\Http\Controllers\AppointmentController::class, 'appInProgress'])->name('appointment.inProgress');
Route::get('appointment/{id}/is-carried-out', [App\Http\Controllers\AppointmentController::class, 'appIsCarriedOut'])->name('appointment.isCarriedOut');


Route::resource('appointment-code', App\Http\Controllers\AppointmentCodeController::class);
Route::resource('appointment-status', App\Http\Controllers\AppointmentStatusController::class);

Route::get('/search/appointments', [App\Http\Controllers\SearchController::class, 'filterAppointments'])->name('filterAppointments');


Route::resource('address', App\Http\Controllers\AddressController::class);
Route::get('/search/addresses', [App\Http\Controllers\SearchController::class, 'filterAddresses'])->name('filterAddresses');

Route::resource('archive', App\Http\Controllers\ArchiveController::class);
Route::resource('calendar', App\Http\Controllers\CalendarController::class);
Route::resource('report', App\Http\Controllers\ReportController::class);

Route::resource('person', App\Http\Controllers\PersonController::class);
Route::resource('person-address', App\Http\Controllers\PersonAddressController::class);
Route::resource('person-language', App\Http\Controllers\PersonLanguageController::class);
Route::get('/search/persons', [App\Http\Controllers\SearchController::class, 'filterPersons'])->name('filterPersons');

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

Route::get('/json/languages.json', [App\Http\Controllers\DictionaryLanguageController::class, 'returnLanguagesJson']);
Route::get('/json/languages-person-{id}.json', [App\Http\Controllers\DictionaryLanguageController::class, 'returnLanguagesByIdJson']);

Route::get('/json/calendar-appointments.json', [App\Http\Controllers\CalendarController::class, 'returnCalendarAppointmentsJson']);

Route::get('/generate-passsword', function () {
    $password = Hash::make('anton@ictoplossing.be');
    return $password;
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
