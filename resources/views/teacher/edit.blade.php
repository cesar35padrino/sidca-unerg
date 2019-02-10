@extends('layouts.template')
@section('content')
@include('layouts.alert')

<div>
	<ul>
		<li>
			<a href="{{ route('history.new',$teacher->id) }}" title="Historico docente">Historico docente</a>
		</li>
		<li>
			<a href="{{ route('title.new',$teacher->id) }}" title="Titulos obtenidos">Titulos obtenidos</a>
		</li>
		<li>
			<a href="{{ route('document.new',$teacher->id) }}" title="Documentos">Documentos</a>
		</li>
		<li>
			<a href="{{ $teacher->id }}" title="Cursos realizados">Cursos realizados</a>
		</li>
		<li>
			<a href="{{ $teacher->id }}" title="Experiencia laboral">Experiencia laboral</a>
		</li>
		<li>
			<a href="{{ $teacher->id }}" title="Productos de investigacion">Productos de investigacion</a>
		</li>
		<li>
			<a href="{{ $teacher->id }}" title="Participacion en eventos">Participacion en eventos</a>
		</li>
		<li>
			<a href="{{ $teacher->id }}" title="Formacion de talentos">Formacion de talentos</a>
		</li>
		<li>
			<a href="{{ $teacher->id }}" title="Actividades academicas, cientificas y tecnologicas">Actividades academicas, cientificas y tecnologicas</a>
		</li>
	</ul>
</div>
<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">
	<form class="uk-grid-small" uk-grid method="POST" action="{{route('profesores.update',$teacher->id)}}">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}

		<legend class="uk-legend uk-text-center">SIDCA - Actualizar Datos</legend>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Cedula</label>
			<input value="{{ $teacher->identity }}" name="identity" class="uk-input"  id="input" type="number" placeholder="Cedula">
		</div>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Nombres</label>
			<input value="{{ $teacher->first_name }}" name="first_name" class="uk-input" type="text" placeholder="Nombres">
		</div>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Apellidos</label>
			<input value="{{ $teacher->last_name }}" name="last_name" class="uk-input" type="text" placeholder="Apellidos">
		</div>
		<!-- Phones -->
		@if($count_phones == 2)
		@foreach($teacher->phones as $key => $phone)
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Telefono {{ $i++ }}</label>
			<input value="{{ $phone->number }}" name="phones[]" class="uk-input"  id="input" type="number" placeholder="Telefono Movil">
		</div>
		@endforeach
		@else
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Telefono 1</label>
			<input value="{{ $teacher->phones->number }}" name="phones[]" class="uk-input"  id="input" type="number" placeholder="Telefono Movil">
		</div>
		
		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Telefono 2</label>
			<input value="" name="phones[]" class="uk-input"  id="input" type="number" placeholder="Telefono Casa">
		</div>
		@endif
		<!-- /Phones -->

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Fecha de Nacimiento</label>
			<input value="{{ $teacher->birthdate }}" class="uk-input" id="input" name="birthdate" type="date" placeholder="Fecha de Nac">
		</div>

		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Direccion</label>
			<input value="{{ $teacher->address }}" class="uk-input" type="text" name="address" placeholder="Direccion">
		</div>	
		
		<!-- Emails -->
		@if($count_emails == 2)
		@foreach($teacher->emails as $correo)
			<div class="uk-width-1-2@s">
				<label class="uk-form-label">Correo {{ $j++ }}</label>
				<input value="{{ $correo->email }}" name="emails[]" class="uk-input"  id="input" type="email" placeholder="Correo Personal" required>
			</div>
		@endforeach
		@else
			<div class="uk-width-1-2@s">
				<label class="uk-form-label">Correo 1</label>
				<input value="{{ $teacher->find($teacher->id)->emails->first()->email }}" name="emails[]" class="uk-input"  id="input" type="email" placeholder="Correo Personal">
			</div>

			<div class="uk-width-1-2@s">
				<label class="uk-form-label">Correo 2</label>
				<input value="" name="emails[]" class="uk-input"  id="input" type="email" placeholder="Correo Institucional">
			</div>
		@endif
		<!-- /Email -->

		<div class="uk-width-1-4@s">
		<label class="uk-form-label">Pais</label>
			<select class="uk-select" name="countrie_id" id="form-stacked-select">
				@foreach($paises as $pais)
					@if($teacher->countrie_id == $pais->id)
						<option selected value="{{ $pais->id }}">{{ $pais->country }}</option>
					@endif
					<option value="{{ $pais->id }}">{{ $pais->country }}</option>
				@endforeach
			</select>
		</div>

		<div class="uk-width-1-4@s">
			<label class="uk-form-label">Estado</label>
			<select name="state_id" class="uk-select" id="form-stacked-select">
				@foreach($estados as $estado)
					@if($teacher->state_id == $estado->id)
						<option selected value="{{ $estado->id }}">{{ $estado->states }}</option>
					@endif
					<option value="{{ $estado->id }}">{{ $estado->states }}</option>
				@endforeach
			</select>
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Sede</label>
			<select class="uk-select" name="headquarters_id" id="form-stacked-select">
				@foreach($sedes as $sede)
					@if($teacher->sede_id == $sede->id)
						<option selected value="{{ $sede->id }}">{{ $sede->headquarter }}</option>
					@endif
					<option value="{{ $sede->id }}">{{ $sede->headquarter }}</option>
				@endforeach
			</select>
		</div>
		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Clasificacion</label>
			<select class="uk-select" name="classification_id" id="form-stacked-select">
				@foreach($clasificaciones as $clasificacion)
					@if($teacher->classification_id == $clasificacion->id)
						<option selected value="{{ $clasificacion->id }}">{{ $clasificacion->classification }}</option>
					@endif
					<option value="{{ $clasificacion->id }}">{{ $clasificacion->classification }}</option>
				@endforeach
			</select>
		</div>

		<div class="uk-width-1-2@s">
			<label class="uk-form-label">Estatus</label>
			<select class="uk-select" name="status" id="form-stacked-select">
				@if($teacher->status == 'activo')
					<option selected value="Activo">Activo</option>
					<option value="Inactivo">Inactivo</option>
				@else
					<option value="Activo">Activo</option>
					<option selected value="Inactivo">Inactivo</option>
				@endif
			</select>
		</div>

		<div class="uk-width-1-1@s">
			<label class="uk-form-label">Observaciones</label>
			<textarea class="uk-textarea" name="observation" value="" rows="2" placeholder="Observaciones">{{ $teacher->observation }}</textarea>
		</div>

		<div class="uk-width-1-1@s">
			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</div>
	</form>
</div>
@endsection