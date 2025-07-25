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
<div class="container">
  <div class="row">
    @foreach($posproducto as $pos)
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $pos->nombre }}</h5>
            <p class="card-text"><strong>Tipo:</strong> {{ $pos->tipo }}</p>
            <p class="card-text"><strong>Material:</strong> {{ $pos->material }}</p>
            <p class="card-text"><strong>Sector:</strong> {{ $pos->sector }}</p>
            <p class="card-text"><strong>Dimensiones:</strong> {{ $pos->dimensiones }}</p>
            <p class="card-text"><strong>Fecha de creación:</strong> {{ $pos->fecha_creacion }}</p>
            <div class="d-flex justify-content-between">
              <a href="{{ URL::action('App\Http\Controllers\productoController@edit', $pos->id_producto) }}" class="btn btn-primary">Actualizar</a>
              <a href="#" data-toggle="modal" data-target="#modal-delete-{{$pos->id_producto}}" class="btn btn-danger">Eliminar</a>
            </div>
          </div>
        </div>
      </div>
    @include('producto.modal')
    @endforeach
  </div>
</div>

</div></div>
@endsection('contenido')
