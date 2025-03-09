@extends('home')
@section('contenido')

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Editar Producto y/o servicio</h4>
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
{{Form::open(array('action'=>array('App\Http\Controllers\productoservicioController@update', $posproductoservicio->id_producto_servicio),'method'=>'patch'))}}
<div class="row g-3">
<div class="col-md-4">
<label for="nombre" class="form-label">Nombre</label>
<input type="text" name="nombre" id="nombre"
class="form-control"
value="{{$posproductoservicio->nombre}}">
</div>
<div class="col-md-4">
<label for="descripcion" class="form-label">Descripcion</label>
<input type="text" name="descripcion" id="descripcion" class="form-control"
value="{{$posproductoservicio->descripcion}}">
</div>
<div class="col-4">
<label for="precio" class="form-label">Precio</label>
<input type="text" name="precio" id="precio" class="form-control"
value="{{$posproductoservicio->precio}}">
</div>
<div class="col-6">
<label for="tipo" class="form-label">Tipo</label>
<input type="text" name="tipo" id="tipo" class="form-control"
value="{{$posproductoservicio->tipo}}">
</div>
<div class="col-12">
<button class="btn btn-primary" type="submit"><span class="glyphicon glyphiconrefresh"></
span> Actualizar
</button>
<a class="btn btn-info" type="reset" href="{{url('productoservicio')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
