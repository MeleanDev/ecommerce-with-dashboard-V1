<?php

namespace App\Http\Controllers;

use App\Models\Regisapp;
use App\Models\Suscrito;
use Illuminate\Http\Request;

class SuscritoController extends Controller
{
    public function index()
    {
        $Suscritos = Suscrito::all();
        return view('admin.suscrito', compact('Suscritos'));
    }

    public function crear(Request $datos)
    {
        try {
            Suscrito::create($datos->all());
            $fecha = now();

            Regisapp::create([
                "usuario"=> "la tienda",
                "accion"=>"Creo un nuevo suscrito : ".$datos->correo,
                "last_login"=> $fecha,
            ]);
            return redirect()->route('inicio')->with('suscrito','Suscrito a los boletines');
        } catch (\Throwable $th) {
            return redirect()->route('inicio')->with('nosuscrito','Error al Suscribirte');
        }
    }

    public function eliminar($id){
        try {
            $usuario = Suscrito::find($id); // Obtén el modelo del registro que deseas eliminar

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Elimino un Suscrito : ".$usuario->correo,
                "last_login"=> $fecha,
            ]);
            $usuario->delete(); // Elimina el registro de la base de datos
            return redirect()->route('admin.suscrito')->with('eliminado','Suscrito Eliminado');
        } catch (\Throwable $th) {
            return redirect()->route('admin.suscrito')->with('noeliminado','No se elimino ningun Suscrito');
        }
        
    }
}
