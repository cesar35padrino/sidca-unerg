@extends('layouts.template')
@section('content')
@include('layouts.alert')

<div class=" uk-width-3-1@s uk-padding-small uk-background-secondary">
	<div>
		<h3>Expediente del docente</h3>
		<h5>{{ $profesor->first_name }}&nbsp{{ $profesor->last_name }}</h5>
	</div>
	<div>
		<h3>Historico del docente</h3>
		<ul>
			<li>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</li>
		</ul>
		
	</div>
</div>
@endsection