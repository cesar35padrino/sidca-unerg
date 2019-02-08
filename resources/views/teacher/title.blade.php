@extends('layouts.template')
@section('content')
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
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Titulo</label>
			<input value="{{ old('title') }}" name="title" class="uk-input ci_import"  id="ci_import" type="number" placeholder="Titulo">
		</div>
		
		<div class="uk-width-1-1@s">
			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</div>
	</form>
</div>
<!-- /FORM -->
@endsection

@section('js')
	<script type="text/javascript">
	</script>
@stop