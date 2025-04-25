<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar($id_producto, Request $request)
    {
        try {
            $producto = Producto::findOrFail($id_producto);
            
            $carrito = session()->get('carrito', []);
            
            if(isset($carrito[$id_producto])) {
                $carrito[$id_producto]['cantidad']++;
            } else {
                $carrito[$id_producto] = [
                    "nombre" => $producto->titulo,
                    "cantidad" => 1,
                    "precio" => $producto->precio,
                    "imagen" => $producto->imagen ?: 'default-product.jpg'
                ];
            }
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $carrito = session()->get('carrito', []);
            
            if(isset($carrito[$id_producto])) {
                $carrito[$id_producto]['cantidad']++;
            } else {
                $carrito[$id_producto] = [
                    "nombre" => $request->input('titulo'),
                    "cantidad" => 1,
                    "precio" => $request->input('precio'),
                    "imagen" => $request->input('imagen') ?: 'default-product.jpg'
                ];
            }
        }
    
        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    // Nuevo método para actualizar cantidad
    public function actualizar(Request $request, $id_producto)
    {
        $carrito = session()->get('carrito', []);
        
        if(isset($carrito[$id_producto])) {
            $accion = $request->input('accion');
            $cantidadActual = $carrito[$id_producto]['cantidad'];
            
            if($accion == 'incrementar') {
                $carrito[$id_producto]['cantidad'] = $cantidadActual + 1;
            } elseif($accion == 'decrementar' && $cantidadActual > 1) {
                $carrito[$id_producto]['cantidad'] = $cantidadActual - 1;
            } else {
                $nuevaCantidad = $request->input('cantidad');
                if($nuevaCantidad > 0) {
                    $carrito[$id_producto]['cantidad'] = $nuevaCantidad;
                } else {
                    return $this->eliminar($id_producto);
                }
            }
            
            session()->put('carrito', $carrito);
            return redirect()->route('carrito.ver')->with('success', 'Cantidad actualizada');
        }
        
        return redirect()->route('carrito.ver')->with('error', 'Producto no encontrado');
    }

    public function ver()
    {
        $carrito = session()->get('carrito', []);
        $total = 0;
        
        foreach($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('carrito', compact('carrito', 'total'));
    }

    public function eliminar($id_producto)
    {
        $carrito = session()->get('carrito');
        
        if(isset($carrito[$id_producto])) {
            unset($carrito[$id_producto]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto eliminado');
    }
}