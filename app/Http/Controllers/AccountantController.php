<?php

namespace App\Http\Controllers;

use App\Accountant;
use App\Lab;
use App\Patient;
use App\Nurse;
use App\Doctor;
use Illuminate\Http\Request;

class AccountantController extends Controller
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
        $this->middleware('role:accountant');
    }
    public function index()
    {
        //
        $patients = Patient::all();
        return view('accountant.index')
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
        return view('accountant.create');
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
        $accountant = new Accountant;
        $accountant->patient_id = $request->input('patient_id');
        $accountant->services = $request->input('services');
        $accountant->total_amount = $request->input('total_amount');
        $accountant->paid = $request->input('paid');
        $accountant->assured_amount = $request->input('assured_amount');

        if ($accountant->assured_amount == '100% of Tot Amount') {
            $accountant->rest = $accountant->total_amount - $accountant->paid;

        } else {
            $accountant->rest = $accountant->assured_amount - $accountant->paid;

        }

        $accountant->save();

        $patients = Patient::all();
        return view('accountant.index')
               -> with ('patients',$patients);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient = Patient::find($id);
        $doctor = Doctor::find($id);
        $nurse = Nurse::find($id);
        return view('accountant.show')
                    ->with('doctor' , $doctor)
                    ->with('nurse' , $nurse)
                    ->with('patient' , $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function edit(Accountant $accountant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accountant $accountant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accountant $accountant)
    {
        //
    }
}
