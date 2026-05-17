<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\ItemPedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return response()->json(Pedido::with(['user', 'itens.produto'])->get());
    }

    public function show($id)
    {
        $pedido = Pedido::with(['user', 'itens.produto'])->findOrFail($id);
        return response()->json($pedido);
    }

    public function store(Request $request)
    {
        $pedido = Pedido::create($request->except('itens'));

        if ($request->has('itens')) {
            foreach ($request->itens as $item) {
                ItemPedido::create([...$item, 'pedido_id' => $pedido->id]);
            }
        }

        return response()->json($pedido->load('itens.produto'), 201);
    }

    public function atualizarStatus(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update(['status' => $request->status]);
        return response()->json(['mensagem' => 'Status atualizado com sucesso']);
    }
}
