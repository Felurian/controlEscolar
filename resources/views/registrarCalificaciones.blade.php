@extends('master')

@section('contenido')

<section id="seccion2">
		<article id="primeraColumna">
			<label class="titulos">MATERIA</label> <br>
			<label>{{$grupo->materia_id}}</label>
			<label>{{$grupo->nom_materia}}</label><br>
			<label class="titulos">DOCENTE</label> <br>
			<label>{{$grupo->maestro_id}}</label>
			<label>{{$grupo->nom_maestro}}</label>
		</article>
		<article id="segundaColumna">
			<label class="titulos">GRUPO</label> 
			<label>{{$grupo->salon}} / {{$grupo->hora}}</label>
		</article>
	</section>
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
<div>
		<button type="submit" class="btn btn-primary">Guardar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</div>
</form>
@stop