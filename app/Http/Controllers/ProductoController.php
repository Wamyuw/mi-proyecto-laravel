<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    // Método para mostrar el formulario de creación de producto
    public function create()
    {
        return view('productos.create');
    }

    // Método para guardar un nuevo producto
   // app/Http/Controllers/ProductoController.php
public function store(Request $request)
{
    // Validación corregida
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'estatus' => 'required|string|in:activo,inactivo,agotado',
        'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Manejo de la imagen
    if ($request->hasFile('imagen')) {
        $imagePath = $request->file('imagen')->store('productos', 'public');
        $validatedData['imagen'] = $imagePath;
    }

    try {
        Producto::create($validatedData);
        return redirect()->route('productos.create')
            ->with('success', 'Producto agregado correctamente.');
    } catch (\Exception $e) {
        // Elimina la imagen si hubo error al guardar en BD
        if (isset($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        return back()->withInput()
            ->with('error', 'Error al guardar el producto: '.$e->getMessage());
    }
}
    // Método para mostrar la galería de productos
    public function galeria()
    {
        $productos = Producto::orderBy('created_at', 'desc')->get();
        return view('galeria', compact('productos'));
    }

    // Método para eliminar un producto
    public function destroy($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            
            // Eliminar la imagen si existe
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            
            $producto->delete();
            return redirect()->route('galeria')
                ->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el producto: '.$e->getMessage());
        }
    }

    // Método para mostrar formulario de edición
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'estatus' => 'required|string|in:activo,inactivo,agotado',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer|min:0',
        ]);
    
        try {
            $producto = Producto::findOrFail($id);
            
            if ($request->hasFile('imagen')) {
                // Eliminar imagen anterior si existe
                if ($producto->imagen) {
                    Storage::disk('public')->delete($producto->imagen);
                }
                $validatedData['imagen'] = $request->file('imagen')->store('productos', 'public');
            } else {
                unset($validatedData['imagen']);
            }
    
            $producto->update($validatedData);
            
            return redirect()->route('galeria')
                ->with('success', 'Producto actualizado correctamente.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al actualizar el producto: '.$e->getMessage());
        }
    }
}