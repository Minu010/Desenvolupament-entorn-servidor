@extends('layouts.app')

@section('content')
<a href="{{ route('alumno.index') }}">Volver</a>
<form action="{{ route('alumno.update', $alumno->id) }}" method="POST">
    @method('PUT')
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ 'nombre', $alumno->nombre }}"> <br>

    @error('title')
        <p style="color: red">{{ $message }}</p>
     @enderror

    <label>Apellido:</label>
    <input type="text" name="apellido" value="{{ 'apellido', $alumno->apellido }}"> <br>

    <label>DNI:</label>
    <input type="text" name="dni" value="{{ 'dni', $alumno->dni }}"> <br>

    @error('description')
    <p style="color: red">{{ $message }}</p>
    @enderror

    <input type="submit" value="update" />
</form>
@endsection