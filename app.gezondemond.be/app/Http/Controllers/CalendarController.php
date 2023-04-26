<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Calendar;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use Illuminate\Support\Facades\Response;

class CalendarController extends Controller
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

        return view('app.calendar.index',
            compact(
                'appointments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCalendarRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalendarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Calendar $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Calendar $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCalendarRequest $request
     * @param \App\Models\Calendar $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalendarRequest $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Calendar $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        //
    }

    /*JSON*/
    public function returnCalendarAppointmentsJson()
    {
        $appointments = Appointment::query()
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
}
