@extends('layouts.template')
@section('content')
@include('layouts.alert')

<div class=" uk-width-3-1@s uk-padding-small uk-background-secondary">
	<form class="uk-grid-small" uk-grid method="POST" action="{{ route('historicos.store') }}">
		{{ csrf_field() }}

		<legend class="uk-legend uk-text-center">Historico de docente {{ $teacher->first_name }}&nbsp{{ $teacher->last_name }}</legend>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Movimiento</label>
			<input value="" name="movement" class="uk-input"  id="input" type="text" placeholder="Movimiento">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Area</label>
			<input value="" name="area" class="uk-input"  id="input" type="text" placeholder="area">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Periodo</label>
			<input value="" name="periodo" class="uk-input"  id="input" type="text" placeholder="Periodo">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Fecha de inicio</label>
			<input value="" name="inicio" class="uk-input"  id="input" type="text" placeholder="Condicion">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Fecha de culminacion</label>
			<input value="" name="culminacion" class="uk-input"  id="input" type="text" placeholder="Condicion">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Condicion del docente</label>
			<input value="" name="condicion" class="uk-input"  id="input" type="text" placeholder="Condicion">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Escalafon docente</label>
			<input value="" name="escalafon" class="uk-input"  id="input" type="text" placeholder="Condicion">
		</div>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Categoria docente</label>
			<input value="" name="categoria" class="uk-input"  id="input" type="text" placeholder="Condicion">
		</div>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Comunicacion</label>
			<input value="" name="comunicacion" class="uk-input"  id="input" type="text" placeholder="Condicion">
		</div>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Obsevaciones</label>
			<input value="" name="observaciones" class="uk-input"  id="input" type="text" placeholder="Condicion">
		</div>

		<div class="uk-width-1-1@s">
			<input class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton" type="submit" value="Guardar">
		</div>
	</form>
</div>
@endsection