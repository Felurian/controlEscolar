<!DOCTYPE html>
<html lan="en">
<head>
	<meta charset="utf-8">
	<title>Reporte de Alumnos</title>
	<style type="">
		.encabezado{
			color:blue;
		}
	</style>
</head>
<body>
<!<img src="img/logo.png" width="150px" alt="">
	<h1 class="encabezado">Lista de Alumnos</h1>
	<hr>
	@foreach($alumnos as $a)
		{{$a->nombre}}<br>

	@endforeach

</body>
</html>