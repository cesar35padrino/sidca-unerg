@extends('layouts.template')
@section('content')
<!-- FORM -->
<!-- ALERTA DE ERROR -->
<div class="uk-container uk-position-top uk-align-center">	
	@if($errors->all())
	<div class="uk-align-center uk-text-center uk-alert-danger" uk-alert="animation:true">
		@foreach($errors->all() as $error)
		<button class="uk-alert-close uk-close-large" id="close" type="button" uk-close></button>
		<p><strong>{{ $error }}</strong></p>
		@endforeach
	</div>
	@endif

	<!-- ALERTA DE SUCCESS -->
	@if(session('info'))
	<div class="uk-align-center uk-text-center uk-alert-success" uk-alert>
		<button class="uk-alert-close" id="close" type="button" uk-close></button>
		<p><strong>{{ session('info') }}</strong></p>
	</div>
	@endif
</div>

<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">
	<form class="uk-grid-small" uk-grid method="POST" action="{{route('nominas.store')}}">
		{{ csrf_field() }}

		<legend class="uk-legend uk-text-center">NOMINA</legend>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Memo</label>
			<input value="{{ old('first_name') }}" name="first_name" id="first_name" class="uk-input" type="text" placeholder="Nombres">
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Fecha de inicio</label>
			<input value="{{ old('date_start') }}" class="uk-input" id="date_start" name="date_start" type="date" placeholder="Fecha de Nac">
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Fecha de culminacion</label>
			<input value="{{ old('date_end') }}" class="uk-input" id="date_end" name="date_end" type="date" placeholder="Fecha de Nac">
		</div>
		<div class="uk-width-1-1@s">
			<label class="uk-form-label">Area</label>
			<select class="uk-select" name="area_id" id="form-stacked-select">
				@forelse($areas as $area)
				<option value="{{$area->id}}">{{$area->area}} ({{ $area->code }})</option>
				@empty
				Esta Vacio!
				@endforelse
			</select>
		</div>
		<div class="uk-width-1-1@s">
			<label class="uk-form-label">Sede</label>
			<select class="uk-select" name="headquarter_id" id="form-stacked-select">
				@forelse($sedes as $sede)
				<option value="{{$sede->id}}">{{$sede->headquarter}}</option>
				@empty
				Esta Vacio!
				@endforelse
			</select>
		</div>
		<div class="uk-width-1-1@s">
			<label class="uk-form-label">Programa</label>
			<select class="uk-select" name="headquarters_id" id="form-stacked-select">
				@forelse($programas as $programa)
				<option value="{{$programa->id}}">{{$programa->program}}</option>
				@empty
				Esta Vacio!
				@endforelse
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
@stop