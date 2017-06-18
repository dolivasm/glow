<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\News;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
class NewsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     use WithoutMiddleware;
     public function testNewsIndexTest()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }
     public function testCreateNoLogginTest()
    {
        $response = $this->get('/news/create');

        $response->assertStatus(200);
    }
     public function testNesDetailTest()
    {
        $response = $this->get('/newsDetail');

        $response->assertStatus(200);
    }
     public function testNewsFilterTest()
    {
        $response = $this->get('/filter-news/d');

        $response->assertStatus(200);
    }

      public function testPOSTNewsTest()
    {
        Storage::fake('avatars');
        $response = $this->json('POST', '/news', ['title' => 'Anuncio Pruebas de POST',
            'description'=>'Anuncio de pruebas de POST','imageUrl' => 'undefined'
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'ANUNCIO AGREGADO CORRECTAMENTE.',
            ]);
    }
    //You must pass an id of an image that exists, to be able to edit them
     public function testUpdateNewsTest()
    {
        $news = DB::table('news')->orderBy('updated_at', 'desc')->take(1)->get();
        foreach ($news as $value) {
            $id=$value->id;
        }
        $response = $this->json('POST', 'update-news', ['id'=>$id,'title' => 'Anuncio Pruebas Actualizar',
            'description'=>'Anuncio de pruebas actualizar','imageUrl' => 'undefined'
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'ANUNCIO ACTUALIZADO CORRECTAMENTE',
            ]);
    }
    
        public function testDeleteNewsNotExistingTest(){
        $response = $this->json('DELETE', '/news/0');
        
        $response
            ->assertStatus(404);
    }
    //An existing id must be placed for the test to pass correctly when you want to remove
      public function testDeleteNewsTest(){
        $news = DB::table('news')->orderBy('updated_at', 'desc')->take(1)->get();
        foreach ($news as $value) {
            $id=$value->id;
        }
        $response = $this->json('DELETE', '/news/'.$id);
        
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'BORRADO CORRECTAMENTE',
            ]);
    }
}
