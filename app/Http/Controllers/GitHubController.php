<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;

class GitHubController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        //dd($user);

        $empleadoExist = Empleado::where('email', $user->email)->first();

        if ($empleadoExist) {
            // Si el usuario existe en la base de datos, podemos autenticarlo.
            Auth::login($empleadoExist);
            
            if ($empleadoExist->tipo === 0) {
                return redirect()->route('listaEmpleados');
            } else {
                return redirect()->route('listarTareasOperario');
            }
        } else {
            // Si el usuario no existe en la base de datos, podemos crear un nuevo registro para él.
            $empleado = new Empleado();
            $empleado->nombre = $user->name;
            $empleado->fechaAlta = (new \DateTime())->format('Y-m-d');
            $empleado->email = $user->email;
            $empleado->tipo = 1;
            //dd($empleado);
            $empleado->save();

            // Y luego autenticarlo.
            Auth::login($empleado);

            // Finalmente, redirigimos al usuario a la página deseada.
            return redirect()->route('listarTareasOperario');
            //return view('registrarEmpleado', compact('empleado'));
        }
    }
}
