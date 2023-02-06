<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
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
        $appointments = Appointment::all();

        //$newDate = $debugs->dateTime->format('d-m-Y');

        //dd($appointments);
        //return response()->json($debugs, 200);

        return view('app.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('app.appointment.create');
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
        $appointment->end_date = $request->end_date;
        $appointment->end_time = $request->end_time;
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
        return view('app.appointment.edit', compact('appointment'));
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
    }

    public function returnAppointmentsJson()
    {
        $appointments = Appointment::latest()
            ->with([
                'appCode',
                'appStatus',
                'assignedWithPerson',
            ])
            ->get();;
        return Response::json($appointments, 200);
    }


}
