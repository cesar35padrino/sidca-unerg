@extends('layouts.template')
@section('content')
@include('layouts.alert')
@section('css') 
    <link href="{{ asset('chosen/chosen.css') }}" rel="stylesheet">
@stop

<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">

	<div class="uk-width-1-1@s">
		<h3>UNIDAD CURRICULAR</h3>
		<form method="post" accept-charset="utf-8" action="{{ route('unidad-curricular.store') }}">
			{{ csrf_field() }}
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="subject" value="" placeholder="Asignatura">

			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="level" value="" placeholder="Nivel">

			<input class="uk-width-1-1 uk-margin-small-bottom" type="number" name="theoretical_hour" value="" placeholder="Horas teoricas">

			<input class="uk-width-1-1 uk-margin-small-bottom" type="number" name="practical_hour" value="" placeholder="Horas practicas">			

			<div style="margin-bottom: 10px;" class="uk-width-1-1@s">
				<select id="select" class="select" name="program_id">
					<option value="">Programas</option>
				@foreach($programas as $programa)
					<option value="{{ $programa->id }}">{{ $programa->program }}</option>
				@endforeach
				</select>
			</div>

			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</form>
	</div>
	<div>
		<h3>Todas las asignaturas...</h3>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>Asignadura</th>
					<th>Nivel</th>
					<th>Horas T.</th>
					<th>Horas P.</th>
					<th>Programa</th>
					<th>Opcion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($asignaturas as $asignatura)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $asignatura->subject }}</td>
					<td>{{ $asignatura->level }}</td>
					<td>{{ $asignatura->theoretical_hour }}</td>
					<td>{{ $asignatura->practical_hour }}</td>
					<td>{{ ($asignatura->program)?'tiene relacion':'no tiene relacion' }}</td>
					<td>
						<form action="{{ route('unidad-curricular.destroy',$asignatura->id) }}" method="post">
							<input type="hidden" name="_method" value="DELETE">
							<input type="submit" name="eliminar" value="eliminar">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('js')
	<script src="{{ asset('chosen/chosen.jquery.js') }}"></script>
	<script>
	$(".select").chosen({
	    no_results_text: "Oops, no se encontraron resultados! para ",
	    width: "100%",
	    rtl: true
	});
	</script>
@stop