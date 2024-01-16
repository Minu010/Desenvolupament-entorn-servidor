@extends('layouts.app')

@section('content')

<a href="{{ route('alumno.index') }}">Volver</a>
    <form method="post" action="{{ route('alumno.store') }}">
        @csrf
        <label for="">Alumno:</label>
        <input type="text" name="nombre" /> <br>

        @error('nombre')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="">Apellido:</label>
        <input type="text" name="apellido" /> <br>

        @error('apellido')
        <p style="color: red">{{ $message }}</p>
        @enderror
        

        <label for="">DNI:</label>
        <input type="text" name="dni" /> <br>

        @error('dni')
        <p style="color: red">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="create" />
    </form>
@endsection