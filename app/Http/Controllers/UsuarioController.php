<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // Método para mostrar el formulario de registro
    public function create()
    {
        return view('usuarios.create');
    }

    // Método para guardar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'email' => 'required|email|unique:usuarios',
            'telefono' => 'nullable|string',
            'foto_perfil' => 'nullable|string',
            'biografia' => 'nullable|string',
            // Nota: La contraseña no está en la migración, si es necesaria deberías añadirla
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'foto_perfil' => $request->foto_perfil,
            'biografia' => $request->biografia,
            // Si necesitas contraseña, deberías hashearla:
            // 'password' => Hash::make($request->password)
        ]);

        return redirect()->route('usuarios.create')->with('success', 'Usuario registrado correctamente.');
    }

    // Método para mostrar la galería de usuarios
    public function galeria()
    {
        $usuarios = Usuario::all();
        return view('usuarios.galeria', compact('usuarios'));
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        Usuario::findOrFail($id)->delete();
        return redirect()->route('usuarios.galeria')->with('success', 'Usuario eliminado correctamente.');
    }

    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // Método para actualizar un usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'email' => 'required|email|unique:usuarios,email,'.$id,
            'telefono' => 'nullable|string',
            'foto_perfil' => 'nullable|string',
            'biografia' => 'nullable|string',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'foto_perfil' => $request->foto_perfil,
            'biografia' => $request->biografia,
        ]);

        return redirect()->route('usuarios.galeria')->with('success', 'Usuario actualizado correctamente.');
    }
}