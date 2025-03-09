@extends('home')

@section('titulo')
  Tus Clientes
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('cliente/create')}}" class="pull-right">
<button class="btn btn-success">Crear posible cliente</button> </a>



<a href="{{url('imprimircliente')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
   
<th>id</th>
<th>nombre</th>
<th>identificacion</th>
<th>telefono</th>
<th>direccion</th>+
<th>correo</th>

</thead>
<tbody>
@foreach($clientes as $cliente)
<tr>
<td>{{ $cliente->id_cliente }}</td>
<td>{{ $cliente->nombre }}</td>
<td>{{ $cliente->identificacion}}</td>
<td>{{ $cliente->telefono }}</td>
<td>{{ $cliente->direccion}}</td>
<td>{{ $cliente->correo }}</td>
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
