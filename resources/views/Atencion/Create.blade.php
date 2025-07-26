@extends('homevendedor')
@section('contenido')

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Crear Atencion</h4>
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
</div>
</div>
{!!Form::open(array('url'=>'atencion','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row">
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="cliente">Clientes</label>
<select name="cliente" id="cliente">
<option value="">-- Selecciona un cliente --</option>
    @foreach($clientes as $cliente)
        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
    @endforeach

</select>
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="producto">Productos</label>
<select name="producto" id="producto">
<option value="">-- Selecciona un producto --</option>
    @foreach($productos as $producto)
        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
    @endforeach

</select>
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="">guiones</label>
<select name="guion" id="guion">
<option value="">-- Selecciona un guion --</option>
    @foreach($guiones as $guion)
        <option value="{{ $guion->id_guion }}">{{ $guion->mensaje }}</option>
    @endforeach

</select>
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="resultado">Resultado</label>
<input name="resultado" type="text" placeholder="pendiente / exitoso/ no interesado">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="obser">Observaciones</label>
<textarea name="obser" id="" ></textarea>
</div>
</div>
<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
<div class="form-group"> <br>
<button class="btn btn-primary" type="submit"><span
class="glyphicon glyphicon-ok"></span> Guardar</button>
<button class="btn btn-danger" type="reset"><span
class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
<a class="btn btn-info" type="reset" href="{{url('atencion')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')

