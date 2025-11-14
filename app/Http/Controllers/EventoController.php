<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('fecha')->paginate(5);
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $ubicaciones = ['auditorio', 'campus', 'virtual'];
        $categorias = ['musica', 'teatro', 'deporte', 'conferencia'];

        return view('eventos.create', compact('ubicaciones', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'ubicacion' => 'required|string',
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'capacidad' => 'required|integer|min:1',
            'ruta_imagen' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'estado' => 'required|in:activo,inactivo,cancelado',
        ]);

        try {
            $rutaImagen = null;

            if ($request->hasFile('ruta_imagen')) {
                $rutaImagen = $request->file('ruta_imagen')->store('eventos', 'public');
            }

            Evento::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha' => $request->fecha,
                'hora' => $request->hora,
                'ubicacion' => $request->ubicacion,
                'categoria' => $request->categoria,
                'precio' => $request->precio,
                'capacidad' => $request->capacidad,
                'ruta_imagen' => $rutaImagen,
                'estado' => $request->estado,
            ]);

            return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente.');

        } catch (Exception $e) {
            Log::error('Error creando evento: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al crear el evento.');
        }
    }

    public function show(string $id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.show', compact('evento'));
    }

    public function edit(string $id)
    {
        $evento = Evento::findOrFail($id);

        $ubicaciones = ['auditorio', 'campus', 'virtual'];
        $categorias = ['musica', 'teatro', 'deporte', 'conferencia'];

        return view('eventos.edit', compact('evento', 'ubicaciones', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'ubicacion' => 'required|string',
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'capacidad' => 'required|integer|min:1',
            'ruta_imagen' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'estado' => 'required|in:activo,inactivo,cancelado',
        ]);

        try {
            $evento = Evento::findOrFail($id);

            $datos = [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha' => $request->fecha,
                'hora' => $request->hora,
                'ubicacion' => $request->ubicacion,
                'categoria' => $request->categoria,
                'precio' => $request->precio,
                'capacidad' => $request->capacidad,
                'estado' => $request->estado
            ];

            if ($request->hasFile('ruta_imagen')) {
                $datos['ruta_imagen'] = $request->file('ruta_imagen')->store('eventos', 'public');
            }

            $evento->update($datos);

            return redirect()->route('eventos.index')->with('success', 'Evento actualizado exitosamente.');

        } catch (Exception $e) {
            Log::error('Error actualizando evento: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al actualizar el evento.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $evento = Evento::findOrFail($id);
            $evento->delete();

            return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente.');

        } catch (Exception $e) {
            Log::error('Error eliminando evento: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error al eliminar el evento.');
        }
    }
}
