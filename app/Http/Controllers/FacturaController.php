<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Cuota;
use App\Models\Cliente;

class FacturaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $cuota = Cuota::findOrFail($id);

        $cliente = Cliente::where('id', $cuota['clientes_id'])->first();

        $tipo_cambio = "";

        if ($cliente['moneda'] != "EUR") {
            $tipo_cambio = $this->obtenerTipoDeCambio($cliente, $cuota);
        }

        $pdf = PDF::loadView('factura', compact('cuota', 'cliente', 'tipo_cambio'));

        return $pdf->download('factura_cuota_' . ($id) . '_' . $cuota->concepto . '.pdf');
    }


    public function generarFacturaPdf(Cuota $cuota)
    {
        $cliente = Cliente::where('id', $cuota['clientes_id'])->first();

        $tipo_cambio = "";

        if ($cliente['moneda'] != "EUR") {
            $tipo_cambio = $this->obtenerTipoDeCambio($cliente, $cuota);
        }

        $pdf = PDF::loadView('facturas.factura', compact('cuota', 'cliente', 'tipo_cambio'));

        return $pdf->download('Factura Cuota ' . $cuota->id . ' ' . $cuota->concepto . '.pdf');
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
