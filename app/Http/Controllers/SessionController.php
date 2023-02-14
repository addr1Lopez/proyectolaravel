<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        //dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {

            $empleado = Empleado::where('email', $request->email)->first();
            $time = date("H:i:s");
            $time = date("H:i:s", strtotime($time . "+1 hour"));

            if ($empleado->tipo === 0) {
                 session(['administrador' => $time]);
                return redirect()->route('listaTareas');
            } else {
                session(['operario' => $empleado->role]);
                session(['hora_login' => $time]);
                return redirect()->route('listarTareasOperario'); //poner listaTareasOperarios
            }
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Email o contraseña incorrectos']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}