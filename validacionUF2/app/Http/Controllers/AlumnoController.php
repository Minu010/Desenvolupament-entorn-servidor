<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\http\Requests\AlumnoRequest;

class AlumnoController extends Controller
{
    /*
    C = Create
    R = Read
    U = Update
    D = Delete
    */

    public function index(): View
    {
        $alumnos = Alumno::all();
        return view('alumno.index', compact('alumnos'));
    }

    public function create(): View
    {
        return view('alumno.create');
    }

    public function store(AlumnoRequest $request): RedirectResponse
    {

        /*Alumno::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,   
            'dni' => $request->dni 
        ]);*/

        Alumno::create($request->all());

        return redirect()->route('alumno.index')->with('success','alumno created');
    }

    public function edit(alumno $alumno)
    {
        return view('alumno.edit', compact('alumno'));
    }

    public function update(AlumnoRequest $request, Alumno $Alumno): RedirectResponse
    {
        /*
            POO
            $Alumno = Alumno::find($Alumno);
            $Alumno->title = request->title;
            $Alumno->description = request->description;
            $Alumno->save();

            variante
            $Alumno->create([
                'title' => $request->title,
                'description' => $request->description 
            ]);

        */

        /*
            Validar información forma sencilla:

            $request->validate([
                'title' =>'required|max:255|min:3',
                'description' =>'required|max:255|min:3'
            ]);
        */
        $Alumno->update($request->all());
        return redirect()->route('alumno.index')->with('success','alumno updated');
    }

    public function show(Alumno $alumno): View
    {
        return view('alumno.show', compact('alumno'));
    }

    public function destroy(Alumno $alumno): RedirectResponse
    {
        $alumno->delete();
        return redirect()->route('alumno.index')->with('danger','alumno deleted');
    }
}
