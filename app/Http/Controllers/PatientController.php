<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //first page to check all patients

        $patients = Patient::all();
        return view('patient.index')
                    ->with('patients' , $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //the page to insert a patient
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //codes to store paients information
        $imageName = str_slug($request->n_id).'.'.request()->patient_image->getClientOriginalExtension();



        request()->patient_image->move(public_path('images'), $imageName);

        //create patient

        $patient = new Patient;
        $patient->n_id = $request->input('n_id');
        $patient->names = $request->input('names');
        $patient->insurance_company = $request->input('insurance_company');
        $patient->insurance_id = $request->input('insurance_id');
        $patient->gender = $request->input('gender');
        $patient->province = $request->input('province');
        $patient->district = $request->input('district');
        $patient->sector = $request->input('sector');
        $patient->cell = $request->input('cell');
        $patient->family_chief = $request->input('family_chief');
        $patient->village = $request->input('village');
        $patient->dob = $request->input('dob');
        $patient->phone = $request->input('phone');
        $patient->patient_image = $imageName;
        $patient->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //displays the patient profile
        $patient = Patient::find($id);
        return view('patient.show')
                    ->with('patient' , $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
