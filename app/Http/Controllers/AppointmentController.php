<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Appointment;
use App\Schedule;
use App\Services;
use Carbon\Carbon;
use DateTime;

class AppointmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
     private $timeAvailables;
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
        
    }
     public function add($date)
    {
       try {
         $dt = Carbon::now();
        // date->//2017-05-30
        $dt->year   = (integer)(substr ($date, 0 , 4 ));
        $dt->month  = (integer)(substr ($date , 6 , 2 ));
        $dt->day    = (integer)(substr ($date , 8 , 2 ));  

        $serviceId =DB::table('services')->pluck('name', 'id');
        $firtsService=DB::table('services')->first();
        $availableTime= $this->getTimeAvailable($firtsService,$dt);
        return view('appointment.add')->with('serviceId',$serviceId)->with('time_start',$availableTime)->render();
           
       } catch (Exception $e ) {
       }
    }
    public function getTimeAvailable($service,$date){
        //Es necesario recibir la fecha que se selecciona para consultar 
        $open=Schedule::find(1);//Take the open schedule
        $openTime=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->start , 0 , 2 )), (integer)(substr ($open->start , 3 , 2 )), (integer)(substr ($open->start , 6 , 2 )));
        
        $lunch=Schedule::find(2);//The lunch time
        $startLunch=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($lunch->start , 0 , 2 )), (integer)(substr ($lunch->start , 3 , 2 )), (integer)(substr ($lunch->start , 6 , 2 )));
        $endLunch=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($lunch->end , 0 , 2 )), (integer)(substr ($lunch->end , 3 , 2 )), (integer)(substr ($lunch->end , 6 , 2 )));

        $close=Schedule::find(3);//Take cloe time
        $closeTime=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($close->start , 0 , 2 )), (integer)(substr ($close->start , 3 , 2 )), (integer)(substr ($close->start , 6 , 2 )));
        
        $initialTime= Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->start , 0 , 2 )), (integer)(substr ($open->start , 3 , 2 )), (integer)(substr ($open->start , 6 , 2 )));
        $endTime =Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->start , 0 , 2 )), (integer)(substr ($open->start , 3 , 2 )), (integer)(substr ($open->start , 6 , 2 )));

       $endTime=$this->addServiceTime($service,$endTime); 
       
         //$this->timeAvailables = array_add($this->timeAvailables,'9:00', $dt);//Para ver como queda despues de la suma
        $appointments=DB::table('appointments')->orderBy('start')->where('start', 'like','%'. $initialTime->toDateString().'%')->get();
       while ($endTime<=$closeTime){
            foreach ($appointments as $appointment) {
                if (($appointment->start==$initialTime || $appointment->start<$endTime)&& $appointment->start>=$initialTime) {//Problema aqu
                    
                    $initialTime=Carbon::createFromFormat('Y-m-d H:i:s', $appointment->end);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                    //Se actualiza el periodo de la cita 
                    $endTime=Carbon::createFromFormat('Y-m-d H:i:s', $appointment->end);
                    $endTime=$this->addServiceTime($service,$endTime);
                }else {
                    if (($endTime>$startLunch && $initialTime<$endLunch)) {
                        var_dump('_________________________Almuerzoooo______________________________________');
                        $initialTime=Carbon::createFromFormat('Y-m-d H:i:s', $endLunch);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                        //Se actualiza el periodo de la cita 
                        $endTime=Carbon::createFromFormat('Y-m-d H:i:s', $endLunch);
                        $endTime=$this->addServiceTime($service,$endTime);
                    } 
                }//End Foreach
            }//End Foreach
             if ($endTime<=$closeTime) {
                            //Add available hour
                     // $this->timeAvailables = array_add(['id' => $initialTime->toTimeString()], 'val', $initialTime->toTimeString());
                $this->timeAvailables= array_add($this->timeAvailables,$initialTime->toTimeString(), $initialTime->toTimeString());
                $initialTime=Carbon::createFromFormat('Y-m-d H:i:s', $endTime);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                            //Se actualiza el periodo de la cita 
                $endTime=$this->addServiceTime($service,$endTime);
                     
               
          }
        }//endWhile
        return $this->timeAvailables;
    }
    public function addServiceTime($service,$date){
        $duration=$service->duration;
        $hourDuration=substr ($duration , 0 , 2 );//Take Aditional hours
        $minDuration=substr ($duration , 3 , 2 );//Take Aditional minutes
        $secDuration=substr ($duration , 6 , 2 );//Take Aditional secons

        $date->addHours($hourDuration); 
        $date->addMinutes($minDuration);
        $date->addSeconds($secDuration);
        return $date;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //Add the time of end the service
            $end=Carbon::createFromFormat('Y-m-d H:i:s',$request->date_start . ' ' . $request->time_start );
            $service=Services::find($request->serviceId);
            $end=$this->addServiceTime($service,$end);
            
            $Appointment = new Appointment();
            $Appointment->title = "Reservado";
            $Appointment->serviceId = $request->serviceId;
            $Appointment->start = $request->date_start . ' ' . $request->time_start;
            $Appointment->end=  $end;
            $Appointment->color ="#5b006f" ;
            $Appointment->userId = $request->user()->id;
            $Appointment->save();
            return response()->json(["message" => "RESERVADO CORRECTAMENTE."]);
        } catch (Exception $e) {
            return response()->json(["message" => "Lo sentimos, ha ocurrido un error al procesar su reservación."]);
            }
    }

    public function timesAvailable($id,$date)
    {
        try {
         $dt = Carbon::now();
        // date->//2017-05-30
        $dt->year   = (integer)(substr ($date, 0 , 4 ));
        $dt->month  = (integer)(substr ($date , 6 , 2 ));
        $dt->day    = (integer)(substr ($date , 8 , 2 ));  

        $firtsService=Services::find($id);
        $availableTime= $this->getTimeAvailable($firtsService,$dt);
        return Response()->json($availableTime);
           
       } catch (Exception $e ) {
       }
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
    {try {
        $Appointment = Appointment::find($id);

        if($Appointment == null)
            return Response()->json([
                'message'   =>  'Lo sentimos, no se ha encontrado la cita solicitada.'
            ]);

        $Appointment->delete();

        return Response()->json([
            'message'   =>  'Cita cancelada correctamente.'
        ]);
        
    } catch (Exception $e ) {
        return Response()->json([
                'message'   =>  'Lo sentimos, ha ocurrido un error al cancelar su cita.'
            ]);
    }
        
    
    }
}