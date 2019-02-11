@extends('layouts.template')
@section('content')
<h1>Hola!</h1>
<h2>{{ $teacher->first_name }}&nbsp{{ $teacher->last_name }}</h2>
@endsection