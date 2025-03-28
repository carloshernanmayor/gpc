@extends('home')

@section('titulo')
   Vendedores
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('vendedor/create')}}" class="pull-right">
<button class="btn btn-success">Crear vendedor</button> </a>
   
</p>
<a href="{{url('imprimirvendedor')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 

</div></div>
<div class="row">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
   
<th>Nombre</th>
<th>Identificacion</th>
<th>Telefono</th>
<th>Correo</th>
<th>Fecha de ingreso</th>
<th>Estado</th>


</thead>
<tbody>
@foreach($vendedor as $pos)
<tr>
<td>{{ $pos->nombre }}</td>
<td>{{ $pos->identificacion}}</td>
<td>{{ $pos->telefono }}</td>
<td>{{ $pos->correo }}</td>
<td>{{ $pos->fecha_ingreso }}</td>
<td>{{ $pos->estado }}</td>

<td>
@if($pos->estado=="activo")
<a href="{{URL::action('App\Http\Controllers\vendedorController@edit',$pos->id_vendedor)}}"><button class="btn btn-primary">Actualizar</button></a>
<a href="" data-toggle="modal" data-target="#modal-delete-{{$pos->id_vendedor}}">
<button type="button" class="btn btn-danger"> Inhabilitar</button>
</a>
@else
<a href="{{URL::action('App\Http\Controllers\vendedorController@edit',$pos->id_vendedor)}}"><button class="btn btn-primary">Actualizar</button></a>
@endif
</td>
</tr>
@include('vendedores.modal')
@include('vendedores.modal2')
@endforeach
</tbody> </table>
</div></div>
@endsection('contenido')