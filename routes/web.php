<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTarea;
use App\Http\Controllers\ControllerEmpleado;
use App\Http\Controllers\ControllerMantenimiento;
use App\Http\Controllers\ControllerCliente;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// EMPLEADO --------------------------------------------------------------------------------------------------------------------

// Insertar
Route::get('/formularioEmpleado', ControllerEmpleado::class)->name('formularioEmpleado');
Route::post('formularioEmpleado',  [ControllerEmpleado::class, 'validacionInsertar']);

// Listar
Route::get('/listaEmpleados', [ControllerEmpleado::class, 'listar'])->name('listaEmpleados');

// Modificar
Route::get('/editarEmpleado/{empleado}', [ControllerEmpleado::class, 'editarEmpleado'])->name('editarEmpleado');
Route::put('/editarEmpleado/{empleado}', [ControllerEmpleado::class, 'actualizarEmpleado'])->name('actualizarEmpleado');

// Borrar
Route::get('/confirmBorrarEmpleado/{empleado}', [ControllerEmpleado::class, 'confirmacionBorrar'])->name('confirmBorrarEmpleado');
Route::delete('/borrarEmpleado/{empleado}', [ControllerEmpleado::class, 'borrarEmpleado'])->name('borrarEmpleado');

// CLIENTE ---------------------------------------------------------------------------------------------------------------------

// Insertar
Route::get('/formularioCliente', ControllerCliente::class)->name('formularioCliente');
Route::post('formularioCliente', [ControllerCliente::class, 'validacionInsertar']);

// Listar
Route::get('/listaClientes', [ControllerCliente::class, 'listar'])->name('listaClientes');

// Borrar
Route::get('/confirmBorrarCliente/{cliente}', [ControllerCliente::class, 'confirmacionBorrar'])->name('confirmBorrarCliente');
Route::delete('/borrarCliente/{cliente}', [ControllerCliente::class, 'borrarCliente'])->name('borrarCliente');

// MANTENIMIENTO --------------------------------------------------------------------------------------------------------------------

// Insertar
Route::get('/formMantenimiento', ControllerMantenimiento::class)->name('formMantenimiento');
Route::post('formMantenimiento', [ControllerMantenimiento::class, 'validacionInsertar']);

// Listar
Route::get('/listaCuotas', [ControllerMantenimiento::class, 'listar'])->name('listaCuotas');

// Borrar
Route::get('/confirmBorrarCuota/{cuota}', [ControllerMantenimiento::class, 'confirmacionBorrar'])->name('confirmBorrarCuota');
Route::delete('/borrarCuota/{cuota}', [ControllerMantenimiento::class, 'borrarCuota'])->name('borrarCuota');

// TAREA --------------------------------------------------------------------------------------------------------------------
    
// Insertar
Route::get('/formularioTarea', ControllerTarea::class)->name('formularioTarea');
Route::post('formularioTarea', [ControllerTarea::class, 'validacionInsertar']);

// Listar
Route::get('/listaTareas', [ControllerTarea::class, 'listar'])->name('listaTareas');
Route::get('/verDetalles/{tarea}', [ControllerTarea::class, 'verDetalles'])->name('verDetalles');

// Borrar
Route::get('/confirmBorrarTarea/{tarea}', [ControllerTarea::class, 'confirmacionBorrar'])->name('confirmBorrarTarea');
Route::delete('/borrarTarea/{tarea}', [ControllerTarea::class, 'borrarTarea'])->name('borrarTarea');

// Modificar
Route::get('/editarTarea/{tarea}', [ControllerTarea::class, 'editar'])->name('editarTarea');
Route::put('/editarTarea/{tarea}', [ControllerTarea::class, 'actualizar'])->name('actualizar');
