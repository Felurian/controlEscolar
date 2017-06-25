@extends('master')

@section('contenido')
<form action="{{url('/actualizarMateria')}}/{{$materia->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" required value="{{$materia->nombre}}">
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>
@stop

