<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('nombre')->paginate(5);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Producto::CATEGORIAS;
        $estados = Producto::ESTADOS;

        return view('productos.create', compact('categorias', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'categoria' => 'required|in:' . implode(',', Producto::CATEGORIAS),
            'precio' => 'required|numeric|min:0',
            'ruta_imagen' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'estado' => 'required|in:' . implode(',', Producto::ESTADOS),
        ]);

        try {
            $rutaImagen = null;

            if ($request->hasFile('ruta_imagen')) {
                $rutaImagen = $request->file('ruta_imagen')->store('productos', 'public');
            }

            Producto::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'precio' => $request->precio,
                'ruta_imagen' => $rutaImagen,
                'estado' => $request->estado,
            ]);

            return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');

        } catch (Exception $e) {
            Log::error('Error creando producto: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al crear el producto.');
        }
    }

    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);

        $categorias = Producto::CATEGORIAS;
        $estados = Producto::ESTADOS;

        return view('productos.edit', compact('producto', 'categorias', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'categoria' => 'required|in:' . implode(',', Producto::CATEGORIAS),
            'precio' => 'required|numeric|min:0',
            'ruta_imagen' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'estado' => 'required|in:' . implode(',', Producto::ESTADOS),
        ]);
        
        try {
            $producto = Producto::findOrFail($id);

            $datos = [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'precio' => $request->precio,
                'estado' => $request->estado
            ];

            if ($request->hasFile('ruta_imagen')) {
                $datos['ruta_imagen'] = $request->file('ruta_imagen')->store('productos', 'public');
            }

            $producto->update($datos);

            return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');

        } catch (Exception $e) {
            Log::error('Error actualizando producto: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al actualizar el producto.');
        }
    }

    public function destroy($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();

            return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');

        } catch (Exception $e) {
            Log::error('Error eliminando producto: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error al eliminar el producto.');
        }
    }
}
