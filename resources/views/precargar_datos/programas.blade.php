@extends('layouts.template')
@section('content')
@include('layouts.alert')

<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">

	<div class="uk-width-1-1@s">
		<h3>PROGRAMAS</h3>
		<form method="post" accept-charset="utf-8" action="{{ route('programas.store') }}">
			{{ csrf_field() }}
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="program" value="" placeholder="Programa">
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="director" value="" placeholder="Director">
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="resolution" value="" placeholder="Resolucion">
			<div style="margin-bottom: 10px;" class="uk-width-1-1@s">
				<select id="select" class="select" name="area_id">
					<option value="">Area</option>
				@foreach($areas as $area)
					<option value="{{ $area->id }}">{{ $area->area }}</option>
				@endforeach
				</select>
			</div>


			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</form>
	</div>
	<div>
		<h3>Todos los programas...</h3>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>Programa</th>
					<th>Director</th>
					<th>Resolucion</th>
					<th>Area</th>
					<th>Opcion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($programas as $programa)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $programa->program }}</td>
					<td>{{ $programa->director }}</td>
					<td>{{ $programa->resolution }}</td>
					<td>{{ ($programa->area)?$programa->area->area:'' }}</td>
					<td>
						<form action="{{ route('programas.destroy',$programa->id) }}" method="get" accept-charset="utf-8">
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