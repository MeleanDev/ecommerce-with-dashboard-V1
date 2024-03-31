<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Regisapp;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Categoria::all();
        return view('admin.categorias', compact('datos'));
    }

    public function crear(Request $request)
    {
        try {
                Categoria::create($request->all());

                $nombre = auth()->user()->name;
                $fecha = auth()->user()->name = now();

                Regisapp::create([
                    "usuario"=> $nombre,
                    "accion"=>"Creo una Categoria : ".$request->categoria,
                    "last_login"=> $fecha,
                ]);

                return redirect()->route('admin.categorias')->with('correctamente','Categoria Creada Con Exito');
        }catch (\Throwable $th) {
            return redirect()->route('admin.categorias')->with('incorrectamente','Categoria No Creada');
        }
    }

    public function eliminar($id){
        try {
            $usuario = Categoria::find($id); // Obtén el modelo del registro que deseas eliminar

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Elimino la Categoria : ".$usuario->categoria,
                "last_login"=> $fecha,
            ]);

            $usuario->delete(); // Elimina el registro de la base de datos

            return redirect()->route('admin.categorias')->with('eliminado','Categoria Eliminada');
        } catch (\Throwable $th) {
            return redirect()->route('admin.categorias')->with('noeliminado','Categoria No Eliminada');
        }
        
    }
}
