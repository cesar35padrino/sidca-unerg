@extends('layouts.template')
@section('content')
@section('css')
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
	<form class="uk-grid-small" uk-grid method="POST"  enctype="multipart/form-data" action="{{route('documentos.store')}}">
		{{ csrf_field() }}

		<legend class="uk-legend uk-text-center">DOCUMENTO</legend>
		<div class="uk-width-1-1@s">
			<h4 align="center">Docente: {{ $teacher->first_name }}&nbsp{{ $teacher->last_name }}</h4>
		</div>
		<input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Tipo de documento</label>
			<select name="type">
				<option value="cedula">Cedula</option>
				<option value="foto">Fotografia</option>
				<option value="p.nacimiento">Partida de nacimiento</option>
			</select>
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Imagen</label>
			<input type="file" name="file" value="" placeholder="">
		</div>
		
		<div class="uk-width-1-1@s">
			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</div>
	</form>
</div>
<!-- /FORM -->
@endsection

@section('js')
@stop