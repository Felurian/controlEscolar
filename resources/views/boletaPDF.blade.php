<!DOCTYPE html>
<html lan="en">
<head>
	<meta charset="utf-8">
	<title>Boleta</title>
	<style type="">
		.encabezado{
			color:black;
			text-align: center;
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
	<h1 class="encabezado">Calificaciones</h1>
	<h3>Nombre: {{$datos->first()->nombre}}</h3>
	<h3>Número de control: {{$datos->first()->numero_control}}</h3>
	<hr>

	<br>
	<table class="tabla">
	<thead>
		<tr>
			<th>Clave</th>
			<th>Materia</th>
			<th>Calificación</th>
		</tr>
		@foreach($datos as $a)
			<tr>
				<td>{{$a->mid}}</td>
				<td>{{$a->nom_materia}}</td>
				<td>{{$a->calificacion}}</td>
			</tr>
		@endforeach
	</thead>
</table>

</body>
</html>



