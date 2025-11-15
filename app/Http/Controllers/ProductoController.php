<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = Producto::query();

        if ($request->has('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->has('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        $productos = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $productos
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'estado' => 'in:disponible,agotado,inactivo',
            'ruta_imagen' => 'nullable|image|max:4096'
        ]);

        if ($request->hasFile('ruta_imagen')) {
            $data['ruta_imagen'] = $request->file('ruta_imagen')->store('productos', 'public');
        }

        $producto = Producto::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Producto creado correctamente.',
            'data' => $producto
        ], 201);
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Producto no encontrado.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $producto
        ]);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Producto no encontrado.'
            ], 404);
        }

        $data = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'string',
            'precio' => 'numeric|min:0',
            'estado' => 'in:disponible,agotado,inactivo',
            'ruta_imagen' => 'nullable|image|max:4096'
        ]);

        if ($request->hasFile('ruta_imagen')) {

            if ($producto->ruta_imagen && Storage::disk('public')->exists($producto->ruta_imagen)) {
                Storage::disk('public')->delete($producto->ruta_imagen);
            }

            $data['ruta_imagen'] = $request->file('ruta_imagen')->store('productos', 'public');
        }

        $producto->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Producto actualizado correctamente.',
            'data' => $producto
        ]);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Producto no encontrado.'
            ], 404);
        }

        if ($producto->ruta_imagen && Storage::disk('public')->exists($producto->ruta_imagen)) {
            Storage::disk('public')->delete($producto->ruta_imagen);
        }

        $producto->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Producto eliminado correctamente.'
        ]);
    }
}
