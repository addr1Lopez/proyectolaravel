<?php

use Illuminate\Support\Facades\Route;

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

//Route::view('/', 'formRegEmpleado');
Route::get('/formRegEmpleado', 'App\Http\Controllers\ControllerFormRegEmpleado')->name('formRegEmpleado');
Route::post('formRegEmpleado', 'App\Http\Controllers\DatosFormRegEmpleado@Validation');

Route::get('/formRegCliente', 'App\Http\Controllers\ControllerFormRegCliente')->name('formRegCliente');
Route::post('formRegCliente', 'App\Http\Controllers\DatosFormRegCliente@Validation');

Route::get('/formMantCliente', 'App\Http\Controllers\ControllerFormMantCliente')->name('formMantCliente');
Route::post('formMantCliente', 'App\Http\Controllers\DatosFormMantCliente@Validation');

