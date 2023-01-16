<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerFormAñadirTarea extends Controller
{
    public function __invoke(Request $request)
    {
        return view('formAñadirTarea');
    }
}
