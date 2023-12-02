<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index()
    {
        $datos = DB::select("select * from pokemon");
        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::insert("insert into pokemon(Id, Nombre, Tipo, Tamaño, Peso) values(?, ?, ?, ?, ?)", [
                $request->Id,
                $request->Nombre,
                $request->Tipo,
                $request->Tamaño,
                $request->Peso
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto", "Pokémon registrado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar");
        }
    }

    public function update(Request $request)
    {
        try {
            $sql = DB::update("update pokemon set Nombre=?, Tipo=?, Tamaño=?, Peso=? where Id=?", [
                $request->Nombre,
                $request->Tipo,
                $request->Tamaño,
                $request->Peso,
                $request->Id,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto", "Pokémon modificado correctamente");
        } else {
            return back()->with("incorrecto", "Error al modificar");
        }
    }

    public function delete($Id)
    {
        try {
            $sql = DB::delete("delete from pokemon where Id=?", [$Id]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto", "Pokémon eliminado correctamente");
        } else {
            return back()->with("incorrecto", "Error al eliminar");
        }
    }
}
