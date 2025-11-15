<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(Request $request)
    {
        $query = Reserva::with('user');

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->has('fecha')) {
            $query->where('fecha', $request->fecha);
        }

        $reservas = $query->get();

        return response()->json([
            'status'  => 'success',
            'data'    => $reservas
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'  => 'required|exists:users,id',
            'contacto' => 'required|string|max:255',
            'fecha'    => 'required|date',
            'hora'     => 'required',
            'personas' => 'required|integer|min:1',
            'estado'   => 'in:pendiente,confirmada,cancelada'
        ]);

        $reserva = Reserva::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Reserva creada correctamente.',
            'data'    => $reserva
        ], 201);
    }

    public function show($id)
    {
        $reserva = Reserva::with('user', 'pedido')->find($id);

        if (!$reserva) {
            return response()->json([
                'status' => 'error',
                'message' => 'Reserva no encontrada.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $reserva
        ]);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json([
                'status' => 'error',
                'message' => 'Reserva no encontrada.'
            ], 404);
        }

        $data = $request->validate([
            'user_id'  => 'integer|exists:users,id',
            'contacto' => 'string|max:255',
            'fecha'    => 'date',
            'hora'     => 'string',
            'personas' => 'integer|min:1',
            'estado'   => 'in:pendiente,confirmada,cancelada'
        ]);

        $reserva->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Reserva actualizada correctamente.',
            'data'    => $reserva
        ]);
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json([
                'status' => 'error',
                'message' => 'Reserva no encontrada.'
            ], 404);
        }

        $reserva->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Reserva eliminada correctamente.'
        ]);
    }
}
