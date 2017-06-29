@extends('master')

@section('contenido')
<style type="">
	h1
	{
		text-align: center;
		font-weight: bold;
	}
	#seccion1 article
	{
		display: inline-block;
		width: 33%;
		vertical-align: top;
		margin-bottom: 0px;
	}
	.botones{
		text-align: right;
	}
	.texto
	{
		font-weight: normal;
	}
</style>
<h1>Registro de Calificaciones</h1><br><br>
<section id="seccion1">
		<article id="primeraColumna">
			<label class="titulos">MATERIA:</label> <br>
			<label class="texto">{{$grupo->materia_id}}</label>
			<label class="texto">{{$grupo->nom_materia}}</label><br>
		</article>

		<article id="segundaColumna">
			<label class="titulos">DOCENTE:</label> <br>
			<label class="texto">{{$grupo->maestro_id}}</label>
			<label class="texto">{{$grupo->nom_maestro}}</label>
		</article>
		<article id="terceraColumna">
			<label class="titulos">GRUPO:</label> <br>
			<label class="texto">{{$grupo->salon}} / {{$grupo->hora}}</label>
		</article>
</section>
<hr>
	<form action="{{url('/guardarCalificaciones')}}/{{$grupo->id}}" method="POST">
	<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Número de control</th>
			<th>Calificaión</th>

		</tr>
		
		@foreach($alumnos as $a)

			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->numero_control}}</td>
				<td>
					<input type="number" name="calificacion[]" value="{{$a->calificacion}}">
					<input type="hidden" name="id_alu[]" value="{{$a->id}}">
				</td>
			</tr>
		@endforeach
		</thead>

</table>
<div class="botones">
		<button type="submit" class="btn btn-primary">Guardar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</div>
</form>
@stop