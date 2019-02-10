@extends('layouts.template')
@section('content')
@include('layouts.alert')
@section('css') 
    <link href="{{ asset('chosen/chosen.css') }}" rel="stylesheet">
@stop

<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">

	<div class="uk-width-1-1@s">
		<h3>NUCLEO</h3>
		<form method="post" accept-charset="utf-8" action="{{ route('nucleos.store') }}">
			{{ csrf_field() }}
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="nucleus" value="" placeholder="Nombre">
			<div style="margin-bottom: 10px;" class="uk-width-1-1@s">
				<select id="select" class="select" name="headquarter_id">
					<option value="">Sedes</option>
				@foreach($sedes as $sede)
					<option value="{{ $sede->id }}">{{ $sede->headquarter }}</option>
				@endforeach
				</select>
			</div>

			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</form>
	</div>
	<div>
		<h3>Todos los nucleos...</h3>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>Nucleo</th>
					<th>Sede</th>
				</tr>
			</thead>
			<tbody>
				@foreach($nucleos as $nucleo)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $nucleo->nucleus }}</td>
					<td>{{ ($nucleo->headquarter)?$nucleo->headquarter->headquarter:'' }}</td>
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