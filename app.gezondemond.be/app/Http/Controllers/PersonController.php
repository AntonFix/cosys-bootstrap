<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persons = Person::orderBy('created_at', 'desc')
            ->with([
                'personAddresses',
                'spokenLanguages',
                'createdByUser',
            ])
            ->where('is_active', 1)
            ->get();

        return view('app.person.index',
            compact('persons'));
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
     * @param \App\Http\Requests\StorePersonRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
        $person = Person::where('id', $person->id)
            ->with([
                'personAddresses',
                'spokenLanguages',
                'createdByUser',
            ])
            ->firstOrFail();
        //dd($appointment);
        return view('app.person.show', compact('person'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePersonRequest $request
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }

    public function returnPersonsJson()
    {
        $persons = Person::latest()
            ->with([
                'personAddresses',
                'spokenLanguages',
                'createdByUser',
            ])
            ->get();
        return Response::json($persons, 200);
    }

    public function returnPersonByIdJson(Request $request, $id)
    {

        //return 'User' . $id;

        $person = Person::where('id', $id)
            ->with([
                'personAddresses',
                'spokenLanguages',
                'createdByUser',
            ])
            ->firstOrFail();
        return response()->json($person, 200);
    }

}
