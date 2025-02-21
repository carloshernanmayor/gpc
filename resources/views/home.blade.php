@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <a class="nav-link botonGPC" href="posiblecliente" style="color: #000000">
                    <p align="center"><img src= "{{ asset('image/posible_cliente.png') }}" alt="posible_cliente" width="70" height="70"></p>
                    <p align="center"><span>Clientes</span></p>
                </a>
                <a class="nav-link botonGPC" href="vendedor" style="color: #000000">
                    <p align="center"><img src= "{{ asset('image/vendedor.png') }}" alt="vendedor" width="70" height="70"></p>
                    <p align="center"><span>Vendedores</span></p>
                </a>
                <a class="nav-link botonGPC" href="productoservicio" style="color: #000000">
                    <p align="center"><img src= "{{ asset('image/productoservicio.png') }}" alt="producto_servicio" width="70" height="70"></p>
                    <p align="center"><span>Producto y/o servicio</span></p>
                </a>
                <a class="nav-link botonGPC" href="marketing" style="color: #000000">
                    <p align="center"><img src= "{{ asset('image/marketing.png') }}" alt="marketing" width="70" height="70"></p>
                    <p align="center"><span>tipo de marketing</span></p>
                </a>


               
            </div>
        </div>
    </div>
</div>
@endsection