<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posible_cliente;
use App\Models\vendedor;
use App\Models\producto_servicio;
use App\Models\marketing;
use pdf;

class PdfController extends Controller
{
    public function imprimirPosibleCliente(Request $request)
{
$posible_cliente=posible_cliente::orderBy('id_posible_cliente','ASC')->get();
$pdf = \PDF::loadView('pdf.posible_clientePDF',['posible_cliente' => $posible_cliente ]);
$pdf->setPaper('carta', 'A4');
return $pdf->stream();
}

public function imprimirProductoServicio(Request $request)
{
$posproductoservicio=producto_servicio::orderBy('id_producto_servicio','ASC')->get();
$pdf = \PDF::loadView('pdf.producto_servicioPDF',['posproductoservicio' => $posproductoservicio ]);
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
