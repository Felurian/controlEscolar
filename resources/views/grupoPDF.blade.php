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
		}
		.tabla{
			width: 100%;
			border-collapse: collapse;
			margin-top: 10 px;
		}
		.titulos
		{
			font-weight: bold;
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
		#primeraColumna label
		{
			padding-right: 20px;
		}
		#seccion1{  }
		#seccion2{	}
		#seccion2 article
		{
			display: inline-block;
			width: 48%;
			vertical-align: top;
			margin-bottom: 0px;
		}
		#segundaColumna label
		{
			margin-left:250px;
			
		}
		tr:nth-child(even) {background-color: #f2f2f2}
	</style>
</head>
<body>
<section id="seccion1">
	<img src="img/logo.png" width="150px" alt="">
	<h1 class="encabezado">Instituto Tecnologico de Culiacán</h1>
</section>
	<br><br>
	<hr>
	<section id="seccion2">
		<article id="primeraColumna">
			<label class="titulos">MATERIA</label> <br>
			<label>{{$grupo->id_materia}}</label>
			<label>{{$grupo->nom_materia}}</label><br><br>
			<label class="titulos">DOCENTE</label> <br>
			<label>{{$grupo->id_maestro}}</label>
			<label>{{$grupo->nom_maestro}}</label>
		</article>
		<article id="segundaColumna">
			<label class="titulos">GRUPO</label> 
			<label>{{$grupo->salon}} / {{$grupo->hora}}</label>
		</article>
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
