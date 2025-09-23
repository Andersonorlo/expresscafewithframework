<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;



class LoginTest extends DuskTestCase
{
    public function testLoginWithValidCredentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->waitFor('#email', 5)
                ->type('#email', 'andersondev@expresscafe.com')
                ->type('#password', '123456')
                ->press('Ingresar')
                ->waitForLocation('/usuario', 10)
                ->assertPathIs('/usuario')
                ->screenshot('login-usuario');
        });
    }
}
