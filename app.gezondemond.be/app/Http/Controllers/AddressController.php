<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $addresses = Address::orderBy('created_at', 'desc')
            ->with([
                'region',
            ])
            ->get();

        return view('app.address.index', compact('addresses'));
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
     * @param \App\Http\Requests\StoreAddressRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //

        $address = Address::where('id', $address->id)
            ->with([
                'region',
            ])
            ->firstOrFail();
        //dd($appointment);
        return view('app.address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAddressRequest $request
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }

    public function returnAddressesJson()
    {
        $address = Address::latest()
            ->with([
                'region',
            ])
            ->get();
        return Response::json($address, 200);
    }

    public function returnAddressByIdJson(Request $request, $id)
    {

        $address = Address::where('id', $id)
            ->with([
                'region',
            ])
            ->firstOrFail();
        return response()->json($address, 200);
    }


}
