<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Nurse;
use App\Lab;
use App\Patient;
use Twilio\Rest\Client;
use Illuminate\Http\Request;

class DoctorController extends Controller
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
        $this->middleware('role:doctor');
    }
    public function index()
    {
        //
        $patients=Patient::all();
        return view('doctor.index')
                ->with('patients',$patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('doctor.create');
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
        $patients = Patient::all();

        $doctor = new Doctor;
        $doctor->patient_id = $request->input('patient_id');
        $doctor->treatment = $request->input('treatment');

        $doctor->save();
        $phone = $request->input('phone');
        $names = $request->input('names');

        $this->sendMessage($names.' wandikiwe imiti ikurikira : '.$doctor->treatment.' murakoresha iyi kode mu kwishyura: 3575 ' , $phone);

        // return dd($lab);
        return view('doctor.index')
        ->with(['success' => "message sent to {$names} successively"])
        -> with ('patients',$patients);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient = Patient::find($id);
        $nurse = Nurse::find($id);
        $lab = Lab::find($id);
        return view('doctor.show')
                    ->with('nurse' , $nurse)
                    ->with('lab' , $lab)
                    ->with('patient' , $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }
}
