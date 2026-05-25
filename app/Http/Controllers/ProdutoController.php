<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return response()->json(Produto::with('categoria')->get());
    }

    public function show($id)
    {
        $produto = Produto::with('categoria')->findOrFail($id);
        return response()->json($produto);
    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return response()->json($produto);
    }

    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return response()->json(['mensagem' => 'Produto removido com sucesso']);
    }
}
