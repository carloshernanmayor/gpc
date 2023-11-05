@extends('layout.plantilla')

@section('titulo')
   Productos y/o servicios
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('producto_servicio/create')}}" class="pull-right">
<button class="btn btn-success">Crear producto_servicio</button> </a>


<a href="{{url('imprimir')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
   
<th>id</th>
<th>nombre</th>
<th>descripcion</th>
<th>precio</th>
<th>tipo</th>

</thead>
<tbody>
@foreach($posproductoservicio as $pos)
<tr>
<td>{{ $pos->id_producto_servicio }}</td>
<td>{{ $pos->nombre }}</td>
<td>{{ $pos->descripcion}}</td>
<td>{{ $pos->precio }}</td>
<td>{{ $pos->tipo}}</td>
<td>
<a href="{{URL::action('App\Http\Controllers\producto_servicioController@edit',$pos->id_producto_servicio )}}"><button class="btn btn-primary">Actualizar</button></a>
<a href="" data-toggle="modal" data-target="#modal-delete-{{$pos->id_producto_servicio }}">
<button type="button" class="btn btn-danger"> Eliminar</button>
</a>
</td>
</tr>
@include('id_producto_servicio.modal')
@endforeach
</tbody> </table>
</div></div>
@endsection('contenido')
