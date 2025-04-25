<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    return view('index');
});
// Rutas para Producto
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('Galeria', [ProductoController::class, 'galeria'])->name('galeria');
Route::delete('productos/{id_producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::get('productos/{id_producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('productos/{id_producto}', [ProductoController::class, 'update'])->name('productos.update');

// Rutas para Usuario
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/galeria', [UsuarioController::class, 'galeria'])->name('usuarios.galeria');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
//Carrito
// Asegúrate que tienes esta ruta exactamente así:
Route::post('/carrito/agregar/{id_producto}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::post('/carrito/actualizar/{id_producto}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::post('/carrito/eliminar/{id_producto}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
