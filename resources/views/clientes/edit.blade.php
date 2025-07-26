@extends('homevendedor')
@section('contenido')



<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Editar Cliente</h4>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>¡Ups!</strong> Hay errores con los datos que intentas actualizar:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</div>
{{Form::open(array('action'=>array('App\Http\Controllers\clienteController@update', $cliente->id_cliente),'method'=>'patch'))}}
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="tipo">Tipo</label>
<input type="text" name="tipo"
id="tipo" class="form-control"
placeholder="Natural o juridica" value="{{ $cliente->tipo }}">
</div>
</div>
<div class="row g-3">
<div class="col-md-4">
<label for="identificacion" class="form-label">identificacion</label>
<input type="number" name="identificacion" id="identificacion"
class="form-control"
value="{{$cliente->identificacion}}">
</div>
<div class="col-md-4">
<label for="nombre" class="form-label">Nombre</label>
<input type="text" name="nombre" id="nombre" class="form-control"
value="{{$cliente->nombre}}">
</div>
<div class="col-4">
<label for="direccion" class="form-label">direccion</label>
<input type="text" name="direccion" id="direccion" class="form-control"
value="{{$cliente->direccion}}">
</div>
<div class="col-6">
<label for="correo" class="form-label">correo</label>
<input type="text" name="correo" id="correo" class="form-control"
value="{{$cliente->correo}}">
</div>
<div class="col-md-6">
<label for="telefono" class="form-label">Telefono</label>
<input type="text" name="telefono" id="telefono" class="form-control"
value="{{$cliente->telefono}}">
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="contacto_nombre">Nombre de contacto</label>
<input type="text" name="ncontacto" id="ncontacto" class="form-control"  placeholder="Digite el nombre del contacto" value="{{ $cliente->contacto_nombre }}">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="contacto_correo">Correo de contacto</label> 
<input type="text" name="ccontacto" id="ccontacto" class="form-control" placeholder="Digite el correo del contacto" value="{{ $cliente->contacto_correo }}">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="contacto_telefono">telefono de contacto</label>
<input type="text" name="tcontacto" id="tcontacto" class="form-control"  placeholder="Digite el telefono del contacto" value="{{ $cliente->contacto_telefono }}">
</div>
</div>
<div class="col-12">
<button class="btn btn-primary" type="submit"><span class="glyphicon glyphiconrefresh"></span> Actualizar
</button>
<a class="btn btn-info" type="reset" href="{{url('cliente')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
