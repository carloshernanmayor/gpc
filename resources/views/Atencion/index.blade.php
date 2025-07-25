@extends('homevendedor')
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
<div class="container">
  <div class="row">
    @foreach($aten as $atencion)
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $atencion->vendedor->nombre }}</h5>
            <p class="card-text"><strong>Cliente:</strong> {{ $atencion->cliente->nombre }}</p>
            <p class="card-text"><strong>Producto:</strong> {{ $atencion->producto->nombre ?? 'Ninguno' }}</p>
            <p class="card-text"><strong>Canal:</strong> {{ $atencion->guion->canal ?? 'Ninguno' }}</p>
            <p class="card-text"><strong>Mensaje:</strong> {{ $atencion->guion->mensaje ?? 'Ninguno' }}</p>
            <p class="card-text"><strong>Resultado:</strong> {{ $atencion->resultado }}</p>
            <p class="card-text"><strong>Observaciones:</strong> {{ $atencion->observaciones }}</p>
            <p class="card-text"><strong>Fecha:</strong> {{ $atencion->fecha }}</p>
            <a href="{{ URL::action('App\Http\Controllers\AtencionController@edit', $atencion->id_atencion) }}" class="btn btn-primary">Actualizar</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

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
