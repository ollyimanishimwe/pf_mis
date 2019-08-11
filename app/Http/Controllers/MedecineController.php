<?php

namespace App\Http\Controllers;

use App\Medecine;
use Illuminate\Http\Request;

class MedecineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }
    public function index()
    {
        //
        $medecine=Medecine::all();
        return view('medecine.index')
                ->with('medecine',$medecine);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('medecine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $medecine=Medecine::all();
        $medecine = new Medecine;
        $medecine->name = $request->input('name');
        $medecine->price = $request->input('price');
        $medecine->quantity = $request->input('quantity');

        $medecine->save();
        return view('medecine.index')
                ->with('medecine',$medecine);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medecine  $medecine
     * @return \Illuminate\Http\Response
     */
    public function show(Medecine $medecine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medecine  $medecine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medecine $medecine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medecine  $medecine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medecine $medecine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medecine  $medecine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medecine $medecine)
    {
        //
    }
}
