<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Empleado;

class RutaClienteTest extends TestCase
{
    public function test_formularioCliente()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formularioCliente'
        $response = $this->get(route('formularioCliente'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formularioCliente' fue cargada
        $response->assertViewIs('formularioCliente');
    }

    public function test_listaClientes()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaClientes'
        $response = $this->get(route('listaClientes'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaClientes' fue cargada
        $response->assertViewIs('listaClientes');
    }

    public function test_confirmBorrarCliente()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/confirmBorrarCliente'
        $response = $this->get(route('confirmBorrarCliente', ['cliente' => 3]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'confirmBorrarCliente' fue cargada
        $response->assertViewIs('confirmBorrarCliente');

        // Verificamos que la vista contiene una variable llamada 'cliente'
        $response->assertViewHas('cliente');
    }

    
    public function test_formulario_Cliente()
    {
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        $response = $this->actingAs($user)
            ->post('cliente', [
                'cif' => 'J05230859',
                'nombre' => 'Mauricio Colmenero',
                'correo' => 'mauriciocolme@gmail.com',
                'telefono' => '637453212',
                'cuenta' => 'ES2421004953687281869836',
                'importe' => '567.0',
                'paises_id' => '016',
                'moneda' => 'USD',
            ]);

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response = $this->get(route('formularioCliente'));

        $response->assertStatus(200);

        $response->assertViewIs('formularioCliente');
    }
}
