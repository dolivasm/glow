<?php

namespace App\Http\Controllers; //Nos permite definir la ubicación donde se encuentra la clase.

use Illuminate\Http\Request;
use App\Services; //Nos permite llamar a otras clases para poder utilizarlas
use Exception;

class ServiceController extends Controller
{
    private $path='services';//Indica la carpeta de donde lee las vistas de services (Está dentro de resources views)
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //Lo utilizaremos para mostrar la página inicial
    {
        //Se trae todos los registros de Servicios
        $data= Services::all();
        
        //Se envian todos los registros a la vista
        return view($this->path.'.services',compact('data'));

                //return view("services.services");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Lo utilizaremos para mostrar el formulario de registro.
    {
        return view($this->path.'services');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)// Este método es importante, lo usaremos para recuperar los datos escritos en el formulario y lo guardaremos en nuestra base de datos.
    {
        try{    
            $services = new services();
            $services->name         = $request->name;
            $services->description  = $request->description;
            $services->price        = $request->price;
            $services->imageUrl     = "";
            
            $services->save();
            
            return redirect()->route('services.index');        
        
        }
        catch(Exception $e){
            return "Un error en -".$e->getMessage();
        }
        
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
    public function edit($id)//Con este método mostraremos el formulario de edición.
    {

        $editservices= Services::findOrFail($id);
        return view($this->path.'.services',compact('editservices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//Con este método editaremos el registro.
    {
        try{
        $updateservices= Services::findOrFail($id);
        $updateservices->name =$request->name;
        $updateservices->description =$request->description;
        $updateservices->price =$request->price;
        $updateservices->imageUrl ="";
        $updateservices->save();
        return redirect()->route('services.index');
        }
        catch(Exception $e){
            return "Error en - ".$e->getMessage;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Lo utilizaremos para eliminar a un Servicio.
    {
        try{
            $delService= Services::findOrFail($id);
            $delService->delete();
            return redirect()->route('services.index');    
            
        }
        catch(Exception $e){
            return "Error en - ".$e->getMessage;
        }
    }
}
