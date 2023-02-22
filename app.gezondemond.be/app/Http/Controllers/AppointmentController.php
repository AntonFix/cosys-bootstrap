<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $appointments = Appointment::orderBy('start_date', 'desc')
            ->get();

        $appointmentCodes = DB::table('appointment_codes')
            ->get();

        $appointmentStatuses = DB::table('appointment_statuses')
            ->get();

        $users = DB::table('users')
            ->orderBy('name')
            ->get();

        $currentUser = Auth::user();

        //$newDate = $debugs->dateTime->format('d-m-Y');

        //dd($appointments);
        //return response()->json($debugs, 200);

        return view('app.appointment.index',
            compact(
                'appointments',
                'appointmentCodes',
                'appointmentStatuses',
                'users',
                'currentUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return view('app.appointment.create', compact(
                'appointmentCodes',
                'appointmentStatuses',
                'users',
                'currentUser',
                'persons')
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAppointmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        //

        $appointment = new Appointment;

        $appointment->title = $request->title;
        $appointment->details = $request->details;
        $appointment->app_code_id = $request->app_code_id;
        $appointment->app_status_id = $request->app_status_id;
        $appointment->created_by_user_id = $request->created_by_user_id;
        $appointment->assigned_with_user_id = $request->assigned_with_user_id;
        $appointment->assigned_with_person_id = $request->assigned_with_person_id;
        $appointment->start_date = $request->start_date;
        $appointment->start_time = $request->start_time;
        /*$appointment->end_date = $request->end_date;
        $appointment->end_time = $request->end_time;*/
        $appointment->attachment = $request->attachment;
        $appointment->archived = $request->archived;

        $appointment->save();

        return redirect()
            ->route('appointment.index')
            ->with('success', 'Appointment has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
        $appointment = Appointment::where('id', $appointment->id)
            ->with([
                'appCode',
                'appStatus',
                'assignedWithPerson',
                'assignedWithPersonAddresses',
                'assignedWithPersonSpokenLanguages',
                'assignedWithUser',
                'createdByUser',
            ])
            ->firstOrFail();
        //dd($appointment);
        return view('app.appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
        $appointment = Appointment::findOrFail($appointment->id);

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

        return view('app.appointment.edit', compact(
                'appointment',
                'appointmentCodes',
                'appointmentStatuses',
                'users',
                'currentUser',
                'persons')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAppointmentRequest $request
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //

        $appointment = Appointment::find($appointment->id);

        $appointment->title = $request->title;
        $appointment->details = $request->details;
        $appointment->app_code_id = $request->app_code_id;
        $appointment->app_status_id = $request->app_status_id;
        $appointment->created_by_user_id = $request->created_by_user_id;
        $appointment->assigned_with_user_id = $request->assigned_with_user_id;
        $appointment->assigned_with_person_id = $request->assigned_with_person_id;
        $appointment->start_date = $request->start_date;
        $appointment->start_time = $request->start_time;
        /*$appointment->end_date = $request->end_date;
        $appointment->end_time = $request->end_time;*/
        $appointment->attachment = $request->attachment;
        $appointment->archived = $request->archived;

        $appointment->save();

        return redirect()
            ->route('appointment.index')
            ->with('success', 'Appointment has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment->delete();

        return redirect()
            ->route('appointment.index')
            ->with('success', 'Appointment has been deleted successfully');
    }

    /*Extra functions*/

    /*JSON*/
    public function returnAppointmentsJson()
    {
        $appointments = Appointment::latest()
            ->with([
                'appCode',
                'appStatus',
                'assignedWithPerson',
                'assignedWithPersonAddresses',
                'assignedWithPersonSpokenLanguages',
                'assignedWithUser',
                'createdByUser',
            ])
            ->get();
        return Response::json($appointments, 200);
    }

    public function returnAppointmentByIdJson(Request $request, $id)
    {
        $appointments = Appointment::where('id', $id)
            ->with([
                'appCode',
                'appStatus',
                'assignedWithPerson',
                'assignedWithPersonAddresses',
                'assignedWithPersonSpokenLanguages',
                'assignedWithUser',
                'createdByUser',
            ])
            ->first();

        //dd($appointments);
        return Response::json($appointments, 200);
    }


}
