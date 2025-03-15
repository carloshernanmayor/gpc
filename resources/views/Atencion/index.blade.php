@extends('home')
@section('titulo')
   Atenciones
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('atencion/create')}}" class="pull-right">
<button class="btn btn-success">agregar atencion</button> </a>



<a href="{{url('imprimiratencion')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
  

<table class="table table-striped table-hover">
<thead>
   
<th>Cliente</th>
<th>Producto</th>
<th>Canal</th>
<th>Mensaje</th>
<th>Resultado</th>
<th>Observaciones</th>
<th>fecha</th>


</thead>
<tbody>
@foreach($aten as $atencion)
<tr>
<td>{{ $atencion->cliente->nombre}}</td>
<td>{{ $atencion->producto->nombre ?? 'Ninguno' }}</td>
<td>{{ $atencion->guion->canal  ?? 'Ninguno' }}</td>
<td>{{ $atencion->guion->mensaje ?? 'Ninguno' }}</td>
<td>{{ $atencion->resultado }}</td>
<td>{{ $atencion->observaciones }}</td>
<td>{{ $atencion->fecha }}</td>


@endforeach


@endsection('contenido')
