@extends('master')

@section('contenido')
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>
				<a href="{{url('/pdfMaterias')}}">PDF</a>
			</th>
		</tr>
		@foreach($materias as $m)
			<tr>
				<td>{{$m->id}}</td>
				<td>{{$m->nombre}}</td>
				<td>
					<a href="{{url('/editarMateria')}}/{{$m->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarMateria')}}/{{$m->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $materias->links() }}
</div>

@stop