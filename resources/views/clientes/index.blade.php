@extends('homevendedor')

@section('titulo')
  Tus Clientes
@endsection

@section('contenido')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="row">
  <div class="col-md-9">
     <a href="{{url('cliente/create')}}" class="pull-right">
       <button class="btn btn-success">Crear cliente</button>
     </a>

     <a href="{{url('imprimircliente')}}" class="pull-right">
       <button class="btn btn-success">Generar Pdf</button>
     </a> 
  </div>
</div>

<!-- Grid de tarjetas -->
<div class="row">
  @foreach($clientes as $cliente)
    <div class="col-md-4 mb-4">
      <!-- Card -->
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">{{ $cliente->nombre }}</h5>
          <p class="card-text"><strong>Tipo:</strong> {{ $cliente->tipo }}</p>
          <p class="card-text"><strong>Identificación:</strong> {{ $cliente->identificacion }}</p>
          <p class="card-text"><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
          <p class="card-text"><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
          <p class="card-text"><strong>Correo:</strong> {{ $cliente->correo }}</p>
          <p class="card-text"><strong>Contacto Nombre:</strong> {{ $cliente->contacto_nombre }}</p>
          <p class="card-text"><strong>Contacto Correo:</strong> {{ $cliente->contacto_correo }}</p>
          <p class="card-text"><strong>Contacto Teléfono:</strong> {{ $cliente->contacto_telefono }}</p>
          <p class="card-text"><strong>Fecha Registro:</strong> {{ $cliente->fecha_registro }}</p>
          
          <div class="d-flex justify-content-between">
            <a href="{{URL::action('App\Http\Controllers\clienteController@edit',$cliente->id_cliente)}}" class="btn btn-primary">Actualizar</a>
            <a href="" data-toggle="modal" data-target="#modal-delete-{{$cliente->id_cliente}}" class="btn btn-danger">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
