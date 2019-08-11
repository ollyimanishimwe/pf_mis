<?php

namespace App\Http\Controllers;

use App\Nurse;
use App\Patient;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('role:super', ['only'=>'show']);
        $this->middleware('role:nurse');
    }
    public function index()
    {
        //
        $patients = Patient::all();
        return view('nurse.index')
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
        return view('nurse.create');
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
        $patient = Patient::find($request->get('id'));
        $patients = Patient::all();

        $nurse = new Nurse;
        $nurse->patient_id = $request->input('patient_id');
        $nurse->weight = $request->input('weight');
        $nurse->pregnancy_status = $request->input('pregnancy_status');
        $nurse->symptoms = $request->input('symptoms');
        $nurse->lab_examinations = implode(',',$request ->lab_examinations);
        // $nurse->examination_results = $request->input('examination_results');
        $nurse->save();

        // return dd($nurse);
        return view('nurse.index')
        ->with('patients', $patients);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient = Patient::find($id);
        return view('nurse.show')
                    ->with('patient' , $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit(Nurse $nurse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nurse $nurse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        //
    }
}
