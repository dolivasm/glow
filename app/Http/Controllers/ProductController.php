<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Schedule;
use App\Helpers\ImageHelper;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
      public function __construct()
    {
        $this->middleware('sentryContext');
    }
    private $imgDefault="img/products/img-default.jpg";
    private $destinationPath = 'img/products/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attentionSchedule = Schedule::find(1);
        $lunchSchedule = Schedule::find(2);
        
        $satSchedule = Schedule::find(3);
        $schedule2 = "Sábado ". $satSchedule->start ." - ". $satSchedule->end;
        
        $schedule = "Lun-Vie ". $attentionSchedule->start . " - ". $lunchSchedule->start ." | ". $lunchSchedule->end ." - ". $attentionSchedule->end;
        
        return  view('products.products')->with('schedule',$schedule)->with('schedule2', $schedule2);
    }
    
    public function products_detail()
    
    {
        try {
            $products = Product::orderBy('updated_at', 'desc')->get(['id', 
                            'name', 
                            'description', 
                            'imageUrl', 
                            'created_at',
                            'updated_at',
                            'price']);
            return  view('products.products-detail',compact('products'))->render();
        } catch (Exception $e) {
            return "Ha sucedido un error con el siguiente mensaje: ".$e->getMessage();
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    
    try {
            return view('products.add-products')->render();
        } catch (Exception $e ) {
        }
            
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
             $imageHelper=new ImageHelper();
            //if the user insert an image we get it
            if (isset($_FILES['imageUrl'])) {
                $productImageUrl = ($this->destinationPath.$imageHelper->makeName().'.'. pathinfo($_FILES['imageUrl']['name'], PATHINFO_EXTENSION));
            }else {
                //but, if the user not insert an image, we insert one by default
                $productImageUrl=$this->imgDefault;
            }
            
            $product = new Product(array(
                'name'=> ($request['name']),     
                'description'=>($request['description']),
                'price'=>($request['price']),
                'imageUrl'=> $productImageUrl,
              ));
    
            $product->save();
            //We save the the image only if the user insert once
           if (isset($_FILES['imageUrl'])) {
                move_uploaded_file($_FILES['imageUrl']['tmp_name'], $productImageUrl);
            }
           return response()->json(["message" => "PRODUCTO AGREGADO CORRECTAMENTE."]);
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
    public function edit($id)
    {
        try {
            $products=Product::find($id);
            return view('products.edit-products',['products'=>$products])->render();
            
        } catch (Exception $e) {
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
        $product=Product::findOrFail($id);
        $product->delete();
        //Delete the image from the server is difereent than the default.
        if ($product->imageUrl!=$this->imgDefault) {
            File::delete($product->imageUrl);
        }
        return response()->json(["message"=>"BORRADO CORRECTAMENTE"]);
            
        } catch ( \Illuminate\Database\QueryException $e) {
        return response()->json(["error" => "Lo sentimos, ha ocurrido un error al intentar eliminar el producto. El error podría 
        tratarse porque el producto esta siendo utilizado en otra sección."]);
        }
    }
    
    public function updateProducts(ProductRequest $request)
    {
        
        try {
                $id=($request['id']);
                $products =Product::find($id);
                $oldImage=$products->imageUrl;
                $imageHelper=new ImageHelper();
                  //if the user insert an image we get it
                 if (isset($_FILES['imageUrl'])) {
                    $productImageUrl = ($this->destinationPath.$imageHelper->makeName().'.'. pathinfo($_FILES['imageUrl']['name'], PATHINFO_EXTENSION));
                 }else{
                    //but, if the user not insert an image, we insert one by default
                    $productImageUrl=$oldImage;
                }
               
                
                $products->name=($request['name']);  
                $products->description=($request['description']);
                $products->price=($request['price']);
                
                $products->imageUrl=$productImageUrl;
                $products->save();
                
                if (isset($_FILES['imageUrl'])) {
                    move_uploaded_file($_FILES['imageUrl']['tmp_name'], $productImageUrl);
                    
                    if ($oldImage!=$this->imgDefault) {
                       File::delete($oldImage);
                    }
                    
                }
                return response()->json(["message" => "PRODUCTO ACTUALIZADO CORRECTAMENTE."]); 
        }catch (Exception $e) {
            return $e;
        }
       
    }
    
    public function search($value)
    {
        try {
             $products = DB::table('products')
                ->where('name', 'like','%'. $value.'%')
                ->orWhere('description','like','%'. $value.'%')
                ->orderBy('updated_at', 'desc')->get();

            return  view('products.products-detail',compact('products'))->render();
        } catch (Exception $e) {
            return $e;
        }
       
    }
}
