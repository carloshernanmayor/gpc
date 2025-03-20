@extends('home')
@section('titulo')
   Atenciones
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="#" class="pull-right">
<button class="btn btn-success" data-toggle="modal" data-target="#ccmodal" >Crear atencion</button> </a>



<a href="{{url('imprimiratencion')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
  

<table class="table table-striped table-hover">
<thead>

<th>Vendedor</th>
<th>Cliente</th>
<th>Producto</th>
<th>Canal</th>
<th>Mensaje</th>
<th>Resultado</th>
<th>Observaciones</th>
<th>fecha</th>


</thead>
<tbody>
@foreach($aten as $atencion)
<tr>
<td>{{ $atencion->vendedor->nombre}}</td>
<td>{{ $atencion->cliente->nombre}}</td>
<td>{{ $atencion->producto->nombre ?? 'Ninguno' }}</td>
<td>{{ $atencion->guion->canal  ?? 'Ninguno' }}</td>
<td>{{ $atencion->guion->mensaje ?? 'Ninguno' }}</td>
<td>{{ $atencion->resultado }}</td>
<td>{{ $atencion->observaciones }}</td>
<td>{{ $atencion->fecha }}</td>

<a href="{{URL::action('App\Http\Controllers\AtencionController@edit',$atencion->id_atencion)}}"><button class="btn btn-primary">Actualizar</button></a>

</td>
</tr>
@endforeach
</tbody> </table>
</div></div>

<div class="modal fade" id="ccmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">primer paso: Elige un cliente</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Agregaras un cliente nuevo o un cliente antiguo?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-terciary" href="{{url('atencion/create')}}">Cliente antiguo</a>
                    <a class="btn btn-primary" href="{{url('cliente/create')}}">Cliente nuevo</a>
                </div>
            </div>
        </div>
    </div>

@endsection('contenido')
