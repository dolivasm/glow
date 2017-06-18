<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Products;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class ProductsTest extends TestCase
{
    use WithoutMiddleware;
    
    public function testProductsIndexTest() {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }
     public function testCreateProductsTest() {
        $response = $this->get('/products/create');

        $response->assertStatus(200);
    }
    
    public function testProductsDetailTest() {
        $response = $this->get('/productsDetail');

        $response->assertStatus(200);
    }
    
    public function testProductsFilterTest() {
        $response = $this->get('/filter-products/aceit');

        $response->assertStatus(200);
    }

       public function testPOSTProductsTest(){
           Storage::fake('avatars');
           $price = 1000;
           $response = $this->json('POST', '/products', ['name' => 'Producto Pruebas de POST',
               'description'=>'Producto de pruebas de POST', 'price' => $price,'imageUrl' => 'undefined'
               ]);

           $response
           ->assertStatus(200)
               ->assertJson([
                   'message' => 'PRODUCTO AGREGADO CORRECTAMENTE.',
               ]);
       }
    

       public function testUpdateProductsTest() {
          $products = DB::table('products')->orderBy('updated_at', 'desc')->take(1)->get();
          foreach ($products as $value) {
              $id=$value->id;
          }
          $price = 1000;
          $response = $this->json('POST', 'update-products', ['id'=>$id,'name' => 'Anuncio Pruebas Actualizar',
              'description'=>'Producto de pruebas actualizar','price' => $price ,'imageUrl' => 'undefined'
              ]);

          $response
              ->assertStatus(200)
          ->assertJson([
                  'message' => 'PRODUCTO ACTUALIZADO CORRECTAMENTE.',
              ]);
      }
    
        public function testDeleteProductsNotExistingTest(){
        $response = $this->json('DELETE', '/products/0');
        
        $response
            ->assertStatus(404);
    }
    
       public function testDeleteProductsTest(){
          $products = DB::table('products')->orderBy('updated_at', 'desc')->take(1)->get();
           foreach ($products as $value) {
               $id=$value->id;
           }
           $response = $this->json('DELETE', '/products/'.$id);
        
           $response
               ->assertStatus(200)
               ->assertJson([
                   'message' => 'BORRADO CORRECTAMENTE',
           ]);
       }
}
