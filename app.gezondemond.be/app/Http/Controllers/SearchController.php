<?php

namespace App\Http\Controllers;

use App\Models\Search;
use App\Http\Requests\StoreSearchRequest;
use App\Http\Requests\UpdateSearchRequest;

use App\Models\Debug;
use App\Models\Appointment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function filterAppointments(Request $request, Appointment $appointment)
    {
        //
        if ($request != '') {

            Cache::flush();
            cache()->flush();

            $title = $request->input('title');

            $app_status_id = $request->input('app_status_id');
            $app_code_id = $request->input('app_code_id');
            $assigned_with_user_id = $request->input('assigned_with_user_id');
            $assigned_with_person_id = $request->input('assigned_with_person_id');
            $start_date = $request->input('start_date');
            $start_time = $request->input('start_time');

            $serp = DB::table('appointments')
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
                    $query->where('start_time', $start_time);
                })
                ->where('archived', false)
                ->orderBy('start_date', 'DESC')
                ->get();

            /*dd($serp);*/

        } else {

            $serp = Appointment::all();;

        }

        return view('app.search.resultsAppointments')->with('serp', $serp);

    }

    public function filterDebugs(Request $request, Debug $debug)
    {
        //
        if ($request != '') {

            $serp = DB::table('debugs')
                ->where('nameString', 'like', '%' . $request->input('nameString') . '%')
                ->where('date', 'like', '%' . $request->input('date') . '%')
                ->where('dateTime', 'like', '%' . $request->input('dateTime') . '%')
                //->orWhere('that_too', '=', 1)
                ->get();

        } else {

            $serp = Debug::all();;

        }

        return view('app.search.resultsDebugs')->with('serp', $serp);

    }

}
