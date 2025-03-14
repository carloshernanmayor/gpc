<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{public_path('/css/sb-admin-2.min.css')}}">
    <title>Document</title>
</head>
<body>
    <h3>Productos</h3>

    <div class="row">
<div class="col-md-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<th>nombre</th>
<th>tipo</th>
<th>material</th>
<th>sector</th>
<th>dimensiones</th>
<th>fecha de creacion</th>
</thead>
<tbody>
@foreach($posproducto as $pos)
<tr>
<td>{{ $pos->nombre }}</td>
<td>{{ $pos->tipo}}</td>
<td>{{ $pos->material }}</td>
<td>{{ $pos->sector}}</td>
<td>{{ $pos->dimensiones }}</td>
<td>{{ $pos->fecha_creacion}}</td>
<td>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
    
</body>
</html>