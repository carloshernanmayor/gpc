@extends('home')

@section('titulo')
   Clientes
@endsection

@section('contenido')

<div class="row">
  <div class="col-md-9">
    <a href="{{ url('imprimircliente') }}" class="pull-right">
      <button class="btn btn-success">Imprimir Pdf</button>
    </a>
  </div>
</div>

<div class="row">
  @foreach($clientes as $cliente)
    <div class="col-md-4 col-sm-6 col-xs-12 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">{{ $cliente->nombre }}</h5>
          <p class="card-text">
            <strong>Tipo:</strong> {{ $cliente->tipo }} <br>
            <strong>Identificación:</strong> {{ $cliente->identificacion }} <br>
            <strong>Teléfono:</strong> {{ $cliente->telefono }} <br>
            <strong>Dirección:</strong> {{ $cliente->direccion }} <br>
            <strong>Correo:</strong> {{ $cliente->correo }} <br>
            <strong>Contacto:</strong> {{ $cliente->contacto_nombre }} <br>
            <strong>Teléfono de contacto:</strong> {{ $cliente->contacto_telefono }} <br>
            <strong>Fecha de Registro:</strong> {{ $cliente->fecha_registro }}
          </p>
          
          <!-- Botones de acción -->
          <a href="{{ URL::action('App\Http\Controllers\clienteController@edit', $cliente->id_cliente) }}" class="btn btn-primary">Actualizar</a>
          <a href="" data-toggle="modal" data-target="#modal-delete-{{ $cliente->id_cliente }}" class="btn btn-danger">Eliminar</a>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
