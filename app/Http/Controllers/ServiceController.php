<?php
use Illuminate\Http\UploadedFile;
namespace App\Http\Controllers; //Nos permite definir la ubicación donde se encuentra la clase.

use Illuminate\Http\Request;
use App\Services; //Nos permite llamar a otras clases para poder utilizarlas
use Exception;
use App\Helpers\ImageHelper;
use App\Http\Requests\ServicesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    private $path='services';//Indica la carpeta de donde lee las vistas de services (Está dentro de resources views)
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $destinationPath = 'img/services/';
     private $imgDefault="img/news/img-default.png";
    public function index() //Lo utilizaremos para mostrar la página inicial
    {

        return view($this->path.'.services-index');
    }
    

    public function services_detail()
    
    {
        try {
             $services = DB::table('services')->orderBy('updated_at', 'desc')->get();
            return  view('services.services-detail',compact('services'))->render();
        } catch (Exception $e) {
            return "Ha sucedido un error con el siguiente mensaje: ".$e->getMessage();
        }
       
    }
    /**
     * Show the news serched by the users.
     */
    
    public function search($value)
    {
        try {
             $services = DB::table('services')
                ->where('name', 'like','%'. $value.'%')
                ->orWhere('description','like','%'. $value.'%')
                ->orderBy('updated_at', 'desc')->get();

            return  view('services.services-detail',compact('services'))->render();
        } catch (Exception $e) {
            return $e;
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Lo utilizaremos para mostrar el formulario de registro.
    {
        try {
            return view('services.add-services')->render();
        } catch (Exception $e ) {
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesRequest $request)// Este método es importante, lo usaremos para recuperar los datos escritos en el formulario y lo guardaremos en nuestra base de datos.
    {
        try {
             $imageHelper=new ImageHelper();
            //if the user insert an image we get it
            if (isset($_FILES['imageUrl'])) {
                $servicesImageUrl = ($this->destinationPath.$imageHelper->makeName().'.'. pathinfo($_FILES['imageUrl']['name'], PATHINFO_EXTENSION));
            }else {
                //but, if the user not insert an image, we insert one by default
                $servicesImageUrl=$this->imgDefault;
            }
            
            $Services = new Services(array(
                'name'=> ($_REQUEST['name']),     
                'description'=>($_REQUEST['description']),
                'price'=>($_REQUEST['price']),
                'imageUrl'=> $servicesImageUrl,
              ));
    
            $Services->save();
            //We save the the image only if the user insert once
           if (isset($_FILES['imageUrl'])) {
                move_uploaded_file($_FILES['imageUrl']['tmp_name'], $servicesImageUrl);
            }
           return response()->json(["message" => "SERVICIO AGREGADO CORRECTAMENTE. "]);
        } catch (Exception  $e) {
            return $e;
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

        try {
            $services=Services::find($id);
            return view('services.edit-services',['services'=>$services])->render();
            
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateServices(ServicesRequest $request)
    {
        
        try {
            
             if($request->ajax()){
                $id=($_REQUEST['id']);
                $services =Services::find($id);
                $oldImage=$services->imageUrl;
                $imageHelper=new ImageHelper();
                  //if the user insert an image we get it
                 if (isset($_FILES['imageUrl'])) {
                    $servicesImageUrl = ($this->destinationPath.$imageHelper->makeName().'.'. pathinfo($_FILES['imageUrl']['name'], PATHINFO_EXTENSION));
                 }else{
                    //but, if the user not insert an image, we insert one by default
                    $servicesImageUrl=$oldImage;
                }
               
                
                $services->name=($_REQUEST['name']);   
                $services->description=($_REQUEST['description']);
                $services->price=($_REQUEST['price']);
                
                $services->imageUrl=$servicesImageUrl;
                $services->save();
                //Save an imgage if the uer selec one
                if (isset($_FILES['imageUrl'])) {
                    move_uploaded_file($_FILES['imageUrl']['tmp_name'], $servicesImageUrl);
                    //We delete the last image if the old is diferent of default phath
                    if ($oldImage!=$this->imgDefault) {
                       File::delete($oldImage);
                    }
                    
                }
                return response()->json(["message" => "SERVICIO ACTUALIZADO CORRECTAMENTE"]); 
        }else{
            
            return response()->json([
                "error" => "No existe la página solicitada"
                ]);
            
        }
        }catch (Exception $e) {
            return $e;
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
        try {
        $services=Services::find($id);
        $services->delete();
        //Delete the image from the server is is difereent than the default.
        if ($services->imageUrl!=$this->imgDefault) {
            File::delete($services->imageUrl);
        }
        return response()->json(["message"=>"BORRADO CORRECTAMENTE"]);
            
        } catch ( \Illuminate\Database\QueryException $e) {
        return response()->json(["error" => "Lo sentimos, ha ocurrido un error al intentar eliminar el anuncio. El erro podría 
        tratarse porque el anuncio esta siendo utilizado en otra sección."]);
        }
    }
}
