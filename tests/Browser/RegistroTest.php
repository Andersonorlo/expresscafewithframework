<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistroTest extends DuskTestCase
{
    public function testRegistroNuevoUsuario()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/registro')
                //[porque de acuerdo con JS name es la forma para post o get, por lo tanto en lugar de poner id uno por uno se hace la siguiente manera]
                ->waitFor('[name="nombre"]', 5)
                ->type('[name="nombre"]', 'Juan')
                ->type('[name="apellido"]', 'Pérez')
                ->type('[name="empresacliente"]', 'Expresscafe')
                ->type('[name="email"]', 'jperez@expresscafe.com')
                ->type('[name="celular"]', '3001234567')
                ->type('[name="direccion"]', 'Calle 123 #45-67')
                ->type('[name="codigopostal"]', '760001')
                ->type('[name="password"]', '123456')
                ->type('[name="cedula"]', '1234567890')
                ->press('Registrar')
                ->waitForLocation('/usuario', 10)
                ->assertPathIs('/usuario')
                ->screenshot('registro-exitoso');
        });
    }
}
