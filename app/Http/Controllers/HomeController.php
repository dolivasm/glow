<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index()
    
    {
        $news = DB::table('news')->orderBy('updated_at', 'desc')->take(4)->get();
        return view('home')->with('news',$news);
    }
   
    public function contact(){
        return view('contact');
    }
     public function abaut(){
        return view('abaut');
    }
}
