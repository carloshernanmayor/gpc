@extends('home')
@section('titulo')
   Guiones
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('guion/create')}}" class="pull-right">
<button class="btn btn-success">Crear guion</button> </a>


<a href="{{url('imprimirguion')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
   
<th>Canal</th>
<th>Mensaje</th>
<th>Fecha de creacion</th>

</thead>
<tbody>
@foreach($guiones as $pos)
<tr>
<td>{{ $pos->canal }}</td>
<td>{{ $pos->mensaje }}</td>
<td>{{ $pos->fecha_creacion }}</td>

<td>
<a href="{{URL::action('App\Http\Controllers\guionController@edit',$pos->id_guion)}}"><button class="btn btn-primary">Actualizar</button></a>
<a href="" data-toggle="modal" data-target="#modal-delete-{{$pos->id_guion}}">
<button type="button" class="btn btn-danger"> Eliminar</button>
</a>
</td>
</tr>
@include('guion.modal')
@endforeach
</tbody> </table>
</div></div>
@endsection('contenido')
