@extends('homevendedor')

@section('titulo')
  Tus Clientes
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('cliente/create')}}" class="pull-right">
<button class="btn btn-success">Crear cliente</button> </a>



<a href="{{url('imprimircliente')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>

<th>Tipo</th>
<th>Nombre</th>
<th>Identificacion</th>
<th>Telefono</th>
<th>direccion</th>
<th>correo</th>
<th>contacto_nombre</th>
<th>contacto_correo</th>
<th>contacto_telefono</th>
<th>fecha_registro</th>

</thead>
<tbody>
@foreach($clientes as $cliente)
<tr>
<td>{{ $cliente->tipo }}</td>
<td>{{ $cliente->nombre }}</td>
<td>{{ $cliente->identificacion}}</td>
<td>{{ $cliente->telefono }}</td>
<td>{{ $cliente->direccion}}</td>
<td>{{ $cliente->correo }}</td>
<td>{{ $cliente->contacto_nombre }}</td>
<td>{{ $cliente->contacto_correo }}</td>
<td>{{ $cliente->contacto_telefono }}</td>
<td>{{ $cliente->fecha_registro }}</td>
<td>
<a href="{{URL::action('App\Http\Controllers\clienteController@edit',$cliente->id_cliente)}}"><button class="btn btn-primary">Actualizar</button></a>
<a href="" data-toggle="modal" data-target="#modal-delete-{{$cliente->id_cliente}}">
<button type="button" class="btn btn-danger"> Eliminar</button>
</a>
</td>
</tr>
@include('clientes.modal')
@endforeach
</tbody> </table>
</div></div>
@endsection('contenido')
