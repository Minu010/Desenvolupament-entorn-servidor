@extends('layouts.app')

@section('content')
<a href="{{ route('alumno.create') }}">Introduzca un alumno</a>
    <ul>
        @forelse ($alumnos as $alumno)
            <li>
                <a href="{{ route('alumno.show', $alumno->id) }}">{{ $alumno->title }}</a>
                <a href="{{ route('alumno.edit', ['alumno' => $alumno->id]) }}">EDIT</a>
                <form method="POST" action="{{ route('alumno.destroy', $alumno->id )}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" />
                </form>
        @empty
            <p>No data.</p>
        @endforelse
    </ul>
@endsection