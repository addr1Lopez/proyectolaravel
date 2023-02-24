<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;

use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use PDF;

class ControllerRemesa extends Controller
{

    public function __invoke(Request $request)
    {
        return view('formularioRemesa');
    }

    public function validacionInsertarRemesa()
    {
        $data = request()->validate([
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'notas' => 'required',
        ]);

        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $data['clientes_id'] = $cliente->id;
            $data['importe'] = $cliente->importe;

            $cuota = Cuota::create($data);

            // // Enviar remesa mensual a todos los clientes
            // $to = 'adriansecundariopruebas@gmail.com';
            // $subject = 'Remesa mensual';
            // $body = 'Aquí se le adjunta la remesa mensual';

            // $cliente = Cliente::where('id', $cuota['clientes_id'])->first();

            // $tipo_cambio = "";

            // if ($cliente['moneda'] != "EUR") {
            //     $tipo_cambio = $this->obtenerTipoDeCambio($cliente, $cuota);
            // }

            // $pdf = PDF::loadView('factura', compact('cuota', 'cliente', 'tipo_cambio'));
            // $pdf_contenido = $pdf->output();

            // Mail::raw($body, function (Message $message) use ($to, $subject, $cuota, $pdf_contenido) {
            //     $message->to($to)
            //         ->subject($subject)
            //         ->attachData($pdf_contenido, 'Factura Cuota ' . $cuota->id . ' ' . $cuota->concepto . '.pdf', [
            //             'mime' => 'application/pdf',
            //         ]);
            // });
        }
        session()->flash('message', 'La remesa mensual se ha enviado correctamente.');
        return redirect()->route('listaCuotas', 'fechaEmision');
    }

    public function obtenerTipoDeCambio($cliente, $cuota)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/fixer/convert?to=EUR&from=" . $cliente['moneda'] . "&amount=" . $cuota['importe'] . "",
            CURLOPT_HTTPHEADER => [
                "Content-Type: text/plain",
                "apikey: s1njLPIb5nyl5nn8DjGZ3gPFwrNFNIi9"
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);
        //dd($response);

        return [
            'importe_api' => $response["result"],
            'fecha_conversion' => $response["date"],
            'rate' => $response["info"]["rate"]
        ];
    }
}
