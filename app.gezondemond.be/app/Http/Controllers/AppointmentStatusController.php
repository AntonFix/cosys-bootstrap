<?php

namespace App\Http\Controllers;

use App\Models\AppointmentStatus;
use App\Http\Requests\StoreAppointmentStatusRequest;
use App\Http\Requests\UpdateAppointmentStatusRequest;

class AppointmentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAppointmentStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppointmentStatus  $appointmentStatus
     * @return \Illuminate\Http\Response
     */
    public function show(AppointmentStatus $appointmentStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppointmentStatus  $appointmentStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(AppointmentStatus $appointmentStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentStatusRequest  $request
     * @param  \App\Models\AppointmentStatus  $appointmentStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentStatusRequest $request, AppointmentStatus $appointmentStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppointmentStatus  $appointmentStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentStatus $appointmentStatus)
    {
        //
    }
}
