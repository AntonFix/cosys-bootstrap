<?php

namespace App\Http\Controllers;

use App\Models\PersonAddress;
use App\Http\Requests\StorePersonAddressRequest;
use App\Http\Requests\UpdatePersonAddressRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class PersonAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personAddresses = PersonAddress::get();
        return Response::json($personAddresses, 200);
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
     * @param  \App\Http\Requests\StorePersonAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonAddressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonAddress  $personAddress
     * @return \Illuminate\Http\Response
     */
    public function show(PersonAddress $personAddress)
    {
        //
        $personAddress = PersonAddress::where('id', $personAddress->id)
            ->firstOrFail();
        return Response::json($personAddress, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonAddress  $personAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonAddress $personAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonAddressRequest  $request
     * @param  \App\Models\PersonAddress  $personAddress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonAddressRequest $request, PersonAddress $personAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonAddress  $personAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonAddress $personAddress)
    {
        //
    }
}
