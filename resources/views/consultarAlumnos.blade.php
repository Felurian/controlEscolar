@extends('master')

@section('contenido')
@include('flash::message')
<script type="text/javascript">
	setTimeout(function(){
		$(".alert").fadeOut(1500);
	},1500);
</script>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Número de control</th>
			<th>Edad</th>
			<th>Sexo</th>
			<th>Carrera</th>
			<th>
				<a href="{{url('/pdfAlumnos')}}">PDF</a>
			</th>
		</tr>
		@foreach($alumnos as $a)
			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->numero_control}}</td>
				<td>{{$a->edad}}</td>
				<td>
					@if($a->sexo==0)
						Femenino
					@else
						Masculino
					@endif
				</td>
				<td>{{$a->nom_carrera}}</td>
				<td>
					<a href="{{url('/editarAlumno')}}/{{$a->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/cargarMaterias')}}/{{$a->id}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="bottom" title="Cargar Materias">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>	
					</a>
					<a href="{{url('/boletaPDF')}}/{{$a->id}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="bottom" title="Boleta">
						<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>	
					</a>
					<a href="{{url('/eliminarAlumno')}}/{{$a->id}}" class="btn btn-danger btn-xs">
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

@stop
