@extends('layouts.template')
@section('content')
<!-- REPORT -->
<div class=" uk-width-1-1@s uk-padding-small uk-background-secondary uk-overflow-auto">
	<!-- TABLA DE DATOS -->

	<div class="uk-width-1-1" >
		<h3 class="uk-align-left">PROFESORES</h3>
		<div class="uk-align-right uk-flex uk-flex-stretch">
			<form class="uk-search uk-search-default" method="get" action="{{ route('profesores.index') }}">
				<span uk-search-icon></span>
				<input class="uk-search-input" name="search" type="search" placeholder="Buscar">
			</form>
		</div>
	</div>

	<table class="uk-table uk-table-expand uk-table-striped uk-table-divider">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Nucleo/Sede</th>
				<th>Estatus</th>
				<th>Accion</th>

			</tr>
		</thead>
		<tbody>
			@forelse($teachers as $teacher)
			
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $teacher->identity }}</td>
				<td>{{ $teacher->first_name }}</td>
				<td>{{ $teacher->last_name }}</td>
				<td>{{ $teacher->headquarter->headquarter }}</td>
				<td>{{ $teacher->status }}</td>

				<td>
					<a title="Editar profesor" href="{{ route('profesores.edit', $teacher->id) }}" uk-toggle uk-icon="file-edit" ></a>
					<a title="Expediente del profesor" href="{{ route('profesores.casefile', $teacher->id) }}" uk-icon="info"></a>
				</td>

			</tr>
			@include('layouts.modify')
			@empty

			<h3>No existen datos.</h3>

			@endforelse
		</tbody>

	</table>
</div>

<!-- /REPORT -->
@endsection