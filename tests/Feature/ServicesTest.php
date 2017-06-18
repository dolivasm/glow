<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
class ServicesTest extends TestCase
{
    use WithoutMiddleware;
    /**
    * For execute only this unit test use the next command "vendor/bin/phpunit --group testServices" in console without "" 
    */
    
    /**
     * A basic test example.
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * @group testServices
     */
     use WithoutMiddleware;
     public function testServicesIndexTest()
    {
        $response = $this->get('/services');

        $response->assertStatus(200);
    }


    /**
     * @group testServices
     */
    public function testCreateNoLogginTest()
    {
        $response = $this->get('/services/create');

        $response->assertStatus(200);
    }
    
    /**
     * @group testServices
     */
    public function testServicesDetailTest()
    {
        $response = $this->get('/servicesDetail');

        $response->assertStatus(200);
    }    
    
    /**
     * @group testServices
     */
     public function testServicesFilterTest()
    {
        $response = $this->get('/filter-services/dep');

        $response->assertStatus(200);
    }
    
    /**
     * @group testServices
     * @group add
     */
       public function testPOSTServicesTest()
       {
           Storage::fake('avatars');
           $price = 2500;
           $response = $this->json('POST', '/services', ['name' => 'Servicio Pruebas de POST',
               'description'=>'Servicio de pruebas de POST', 'price' => $price,'imageUrl' => 'undefined'
               ]);

           $response
           ->assertStatus(200)
               ->assertJson([
                   'message' => 'SERVICIO AGREGADO CORRECTAMENTE.',
               ]);
       }
       
    /**
     * @group testServices
     * @group update
     */
       public function testUpdateServicesTest() {
          $services = DB::table('services')->orderBy('updated_at', 'desc')->take(1)->get();
          foreach ($services as $value) {
              $id=$value->id;
          }
          $price = 1000;
          $response = $this->json('POST', 'update-services', ['id'=>$id,'name' => 'Servicio Pruebas Actualizar',
              'description'=>'Servicio de pruebas actualizar','price' => $price ,'imageUrl' => 'undefined'
              ]);

          $response
              ->assertStatus(200)
          ->assertJson([
                  'message' => 'SERVICIO ACTUALIZADO CORRECTAMENTE',
              ]);
        }


   /**
     * @group testServices
     * @group del
     */
        public function testDeleteProductsNotExistingTest(){
        $response = $this->json('DELETE', '/services/0');
        
        $response
            ->assertStatus(404);
        }


   /**
     * @group testServices
     * @group del
     */
       public function testDeleteProductsTest(){
          $products = DB::table('services')->orderBy('updated_at', 'desc')->take(1)->get();
           foreach ($products as $value) {
               $id=$value->id;
           }
           $response = $this->json('DELETE', '/services/'.$id);
        
           $response
               ->assertStatus(200)
               ->assertJson([
                   'message' => 'BORRADO CORRECTAMENTE',
           ]);
       }


     
}
