<?php

namespace App\Http\Controllers;

use App\Http\Requests\productoRequest;
use App\Models\Empresa;
use App\Models\Regisapp;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa = Empresa::all();
        return view('admin.empresa', compact('empresa'));
    }
    
    public function crear(productoRequest $request)
    {
        try {
            if ($request->hasFile('foto')) {
                $fot = Empresa::first();
                // Eliminar la imagen anterior
                if (file_exists(public_path($fot->foto))) {
                  unlink(public_path($fot->foto));
                }
            }
            
            Empresa::truncate();

            $filename = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('empresa'), $filename);

            $informacion = new Empresa();
            $informacion->nombre = $request->nombre;
            $informacion->foto = 'empresa/'.$filename;
            $informacion->prefijo = $request->prefijo;
            $informacion->telefono = $request->telefono;
            $informacion->correo = $request->correo;
            $informacion->ubicacion = $request->ubicacion;
            $informacion->save();

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Edito datos de la Empresa",
                "last_login"=> $fecha,
            ]);
            return redirect()->route('admin.empresa')->with('correctamente','Datos de la empresa rellenado con exito');
        } catch (\Throwable $th) {
            return redirect()->route('admin.empresa')->with('incorrectamente','Datos de la empresa no rellenados');
        }
    }
}
