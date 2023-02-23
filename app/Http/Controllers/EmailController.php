<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Message;

use App\Models\Empleado;
use App\Models\Cuota;
use PDF;

class EmailController extends Controller
{
    public function store($pass)
    {
        $to = 'adriansecundariopruebas@gmail.com';
        $subject = 'Correo de cambio de contraseña';
        $body = 'Esto es un correo de recuperación de contraseña. 
        ¡IMPORTANTE! Cambie la contraseña nada más iniciar sesión
        Aquí te enviamos la nueva contraseña: ' . $pass;

        Mail::raw($body, function (Message $message) use ($to, $subject) {
            $message->to($to)
                ->subject($subject);
        });
        //return 'Correo electrónico enviado';
    }

    public function formularioPass()
    {
        return view('formularioPass');
    }

    public function validacionCorreo()
    {
        $data = request()->validate([
            'email' => 'required',
        ]);

        $empleado = Empleado::where('email', $data['email'])
            ->first();

        if ($empleado) {

            $pass = $this->generarPass();

            $data['password'] = $pass;

            $data['password'] = Hash::make($data['password']);

            //dd($pass);

            $this->store($pass);
            session()->flash('message', 'El correo se ha enviado correctamente.');
            $empleado->update(['password' => $data['password']]);
        }
        return redirect()->route('formularioPass');
    }

    // public function generarPass()
    // {
    //     $password = '';
    //     $length = 8;

    //     // Generar la contraseña aleatoria
    //     $upper = false;
    //     $number = false;
    //     while (strlen($password) < $length || !$upper || !$number) {
    //         $char = chr(random_int(33, 126));
    //         if (ctype_upper($char)) {
    //             $upper = true;
    //         } elseif (ctype_digit($char)) {
    //             $number = true;
    //         }
    //         $password .= $char;
    //     }
    //     return $password;
    // }

    public function generarPass()
    {
        $password = '';
        $length = 4;

        // Generar la contraseña aleatoria
        while (strlen($password) < $length) {
            $char = random_int(0, 9);
            $password .= $char;
        }

        return $password;
    }



    public function facturaCorreo(Cuota $cuota)
    {
        $to = 'adriansecundariopruebas@gmail.com';
        $subject = 'Factura cuota';
        $body = 'Aquí se le adjunta la factura correspondiente a su cuota';

        $pdf = PDF::loadView('factura', compact('cuota'));
        $pdf_contenido = $pdf->output();

        Mail::raw($body, function (Message $message) use ($to, $subject, $cuota, $pdf_contenido) {
            $message->to($to)
                ->subject($subject)
                ->attachData($pdf_contenido, 'factura_cuota_' . $cuota->id . '.pdf', [
                    'mime' => 'application/pdf',
                ]);
        });
        session()->flash('message', 'La factura se envió por correo exitosamente.');
        return redirect()->route('listaCuotas');
    }
}
