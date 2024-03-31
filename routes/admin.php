<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FacturaTempController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\SuscritoController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {

        // Route::get('/Ventas', [VentasController::class, 'index'])->name('admin.ventas');
        // Route::post('/Ventas/factura/cliente', [VentasController::class, 'crear'])->name('admin.ventas.cliente');

        // Route::get('/Ventas/factura/Cliente/Creando', [FacturaTempController::class, 'index'])->name('admin.ventas.cliente.creando');
        // Route::post('/Ventas/factura/Cliente/Creando/producto', [FacturaTempController::class, 'crear'])->name('admin.ventas.cliente.creando.producto');
        // Route::get('/Ventas/factura/Cliente/Creando/producto/eliminar/{id}', [FacturaTempController::class, 'eliminar'])->name('admin.ventas.cliente.creando.producto.eliminar');
        // Route::post('/Ventas/factura/Cliente/Creando/producto/factura', [FacturaTempController::class, 'factura'])->name('admin.ventas.cliente.creando.producto.factura');

        Route::get('/Suscrito', [SuscritoController::class, 'index'])->name('admin.suscrito');
        Route::get('/Suscrito/eliminar/{id}', [SuscritoController::class, 'eliminar'])->name('admin.suscrito.eliminar');

        Route::get('Clientes', [ClientesController::class, 'index'])->name('admin.clientes');
        Route::put('/Clientes/editar/{id}', [ClientesController::class, 'editar'])->name('admin.clientes.editar');
        Route::post('/Clientes/guardar', [ClientesController::class, 'crear'])->name('admin.clientes.guardar');
        Route::get('/Clientes/eliminar/{id}', [ClientesController::class, 'eliminar'])->name('admin.clientes.eliminar');

        Route::get('empresa', [EmpresaController::class, 'index'])->name('admin.empresa');
        Route::post('/empresa/guardar', [EmpresaController::class, 'crear'])->name('admin.empresa.guardar');

        Route::get('Usuarios', [UsuariosController::class, 'index'])->name('admin.usuarioAdmin');
        Route::put('/Usuarios/editar/{id}', [UsuariosController::class, 'editar'])->name('admin.usuarioAdmin.editar');
        Route::post('/Usuarios/guardar', [UsuariosController::class, 'crear'])->name('admin.usuarioAdmin.guardar');
        Route::get('/Usuarios/eliminar/{id}', [UsuariosController::class, 'eliminar'])->name('admin.usuarioAdmin.eliminar');

        Route::get('Categorias', [CategoriasController::class, 'index'])->name('admin.categorias');
        Route::put('/Categorias/editar/{id}', [CategoriasController::class, 'editar'])->name('admin.categorias.editar');
        Route::post('/Categorias/guardar', [CategoriasController::class, 'crear'])->name('admin.categorias.guardar');
        Route::get('/Categorias/eliminar/{id}', [CategoriasController::class, 'eliminar'])->name('admin.categorias.eliminar');

        Route::get('Productos', [ProductosController::class, 'index'])->name('admin.productos');
        Route::put('/Productos/editar/{id}', [ProductosController::class, 'editar'])->name('admin.productos.editar');
        Route::post('/Productos/guardar', [ProductosController::class, 'crear'])->name('admin.productos.guardar');
        Route::post('/Productos/eliminar', [ProductosController::class, 'eliminar'])->name('admin.productos.eliminar');
        Route::get('/Productos/eliminar/{id}', [ProductosController::class, 'eliminarB'])->name('admin.productos.eliminarB');

        Route::get('Registros', [RegistrosController::class, 'index'])->name('admin.registroActs');
        Route::post('Registros/eliminar', [RegistrosController::class, 'eliminar'])->name('admin.registroActs.eliminar');

    });
});