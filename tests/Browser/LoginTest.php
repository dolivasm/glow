<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
    //use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000')
                    ->assertSee('Glow');
        });
    }

   public function testForgetPassword()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/password/reset')
                    ->type('email','daniel.elizondo@ucrso.info')
                    ->click('#login-send')
                    ->assertSee('enviado por correo');
        });
    }
    public function testGoRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->clicklink('Registrarse')
                    ->assertSee('Registrarse');
        });
    }

    public function testErrorLogin()
    {
         $user = new User();
         $user->username="errorTest";
        $this->browse(function ($browser) use ($user) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->type('username', $user->username)
                    ->type('password', 'secret')
                    ->click('#login-send')
                    ->assertPathIs('/login');
        });
    }
     public function testSuccessLogin()
    {
         $user = new User();
         $user->username="daes";
        $this->browse(function ($browser) use ($user) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->type('username', $user->username)
                    ->type('password', 'daelsa')
                    ->click('#login-send')
                    ->assertPathIs('/home');
        });
    }

}
