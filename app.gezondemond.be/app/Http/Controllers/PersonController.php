<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $addresses = DB::table('addresses')
            ->get();

        $languages = DB::table('dictionary_languages')
            ->get();

        $currentUser = Auth::user();

        return view('app.person.create',
            compact(
                'currentUser',
                'addresses',
                'languages')
        );

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

        $person = new Person;

        $person->forename = $request->forename;
        $person->name = $request->name;
        $person->birthday = $request->birthday;
        $person->sex = $request->sex;
        $person->function = $request->function;
        $person->volunteer = $request->volunteer;
        $person->oral_coach = $request->oral_coach;
        $person->coordinator = $request->coordinator;
        $person->details = $request->details;
        $person->phone = $request->phone;
        $person->email = $request->email;
        $person->presence = $request->presence;
        $person->active_from = $request->active_from;
        $person->inactive_from = $request->inactive_from;
        $person->is_active = $request->is_active;
        $person->created_by_user_id = $request->created_by_user_id;

        $person->save();

        return redirect()
            ->route('person.index')
            ->with('success', 'Person has been created successfully.');

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

        $person = Person::findOrFail($person->id);

        return view('app.person.edit', compact(
                'person')
        );


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

        $person->delete();

        return redirect()
            ->route('person.index')
            ->with('success', 'Person has been deleted successfully');

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
