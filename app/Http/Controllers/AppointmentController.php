<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('sentryContext');
    }
     
     public function index()
    {
        return view('appointment.index');
    }
    public function details()
    {
        $data = Appointment::get(['id', 'title', 'start', 'end', 'color']);
        
        return Response()->json($data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Appointment = new Appointment();
        $Appointment->title = $request->title;
        $Appointment->serviceId = "2";
        $Appointment->start = $request->date_start . ' ' . $request->time_start;
        $Appointment->end= $request->date_end;
        $Appointment->color ="#85d106" ;
        $Appointment->userId = $request->user()->id;
        $Appointment->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Appointment = Appointment::find($id);

        if($Appointment == null)
            return Response()->json([
                'message'   =>  'error delete.'
            ]);

        $Appointment->delete();

        return Response()->json([
            'message'   =>  'success delete.'
        ]);

    }
}
