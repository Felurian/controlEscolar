@extends('master')

@section('contenido')

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
					<a href="{{url('/guardarAlumnoGrupo')}}/{{$grupo_id}}/{{$a->id}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="bottom" title="Agregar Alumno">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>	
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
	<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</div>
@stop
