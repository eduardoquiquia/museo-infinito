<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Reserva;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('reserva.user', 'detalles.producto')->orderBy('fecha_hora', 'desc')->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Pedido $pedido)
    {
        $pedido->load('reserva.user', 'detalles.producto', 'pago');
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function crearDesdeReserva(Reserva $reserva)
    {
        try {
            $pedido = Pedido::create([
                'reserva_id' => $reserva->id,
                'fecha_hora' => now(),
                'total' => 0
            ]);

            return redirect()->route('pedidos.show', $pedido)->with('success', 'Pedido creado desde reserva.');
        } catch (Exception $e) {
            Log::error('Error creando pedido desde reserva: ' . $e->getMessage());
            return back()->with('error', 'Error al crear pedido.');
        }
    }

    public function agregarProducto(Request $request, Pedido $pedido)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        try {
            return back()->with('success', 'Producto agregado al pedido.');
        } catch (Exception $e) {
            Log::error('Error agregando producto: ' . $e->getMessage());
            return back()->with('error', 'Error al agregar producto.');
        }
    }
}
