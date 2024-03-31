<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Regisapp;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Producto::paginate(9);
        $dato = Producto::all();
        $categorias = Categoria::all();
        return view('admin.productos', compact('datos', 'categorias','dato'));
    }

    public function crear(Request $request)
    {
        try {

            $filename = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('productos'), $filename);

            $informacion = new Producto();
            $informacion->nombre = $request->nombre;
            $informacion->foto = 'productos/'.$filename;
            $informacion->categoria = $request->categoria;
            $informacion->cantidad = $request->cantidad;
            $informacion->precio = $request->precio;
            $informacion->antiguo = $request->antiguo;
            $informacion->save();

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Creo un nuevo Producto : ".$request->nombre,
                "last_login"=> $fecha,
            ]);

            return redirect()->route('admin.productos')->with('correctamente','Producto agregado');
        } catch (\Throwable $th) {
            return redirect()->route('admin.productos')->with('incorrectamente','Producto no agregado');
        }
        
    }

    public function editar(Request $dat, Producto $id)
    {
        try {
            // $id->update($dat->all());

            if ($dat->hasFile('foto')) {

                // Eliminar la imagen anterior
                if (file_exists(public_path($id->foto))) {
                  unlink(public_path($id->foto));
                }
              
                // Guardar la nueva imagen
                $filename = time().'.'.$dat->foto->extension();
                $dat->foto->move(public_path('productos'), $filename);
              
                // Actualizar la información del producto
                $id->foto = 'productos/' . $filename;
                $id->nombre = $dat->nombre;
                $id->categoria = $dat->categoria;
                $id->cantidad = $dat->cantidad; 
                $id->precio = $dat->precio;
                $id->antiguo = $dat->antiguo;
                $id->save();
              
              } else {
              
                // Actualizar la información del producto
                $id->nombre = $dat->nombre;
                $id->categoria = $dat->categoria;
                $id->cantidad = $dat->cantidad; 
                $id->precio = $dat->precio;
                $id->antiguo = $dat->antiguo;
                $id->save();
              
              }

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Edito el Producto : ".$dat->nombre,
                "last_login"=> $fecha,
            ]);
            return redirect()->route('admin.productos')->with('editado','Producto editado');;
        } catch (\Throwable $th) {
            return redirect()->route('admin.productos')->with('noeditado','Producto no editado');;
        }

    }

    public function eliminarB($id){
        try {
            $usuario = Producto::find($id); // Obtén el modelo del registro que deseas eliminar

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Elimino un Producto : ".$usuario->nombre,
                "last_login"=> $fecha,
            ]);

            $usuario->delete(); // Elimina el registro de la base de datos
            return redirect()->route('admin.productos')->with('eliminado','Producto Eliminado');
        } catch (\Throwable $th) {
            return redirect()->route('admin.productos')->with('noeliminado','No se elimino ningun Producto');
        }
    }

    public function eliminar(Request $request){
        try {
            $usuario = Producto::where('nombre', $request->nombre)->first(); // Obtén el modelo del registro que deseas eliminar

            $nombre = auth()->user()->name;
            $fecha = auth()->user()->name = now();

            Regisapp::create([
                "usuario"=> $nombre,
                "accion"=>"Elimino un Producto : ".$usuario->nombre,
                "last_login"=> $fecha,
            ]);
            $usuario->delete(); // Elimina el registro de la base de datos
            return redirect()->route('admin.productos')->with('eliminado','Producto Eliminado');
        } catch (\Throwable $th) {
            return redirect()->route('admin.productos')->with('noeliminado','No se elimino ningun Producto');
        }
        
    }
}
