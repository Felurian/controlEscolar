<!DOCTYPE html>
<html lan="en">
<head>
	<meta charset="utf-8">
	<title>Reporte de Alumnos</title>
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
<!<img src="img/logo.png" width="150px" alt="">
	<h1 class="encabezado">Lista de Alumnos</h1>
	<hr>
	<br>
	<table class="tabla">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Número de control</th>
			<th>Edad</th>
			<th>Sexo</th>
			<th>Carrera</th>
			
		</tr>
		@foreach($alumnos as $a)
			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->numero_control}}</td>
				<td>{{$a->edad}}</td>
				<td>
					@if($a->sexo==0)
						Femenino
					@else
						Masculino
					@endif
				</td>
				<td>{{$a->nom_carrera}}</td>
			</tr>
		@endforeach
	</thead>
</table>

</body>
</html>



