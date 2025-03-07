<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{public_path('/css/sb-admin-2.min.css')}}">
    <title>Document</title>
</head>
<body>
    <h3> Tus Clientes</h3>

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
@foreach($cliente as $c)
<tr>
<td>{{ $c->id_cliente }}</td>
<td>{{ $c->nombre }}</td>
<td>{{ $c->identificacion}}</td>
<td>{{ $c->telefono }}</td>
<td>{{ $c->direccion}}</td>
<td>{{ $c->correo }}</td>
<td>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
    
</body>
</html>