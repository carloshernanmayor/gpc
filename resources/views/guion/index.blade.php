@extends('homevendedor')
@section('titulo')
   Guiones
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   


<a href="{{url('imprimirguion')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 


</div></div>
<div class="row">
<div class="table-responsive">
<div class="container">
  <div class="row">
    @foreach($guiones as $pos)
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $pos->canal }}</h5>
            <p class="card-text"><strong>Mensaje:</strong> {{ $pos->mensaje }}</p>
            <p class="card-text"><strong>Fecha de creación:</strong> {{ $pos->fecha_creacion }}</p>
          </div>
        </div>
      </div>
    @include('guion.modal')
    @endforeach
  </div>
</div>

</div></div>
@endsection('contenido')
