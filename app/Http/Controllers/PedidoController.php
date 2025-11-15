<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with(['reserva', 'detalles', 'pago'])->get();

        return response()->json([
            'status' => 'success',
            'data' => $pedidos
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'fecha_hora' => 'required|date',
            'total' => 'required|numeric|min:0',

            'detalles' => 'required|array|min:1',
            'detalles.*.producto_id' => 'required|exists:productos,id',
            'detalles.*.cantidad' => 'required|integer|min:1',
            'detalles.*.precio_unitario' => 'required|numeric|min:0'
        ]);

        try {
            DB::beginTransaction();

            $pedido = Pedido::create([
                'reserva_id' => $data['reserva_id'],
                'fecha_hora' => $data['fecha_hora'],
                'total' => $data['total'],
            ]);

            foreach ($data['detalles'] as $detalle) {
                PedidoDetalle::create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $detalle['producto_id'],
                    'cantidad' => $detalle['cantidad'],
                    'precio_unitario' => $detalle['precio_unitario']
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Pedido creado con éxito.',
                'data' => $pedido->load(['reserva', 'detalles'])
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear el pedido.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $pedido = Pedido::with(['reserva', 'detalles', 'pago'])->find($id);

        if (!$pedido) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pedido no encontrado.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $pedido
        ]);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pedido no encontrado.'
            ], 404);
        }

        $data = $request->validate([
            'fecha_hora' => 'date',
            'total' => 'numeric|min:0'
        ]);

        $pedido->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Pedido actualizado.',
            'data' => $pedido
        ]);
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pedido no encontrado.'
            ], 404);
        }

        $pedido->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Pedido eliminado correctamente.'
        ]);
    }
}
