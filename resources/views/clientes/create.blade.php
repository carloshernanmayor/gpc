@extends('homevendedor')
@section('contenido')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>¡Ups!</strong> Hay errores con los datos que intentas ingresar:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!!Form::open(array('url'=>'cliente','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row">
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="tipo">Tipo</label>
<input type="text" name="tipo"
id="tipo" class="form-control"
placeholder="Digite el tipo de cliente">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="documento">identificacion</label>
<input type="number" name="identificacion"
id="identificacion" class="form-control"
placeholder="Digite el número Documento">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text"id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre Completo">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="direccion">Direccion</label>
<input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}" class="form-control"
placeholder="Direccion">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="correo">Email</label>
<input type="text" name="correo" id="correo" value="{{ old('correo') }}" class="form-control"
placeholder="Correo Electrónico">                   
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="telefono">Telefono</label>
<input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control"
placeholder="Telefono"> 
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="contacto_nombre">Nombre de contacto</label>
<input type="text" name="ncontacto" id="ncontacto" class="form-control" value="{{ old('ncontacto') }}" placeholder="Digite el nombre del contacto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="contacto_correo">Correo de contacto</label> 
<input type="text" name="ccontacto" value="{{ old('contacto_correo') }}" id="ccontacto" class="form-control" placeholder="Digite el correo del contacto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="contacto_telefono">telefono de contacto</label>
<input type="text" name="tcontacto" id="tcontacto" class="form-control" value="{{ old('tcontacto') }}" placeholder="Digite el telefono del contacto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="fecha">fecha de registro</label>
<input type="text" name="fecha" id="fecha" class="form-control" placeholder="Digite el nombre del contacto">
</div>
</div>
<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
<div class="form-group"> <br>
<button class="btn btn-primary" type="submit"><span
class="glyphicon glyphicon-ok"></span> Guardar</button>
<button class="btn btn-danger" type="reset"><span
class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
<a class="btn btn-info" type="reset" href="{{url('cliente')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
