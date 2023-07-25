<?php

namespace App\Http\Controllers;

use App\Models\DictionaryGeo;
use App\Http\Requests\StoreDictionaryGeoRequest;
use App\Http\Requests\UpdateDictionaryGeoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DictionaryGeoController extends Controller
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
     * @param \App\Http\Requests\StoreDictionaryGeoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDictionaryGeoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\DictionaryGeo $dictionaryGeo
     * @return \Illuminate\Http\Response
     */
    public function show(DictionaryGeo $dictionaryGeo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\DictionaryGeo $dictionaryGeo
     * @return \Illuminate\Http\Response
     */
    public function edit(DictionaryGeo $dictionaryGeo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateDictionaryGeoRequest $request
     * @param \App\Models\DictionaryGeo $dictionaryGeo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDictionaryGeoRequest $request, DictionaryGeo $dictionaryGeo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\DictionaryGeo $dictionaryGeo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DictionaryGeo $dictionaryGeo)
    {
        //
    }

    public function returnAllRegionsJson()
    {
        $isInputSelect = request()->get('inputSelect');

        $regions = DictionaryGeo::all();

        if ($isInputSelect) {
            $regions = DictionaryGeo::get(['id', 'postcode', 'gemeente', 'deelgemeente', 'provincie']);
            foreach ($regions as $k => $v) {
                if ($v['deelgemeente']) {
                    $v['label'] = $v['postcode'] . ' ' . $v['gemeente'] . ', ' . $v['deelgemeente'] . ', ' . $v['provincie'];
                    $v['value'] = $v['id'];
                } else {
                    $v['label'] = $v['postcode'] . ' ' . $v['gemeente'] . ', ' . $v['provincie'];
                    $v['value'] = $v['id'];
                }
            }
        } else {
            $regions = DictionaryGeo::all();
        }

        return Response::json($regions, 200);
    }
}
