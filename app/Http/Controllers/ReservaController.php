<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Mesa;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return response()->json(Reserva::with(['user', 'mesa'])->get());
    }

    public function show($id)
    {
        $reserva = Reserva::with(['user', 'mesa'])->findOrFail($id);
        return response()->json($reserva);
    }

    public function store(Request $request)
    {
        $reserva = Reserva::create($request->all());
        Mesa::findOrFail($request->mesa_id)->update(['status' => 'reservada']);
        return response()->json($reserva, 201);
    }

    public function atualizarStatus(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->update(['status' => $request->status]);
        return response()->json(['mensagem' => 'Status da reserva atualizado']);
    }

    public function destroy($id)
    {
        Reserva::findOrFail($id)->delete();
        return response()->json(['mensagem' => 'Reserva cancelada com sucesso']);
    }
}
