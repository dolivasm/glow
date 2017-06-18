<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class LoginTest extends TestCase
{
    //use DatabaseTransactions;

 public function testLogin()
    {
       $response = $this->call('POST','login', ['username'=>'daes','password' => 'daelsa'
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'ANUNCIO ACTUALIZADO CORRECTAMENTE',
            ]);
    }
}
