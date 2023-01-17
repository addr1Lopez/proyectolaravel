<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class ControllerFormRegCliente extends Controller
{
    public function __invoke(Request $request)
    {
        $paises = Pais::all();
        return view('formRegCliente', compact('paises'));
    }
}
