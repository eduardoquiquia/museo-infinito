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
        $users = User::orderBy('name')->paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = User::ROLES;
        $estados = User::ESTADOS;
        return view('users.create', compact('roles', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:' . implode(',', User::ROLES),
            'estado' => 'required|in:' . implode(',', User::ESTADOS),
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'estado' => $request->estado
            ]);

            if ($user->esAdmin()) {
                Log::info("Nuevo administrador creado: {$user->email}");
            }

            return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
        } catch (Exception $e) {
            Log::error('Error creando usuario: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al crear el usuario.');
        }
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = User::ROLES;
        $estados = User::ESTADOS;
        return view('users.edit', compact('user', 'roles', 'estados'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:' . implode(',', User::ROLES),
            'estado' => 'required|in:' . implode(',', User::ESTADOS),
        ]);

        try {
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'estado' => $request->estado
            ]);

            return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
        } catch (Exception $e) {
            Log::error('Error actualizando usuario: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al actualizar el usuario.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
        } catch (Exception $e) {
            Log::error('Error eliminando usuario: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error al eliminar el usuario.');
        }
    }
}
