@extends('home')
@section('titulo')
   Tipo de marketing
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('marketing/create')}}" class="pull-right">
<button class="btn btn-success">Crear tipo marketing</button> </a>


<a href="{{url('imprimirmarketing')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
   
<th>id</th>
<th>Tipo marketing</th>

</thead>
<tbody>
@foreach($marketing as $pos)
<tr>
<td>{{ $pos->id_marketing }}</td>
<td>{{ $pos->tipo_marketing }}</td>

<td>
<a href="{{URL::action('App\Http\Controllers\marketingController@edit',$pos->id_marketing)}}"><button class="btn btn-primary">Actualizar</button></a>
<a href="" data-toggle="modal" data-target="#modal-delete-{{$pos->id_marketing}}">
<button type="button" class="btn btn-danger"> Eliminar</button>
</a>
</td>
</tr>
@include('marketing.modal')
@endforeach
</tbody> </table>
</div></div>
@endsection('contenido')
