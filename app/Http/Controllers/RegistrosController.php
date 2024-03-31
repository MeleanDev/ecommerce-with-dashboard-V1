<?php

namespace App\Http\Controllers;

use App\Models\Regisapp;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Regisapp::all();
        return view('admin.registros', compact('datos'));
    }

    public function eliminar(Request $request)
    {
        try {
            $repuesta = $request->repuesta;
            if ($repuesta === "Estoy Seguro de eliminar todo el registro") {

                Regisapp::truncate();
                
                $nombre = auth()->user()->name;
                $fecha = auth()->user()->name = now();

                Regisapp::create([
                    "usuario"=> $nombre,
                    "accion"=>"Elimino Todos los registros",
                    "last_login"=> $fecha,
                ]);
                return redirect()->route('admin.registroActs')->with('correctamente','Todos los registro fueron eliminados');
            }
            return redirect()->route('admin.registroActs')->with('noeliminados','Los registros No se eliminaron');
        } catch (\Throwable $th) {
            return redirect()->route('admin.registroActs')->with('noeliminados','Los registros No se eliminaron');
        }
        
    }
}
