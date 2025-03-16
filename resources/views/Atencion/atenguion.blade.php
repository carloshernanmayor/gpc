@extends('home')
@section('contenido')

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Ingresar Guion de ventas</h4>
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
</div>
</div>
{!!Form::open(array('url'=>'guion','method'=>'POST','autocomplete'=>'off')
)!!}
{{Form::token()}}
<div class="row">
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
    <h4>{{$lastatencion->cliente->nombre}}</h4>
<label for="">guiones</label>
<select name="" id="">
<option value="">-- Selecciona un guion --</option>
    @foreach($guiones as $guion)
        <option value="{{ $guion->id }}">{{ $guion->mensaje }}</option>
    @endforeach

</select>
<a class="btn btn-info" type="reset" href="{{url('atencion')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
