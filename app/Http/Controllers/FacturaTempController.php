<?php

namespace App\Http\Controllers;

use App\Models\FacturaTemp;
use App\Models\Producto;
use App\Models\ProductosTemp;
use Illuminate\Http\Request;

class FacturaTempController extends Controller
{
    public function index()
    {
        $factura = FacturaTemp::all();
        $faturaProductos = ProductosTemp::all();
        $productos = Producto::all();
        $precioTotal = ProductosTemp::all()->sum('precio');
        
        return view('admin.facturaTemps', compact('productos', 'factura', 'faturaProductos', 'precioTotal'));
    }

    public function factura(Request $repuesta)
    {
        
    }

    public function crear(Request $id){
        try {
            $producto = Producto::where('id', $id->producto)->first();

            $disponible = $producto->cantidad;
            $precio = $producto->precio;
            $comprar = $id->cantidad;

            if ($disponible >= $comprar) {
                $preciot = $precio * $comprar;
                $descontar = $disponible - $comprar;

                $producto->update([
                    "cantidad" => $descontar,
                ]);

                ProductosTemp::create([
                    "nombre" => $producto->nombre,
                    "cantidad" => $comprar,
                    "precio" => $preciot,
                ]);
                return redirect()->route('admin.ventas.cliente.creando')->with('agregado', 'Producto agregado a la factura');
            }
            return redirect()->route('admin.ventas.cliente.creando')->with('noagregado', 'Producto no agregado a la factura');
        } catch (\Throwable $th) {
            return redirect()->route('admin.ventas.cliente.creando')->with('noagregado', 'Producto no agregado a la factura Por falla');
        }

        
    }

    public function eliminar($id){
        try {
            $productoTemp = ProductosTemp::find($id); // Obtén el modelo del registro que deseas eliminar
            $producto = Producto::where('nombre', $productoTemp->nombre)->first();

            $valor = $productoTemp->cantidad;
            $valor2 = $producto->cantidad;

            $total = $valor + $valor2;

            $producto->update([
                "cantidad" => $total,
            ]);

            $productoTemp->delete(); // Elimina el registro de la base de datos

            return redirect()->route('admin.ventas.cliente.creando')->with('eliminado','Produto Eliminado');
        } catch (\Throwable $th) {
            return redirect()->route('admin.ventas.cliente.creando')->with('noeliminado','Produto No Eliminado');
        }
        
    }

}
