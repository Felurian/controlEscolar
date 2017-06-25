@extends('master')

@section('contenido')
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Opciones</th>
		</tr>
		@foreach($materias as $m)
			<tr>
				<td>{{$m->id}}</td>
				<td>{{$m->nombre}}</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $materias->links() }}
</div>

@stop