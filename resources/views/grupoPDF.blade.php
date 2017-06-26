<!DOCTYPE html>
<html lan="en">
<head>
	<meta charset="utf-8">
	<title>Reporte de Grupo</title>
	<style type="">
		.encabezado{
			padding-left: 50px;
			color:black;
			text-align: center;
			border: 1px solid black;
		}
		.tabla{
			width: 100%;
			border-collapse: collapse;
			margin-top: 10 px;
		}
		th{
			background-color: #4CAF50;
    		color: white;
		}
		th, td{
			
			padding: 15px;
    		text-align: left;
		}
		img
		{
			position: absolute;
			height: 80px;
			width: 80px;
		}
		#seccion1
		{
			border: 1px solid black;
		}
		#seccion2
		{
			border: 1px solid black;
			margin-top: 50 px;
		}
		tr:nth-child(even) {background-color: #f2f2f2}
	</style>
</head>
<body>
<section id="seccion1">
	<img src="img/logo.png" width="150px" alt="">
	<h1 class="encabezado">Instituto Tecnologico de Culiacán</h1>
</section>

	<hr>
	<br>
	<section id="seccion2">
		<label>{{$grupo->id}}</label>
		<label>{{$grupo->nom_materia}}</label>
		<label>{{$grupo->nom_maestro}}</label>
		<label>{{$grupo->hora}}</label>
		<label>{{$grupo->salon}}</label>
	</section>
	

	<table class="tabla">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Número de control</th>
			
			
		</tr>
		@foreach($alumnos as $a)
			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->numero_control}}</td>
			</tr>
		@endforeach
	</thead>
</table>

</body>
</html>
