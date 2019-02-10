@extends('layouts.template')
@section('content')
@include('layouts.alert')
@section('css') 
    <link href="{{ asset('chosen/chosen.css') }}" rel="stylesheet">
@stop

<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">

	<div class="uk-width-1-1@s">
		<h3>AREA ACADEMICA</h3>
		<form method="post" accept-charset="utf-8" action="{{ route('areas.store') }}">
			{{ csrf_field() }}
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="area" value="" placeholder="Nombre">
			<div style="margin-bottom: 10px;" class="uk-width-1-1@s">
				<select id="select" class="select" name="nuclei_id">
					<option value="">Nucleo</option>
				@foreach($nucleos as $nucleo)
					<option value="{{ $nucleo->id }}">{{ $nucleo->nucleus }}</option>
				@endforeach
				</select>
			</div>

			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="code" value="" placeholder="Codigo">
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="dean" value="" placeholder="Decano">
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="resolution" value="" placeholder="Resolucion">

			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</form>
	</div>
	<div>
		<h3>Todas las areas...</h3>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>Area</th>
					<th>Nucleo</th>
					<th>Decano</th>
					<th>Resolucion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($areas as $area)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $area->area }}</td>
					<td>{{ ($area->nuclei)?'tiene relacion':'no tiene relacion' }}</td>
					<td>{{ $area->dean }}</td>
					<td>{{ $area->resolution }}</td>
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