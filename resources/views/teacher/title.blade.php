@extends('layouts.template')
@section('content')
@section('css') 
    <link href="{{ asset('chosen/chosen.css') }}" rel="stylesheet">
@stop
<!-- FORM -->
<!-- ALERTAS -->
<div class="uk-container uk-position-top uk-align-center">
	
	@if($errors->all())
	<div class="uk-align-center uk-text-center uk-alert-danger" uk-alert="animation:true">
		@foreach($errors->all() as $error)
		<button class="uk-alert-close uk-close-large" id="close" type="button" uk-close></button>
		<p><strong>{{ $error }}</strong></p>
		@endforeach
	</div>
	@endif
	@if(session('info'))
	<div class="uk-align-center uk-text-center uk-alert-success" uk-alert>
		<button class="uk-alert-close" id="close" type="button" uk-close></button>
		<p><strong>{{ session('info') }}</strong></p>
	</div>
	@endif
<!-- ALERTAS -->
</div>
<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">
	<form class="uk-grid-small" uk-grid method="POST" action="{{route('profesores.store')}}">
		{{ csrf_field() }}

		<legend class="uk-legend uk-text-center">SIDCA - Titulos</legend>
		<div class="uk-width-1-1@s">
			<h4 align="center">{{ $teacher->first_name }}&nbsp{{ $teacher->last_name }}</h4>
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Fecha de emision</label>
			<input value="{{ old('title') }}" name="title" class="uk-input ci_import"  id="ci_import" type="number" placeholder="Titulo">
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Fecha de consignacion</label>
			<input value="{{ old('title') }}" name="title" class="uk-input ci_import"  id="ci_import" type="number" placeholder="Titulo">
		</div>
		<div class="uk-width-1-1@s">
			<select id="select" class="select" name="title">
				<option value="">Ninguno</option>
			@foreach($titles as $title)
				<option value="{{ $title->id }}">{{ $title->name }}</option>
			@endforeach
			</select>
		</div>
		
		<div class="uk-width-1-1@s">
			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</div>
	</form>
</div>
<!-- /FORM -->
@endsection

@section('js')
	<script src="{{ asset('chosen/chosen.jquery.js') }}"></script>
	<script>
	$(".select").chosen({
	    no_results_text: "Oops, no se encontraron resultados! para ",
	    width: "45%",
	    rtl: true
	});
	</script>
@stop