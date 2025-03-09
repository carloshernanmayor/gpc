@extends('home')
@section('contenido')

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Editar tipo marketing</h4>
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
{{Form::open(array('action'=>array('App\Http\Controllers\marketingController@update', $marketing->id_marketing),'method'=>'patch'))}}
<div class="row g-3">
<div class="col-md-4">
<label for="tipo_marketing" class="form-label">Tipo de Marketing</label>
<input type="text" name="tipo_marketing" id="tipo_marketing"
class="form-control"
value="{{$marketing->tipo_marketing}}">
</div>

<div class="col-12">
<button class="btn btn-primary" type="submit"><span class="glyphicon glyphiconrefresh"></
span> Actualizar
</button>
<a class="btn btn-info" type="reset" href="{{url('marketing')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
