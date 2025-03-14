<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\vendedor;
use App\Models\producto;
use App\Models\marketing;
use pdf;

class PdfController extends Controller
{
    public function imprimirCliente(Request $request)
{
$cliente=cliente::orderBy('id_cliente','ASC')->get();
$pdf = \PDF::loadView('pdf.clientePDF',['cliente' => $cliente ]);
$pdf->setPaper('carta', 'A4');
return $pdf->stream();
}

public function imprimirProducto(Request $request)
{
$posproducto=producto::orderBy('id_producto','ASC')->get();
$pdf = \PDF::loadView('pdf.productoPDF',['posproducto' => $posproducto ]);
$pdf->setPaper('carta', 'A4');
return $pdf->stream();
}

public function imprimirVendedor(Request $request)
{
$vendedor=vendedor::orderBy('id_vendedor','ASC')->get();
$pdf = \PDF::loadView('pdf.vendedorPDF',['vendedor' => $vendedor ]);
$pdf->setPaper('carta', 'A4');
return $pdf->stream();
}

public function imprimirMarketing(Request $request)
{
$marketing =marketing ::orderBy('id_marketing','ASC')->get();
$pdf = \PDF::loadView('pdf.marketingPDF',['marketing' => $marketing ]);
$pdf->setPaper('carta', 'A4');
return $pdf->stream();
}

}
