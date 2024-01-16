@extends('layouts.app')

@section('content')
<a href="{{ route('alumno.index') }}">Volver</a>
<h1>{{ $alumno->nombre }}</h1>
<p> {{ $alumno->apellido }} </p>
<p> {{ $alumno->dni }} </p>
@endsection