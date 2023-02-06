<?php

namespace App\Http\Controllers;

use App\Models\Debug;
use App\Http\Requests\StoreDebugRequest;
use App\Http\Requests\UpdateDebugRequest;

use Illuminate\Support\Facades\Response;

class DebugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*return view('app.debug.index', [
            'debugs' => DB::table('debugs')
                ->orderBy('id', 'desc')
                ->get()
        ]);*/

        $debugs = Debug::latest()
            ->take(50)
            ->get();

        //$newDate = $debugs->dateTime->format('d-m-Y');

        //dd($newDate);
        //return response()->json($debugs, 200);

        return view('app.debug.index', compact('debugs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('app.debug.create');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Debug $debug
     * @return \Illuminate\Http\Response
     */
    public function show(Debug $debug)
    {
        //
        return view('app.debug.show', compact('debug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Debug $debug
     * @return \Illuminate\Http\Response
     */
    public function edit(Debug $debug)
    {
        //
        //dd($debug);
        $debug = Debug::findOrFail($debug->id);
        return view('app.debug.edit', compact('debug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Requests\StoreDebugRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDebugRequest $request)
    {
        //All validation rules are in StoreDebugRequest

        $debug = new Debug;

        $debug->nameString = $request->nameString;
        $debug->nameChar = $request->nameChar;
        $debug->integer = $request->integer;
        $debug->decimal = $request->decimal;
        $debug->date = $request->date;
        $debug->dateTime = $request->dateTime;
        $debug->uuidColumn = $request->uuidColumn;
        $debug->uploadedFile = $request->uploadedFile;

        $debug->save();

        return redirect()
            ->route('debug.index')
            ->with('success', 'Debug item has been created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateDebugRequest $request
     * @param \App\Models\Debug $debug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDebugRequest $request, Debug $debug)
    {
        //
        //All validate rules are in UpdateDebugRequest


        $debug = Debug::find($debug->id);

        $debug->nameString = $request->nameString;
        $debug->nameChar = $request->nameChar;
        $debug->integer = $request->integer;
        $debug->decimal = $request->decimal;
        $debug->date = $request->date;
        $debug->dateTime = $request->dateTime;

        //$copyUploadedImage = $request->copyUploadedImage;

        /*if ($request->uploadedFile != $request->copyUploadedImage) {
            //$uploadedFile = time() . '.' . request()->uploadedFile->getClientOriginalExtension();
            //request()->uploadedFile->move(public_path('uploads'), $uploadedFile);
            $debug->uploadedFile = $request->copyUploadedImage;
        } else {
            $debug->uploadedFile = $request->uploadedFile;
        }*/

        $debug->uploadedFile = $request->uploadedFile;

        $debug->save();

        return redirect()
            ->route('debug.index')
            ->with('success', 'Debug item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Debug $debug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debug $debug)
    {
        //
        $debug->delete();

        return redirect()
            ->route('debug.index')
            ->with('success', 'Debug item has been deleted successfully');
    }

    public function returnDebugsJson()
    {
        $debugs = Debug::all();
        return Response::json($debugs, 200);
    }

}
