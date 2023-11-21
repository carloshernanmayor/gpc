@extends('layout.plantilla')

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
   
<th>id atencion</th>
<th>id vendedor</th>
<th>id posible cliente</th>
<th>id detalle productos de interes</th>


</thead>
<tbody>
@foreach($aten as $atencion)
<tr>
<td>{{ $atencion->id_atencion }}</td>
<td>{{ $atencion->id_vendedor }}  </td>
<td>{{ $atencion->id_posible_cliente}}</td>
<td>{{ $atencion->id_detalle_productos_de_interes }}</td>

@endforeach


@endsection('contenido')
