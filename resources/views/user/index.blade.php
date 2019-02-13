@extends('layouts.template')
@section('content')
@include('layouts.alert')

<table class="uk-table uk-table-divider uk-table-striped">
	<thead>
		<tr>
			<th>Uuario</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Opcion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($usuarios as $usuario)
		<tr>
			<td>{{ $usuario->user }}</td>
			<td>{{ $usuario->first_name }}</td>
			<td>{{ $usuario->last_name }}</td>
			<td>
				<form action="{{ route('usuarios.destroy',$usuario->id) }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<button type="submit">Eliminar</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection