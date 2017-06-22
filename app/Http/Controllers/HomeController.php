<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $news = DB::table('news')->orderBy('updated_at', 'desc')->take(4)->get();
        return view('home')->with('news',$news);
    }
   
    public function contact() {
        return view('contact');
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
        return view('abaut');
    }
}
