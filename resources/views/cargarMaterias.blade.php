@extends('master')

@section('contenido')
@include('flash::message')
<script type="text/javascript">
	setTimeout(function(){
		$(".alert").fadeOut(1500);
	},1500);
</script>
<h2>Nombre: {{$alumno->nombre}}</h2>
<hr>
<form action="{{url('/cargarGrupo')}}/{{$alumno->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="materia">Selecciona la materia:</label>
		<select name="grupo_id" class="form-control">
			<option value="0">Selecciona la materia</option>
			@foreach($lista as $m)
				<option value="{{$m->gid}}">{{$m->nombre}} - {{$m->nom_maestro}}</option>
			@endforeach
		</select>
	</div>
	<button class="btn btn-primary">Cargar</button>
</form>
<h2>Materias Cargadas</h2>
<hr>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Grupo</th>
					<th>Aula</th>
					<th>Horario</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($materias as $mt)
				<tr>
					<td>{{$mt->mid}}</td>
					<td>{{$mt->nombre}}</td>
					<td>{{$mt->gid}}</td>
					<td>{{$mt->salon}}</td>
					<td>{{$mt->hora}}</td>
					<td><a href="{{url('/quitarGrupo')}}/{{$mt->gid}}/{{$alumno->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop