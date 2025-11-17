<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('user')->orderBy('fecha', 'desc')->paginate(10);
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $users = User::all();
        return view('reservas.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'contacto' => 'required|string|max:255',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'personas' => 'required|integer|min:1|max:20',
            'estado' => 'required|in:' . implode(',', Reserva::ESTADOS),
        ]);

        try {
            Reserva::create($request->all());
            return redirect()->route('reservas.index')->with('success', 'Reserva creada.');
        } catch (Exception $e) {
            Log::error('Error creando reserva: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Error al crear reserva.');
        }
    }

    public function show(Reserva $reserva)
    {
        $reserva->load('user', 'pedido.detalles.producto');
        return view('reservas.show', compact('reserva'));
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
}
