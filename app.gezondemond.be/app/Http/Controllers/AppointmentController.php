<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;


use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sortBy = request()->get('sort', 'desc');
        //http://127.0.0.1:8000/appointment?sort=asc

        $appointments = Appointment::orderBy('start_date', $sortBy)
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
        $appointment->end_date = $request->end_date;
        $appointment->end_time = $request->end_time;
        $appointment->attachment = $request->attachment;
        $appointment->archived = $request->archived;

        if ($request->attachment) {
            $extension = $request->file('attachment')->extension();
            $mimeType = $request->file('attachment')->getMimeType();
            $name = $request->file('attachment')->getClientOriginalName();
            $fileName = time() . '-' . $name;
            Storage::disk('local')
                ->putFileAs('public/uploads', $request->file('attachment'), $fileName);
            $appointment->attachment = $fileName;
        }

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

        $currentPerson = DB::table('persons')
            ->where('id', '=', $appointment->assigned_with_person_id)
            ->select('forename', 'name')
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
                'persons',
                'currentPerson')
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
        $appointment->end_date = $request->end_date;
        $appointment->end_time = $request->end_time;

        $appointment->archived = $request->archived;

        if ($request->attachment) {
            $extension = $request->file('attachment')->extension();
            $mimeType = $request->file('attachment')->getMimeType();
            $name = $request->file('attachment')->getClientOriginalName();
            $fileName = time() . '-' . $name;
            Storage::disk('local')
                ->putFileAs('public/uploads', $request->file('attachment'), $fileName);
            $appointment->attachment = $fileName;
        }

        //dd($request->attachment);

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
            ->with('success', 'Appointment has been deleted successfully')
            ->with('alert-class', 'text-bg-danger');
    }


    public function appointmentCopy(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //

        $appointment = Appointment::find($request->id);

        //dd($appointment);

        $newAppointment = $appointment->replicate();


        $newAppointment->app_status_id = 1; //Statuut: Gepland
        $newAppointment->created_by_user_id = $request->user()->id;
        $newAppointment->created_at = Carbon::now();


        $newAppointment->save();

        return redirect()
            ->route('appointment.index')
            ->with('success', 'Appointment has been copied successfully')
            ->with('alert-class', 'alert-success');

    }


    public function appInProgress(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //

        $appointment = Appointment::find($request->id);

        //dd($appointment);

        $appointment->app_status_id = 2;

        $appointment->save();

        return redirect()
            ->route('appointment.index')
            ->with('success', 'Appointment has been updated successfully')
            ->with('alert-class', 'alert-success');

    }


    public function appIsCarriedOut(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //

        $appointment = Appointment::findOrFail($request->id);

        $appointment->app_status_id = 4;

        $appointment->save();

        return redirect()
            ->route('appointment.index')
            ->with('success', 'Appointment has been updated successfully')
            ->with('alert-class', 'alert-success');

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
