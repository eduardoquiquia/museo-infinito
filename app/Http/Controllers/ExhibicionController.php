<?php

namespace App\Http\Controllers;

use App\Models\Exhibicion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExhibicionController extends Controller
{
    public function index()
    {
        $exhibiciones = Exhibicion::orderBy('titulo')->paginate(5);
        return view('exhibiciones.index', compact('exhibiciones'));
    }

    public function create()
    {
        $categorias = Exhibicion::CATEGORIAS;
        return view('exhibiciones.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'categoria' => 'required|in:' . implode(',', Exhibicion::CATEGORIAS),
            'ruta_imagen_360' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:4096',
            'periodo' => 'nullable|string|max:200',
            'fecha_descubrimiento' => 'nullable|date',
            'lugar_hallazgo' => 'nullable|string|max:200',
            'descripcion_detallada' => 'nullable|string',
            'destacada' => 'nullable|boolean'
        ]);

        try {
            $ruta360 = null;

            if ($request->hasFile('ruta_imagen_360')) {
                $ruta360 = $request->file('ruta_imagen_360')->store('exhibiciones', 'public');
            }

            Exhibicion::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'ruta_imagen_360' => $ruta360,
                'periodo' => $request->periodo,
                'fecha_descubrimiento' => $request->fecha_descubrimiento,
                'lugar_hallazgo' => $request->lugar_hallazgo,
                'descripcion_detallada' => $request->descripcion_detallada,
                'destacada' => $request->destacada,
            ]);

            return redirect()->route('exhibiciones.index')->with('success', 'Exhibición creada exitosamente.');
        } catch (Exception $e) {
            Log::error('Error creando exhibición: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al crear la exhibición.');
        }
    }


    public function show(string $id)
    {
        $exhibicion = Exhibicion::findOrFail($id);
        return view('exhibiciones.show', compact('exhibicion'));
    }

    public function edit(string $id)
    {
        $exhibicion = Exhibicion::findOrFail($id);
        $categorias = Exhibicion::CATEGORIAS;

        return view('exhibiciones.edit', compact('exhibicion', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'categoria' => 'required|in:' . implode(',', Exhibicion::CATEGORIAS),
            'ruta_imagen_360' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:4096',
            'periodo' => 'nullable|string|max:200',
            'fecha_descubrimiento' => 'nullable|date',
            'lugar_hallazgo' => 'nullable|string|max:200',
            'descripcion_detallada' => 'nullable|string',
            'destacada' => 'nullable|boolean'
        ]);

        try {
            $exhibicion = Exhibicion::findOrFail($id);

            $datos = [
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'periodo' => $request->periodo,
                'fecha_descubrimiento' => $request->fecha_descubrimiento,
                'lugar_hallazgo' => $request->lugar_hallazgo,
                'descripcion_detallada' => $request->descripcion_detallada,
                'destacada' => $request->destacada
            ];

            if ($request->hasFile('ruta_imagen_360')) {
                $datos['ruta_imagen_360'] = $request->file('ruta_imagen_360')->store('exhibiciones', 'public');
            }

            $exhibicion->update($datos);

            return redirect()->route('exhibiciones.index')->with('success', 'Exhibición actualizada exitosamente.');
        } catch (Exception $e) {
            Log::error('Error actualizando exhibición: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al actualizar la exhibición.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $exhibicion = Exhibicion::findOrFail($id);
            $exhibicion->delete();

            return redirect()->route('exhibiciones.index')->with('success', 'Exhibición eliminada exitosamente.');
        } catch (Exception $e) {
            Log::error('Error eliminando exhibición: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error al eliminar la exhibición.');
        }
    }
}
