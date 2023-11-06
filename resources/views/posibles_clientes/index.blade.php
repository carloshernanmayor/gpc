@extends('layout.plantilla')

@section('titulo')
   Posibles clientes
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('posiblecliente/create')}}" class="pull-right">
<button class="btn btn-success">Crear posible cliente</button> </a>



<a href="{{url('imprimirposiblecliente')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


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
@foreach($poscliente as $pos)
<tr>
<td>{{ $pos->id_posible_cliente }}</td>
<td>{{ $pos->nombre }}</td>
<td>{{ $pos->identificacion}}</td>
<td>{{ $pos->telefono }}</td>
<td>{{ $pos->direccion}}</td>
<td>{{ $pos->correo }}</td>
<td>
<a href="{{URL::action('App\Http\Controllers\posibleclienteController@edit',$pos->id_posible_cliente)}}"><button class="btn btn-primary">Actualizar</button></a>
<a href="" data-toggle="modal" data-target="#modal-delete-{{$pos->id_posible_cliente}}">
<button type="button" class="btn btn-danger"> Eliminar</button>
</a>
</td>
</tr>
@include('posibles_clientes.modal')
@endforeach
</tbody> </table>
</div></div>
@endsection('contenido')
