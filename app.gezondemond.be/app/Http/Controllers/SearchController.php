<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Search;
use App\Http\Requests\StoreSearchRequest;
use App\Http\Requests\UpdateSearchRequest;

use App\Models\Appointment;

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
                /*->when($start_date, function ($query, $start_date) {
                    $query->orWhere('start_date', 'LIKE', '%' . $start_date . '%');
                })*/
                //->whereBetween('start_date', [$start_date, $to_date])
                /*->when($to_date, function ($query) {
                    $query->orWhereBetween('start_date', [$start_date, $to_date]);
                })*/

                ->when($start_date, function ($query, $from) {
                    $query->where('start_date', '>=', $from);
                })->when($to_date, function ($query, $to) {
                    $query->where('start_date', '<=', $to);
                })
                ->when($start_time, function ($query, $start_time) {
                    $query->where('start_time', 'LIKE', '%' . $start_time . '%');
                })
                ->where('archived', false)
                ->simplePaginate(1000);

            /*$model = Appointment::when(request()->from, function ($query, $from) {
                $query->where('date', '>=', $from);
            })->when(request()->to, function ($query, $to) {
                $query->where('date', '<=', $to);
            })->get();*/

            /*dd($serp);*/

        } else {

            $serp = Appointment::all();

        }

        return view('app.appointment.resultsAppointments',
            compact(
                'appointments',
                'serp',
                'appointmentCodes',
                'appointmentStatuses',
                'users',
                'currentUser'));

    }

    public function filterPersons(Request $request, Person $person)
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
            $start_time = $request->input('start_time');

            //$serp = DB::table('appointments')
            $serp = Appointment::latest()
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
                ->when($start_date, function ($query, $start_date) {
                    $query->where('start_date', 'LIKE', '%' . $start_date . '%');
                })
                ->when($start_time, function ($query, $start_time) {
                    $query->where('start_time', 'LIKE', '%' . $start_time . '%');
                })
                ->where('archived', false)
                ->orderBy('start_date', 'DESC')
                ->get();

            /*dd($serp);*/

        } else {

            $serp = Appointment::all();;

        }

        return view('app.person.resultsPersons',
            compact(
                'appointments',
                'serp',
                'appointmentCodes',
                'appointmentStatuses',
                'users',
                'currentUser'));

    }

}
