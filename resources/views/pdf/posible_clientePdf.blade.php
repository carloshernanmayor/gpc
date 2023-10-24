<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{public_path('/css/sb-admin-2.min.css')}}">
    <title>Document</title>
</head>
<body>
    <h3>Posibles clientes</h3>

    <div class="row">
<div class="col-md-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<td>Id</td>
<td>Nombre</td>
<td>Identificacion</td>
<td>Telefono</td>
<td>Direccion</td>
<td>Correo</td>
</thead>
<tbody>
@foreach($posible_cliente as $pos)
<tr>
<td>{{ $pos->id_posible_cliente }}</td>
<td>{{ $pos->nombre }}</td>
<td>{{ $pos->identificacion}}</td>
<td>{{ $pos->telefono }}</td>
<td>{{ $pos->direccion}}</td>
<td>{{ $pos->correo }}</td>
<td>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
    
</body>
</html>