<?php

namespace App\Http\Controllers;

use App\Pharmacist;
use App\Lab;
use App\Patient;
use App\Nurse;
use App\Accountant;
use App\Doctor;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all();
        return view('pharmacist.index')
               -> with ('patients',$patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pharmacist.create');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $accountant = Accountant::find($id);
        $doctor = Doctor::find($id);
        return view('pharmacist.show')
                    ->with('accountant' , $accountant)
                    ->with('doctor' , $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacist $pharmacist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacist $pharmacist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacist $pharmacist)
    {
        //
    }
}
