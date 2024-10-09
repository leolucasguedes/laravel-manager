<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_nome' => 'required|string|max:255',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $cliente = Client::create($validatedData);

        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Client::findOrFail($id);
        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'cliente_nome' => 'sometimes|string|max:255',
            'usuario_id' => 'sometimes|exists:usuarios,id',
        ]);

        $cliente = Client::findOrFail($id);
        $cliente->update($validatedData);

        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Client::findOrFail($id);
        $cliente->delete();

        return response()->json(['message' => 'Cliente deletado com sucesso'], 204);
    }
}
