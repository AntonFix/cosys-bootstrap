<?php

namespace App\Http\Controllers;

use App\Models\AppointmentCode;
use App\Http\Requests\StoreAppointmentCodeRequest;
use App\Http\Requests\UpdateAppointmentCodeRequest;

class AppointmentCodeController extends Controller
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
     * @param  \App\Http\Requests\StoreAppointmentCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentCodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppointmentCode  $appointmentCode
     * @return \Illuminate\Http\Response
     */
    public function show(AppointmentCode $appointmentCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppointmentCode  $appointmentCode
     * @return \Illuminate\Http\Response
     */
    public function edit(AppointmentCode $appointmentCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentCodeRequest  $request
     * @param  \App\Models\AppointmentCode  $appointmentCode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentCodeRequest $request, AppointmentCode $appointmentCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppointmentCode  $appointmentCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentCode $appointmentCode)
    {
        //
    }
}
