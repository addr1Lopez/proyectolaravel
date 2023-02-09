<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTarea;
use App\Http\Controllers\ControllerEmpleado;
use App\Http\Controllers\ControllerCuotas;
use App\Http\Controllers\ControllerCliente;
use App\Http\Controllers\ControllerRemesa;
use App\Http\Controllers\SessionController;


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

// LOGIN

Route::get('/', function () {
    return view('login');
});

// Iniciar sesion
Route::post('/', [SessionController::class, 'login'])->name('login');

// Cerrar sesion
Route::post('logout', [SessionController::class, 'logout'])->name('logout');


// EMPLEADO --------------------------------------------------------------------------------------------------------------------

// Insertar
Route::get('/formularioEmpleado', ControllerEmpleado::class)->name('formularioEmpleado');
Route::post('formularioEmpleado',  [ControllerEmpleado::class, 'validacionInsertar']);

// Listar
Route::middleware(['administrador'])->group(function () {
    Route::get('/listaEmpleados', [ControllerEmpleado::class, 'listar'])->name('listaEmpleados');
});


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
Route::get('/formMantenimiento', ControllerCuotas::class, 'formMantenimiento')->name('formMantenimiento');
Route::post('formMantenimiento', [ControllerCuotas::class, 'validarCuotaExcepcional']);

Route::get('/formularioRemesa', ControllerRemesa::class, 'formularioRemesa')->name('formularioRemesa');
Route::post('formularioRemesa', [ControllerRemesa::class, 'validacionInsertarRemesa']);

Route::get('/formularioCuota', ControllerCuotas::class, 'formularioCuota')->name('formularioCuota');
Route::post('formularioCuota', [ControllerCuotas::class, 'validarCuotaExcepcional']);

// Listar
Route::get('/listaCuotas', [ControllerCuotas::class, 'listar'])->name('listaCuotas');

// Borrar
Route::get('/confirmBorrarCuota/{cuota}', [ControllerCuotas::class, 'confirmacionBorrar'])->name('confirmBorrarCuota');
Route::delete('/borrarCuota/{cuota}', [ControllerCuotas::class, 'borrarCuota'])->name('borrarCuota');

// Modificar
Route::get('/editarCuota/{cuota}', [ControllerCuotas::class, 'editarCuota'])->name('editarCuota');
Route::put('/editarCuota/{cuota}', [ControllerCuotas::class, 'actualizarCuota'])->name('actualizarCuota');

// TAREA --------------------------------------------------------------------------------------------------------------------

// Insertar
Route::get('/formularioTarea', ControllerTarea::class)->name('formularioTarea');
Route::post('formularioTarea', [ControllerTarea::class, 'validacionInsertar']);

// Listar
Route::middleware(['auth'])->group(function () {
    Route::get('/listaTareas', [ControllerTarea::class, 'listar'])->name('listaTareas');
});

Route::get('/verDetalles/{tarea}', [ControllerTarea::class, 'verDetalles'])->name('verDetalles');

// Borrar
Route::get('/confirmBorrarTarea/{tarea}', [ControllerTarea::class, 'confirmacionBorrar'])->name('confirmBorrarTarea');
Route::delete('/borrarTarea/{tarea}', [ControllerTarea::class, 'borrarTarea'])->name('borrarTarea');

// Modificar
Route::get('/editarTarea/{tarea}', [ControllerTarea::class, 'editar'])->name('editarTarea');
Route::put('/editarTarea/{tarea}', [ControllerTarea::class, 'actualizar'])->name('actualizar');

// Completar
// Hay que poner el middleware en mas sitios
Route::get('/completarTarea/{tarea}', [ControllerTarea::class, 'editarCompletar'])->middleware('comprobarTareaEmpleado')->name('completarTarea');
Route::put('/completarTarea/{tarea}', [ControllerTarea::class, 'completarTarea'])->name('completarTarea');
