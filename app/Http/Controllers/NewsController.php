<?php
use Illuminate\Http\UploadedFile;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Helpers\ImageHelper;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminUsers')->except('index','news_detail','search');
        $this->middleware('sentryContext');
    }
    private $imgDefault="img/news/img-default.png";
    private $destinationPath = 'img/news/';
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return  view('news.news-index');
    }
    
    public function news_detail(){
        try {
             $news = DB::table('news')->orderBy('updated_at', 'desc')->get();
            return  view('news.news-detail',compact('news'))->render();
        } catch (Exception $e) {
            return response()->json(["error"=>"Lo sentimos, no se a podido consultar los anuncios existentes."]);
            }
       
    }
    /**
     * Show the news serched by the users.
     */
    
    public function search($value){
        try {
             $news = DB::table('news')
                ->where('title', 'like','%'. $value.'%')
                ->orWhere('description','like','%'. $value.'%')
                ->orderBy('updated_at', 'desc')->get();

            return  view('news.news-detail',compact('news'))->render();
        } catch (Exception $e) {
            return response()->json(["error"=>"Lo sentimos, no se a podido consultar tus datos de busqueda"]);return $e;
        }
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('news.add-news')->render();
        } catch (Exception $e ) {
            return response()->json(["error"=>"Lo sentimos, no se ha logrado cargar la sección para agregar anuncios"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    { 
        try {
             $imageHelper=new ImageHelper();
            //if the user insert an image we get it
            if (isset($_FILES['imageUrl'])) {
                $newsImageUrl = ($this->destinationPath.$imageHelper->makeName().'.'. pathinfo($_FILES['imageUrl']['name'], PATHINFO_EXTENSION));
            }else {
                //but, if the user not insert an image, we insert one by default
                $newsImageUrl=$this->imgDefault;
            }
            
            $News = new News(array(
                'title'=> ($request['title']),     
                'description'=>($request['description']),
                'imageUrl'=> $newsImageUrl,
              ));
    
            $News->save();
            //We save the the image only if the user insert once
           if (isset($_FILES['imageUrl'])) {
                move_uploaded_file($_FILES['imageUrl']['tmp_name'], $newsImageUrl);
            }
           return response()->json(["message" => "ANUNCIO AGREGADO CORRECTAMENTE."]);
        } catch (Exception  $e) {
            return response()->json(["error"=>"Lo sentimos, no se a logrado guardar correctamente el anuncio"]);
        }

    }
        //
    

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
        try {
            $news=News::find($id);
            return view('news.edit-news',['news'=>$news])->render();
            
        } catch (Exception $e) {
           return response()->json(["error"=>"Lo sentimos,no se ha logrado cargar los datos de este anuncio"]);
        }
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateNews(NewsRequest $request)
    {
        
        try {
                $id=($request['id']);
                $news =News::find($id);
                $oldImage=$news->imageUrl;
                $imageHelper=new ImageHelper();
                  //if the user insert an image we get it
                 if (isset($_FILES['imageUrl'])) {
                    $newsImageUrl = ($this->destinationPath.$imageHelper->makeName().'.'. pathinfo($_FILES['imageUrl']['name'], PATHINFO_EXTENSION));
                 }else{
                    //but, if the user not insert an image, we insert one by default
                    $newsImageUrl=$oldImage;
                }
               
                
                $news->title=($request['title']);   
                $news->description=($request['description']);
                $news->imageUrl=$newsImageUrl;
                $news->save();
                //Save an imgage if the uer selec one
                if (isset($_FILES['imageUrl'])) {
                    move_uploaded_file($_FILES['imageUrl']['tmp_name'], $newsImageUrl);
                    //We delete the last image if the old is diferent of default phath
                    if ($oldImage!=$this->imgDefault) {
                       File::delete($oldImage);
                    }
                    
                }
                return response()->json(["message" => "ANUNCIO ACTUALIZADO CORRECTAMENTE"]); 

        }catch (Exception $e) {
            return response()->json(["error"=>"Lo sentimos, no se a podido actualizar el anuncio"]);
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
        $news=News::findOrFail($id);
        $news->delete();
        //Delete the image from the server is is difereent than the default.
        if ($news->imageUrl!=$this->imgDefault) {
            File::delete($news->imageUrl);
        }
        return response()->json(["message"=>"BORRADO CORRECTAMENTE"]);
            
        } catch ( \Illuminate\Database\QueryException $e) {
        return response()->json(["error" => "Lo sentimos, ha ocurrido un error al intentar eliminar el anuncio. El error podría 
        tratarse porque el anuncio esta siendo utilizado en otra sección."]);
        }
    }
}
