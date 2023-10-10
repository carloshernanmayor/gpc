@extends('layout.plantilla')

@section('titulo')
   Vendedores
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('vendedor/create')}}" class="pull-right">
<button class="btn btn-success">Crear vendedor</button> </a>
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
<th>contraseña</th>

</thead>
<tbody>
@foreach($vendedor as $pos)
<tr>
<td>{{ $pos->id_vendedor }}</td>
<td>{{ $pos->nombre }}</td>
<td>{{ $pos->identificacion}}</td>
<td>{{ $pos->telefono }}</td>
<td>{{ $pos->direccion}}</td>
<td>{{ $pos->correo }}</td>
<td>{{ $pos->contraseña }}</td>
<td>
<a href="{{URL::action('App\Http\Controllers\vendedorController@edit',$pos->id_vendedor)}}"><button class="btn btn-primary">Actualizar</button></a>
<a href="" data-toggle="modal" data-target="#modal-delete-{{$pos->id_vendedor}}">
<button type="button" class="btn btn-danger"> Eliminar</button>
</a>
</td>
</tr>
@include('vendedores.modal')
@endforeach
</tbody> </table>
</div></div>
@endsection('contenido')