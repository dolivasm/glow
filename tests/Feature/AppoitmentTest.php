<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AppoitmentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     *  use WithoutMiddleware;
     */
      use WithoutMiddleware;
    public function testExample()
    {
        $this->assertTrue(true);
    }
     public function testNewsIndexTest()
    {
        $response = $this->get('/appointment');

        $response->assertStatus(200);
    }
    
         public function testPOSTAppointmetTest()
    {
        
        $response = $this->json('POST', '/appointment', ['userId' => '2',
            'serviceId'=>'2','date_start' => '2018-07-05','time_start'=>'10:00:00'
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'La cita a sido reservada correctamente.',
            ]);
    }
    
       public function testUpdateAppointmetTest()
    {
        $appointments = DB::table('appointments')->orderBy('updated_at', 'desc')->take(1)->get();
        foreach ($appointments as $value) {
            $id=$value->id;
        }

             $response = $this->json('PUT', '/appointment/'.$id, ['userId' => '2',
            'serviceId'=>'2','date_start' => '2018-07-05','start'=>'11:00:00'
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Cita actualizada correctamente.',
            ]);
    }
    
      public function testDeleteNewsTest(){
       $appointments = DB::table('appointments')->orderBy('updated_at', 'desc')->take(1)->get();
        foreach ($appointments as $value) {
            $id=$value->id;
        }
        $response = $this->json('DELETE', '/appointment/'.$id);
        
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Cita cancelada correctamente.',
            ]);
    }
     public function testappointmentLitsTest(){

        $response = $this->json('GET', 'appointmentList');
        
        $response
            ->assertStatus(200);
            
            assert(count($response)>0);
    }
}
