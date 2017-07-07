<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
             $schedule = Schedule::get(['id', 'title', 'start', 'end']);
             return view('schedule.update')->with('schedules',$schedule)->render();
        } catch (Exception $e) {
        }
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
       try {
           //Update Clinic Open
            $open=Schedule::find(1);
            $open->start=$request->openStart;
            $open->end=$request->openEnd;
            $open->save();
            //Update Clinic Lunch time
            $lunch=Schedule::find(2);
            $lunch->start=$request->lunchStart;
            $lunch->end=$request->lunchEnd;
            $lunch->save();
            //Update Saturday Clinic Schedule
            $saturday=Schedule::find(3);
            $saturday->start=$request->saturdayStart;
            $saturday->end=$request->saturdayEnd;
            $saturday->save();
            
            return response()->json(["message" => "Horario actualizado correctamente."]);
        } catch (Exception $e ) {
            return response()->json(["message" => "Lo sentimos, ha ocurrido un error al intentar guardar la reservacion."]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
