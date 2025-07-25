<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{public_path('/css/sb-admin-2.min.css')}}">
    <title>Reporte</title>
    <link rel="icon" href="{{ asset('image/logo.svg') }}">
</head>
<body>
    <h3> Tus Atenciones</h3>

    <div class="row">
<div class="col-md-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<th>Cliente</th>
<th>Producto</th>
<th>Canal</th>
<th>Mensaje</th>
<th>Resultado</th>
<th>Observaciones</th>
<th>fecha</th>
</thead>
<tbody>
@foreach($atencion as $aten)
<tr>
<td>{{ $aten->cliente->nombre}}</td>
<td>{{ $aten->producto->nombre ?? 'Ninguno' }}</td>
<td>{{ $aten->guion->canal  ?? 'Ninguno' }}</td>
<td>{{ $aten->guion->mensaje ?? 'Ninguno' }}</td>
<td>{{ $aten->resultado }}</td>
<td>{{ $aten->observaciones }}</td>
<td>{{ $aten->fecha }}</td>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
    
</body>
</html>