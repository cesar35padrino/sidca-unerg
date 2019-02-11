@extends('layouts.template')
@section('content')
@include('layouts.alert')

<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">

	<div class="uk-width-1-1@s">
		<h3>SEDES</h3>
		<form method="post" accept-charset="utf-8" action="{{ route('sedes.store') }}">
			{{ csrf_field() }}
			<input class="uk-width-1-1 uk-margin-small-bottom" type="text" name="headquarter" value="" placeholder="Nombre">

			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</form>
	</div>
	<div>
		<h3>Todas las sedes...</h3>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>Sede</th>
					<th>Opcion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sedes as $sede)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $sede->headquarter }}</td>
					<td>
						<form action="{{ route('sedes.destroy',$sede->id) }}" method="post">
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