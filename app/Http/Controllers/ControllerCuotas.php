<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;
use App\Models\Tarea;


use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use PDF;

class ControllerCuotas extends Controller
{
    public function __invoke(Request $request)
    {
        $clientes = Cliente::all();
        return view('formularioCuota', compact('clientes'));
    }

    public function listar($filtro = "")
    {
        // $clientes = Cliente::all();
        // $cuotas = Cuota::orderBy('fechaEmision', 'desc')->paginate(3);
        // return view('listaCuotas', compact('cuotas', 'clientes'));
        $tareas = Tarea::all();
        switch ($filtro) {
            case "NO":
                $cuotas = Cuota::where('pagada', 'NO')
                    ->whereHas('cliente', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->orderBy('fechaEmision', 'asc')
                    ->paginate(7);
                break;
            case "SI":
                $cuotas = Cuota::where('pagada', 'SI')
                    ->whereHas('cliente', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->orderBy('fechaEmision', 'asc')
                    ->paginate(7);
                break;
            case "fechaPago":
                $cuotas = Cuota::orderBy('fechaPago', 'desc')
                    ->whereHas('cliente', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->paginate(7);
                break;
            default:
                $cuotas = Cuota::orderBy('fechaEmision', 'desc')
                    ->whereHas('cliente', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->paginate(7);
                break;
        }
        return view('listaCuotas', compact('cuotas', 'tareas'));
    }

    public function validarCuotaExcepcional()
    {
        $data = request()->validate([
            'clientes_id' => 'required',
            'concepto' => 'required',
            'fechaEmision' => 'required|after:now',
            'importe' => 'required|numeric',
            'notas' => 'required',
        ]);

        $cuota = Cuota::create($data);

        $to = 'adriansecundariopruebas@gmail.com';
        $subject = 'Factura cuota excepcional';
        $body = 'Aquí se le adjunta la factura correspondiente a su cuota excepcional';

        $cliente = Cliente::where('id', $cuota['clientes_id'])->first();

        $tipo_cambio = "";

        if ($cliente['moneda'] != "EUR") {
            $tipo_cambio = $this->obtenerTipoDeCambio($cliente, $cuota);
        }

        $pdf = PDF::loadView('factura', compact('cuota', 'cliente', 'tipo_cambio'));
        $pdf_contenido = $pdf->output();

        Mail::raw($body, function (Message $message) use ($to, $subject, $cuota, $pdf_contenido) {
            $message->to($to)
                ->subject($subject)
                ->attachData($pdf_contenido, 'Factura Cuota ' . $cuota->id . ' ' . $cuota->concepto . '.pdf', [
                    'mime' => 'application/pdf',
                ]);
        });

        session()->flash('message', 'La cuota excepcional ha sido creada correctamente.');

        return redirect()->route('listaCuotas', 'fechaEmision');
    }

    public function confirmacionBorrar(Cuota $cuota)
    {
        return view('confirmBorrarCuota', compact('cuota'));
    }

    public function borrarCuota(Cuota $cuota)
    {
        $cuota->delete();
        session()->flash('message', 'La cuota se ha borrado exitosamente');
        return redirect()->route('listaCuotas', 'fechaEmision');
    }

    public function editarCuota(Cuota $cuota)
    {
        $clientes = Cliente::all();
        return view('editarCuota', compact('cuota', 'clientes'));
    }

    public function actualizarCuota(Cuota $cuota)
    {
        $validacion = request()->validate([
            'clientes_id' => 'required',
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'importe' => 'required|numeric',
            'fechaPago' => '',
            'notas' => 'required',
            'pagada' => '',
        ]);

        Cuota::where('id', $cuota->id)->update($validacion);
        session()->flash('message', 'Cuota modificado con éxito');
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
