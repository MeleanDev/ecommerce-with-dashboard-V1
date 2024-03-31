<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Producto;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa = Empresa::all();
        $categoria = Categoria::all();
        $producto = Producto::paginate(9);
        return view('tienda.index', compact('categoria', 'producto', 'empresa'));
    }

    public function categoria($categ)
    {
        $nombre = $categ;
        $empresa = Empresa::all();
        $categoria = Categoria::all();
        $producto = Producto::where('categoria', $categ)->paginate(9);
        return view('tienda.categoria', compact('categoria', 'producto', 'empresa', 'nombre'));
    }
}
