<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\vendedor;
use App\Models\producto;
use App\Models\guion;
use App\Models\Atencion;
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

public function imprimirGuion(Request $request)
{
$guion =guion ::orderBy('id_guion','ASC')->get();
$pdf = \PDF::loadView('pdf.guionPDF',['guion' => $guion ]);
$pdf->setPaper('carta', 'A4');
return $pdf->stream();
}

public function imprimirAtencion(Request $request)
{
$atencion=Atencion::orderBy('id_atencion','ASC')->get();
$pdf = \PDF::loadView('pdf.atencionPDF',['atencion' => $atencion ]);
$pdf->setPaper('carta', 'A4');
return $pdf->stream();
}


}
