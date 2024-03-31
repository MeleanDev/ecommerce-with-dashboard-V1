<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Regisapp;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $datos = Cliente::all();
        return view('admin.clientes', compact('datos'));
    }

    public function crear(Request $request)
    {
        try {
            Cliente::create($request->all());
            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Creo un nuevo Cliente : ".$request->nombre,
                "last_login"=> $fecha,
            ]);
            return redirect()->route('admin.clientes')->with('correctamente','Cliente Creada Con Exito');
        } catch (\Throwable $th) {
            return redirect()->route('admin.clientes')->with('incorrectamente','Cliente No Creada');
        }
    }

    public function editar(Request $dat, Cliente $id)
    {
        try {
            $id->update($dat->all());
            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Edito un cliente : ".$dat->nombre,
                "last_login"=> $fecha,
            ]);
            return redirect()->route('admin.clientes')->with('editado','Cliente editada Con Exito');
        } catch (\Throwable $th) {
            return redirect()->route('admin.clientes')->with('noeditado','Cliente no editada');
        }
    }

    public function eliminar($id)
    {
        try {
            $usuario = Cliente::find($id); // Obtén el modelo del registro que deseas eliminar

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Elimino un cliente : ".$usuario->nombre,
                "last_login"=> $fecha,
            ]);
            $usuario = Cliente::find($id); // Obtén el modelo del registro que deseas eliminar
            $usuario->delete(); // Elimina el registro de la base de datos
            return redirect()->route('admin.clientes')->with('eliminado','Cliente eliminada');
        } catch (\Throwable $th) {
            return redirect()->route('admin.clientes')->with('noeliminado','Cliente No eliminada');
        }
       
    }
}
