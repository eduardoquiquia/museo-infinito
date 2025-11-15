<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('name')->paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'rol' => 'required|in:usuario,admin',
            'estado' => 'required|in:activo,inactivo',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol' => $request->rol,
                'estado' => $request->estado
            ]);

            return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
        } catch (Exception $e) {
            Log::error('Error creando usuario: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al crear el usuario.');
        }
    }

    public function show(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'rol' => 'required|in:usuario,admin',
            'estado' => 'required|in:activo,inactivo',
        ]);

        try {
            $usuario = User::findOrFail($id);

            $datos = [
                'name' => $request->name,
                'email' => $request->email,
                'rol' => $request->rol,
                'estado' => $request->estado
            ];

            if (!empty($request->password)) {
                $datos['password'] = Hash::make($request->password);
            }

            $usuario->update($datos);

            return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
        } catch (Exception $e) {
            Log::error('Error actualizando usuario: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al actualizar el usuario.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();

            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
        } catch (Exception $e) {
            Log::error('Error eliminando usuario: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error al eliminar el usuario.');
        }
    }
}
