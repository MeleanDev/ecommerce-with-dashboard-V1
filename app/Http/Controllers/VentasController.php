<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\FacturaTemp;
use App\Models\ProductosTemp;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index(){
        $cliente = Cliente::all();
        $datos = Venta::all();
        return view('admin.ventas', compact('datos', 'cliente'));
    }

    public function crear(Request $datos){
        $cliente = Cliente::where('id', $datos->cliente)->first();
        FacturaTemp::truncate();
        FacturaTemp::create([
            "factura" => $datos->factura,
            "admin" => auth()->user()->name,
            "nombre" => $cliente->nombre,
            "apellido" => $cliente->apellido,
            "cedula" => $cliente->cedula,
            "telefono" => $cliente->telefono,
        ]);
        return redirect()->route('admin.ventas.cliente.creando');
    }
}
