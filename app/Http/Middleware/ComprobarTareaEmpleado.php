<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;

class ComprobarTareaEmpleado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $tarea = Tarea::find($request->route()->parameter('tarea'));

        if ($tarea[0]->empleados_id !==  Auth::user()->id) {
            return redirect()->back()->withErrors(['No tienes acceso a esta tarea']);
        }

        return $next($request);
    }
}
