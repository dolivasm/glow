<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Appointment;
use App\Schedule;
use App\Services;
use Carbon\Carbon;
use DateTime;
use Auth;

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
        $this->middleware('auth')->except('index','details');
        $this->middleware('sentryContext');
    }
     
     public function index()
    {
        return view('appointment.index');
    }
    public function details(Request $request)
    {
        $data = Appointment::get(['id', 'title', 'start', 'end', 'color','userId']);
        foreach ($data as $appointment ) {
            if (Auth::check()) {
                    if ($request->user()->id ==$appointment->userId )
                    {
                        $appointment->color ="#6f4a79";
                    }
                }
        }
        
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

        $serviceId =DB::table('services')->orderBy('duration', 'asc')->pluck('name', 'id');
        $firtsService=DB::table('services')->orderBy('duration', 'asc')->first();
        $availableTime= $this->getTimeAvailable($firtsService,$dt);
        if (count($availableTime)==0) {
            return Response()->json([
                'message'=>'No hay citas diponibles en este día.'
                ]);
        }
        return view('appointment.add')->with('serviceId',$serviceId)->with('time_start',$availableTime)->render();
           
       } catch (Exception $e ) {
       }
    }
    
public function edit($id,Request $request){
        try {
            $date=Carbon::now();
            $close=Schedule::find(3);//Take cloe time
            $closeTime=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($close->start , 0 , 2 )), (integer)(substr ($close->start , 3 , 2 )), (integer)(substr ($close->start , 6 , 2 )));
            
           
        
            $appointment=Appointment::find($id);
           
            $serviceId =DB::table('services')->pluck('name', 'id');
            $firtsService=Services::find($appointment->serviceId);
            $dt=Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start);
              if ($date>=$closeTime && $date->toDateString()==$dt->toDateString()) {
            return Response()->json([
                'warning'=>'No se puede agregar ni actualizar más citas por el día de hoy.'
                ]);
            }
            if (Auth::check()) {
                    if ($request->user()->id ==$appointment->userId )
                    {
                        $appointment->color ="#6f4a79";
                    }
                }
            $availableTime= $this->getTimeAvailable($firtsService,$dt,$appointment);
            $appointment->start=$dt->toTimeString();
            
           
            return view('appointment.edit',['appointment'=>$appointment])->with('serviceId',$serviceId)->with('time_start',$availableTime)->render();
            
        } catch (Exception $e) {
           return response()->json(["message"=>"Lo sentimos,no se ha logrado cargar los datos de la cita"]);
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
            $Appointment->color ="#336699" ;
            $Appointment->userId = $request->user()->id;
            $Appointment->save();
            return response()->json(["message" => "RESERVADO CORRECTAMENTE."]);
        } catch (Exception $e) {
            return response()->json(["message" => "Lo sentimos, ha ocurrido un error al procesar su reservación."]);
            }
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
            $Appointment =Appointment::find($id);
            
            $end=Carbon::createFromFormat('Y-m-d H:i:s',$request->date_start . ' ' . $request->start);
            $service=Services::find($request->serviceId);
            $end=$this->addServiceTime($service,$end);
            
            $Appointment->serviceId = $request->serviceId;
            $Appointment->start = $request->date_start . ' ' . $request->start;
            $Appointment->end=  $end;
            $Appointment->color ="#336699" ;
            //$Appointment->userId = $request->user()->id;// No actualizar el usuario
            $Appointment->save();
            return response()->json(["message" => "Cita actualizada correctamente."]);
        } catch (Exception $e ) {
            return response()->json(["message" => "Lo sentimos, ha ocurrido un error al procesar su reservación."]);
        }
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
    
    public function timesAvailable($id,$date,$appointmentId=null)
    {
        try {
         $dt = Carbon::now();
        // date->//2017-05-30
        $dt->year   = (integer)(substr ($date, 0 , 4 ));
        $dt->month  = (integer)(substr ($date , 6 , 2 ));
        $dt->day    = (integer)(substr ($date , 8 , 2 ));  

        $firtsService=Services::find($id);
        $appointment=null;
        if ($appointmentId!=null) {
           $appointment=Appointment::find($appointmentId);
        }
        $availableTime= $this->getTimeAvailable($firtsService,$dt,$appointment);
         if (count($availableTime)==0) {
            return Response()->json([
                0=>'No hay citas diponibles para este servicio.'
                ]);
        }
        return Response()->json($availableTime);
           
       } catch (Exception $e ) {
        }
    }
     public function getTimeAvailable($service,$date,$selectedAppointment=null){
        //Es necesario recibir la fecha que se selecciona para consultar 
        $open=Schedule::find(1);//Take the open schedule
        $openTime=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->start , 0 , 2 )), (integer)(substr ($open->start , 3 , 2 )), (integer)(substr ($open->start , 6 , 2 )));
        
        $lunch=Schedule::find(2);//The lunch time
        $startLunch=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($lunch->start , 0 , 2 )), (integer)(substr ($lunch->start , 3 , 2 )), (integer)(substr ($lunch->start , 6 , 2 )));
        $endLunch=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($lunch->end , 0 , 2 )), (integer)(substr ($lunch->end , 3 , 2 )), (integer)(substr ($lunch->end , 6 , 2 )));

        $close=Schedule::find(3);//Take cloe time
        $closeTime=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($close->start , 0 , 2 )), (integer)(substr ($close->start , 3 , 2 )), (integer)(substr ($close->start , 6 , 2 )));
        
        $actualDate=Carbon::now();
        
        $initialTime=null;
        $endTime=null   ;
        if ($this->isActualDate($actualDate,$date)) {
            $initialTime=Carbon::now();
            $initialTime->addMinutes(5);//Add five minutes, to no reserve on actual time
            $endTime=Carbon::now();
            $endTime->addMinutes(5);
        }else{
            $initialTime= Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->start , 0 , 2 )), (integer)(substr ($open->start , 3 , 2 )), (integer)(substr ($open->start , 6 , 2 )));
            $endTime =Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->start , 0 , 2 )), (integer)(substr ($open->start , 3 , 2 )), (integer)(substr ($open->start , 6 , 2 )));
        }
    $endTime=$this->addServiceTime($service,$endTime);
    //if is editing an appointment ignore the actual appointment
      if ($selectedAppointment!=null) {
          $appointments=DB::table('appointments')
            ->orderBy('start')
                ->where('id','!=',$selectedAppointment->id)
                    ->where('start', 'like','%'. $initialTime->toDateString().'%')
                        ->get();
      }else {
        //if are adding an appointment take all actuals appointments
          $appointments=DB::table('appointments')
            ->orderBy('start')
                    ->where('start', 'like','%'. $initialTime->toDateString().'%')
                        ->get();
      }
         
       while ($endTime<=$closeTime){
           for ($i = 0; $i < $appointments->count(); $i++) {//$appointments[$i]->start
                if ((($appointments[$i]->start==$initialTime 
                    || $appointments[$i]->start<$endTime) 
                    && $appointments[$i]->start>=$initialTime)
                    ||($this->isActualDate($actualDate,$date) && $initialTime<$appointments[$i]->end)
                    ) {
                    $initialTime=Carbon::createFromFormat('Y-m-d H:i:s', $appointments[$i]->end);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                    //Se actualiza el periodo de la cita 
                    $endTime=Carbon::createFromFormat('Y-m-d H:i:s', $appointments[$i]->end);
                    $endTime=$this->addServiceTime($service,$endTime);
                }
           }//end for
           if (($endTime>$startLunch && $initialTime<$endLunch)|| $initialTime==$startLunch) {
                        $initialTime=Carbon::createFromFormat('Y-m-d H:i:s', $endLunch);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                        //Se actualiza el periodo de la cita 
                        $endTime=Carbon::createFromFormat('Y-m-d H:i:s', $endLunch);
                        $endTime=$this->addServiceTime($service,$endTime);
                    }else{
             if ($endTime<=$closeTime) {
                $this->timeAvailables= array_add($this->timeAvailables,$initialTime->toTimeString(), $initialTime->toTimeString());
                $initialTime=Carbon::createFromFormat('Y-m-d H:i:s', $endTime);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                $endTime=$this->addServiceTime($service,$endTime);
          }}
        }//endWhile
        return $this->timeAvailables;
    }
    
    public function isActualDate($actualDate,$selectedDate){
        return ($actualDate->toDateString()==$selectedDate->toDateString());

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
}
