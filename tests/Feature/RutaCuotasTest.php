<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Empleado;

class RutaCuotasTest extends TestCase
{
    public function test_formularioRemesa()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formularioRemesa'
        $response = $this->get(route('formularioRemesa'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formularioRemesa' fue cargada
        $response->assertViewIs('formularioRemesa');
    }

    public function test_formularioCuota()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formularioCuota'
        $response = $this->get(route('formularioCuota'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formularioCuota' fue cargada
        $response->assertViewIs('formularioCuota');
    }

    public function test_listaCuotas()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/mensajeBorrarCliente'
        $response = $this->get(route('listaCuotas', ['filtro' => 'SI']));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'mensajeBorrarCliente' fue cargada
        $response->assertViewIs('listaCuotas');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('cuotas');
    }

    public function test_editarCuota()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/editarCuota'
        $response = $this->get(route('editarCuota', ['cuota' => 7]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'editarCuota' fue cargada
        $response->assertViewIs('editarCuota');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('cuota');
    }
    
    public function test_confirmBorrarCuota()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/confirmBorrarCuota'
        $response = $this->get(route('confirmBorrarCuota', ['cuota' => 7]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'confirmBorrarCuota' fue cargada
        $response->assertViewIs('confirmBorrarCuota');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('cuota');
    }
}
