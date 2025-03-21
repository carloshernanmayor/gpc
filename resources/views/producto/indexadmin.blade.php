@extends('home')
@section('titulo')
   Productos 
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('/Final_proyect/gpc/public/producto/create')}}" class="pull-right">
<button class="btn btn-success">Crear producto</button> </a>


<a href="{{url('imprimirproducto')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
   
<th>nombre</th>
<th>tipo</th>
<th>material</th>
<th>sector</th>
<th>dimensiones</th>
<th>fecha de creacion</th>



</thead>
<tbody>
@foreach($posproducto as $pos)
<tr>
<td>{{ $pos->nombre }}</td>
<td>{{ $pos->tipo}}</td>
<td>{{ $pos->material }}</td>
<td>{{ $pos->sector}}</td>
<td>{{ $pos->dimensiones }}</td>
<td>{{ $pos->fecha_creacion}}</td>
<td>
<a href="{{URL::action('App\Http\Controllers\productoController@edit',$pos->id_producto)}}"><button class="btn btn-primary">Actualizar</button></a>
<a href="" data-toggle="modal" data-target="#modal-delete-{{$pos->id_producto}}">
<button type="button" class="btn btn-danger"> Eliminar</button>
</a>
</td>
</tr>
@include('producto.modal')
@endforeach
</tbody> </table>
</div></div>
@endsection('contenido')
