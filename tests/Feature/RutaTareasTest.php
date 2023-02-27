<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Empleado;

class RutaTareasTest extends TestCase
{
    public function test_formularioTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formularioTarea'
        $response = $this->get(route('formularioTarea'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formularioTarea' fue cargada
        $response->assertViewIs('formularioTarea');
    }

    public function test_formularioTareaClientes()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'alfredolopes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formularioTarea'
        $response = $this->get(route('formularioTareaClientes'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formularioTarea' fue cargada
        $response->assertViewIs('formularioTareaClientes');
    }

    public function test_listaTareas()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaTareas'
        $response = $this->get(route('listaTareas'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaTareas' fue cargada
        $response->assertViewIs('listaTareas');
    }

    public function test_editarTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/editarTarea'
        $response = $this->get(route('editarTarea', ['tarea' => 51]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'editarTarea' fue cargada
        $response->assertViewIs('editarTarea');

        // Verificamos que la vista contiene una variable llamada 'tarea'
        $response->assertViewHas('tarea');
    }

    public function test_confirmBorrarTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/confirmBorrarTarea'
        $response = $this->get(route('confirmBorrarTarea', ['tarea' => 51]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'confirmBorrarTarea' fue cargada
        $response->assertViewIs('confirmBorrarTarea');

        // Verificamos que la vista contiene una variable llamada 'tarea'
        $response->assertViewHas('tarea');
    }

    public function test_verDetalles()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'davidnunes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/verDetalles'
        $response = $this->get(route('verDetalles', ['tarea' => 51]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'verDetalles' fue cargada
        $response->assertViewIs('verDetalles');

        // Verificamos que la vista contiene una variable llamada 'tarea'
        $response->assertViewHas('tarea');
    }

    public function test_completarTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'alfredolopes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/completarTarea'
        $response = $this->get(route('completarTarea', ['tarea' => 52]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'completarTarea' fue cargada
        $response->assertViewIs('completarTarea');

        // Verificamos que la vista contiene una variable llamada 'tarea'
        $response->assertViewHas('tarea');
    }

    public function test_verDetallesOperario()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'alfredolopes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/verDetallesOperario'
        $response = $this->get(route('verDetallesOperario', ['tarea' => 52]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'verDetallesOperario' fue cargada
        $response->assertViewIs('verDetalles');

        // Verificamos que la vista contiene una variable llamada 'tarea'
        $response->assertViewHas('tarea');
    }

    public function test_listarTareasOperario()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'alfredolopes@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listarTareasOperario'
        $response = $this->get(route('listarTareasOperario'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listarTareasOperario' fue cargada
        $response->assertViewIs('listaTareas');
    }
}
