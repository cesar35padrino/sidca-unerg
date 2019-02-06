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
	<form class="uk-grid-small" uk-grid method="POST" action="{{route('profesores.store')}}">
		{{ csrf_field() }}

		<legend class="uk-legend uk-text-center">SIDCA - Registro</legend>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Cedula</label>
			<input value="{{ old('identity') }}" name="identity" class="uk-input"  id="input" type="number" placeholder="Cedula">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Nombres</label>
			<input value="{{ old('first_name') }}" name="first_name" id="first_name" class="uk-input" type="text" placeholder="Nombres">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Apellidos</label>
			<input value="{{ old('last_name') }}" name="last_name" id="last_name" class="uk-input" type="text" placeholder="Apellidos">
		</div>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Telefono 1</label>
			<input value="{{ old('phone1') }}" name="phone1" class="uk-input"  id="phone1" type="number" placeholder="Telefono Movil">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Telefono 2</label>
			<input value="{{ old('phone2') }}" class="uk-input" name="phone2"  id="phone2" stype="number" placeholder="Telefono Casa">
		</div>
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Fecha de Nacimiento</label>
			<input value="{{ old('birthdate') }}" class="uk-input" id="birthdate" name="birthdate" type="date" placeholder="Fecha de Nac">
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Direccion</label>
			<input value="{{ old('address') }}" class="uk-input" type="text" id="address" name="address" placeholder="Direccion">
		</div>						
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Correo Personal</label>
			<input value="{{ old('email1') }}" class="uk-input" type="email" placeholder="Correo Personal" id="email1" name="email1">
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Correo Institucional</label>
			<input value="{{ old('email2') }}" class="uk-input" id="email2" name="email2" type="email" placeholder="Correo Institucional @unerg.edu.ve">
		</div>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Pais</label>
			<select class="uk-select" name="countrie_id" id="pais">

				<option value="{{ old('countrie_id') }}">Pais</option>
				@forelse($paises as $pais)
				<option value="{{$pais->id}}">{{$pais->country}}</option>
				@empty
				Esta Vacio!
				@endforelse
			</select>
		</div><div class="uk-width-1-4@s">
			<label class="uk-form-label">Estado</label>
			<select name="state_id" class="uk-select" id="estados" disabled>

				<option  value="{{ old('state_id') }}">Estados</option>
				@forelse($estados as $estado)
				<option value="{{$estado->id}}">{{$estado->states}}</option>
				@empty
				Esta Vacio!
				@endforelse
			</select>
		</div>
		<!-- <div class="uk-width-1-4@s">
			<select class="uk-select" name="municipality_id" id="form-stacked-select" placehoder="Sidca">

				<option value="{{ old('municipality_id') }}">Municipio</option>
				<option value="1">simon bolivar</option>
			</select>
		</div>
		<div class="uk-width-1-4@s">
			<select class="uk-select" name="parish_id" id="form-stacked-select">

				<option value="{{ old('parish_id') }}">Parroquia</option>
				<option value="1">Camburito</option>
			</select>
		</div> -->
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Sede</label>
			<select class="uk-select" name="headquarters_id" id="form-stacked-select">
				<option value="{{ old('headquarters_id') }}" >Sede</option>
				@forelse($sedes as $sede)
				<option value="{{$sede->id}}">{{$sede->headquarter}}</option>
				@empty
				Esta Vacio!
				@endforelse
			</select>
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Clasificacion</label>
			<select class="uk-select" name="classification_id" id="form-stacked-select">
				<option  value="{{ old('classification_id') }}">Clasificacion</option>
				@forelse($clasificaciones as $clasificacion)
				<option value="{{$clasificacion->id}}">{{$clasificacion->classification}}</option>
				@empty
				Esta Vacio!
				@endforelse
			</select>
		</div>

		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Estatus</label>
			<select class="uk-select" name="status" id="form-stacked-select">
				<option value="">Estatus</option>
				<option value="1">Activo</option>
				<option value="2">Inactivo</option>
			</select>
		</div>
		<div class="uk-width-1-1@s">
			<label class="uk-form-label">Observaciones</label>
				<textarea class="uk-textarea" name="observation" value="{{ old('observation') }}" rows="2" placeholder="Observaciones"></textarea>
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
		$('#pais').change( function (event) {
			event.preventDefault();

			var selected = $( "select option:selected" ).val();
			var estados = document.querySelector('#estados');

			
			if (selected == 233) {
				$('#estados').removeAttr('disabled');
			} else {
				estados.setAttribute("disabled", "");
			}
			
		} );
	</script>
@stop