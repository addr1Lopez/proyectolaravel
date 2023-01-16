<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosFormAñadirTarea extends Controller
{
    public function Validation()
    {
        request()->validate([
            
        ]);
        return view('formAñadirTarea');
    }
}
