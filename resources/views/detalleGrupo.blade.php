@extends('master')

@section('contenido')

<label>{{$grupo->nom_materia}}</label>
<label>{{$grupo->nom_maestro}}</label>
<label>{{$grupo->hora}}</label>
<label>{{$grupo->salon}}</label>
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
				<td>{{$a->nom_alumno}}</td>
				<td>{{$a->num_alumno}}</td>
				<td>
					<a href="{{url('/eliminarAlumnoGrupo')}}/{{$g->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
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
