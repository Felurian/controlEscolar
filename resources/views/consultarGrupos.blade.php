@extends('master')

@section('contenido')
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Materia</th>
			<th>Maestro</th>
			<th>Hora</th>
			<th>Salón</th>
			<th>Opciones</th>
		</tr>
		@foreach($grupos as $g)
			<tr>
				<td>{{$g->id}}</td>
				<td>{{$g->nom_materia}}</td>
				<td>{{$g->nom_maestro}}</td>
				<td>{{$g->hora}}</td>
				<td>{{$g->salon}}</td>
				<td>
					<a href="{{url('/editarGrupo')}}/{{$g->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarGrupo')}}/{{$g->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $grupos->links() }}
</div>
