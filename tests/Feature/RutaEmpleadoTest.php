<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Empleado;

class RutaEmpleadoTest extends TestCase
{
    public function test_formularioEmpleado()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formularioEmpleado'
        $response = $this->get(route('formularioEmpleado'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegCliente' fue cargada
        $response->assertViewIs('formularioEmpleado');
    }

    public function test_listaEmpleados()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaEmpleados'
        $response = $this->get(route('listaEmpleados'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaEmpleados' fue cargada
        $response->assertViewIs('listaEmpleados');
    }

    public function test_editarEmpleado()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/editarEmpleado'
        $response = $this->get(route('editarEmpleado', ['empleado' => 3]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'editarEmpleado' fue cargada
        $response->assertViewIs('editarEmpleado');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('empleado');
    }
    
    public function test_confirmBorrarEmpleado()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/confirmBorrarEmpleado'
        $response = $this->get(route('confirmBorrarEmpleado', ['empleado' => 3]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'confirmBorrarEmpleado' fue cargada
        $response->assertViewIs('confirmBorrarEmpleado');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('empleado');
    }
}
