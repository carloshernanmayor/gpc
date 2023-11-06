<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{public_path('/css/sb-admin-2.min.css')}}">
    <title>Document</title>
</head>
<body>
    <h3>Tipo de marketing</h3>

    <div class="row">
<div class="col-md-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<td>Id</td>
<td>Tipo de marketing</td>
</thead>
<tbody>
@foreach($marketing as $pos)
<tr>
<td>{{ $pos->id_marketing }}</td>
<td>{{ $pos->tipo_marketing }}</td>
<td>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
    
</body>
</html>