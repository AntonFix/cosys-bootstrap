<?php

namespace App\Http\Controllers;

use App\Models\DictionaryLanguage;
use App\Http\Requests\StoreDictionaryLanguageRequest;
use App\Http\Requests\UpdateDictionaryLanguageRequest;

class DictionaryLanguageController extends Controller
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
     * @param  \App\Http\Requests\StoreDictionaryLanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDictionaryLanguageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DictionaryLanguage  $dictionaryLanguage
     * @return \Illuminate\Http\Response
     */
    public function show(DictionaryLanguage $dictionaryLanguage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DictionaryLanguage  $dictionaryLanguage
     * @return \Illuminate\Http\Response
     */
    public function edit(DictionaryLanguage $dictionaryLanguage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDictionaryLanguageRequest  $request
     * @param  \App\Models\DictionaryLanguage  $dictionaryLanguage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDictionaryLanguageRequest $request, DictionaryLanguage $dictionaryLanguage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DictionaryLanguage  $dictionaryLanguage
     * @return \Illuminate\Http\Response
     */
    public function destroy(DictionaryLanguage $dictionaryLanguage)
    {
        //
    }
}
