<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Empleado;

class RutaVariosTest extends TestCase
{
    public function test_login()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/login'
        $response = $this->get(route('login'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'login' fue cargada
        $response->assertViewIs('login');
    }

    public function test_formularioPass()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formularioPass'
        $response = $this->get(route('formularioPass'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formularioPass' fue cargada
        $response->assertViewIs('formularioPass');
    }

    public function test_editarCuenta()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/editarCuenta'
        $response = $this->get(route('editarCuenta', ['empleado' => 7]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'editarTarea' fue cargada
        $response->assertViewIs('miCuenta');

        // Verificamos que la vista contiene una variable llamada 'tarea'
        $response->assertViewHas('empleado');
    }

}