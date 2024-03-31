<?php

namespace App\Http\Controllers;

use App\Models\Regisapp;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = user::all();
        return view('admin.usuariosAdmin', compact('datos'));
    }

    public function crear(Request $request)
    {
        try {
            user::create([
                "name"=> $request->name,
                "email"=> $request->email,  
                "password"=> Hash::make($request->password)     
            ]);

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Creo un usuario admin : ".$request->name,
                "last_login"=> $fecha,
            ]);

            return redirect()->route('admin.usuarioAdmin')->with('correctamente','Usuario Admin Agregado');
        } catch (\Throwable $th) {
            return redirect()->route('admin.usuarioAdmin')->with('incorrectamente','Usuario Admin No Agregado');
        }
    }

    public function editar(Request $dat, user $id)
    {
        try {
            $id->update([
                "name"=> $dat->name,
                "email"=> $dat->email,  
                "password"=> Hash::make($dat->password)     
            ]);

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"edito al usuario admin : ".$dat->name,
                "last_login"=> $fecha,
            ]);

            return redirect()->route('admin.usuarioAdmin')->with('editado','Usuario Admin editado');
    
        } catch (\Throwable $th) {
            return redirect()->route('admin.usuarioAdmin')->with('noeditado','Usuario Admin no editado');
        }
    }

    public function eliminar($id){
        try {
            $usuario = user::find($id); // Obtén el modelo del registro que deseas eliminar

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Elimino al usuario admin : ".$usuario->name,
                "last_login"=> $fecha,
            ]);

            $usuario->delete(); // Elimina el registro de la base de datos

            return redirect()->route('admin.usuarioAdmin')->with('eliminado','Usuario Admin eliminado');
        } catch (\Throwable $th) {
            return redirect()->route('admin.usuarioAdmin')->with('noeliminado','Usuario Admin noeliminado');
        }
    }
}
