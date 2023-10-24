<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posible_cliente;
use pdf;

class PdfController extends Controller
{
    public function imprimirPosible_cliente(Request $request)
{
$posible_cliente=posible_cliente::orderBy('id_posible_cliente','ASC')->get();
$pdf = \PDF::loadView('pdf.posible_clientePDF',['posible_cliente' => $posible_cliente ]);
$pdf->setPaper('carta', 'A4');
return $pdf->stream();
}
}
