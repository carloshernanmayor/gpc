<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{public_path('/css/sb-admin-2.min.css')}}">
    <title>Document</title>
</head>
<body>
    <h3>Guiones de ventas</h3>

    <div class="row">
<div class="col-md-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<th>Canal</th>
<th>Mensaje</th>
<th>Fecha de creacion</th>
</thead>
<tbody>
@foreach($guion as $pos)
<tr>
<td>{{ $pos->canal }}</td>
<td>{{ $pos->mensaje }}</td>
<td>{{ $pos->fecha_creacion }}</td>
<td>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
    
</body>
</html>