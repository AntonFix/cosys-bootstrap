<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $dictionaryGeos = DB::table('dictionary_geos')
            ->orderBy('postcode')
            ->get();

        $currentUser = Auth::user();

        return view('app.address.create', compact(
                'dictionaryGeos',
                'currentUser')
        );

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

        $address = new Address;

        $address->name = $request->name;
        $address->dictionary_geos_id = $request->dictionary_geos_id;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->postbox = $request->postbox;
        $address->opening_times = $request->opening_times;
        $address->phone_1 = $request->phone_1;
        $address->phone_1_notices = $request->phone_1_notices;
        $address->phone_2 = $request->phone_2;
        $address->phone_2_notices = $request->phone_2_notices;
        $address->phone_3 = $request->phone_3;
        $address->phone_3_notices = $request->phone_3_notices;
        $address->email_1 = $request->email_1;
        $address->email_1_notices = $request->email_1_notices;
        $address->email_2 = $request->email_2;
        $address->email_2_notices = $request->email_2_notices;
        $address->email_3 = $request->email_3;
        $address->email_3_notices = $request->email_3_notices;
        $address->website = $request->website;
        $address->fin_naam_bank = $request->fin_naam_bank;
        $address->fin_naam_persoon_of_organisatie = $request->fin_naam_persoon_of_organisatie;
        $address->fin_iban_code = $request->fin_iban_code;
        $address->fin_bin_code = $request->fin_bin_code;
        $address->fin_bicc_code = $request->fin_bicc_code;
        $address->fin_btw_nummer = $request->fin_btw_nummer;
        $address->fin_ondernemingsnummer = $request->fin_ondernemingsnummer;
        $address->fin_opmerkingen = $request->fin_opmerkingen;
        $address->is_active = $request->is_active;
        $address->created_by_user_id = $request->created_by_user_id;

        $address->save();

        return redirect()
            ->route('address.index')
            ->with('success', 'Address has been created successfully.');

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

        $address = Address::findOrFail($address->id);

        $regions = DB::table('dictionary_geos')
            ->get();

        $currentUser = Auth::user();

        return view('app.address.edit', compact(
                'address',
                'regions',
                'currentUser')
        );

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

        $address = Address::find($address->id);

        $address->name = $request->name;
        $address->dictionary_geos_id = $request->dictionary_geos_id;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->postbox = $request->postbox;
        $address->opening_times = $request->opening_times;
        $address->phone_1 = $request->phone_1;
        $address->phone_1_notices = $request->phone_1_notices;
        $address->phone_2 = $request->phone_2;
        $address->phone_2_notices = $request->phone_2_notices;
        $address->phone_3 = $request->phone_3;
        $address->phone_3_notices = $request->phone_3_notices;
        $address->email_1 = $request->email_1;
        $address->email_1_notices = $request->email_1_notices;
        $address->email_2 = $request->email_2;
        $address->email_2_notices = $request->email_2_notices;
        $address->email_3 = $request->email_3;
        $address->email_3_notices = $request->email_3_notices;
        $address->website = $request->website;
        $address->fin_naam_bank = $request->fin_naam_bank;
        $address->fin_naam_persoon_of_organisatie = $request->fin_naam_persoon_of_organisatie;
        $address->fin_iban_code = $request->fin_iban_code;
        $address->fin_bin_code = $request->fin_bin_code;
        $address->fin_bicc_code = $request->fin_bicc_code;
        $address->fin_btw_nummer = $request->fin_btw_nummer;
        $address->fin_ondernemingsnummer = $request->fin_ondernemingsnummer;
        $address->fin_opmerkingen = $request->fin_opmerkingen;
        $address->is_active = $request->is_active;

        $address->save();

        return redirect()
            ->route('address.index')
            ->with('success', 'Address has been updated successfully');

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

        $address->delete();

        return redirect()
            ->route('address.index')
            ->with('success', 'Address has been deleted successfully');

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
