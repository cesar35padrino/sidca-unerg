@extends('layouts.template')
@section('content')
@include('layouts.alert')
<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">
	<div class="uk-width-1-1@s">
		<h3>PERIODOS</h3>
		<form method="post" accept-charset="utf-8" action="{{ route('periodos.store') }}">
			{{ csrf_field() }}
			<input class="uk-width-1-1 uk-margin-small-bottom" type="number" name="perid" value="" placeholder="Periodo">

			<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" name="boton">Guardar</button>
		</form>
	</div>
	<div>
		<h3>Todos los periodos...</h3>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>Periodo</th>
					<th>Opcion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($periodos as $periodo)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $periodo->perid }}</td>
					<td>
						<form action="{{ route('periodos.destroy',$periodo->id) }}" method="post">
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