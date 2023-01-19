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

//Route::get('/formularioEmpleado', 'App\Http\Controllers\ControllerEmpleado')->name('formularioEmpleado'); 
Route::get('/formularioEmpleado', ControllerEmpleado::class)->name('formularioEmpleado');
Route::post('formularioEmpleado',  [ControllerEmpleado::class, 'validacionInsertar']);

Route::get('/formularioCliente', ControllerCliente::class)->name('formularioCliente');
Route::post('formularioCliente', [ControllerCliente::class, 'validacionInsertar']);

Route::get('/formMantenimiento', ControllerMantenimiento::class)->name('formMantenimiento');
Route::post('formMantenimiento', [ControllerMantenimiento::class, 'validacionInsertar']);

//Route::get('/formularioTarea/{id}', ControllerTarea::class)->name('formularioTarea');
Route::get('/formularioTarea', ControllerTarea::class)->name('formularioTarea');
Route::post('formularioTarea', [ControllerTarea::class, 'validacionInsertar']);

Route::get('/listaTareas', [ControllerTarea::class, 'listar'])->name('listaTareas');
Route::get('/verDetalles/{tarea}', [ControllerTarea::class, 'verDetalles'])->name('verDetalles');


//Route::get('/confirmBorrarTarea', [ControllerTarea::class, 'confirmacionBorrar'])->name('confirmBorrarTarea');
//Route::get('/borrarTarea', [ControllerTarea::class, 'borrarTarea'])->name('borrarTarea');
Route::get('/confirmBorrarTarea/{tarea}', [ControllerTarea::class, 'confirmacionBorrar'])->name('confirmBorrarTarea');
Route::delete('/borrarTarea/{tarea}', [ControllerTarea::class, 'borrarTarea'])->name('borrarTarea');
