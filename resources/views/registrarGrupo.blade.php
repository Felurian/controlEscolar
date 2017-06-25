@extends('master')

@section('contenido')
<form action="{{url('/guardarGrupo')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="materia">Materia:</label>
		<select name="materia" class="form-control">
			@foreach($materias as $m)
				<option value="{{$m->id}}">{{$m->nombre}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="maestro">Maestro:</label>
		<select name="maestro" class="form-control">
			@foreach($maestros as $mae)
				<option value="{{$mae->id}}">{{$mae->nombre}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="hora">Hora:</label>
		<input type="text" class="form-control" name="hora" required>
	</div>
	<div class="form-group">
		<label for="salon">Salón:</label>
		<input type="salon" class="form-control" name="salon" required>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>
@stop



