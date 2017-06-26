<!DOCTYPE html>
<html lan="en">
<head>
	<meta charset="utf-8">
	<title>Reporte de Maestros</title>
	<style type="">
		.encabezado{
			color:black;
		}
		.tabla{
			width: 100%;
			border-collapse: collapse;
		}
		th{
			background-color: #4CAF50;
    		color: white;
		}
		th, td{
			
			padding: 15px;
    		text-align: left;
		}
		tr:nth-child(even) {background-color: #f2f2f2}
	</style>
</head>
<body>
	<h1 class="encabezado">Lista de Mestros</h1>
	<hr>
	<br>
	<table class="tabla">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>RFC</th>
			<th>Edad</th>
			<th>Sexo</th>
			
			
		</tr>
		@foreach($maestros as $m)
			<tr>
				<td>{{$m->id}}</td>
				<td>{{$m->nombre}}</td>
				<td>{{$m->rfc}}</td>
				<td>{{$m->edad}}</td>
				<td>
					@if($m->sexo==0)
						Femenino
					@else
						Masculino
					@endif
				</td>
			</tr>
		@endforeach
	</thead>
</table>

</body>
</html>



