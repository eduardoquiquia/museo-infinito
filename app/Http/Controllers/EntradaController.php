<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index(Request $request)
    {
        $query = Entrada::with(['user', 'origen']);

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->has('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        $entradas = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $entradas
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'            => 'required|exists:users,id',
            'tipo'               => 'required|string',
            'fecha_compra'       => 'required|date',
            'fecha_visita'       => 'nullable|date',
            'cantidad'           => 'required|integer|min:1',
            'precio_unitario'    => 'required|numeric|min:0',
            'total'              => 'required|numeric|min:0',
            'estado'             => 'in:pendiente,pagada,cancelada',

            'origen_type'        => 'nullable|string',
            'origen_id'          => 'nullable|integer'
        ]);

        $entrada = Entrada::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Entrada creada correctamente.',
            'data' => $entrada
        ], 201);
    }

    public function show($id)
    {
        $entrada = Entrada::with(['user', 'origen'])->find($id);

        if (!$entrada) {
            return response()->json([
                'status' => 'error',
                'message' => 'Entrada no encontrada.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $entrada
        ]);
    }

    public function update(Request $request, $id)
    {
        $entrada = Entrada::find($id);

        if (!$entrada) {
            return response()->json([
                'status' => 'error',
                'message' => 'Entrada no encontrada.'
            ], 404);
        }

        $data = $request->validate([
            'user_id'            => 'integer|exists:users,id',
            'tipo'               => 'string',
            'fecha_compra'       => 'date',
            'fecha_visita'       => 'nullable|date',
            'cantidad'           => 'integer|min:1',
            'precio_unitario'    => 'numeric|min:0',
            'total'              => 'numeric|min:0',
            'estado'             => 'in:pendiente,pagada,cancelada',

            'origen_type'        => 'nullable|string',
            'origen_id'          => 'nullable|integer'
        ]);

        $entrada->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Entrada actualizada correctamente.',
            'data' => $entrada
        ]);
    }

    public function destroy($id)
    {
        $entrada = Entrada::find($id);

        if (!$entrada) {
            return response()->json([
                'status' => 'error',
                'message' => 'Entrada no encontrada.'
            ], 404);
        }

        $entrada->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Entrada eliminada correctamente.'
        ]);
    }
}
