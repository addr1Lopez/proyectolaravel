<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\TevacaeMail;

class EmailController extends Controller
{
    public function store (Request $request) {
        $message=[
            'name'=> $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'content' => $request->content,
            'archivo' => $request->file('archivo')
        ];
        Mail::to($message['email'])->send(new TevacaeMail($message));
        return redirect()->route('')->with('status', 'Email enviado con éxito');
    }
}
