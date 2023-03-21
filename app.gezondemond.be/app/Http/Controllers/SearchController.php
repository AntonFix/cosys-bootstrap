<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Search;
use App\Http\Requests\StoreSearchRequest;
use App\Http\Requests\UpdateSearchRequest;

use App\Models\Appointment;

//use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function filterAppointments(Request $request, Appointment $appointment)
    {
        //

        if ($request != '') {

            $appointments = Appointment::latest();

            $appointmentCodes = DB::table('appointment_codes')
                ->get();

            $appointmentStatuses = DB::table('appointment_statuses')
                ->get();

            $persons = DB::table('persons')
                ->orderBy('forename')
                ->get();

            $users = DB::table('users')
                ->orderBy('name')
                ->get();

            $currentUser = Auth::user();

            $title = $request->input('title');

            $app_status_id = $request->input('app_status_id');
            $app_code_id = $request->input('app_code_id');
            $assigned_with_user_id = $request->input('assigned_with_user_id');
            $assigned_with_person_id = $request->input('assigned_with_person_id');

            $start_date = $request->input('start_date');
            $to_date = $request->input('to_date');

            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');

            //$serp = DB::table('appointments')
            $serp = Appointment::orderBy('start_date', 'DESC')
                ->with([
                    'appCode',
                    'appStatus',
                    'assignedWithPerson',
                    'assignedWithPersonAddresses',
                    'assignedWithPersonSpokenLanguages',
                    'assignedWithUser',
                    'createdByUser',
                ])
                ->where('title', 'like', '%' . $title . '%')
                ->when($app_status_id, function ($query, $app_status_id) {
                    $query->where('app_status_id', $app_status_id);
                })
                ->when($app_code_id, function ($query, $app_code_id) {
                    $query->where('app_code_id', $app_code_id);
                })
                ->when($assigned_with_user_id, function ($query, $assigned_with_user_id) {
                    $query->where('assigned_with_user_id', $assigned_with_user_id);
                })
                ->when($assigned_with_person_id, function ($query, $assigned_with_person_id) {
                    $query->where('assigned_with_person_id', $assigned_with_person_id);
                })
                ->when($start_date, function ($query, $from) {
                    $query->where('start_date', '>=', $from);
                })->when($to_date, function ($query, $to) {
                    $query->where('start_date', '<=', $to);
                })
                ->when($start_time, function ($query, $start_time) {
                    $query->where('start_time', 'LIKE', '%' . $start_time . '%');
                })
                ->when($end_time, function ($query, $end_time) {
                    $query->where('end_time', 'LIKE', '%' . $end_time . '%');
                })
                ->where('archived', false)
                ->simplePaginate(1000);

            return view('app.appointment.resultsAppointments',
                compact(
                    'appointments',
                    'serp',
                    'appointmentCodes',
                    'appointmentStatuses',
                    'users',
                    'currentUser'));

        } else {

            $serp = Appointment::all();

        }


    }

    public function filterPersons(Request $request, Person $person)
    {
        //

        if ($request != '') {

            $persons = Person::latest();

            $languages = DB::table('dictionary_languages')
                ->orderBy('order', 'DESC')
                ->get();

            $currentUser = Auth::user();

            $forename = $request->input('forename');
            $name = $request->input('name');

            $volunteer = $request->input('volunteer');
            $oral_coach = $request->input('oral_coach');
            $coordinator = $request->input('coordinator');

            $active_from = $request->input('active_from');

            $languageID = $request->input('languageID');

            $serp = Person::orderBy('created_at', 'DESC')
                ->with([
                    'personAddresses',
                    'spokenLanguages',
                    'createdByUser',
                ])
                ->where('is_active', 1)
                ->when($volunteer, function ($query, $volunteer) {
                    $query->where('volunteer', $volunteer);
                })
                ->when($oral_coach, function ($query, $oral_coach) {
                    $query->where('oral_coach', $oral_coach);
                })
                ->when($coordinator, function ($query, $coordinator) {
                    $query->where('coordinator', $coordinator);
                })
                ->where('forename', 'like', '%' . $forename . '%')
                ->where('name', 'like', '%' . $name . '%')
                /*->whereHas('spoken_languages', function (Builder $query) {
                    $query->where('id', 'like', 168);
                })*/
                /*->when($languageID, function ($query, $languageID) {
                    $query->where('spokenLanguages.id', 'LIKE', $languageID);
                })*/
                ->when($active_from, function ($query, $active_from) {
                    $query->where('active_from', 'LIKE', '%' . $active_from . '%');
                })
                //->orderBy('start_date', 'DESC')
                ->get();

            /*dd($serp);*/

            return view('app.person.resultsPersons',
                compact('persons', 'languages', 'serp', 'languageID'));

        } else {

            $serp = Person::all();;

        }


    }

}
