<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JavaScript;
use App\Appointment;
use App\Schedule;
use App\Services;
use Carbon\Carbon;
use DateTime;
use Auth;
use App\User;
use App\Notifications\SuccessAppointment;
use App\Notifications\SuccesEditAppointment;
use App\Notifications\SuccesDeleteAppointment;

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
        try {
            $open=Schedule::find(1);
            $lunch=Schedule::find(2);
            $satSchedule = Schedule::find(3);
            Javascript::put([  'openTime' => $open->start,'lunchStart' => $lunch->start, 'lunchEnd' => $lunch->end, 'closeTime' => $open->end]);
            if (Auth::check()) {
                $user = Auth::user();
                Javascript::put([ 'userId' => $user->id, 'userRole' => $user->role_id ]);
                
            }
            
            $schedule2 = "Sábado ". $satSchedule->start ." - ". $satSchedule->end;
            $schedule = "Lun-Vie ". $open->start . " - ". $lunch->start ." | ". $lunch->end ." - ". $open->end;
        
            return view('appointment.index')->with('schedule',$schedule)->with('schedule2', $schedule2);
            
        } catch (Exception $e ) {
            return Response()->json(['message'=>'Lo sentimos, ha ocurrido un error al cargar las citas.']);
        }
        
      
        
    }
    public function details(Request $request)
    {
        $data = Appointment::get(['id', 'title', 'start', 'end', 'color','userId','serviceId']);
        foreach ($data as $appointment ) {
            if (Auth::check()) {
                    if ($request->user()->id ==$appointment->userId && ($appointment->color)!="#657963" )
                    {
                        $appointment->color ="#8FC0A9";
                    }
                }
        }
        
        return Response()->json($data);
    }

     public function add($date){
         
       try {
           $isAdmin=$this->userIsAdmin();
            if ($isAdmin){
                 $userId =$this->getConcatenateUsers();
            }                
         $dt = Carbon::now();
        // date->//2017-05-30
        $dt->year   = (integer)(substr ($date, 0 , 4 ));
        $dt->month  = (integer)(substr ($date , 6 , 2 ));
        $dt->day    = (integer)(substr ($date , 8 , 2 ));  

        $serviceId =DB::table('services')->orderBy('duration', 'asc')->pluck('name', 'id');
        if (count($serviceId)==0) {
            return Response()->json([
                'warning'=>'No hay servicios disponibles actualmente.'
                ]);
        }
        $firtsService=DB::table('services')->orderBy('duration', 'asc')->first();
        $availableTime= $this->getTimeAvailable($firtsService,$dt);
        if (count($availableTime)==0) {
            return Response()->json([
                'message'=>'No hay citas diponibles en este día.'
                ]);
        }
 
            if ($isAdmin) {
                return view('appointment.add')->with('serviceId',$serviceId)->with('time_start',$availableTime)->with('userId',$userId)->render();
            }else {
               return view('appointment.add')->with('serviceId',$serviceId)->with('time_start',$availableTime)->render();
            }
         
       } catch (Exception $e ) {
       }
    }
    
    public function userIsAdmin(){
        if (Auth::check()) {
                return (Auth::user()->role_id ==1 );
        }
        return false;
    }
    public function getConcatenateUsers(){
        try {
            return User::select(DB::raw("CONCAT(name,' ',firstName,' ',lastName) AS name"),'id')->pluck('name', 'id');
        } catch (Exception $e) {
            throw $e;
        }
        
    }
public function edit($id,Request $request){
    
        try {
            $isAdmin=$this->userIsAdmin();
            
            $date=Carbon::now();
            $open=Schedule::find(1);//Take close time
            $closeTime=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->end , 0 , 2 )), (integer)(substr ($open->end , 3 , 2 )), (integer)(substr ($open->end , 6 , 2 )));

            $appointment=Appointment::find($id);
           
            $serviceId =DB::table('services')->pluck('name', 'id');
            $firtsService=Services::find($appointment->serviceId);
            $dt=Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start);
            // ($date>=$closeTime && $date->toDateString()==$dt->toDateString()) {
            //    return Response()->json(['warning'=>'No se puede agregar ni actualizar más citas por el día de hoy.']);
            //}
            $isPassDay=$this->isLastDays($dt);
            $availableTime=null;
                if (($isPassDay==true) && $isAdmin || (Auth::user()->id==$appointment->userId && ($isPassDay==true))) {
                    if($isAdmin)
                        $userId =  User::select(DB::raw("CONCAT(name,' ',firstName,' ',lastName) AS name"),'id')->where('id',$appointment->userId)
                                        ->pluck('name', 'id');
                        $availableTime= array_add($availableTime,$dt->toTimeString(),$dt->toTimeString());
                }else{
                    if($isAdmin)
                        $userId =$this->getConcatenateUsers();
                     $availableTime= $this->getTimeAvailable($firtsService,$dt,$appointment);
                }
            $appointment->start=$dt->toTimeString();
                        if ($isAdmin) {
                            return view('appointment.edit',['appointment'=>$appointment])
                            ->with('serviceId',$serviceId)
                                ->with('time_start',$availableTime)
                                    ->with('passDay',$isPassDay)
                                        ->with('userId',$userId)->render();
                        }else {
                           return view('appointment.edit',['appointment'=>$appointment])
                                ->with('serviceId',$serviceId)
                                    ->with('time_start',$availableTime)
                                        ->with('passDay',$isPassDay)->render();
                        }
            
        } catch (Exception $e) {
           return response()->json(["message"=>"Lo sentimos,no se ha logrado cargar los datos de la cita"]);
        }
    }
    
    public function editRestriction($id,Request $request){
    
        try {
            $restriction=Appointment::find($id);
            $dt=Carbon::createFromFormat('Y-m-d H:i:s', $restriction->start);
            $isPassDay=$this->isLastDays($dt);
            return view('appointment.edit-block',['restriction'=>$restriction])->with('passDay',$isPassDay)->render();
            
        } catch (Exception $e) {
           return response()->json(["message"=>"Lo sentimos,no se ha logrado cargar los datos de la restricción"]);
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
            $Appointment->color ="#68B0AB" ;
            $Appointment->userId = $request->userId;
            if ($this->ckeckIndividualTime( $Appointment->start, $Appointment->end,true)) {
                $Appointment->save(); // code...
            }else {
                return response()->json(["error" => "reservado"]);
            }
           
            $user=User::find($request->userId);
            //Send notification to the user
            $user->notify(new SuccessAppointment($Appointment->start));
            return response()->json(["message" => "La cita a sido reservada correctamente."]);
        } catch (Exception $e) {
            return response()->json(["message" => "Lo sentimos, ha ocurrido un error al procesar su reservación."]);
            }
    }
     public function addRestrictionHour(){
         try {
             return view('appointment.block-hours');
         } catch (Exception $e ) {
              return response()->json(["message" => "Lo sentimos, ha ocurrido un error al procesar su solicitud."]);
         }
     }
      public function saveRestrictionHour(Request $request){
        try {
            //Add the time of end the service
            $Appointment = new Appointment();
            $Appointment->title = $request->title;
            $Appointment->start = $request->date_start ;
            $Appointment->end=  $request->date_end ;;
            $Appointment->color ="#657963" ;
            $Appointment->userId = $request->userId;
             if ($this->ckeckIndividualTime( $Appointment->start, $Appointment->end,true)) {
                $Appointment->save(); // code...
            }else {
                return response()->json(["error" => "reservado"]);
            }
           
            return response()->json(["message" => "Se han bloqueado las horas seleccionadas exitosamente."]);
        } catch (Exception $e) {
            return response()->json(["message" => "Lo sentimos, ha ocurrido un error al procesar su reservación."]);
            }
    }
     public function editRestrictionHour(Request $request){
        try {
            
          
            //Add the time of end the service
            $Appointment = Appointment::find($request->id);
            $Appointment->title = $request->title;
            $Appointment->start = $request->date_start ;
            $Appointment->end=  $request->date_end ;;
            $Appointment->color ="#657963" ;
            $Appointment->userId = $request->userId;
            $Appointment->save();
            return response()->json(["message" => "Actualixación realizada exitosamente."]);
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
            $Appointment->userId=$request->userId;
            $Appointment->end=  $end;
            $Appointment->color ="#68B0AB" ;
            $Appointment->save();
            
            $user=User::find($request->userId);
            //Send notification to the user
            $user->notify(new SuccesEditAppointment($Appointment->start));
            
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
        $temptime=$Appointment->start;
        $user=User::find($Appointment->userId);
        $Appointment->delete();
        
        $user->notify(new SuccesDeleteAppointment($temptime));
    
        return Response()->json([
            'message'   =>  'Cita cancelada correctamente.'
        ]);
        
    } catch (Exception $e ) {
        return Response()->json([
                'message'   =>  'Lo sentimos, ha ocurrido un error al cancelar su cita.'
            ]);
    }
        
    
    } 
    public function destroyRestriction($id){
        try {
        $restriction = Appointment::find($id);
        if($restriction == null)
            return Response()->json([
                'message'   =>  'Lo sentimos, no se ha encontrado los rangos seleccionados.'
            ]);

        $restriction->delete();

        return Response()->json([
            'message'   =>  'Bloqueo borrado correctamente.'
        ]);
        
    } catch (Exception $e ) {
        return Response()->json([
                'message'   =>  'Lo sentimos, ha ocurrido un error al eliminar las horas bloqueadas.'
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
        $openTime=$this->getOpenCloseTime($date,1);
        
        $lunch=Schedule::find(2);//The lunch time
        $startLunch=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($lunch->start , 0 , 2 )), (integer)(substr ($lunch->start , 3 , 2 )), (integer)(substr ($lunch->start , 6 , 2 )));
        $endLunch=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($lunch->end , 0 , 2 )), (integer)(substr ($lunch->end , 3 , 2 )), (integer)(substr ($lunch->end , 6 , 2 )));

        $closeTime=$this->getOpenCloseTime($date,2);
        
        $actualDate=Carbon::now();
        
        $initialTime=null;
        $endTime=null   ;
        if ($this->isActualDate($actualDate,$date)&& $actualDate>$openTime) {
            $initialTime=Carbon::now();
            $initialTime->addMinutes(5);//Add five minutes, to no reserve on actual time
            $endTime=Carbon::now();
            $endTime->addMinutes(5);
            
        }else{
        $initialTime=$this->getOpenCloseTime($date,1);
        $endTime=$this->getOpenCloseTime($date,1);
            
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
                if ($appointments[$i]->start==($initialTime->toDateString().' '.$initialTime->toTimeString())
                    ||($appointments[$i]->start<$endTime && $appointments[$i]->start>$initialTime)
                    ||($appointments[$i]->end<$endTime && $appointments[$i]->end>$initialTime)
                    ) {
                    $initialTime=Carbon::createFromFormat('Y-m-d H:i:s', $appointments[$i]->end);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                    //Se actualiza el periodo de la cita 
                    $endTime=Carbon::createFromFormat('Y-m-d H:i:s', $appointments[$i]->end);
                    $endTime=$this->addServiceTime($service,$endTime);
                }
           }//end for
           if ((($endTime>$startLunch && $initialTime<$endLunch)|| $initialTime==$startLunch)&&($date->dayOfWeek != Carbon::SATURDAY)) {
                        $initialTime=Carbon::createFromFormat('Y-m-d H:i:s', $endLunch);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                        //Se actualiza el periodo de la cita 
                        $endTime=Carbon::createFromFormat('Y-m-d H:i:s', $endLunch);
                        $endTime=$this->addServiceTime($service,$endTime);
                       
                    }else{
             if ($endTime<=$closeTime) {
               
                $this->timeAvailables= array_add($this->timeAvailables,$initialTime->toTimeString(), $initialTime->toTimeString());
                //$initialTime=Carbon::createFromFormat('Y-m-d H:i:s' , $endTime);//La hora en que podria ininiciar una citas es en la hora que finaliza la anterior
                $initialTime->addMinutes(15);
                $endTime=Carbon::createFromFormat('Y-m-d H:i:s', $initialTime);
                $endTime=$this->addServiceTime($service,$endTime);
          }}
        }//endWhile
        return $this->timeAvailables;
    }
    //Get open and close time, if option ==1 return open time and 2 return close time
    public function getOpenCloseTime($date,$option){
         if($date->dayOfWeek != Carbon::SATURDAY)
            $open=Schedule::find(1);//Take the open schedule
            else
              $open=Schedule::find(3);
        if ($option==1) {
            return Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->start , 0 , 2 )), (integer)(substr ($open->start , 3 , 2 )), (integer)(substr ($open->start , 6 , 2 )));
        
        }else{
            return  Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($open->end , 0 , 2 )), (integer)(substr ($open->end , 3 , 2 )), (integer)(substr ($open->end , 6 , 2 )));
        
        }
        
    }
    public function ckeckIndividualTime($start,$end,$isLocal=false){
        $actualDate=Carbon::now();
        $initialTime= Carbon::createFromFormat('Y-m-d H:i:s',$start);
        $endTime =Carbon::createFromFormat('Y-m-d H:i:s',$end);
        $date=$initialTime;
     
        $openTime=$this->getOpenCloseTime($date,1);
        $closeTime=$this->getOpenCloseTime($date,2);
        if ($initialTime<$actualDate) {
             return response()->json(["available" => false,"message"=>"No puede se puede bloquear horas pasadas"]);
        }
        if ($initialTime<$openTime  || $endTime>$closeTime ) {
             return response()->json(["available" => false,"message"=>"Seleccione un rango donde la hora de inicio sea mayor a la hora de abrir el local y menor al de cerrar"]);
        }
        $lunch=Schedule::find(2);//The lunch time
        $startLunch=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($lunch->start , 0 , 2 )), (integer)(substr ($lunch->start , 3 , 2 )), (integer)(substr ($lunch->start , 6 , 2 )));
        $endLunch=Carbon::create(($date->year),($date->month),($date->day),(integer)(substr ($lunch->end , 0 , 2 )), (integer)(substr ($lunch->end , 3 , 2 )), (integer)(substr ($lunch->end , 6 , 2 )));
        
          $appointments=DB::table('appointments')
            ->orderBy('start')
                    ->where('start', 'like','%'. $initialTime->toDateString().'%')
                        ->get();
                for ($i = 0; $i < $appointments->count(); $i++) {//$appointments[$i]->start
                if($appointments[$i]->start==($initialTime->toDateString().' '.$initialTime->toTimeString())
                ||($appointments[$i]->start<$endTime && $appointments[$i]->start>$initialTime)
                ||($appointments[$i]->end<$endTime && $appointments[$i]->end>$initialTime)
                ){
                    if(!$isLocal)
                        return response()->json(["available" => false,"message"=>"El bloque seleccionado choca con alguna de las reservas existentes"]);
                        else
                            return false;
                }
               }//end for
           if ((($endTime>$startLunch && $initialTime<$endLunch)|| $initialTime==$startLunch)&&($date->dayOfWeek != Carbon::SATURDAY)) {
                    if(!$isLocal)
                        return response()->json(["available" => false,"message"=>"El bloque seleccionado choca con la hora de almuerzo"]);
                        else
                            return false;
                    }else{
             if ($endTime<=$closeTime) {
                  if(!$isLocal)
                    return response()->json(["available" => true,"message"=>"El bloque puede ser bloqueado"]);
                    else
                            return true;
          }}
    }
    
    public function isActualDate($actualDate,$selectedDate){
        return ($actualDate->toDateString()==$selectedDate->toDateString());

    }
    public function isLastDays($selectedDate){
        $actualDate=Carbon::now();
        return ($actualDate>$selectedDate);

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
