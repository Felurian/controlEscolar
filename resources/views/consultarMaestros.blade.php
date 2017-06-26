@extends('master')

@section('contenido')
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>RFC</th>
			<th>Edad</th>
			<th>Sexo</th>
			<th><a href="{{url('/pdfMaestros')}}">PDF</a></th>
		</tr>
		@foreach($maestros as $m)
			<tr>
				<td>{{$m->id}}</td>
				<td>{{$m->nombre}}</td>
				<td>{{$m->rfc}}</td>
				<td>{{$m->edad}}</td>
				<td>
					@if($m->sexo==0)
						Femenino
					@else
						Masculino
					@endif
				</td>
				<td>
					<a href="{{url('/editarMaestro')}}/{{$m->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarMaestro')}}/{{$m->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $maestros->links() }}
</div>

@stop

