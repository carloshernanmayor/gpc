<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{public_path('/css/sb-admin-2.min.css')}}">
    <title>Document</title>
</head>
<body>
    <h3>Productos y/o servicios</h3>

    <div class="row">
<div class="col-md-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<td>Id</td>
<td>Nombre</td>
<td>Descripción</td>
<td>Precio</td>
<td>Tipo</td>
</thead>
<tbody>
@foreach($posproductoservicio as $pos)
<tr>
<td>{{ $pos->id_producto_servicio }}</td>
<td>{{ $pos->nombre }}</td>
<td>{{ $pos->descripcion }}</td>
<td>{{ $pos->precio }}</td>
<td>{{ $pos->tipo }}</td>
<td>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
    
</body>
</html>