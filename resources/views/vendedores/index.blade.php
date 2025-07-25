@extends('home')

@section('titulo')
   Vendedores
@endsection('titulo')

@section('contenido')

<div class="row">
<div class="col-md-9">
   <a href="{{url('vendedor/create')}}" class="pull-right">
<button class="btn btn-success">Crear vendedor</button> </a>
   
</p>
<a href="{{url('imprimirvendedor')}}" class="pull-right"><button class="btn btn-success">Imprimir Pdf</button> </a> 

</div></div>
<div class="row">
<div class="table-responsive">
<div class="container">
  <div class="row">
    @foreach($vendedor as $pos)
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $pos->nombre }}</h5>
            <p class="card-text"><strong>Identificación:</strong> {{ $pos->identificacion }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $pos->telefono }}</p>
            <p class="card-text"><strong>Correo:</strong> {{ $pos->correo }}</p>
            <p class="card-text"><strong>Fecha de ingreso:</strong> {{ $pos->fecha_ingreso }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $pos->estado }}</p>
            <div class="d-flex justify-content-between">
              <a href="{{ URL::action('App\Http\Controllers\vendedorController@edit', $pos->id_vendedor) }}" class="btn btn-primary">Actualizar</a>
              <a href="#" data-toggle="modal" data-target="#modal-delete-{{$pos->id_vendedor}}" class="btn btn-danger">Eliminar</a>
            </div>
          </div>
        </div>
      </div>
    @include('vendedores.modal')
    @endforeach
  </div>
</div>

</div></div>
@endsection('contenido')