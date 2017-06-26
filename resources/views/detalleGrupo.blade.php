@extends('master')

@section('contenido')

<label>Materia:  {{$grupo->nom_materia}}</label><br>
<label>Maestro:  {{$grupo->nom_maestro}}</label><br>
<label>Horario:  {{$grupo->hora}}</label><br>
<label>Salón:    {{$grupo->salon}}</label><br>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Alumno</th>
			<th>Número de Control</th>
			<th>Opciones</th>
		</tr>
		@foreach($alumnos as $a)
			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->numero_control}}</td>
				<td>
					<a href="{{url('/eliminarAlumnoGrupo')}}/{{$grupo->id}}/{{$a->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
					
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $alumnos->links() }}
</div>
<div>
	<a href="{{url('/agregarAlumnoGrupo')}}/{{$grupo->id}}" class="btn btn-primary">Agregar Alumno</a>
</div>
@stop
