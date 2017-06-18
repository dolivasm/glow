<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class UserTest extends TestCase
{
    
    use WithoutMiddleware;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserIndex()
    {
        $response = $this->get('/users');
        $response->assertStatus(200);
    }
    
    public function testCreateUser()
    {
        $response = $this->get('/users/create');
        $response->assertStatus(200);
    }
    
    public function testEditUser()
    {
        $response = $this->get('/users/edit');///////

        $response->assertStatus(200);
    }
    
    public function testPOSTUser()
    {
        Notification::fake();
        $response = $this->json('POST', '/users', ['name' => 'Usuario',
            'firstName'=>'Prueba', 'lastName' => 'POST', 'birthday' => '1900-12-12',
            'username' => 'pruebaPost', 'email' => 'usuario@prueba.com',
            'phone' => '12345678', 'role_id' => '1', 'password' => bcrypt('abcd1234')
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'mensaje' => 'Usuario Creado Correctamente.',
                ]);
    }
    
    public function testUpdateUser()
    {
        Notification::fake();
        $users = DB::table('users')->orderBy('updated_at', 'desc')->take(1)->get();
        foreach ($users as $value) {
            $id=$value->id;
        }
        $response = $this->json('PUT', 'update-users', ['id'=> $id, 'name' => 'UsuarioActualizado',
            'firstName'=>'Prueba', 'lastName' => 'POST', 'birthday' => '1990-12-12',
            'username' => 'pruebaActualizar', 'email' => 'usuario@actualizado.com',
            'phone' => '12345678', 'role_id' => '1', 'password' => bcrypt('abcd1234')
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'mensaje' => 'Usuario Actualizado Correctamente',
            ]);
    }

   /**
    * public function testDeleteUser(){
        Notification::fake();
        $users = DB::table('users')->orderBy('updated_at', 'desc')->take(1)->get();
        foreach ($users as $value) {
            $id=$value->id;
        }
        $response = $this->json('DELETE', '/users/'.$id);
        
        $response
            ->assertStatus(200)
            ->assertJson([
                'mensaje' => 'Usuario borrado Correctamente',
            ]);
    }
    */
}
