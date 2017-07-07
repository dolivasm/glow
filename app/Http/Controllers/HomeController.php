<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Schedule;

use App\Mail\ContactForm;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('sentryContext');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $attentionSchedule = Schedule::find(1);
        $lunchSchedule = Schedule::find(2);
        
        $satSchedule = Schedule::find(3);
        $schedule2 = "Sábado ". $satSchedule->start ." - ". $satSchedule->end;
        
        $schedule = "Lun-Vie ". $attentionSchedule->start . " - ". $lunchSchedule->start ." | ". $lunchSchedule->end ." - ". $attentionSchedule->end;
        
        $news = DB::table('news')->orderBy('updated_at', 'desc')->take(4)->get();
        return view('home')->with('news',$news)->with('schedule',$schedule)->with('schedule2', $schedule2);
    }
   
    public function contact() {
        $attentionSchedule = Schedule::find(1);
        $lunchSchedule = Schedule::find(2);
        
        $satSchedule = Schedule::find(3);
        $schedule2 = "Sábado ". $satSchedule->start ." - ". $satSchedule->end;
        
        $schedule = "Lun-Vie ". $attentionSchedule->start . " - ". $lunchSchedule->start ." | ". $lunchSchedule->end ." - ". $attentionSchedule->end;
        
        return view('contact')->with('schedule',$schedule)->with('schedule2', $schedule2);
    }
    
    public function sendContactEmail(Request $request) {
        try {
            \Mail::to('clinica.glow.cr@gmail.com')->send(new ContactForm($request));
            return response()->json(["message" => "Consulta enviada correctamente."]);
        } catch (Exception $e) {
            return response()->json(["error" => "Consulta no enviada."]);
        }
        
    }
    
     public function abaut(){
        $attentionSchedule = Schedule::find(1);
        $lunchSchedule = Schedule::find(2);
        
        $satSchedule = Schedule::find(3);
        $schedule2 = "Sábado ". $satSchedule->start ." - ". $satSchedule->end;
        
        $schedule = "Lun-Vie ". $attentionSchedule->start . " - ". $lunchSchedule->start ." | ". $lunchSchedule->end ." - ". $attentionSchedule->end;
        
        return view('abaut')->with('schedule',$schedule)->with('schedule2', $schedule2);
    }
}
